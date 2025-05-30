<?php

namespace App\Exports;

use App\Models\Borrow;
use Maatwebsite\Excel\Concerns\FromCollection;

class LendingExport implements FromCollection
{
    public function collection()
    {
        return Borrow::all();
    }
}
