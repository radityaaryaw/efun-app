<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    public function run()
    {
        DB::table('events')->insert([
            [
                'judul' => 'Konser Musik Rock',
                'deskripsi' => 'Konser musik rock terbesar tahun ini.',
                'tanggal_event' => '2025-08-15',
                'lokasi' => 'Stadion Utama',
                'harga_tiket' => 150000,
                'event_img' => 'contoh.png',
                'status' => 'Pending',
                'kategori_id' => 1,           // Pastikan ID kategori valid
                'penyelenggara_id' => 2,      // Pastikan ID user valid
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Pertandingan Sepak Bola',
                'deskripsi' => 'Pertandingan sepak bola antar klub terbaik.',
                'tanggal_event' => '2025-09-10',
                'lokasi' => 'Stadion Sepak Bola',
                'harga_tiket' => 100000,
                'event_img' => 'logo.png',
                'status' => 'Pending',
                'kategori_id' => 2,
                'penyelenggara_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
