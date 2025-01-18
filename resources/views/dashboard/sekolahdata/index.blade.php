@extends('layouts.app')

@section('title', 'Tabel Sekolah Data - Dashboard SMAN 3')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Data Sekolah</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sekolahData as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>
                            <a href="{{ route('dashboard.sekolahdata.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
