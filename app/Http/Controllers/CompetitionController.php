<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function show($id)
    {
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
    }
}