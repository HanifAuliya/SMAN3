@extends('layouts.guest')

@section('content')
    {{-- Statistik --}}
    <div id="statistik" class="statistics">
        <div class="container py-2">
            <div class="row d-flex justify-content-center align-items-center text-center">
                @foreach ($sekolahData as $item)
                    <div class="col-md-2 mb-4">
                        <h2 class="counter" data-target="{{ $item->jumlah }}">0</h2>
                        <p>{{ $item->kategori }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const counters = document.querySelectorAll('.counter');

                counters.forEach(counter => {
                    const target = +counter.getAttribute('data-target'); // Ambil nilai target
                    const duration = 2000; // Durasi animasi (dalam milidetik)
                    const step = target / (duration / 10); // Langkah animasi

                    let current = 0;

                    const updateCounter = () => {
                        if (current < target) {
                            current += step;
                            counter.textContent = Math.ceil(current); // Tampilkan nilai yang dihitung
                            setTimeout(updateCounter, 10); // Update setiap 10ms
                        } else {
                            counter.textContent = target; // Pastikan nilai akhir sama dengan target
                        }
                    };

                    updateCounter();
                });
            });
        </script>

    </div>

    <section id="berita" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">
                <i class="bi bi-newspaper"></i>
                Berita Terbaru
            </h2>

            <div class="row">
                {{-- Carousel Berita Besar --}}
                <div class="col-lg-8">
                    <div id="bigNewsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                        <div class="carousel-inner">
                            @foreach ($bigNews as $index => $big)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <a href="{{ route('news.show', $big->slug) }}" class="text-decoration-none">
                                        <div class="card news-card-large mb-3 position-relative">
                                            <div class="news-image-wrapper">
                                                <img src="{{ asset('storage/' . $big->image) }}" class="news-image w-100"
                                                    alt="{{ $big->title }}" />
                                                <div class="news-caption-overlay">
                                                    <h5 class="card-title">
                                                        <i class="bi bi-bookmark-fill"></i>
                                                        {{ $big->title }}
                                                        <span class="badge bg-primary ms-2">Utama</span>
                                                    </h5>
                                                    <p class="news-date mb-1">
                                                        <i class="bi bi-calendar"></i>
                                                        {{ $big->created_at->format('d/m/Y') }}
                                                        <i class="bi bi-person"></i>
                                                        Admin
                                                    </p>
                                                    <p>{{ $big->excerpt }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            @endforeach
                        </div>

                        {{-- Carousel Controls --}}
                        <button class="carousel-control-prev" type="button" data-bs-target="#bigNewsCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#bigNewsCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                {{-- Berita Kecil --}}
                <div class="col-lg-4">
                    <div class="row">
                        @foreach ($smallNews as $small)
                            <div class="col-md-6 mb-3">
                                <a href="{{ route('news.show', $small->slug) }}" class="text-decoration-none">
                                    <div class="card news-card h-100">
                                        <img src="{{ asset('storage/' . $small->image) }}" class="card-img-top"
                                            alt="{{ $small->title }}" />
                                        <div class="card-body">
                                            <span class="badge bg-info mb-2">{{ $small->category->name }}</span>
                                            <h6 class="card-title">
                                                <i class="bi bi-chat-dots-fill"></i>
                                                {{ $small->title }}
                                            </h6>
                                            <p class="news-date mb-1">
                                                <i class="bi bi-calendar"></i>
                                                {{ $small->created_at->format('d/m/Y') }}
                                            </p>
                                            <p class="news-author mb-0">
                                                <i class="bi bi-person"></i>
                                                Admin
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Berita Per Kategori dan Widget --}}
    <section class="py-5">
        <div class="container">
            <div class="row">
                {{-- bagian kiri --}}
                <div class="col-lg-8">
                    {{-- Prestasi --}}
                    <div class="mb-4">
                        <div class="category-title category-prestasi">PRESTASI</div>
                        <div class="row">
                            {{-- Berita Utama Prestasi --}}
                            @if ($mainPrestasiNews)
                                <div class="col-lg-7">
                                    <div class="card main-card mb-3">
                                        <img src="{{ asset('storage/' . $mainPrestasiNews->image) }}"
                                            alt="{{ $mainPrestasiNews->title }}" class="main-image" />
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div>
                                                    <span class="badge badge-galeri">GALERI</span>
                                                    <span class="badge badge-prestasi">PRESTASI</span>
                                                </div>
                                            </div>
                                            <h5 class="mt-2">
                                                <a href="{{ route('news.show', $mainPrestasiNews->slug) }}"
                                                    class="main-title">
                                                    {{ $mainPrestasiNews->title }}
                                                </a>
                                            </h5>
                                            <p class="text-muted main-meta">
                                                <i class="bi bi-calendar"></i>
                                                {{ $mainPrestasiNews->created_at->format('d/m/Y') }}
                                                <i class="bi bi-person"></i>
                                                {{ $mainPrestasiNews->user->name }}
                                            </p>
                                            <p>{{ $mainPrestasiNews->excerpt }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- Berita Kecil Prestasi --}}
                            <div class="col-lg-4">
                                @foreach ($smallPrestasiNews as $news)
                                    <div class="small-news mb-3">
                                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                            class="small-image" />
                                        <div>
                                            <h6 class="small-title">
                                                <a href="{{ route('news.show', $news->slug) }}" class="small-link">
                                                    {{ $news->title }}
                                                </a>
                                            </h6>
                                            <p class="text-muted small-meta">
                                                <i class="bi bi-calendar"></i>
                                                {{ $news->created_at->format('d/m/Y') }}
                                                <i class="bi bi-person"></i>
                                                {{ $news->user->name }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Berita Sekolah --}}
                    <div class="mb-4">
                        <div class="category-title category-berita">BERITA SEKOLAH</div>
                        <div class="row">
                            {{-- Berita Besar: Berita Sekolah --}}
                            @if ($mainBeritaSekolahNews)
                                <div class="col-lg-7">
                                    <div class="card main-card mb-3">
                                        <img src="{{ asset('storage/' . $mainBeritaSekolahNews->image) }}"
                                            alt="{{ $mainBeritaSekolahNews->title }}" class="main-image" />
                                        <div class="card-body">
                                            <h5 class="mt-2">
                                                <div>
                                                    <span class="badge badge-berita">BERITA SEKOLAH</span>
                                                </div>
                                                <a href="{{ route('news.show', $mainBeritaSekolahNews->slug) }}"
                                                    class="main-title">
                                                    {{ $mainBeritaSekolahNews->title }}
                                                </a>
                                            </h5>
                                            <p class="text-muted main-meta">
                                                <i class="bi bi-calendar"></i>
                                                {{ $mainBeritaSekolahNews->created_at->format('d/m/Y') }}
                                                <i class="bi bi-person"></i>
                                                {{ $mainBeritaSekolahNews->user->name }}
                                            </p>
                                            <p>{{ $mainBeritaSekolahNews->excerpt }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- Berita Kecil: Berita Sekolah --}}
                            <div class="col-lg-4">
                                @foreach ($smallBeritaSekolahNews as $news)
                                    <div class="small-news mb-3">
                                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                            class="small-image" />
                                        <div>
                                            <h6 class="small-title">
                                                <a href="{{ route('news.show', $news->slug) }}" class="small-link">
                                                    {{ $news->title }}
                                                </a>
                                            </h6>
                                            <p class="text-muted small-meta">
                                                <i class="bi bi-calendar"></i>
                                                {{ $news->created_at->format('d/m/Y') }}
                                                <i class="bi bi-person"></i>
                                                {{ $news->user->name }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                    {{-- pengumuman --}}
                    <div class="mb-4">
                        <div class="category-title category-pengumuman">pengumuman</div>
                        <div class="row">
                            {{-- Berita Besar: Pengumuman --}}
                            @if ($mainPengumumanNews)
                                <div class="col-lg-7">
                                    <div class="card main-card mb-3">
                                        <img src="{{ asset('storage/' . $mainPengumumanNews->image) }}"
                                            alt="{{ $mainPengumumanNews->title }}" class="main-image" />
                                        <div class="card-body">
                                            <h5 class="mt-2">
                                                <div>
                                                    <span class="badge badge-pengumuman">PENGUMUMAN</span>
                                                </div>
                                                <a href="{{ route('news.show', $mainPengumumanNews->slug) }}"
                                                    class="main-title">
                                                    {{ $mainPengumumanNews->title }}
                                                </a>
                                            </h5>
                                            <p class="text-muted small-meta">
                                                <i class="bi bi-calendar"></i>
                                                {{ $news->created_at->format('d/m/Y') }}
                                                <i class="bi bi-person"></i>
                                                {{ $news->user->name }}
                                            </p>
                                            <p>{{ $mainPengumumanNews->excerpt }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- Berita Kecil: Pengumuman --}}
                            <div class="col-lg-4">
                                @foreach ($smallPengumumanNews as $news)
                                    <div class="small-news mb-3">
                                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                            class="small-image" />
                                        <div>
                                            <h6 class="small-title">
                                                <a href="{{ route('news.show', $news->slug) }}" class="small-link">
                                                    {{ $news->title }}
                                                </a>
                                            </h6>
                                            <p class="text-muted main-meta">
                                                <i class="bi bi-calendar"></i>
                                                {{ $news->created_at->format('d/m/Y') }}
                                                <i class="bi bi-person"></i>
                                                {{ $news->user->name }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>


                </div>
                {{-- Kolom Kanan: Kepala sekolah and Widget --}}
                <div class="col-lg-4">
                    {{-- Widget Kepala Sekolah --}}
                    <div class="widget mb-4 widget-modern p-3 shadow-sm border rounded bg-white">
                        <h4 class="widget-title text-center mb-3">Kepala Sekolah</h4>
                        <div class="text-center">
                            <img src="{{ asset('assets/img/kepala.jpeg') }}" alt="Kepala Sekolah"
                                class="widget-headmaster-image img-fluid shadow-sm mb-3" />
                            <p class="mt-3 widget-headmaster-name fw-bold">H. MUHAMAD RAHMADI, S.PD, MM</p>
                        </div>
                    </div>

                    {{-- Widget News --}}
                    <div class="widget mb-4 widget-modern">
                        <div class="widget-title">Terbaru</div>
                        @foreach ($latestNews as $news)
                            <div class="d-flex mb-3 widget-news-item">
                                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                    class="widget-news-image" />
                                <div>
                                    <h6 class="widget-news-title">
                                        <a href="{{ route('news.show', $news->slug) }}" class="widget-news-link">
                                            {{ Str::limit($news->title, 50) }}
                                        </a>
                                    </h6>
                                    <p class="text-muted main-meta">
                                        <i class="bi bi-calendar"></i>
                                        {{ $news->created_at->format('d/m/Y') }}
                                        <i class="bi bi-person"></i>
                                        {{ $news->user->name }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Widget Jumlah Pengunjung --}}
                    <div class="widget widget-modern">
                        <div class="widget-title">Jumlah Pengunjung</div>
                        <ul class="list-unstyled widget-visitors">
                            <li>
                                <span>Hari ini:</span>
                                <strong>{{ $visitorCounts['today'] }}</strong>
                            </li>
                            <li>
                                <span>Minggu ini:</span>
                                <strong>{{ $visitorCounts['week'] }}</strong>
                            </li>
                            <li>
                                <span>Bulan ini:</span>
                                <strong>{{ $visitorCounts['month'] }}</strong>
                            </li>
                            <li>
                                <span>Total:</span>
                                <strong>{{ $visitorCounts['total'] }}</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
    </section>
@endsection
