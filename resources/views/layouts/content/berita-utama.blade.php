 {{-- Berita Utama --}}
 <section id="berita" class="py-5">
     <div class="container">
         <h2 class="text-center mb-5">
             <i class="bi bi-newspaper"></i>
             Berita Terbaru
         </h2>

         <div class="row">
             {{-- Carousel Berita Besar --}}
             <div class="col-lg-8">
                 <div id="bigNewsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                     <div class="carousel-inner">
                         @foreach ($bigNews as $index => $big)
                             <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                 <div class="card news-card-large mb-3 position-relative">
                                     <div class="news-image-wrapper">
                                         <img src="{{ asset($big->image) }}" class="news-image w-100"
                                             alt="{{ $big->title }}" />
                                         {{-- Overlay Caption --}}
                                         <div class="news-caption-overlay">
                                             <h5 class="card-title">
                                                 <i class="bi bi-bookmark-fill"></i>
                                                 {{ $big->title }}
                                                 <span class="badge bg-primary ms-2">Utama</span>
                                             </h5>
                                             <p class="news-date mb-1">
                                                 <i class="bi bi-calendar"></i>
                                                 {{ $big->created_at->format('d/m/Y') }}
                                                 <i class="bi bi-person"></i>
                                                 Admin
                                             </p>
                                             <p>{{ $big->excerpt }}</p>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         @endforeach
                     </div>

                     {{-- Carousel Controls --}}
                     <button class="carousel-control-prev" type="button" data-bs-target="#bigNewsCarousel"
                         data-bs-slide="prev">
                         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                         <span class="visually-hidden">Previous</span>
                     </button>
                     <button class="carousel-control-next" type="button" data-bs-target="#bigNewsCarousel"
                         data-bs-slide="next">
                         <span class="carousel-control-next-icon" aria-hidden="true"></span>
                         <span class="visually-hidden">Next</span>
                     </button>
                 </div>
             </div>

             {{-- Berita Kecil --}}
             <div class="col-lg-4">
                 <div class="row">
                     @foreach ($smallNews as $small)
                         <div class="col-md-6 mb-3">
                             <div class="card news-card h-100">
                                 <img src="{{ asset($small->image) }}" class="card-img-top" alt="{{ $small->title }}" />
                                 <div class="card-body">
                                     <span class="badge bg-info mb-2">{{ $small->category->name }}</span>
                                     <h6 class="card-title">
                                         <i class="bi bi-chat-dots-fill"></i>
                                         {{ $small->title }}
                                     </h6>
                                     <p class="news-date mb-1">
                                         <i class="bi bi-calendar"></i>
                                         {{ $small->created_at->format('d/m/Y') }}
                                     </p>
                                     <p class="news-author mb-0">
                                         <i class="bi bi-person"></i>
                                         Admin
                                     </p>
                                 </div>
                             </div>
                         </div>
                     @endforeach

                 </div>
             </div>
         </div>
     </div>
 </section>
