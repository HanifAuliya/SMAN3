<div class="col-lg-4">
    {{-- Widget Kepala Sekolah --}}
    <div class="widget mb-4 widget-modern">
        <div class="widget-title">Kepala Sekolah</div>
        <div class="text-center">
            <img src="{{ asset('assets/img/kepala.jpeg') }}" alt="Kepala Sekolah" class="widget-headmaster-image" />
            <p class="mt-3 widget-headmaster-name">Nama Kepala Sekolah</p>
        </div>
    </div>

    {{-- Widget News --}}
    <div class="widget mb-4 widget-modern">
        <div class="widget-title">Terbaru</div>
        @foreach ($latestNews as $news)
            <div class="d-flex mb-3 widget-news-item">
                <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" class="widget-news-image" />
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

    {{-- Widget Jumlah Pengunjung --}}
    <div class="widget widget-modern">
        <div class="widget-title">Jumlah Pengunjung</div>
        <ul class="list-unstyled widget-visitors">
            <li>
                <span>Hari ini:</span>
                <strong>{{ $visitorCounts['today'] }}</strong>
            </li>
            <li>
                <span>Minggu ini:</span>
                <strong>{{ $visitorCounts['week'] }}</strong>
            </li>
            <li>
                <span>Bulan ini:</span>
                <strong>{{ $visitorCounts['month'] }}</strong>
            </li>
            <li>
                <span>Total:</span>
                <strong>{{ $visitorCounts['total'] }}</strong>
            </li>
        </ul>
    </div>
</div>
