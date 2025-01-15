@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card border-light shadow-sm">
                        <div class="card-header bg-white">
                            <h2 class="h6 fw-semibold text-dark mb-0">Tambah Berita</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('dashboard.news.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                {{-- Judul --}}
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul Berita</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ old('title') }}" required>
                                    @error('title')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Kategori --}}
                                <div class="mb-3">
                                    <label for="category" class="form-label">Kategori</label>
                                    <select name="category_id" id="category" class="form-select" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Excerpt --}}
                                <div class="mb-3">
                                    <label for="excerpt" class="form-label">Deskripsi Singkat</label>
                                    <textarea name="excerpt" id="excerpt" rows="3" class="form-control" required>{{ old('excerpt') }}</textarea>
                                    @error('excerpt')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Konten --}}
                                <div class="mb-3">
                                    <label for="content" class="form-label">Konten</label>
                                    <textarea name="content" id="content" rows="5" class="form-control" required>{{ old('content') }}</textarea>
                                    @error('content')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Gambar --}}
                                <div class="mb-3">
                                    <label for="image" class="form-label">Gambar</label>
                                    <input type="file" name="image" id="image" class="form-control"
                                        accept="image/*">
                                    @error('image')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Link --}}
                                <div class="mb-3">
                                    <label for="link" class="form-label">Tautan Berita (Opsional)</label>
                                    <input type="url" name="link" id="link" class="form-control"
                                        value="{{ old('link') }}">
                                    @error('link')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Tombol Submit --}}
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i> Simpan
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
