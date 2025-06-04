<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembelianSeeder extends Seeder
{
    public function run()
    {
        DB::table('pembelians')->insert([
            [
                'tiket_id' => 1,
                'jumlah_tiket' => 2,
                'total_harga' => 300000,
                'tanggal_aktif' => now(),
                'bukti_transfer' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tiket_id' => 2,
                'jumlah_tiket' => 1,
                'total_harga' => 100000,
                'tanggal_aktif' => now(),
                'bukti_transfer' => 'transfer123.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
