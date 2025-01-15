<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SekolahDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sekolah_data')->insert([
            ['kategori' => 'Jumlah Ruang', 'jumlah' => 21],
            ['kategori' => 'Jumlah Guru', 'jumlah' => 42],
            ['kategori' => 'Jumlah Tenaga Pendidik', 'jumlah' => 11],
            ['kategori' => 'Jumlah Peserta Didik', 'jumlah' => 643],
            ['kategori' => 'Jumlah Rombel', 'jumlah' => 19],
        ]);
    }
}
