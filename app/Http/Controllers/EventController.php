<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show($id)
    {
        $event = Event::where('id', $id)->firstOrFail();
        \Log::info($event);

        return view('event.show', compact('event'));
    }

    public function showType($type)
    {
        // Logic to show competition type
        return view('event.type', compact('type'));
    }

    public function addToCollection(Request $request, Event $competition)
    {
        // Logic to add competition to collection
        // You might want to use the authenticated user here
        // $request->user()->competitions()->attach($competition->id);
        
        return back()->with('success', 'Competition added to collection');
    }
}


