@extends('layouts.guest')

@section('content')
    {{-- Berita Utama --}}
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
                                    <div class="card news-card-large mb-3 position-relative">
                                        <div class="news-image-wrapper">
                                            <img src="{{ asset($big->image) }}" class="news-image w-100"
                                                alt="{{ $big->title }}" />
                                            {{-- Overlay Caption --}}
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
                                <div class="card news-card h-100">
                                    <img src="{{ asset($small->image) }}" class="card-img-top" alt="{{ $small->title }}" />
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
                                        <img src="{{ asset($mainPrestasiNews->image) }}"
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
                                        <img src="{{ asset($news->image) }}" alt="{{ $news->title }}"
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
                                        <img src="{{ asset($mainBeritaSekolahNews->image) }}"
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
                                        <img src="{{ asset($news->image) }}" alt="{{ $news->title }}"
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
                        <<div class="row">
                            {{-- Berita Besar: Pengumuman --}}
                            @if ($mainPengumumanNews)
                                <div class="col-lg-7">
                                    <div class="card main-card mb-3">
                                        <img src="{{ asset($mainPengumumanNews->image) }}"
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
                                        <img src="{{ asset($news->image) }}" alt="{{ $news->title }}"
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

            {{-- Kolom Kanan: Widget --}}
            <div class="col-lg-4">
                {{-- Widget Kepala Sekolah --}}
                <div class="widget mb-4 widget-modern">
                    <div class="widget-title">Kepala Sekolah</div>
                    <div class="text-center">
                        <img src="/assets/img/kepala.jpeg" alt="Kepala Sekolah" class="widget-headmaster-image" />
                        <p class="mt-3 widget-headmaster-name">Nama Kepala Sekolah</p>
                    </div>
                </div>

                {{-- Widget News --}}
                <div class="widget mb-4 widget-modern">
                    <div class="widget-title">Terbaru</div>
                    <div class="d-flex mb-3 widget-news-item">
                        <img src="assets/img/background.jpg" alt="News 1" class="widget-news-image" />
                        <div>
                            <h6 class="widget-news-title">
                                <a href="#" class="widget-news-link">
                                    Pengumuman pengumuman Semester Genap
                                </a>
                            </h6>
                            <p class="text-muted main-meta">
                                <i class="bi bi-calendar"></i>
                                30/09/2023
                                <i class="bi bi-person"></i>
                                Admin
                            </p>
                        </div>
                    </div>
                    <div class="d-flex mb-3 widget-news-item">
                        <img src="assets/img/background.jpg" alt="News 2" class="widget-news-image" />
                        <div>
                            <h6 class="widget-news-title">
                                <a href="#" class="widget-news-link">
                                    Pengumuman Kegiatan Sekloooah berdasarkan kisahnyataasdasd
                                    Tahun ajaran 2024/2024
                                </a>
                            </h6>
                            <p class="text-muted main-meta">
                                <i class="bi bi-calendar"></i>
                                30/09/2023
                                <i class="bi bi-person"></i>
                                Admin
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Widget Jumlah Pengunjung --}}
                <div class="widget widget-modern">
                    <div class="widget-title">Jumlah Pengunjung</div>
                    <ul class="list-unstyled widget-visitors">
                        <li>
                            <span>Hari ini:</span>
                            <strong>150</strong>
                        </li>
                        <li>
                            <span>Minggu ini:</span>
                            <strong>1,050</strong>
                        </li>
                        <li>
                            <span>Bulan ini:</span>
                            <strong>4,500</strong>
                        </li>
                        <li>
                            <span>Total:</span>
                            <strong>120,000</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
