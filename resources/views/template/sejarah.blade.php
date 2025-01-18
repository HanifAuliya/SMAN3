@extends('layouts.guest')

@section('content')
    <!-- Content -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mt-3">
                <h2 class="text-center mb-4 sejarah-sekolah-title">
                    Sejarah Sekolah
                </h2>
                <div class="card p-4 shadow-sm sejarah-sekolah-card">
                    <p>
                        SMAN 3 Barabai, dengan NPSN
                        <strong>30302134</strong>
                        , merupakan sekolah menengah atas negeri yang berlokasi di
                        Jalan Grilya Hasan Baseri No. 4, Desa/Kelurahan Birayang,
                        Kecamatan Batang Alai Selatan, Kabupaten Hulu Sungai Tengah,
                        Provinsi Kalimantan Selatan. Sekolah ini berdiri sejak tahun
                        1988 dengan Surat Keputusan (SK) Pendirian No.
                        <strong>052/0/1988</strong>
                        tertanggal 08 Februari 1988.
                    </p>
                    <p>
                        SMAN 3 Barabai telah meraih akreditasi
                        <strong>A</strong>
                        berdasarkan SK No.
                        <strong>178/BAN-SM-P/AK/XII/2018</strong>
                        tertanggal 21 Desember 2018. Hal ini menunjukkan komitmen
                        sekolah dalam memberikan pendidikan berkualitas dan unggul
                        kepada para siswanya. SMAN 3 Barabai juga memiliki akses
                        internet dengan kecepatan
                        <strong>100 Mb</strong>
                        , yang mendukung proses belajar mengajar modern dan inovatif.
                    </p>
                    <p>
                        Sekolah ini beroperasi dengan waktu penyelenggaraan pagi
                        selama 6 hari dalam seminggu. SMAN 3 Barabai memiliki luas
                        tanah
                        <strong>30.392 m&sup2;</strong>
                        , yang menandakan bahwa sekolah ini memiliki area yang cukup
                        luas untuk menunjang berbagai kegiatan belajar-mengajar,
                        olahraga, dan pengembangan minat bakat siswa.
                    </p>
                    <p>
                        SMAN 3 Barabai juga memiliki website resmi yaitu
                        <a href="http://www.sman3barabai.id" target="_blank" class="sejarah-sekolah-link">
                            http://www.sman3barabai.id
                        </a>
                        yang dapat diakses oleh publik untuk mendapatkan informasi
                        lebih lanjut mengenai sekolah. Anda juga dapat menghubungi
                        SMAN 3 Barabai melalui email
                        <a href="mailto:sman3barabai@gmail.com" class="sejarah-sekolah-link">
                            sman3barabai@gmail.com
                        </a>
                        atau telepon di nomor
                        <strong>05173790361</strong>
                        .
                    </p>
                    <p class="fw-bold text-center mt-4 sejarah-sekolah-highlight">
                        SMAN 3 Barabai: Sekolah yang unggul dan berdedikasi untuk
                        mencetak generasi penerus bangsa yang berakhlak mulia, cerdas,
                        dan berprestasi.
                    </p>
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
