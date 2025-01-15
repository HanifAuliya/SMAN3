@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row">
                {{-- Dashboard - Daftar Lokasi --}}
                <div class="col-12 mb-4">
                    <div class="card h-100 border-light shadow-sm">
                        <div class="card-body">
                            <h2 class="h5 fw-semibold text-dark mb-0">Dashboard - Daftar Lokasi</h2>
                            <p class="text-muted small">
                                Halaman ini menampilkan daftar Berita yang sudah terdaftar. Anda dapat mencari
                                lokasi berdasarkan nama, kategori, atau instansi. Anda juga dapat
                                menambahkan
                                atau menghapus data yang ada.
                            </p>
                        </div>
                    </div>
                </div>
                {{-- Manual Pengguna --}}
                <div class="col-12 mb-4">
                    <div class="card h-100 border-light shadow-sm">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="h6 fw-semibold text-dark mb-1">Manual Pengguna</h2>
                                <p class="text-muted small mb-0">
                                    Panduan lengkap untuk menggunakan aplikasi ini tersedia. Klik tombol di samping
                                    untuk membaca manual pengguna.
                                </p>
                            </div>
                            <div>
                                <a href="" target="_blank" class="btn btn-primary">
                                    <i class="fas fa-file-pdf me-1"></i> Lihat Manual Pengguna
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Tabel --}}
                {{-- Filter dan Search --}}
                <div class="col-12 mb-4">
                    <form method="GET" action="{{ route('dashboard') }}" class="row g-2 mb-3">
                        <div class="col-md-7">
                            <input type="text" name="search" class="form-control" placeholder="Cari judul berita..."
                                value="{{ request('search') }}">
                        </div>
                        <div class="col-md-2">
                            <select name="category" class="form-select">
                                <option value="">Semua Kategori</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}"
                                        {{ request('category') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-1">
                            <select name="perPage" class="form-select">
                                <option value="5" {{ request('perPage') == 5 ? 'selected' : '' }}>5</option>
                                <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                                <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25</option>
                                <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-warning w-100">
                                <i class="fas fa-search"></i> Filter
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-12 mb-4">
                    <div class="card h-100 border-light shadow-sm">
                        <div class="card-header bg-white d-flex justify-content-between align-items-center">
                            <h2 class="h6 fw-semibold text-dark mb-0">Dashboard - Daftar Berita</h2>
                            <a href="{{ route('dashboard.news.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-1"></i> Tambah Berita
                            </a>
                        </div>


                        {{-- Tabel Berita --}}
                        <div class="card border-light shadow-sm">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr class="table-light">
                                                <th>No</th>
                                                <th>Judul Berita</th>
                                                <th>Kategori</th>
                                                <th>Tanggal Publikasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($news as $index => $item)
                                                <tr>
                                                    <td>{{ $news->firstItem() + $index }}</td>
                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item->category->name }}</td>
                                                    <td>{{ $item->created_at->format('d M Y') }}</td>
                                                    <td>
                                                        <a href="{{ route('dashboard.news.edit', $item->id) }}"
                                                            class="btn btn-sm btn-outline-warning">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        <button class="btn btn-sm btn-outline-danger delete-btn"
                                                            data-id="{{ $item->id }}"
                                                            data-title="{{ $item->title }}">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>

                                                        <form id="delete-form-{{ $item->id }}"
                                                            action="{{ route('dashboard.news.destroy', $item->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center text-muted">Tidak ada data berita.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                {{-- Pagination Links --}}
                                <div class="d-flex justify-content-center mt-3">
                                    {{ $news->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
