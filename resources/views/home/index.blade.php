@extends('layouts.frontend.main', [
    'title' => 'Ternama Konveksi | Konveksi, Sablon dan Design yang Berkualitas',
])
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
    <link rel="stylesheet" href="/assets/vendors/sweetalert2/sweetalert2.css">
@endpush
@section('container')
    <!-- MAIN HEADER -->
    <section class="overflow-hidden">
        <!-- Slick Slider -->
        <div class="slick-slider custom-slider-02 dots-white"
            data-slick-options='{"slidesToShow": 1, "infinite":true, "autoplay":false, "dots":true,"arrows":false}'>
            <!-- items slider -->
            @if (count($sliders))
                @foreach ($sliders as $slider)
                    <div class="box">
                        <div class="d-flex flex-column justify-content-center bg-img-cover-center vh-100 custom-height-sm"
                            style="background-image: url('{{ asset('storage/' . $slider->thumbnail) }}')">
                            <div class="d-flex flex-column h-100 justify-content-center z-index-10">
                                <div class="container container-xxl">
                                    <h2 class="mb-6 fs-38 fs-xl-60 lh-1 text-white" data-animate="fadeInUp">
                                        {!! $slider->desc !!}
                                    </h2>
                                    <a href="https://wa.me/+6281111120293?text=Haloadmin"
                                        class="btn btn-white rounded-lg text-uppercase letter-spacing-05"
                                        data-animate="fadeInUp">Hubungi Kami</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-img-overlay" style="background-color: rgba(0, 0, 0, 0.65)"></div>
                    </div>
                @endforeach
            @endif
            <!-- end items slider -->
        </div>
        <!-- End Slick Slider -->
    </section>
    <!-- END MAIN HEADER -->

    <!-- Start Section About -->
    <section class="py-12 py-lg-15">
        <div class="container">
            <div class="mxw-110px mx-auto mb-8" data-animate="fadeInUp">
                <img src="/assets/images/logo/logo_hitam.png" alt="Logo Ternama Konveksi" width="110" height="45" />
            </div>
            <div class="mxw-924 mx-auto" data-animate="fadeInUp">
                <h2 class="fs-30 fs-md-40 lh-14 mb-5 text-center text-primary">
                    Kami sudah dipercaya sejak 2012, mulai dari instansi, brand lokal,
                    dan perusahaan.
                </h2>
                <p class="mb-6 fs-14 letter-spacing-05 text-uppercase text-primary text-center font-weight-bold">
                    Jasa Kami
                </p>
                <div class="text-center">
                    <a href="#section-next"
                        class="go-down d-inline-flex align-items-center text-primary justify-content-center w-50px h-50px rounded-circle border"><i
                            class="far fa-arrow-down"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section About -->

    <!-- Start Section Service -->
    <section id="section-next" class="pb-11 pb-lg-15">
        <div class="container container-xxl">
            @if ($services)
                <div class="slick-slider"
                    data-slick-options='{"slidesToShow": 4, "infinite":true, "autoplay":false,"dots":false,"arrows":true,"responsive":[{"breakpoint": 992,"settings": {"slidesToShow": 2}},{"breakpoint": 576,"settings": {"slidesToShow": 1}}]}'>
                    @foreach ($services as $service)
                        @if ($service->isActive)
                            <div class="box" data-animate="fadeInUp">
                                <div class="card border-0">
                                    <a href="/service/{{ $service->slug }}">
                                        <div class="img-card-custom">
                                            <img src="{{ asset('storage/' . $service->thumbnail) }}"
                                                alt="{{ $service->nama }}" class="card-img rounded-lg" />
                                        </div>
                                        <div class="card-img-overlay rounded-lg d-inline-flex align-items-center justify-content-center p-4 custom-kategori list-service"
                                            style="background-color: rgba(0, 0, 0, 0.65)">
                                            <p
                                                class="text-uppercase font-weight-bold text-primary text-service rounded-lg shadow-lg">
                                                {{ $service->nama }}
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </section>
    <!-- End Section Service -->

    <!-- Start Section Display -->
    <section class="pb-15 pt-12 pb-lg-15 pt-lg-12 bg-main overflow-hidden">
        <div class="container container-xxl">
            <div class="row align-items-center no-gutters">
                <div class="col-lg-3 mb-6 mb-lg-0 pr-xxl-8" data-animate="fadeInLeft">
                    <h2 class="fs-30 fs-md-56 mb-5 text-white">
                        Display<br />
                        Katalog
                    </h2>
                    <p class="mb-0 font-weight-500 text-gray-03 mr-10">
                        Kami menyediakan Display Katalog yang berisi gambar dan tabel sizechart
                        <span class="invisible position-absolute">T-Shirt, Longsleeve,
                            Hoodie, Polo Shirt, T-Shirt Kids, Crewneck, dengan harga yang murah, dan juga bisa satuan. kami
                            mengedepankan kualitas kami jangan sungkan untuk bertanya. kami adalah konveksi yang
                            professional, bisa pesan satuan, proses cepat, konveksi terdekat dari kota Garut</span>
                        .
                        Katalog ini dapat disesuaikan dengan kebutuhan brand Anda,
                        sehingga
                        brand hanya
                        perlu memilih warna dan sizechart yang sudah ada.
                    </p>
                    <div class="pt-8 pt-lg-11 d-flex custom-arrow">
                        <a href="#" class="arrow navId-0 slick-prev"><i class="far fa-arrow-left"></i></a>
                        <a href="#" class="arrow navId-0 slick-next"><i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-9 category-slider pl-xxl-9 pr-lg-6" data-animate="fadeInRight">
                    <div class="slick-slider custom-nav custom-slider-01"
                        data-slick-options='{"slidesToShow": 2,"infinite":true,"autoplay":false,"dots":false,"arrows":false,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":2}},{"breakpoint": 576,"settings": {"slidesToShow": 1}}]}'>

                        @if ($kategories)
                            @foreach ($kategories as $kategori)
                                <div class="box mt-7">
                                    <div class="card card-display border rounded-lg shadow-sm p-5 position-relative">
                                        <div class="img-display-custom">
                                            <img src="{{ asset('storage/' . $kategori->display) }}"
                                                alt="{{ $kategori->nama }}" class="card-img" />
                                        </div>
                                        {{-- <div
                                            class="d-flex align-items-center flex-column justify-content-center badge-display position-absolute rounded-circle text-ternama border border-2x border-white-darker shadow">
                                            <span class="fs-12 mb-0">Mulai dari</span>
                                            <span
                                                class="fs-16 fs-md-24 font-weight-600 line-height-custom">{{ $kategori->startFrom }}</span>
                                        </div> --}}
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
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Display -->

    <section class="py-12 pb-lg-12 bg-main">
        <div class="container container-xxl">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-6 mb-lg-0" data-animate="fadeInLeft">
                    <div class="d-flex flex-column">
                        <p class="mb-2 font-weight-500">Kenapa Kami</p>
                        <h2 class="fs-30 fs-lg-56 mb-3 text-white">
                            Pengalaman lebih dari 10 Tahun
                        </h2>
                        <p class="mb-2 font-weight-500">
                            Kami sebagai vendor konveksi sudah dipercaya banyak brand
                            maupun perusahaan. Berbekal dengan pengalaman, kami ternama
                            konveksi selalu membantu dalam membuat hasil produksi yang
                            terbaik
                        </p>
                    </div>
                </div>
                <div class="col-lg-7" data-animate="fadeInRight">
                    <div id="accordion-style-01" class="accordion">
                        <div class="card rounded border-0 mb-5">
                            <div class="card-header border-0 p-0 bg-transparent" id="headingOne">
                                <div class="mb-0 fs-16 w-100">
                                    <a href="#" class="d-flex align-items-center py-2 px-3" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <span class="text-primary">Kualitas</span>
                                        <span class="icon d-inline-block ml-auto"></span>
                                    </a>
                                </div>
                            </div>
                            <div id="collapseOne" class="collapse show rounded-bottom border-top border"
                                aria-labelledby="headingOne" data-parent="#accordion-style-01">
                                <div class="card-body py-4 px-3 pr-10">
                                    <p class="text-gray">
                                        Kami menjamin keaslian kain sesuai apa yang kamu pesan,
                                        pilihan kain yang kami tawarkan banyak pilihannya.
                                        Tentunya dengan kain yang berkualitas.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card rounded border-0 mb-5">
                            <div class="card-header border-0 p-0 bg-transparent" id="headingTwo">
                                <div class="mb-0 fs-16 w-100">
                                    <a href="#" class="d-flex align-items-center py-2 px-3 collapsed"
                                        data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                                        aria-controls="collapseTwo">
                                        <span class="text-primary">Professional</span>
                                        <span class="icon d-inline-block ml-auto"></span>
                                    </a>
                                </div>
                            </div>
                            <div id="collapseTwo" class="collapse rounded-bottom border-top border"
                                aria-labelledby="headingTwo" data-parent="#accordion-style-01">
                                <div class="card-body py-4 px-3 pr-10">
                                    <p class="tetx-gray">
                                        Kami ternama konveksi memiliki berbagai divisi yang
                                        diisi oleh tenaga kerja yang berpengalaman dan mumpuni,
                                        serta menggunakan mesin atau teknologi terbaik supaya
                                        menghasilkan produk yang presisi dan berkualitas.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card rounded border-0 mb-5">
                            <div class="card-header border-0 p-0 bg-transparent" id="headingThree">
                                <div class="mb-0 fs-16 w-100">
                                    <a href="#" class="d-flex align-items-center py-2 px-3 collapsed"
                                        data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
                                        aria-controls="collapseThree">
                                        <span class="text-primary">Layanan Terbaik</span>
                                        <span class="icon d-inline-block ml-auto"></span>
                                    </a>
                                </div>
                            </div>
                            <div id="collapseThree" class="collapse rounded-bottom border-top border"
                                aria-labelledby="headingThree" data-parent="#accordion-style-01">
                                <div class="card-body py-4 px-3 pr-10">
                                    <p class="tetx-gray">
                                        Ternama konveksi selalu berusaha untuk memberikan layanan terbaik dan ramah kepada
                                        pelanggan.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card rounded border-0 mb-5">
                            <div class="card-header border-0 p-0 bg-transparent" id="headingFour">
                                <div class="mb-0 fs-16 w-100">
                                    <a href="#" class="d-flex align-items-center py-2 px-3 collapsed"
                                        data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
                                        aria-controls="collapseFour">
                                        <span class="text-primary">Konsultasi Gratis</span>
                                        <span class="icon d-inline-block ml-auto"></span>
                                    </a>
                                </div>
                            </div>
                            <div id="collapseFour" class="collapse rounded-bottom border-top border"
                                aria-labelledby="headingFour" data-parent="#accordion-style-01">
                                <div class="card-body py-4 px-3 pr-10">
                                    <p class="tetx-gray">
                                        Konsultasi di Ternama konveksi untuk membantu Anda memilih desain dan ukuran yang
                                        tepat. Ternama Konveksi siap membantu Anda dalam memilih desain dan ukuran yang
                                        sesuai dengan kebutuhan Anda.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card rounded border-0 mb-5">
                            <div class="card-header border-0 p-0 bg-transparent" id="headingFive">
                                <div class="mb-0 fs-16 w-100">
                                    <a href="#" class="d-flex align-items-center py-2 px-3 collapsed"
                                        data-toggle="collapse" data-target="#collapseFive" aria-expanded="true"
                                        aria-controls="collapseFive">
                                        <span class="text-primary">Tanpa Minimal Order</span>
                                        <span class="icon d-inline-block ml-auto"></span>
                                    </a>
                                </div>
                            </div>
                            <div id="collapseFive" class="collapse rounded-bottom border-top border"
                                aria-labelledby="headingFive" data-parent="#accordion-style-01">
                                <div class="card-body py-4 px-3 pr-10">
                                    <p class="tetx-gray">
                                        Tanpa minimal order, pesanan satuan pun kami layani. Kami siap melayani pesanan
                                        konveksi baju dalam jumlah apapun, termasuk pesanan satuan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-8 border-bottom border-top bg-main">
        <div class="container container-xxl">
            <div class="mx-auto mb-5" data-animate="fadeInRight">
                <h2 class="fs-20 fs-md-30 lh-12 mb-5 text-center text-white">
                    Client Kami
                </h2>
            </div>
            <div class="slick-slider" data-animate="fadeInRight"
                data-slick-options='{"slidesToShow": 9,"infinite":true,"autoplay":true, "autoplaySpeed": 3000, "dots":false,"arrows":false,"responsive":[{"breakpoint": 1367,"settings": {"slidesToShow":6}},{"breakpoint": 992,"settings": {"slidesToShow":5}},{"breakpoint": 768,"settings": {"slidesToShow": 4}},{"breakpoint": 576,"settings": {"slidesToShow": 3}}]}'>
                @if ($clients)
                    @foreach ($clients as $client)
                        <div class="box">
                            <div class="img-card-custom">
                                <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->nama }}"
                                    class="opacity-5 opacity-hover-10" style="object-fit: contain !important;" />
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <section class="py-12 pt-lg-15 bg-main">
        <div class="container container-xxl">
            <div class="d-flex justify-content-between align-items-center" data-animate="fadeInLeft">
                <div class="mb-0">
                    <h2 class="fs-30 fs-md-40 text-white">Artikel Kami</h2>
                    <p class="font-weight-500 text-gray-03">
                        Koleksi Artikel dari Ternama Konveksi yang Informatif dan Bermanfaat.
                    </p>
                </div>
                <div class="d-flex custom-arrow">
                    <a href="#" class="arrow navId-1 slick-prev"><i class="far fa-arrow-left"></i></a>
                    <a href="#" class="arrow navId-1 slick-next"><i class="far fa-arrow-right"></i></a>
                </div>
            </div>
            @if ($blogs)
                <div class="slick-slider nav-custom custom-slider-01"
                    data-slick-options='{"slidesToShow": 3,"infinite":true,"autoplay":false,"dots":false,"arrows":false,"responsive":[{"breakpoint": 992,"settings": {"slidesToShow":2}},{"breakpoint": 576,"settings": {"slidesToShow":1}}]}'>
                    @foreach ($blogs as $blog)
                        <div class="box">
                            <div class="card bg-transparent hover-zoom-in border-0 article" data-animate="fadeInRight">
                                <a href="#" class="hover-shine card-img-top rounded">
                                    <div class="img-card-custom">
                                        <img src="{{ asset('storage/' . $blog->thumbnail) }}"
                                            alt="{{ $blog->judul }}" />
                                    </div>
                                </a>
                                <div class="card-body px-0 pt-2">
                                    <div class="d-flex justify-content-between">
                                        <p
                                            class="card-text fs-12 mb-2 text-muted lh-12 text-uppercase letter-spacing-05 font-weight-500">
                                            {{ $blog->getFormattedDate() }}
                                        </p>
                                        <p
                                            class="card-text fs-12 mb-2 text-muted lh-12 text-uppercase letter-spacing-05 font-weight-500">
                                            Oleh : {{ $blog->user->name }}
                                        </p>
                                    </div>
                                    <h3 class="card-title mb-3 fs-20">
                                        <a href="#" class="text-white">
                                            {{ $blog->judul }}
                                        </a>
                                    </h3>
                                    <p class="card-text mb-4 font-weight-500 text-white-dark">
                                        {{ $blog->shortBody() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <section class="py-12 pb-lg-15 bg-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="col-lg-auto ml-lg-auto text-center">
                        <div class="d-flex flex-column align-items-center">
                            <h2 class="fs-20 fs-md-30 mb-4 text-center text-white">
                                Bergabung bersama kami.
                            </h2>
                            <p class="mb-6 font-weight-500 text-white">
                                Penawaran menarik menanti anda, mari bergabung.
                            </p>
                            <form method="POST" id="contact-form" data-animate="fadeInUp"
                                action="{{ route('submit.form') }}">
                                @csrf
                                <div class="input-group mb-4 position-relative">
                                    <input type="text" maxlength="128" name="nama"
                                        class="form-control border-top-0 border-left-0 border-right-0 px-0 border-2x bg-accent rounded-lg text-white"
                                        placeholder="Nama Lengkap / Perusahaan" />
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-4 position-relative">
                                            <input type="number" maxlength="14" minlength="9" name="phone"
                                                class="form-control border-top-0 border-left-0 border-right-0 px-0 border-2x bg-accent rounded-lg"
                                                placeholder="No Hp" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group mb-4 position-relative">
                                            <input type="email" name="email"
                                                class="form-control border-top-0 border-left-0 border-right-0 px-0 border-2x bg-accent rounded-lg"
                                                placeholder="Email" />
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="mr-auto ml-3 px-3 hover-white bg-hover-main rounded-lg py-2 btn btn-white btn-submit">
                                        gabung
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="/assets/vendors/sweetalert2/sweetalert2.min.js"></script>
    <script type="text/javascript">
        $("#contact-form").submit(function(e) {
            e.preventDefault();

            var url = $(this).attr('action');
            let formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Terimakasih sudah subscribe kami!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#contact-form")[0].reset();
                },
                error: function(response) {
                    var resMsg = response.responseJSON.message;

                    if (resMsg.indexOf('Duplicat Entry')) {
                        Swal.fire({
                            position: 'center',
                            icon: 'info',
                            title: 'Validasi Error',
                            text: 'Email Sudah Terdaftar!',
                        })
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'info',
                            title: 'Ada kendala teknis. Mohon coba kembali lagi nanti.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
            })
        })
    </script>
@endpush
