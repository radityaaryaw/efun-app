<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembelian extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'kategori_id',
        'jumlah_tiket',
        'total_harga',
        'tanggal_aktif',
        'bukti_transfer',
        'status',
    ];

    public function tiket()
    {
        return $this->belongsTo(Tiket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Jika kamu juga punya relasi ke event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
