@extends('layouts.guest')

@section('content')
    <!-- Content -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mt-3">
                <h2 class="text-center mb-4 sejarah-sekolah-title">
                    Identitas Sekolah
                </h2>
                {{-- Informasi Umum --}}
                <div class="profile-section mb-4">
                    <h2 class="mb-3">Informasi Umum</h2>
                    <ul class="list-unstyled profile-list">
                        <li>
                            <i class="bi bi-building profile-icon"></i>
                            <strong>Nama Sekolah:</strong> SMAN 3 Barabai
                        </li>
                        <li>
                            <i class="bi bi-123 profile-icon"></i>
                            <strong>NPSN:</strong> 30302134
                        </li>
                        <li>
                            <i class="bi bi-person profile-icon"></i>
                            <strong>Bentuk Pendidikan:</strong> SMA
                        </li>
                        <li>
                            <i class="bi bi-check-circle profile-icon"></i>
                            <strong>Status Sekolah:</strong> Negeri
                        </li>
                        <li>
                            <i class="bi bi-award profile-icon"></i>
                            <strong>Akreditasi:</strong> A (Unggul)
                        </li>
                    </ul>
                </div>

                {{-- Informasi Kontak --}}
                <div class="profile-section mb-4">
                    <h2 class="mb-3">Informasi Kontak</h2>
                    <ul class="list-unstyled profile-list">
                        <li>
                            <i class="bi bi-geo-alt profile-icon"></i>
                            <strong>Alamat:</strong> JL. GRILYA HASAN BASERI NO. 4
                        </li>
                        <li>
                            <i class="bi bi-geo-alt profile-icon"></i>
                            <strong>Desa/Kelurahan:</strong> Birayang
                        </li>
                        <li>
                            <i class="bi bi-geo-alt profile-icon"></i>
                            <strong>Kecamatan:</strong> Kec. Batang Alai Selatan
                        </li>
                        <li>
                            <i class="bi bi-geo-alt profile-icon"></i>
                            <strong>Kabupaten/Kota:</strong> Kab. Hulu Sungai Tengah
                        </li>
                        <li>
                            <i class="bi bi-geo-alt profile-icon"></i>
                            <strong>Provinsi:</strong> Prov. Kalimantan Selatan
                        </li>
                        <li>
                            <i class="bi bi-mailbox profile-icon"></i>
                            <strong>Kode Pos:</strong> 71381
                        </li>
                        <li>
                            <i class="bi bi-telephone-fill profile-icon"></i>
                            <strong>Telepon:</strong> (0517) 3790361
                        </li>
                        <li>
                            <i class="bi bi-envelope-fill profile-icon"></i>
                            <strong>Email:</strong> sman3barabai@gmail.com
                        </li>
                    </ul>
                </div>

                {{-- Informasi Operasional --}}
                <div class="profile-section">
                    <h2 class="mb-3">Informasi Operasional</h2>
                    <ul class="list-unstyled profile-list">
                        <li>
                            <i class="bi bi-file-earmark-text profile-icon"></i>
                            <strong>SK Izin Operasional:</strong> 052/0/1988
                        </li>
                        <li>
                            <i class="bi bi-calendar-check profile-icon"></i>
                            <strong>Tanggal SK Izin Operasional:</strong> 08/02/88
                        </li>
                    </ul>
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
