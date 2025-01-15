@extends('layouts.guest')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <h1>{{ $news->title }}</h1>
                <p class="text-muted">
                    <span
                        class="badge 
                        @if ($news->category->name === 'Galeri') badge-galeri 
                        @elseif ($news->category->name === 'Prestasi') badge-prestasi 
                        @elseif ($news->category->name === 'Pengumuman') badge-pengumuman 
                        @elseif ($news->category->name === 'Berita Sekolah') badge-berita 
                        @elseif ($news->category->name === 'PPDB') badge-PPDB @endif">
                        {{ $news->category->name }}
                    </span>
                    <i class="bi bi-calendar"></i>
                    {{ $news->created_at->format('d/m/Y') }}

                    | <i class="bi bi-person"></i> Admin

                </p>


                <img src="{{ asset('storage/' . $news->image) }}" class="img-fluid my-4" alt="{{ $news->title }}">
                <p>{!! $news->content !!}</p>
                @if ($news->link)
                    <p class="mt-3">
                        <strong>Tautan Berita: </strong>
                        <a href="{{ $news->link }}" target="_blank">{{ $news->link }}</a>
                    </p>
                @endif
            </div>

            {{-- Kolom Kanan: Kepala Sekolah dan Widget --}}
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
                <div class="widget mb-4 widget-modern p-3 shadow-sm border rounded bg-white">
                    <h4 class="widget-title mb-3">Berita Terbaru</h4>
                    @foreach ($latestNews as $news)
                        <div class="d-flex mb-3 widget-news-item">
                            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                                class="widget-news-image rounded shadow-sm me-3"
                                style="width: 70px; height: 70px; object-fit: cover;" />
                            <div>
                                <h6 class="widget-news-title">
                                    <a href="{{ route('news.show', $news->slug) }}"
                                        class="widget-news-link text-decoration-none">
                                        {{ Str::limit($news->title, 50) }}
                                    </a>
                                </h6>
                                <p class="text-muted small mb-0">
                                    <i class="bi bi-calendar"></i> {{ $news->created_at->format('d/m/Y') }}
                                    <i class="bi bi-person"></i> {{ $news->user->name }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
