<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Resolution;

class HomeController extends Controller
{
    public function index()
    {
        $nextMeeting = Meeting::where('status', 'planned')
            ->orderBy('date_time', 'asc')
            ->first();
            
        $activeResolutions = Resolution::where('vote_start_date', '<=', now())
            ->where('vote_end_date', '>=', now())
            ->orderBy('vote_end_date', 'asc')
            ->get();

        return view('home', compact('nextMeeting', 'activeResolutions'));
    }
}