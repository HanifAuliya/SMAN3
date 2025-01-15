<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class TatatertibController extends Controller
{
    public function index()
    {
        // Data untuk widget dengan eager loading user dan category
        $latestNews = News::with(['user', 'category'])->latest()->take(5)->get();

        return view('template.tatatertib', compact('latestNews'));
    }
}
