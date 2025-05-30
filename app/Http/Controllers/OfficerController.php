<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Book;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CategoriesExport;
use App\Exports\BookExport;

class OfficerController extends Controller
{
    public function booksExcel() 
    {
        // return Excel::download(new BookExport, 'book-list.xlsx');
        return Excel::download(new BookExport, 'books.xlsx');
    }

    public function bookindex(Request $request) {
        if ($request->has('search')) {
            $book = Book::where('title', 'LIKE', '%' . $request->search . '%')
                ->orWhere('author', 'LIKE', '%' . $request->search . '%')
                ->get();

            // Export search results to Excel
            
        } else {
            $book = Book::all();
        }
        $namecategory = Categories::all();
        return view ('dashboard.officer.bookmenu.book', compact('book', 'namecategory'));
    }

    public function bookcreate() {
        $namecategory = Categories::all();
        return view ('dashboard.officer.bookmenu.create', compact('namecategory'));
    }

    public function bookstore(Request $request, Book $book)
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

        return redirect()->route('officerbook')->with('success', 'Berhasil menambahkan list buku!');
    }


    public function bookupdate(Request $request, $id)
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
    
        return redirect()->route('officerbook')->with('success', 'Berhasil mengupdate buku');
    }

    public function bookdestroy (Request $request, $id) {
        Book::where('id', $id)->delete();
        return redirect()->route('officerbook')->with('success', 'Berhasil menghapus data buku !');
    }
    
    //LOGIC CATEGORY --------------------------------------------
    public function categoriesExcel() 
    {
        return Excel::download(new CategoriesExport, 'category-list.xlsx');
    }

    public function index(Request $request) {
        if($request->has('search')) {
            $category = Categories::where('name_category', 'LIKE', '%' .$request->search. '%')->get();
        }else {
            $category = Categories::all();
        }
        // $category = Categories::all();
        return view ('dashboard.officer.category', compact('category'));
    }

    public function store(Request $request, Categories $category) {
        $validateData = $request -> validate ([
            'name_category' => 'required',
        ]);

        Categories::create ([
            'name_category' => $request->name_category,
        ]);

        return redirect()->route('officercategory')->with('success', 'Berhasil menambahkan kategori!');
    }

    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name_category' => 'required',
        ]);

        $category['name_category'] = $request->name_category;

        Categories::where('id', $id)->update($category);
        return redirect()->route('officercategory')->with('success', 'Berhasil mengupdate data kategori !');

    }

    public function destroy (Request $request, $id) {
        Categories::where('id', $id)->delete();
        return redirect()->route('officercategory')->with('success', 'Berhasil menghapus data kategori !');
    }

}

