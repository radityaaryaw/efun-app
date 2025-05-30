<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //VIEW DASHBOARD --------------------------------
    public function admin() {
        return view ('dashboard.admin.dashboard');
    }

    public function officer() {
        return view ('dashboard.officer.dashboard');
    }

    public function user() {
        return view ('dashboard.user.dashboard');
    }

    //LOGIKA LOGIN & REGISTER --------------------------
    public function login() {
        return view ('form.login');
    }

    public function auth(Request $request) {
        $user = $request -> validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($user)) {
            if(Auth::user()->role == 'Admin' ) {
                return redirect()->route('admin.dash');
            }elseif(Auth::user()->role == 'User' ) {
                return redirect()->route('user.dash');
            }else {
                return redirect()->route('officer.dash');
            } 
        }else {
            return redirect()->back()->with('danger', "Gagal login, silahkan periksa dan coba lagi!");
        }
    }
    public function register() {
        return view ('form.register');
    }

    public function regisakun(Request $request) {
        $validateData = $request -> validate ([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'address' => 'required',
        ]);

        $validateData['password'] = bcrypt($validateData['password']);
        User::create ([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' =>  Hash::make($request->password),
            'address' => $request->address,
            'role' => 'User'
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil!, silahkan login sekarang');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
