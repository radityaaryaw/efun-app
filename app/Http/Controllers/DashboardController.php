<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Tiket;

class DashboardController extends Controller
{
    public function penyelenggara()
    {
        $user = auth()->user();

        $totalEvents = Event::where('penyelenggara_id', $user->id)->count();

        $recentEvents = Event::where('penyelenggara_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(5)->get();

        return view('dashboard.penyelenggara.dashboard', compact(
            'totalEvents',
            'recentEvents'
        ));
    }

    public function admin()
    {
        return view('dashboard.admin.dashboard');
    }

    public function user()
    {
        return view('dashboard.user.dashboard');
    }
}
