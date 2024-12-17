<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index()
    {
        $user = Auth::user() ?? Auth::guard('google')->user();

        if(!$user) {
            return redirect()->route('login');
        }

        if($user instanceof \App\Models\GoogleAccountAuth) {
            $user = $user->user;
        }

        $keranjang = $user->keranjang;
        $events = $keranjang->event()->get();

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

    public function destroy($id)
    {
        $user = Auth::user() ?? Auth::guard('google')->user();

        if(!$user) {
            return redirect()->route('login');
        }

        if($user instanceof \App\Models\GoogleAccountAuth) {
            $user = $user->user;
        }
        
        $user->keranjang->event()->find($id)->pivot->delete();
        
        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }
        
        return back();
    }
}