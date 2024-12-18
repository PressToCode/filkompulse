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
        $user = Auth::user() ?? Auth::guard('google')->user()->user;
        $verifiedUser = $user->verified_user;
        $verifiedType = $verifiedUser ? $verifiedUser->verified_type : null;

        if($verifiedType == 'Verified User' || $verifiedType == 'administrator') {
            // User is verified, allow access to the create event page
            $categories = Categorie::all();
            return view('event-submissions.create', compact('categories'));
        }

        return redirect()->route('admin.get-verified');
    }

    public function store(Request $request)
    {
        \Log::info('A');
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location_type' => 'required|in:offline,online,Offline,Online',
            'location' => 'nullable|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'links.*' => 'nullable|url',
            'category.*' => 'nullable',
        ]);
        \Log::info('A');

        DB::beginTransaction();

        try {
            $user = Auth::user() ?? Auth::guard('google')->user();
            
            if($user instanceof \App\Models\GoogleAccountAuth) {
                $user = $user->user;
            }
            \Log::info('B');

            $userID = $user->verified_user()->first()->VerifiedID;
            \Log::info('C');

            $event = Event::updateOrCreate([
                'title' => $validatedData['title'],
            ], [
                'verifiedUserID' => $userID,
                'description' => $validatedData['description'],
                'date' => $validatedData['date'],
                'location_type' => $validatedData['location_type'],
                'location' => $validatedData['location'],
            ]);
            \Log::info('D');

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $imageFile) {
                    $path = $imageFile->store('event_images', 'public');
                    $event->image()->updateOrCreate([
                        'imageURL' => $path,
                        'events_ID' => $event->eventsID,
                    ], [
                        'events_ID' => $event->eventsID,
                        'imageURL' => $path,
                    ]);
                }
            }

            if (isset($validatedData['links'])) {
                foreach ($validatedData['links'] as $url) {
                    if (!empty($url)) {
                        $event->link()->updateOrCreate([
                            'events_ID' => $event->eventsID,
                            'URL' => $url,
                        ],[
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
                        // $event->categorie()->attach($categoryID);
                        $event->categorie()->syncWithoutDetaching($categoryID);
                    }
                }
            }
            \Log::info('E');

            DB::commit();
            \Log::info('F');
            return redirect()->route('event-submissions.create')->with('success', 'Event submitted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'An error occurred while submitting the event. Please try again.');
        }
    }

    public function edit(Request $request, Event $event) {
        $categories = Categorie::all();
        $eventCategories = $event->categorie()->pluck('categoryID')->toArray();
        $filteredCategories = $categories->filter(function ($category) use ($eventCategories) { 
            return !in_array($category->id, $eventCategories); 
        });
        $eventLink = $event->link()->get();
        return view('event-submissions.edit', compact('event', 'categories', 'eventCategories', 'filteredCategories', 'eventLink'));
    }
}