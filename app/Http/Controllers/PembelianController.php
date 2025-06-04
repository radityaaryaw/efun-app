<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;

class PembelianController extends Controller
{
    // Menampilkan daftar pembelian dengan opsi pencarian
    public function index(Request $request)
    {
        $search = $request->input('search');

        $pembelian = Pembelian::with(['user', 'event', 'kategori', 'tiket'])
            ->when($search, function ($query, $search) {
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.user.pembelian', compact('pembelian', 'search'));
    }
    //Tambah pembelian
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'event_id' => 'required',
            'kategori_id' => 'required',
            'tiket_id' => 'required',
            'jumlah' => 'required|integer|min:1',
            'total_harga' => 'required|integer|min:0',
        ]);

        Pembelian::create($request->all());

        return redirect()->back()->with('success', 'Pembelian berhasil ditambahkan.');
    }

    // Menyetujui pembelian tiket
    public function setuju($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->status = 'Disetujui';
        $pembelian->save();

        return redirect()->back()->with('success', 'Pembelian telah disetujui.');
    }

    // Menolak pembelian tiket
    public function tolak($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->status = 'Ditolak';
        $pembelian->save();

        return redirect()->back()->with('error', 'Pembelian telah ditolak.');
    }
}
