<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    protected $casts = [
        'tanggal_event' => 'datetime',
    ];

    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal_event',
        'lokasi',
        'harga_tiket',
        'kategori_id',
        'penyelenggara_id',
        'event_img',
        'status', // ditambahkan agar bisa diisi lewat mass-assignment
    ];

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    // Relasi ke user penyelenggara
    public function penyelenggara()
    {
        return $this->belongsTo(User::class, 'penyelenggara_id');
    }

    // Relasi ke tiket
    public function tikets()
    {
        return $this->hasMany(Tiket::class);
    }
}
