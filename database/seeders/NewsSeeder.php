<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = \Faker\Factory::create();

        // URL gambar acak dari Lorem Picsum
        $imageUrls = [
            'https://picsum.photos/800/600?random=1',
            'https://picsum.photos/800/600?random=2',
            'https://picsum.photos/800/600?random=3',
            'https://picsum.photos/800/600?random=4',
            'https://picsum.photos/800/600?random=5',
            'https://picsum.photos/800/600?random=6',
            'https://picsum.photos/800/600?random=7',
            'https://picsum.photos/800/600?random=8',
            'https://picsum.photos/800/600?random=9',
            'https://picsum.photos/800/600?random=10',
        ];

        // Pastikan ada kategori di database
        $categories = Category::all();
        if ($categories->isEmpty()) {
            $this->command->error('Seeder gagal: Tidak ada kategori. Jalankan CategorySeeder terlebih dahulu.');
            return;
        }

        // Pastikan ada pengguna di database
        $users = User::all();
        if ($users->isEmpty()) {
            $this->command->error('Seeder gagal: Tidak ada pengguna. Tambahkan pengguna terlebih dahulu.');
            return;
        }

        // Membuat 20 berita acak
        foreach (range(1, 20) as $index) {
            $title = $faker->sentence(6);
            News::create([
                'title' => $title,
                'excerpt' => $faker->paragraph(2),
                'content' => $faker->paragraphs(5, true),
                'slug' => Str::slug($title),
                'image' => $faker->randomElement($imageUrls), // Gambar acak
                'category_id' => $categories->random()->id, // Kategori acak
                'user_id' => $users->random()->id, // Pengguna acak
            ]);
        }

        $this->command->info('Seeder News berhasil dibuat!');
    }
}
