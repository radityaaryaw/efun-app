<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Kategori;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Tampilkan daftar event dengan pencarian opsional
    public function index(Request $request)
    {
        $user = auth()->user();
        $search = $request->input('search');
        $kategoris = Kategori::all();

        $query = Event::with('kategori', 'penyelenggara', 'tikets');

        if ($user->role === 'Admin') {
            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('judul', 'like', "%{$search}%")
                        ->orWhere('lokasi', 'like', "%{$search}%");
                });
            }

            $events = $query->orderBy('created_at', 'desc')->paginate(10);
            return view('dashboard.admin.eventmenu.event', compact('events', 'search', 'kategoris'));
        } elseif ($user->role === 'Penyelenggara') {
            $query->where('penyelenggara_id', $user->id);

            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('judul', 'like', "%{$search}%")
                        ->orWhere('lokasi', 'like', "%{$search}%");
                });
            }

            $events = $query->orderBy('created_at', 'desc')->paginate(10);
            return view('dashboard.penyelenggara.pengajuan.event', compact('events', 'search', 'kategoris'));
        } else {
            abort(403, 'Unauthorized');
        }
    }

    // Tampilkan form tambah event
    public function create()
    {
        $kategoris = Kategori::all();
        return view('dashboard.user.event_create', compact('kategoris'));
    }

    // Simpan event baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'         => 'required|string|max:255',
            'deskripsi'     => 'nullable|string',
            'tanggal_event' => 'required|date',
            'lokasi'        => 'required|string|max:255',
            'harga_tiket'   => 'required|integer|min:0',
            'kategori_id'   => 'required|exists:kategoris,id',
            'event_img'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('event_img')) {
            $validated['event_img'] = $request->file('event_img')->store('events', 'public');
        }

        $validated['status'] = 'Pending'; // Status default

        Event::create($validated);

        return redirect()->route('events.index')->with('success', 'Event berhasil ditambahkan!');
    }

    // Tampilkan detail event
    public function show(Event $event)
    {
        return view('dashboard.user.event_show', compact('event'));
    }

    // Tampilkan form edit event
    public function edit(Event $event)
    {
        $kategoris = Kategori::all();
        return view('dashboard.user.event_edit', compact('event', 'kategoris'));
    }

    // Update event
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_event' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'harga_tiket' => 'required|integer|min:0',
            'status' => 'required|in:Pending,Disetujui,Ditolak',
            'kategori_id' => 'required|exists:kategoris,id',
            'event_img' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'tanggal_event', 'lokasi', 'harga_tiket', 'status', 'kategori_id']);

        if ($request->hasFile('event_img')) {
            // Hapus file lama jika ada
            if ($event->event_img && file_exists(public_path($event->event_img))) {
                unlink(public_path($event->event_img));
            }

            $file = $request->file('event_img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('event_imgs'), $filename);
            $data['event_img'] = 'event_imgs/' . $filename;
        }

        $event->update($data);

        return redirect()->route('penyelenggara.event.index')->with('success', 'Event berhasil diperbarui.');
    }


    // Hapus event
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event berhasil dihapus!');
    }

    // Setujui event
    public function approve(Event $event)
    {
        $event->status = 'Disetujui';
        $event->save();

        return redirect()->back()->with('success', 'Event berhasil disetujui.');
    }

    // Tolak event
    public function reject(Event $event)
    {
        $event->status = 'Ditolak';
        $event->save();

        return redirect()->back()->with('success', 'Event berhasil ditolak.');
    }
}
