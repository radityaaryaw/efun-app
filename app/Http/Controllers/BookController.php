<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Categories;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BookExport;

class BookController extends Controller
{
    public function bookExcel()
    {
        // return Excel::download(new BookExport, 'book-list.xlsx');
        return Excel::download(new BookExport, 'books.xlsx');
    }

    public function index(Request $request) {
        if ($request->has('search')) {
            $book = Book::where('title', 'LIKE', '%' . $request->search . '%')
                ->orWhere('author', 'LIKE', '%' . $request->search . '%')
                ->get();

            // Export search results to Excel

        } else {
            $book = Book::all();
        }
        $namecategory = Categories::all();
        return view ('dashboard.admin.bookmenu.book', compact('book', 'namecategory'));
    }

    public function create() {
        $namecategory = Categories::all();
        return view ('dashboard.admin.bookmenu.create', compact('namecategory'));
    }

    public function store(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'cover' => 'required|image|mimes:jpeg,png,jpg,svg',
            'title' => 'required',
            'author' => 'required',
            'publisher'=> 'required',
            'year_publish' => 'required',
            'categories' => 'required',
        ]);

        // Simpan gambar ke dalam storage
        $filename = time().$request->file('cover')->getClientOriginalName();
        $path = $request->file('cover')->storeAs('buku', $filename, 'public');
        $validatedData["cover"] = '/storage/' .$path;

        // Buat record buku baru
        $book = new Book();
        $book->cover = $validatedData['cover'];
        $book->title = $request->title;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->year_publish = $request->year_publish;
        $book->categories = $request->categories;
        $book->status = 'Tersedia';
        $book->save();

        return redirect()->route('book.index')->with('success', 'Berhasil menambahkan list buku!');
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'cover' => 'image|mimes:jpeg,png,jpg,svg',
            'title' => 'required',
            'author' => 'required',
            'publisher'=> 'required',
            'year_publish' => 'required',
            'categories' => 'required',
        ]);

        if ($request->hasFile('cover')) {
            $filename = time() . $request->file('cover')->getClientOriginalName();
            $path = $request->file('cover')->storeAs('buku', $filename, 'public');
            $validatedData["cover"] = '/storage/' . $path;
            $book['cover'] = $validatedData['cover'];
        }

        $book['title'] = $request->title;
        $book['author'] = $request->author;
        $book['publisher'] = $request->publisher;
        $book['year_publish'] = $request->year_publish;
        $book['categories'] = $request->categories;

        Book::where('id', $id)->update($book);

        return redirect()->route('book.index')->with('success', 'Berhasil mengupdate buku');
    }

    public function destroy (Request $request, $id) {
        Book::where('id', $id)->delete();
        return redirect()->route('book.index')->with('success', 'Berhasil menghapus data buku !');
    }
}
