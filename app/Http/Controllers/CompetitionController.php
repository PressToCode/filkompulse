<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function show(Competition $competition)
    {
<<<<<<< HEAD
        $competition->load('types', 'details');
        return view('competitions.show', compact('competition'));
=======
        // In a real application, you would fetch the competition data here
        // For example: $competition = Competition::findOrFail($id);
        
        // For now, we'll just pass some dummy data
        $competition = [
            'id' => $id,
            'name' => 'Sample Competition ' . $id,
            'description' => 'This is a sample competition description.',
        ];

        return view('competition.show', $competition);
        // return view('competition.show', compact('competition')); -- bad use of compact when only 1 controller is returning view
>>>>>>> 8c5af16843aae750d57afcfdad27bc03a482a588
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


