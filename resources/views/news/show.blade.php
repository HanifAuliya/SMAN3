@extends('guest.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <h1>{{ $news->title }}</h1>
                <p class="text-muted">
                    Kategori: {{ $news->category->name }} | {{ $news->created_at->format('d/m/Y') }}
                </p>
                <img src="{{ asset($news->image) }}" class="img-fluid my-4" alt="{{ $news->title }}">
                <p>{{ $news->content }}</p>
            </div>
        </div>
    </div>
@endsection
