@extends('layouts.guest')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <h1>{{ $news->title }}</h1>
                <p class="text-muted">
                    Kategori: {{ $news->category->name }} | {{ $news->created_at->format('d/m/Y') }}
                </p>
                <img src="{{ asset('storage/' . $news->image) }}" class="img-fluid my-4" alt="{{ $news->title }}">
                <p>{!! $news->content !!}</p>
                @if ($news->link)
                    <p class="mt-3">
                        <strong>Tautan Berita: </strong>
                        <a href="{{ $news->link }}" target="_blank">{{ $news->link }}</a>
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection
