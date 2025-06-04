<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        DB::table('kategoris')->insert([
            ['nama_kategori' => 'Musik', 'sub_kategori' => 'Konser'],
            ['nama_kategori' => 'Olahraga', 'sub_kategori' => 'Sepak Bola'],
            ['nama_kategori' => 'Seni', 'sub_kategori' => 'Pameran'],
        ]);
    }
}
