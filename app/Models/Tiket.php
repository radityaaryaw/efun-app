<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $fillable = [
        'penyelenggara_id',
        'user_id',
        'judul_event',
        'tanggal_event',
        'kategori_id',
        'status_pembayaran',
    ];

    // Relasi ke penyelenggara (User)
    public function penyelenggara()
    {
        return $this->belongsTo(User::class, 'penyelenggara_id');
    }

    // Relasi ke pembeli (User)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    

}
