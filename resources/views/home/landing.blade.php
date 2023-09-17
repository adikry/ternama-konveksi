@extends('layouts.frontend.second-page')

@push('css')
    {{-- <link rel="stylesheet" href="/assets/css/landing.css"> --}}
@endpush

@section('container')
    @if ($dataLanding)
        <section class="bg-main">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="position-relative d-flex flex-column">

                                @for ($i = 0; $i < count($dataLanding->content); $i++)
                                    <figure>
                                        <img src="{{ asset('storage/' . $dataLanding->content[$i]['content']) }}"
                                            alt="Content 1" width="100%">
                                    </figure>
                                    @if ($dataLanding->content[$i]['button'])
                                        <div class="mx-auto mb-3">
                                            <button class="btn btn-primary rounded">
                                                <div class="d-flex align-items-center">
                                                    <i class="fab fa-whatsapp"></i>
                                                    <span class="ml-1">{{ $dataLanding->content[$i]['button'] }}</span>
                                                </div>
                                            </button>
                                        </div>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 category-slider pl-xxl-9 pr-lg-6" data-animate="fadeInRight">
                            <div class="slick-slider custom-slider-01"
                                data-slick-options='{"slidesToShow": 2,"infinite":true,"autoplay":false,"dots":false,"arrows":true,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":2}},{"breakpoint": 576,"settings": {"slidesToShow": 1}}]}'>
                                @if ($kategories)
                                    @foreach ($kategories as $kategori)
                                        <div class="box mt-7">
                                            <div
                                                class="card card-display border rounded-lg shadow-sm p-5 position-relative">
                                                <div class="img-display-custom">
                                                    <img src="{{ asset('storage/' . $kategori->display) }}"
                                                        alt="{{ $kategori->nama }}" class="card-img" />
                                                </div>
                                                <div
                                                    class="d-flex align-items-center flex-column justify-content-center badge-display position-absolute rounded-circle text-ternama border border-2x border-white-darker shadow">
                                                    <span class="fs-12 mb-0">Mulai dari</span>
                                                    <span
                                                        class="fs-16 fs-md-24 font-weight-600 line-height-custom">{{ $kategori->startFrom }}</span>
                                                </div>
                                                <div class="card-img-overlay d-inline-flex flex-column px-5 pt-3 pb-1">
                                                    <div class="d-flex justify-content-between align-items-start">
                                                        <h3 class="card-title fs-20 fs-md-40">{{ $kategori->nama }}</h3>
                                                    </div>
                                                    <div class="mt-auto mx-auto">
                                                        <a data-toggle="popover-hover"
                                                            data-img="{{ asset('storage/' . $kategori->sizeChart) }}"
                                                            class="fs-12 btn btn-primary text-white border-bottom border-light-dark rounded py-1 px-2 border-hover-primary">Size
                                                            Chart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="d-flex flex-column">
                                <div class="mx-auto my-3">
                                    <button class="btn btn-primary rounded">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <i class="fab fa-whatsapp"></i>
                                            <span class="ml-1">Hubungi Kami</span>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
