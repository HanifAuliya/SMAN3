@extends('layouts.guest')

@section('title', 'Struktur Organisasi - SMAN 3 Barabai')


@section('content')
    {{-- Content --}}
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mt-3 mx-auto">
                <h3 class="text-center mb-4">Struktur Organisasi</h3>
                <div class="text-center">
                    <img src="{{ asset('assets/img/struktur.jpeg') }}" alt="Struktur Organisasi"
                        class="img-fluid rounded shadow-sm">
                </div>
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
            </div>
        </div>
    </div>
@endsection
