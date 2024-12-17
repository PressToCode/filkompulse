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

        // \Log::info('SQL Query:', ['query' => $queryEvent->toSql()]);

        // Get paginated results (5 per page)
        $events = $queryEvent->paginate(5);
        // \Log::info("Events: ".$events);

        // \Log::info('SQL Query with Bindings:', [
        //     'query' => $queryEvent->toSql(),
        //     'bindings' => $queryEvent->getBindings(),
        // ]);

        // Prepare the response data to return to the frontend
        $categories = Categorie::all();
        $html = view('dashboard.sections.partial', compact('events', 'categories'))->with('paginationView', 'vendor.pagination.customPagination')->render();

        // Update the URL without reloading the page (using the same filters and current page)
        $url = route('dashboard.filter', [
            'category' => $request->category,
            'location_type' => $request->location_type,
            'date' => $request->date,
            'page' => $events->currentPage()
        ]);

        return response()->json([
            'html' => $html,
            'url' => $url,
        ]);
    }
}
