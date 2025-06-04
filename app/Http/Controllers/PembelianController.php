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

        $searchPembelian = Pembelian::with(['user', 'event', 'kategori', 'tiket'])
            ->when($search, function ($query, $search) {
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('created_at', 'desc')
            ->get();
        $pembelian = Pembelian::with(['user', 'event', 'kategori', 'tiket'])
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('dashboard.user.pembelian', compact('pembelian', 'search'));
    }
    //Tambah pembelian
    public function store(Request $request)
    {
           

            $pembelian = Pembelian::create([
                'user_id' => $request->user_id,
                'event_id' => $request->event_id,
                'kategori_id' => $request->kategori_id,
                'jumlah_tiket' => $request->jumlah_tiket,
                'total_harga' => $request->total_harga,
                'tanggal_aktif' => $request->tanggal_aktif,
                'bukti_transfer' => $request->bukti_transfer,
                'status' => 'Pending'
            ]);

          if ($request->hasFile('bukti_transfer')) {
            $file = $request->file('bukti_transfer');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
            $pembelian->bukti_transfer = $filename;
            $pembelian->save();
        }
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

    public function viewacc(){
        $pembelian = Pembelian::with(['user', 'event', 'kategori', 'tiket'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('dashboard.penyelenggara.pembelian', compact('pembelian'));
    }
}
