@extends('layouts.frontend.second-page')

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
                                            alt="Konten Ternama Konveksi Landing Page {{ $i }}">
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
