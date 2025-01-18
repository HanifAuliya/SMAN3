<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beranda - SMAN 3 Barabai</title>

    {{-- Meta SEO --}}
    <meta name="description"
        content="Selamat datang di website resmi SMAN 3 Barabai, SMA unggulan di Barabai dengan berbagai informasi tentang sekolah, program, dan kegiatan terbaru." />
    <meta name="keywords"
        content="SMAN 3 Barabai, Sekolah Menengah Atas, SMA Barabai, Sekolah Negeri, Informasi Sekolah, Pendidikan Barabai" />
    <meta name="author" content="SMAN 3 Barabai" />
    <meta name="robots" content="index, follow" />
    <meta property="og:title" content="Beranda - SMAN 3 Barabai" />
    <meta property="og:description"
        content="Selamat datang di website resmi SMAN 3 Barabai. Temukan berbagai informasi seputar sekolah, program unggulan, dan kegiatan terbaru." />
    <meta property="og:image" content="{{ asset('assets/img/logo.png') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Beranda - SMAN 3 Barabai" />
    <meta name="twitter:description"
        content="Selamat datang di website resmi SMAN 3 Barabai. Dapatkan informasi terbaru tentang sekolah kami." />
    <meta name="twitter:image" content="{{ asset('assets/img/logo.png') }}" />

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo.png') }}" />

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>


<body>
    {{-- Navbar --}}
    @include('layouts.partial.navbar')

    {{-- Hero Section --}}
    <div class="hero"
        style="--bg1: url('{{ asset('assets/img/background.jpg') }}'); --bg2: url('{{ asset('assets/img/background2.jpg') }}');">
        <h1>Selamat Datang di SMAN 3 Barabai</h1>
        <p>Unggul dalam Prestasi, Berkarakter, dan Inovatif</p>
    </div>


    {{-- Main Content --}}
    @yield('content')

    {{-- footer --}}
    @include('layouts.partial.footer')
    {{-- Boostrap 5 --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
