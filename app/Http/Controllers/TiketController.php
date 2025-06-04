<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    // Menampilkan semua tiket
    public function index()
    {
        
        $tikets = Tiket::with(['user', 'penyelenggara', 'kategori','event'])->latest()->get();
        return view('dashboard.admin.tiket', compact('tikets'));
    }

    // Menampilkan form untuk tambah tiket
    public function create()
    {
        $users = User::where('role', 'User')->get();
        $penyelenggaras = User::where('role', 'Penyelenggara')->get();
        $kategoris = Kategori::all();
        return view('dashboard.admin.tiket.create', compact('users', 'penyelenggaras', 'kategoris'));
    }

    // Menyimpan data tiket baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id'           => 'required|exists:users,id',
            'penyelenggara_id'  => 'required|exists:users,id',
            'judul_event'       => 'required|string|max:255',
            'tanggal_event'     => 'required|date',
            'kategori_id'       => 'required|exists:kategoris,id',
            'status_pembayaran' => 'required|in:Belum Dibayar, Sudah Dibayar, Gagal',
        ]);

        Tiket::create($request->all());

        return redirect()->route('tiket.index')->with('success', 'Tiket berhasil dibuat.');
    }

    // Menampilkan detail tiket
    public function show(Tiket $tiket)
    {
        $tiket->load(['user', 'penyelenggara', 'kategori']);
        return view('dashboard.admin.tiket.show', compact('tiket'));
    }

    // Menampilkan form edit tiket
    public function edit(Tiket $tiket)
    {
        $users = User::where('role', 'User')->get();
        $penyelenggaras = User::where('role', 'Penyelenggara')->get();
        $kategoris = Kategori::all();
        return view('dashboard.admin.tiket.edit', compact('tiket', 'users', 'penyelenggaras', 'kategoris'));
    }

    // Memperbarui data tiket
    public function update(Request $request, Tiket $tiket)
    {
        $request->validate([
            'user_id'           => 'required|exists:users,id',
            'penyelenggara_id'  => 'required|exists:users,id',
            'judul_event'       => 'required|string|max:255',
            'tanggal_event'     => 'required|date',
            'kategori_id'       => 'required|exists:kategoris,id',
            'status_pembayaran' => 'required|in:Belum Dibayar,Sudah Bayaran,Gagal',
        ]);

        $tiket->update($request->all());

        return redirect()->route('tiket.index')->with('success', 'Tiket berhasil diperbarui.');
    }

    // Menghapus tiket
    public function destroy(Tiket $tiket)
    {
        $tiket->delete();
        return redirect()->route('tiket.index')->with('success', 'Tiket berhasil dihapus.');
    }
}
