@extends('layouts.frontend.main', [
    'title' => 'Service | Ternama Konveksi',
])

@if ($service)
    @push('head')
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="Ternama Konveksi" />
        <meta property="og:title" content="Service | Ternama Konveksi" />
        <meta property="og:description"
            content="Ternama Konveksi dengan pengalaman lebih dari 10 tahun menjadikan kami sebagai vendor konveksi yang terlatih oleh waktu" />
        <meta property="og:url" content="{{ url()->full() }}" />
        <meta property="og:image" content="{{ asset('storage/' . $service->thumbnail) }}">
        <meta property="og:image:width" content="526">
        <meta property="og:image:height" content="275">
        <meta property="og:image:type" content="image/jpeg">
        <meta name="twitter:card" content="summary">
    @endpush
@endif
@push('css')
    <link rel="stylesheet" href="/assets/vendors/fancybox/fancybox.css">
@endpush

@push('js')
    <script src="/assets/vendors/fancybox/fancybox.js"></script>
@endpush

@section('container')
    @if ($service)
        <section class="d-flex flex-column bg-img-cover-center vh-100 pt-xxl-13 custom-height-sm"
            style="background-image:url('{{ asset('storage/' . $service->thumbnail) }}')">
            <div class="d-flex flex-column h-100 justify-content-center">
                <div class="container container-xxl z-index-1">
                    <h1 class="fs-38 fs-xl-60 mb-4 text-white">{{ $service->nama }}</h1>
                    <p class="mb-0 mwx-435px text-white">
                        {{ $service->description }}
                    </p>
                </div>
                <div class="card-img-overlay" style="background-color: rgba(0, 0, 0, .65)"></div>
            </div>
        </section>
        <section class="py-5 py-lg-8 bg-main overflow-hidden">
            <div class="container container-xxl">
                <div class="text-center pt-1 pb-4">
                    <h3 class="text-white">Galeri {{ $service->nama }}</h3>
                </div>
                <div class="row">

                    @foreach ($service->content as $content)
                        <div class="col-md-6 col-lg-4" data-animate="fadeInRight">
                            <a data-fancybox="gallery" data-src="{{ asset('storage/' . $content['content_']) }}"
                                @if ($content['content_desc']) data-caption="{{ $content['content_desc'] }}" @endif
                                href="position-relative d-block overflow-hidden">
                                <figure class="position-relative img-post" style="padding-bottom: 70%">
                                    <img src="{{ asset('storage/' . $content['content_']) }}" class="rounded"
                                        alt="">
                                </figure>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

        <section class="py-10 py-lg-8 bg-main">
            <div class="container container-xxl">
                <div class="d-flex flex-column">
                    <p class="mb-0">Kontak Kami</p>
                    <div class="pb-2">
                        <h1>Ada project? Hubungi kami!</h1>
                        <button class="btn btn-white rounded-lg fadeInUp animated">
                            <i class="fab fa-whatsapp"></i>
                            Whatsapp
                        </button>
                    </div>
                </div>
            </div>
        </section>

        @if ($next)
            <section class="py-5 py-lg-8 bg-main">
                <div class="container container-xxl">
                    <div class="card border-0 bg-transparent">
                        <a href="/service/{{ $next->slug }}" class="hover-shine">
                            <div
                                class="vh-50 position-relative d-flex overflow-hidden align-items-center bg-accent rounded-lg shadow">
                                <div class="box-image-next">
                                    <img src="{{ asset('storage/' . $next->thumbnail) }}" alt="{{ $next->nama }}">
                                </div>
                                <div class="px-10 box-image-text">
                                    <h6 class="fs-15 font-weight-normal">Next Service</h6>
                                    <h2 class="fs-30">{{ $next->nama }}</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
        @endif
    @endif
@endsection

@push('js')
    <script>
        Fancybox.bind('[data-fancybox]', {
            //
        });
    </script>
@endpush
