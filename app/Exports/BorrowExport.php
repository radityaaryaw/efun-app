<?php

namespace App\Exports;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BorrowExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        // $search = request('search');
        if (request('search')) {
            $borrow = Borrow::with('users', 'book')->where('lending_date', 'LIKE', '%' . request('search') . '%')
                ->orWhere('lending_status', 'LIKE', '%' . request('search') . '%')
                ->orWhere('return_date', 'LIKE', '%' . request('search') . '%')
                ->get();
            if(count($borrow) == 0){
                $users = User::where('name', 'LIKE', '%'. request('search'). '%')->first('id');
                if(!$users){
                    $book = Book::where('title', 'LIKE', '%'. request('search') .'%')->first('id');
                    if($book){
                        $borrow = Borrow::with('users', 'book')->where('book_id', $book['id'])->get();
                    }
                }else{
                    $borrow = Borrow::with('users', 'book')->where('user_id', $users['id'])->get();
                }
            }

            // Export search results to Excel
            
        } else {
            $borrow = Borrow::with('users', 'book')->get();
        }

        return view ('excel.excel', ['borrow' => $borrow]);
    }
}
