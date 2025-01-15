<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; // Tambahkan ini

class NewsManagementController extends Controller
{
    /**
     * Tampilkan form tambah berita.
     */
    public function create()
    {
        $categories = Category::all();

        return view('dashboard.news.create', compact('categories'));
    }

    /**
     * Simpan data berita.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string||unique:news|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
            'link' => 'nullable|url', // Validasi URL
        ]);

        $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']);
        $validated['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news-images', 'public');
        }

        News::create($validated);

        // Tambahkan flash message
        return redirect()->route('dashboard')
            ->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit(News $news)
    {
        $categories = Category::all();

        return view('dashboard.news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
            'link' => 'nullable|url',
        ]);

        $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']);

        // Perbarui gambar jika ada file baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($news->image && Storage::disk('public')->exists($news->image)) {
                Storage::disk('public')->delete($news->image);
            }

            // Simpan gambar baru
            $validated['image'] = $request->file('image')->store('news-images', 'public');
        }

        // Perbarui berita di database
        $news->update($validated);

        return redirect()->route('dashboard')->with('success', 'Berita berhasil diperbarui!');
    }



    public function destroy(News $news)
    {
        // Hapus gambar jika ada
        if ($news->image && Storage::disk('public')->exists($news->image)) {
            Storage::disk('public')->delete($news->image);
        }

        // Hapus berita
        $news->delete();

        // Redirect ke dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Berita berhasil dihapus!');
    }
}
