<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventSubmissionController extends Controller
{
    public function create()
    {
        return view('event-submissions.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location_type' => 'required|in:physical,online',
            'location' => 'nullable|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'links.*' => 'nullable|url',
        ]);

        DB::beginTransaction();

        try {
            $event = Event::create([
                'verifiedUserID' => Auth::id(),
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
                        'imageURL' => $path,
                    ]);
                }
            }

            if (isset($validatedData['links'])) {
                foreach ($validatedData['links'] as $url) {
                    if (!empty($url)) {
                        $event->link()->create([
                            'URL' => $url,
                        ]);
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