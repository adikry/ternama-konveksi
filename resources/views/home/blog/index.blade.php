@extends('layouts.frontend.main')

@section('container')
    <!-- Banner Section -->
    @if ($display)
        <section class="d-flex flex-column bg-img-cover-center vh-100 pt-xxl-13 custom-height-sm"
            style="background-image: url('{{ asset('storage/' . $display->thumbnail) }}')">
            <div class="d-flex flex-column h-100 justify-content-center">
                <div class="container container-xxl z-index-1">
                    <h1 class="fs-38 fs-xl-60 mb-4 text-white">{{ $display->konten }}</h1>
                    <p class="mb-0 mxw-435px text-white">{{ $display->desc }}</p>
                </div>
                <div class="card-img-overlay" style="background-color: rgba(0, 0, 0, 0.65)"></div>
            </div>
        </section>
    @endif
    <!-- End Banner Section -->

    <section class="py-11 pb-lg-15 bg-main">
        <div class="container">
            @if (count($blogs))
                @foreach ($blogs as $blog)
                    <div
                        class="card bg-accent mb-8 card-display rounded-lg article-list shadow-sm px-2 py-2 position-relative">
                        <div class="row">
                            <div class="col-lg-4">
                                <a href="#" class="img-post rounded">
                                    <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="{{ $blog->judul }}" />
                                </a>
                            </div>
                            <div class="col-lg-8">
                                <a href="/blog/{{ $blog->slug }}">
                                    <div class="d-flex h-100 flex-column">
                                        <div class="d-inline-flex flex-column px-5 pb-4">
                                            <h1 class="mb-2 pt-2 fs-20 fs-lg-30 lh-1 text-white">
                                                {{ $blog->judul }}
                                            </h1>
                                            <p class="mt-5 text-white">
                                                {{ $blog->shortBody() }}
                                            </p>
                                        </div>
                                        <div class="mt-auto px-5 d-flex">
                                            <div class="px-0 col-md-4">
                                                <p class="mb-2 pt-5 lh-1 mr-5 text-white">Oleh : {{ $blog->user->name }}</p>
                                            </div>
                                            <div class="px-0 col-md-4">
                                                <p class="mb-2 pt-5 lh-1 ml-5 text-white">{{ $blog->getFormattedDate() }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $blogs->links() }}
            @endif
        </div>
    </section>
@endsection
