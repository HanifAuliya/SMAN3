<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard.
     */
    public function index(Request $request)
    {
        // Ambil filter dari request
        $search = $request->get('search');
        $category = $request->get('category');
        $perPage = $request->get('perPage', 10); // Default 10 item per halaman

        // Query berita dengan filter
        $query = News::with('category')
            ->when($search, function ($q) use ($search) {
                $q->where('title', 'like', "%$search%");
            })
            ->when($category, function ($q) use ($category) {
                $q->where('category_id', $category);
            });

        // Pagination
        $news = $query->latest()->paginate($perPage);

        // Semua kategori untuk filter
        $categories = Category::all();

        return view('dashboard', compact('news', 'categories', 'search', 'category', 'perPage'));
    }
}
