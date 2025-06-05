<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

          $statusCounts = $user->tasks()
        ->select('status', DB::raw('count(*) as count'))
        ->groupBy('status')
        ->pluck('count', 'status');
        $statuses = ['New', 'In Progress', 'Completed', 'Pedning', 'Closed'];
        $counts = collect($statuses)->mapWithKeys(function ($status) use ($statusCounts) {
                return [$status => $statusCounts[$status] ?? 0];
            });
        $tasks = Auth::user()->tasks()->get();  // gets only tasks belonging to logged-in user

        return view('home')
        ->with('tasks', $tasks)
        ->with('counts', $counts);
    }
}
