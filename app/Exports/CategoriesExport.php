<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Categories;

class CategoriesExport implements FromCollection
{
    public function collection()
    {
        return Categories::all();
    }
}
