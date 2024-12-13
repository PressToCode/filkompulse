<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('collections.index', compact('events'));
    }

    public function toggleReminder(Event $event)
    {
        $event->update(['has_reminder' => !$event->has_reminder]);
        return back();
    }

    public function toggleSelect(Event $event)
    {
        $event->update(['is_selected' => !$event->is_selected]);
        return back();
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return back();
    }
}