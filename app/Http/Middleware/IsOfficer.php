<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsOfficer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 'Officer') {
            return $next($request);
        } else if (Auth::check() && Auth::user()->role == 'Admin') {
            return redirect()->route('admin.dash');
        } else {
            return redirect()->route('user.dash');
        }
        return redirect()->route('login')->with('danger', 'Anda tidak memiliki akses disini');
    }
}
