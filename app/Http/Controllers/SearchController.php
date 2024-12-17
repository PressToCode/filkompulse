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
        // Get the current page from the request, default to 1
        $page = $request->input('page', 1);
        
        // Start building the query for the Event model
        $queryEvent = Event::query();
        
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

        \Log::info('SQL Query:', ['query' => $queryEvent->toSql()]);

        // Get paginated results (5 per page)
        $result = $queryEvent->paginate(5);
        \Log::info("Events: ".$result);

        \Log::info('SQL Query with Bindings:', [
            'query' => $queryEvent->toSql(),
            'bindings' => $queryEvent->getBindings(),
        ]);

        // Prepare the response data to return to the frontend
        $categories = Categorie::all();
        $html = view('search.search-partial', compact('result', 'categories'))->with('paginationView', 'vendor.pagination.tailwind')->render();

        // Update the URL without reloading the page (using the same filters and current page)
        $url = route('search.filter', [
            'category' => $request->category,
            'location_type' => $request->location_type,
            'date' => $request->date,
            'page' => $result->currentPage()
        ]);

        return response()->json([
            'html' => $html,
            'url' => $url,
        ]);
    }
}
