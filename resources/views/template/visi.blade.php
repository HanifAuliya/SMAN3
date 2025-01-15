@extends('layouts.guest')

@section('content')
    <!-- Content -->
    <div class="container py-5">
        <div class="row">
            {{-- Kolom Kiri: Informasi Sekolah --}}
            <div class="col-lg-8">
                <div class="row justify-content-center">
                    <div class="container py-5">
                        <!-- Visi -->
                        <div class="card border border-primary shadow-sm mb-4">
                            <div class="card-body">
                                <h3 class="text-center text-primary mb-3">Visi Sekolah</h3>
                                <p class="text-center">
                                    Terwujudnya sumber daya manusia yang mantap spiritual,
                                    cerdas, mandiri, sehat jasmani, berkepribadian, serta
                                    bertanggung jawab.
                                </p>
                            </div>
                        </div>

                        <!-- Misi -->
                        <div class="card border border-success shadow-sm mb-4">
                            <div class="card-body">
                                <h3 class="text-center text-success mb-3">Misi Sekolah</h3>
                                <ul class="list-unstyled text-center">
                                    <li class="mb-2">
                                        Mengupayakan pemantapan spiritual melalui penanaman aqidah, ibadah, dan akhlak yang
                                        mulia.
                                    </li>
                                    <li class="mb-2">
                                        Mengupayakan siswa lulusan yang berpikir rasional, dan mampu memecahkan masalah.
                                    </li>
                                    <li class="mb-2">
                                        Meningkatkan kesehatan fisik dan berprestasi dalam olahraga.
                                    </li>
                                    <li class="mb-2">
                                        Meningkatkan kepribadian yang kuat, percaya diri, bersemangat, murah hati, dan
                                        memiliki kepekaan sosial.
                                    </li>
                                    <li class="mb-2">
                                        Memberdayakan seluruh komponen sekolah untuk memahami hak dan kewajiban.
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Tujuan -->
                        <div class="card border border-info shadow-sm">
                            <div class="card-body">
                                <h3 class="text-center text-info mb-3">Tujuan Sekolah</h3>
                                <p class="text-center">
                                    Sebagai bagian dari tujuan pendidikan nasional adalah meningkatkan kecerdasan,
                                    pengetahuan, kepribadian, akhlak mulia, serta keterampilan untuk hidup mandiri
                                    dan mengikuti pendidikan lebih lanjut.
                                </p>
                            </div>
                        </div>
                    </div>

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
                <div class="widget mb-4 widget-modern p-3 shadow-sm border rounded bg-white">
                    <h4 class="widget-title mb-3">Berita Terbaru</h4>
                    @foreach ($latestNews as $news)
                        <div class="d-flex mb-3 widget-news-item">
                            <img src="{{ asset($news->image) }}" alt="{{ $news->title }}"
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
