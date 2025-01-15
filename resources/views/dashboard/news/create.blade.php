@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card border-light shadow-sm">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h2 class="h4 fw-semibold mb-0">Edit Berita</h2>
                            <a href="{{ route('dashboard') }}" class="btn btn-danger btn-sm">
                                <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
                            </a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('dashboard.news.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                {{-- Judul --}}
                                <div class="mb-4">
                                    <label for="title" class="form-label">Judul Berita <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        placeholder="Masukkan judul berita yang menarik" value="{{ old('title') }}"
                                        required>
                                    <div class="form-text">Judul akan tampil sebagai headline utama berita.</div>
                                    @error('title')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Kategori --}}
                                <div class="mb-4">
                                    <label for="category" class="form-label">Kategori <span
                                            class="text-danger">*</span></label>
                                    <select name="category_id" id="category" class="form-select" required>
                                        <option value="">Pilih Kategori Berita</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="form-text">Pilih kategori yang sesuai untuk berita ini.</div>
                                    @error('category_id')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Excerpt --}}
                                <div class="mb-4">
                                    <label for="excerpt" class="form-label">Deskripsi Singkat <span
                                            class="text-danger">*</span></label>
                                    <textarea name="excerpt" id="excerpt" rows="3" class="form-control"
                                        placeholder="Tulis deskripsi singkat tentang berita">{{ old('excerpt') }}</textarea>
                                    <div class="form-text">Deskripsi singkat akan tampil sebagai ringkasan berita.</div>
                                    @error('excerpt')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Konten --}}
                                <div class="mb-4">
                                    <label for="content" class="form-label">Konten <span
                                            class="text-danger">*</span></label>
                                    <textarea name="content" id="content" rows="5" class="form-control" placeholder="Tulis konten lengkap berita">{{ old('content') }}</textarea>
                                    <div class="form-text">Tuliskan isi lengkap berita dengan detail yang diperlukan.</div>
                                    @error('content')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Gambar --}}
                                <div class="mb-4">
                                    <label for="image" class="form-label">Gambar Berita</label>
                                    <input type="file" name="image" id="image" class="form-control"
                                        accept="image/*">
                                    <div class="form-text">Upload gambar berformat .jpg, .png, atau .jpeg dengan ukuran
                                        maksimal 2MB.</div>
                                    @error('image')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Link --}}
                                <div class="mb-4">
                                    <label for="link" class="form-label">Tautan Berita (Opsional)</label>
                                    <input type="url" name="link" id="link" class="form-control"
                                        placeholder="Masukkan tautan berita eksternal (jika ada)"
                                        value="{{ old('link') }}">
                                    <div class="form-text">Opsional. Tambahkan tautan jika berita memiliki sumber eksternal.
                                    </div>
                                    @error('link')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Tombol Submit --}}
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="bi bi-save"></i> Simpan
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
