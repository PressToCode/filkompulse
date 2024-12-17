<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class DashboardController extends Controller
{
    public function index() {
        $randomTrend = Event::inRandomOrder()->take(5)->get();
        
        return view('dashboard.dashboard', ['randomTrend' => $randomTrend]);
    }
}
