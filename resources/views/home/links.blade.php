@extends('layouts.frontend.second-page')

@section('container')
    <section class="bg-main section-links">
        <div class="d-flex justify-content-center align-items-center">
            <div class="col-md-6 h-100 w-100">
                <div class="pt-8 row justify-content-center">
                    <div class="col-sm-12">
                        <figure class="figure w-100 text-center" data-animate="fadeInDown">
                            <img src="/assets/images/logo/logo_putih.png" alt="Ternama Konveksi" class="w-50">
                        </figure>
                    </div>
                    <div class="col-sm-12 mt-6">
                        <div class="row">
                            @if (count($links))
                                @foreach ($links as $link)
                                    <div class="col-sm-6 col-6 ">
                                        <a href="{{ $link->link }}" class="my-2 animated delay-1s fadeInUp">
                                            <div class="bg-accent rounded shadow py-5 my-2 hover-shine"
                                                data-animate="fadeInUp">
                                                <span class="text-center w-100 d-inline-block">
                                                    <img src="{{ asset('storage/' . $link->thumbnail) }}"
                                                        alt="{{ $link->nama }}" style="height: 55px;width:auto;">
                                                </span>
                                                <span class="text-center d-inline-block text-white mt-2 fs-md w-100">
                                                    {{ $link->nama }}
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
