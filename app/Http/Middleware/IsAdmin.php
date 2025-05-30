<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 'Admin') {
            return $next($request);
        } else if (Auth::check() && Auth::user()->role == 'User') {
            return redirect()->route('user.dash');
        } else {
            return redirect()->route('officer.dash');
        }
        return redirect()->route('login')->with('danger', 'Anda tidak memiliki akses disini');
    }
}
