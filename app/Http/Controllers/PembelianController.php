<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;

class PembelianController extends Controller
{
    // Untuk User dan Penyelenggara - Menampilkan daftar pembelian
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'User') {
            $pembelian = Pembelian::with(['user', 'event', 'kategori', 'tiket'])
                ->where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->get();

            return view('dashboard.user.pembelian', compact('pembelian'));
        } elseif ($user->role === 'Penyelenggara') {
            // Ambil pembelian untuk event yang dibuat oleh penyelenggara ini
            $pembelian = Pembelian::with(['user', 'event', 'kategori', 'tiket'])
                ->whereHas('event', function ($query) use ($user) {
                    $query->where('user_id', $user->id); // Asumsi event punya kolom user_id (penyelenggara)
                })
                ->orderBy('created_at', 'desc')
                ->get();

            return view('dashboard.penyelenggara.pembelian', compact('pembelian'));
        }

        abort(403);
    }
    // Form tambah pembelian
    public function create()
    {
        return view('dashboard.user.pembelian-create');
    }

    // Menyimpan data pembelian
    public function store(Request $request)
    {
        $request->validate([
            'user_id'        => 'required|exists:users,id',
            'event_id'       => 'required|exists:events,id',
            'kategori_id'    => 'required|exists:kategoris,id',
            'jumlah_tiket'   => 'required|integer|min:1',
            'total_harga'    => 'required|numeric|min:0',
            'tanggal_aktif'  => 'required|date',
            'bukti_transfer' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $pembelian = new Pembelian([
            'user_id'       => $request->user_id,
            'event_id'      => $request->event_id,
            'kategori_id'   => $request->kategori_id,
            'jumlah_tiket'  => $request->jumlah_tiket,
            'total_harga'   => $request->total_harga,
            'tanggal_aktif' => $request->tanggal_aktif,
            'status'        => 'Pending'
        ]);

        if ($request->hasFile('bukti_transfer')) {
            $file = $request->file('bukti_transfer');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
            $pembelian->bukti_transfer = $filename;
        }

        $pembelian->save();

        return redirect()->back()->with('success', 'Pembelian berhasil ditambahkan.');
    }

    // Menampilkan detail pembelian
    public function show($id)
    {
        $pembelian = Pembelian::with(['user', 'event', 'kategori', 'tiket'])->findOrFail($id);
        return view('dashboard.user.pembelian-show', compact('pembelian'));
    }

    // Form edit pembelian
    public function edit($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        return view('dashboard.user.pembelian-edit', compact('pembelian'));
    }

    // Update data pembelian
    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah_tiket'   => 'required|integer|min:1',
            'total_harga'    => 'required|numeric|min:0',
            'tanggal_aktif'  => 'required|date',
            'bukti_transfer' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $pembelian = Pembelian::findOrFail($id);
        $pembelian->update($request->only(['jumlah_tiket', 'total_harga', 'tanggal_aktif']));

        if ($request->hasFile('bukti_transfer')) {
            $file = $request->file('bukti_transfer');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
            $pembelian->bukti_transfer = $filename;
        }

        $pembelian->save();

        return redirect()->back()->with('success', 'Data pembelian berhasil diperbarui.');
    }

    // Menghapus data pembelian
    public function destroy($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();

        return redirect()->back()->with('success', 'Data pembelian berhasil dihapus.');
    }

    // Menyetujui pembelian
    public function setuju($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->status = 'Disetujui';
        $pembelian->save();

        return redirect()->back()->with('success', 'Pembelian telah disetujui.');
    }

    // Menolak pembelian
    public function tolak($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->status = 'Ditolak';
        $pembelian->save();

        return redirect()->back()->with('error', 'Pembelian telah ditolak.');
    }

    // Cetak satu pembelian
    public function cetakPembelian($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        return view('dashboard.penyelenggara.cetak', compact('pembelian'));
    }

    // Cetak semua pembelian
    public function cetakAllPembelian()
    {
        $pembelian = Pembelian::all();
        return view('dashboard.penyelenggara.cetak-all', compact('pembelian'));
    }

    // Export PDF
    public function cetakPdfPembelian()
    {
        $pembelian = Pembelian::all();
        // Proses export PDF (gunakan dompdf atau laravel-snappy)
        return view('dashboard.penyelenggara.cetak-pdf', compact('pembelian'));
    }

    // Export Excel
    public function cetakExcelPembelian()
    {
        $pembelian = Pembelian::all();
        // Proses export Excel (gunakan Laravel Excel)
        return view('dashboard.penyelenggara.cetak-excel', compact('pembelian'));
    }
}
