<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Tampilkan semua kategori
    public function index()
    {
        $kategoris = Kategori::all();
        return view('dashboard.admin.category', compact('kategoris'));
    }

    // Form tambah kategori
    public function create()
    {
        return view('dashboard.admin.category_create'); // sesuaikan viewnya
    }

    // Simpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoris,nama_kategori',
            'sub_kategori'  => 'required|string|max:255|unique:kategoris,sub_kategori',
        ]);

        Kategori::create($request->only(['nama_kategori', 'sub_kategori']));

        return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil dibuat.');
    }

    // Tampilkan detail kategori
    public function show(Kategori $category)
    {
        // Sesuaikan variabel jika perlu, karena route model binding berdasarkan nama parameter
        return view('dashboard.admin.category_show', ['kategori' => $category]);
    }

    // Form edit kategori
    public function edit(Kategori $category)
    {
        return view('dashboard.admin.category_edit', ['kategori' => $category]);
    }

    // Update data kategori
    public function update(Request $request, Kategori $category)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoris,nama_kategori,' . $category->id,
            'sub_kategori'  => 'required|string|max:255|unique:kategoris,sub_kategori,' . $category->id,
        ]);

        $category->update($request->only(['nama_kategori', 'sub_kategori']));

        return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    // Hapus kategori
    public function destroy(Kategori $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
