<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\User;

class UserExport implements FromCollection
{
    public function collection()
    {
        if (request('search')) {
            $user = User::where('name', 'LIKE', '%' . request('search') . '%')
                ->orWhere('username', 'LIKE', '%' . request('search') . '%')
                ->orWhere('email', 'LIKE', '%' . request('search') . '%')
                ->orWhere('address', 'LIKE', '%' . request('search') . '%')
                ->orWhere('role', 'LIKE', '%' . request('search') . '%')
                ->get();

            // Export search results to Excel
            
        } else {
            $user = User::all();
        }
        return $user;
    }
}
