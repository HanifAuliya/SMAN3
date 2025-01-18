@extends('layouts.app')

@section('title', 'Edit Sekolah Data - Dashboard SMAN 3')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Edit Data</h1>
        <form action="{{ route('dashboard.sekolahdata.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $data->kategori }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $data->jumlah }}"
                    required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('dashboard.sekolahdata.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
