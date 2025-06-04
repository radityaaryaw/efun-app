<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class LandingController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function event()
    {
        $events = Event::with('kategori')->get();
        return view('event',compact('events'));
    }
    public function detailevent($id)
    {
        $event = Event::with('kategori')->find($id);
        return view('detailevent',compact('event'));
    }
}
