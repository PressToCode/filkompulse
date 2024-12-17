<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventSubmissionController extends Controller
{
    public function create()
    {
        $categories = Categorie::all();
        return view('event-submissions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location_type' => 'required|in:physical,online',
            'location' => 'nullable|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'links.*' => 'nullable|url',
            'category.*' => 'nullable',
        ]);

        DB::beginTransaction();

        try {
            $user = Auth::user() ?? Auth::guard('google')->user();
            
            if($user instanceof \App\Models\GoogleAccountAuth) {
                $user = $user->user;
            }

            $userID = $user->verified_user()->first()->VerifiedID;

            $event = Event::create([
                'verifiedUserID' => $userID,
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'date' => $validatedData['date'],
                'location_type' => $validatedData['location_type'],
                'location' => $validatedData['location'],
            ]);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $imageFile) {
                    $path = $imageFile->store('event_images', 'public');
                    $event->image()->create([
                        'events_ID' => $event->eventsID,
                        'imageURL' => $path,
                    ]);
                }
            }

            if (isset($validatedData['links'])) {
                foreach ($validatedData['links'] as $url) {
                    if (!empty($url)) {
                        $event->link()->create([
                            'events_ID' => $event->eventsID,
                            'URL' => $url,
                        ]);
                    }
                }
            }

            if(isset($validatedData['category'])) {
                foreach ($validatedData['category'] as $category) {
                    if (!empty($category)) {
                        $categoryID = Categorie::firstWhere('categoryName', $category)->categoryID;
                        $event->categorie()->attach($categoryID);
                    }
                }
            }

            DB::commit();

            return redirect()->route('event-submissions.create')->with('success', 'Event submitted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'An error occurred while submitting the event. Please try again.');
        }
    }
}