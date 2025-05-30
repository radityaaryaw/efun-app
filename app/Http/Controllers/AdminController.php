<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;
use App\Exports\BorrowExport;


class AdminController extends Controller
{
    public function userExcel() 
    {
        return Excel::download(new UserExport, 'users-data.xlsx');
    }

    public function borrowExcel() 
    {
        return Excel::download(new BorrowExport, 'borrowed-list.xlsx');
    }

    public function index (Request $request) {
        if ($request->has('search')) {
            $user = User::where('name', 'LIKE', '%' .  $request->search . '%')
                ->orWhere('username', 'LIKE', '%' .  $request->search . '%')
                ->orWhere('email', 'LIKE', '%' .  $request->search . '%')
                ->orWhere('address', 'LIKE', '%' .  $request->search . '%')
                ->orWhere('role', 'LIKE', '%' .  $request->search . '%')
                ->get();

            // Export search results to Excel
            
        } else {
            $user = User::all();
        }
        // $user = User::latest()->cursorPaginate(5);
        return view('dashboard.admin.user', compact('user'));
    }

    public function store(Request $request, User $user) {
        $validateData = $request -> validate ([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'address' => 'required',
            'role' => 'required'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);
        User::create ([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' =>  Hash::make($request->password),
            'address' => $request->address,
            'role' => $request->role,
        ]);

        return redirect()->route('user.index')->with('success', 'Berhasil menambahkan pengguna!');
    }

    public function create () {
        return view('dashboard.admin.usermenu.create');
    }

    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email'=> 'required|unique:users',
            'address' => 'required',
            'role' => 'required'
        ]);

        $user['name'] = $request->name;
        $user['username'] = $request->username;
        $user['password'] = Hash::make($request->password);
        $user['email'] = $request->email;
        $user['address'] = $request->address;
        $user['role'] = $request->role;

        User::where('id', $id)->update($user);
        return redirect()->route('user.index')->with('success', 'Berhasil mengupdate data pengguna !');

    }

    public function destroy (Request $request, $id) {
        User::where('id', $id)->delete();
        return redirect()->route('user.index')->with('success', 'Berhasil mengupdate data pengguna !');
    }


}
