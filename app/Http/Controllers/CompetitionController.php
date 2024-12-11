<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function show(Competition $competition)
    {
        $competition->load('types', 'details');
        return view('competitions.show', compact('competition'));
    }

    public function showType($type)
    {
        // Logic to show competition type
        return view('competitions.type', compact('type'));
    }

    public function addToCollection(Request $request, Competition $competition)
    {
        // Logic to add competition to collection
        // You might want to use the authenticated user here
        // $request->user()->competitions()->attach($competition->id);
        
        return back()->with('success', 'Competition added to collection');
    }
}


