<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Menampilkan daftar berita di halaman awal
     */
    public function index()
    {
        // Ambil semua berita untuk bagian umum
        $news = News::with(['user', 'category'])->latest()->get();

        // Berita besar dan kecil untuk bagian umum
        $bigNews = $news->take(2);
        $smallNews = $news->skip(2)->take(4);

        // Ambil berita berdasarkan kategori menggunakan helper
        $prestasiNews = $this->getNewsByCategory('Prestasi');
        $beritaSekolahNews = $this->getNewsByCategory('Berita Sekolah');
        $pengumumanNews = $this->getNewsByCategory('Pengumuman');

        // Ambil berita terbaru untuk widget
        $latestNews = $news->take(5); // Ambil 5 berita terbaru untuk ditampilkan di widget

        // Jumlah pengunjung (contoh data statis, Anda dapat mengganti ini dengan data dari database)
        $visitorCounts = [
            'today' => 150,
            'week' => 1050,
            'month' => 4500,
            'total' => 120000,
        ];

        return view('home', [
            'bigNews' => $bigNews,
            'smallNews' => $smallNews,
            'mainPrestasiNews' => $prestasiNews['mainNews'],
            'smallPrestasiNews' => $prestasiNews['smallNews'],
            'mainBeritaSekolahNews' => $beritaSekolahNews['mainNews'],
            'smallBeritaSekolahNews' => $beritaSekolahNews['smallNews'],
            'mainPengumumanNews' => $pengumumanNews['mainNews'],
            'smallPengumumanNews' => $pengumumanNews['smallNews'],
            'latestNews' => $latestNews,
            'visitorCounts' => $visitorCounts,
        ]);
    }



    private function getNewsByCategory($categoryName)
    {
        // Ambil kategori berdasarkan nama
        $category = Category::where('name', $categoryName)->first();

        if (!$category) {
            return ['mainNews' => null, 'smallNews' => collect([])];
        }

        // Ambil berita berdasarkan kategori
        $news = News::with('user')
            ->where('category_id', $category->id)
            ->latest()
            ->get();

        return [
            'mainNews' => $news->first(), // Berita besar
            'smallNews' => $news->skip(1)->take(4), // Berita kecil
        ];
    }


    /**
     * Menampilkan detail berita berdasarkan slug
     */
    public function show($slug)
    {
        $news = News::where('slug', $slug)->with('category')->firstOrFail();
        return view('news.show', compact('news'));
    }
}
