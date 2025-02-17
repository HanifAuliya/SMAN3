<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TenagaKerjaController extends Controller
{
    public function index()
    {
        // Data untuk widget dengan eager loading user dan category
        $latestNews = News::with(['user', 'category'])->latest()->take(5)->get();

        return view('template.tenagakerja', compact('latestNews'));
    }
}
