<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
        {{-- Logo / Brand --}}
        <a class="navbar-brand d-flex align-items-center px-3" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" style="width: 30px; height: auto;" class="me-3">
            <span class="fw-bold">SMAN 3 Barabai</span>
        </a>


        {{-- Toggler untuk Perangkat Kecil --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menu Navigasi --}}
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                {{-- Beranda --}}
                <li class="nav-item">
                    <a class="nav-link active" href="landing.html">Beranda</a>
                </li>

                {{-- Profil Sekolah --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profilDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Profil Sekolah
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="profilDropdown">
                        <li>
                            <a class="dropdown-item" href="profil-identitas.html">
                                Identitas
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="profil-sejarah.html">
                                Sejarah
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="profil-visi-misi.html">
                                Visi & Misi
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="profil-struktur.html">
                                Struktur
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="profil-kepala-guru.html">
                                Kepala Sekolah
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="profil-tata-tertib.html">
                                Tata Tertib
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Berita dan Pengumuman --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="beritaDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Pengumuman
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="beritaDropdown">
                        <li>
                            <a class="dropdown-item" href="berita-kegiatan.html">
                                Kegiatan Sekolah
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="pengumuman.html">Pengumuman</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="agenda-acara.html">
                                Agenda Acara
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Informasi Akademik --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="akademikDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Informasi Akademik
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="akademikDropdown">
                        <li>
                            <a class="dropdown-item" href="kurikulum.html">
                                Kurikulum dan Mata Pelajaran
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="kalender-akademik.html">
                                Kalender Akademik
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- TU dan Perpustakaan --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="tuDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        TU dan Perpustakaan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="tuDropdown">
                        <li>
                            <a class="dropdown-item" href="sop.html">
                                Standar Operasional Prosedur
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="ebook.html">
                                Buku Elektronik (E-Book)
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Kegiatan Sekolah --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="kegiatanDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Kegiatan Sekolah
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="kegiatanDropdown">
                        <li>
                            <a class="dropdown-item" href="organisasi-siswa.html">
                                Organisasi Siswa
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="ekstrakurikuler.html">
                                Ekstrakurikuler
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="ppdb.html">PPDB</a></li>
                    </ul>
                </li>

                {{-- Unduhan dan Galeri --}}
                <li class="nav-item">
                    <a class="nav-link" href="galeri-unduhan.html">Galeri</a>
                </li>

                {{-- Tombol Login --}}
                <li class="nav-item">
                    <a href="login.html" class="btn btn-outline-primary ms-3 px-4 py-2 rounded-pill">
                        Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>