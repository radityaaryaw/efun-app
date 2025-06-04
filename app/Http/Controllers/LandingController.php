<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function event()
    {
        return view('event');
    }
    public function detailevent()
    {
        return view('detailevent');
    }
}
