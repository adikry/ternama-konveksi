@extends('layouts.frontend.second-page')


@if (count($sliders))
    @push('head')
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="Ternama Konveksi" />
        <meta property="og:title" content="Ternama Konveksi | Konveksi, Sablon, Design yang berkualitas" />
        <meta property="og:description"
            content="Ternama Konveksi dengan pengalaman lebih dari 10 tahun menjadikan kami sebagai vendor konveksi yang terlatih oleh waktu" />
        <meta property="og:url" content="{{ url()->full() }}" />
        <meta property="og:image" content="{{ asset('storage/' . $sliders[0]->thumbnail) }}">
        <meta property="og:image:width" content="526">
        <meta property="og:image:height" content="275">
        <meta property="og:image:type" content="image/jpeg">
        <meta name="twitter:card" content="summary">
    @endpush
@endif

@push('css')
    {{-- <link rel="stylesheet" href="/assets/css/landing.css"> --}}
@endpush

@section('container')
    @if ($dataLanding)
        <section class="bg-main pt-12">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-12 pb-10 px-0">
                            @for ($i = 0; $i < count($dataLanding->content); $i++)
                                <div class="card bg-transparent border-0 py-1">
                                    <a href="{{ $dataLanding->content[$i]['link'] }}" target="_blank">
                                        <img src="{{ asset('storage/' . $dataLanding->content[$i]['content']) }}"
                                            alt="Konten Ternama Konveksi Landing Page {{ $i }}"
                                            class="w-100 h-100">
                                    </a>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
