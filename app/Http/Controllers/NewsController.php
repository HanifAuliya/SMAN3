<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use App\Models\SekolahData;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Menampilkan daftar berita di halaman awal
     */
    public function index()
    {

        $today = Carbon::today();
        $weekStart = Carbon::now()->startOfWeek();
        $monthStart = Carbon::now()->startOfMonth();

        // Hitung data pengunjung dari tabel visitors
        $visitorCounts = [
            'today' => Visitor::where('visited_date', $today)->count(),
            'week' => Visitor::whereBetween('visited_date', [$weekStart, Carbon::now()])->count(),
            'month' => Visitor::whereBetween('visited_date', [$monthStart, Carbon::now()])->count(),
            'total' => Visitor::count(),
        ];

        // Debug data pengunjung
        $allVisitors = Visitor::all();

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

        $data = SekolahData::all();

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
            'sekolahData' => $data, // Tambahkan data ini
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
        $latestNews = News::with(['user', 'category'])->latest()->take(5)->get();
        return view('news.show', compact('news', 'latestNews'));
    }
}
