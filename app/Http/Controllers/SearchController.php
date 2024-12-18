<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Categorie;

class SearchController extends Controller
{
    public function index(Request $request) {
        // Get the query parameter sent via the form
        $query = $request->input('q');

        $result = Event::where('title', 'like', '%' . $query . '%')->paginate(5);
        $categories = Categorie::all();
        
        // Pass the query to the view
        return view('search.search', compact('result', 'categories'))->with('paginationView', 'vendor.pagination.tailwind');
    }
    public function suggest(Request $request)
    {
        // Sanitize input and perform a 'like' query for fuzzy search
        $query = $request->get('query');

        // Example: Search for relevant title using a LIKE query
        $results = Event::where('title', 'like', '%' . $query . '%')->paginate(3);

        // Return the results as a JSON response
        return response()->json([
            'suggestions' => $results->map(function($item) {
                return ['title' => $item->title];  // Adjust this depending on your model structure
            })
        ]);
    }

    public function filter(Request $request) {
        // Check if request is AJAX, if not redirect to search
        if (!$request->ajax()) {
            return redirect()->route('search');
        }

        $page = $request->input('page', 1);
        
        // Start building the query for the Event model
        $queryEvent = Event::query();
        
        // Apply search query if it exists
        if ($request->has('q')) {
            $queryEvent->where('title', 'like', '%' . $request->q . '%');
        }
        
        // Apply category filter if it's set
        if ($request->has('category') && $request->category) {
            $queryEvent->whereHas('categorie', function($query) use ($request) {
                $query->where('categoryName', $request->category);
            });
        }
        
        // Apply location type filter if it's set
        if ($request->has('location_type') && $request->location_type) {
            $queryEvent->where('location_type', $request->location_type);
        }
        
        // Apply date filter if it's set
        if ($request->has('date') && $request->date) {
            $queryEvent->whereDate('date', $request->date);
        }
    
        // Get paginated results
        $result = $queryEvent->paginate(5)->withQueryString();
        
        // Prepare the response data
        $categories = Categorie::all();
        $html = view('search.search-partial', compact('result', 'categories'))
            ->with('paginationView', 'vendor.pagination.tailwind')
            ->render();
    
        return response()->json([
            'html' => $html,
            'url' => $request->fullUrlWithQuery([
                'q' => $request->q,
                'category' => $request->category,
                'location_type' => $request->location_type,
                'date' => $request->date,
                'page' => $page
            ])
        ]);
    }
}
