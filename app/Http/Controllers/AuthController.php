<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    // VIEW DASHBOARD --------------------------------
    public function admin()
    {
        return view('dashboard.admin.dashboard');
    }

    public function user()
    {
        return view('dashboard.user.dashboard');
    }

    public function penyelenggara()
    {
        return view('dashboard.penyelenggara.dashboard');
    }

    // LOGIKA LOGIN & REGISTER --------------------------
    public function login()
    {
        return view('form.login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            if ($role === 'Admin') {
                return redirect()->intended('/dashboard/admin');
            } elseif ($role === 'Penyelenggara') {
                return redirect()->intended('/dashboard/penyelenggara');
            } else {
                return redirect()->intended('/dashboard/user');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function register()
    {
        return view('form.register');
    }

    public function regisakun(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'username'      => 'required|string|max:255|unique:users',
            'email'         => 'required|email|unique:users',
            'password'      => 'required|string|min:6',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        User::create([
            'name'          => $validated['name'],
            'username'      => $validated['username'],
            'email'         => $validated['email'],
            'password'      => Hash::make($validated['password']),
            'role'          => 'User',
            'jenis_kelamin' => $validated['jenis_kelamin'],
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
