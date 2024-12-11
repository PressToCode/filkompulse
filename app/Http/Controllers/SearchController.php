<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class SearchController extends Controller
{
    public function index() {
        return view('search.search');
    }
    public function suggest(Request $request)
    {
        // Sanitize input and perform a 'like' query for fuzzy search
        $query = $request->get('query');

        // Example: Search for relevant title using a LIKE query
        $results = Event::where('title', 'like', '%' . $query . '%')->paginate(5);

        // Return the results as a JSON response
        return response()->json([
            'suggestions' => $results->map(function($item) {
                return ['title' => $item->title];  // Adjust this depending on your model structure
            })
        ]);
    }
}
