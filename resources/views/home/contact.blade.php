@extends('layouts.frontend.main', [
    'title' => 'Contact | Ternama Konveksi',
])
@if ($display)
    @push('head')
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="Ternama Konveksi" />
        <meta property="og:title" content="Contact | Ternama Konveksi" />
        <meta property="og:description"
            content="Ternama Konveksi dengan pengalaman lebih dari 10 tahun menjadikan kami sebagai vendor konveksi yang terlatih oleh waktu" />
        <meta property="og:url" content="{{ url()->full() }}" />
        <meta property="og:image" content="{{ asset('storage/' . $display->thumbnail) }}">
        <meta property="og:image:width" content="526">
        <meta property="og:image:height" content="275">
        <meta property="og:image:type" content="image/jpeg">
        <meta name="twitter:card" content="summary">
    @endpush
@endif
@section('container')
    <!-- Banner Section -->
    @if ($display)
        <section class="d-flex flex-column bg-img-cover-center vh-100 pt-xxl-13 custom-height-sm"
            style="background-image: url('{{ asset('storage/' . $display->thumbnail) }}')">
            <div class="d-flex flex-column h-100 justify-content-center">
                <div class="container container-xxl z-index-1">
                    <h1 class="fs-38 fs-xl-60 mb-4 text-white">Kontak Kami</h1>
                    <p class="mb-0 mxw-435px text-white">{{ $display->desc }}</p>
                </div>
                <div class="card-img-overlay" style="background-color: rgba(0, 0, 0, 0.65)"></div>
            </div>
        </section>
    @endif
    <!-- End Banner Section -->
    <section class="py-12 pb-lg-12 bg-main">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-5 mb-6 mb-lg-0" data-animate="fadeInLeft">
                    <div class="d-flex flex-column align-items-start">
                        <p class="mb-2 font-weight-500">FAQ</p>
                        <h2 class="fs-30 fs-lg-56 mb-3 text-white">
                            Pertanyaan yang sering ditanyakan
                        </h2>
                    </div>
                </div>
                <div class="col-lg-7" data-animate="fadeInRight">
                    <div id="accordion-style-01" class="accordion">
                        <div class="card rounded border-0 mb-5">
                            <div class="card-header border-0 p-0 bg-transparent" id="headingOne">
                                <h5 class="mb-0 fs-16 w-100">
                                    <a href="#" class="d-flex align-items-center py-2 px-3" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <span class="text-primary">1. Bisa sablon satuan ?</span>
                                        <span class="icon d-inline-block ml-auto"></span>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show rounded-bottom border-top border"
                                aria-labelledby="headingOne" data-parent="#accordion-style-01">
                                <div class="card-body py-4 px-3 pr-10">
                                    <p class="text-gray">
                                        Ya bisa, dengan ketentuan menggunakan sablon DTF. Untuk
                                        sablon manual itu tidak bisa.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card rounded border-0 mb-5">
                            <div class="card-header border-0 p-0 bg-transparent" id="headingTwo">
                                <h5 class="mb-0 fs-16 w-100">
                                    <a href="#" class="d-flex align-items-center py-2 px-3 collapsed"
                                        data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                                        aria-controls="collapseTwo">
                                        <span class="text-primary">2. Jenis cat sablon apa saja yang disediakan?</span>
                                        <span class="icon d-inline-block ml-auto"></span>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse rounded-bottom border-top border"
                                aria-labelledby="headingTwo" data-parent="#accordion-style-01">
                                <div class="card-body py-4 px-3 pr-10">
                                    <p class="tetx-gray">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit. Ipsam et perspiciatis quia accusamus ad? At sequi
                                        soluta magni eveniet accusamus?
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card rounded border-0 mb-5">
                            <div class="card-header border-0 p-0 bg-transparent" id="headingTwo">
                                <h5 class="mb-0 fs-16 w-100">
                                    <a href="#" class="d-flex align-items-center py-2 px-3 collapsed"
                                        data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
                                        aria-controls="collapseThree">
                                        <span class="text-primary">3. Berapa lama waktu pengerjaan</span>
                                        <span class="icon d-inline-block ml-auto"></span>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse rounded-bottom border-top border"
                                aria-labelledby="headingTwo" data-parent="#accordion-style-01">
                                <div class="card-body py-4 px-3 pr-10">
                                    <p class="tetx-gray">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Delectus, nam fuga! Fuga unde in excepturi illo incidunt
                                        iste id porro nemo.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card rounded border-0 mb-5">
                            <div class="card-header border-0 p-0 bg-transparent" id="headingTwo">
                                <h5 class="mb-0 fs-16 w-100">
                                    <a href="#" class="d-flex align-items-center py-2 px-3 collapsed"
                                        data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
                                        aria-controls="collapseFour">
                                        <span class="text-primary">4. Jenis kain apa saja yang tersedia?</span>
                                        <span class="icon d-inline-block ml-auto"></span>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseFour" class="collapse rounded-bottom border-top border"
                                aria-labelledby="headingTwo" data-parent="#accordion-style-01">
                                <div class="card-body py-4 px-3 pr-10">
                                    <p class="tetx-gray">
                                        Lorem ipsum dolor sit amet consectetur, adipisicing
                                        elit. Animi velit ipsam magni nulla. Consequatur, quam?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-main">
        <div class="container">
            <h2 class="fs-30 fs-lg-40">Konsultasi atau Kunjungi tempat kami</h2>
            <a href="" class="btn btn-primary rounded bg-hover-light hover-dark">Hubungi Kami</a>
        </div>
    </section>

    <section class="py-5 bg-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d453.7648513840633!2d107.90189971487214!3d-7.163829335265463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68b7750a960337%3A0x76afaf88452b4ede!2sTernama%20Konveksi!5e0!3m2!1sen!2sid!4v1693382067378!5m2!1sen!2sid"
                        width="100%" height="400" style="border: 0" allowfullscreen="" loading="lazy"
                        class="rounded shadow" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-6">
                    <div class="card bg-accent rounded-lg shadow position-relative p-5">
                        <h5>
                            Garut, Perum Putri Dinar Lestari blok L No.06 Tanjung Garut,
                            Tj. Kamuning, Kec. Tarogong Kaler, Jawa Barat 44151.
                        </h5>
                        <p class="text-white">
                            <span class="font-weight-600">Buka :</span> 08.30-20.30 WIB
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
