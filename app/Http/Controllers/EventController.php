<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Kategori;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Tampilkan daftar event (dengan pencarian opsional)
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Event::with('kategori');

        if ($search) {
            $query->where('judul', 'like', "%{$search}%")
                  ->orWhere('lokasi', 'like', "%{$search}%");
        }

        $events = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard.admin.eventmenu.event', compact('events', 'search'));
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

        $validated['status'] = 'Pending'; // Default status saat membuat event

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

        $event->update($validated);

        return redirect()->route('events.index')->with('success', 'Event berhasil diperbarui!');
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
