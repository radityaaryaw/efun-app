<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Book;
use App\Models\User;
use App\Models\Borrow;
use App\Models\Review;
use App\Models\Collection;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BorrowExport;


class LibraryController extends Controller
{
    public function index() {
        $book = Book::all();
        $borrow = Borrow::all();
        return view ('dashboard.user.library', compact('book', 'borrow'));
    }

    public function pinjam(Request $request) {
        if ($request->has('search')) {
            $borrow = Borrow::with('users', 'book')->where('lending_date', 'LIKE', '%' . $request->search . '%')
                ->orWhere('lending_status', 'LIKE', '%' . $request->search . '%')
                ->orWhere('return_date', 'LIKE', '%' . $request->search . '%')
                ->get();
            if(count($borrow) == 0){
                $users = User::where('name', 'LIKE', '%'. $request->search. '%')->first('id');
                if(!$users){
                    $book = Book::where('title', 'LIKE', '%'. $request->search .'%')->first('id');
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
        // dd($borrow);
        return view ('dashboard.admin.borrowed', compact('borrow'));
    }

    public function officerborrow() {
        $borrow = Borrow::with('users')->get();
        // dd($borrow);
        return view ('dashboard.officer.borrowed', compact('borrow'));
    }

    //EXCEL PEMINJAMAN -------------------------------------------------------------
    public function lendingExcel()
    {
        return Excel::download(new BorrowExport, 'borrowed-user.xlsx');
    }

    public function borrow(Request $request) {
        $borrow = Borrow::with('users')->get();
        // dd($borrow);
        return view ('dashboard.user.tiketevent', compact('borrow'));
    }


    public function collection() {
        $collection = Collection::with('users')->get();
        return view ('dashboard.user.collection', compact('collection'));
    }

    public function borrowBook(Request $request)
    {
        // Simpan data pinjaman
        Borrow::create([
            'book_id' => $request->book_id,
            'user_id' => Auth::user()->id,
            'lending_status' => 'Dipinjam',
            'lending_date' => now(), // Tanggal pinjam sekarang
            'return_date' => null, // Tanggal pengembalian belum ditentukan
        ]);

        // Redirect kembali ke halaman buku dengan pesan sukses
        return redirect()->route('library.book')->with('success', 'Buku berhasil dipinjam.');
    }

    public function collectionbook(Request $request)
    {
        // Simpan data pinjaman
        Collection::create([
            'book_id' => $request->book_id,
            'user_id' => Auth::user()->id,
        ]);

        // Redirect kembali ke halaman buku dengan pesan sukses
        return redirect()->route('library.book')->with('success', 'Buku berhasil di koleksi');
    }

    public function returnBook(Request $request)
    {
        // Cari data peminjaman berdasarkan ID
        $borrow = Borrow::findOrFail($request->id);

        // Perbarui tanggal pengembalian dan status peminjaman
        $borrow->return_date = now(); // Tanggal pengembalian saat ini
        $borrow->lending_status = 'Dikembalikan';

        // Simpan perubahan
        $borrow->save();

        // Redirect kembali ke halaman buku dengan pesan sukses
        return redirect()->route('borrowed')->with('success', 'Buku berhasil dikembalikan.');
    }

    public function review($id) {
        $hasBorrowedAndReturned = Borrow::where('user_id', Auth::user()->id)
                                        ->where('book_id', $id)
                                        ->where('lending_status', 'Dikembalikan')
                                        ->exists();

        // Jika pengguna telah meminjam dan mengembalikan buku tersebut, ambil juga ulasan yang telah diberikan
        if ($hasBorrowedAndReturned) {
            $review = Review::where('book_id', $id)->get();
        } else {
            $review = collect(); // Kosongkan ulasan jika pengguna belum meminjam dan mengembalikan buku tersebut
        }
        $book = Book::find($id);
        $review = Review::with('users')->where('book_id', $id)->get();
        return view ('dashboard.user.review', compact( 'hasBorrowedAndReturned', 'book', 'review'));
    }

    public function reviewbook(Request $request)
    {
        $request -> validate([
            'review' => 'required',
            'rating' => 'required'
        ]);

        Review::create([
            'book_id' => $request->book_id,
            'user_id' => Auth::user()->id,
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        // Redirect kembali ke halaman buku dengan pesan sukses
        return redirect()->route('library.book')->with('success', 'Review berhasil ditambahkan');
    }

    public function showReviewForm($book_id) {
        // Periksa apakah pengguna telah meminjam dan mengembalikan buku tertentu sebelumnya
        $hasBorrowedAndReturned = Borrow::where('user_id', Auth::user()->id)
                                        ->where('book_id', $book_id)
                                        ->where('lending_status', 'Dikembalikan')
                                        ->exists();

        // Jika pengguna telah meminjam dan mengembalikan buku tersebut, ambil juga ulasan yang telah diberikan
        if ($hasBorrowedAndReturned) {
            $review = Review::where('book_id', $book_id)->get();
        } else {
            $review = collect(); // Kosongkan ulasan jika pengguna belum meminjam dan mengembalikan buku tersebut
        }

        // Kirimkan data ke tampilan
        return view('review', compact('hasBorrowedAndReturned', 'review'));
    }

    public function collectdelete(Request $request, $id)
    {
        Collection::where('id', $id)->delete();

        return redirect()->route('collection')->with('success', 'Berhasil menghapus koleksi buku');
    }
}
