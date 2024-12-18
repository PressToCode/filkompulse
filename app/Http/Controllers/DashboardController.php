<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Categorie;

class DashboardController extends Controller
{
    public function index() {
        $randomTrend = Event::inRandomOrder()->take(5)->get();
        $categories = Categorie::all();
        $events = Event::paginate(5);

        return view('dashboard.dashboard', ['randomTrend' => $randomTrend, 'categories' => $categories, 'events' => $events])->with('paginationView', 'vendor.pagination.customPagination');
    }

    public function filter(Request $request) {
        if (!$request->ajax()) {
            return redirect()->route('dashboard');
        }

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
    
        // Get paginated results (5 per page)
        $events = $queryEvent->paginate(5)->withQueryString();
    
        // Prepare the response data
        $categories = Categorie::all();
        $html = view('dashboard.sections.partial', compact('events', 'categories'))
            ->with('paginationView', 'vendor.pagination.customPagination')
            ->render();
    
        // Build the URL with all current parameters
        $url = $request->fullUrlWithQuery([
            'category' => $request->category,
            'location_type' => $request->location_type,
            'date' => $request->date,
            'page' => $page
        ]);
        \Log::info($url);
    
        return response()->json([
            'html' => $html,
            'url' => $url,
        ]);
    }
}
