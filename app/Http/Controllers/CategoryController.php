<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Categories;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CategoriesExport;

class CategoryController extends Controller
{
    public function categoryExcel() 
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
        return view ('dashboard.admin.category', compact('category'));
    }

    public function store(Request $request, Categories $category) {
        $validateData = $request -> validate ([
            'name_category' => 'required',
        ]);

        Categories::create ([
            'name_category' => $request->name_category,
        ]);

        return redirect()->route('category.index')->with('success', 'Berhasil menambahkan kategori!');
    }

    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name_category' => 'required',
        ]);

        $category['name_category'] = $request->name_category;

        Categories::where('id', $id)->update($category);
        return redirect()->route('category.index')->with('success', 'Berhasil mengupdate data kategori !');

    }

    public function destroy (Request $request, $id) {
        Categories::where('id', $id)->delete();
        return redirect()->route('category.index')->with('success', 'Berhasil menghapus data kategori !');
    }

}

