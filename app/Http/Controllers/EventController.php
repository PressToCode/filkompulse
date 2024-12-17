<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show($id)
    {
        $event = Event::where('eventsID', $id)->firstOrFail();

        return view('event.show', compact('event'));
    }

    public function showType($type)
    {
        // Logic to show competition type
        return view('event.type', compact('type'));
    }

    public function addToCollection(Request $request, $id)
    {
        $user = $request->user() ?? $request->user('google');
        
        if($user instanceof \App\Models\GoogleAccountAuth) {
            $user = $user->user;
        }
        // \Log::info($id);

        // \Log::info('checkpoint A');
        if($user->keranjang->event()->wherePivot('eventsID', $id)->exists()) {
            // \Log::info('checkpoint B');
            return back()->withErrors('Event already in collection');
        }

        // \Log::info('checkpoint C');
        $user->keranjang->event()->attach($id);
        
        // \Log::info('checkpoint D');
        return back()->with('success', 'Event added to collection');
    }
}


