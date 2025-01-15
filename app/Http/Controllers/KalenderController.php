<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;


class KalenderController extends Controller
{
    public function index()
    {
        // Data untuk widget dengan eager loading user dan category
        $latestNews = News::with(['user', 'category'])->latest()->take(5)->get();

        return view('akademik.kalender', compact('latestNews'));
    }
}
