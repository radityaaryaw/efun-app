<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;

class BookExport implements FromCollection
{
    public function collection()
    {
        if (request('search')) {
            $book = Book::where('title', 'LIKE', '%' . request('search') . '%')
                ->orWhere('author', 'LIKE', '%' . request('search') . '%')
                ->get();

            // Export search results to Excel
            
        } else {
            $book = Book::all();
        }
        return $book;
    }

    
}

