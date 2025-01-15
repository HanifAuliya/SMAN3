<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Headmaster;


class HeadmasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Headmaster::create([
            'name' => 'Drs. H. Ahmad Barabai',
            'photo' => 'assets/img/kepala.jpeg', // Path gambar
        ]);
    }
}
