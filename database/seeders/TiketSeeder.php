<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { {
            DB::table('tikets')->insert([
                [
                    'event_id' => 1,
                    'user_id' => 3,  // user biasa beli tiket konser
                    'status_pembayaran' => 'Belum Dibayar',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'event_id' => 2,
                    'user_id' => 3,
                    'status_pembayaran' => 'Sudah Dibayar',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
