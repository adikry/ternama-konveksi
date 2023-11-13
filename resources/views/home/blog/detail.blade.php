@extends('layouts.frontend.main', [
    'title' => 'Blog | Ternama Konveksi',
])

@push('head')
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="Ternama Konveksi" />
    <meta property="og:title" content="{{ $blog->judul }}" />
    <meta property="og:description" content="{{ $blog->shortBody() }}" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:image" content="{{ asset('storage/' . $blog->thumbnail) }}">
    <meta property="og:image:width" content="526">
    <meta property="og:image:height" content="275">
    <meta property="og:image:type" content="image/jpeg">
    <meta name="twitter:card" content="summary">
@endpush

@section('container')
    @if ($blog)
        <section class="py-16 pb-lg-15 bg-main">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <section class="border-bottom pb-8">
                            <figure class="box-image rounded-lg shadow">
                                <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="{{ $blog->judul }}" />
                            </figure>
                            <p
                                class="card-text text-white fs-12 mb-2 lh-12 text-uppercase letter-spacing-05 font-weight-500">
                                {{ $blog->getFormattedDate() }}
                            </p>
                            <h1 class="mb-2 fs-40 text-white">
                                {{ $blog->judul }}
                            </h1>
                            <p class="mb-7 text-white">
                                Oleh :
                                <span class="text-white">{{ $blog->user->name }}</span>
                            </p>
                            <div class="blog-content">
                                {!! $blog->body !!}
                            </div>
                            <div class="row no-gutters">
                                <div class="d-flex justify-content-sm-end mt-3">
                                    <label class="text-white font-weight-bold mr-3 mb-0">Share:</label>
                                    <ul class="list-inline d-flex align-items-center mb-0">
                                        <li class="list-inline-item mr-4">
                                            <a href="#" class="fs-20 lh-1"><i class="fab fa-whatsapp"></i></a>
                                        </li>
                                        <li class="list-inline-item mr-4">
                                            <a href="#" class="fs-20 lh-1"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="fs-20 lh-1"><i class="fab fa-twitter"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </section>
                        <section class="pt-7 pb-5 pb-md-5">
                            <div class="row">
                                <div class="col-sm-6 mb-6 mb-sm-0 border-right-0 border-sm-right align-items-center">
                                    @if ($prev)
                                        <div class="media align-items-center py-1">
                                            <a href="/blog/{{ $prev->slug }}" class="fs-14 mr-4"><i
                                                    class="fas fa-arrow-left"></i></a>
                                            <a href="/blog/{{ $prev->slug }}" class="w-70px d-block mr-2">
                                                <img src="{{ asset('storage/' . $prev->thumbnail) }}"
                                                    alt="{{ $prev->judul }}" />
                                            </a>
                                            <div class="media-body">
                                                <p
                                                    class="fs-12 mb-1 text-muted lh-12 text-uppercase letter-spacing-05 font-weight-500">
                                                    previous
                                                </p>
                                                <a href="/blog/{{ $prev->slug }}" class="font-weight-bold">
                                                    {{ $prev->judul }}
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-6 align-items-center">
                                    @if ($next)
                                        <div class="media align-items-center justify-content-end py-1">
                                            <div class="media-body text-right">
                                                <p
                                                    class="fs-12 mb-1 text-muted lh-12 text-uppercase letter-spacing-05 font-weight-500">
                                                    Next
                                                </p>
                                                <a href="/blog/{{ $next->slug }}" class="font-weight-bold">
                                                    {{ $next->judul }}
                                                </a>
                                            </div>
                                            <a href="/blog/{{ $next->slug }}" class="w-70px d-block ml-2">
                                                <img src="{{ asset('storage/' . $next->thumbnail) }}"
                                                    alt="{{ $next->judul }}" />
                                            </a>
                                            <a href="/blog/{{ $next->slug }}" class="fs-14 ml-4"><i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
