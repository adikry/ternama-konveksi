@extends('layouts.frontend.main')

@push('css')
    <link rel="stylesheet" href="/assets/vendors/fancybox/fancybox.css">
@endpush

@push('js')
    <script src="/assets/vendors/fancybox/fancybox.js"></script>
@endpush

@section('container')
    <!-- Banner Section -->
    @if ($display)
        <section class="d-flex flex-column bg-img-cover-center vh-100 pt-xxl-13 custom-height-sm"
            style="background-image: url('{{ asset('storage/' . $display->thumbnail) }}')">
            <div class="d-flex flex-column h-100 justify-content-center">
                <div class="container container-xxl z-index-1">
                    <h1 class="fs-38 fs-xl-60 mb-4 text-white">{{ $display->konten }}</h1>
                    <p class="mb-0 mxw-435px text-white">
                        {{ $display->desc }}
                    </p>
                </div>
                <div class="card-img-overlay" style="background-color: rgba(0, 0, 0, 0.65)"></div>
            </div>
        </section>
    @endif
    <!-- End Banner Section -->

    @if (count($portofolio))
        <section class="py-5 py-lg-8 bg-main">
            <div class="container container-xxl">
                <div class="row justify-content-center align-content-center align-items-center">
                    <h1 class="fs-30 fs-lg-40 text-white mb-8">T-shirt Portofolio</h1>
                    <div class="col-md-10">
                        @foreach ($portofolio as $porto)
                            <div class="card bg-accent card-display rounded-lg shadow-sm article-list p-2 mb-10">
                                <div class="row">
                                    <div class="col-md-8 col-lg-8 col-sm-12 col-12">
                                        <div class="slick-slider custom-slider-01"
                                            data-slick-options='{"slidesToShow": 1,"autoplay":false,"dots":false,"arrows":true, "responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":1}},{"breakpoint": 576,"settings": {"slidesToShow": 1}}]}'>
                                            <div class="box cursor-pointer">
                                                <div class="h-100 img-post img-rounded">
                                                    <a data-fancybox="gallery{{ $porto->id }}"
                                                        data-src="{{ asset('storage/' . $porto->thumbnail) }}">
                                                        <img src="{{ asset('storage/' . $porto->thumbnail) }}"
                                                            alt="{{ $porto->nama }}" class="rounded-lg">
                                                    </a>
                                                </div>
                                            </div>
                                            @for ($i = 0; $i < count($porto->content); $i++)
                                                <div class="box cursor-pointer">
                                                    <div class="h-100 img-post img-rounded">
                                                        <a data-fancybox="gallery{{ $porto->id }}"
                                                            data-src="{{ asset('storage/' . $porto->content[$i]['content']) }}">
                                                            <img src="{{ asset('storage/' . $porto->content[$i]['content']) }}"
                                                                alt="{{ $porto->nama }} {{ $i }}"
                                                                class="rounded-lg">
                                                        </a>
                                                    </div>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-sm-12 col-12">
                                        <div class="d-flex flex-column">
                                            <div class="inline-flex flex-column px-5 pt-3 pb-4">
                                                <h1 class="mb-2 pt-5 fs-20 fs-lg-30 lh-1 text-white">
                                                    {{ $porto->nama }}
                                                </h1>
                                                <div class="text-white">
                                                    {!! $porto->desc !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $portofolio->links() }}
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="py-10 py-lg-8 bg-main">
            <div class="container container-xxl">
                <div class="card border-0 bg-accent py-5">
                    <h2 class="px-3 fs-20 fs-lg-30 text-center">Maaf, Portofolio yang anda cari saat ini belum ada!</h2>
                </div>
            </div>
        </section>
    @endif

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
                    <a href="/portofolio/{{ $next->slug }}" class="hover-shine">
                        <div
                            class="vh-50 position-relative d-flex overflow-hidden align-items-center bg-accent rounded-lg shadow">
                            <div class="box-image-next">
                                <img src="{{ asset('storage/' . $next->display) }}" alt="{{ $next->nama }}">
                            </div>
                            <div class="px-10 box-image-text">
                                <h6 class="fs-15 font-weight-normal">Next Portofolio</h6>
                                <h2 class="fs-30">{{ $next->nama }}</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    @endif

@endsection
@push('js')
    <script>
        Fancybox.bind('[data-fancybox]', {
            //
        });
    </script>
@endpush
