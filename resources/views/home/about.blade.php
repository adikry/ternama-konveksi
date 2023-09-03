@extends('layouts.frontend.main')

@section('container')
    <!-- Banner Section -->
    @if ($display)
        <section class="d-flex flex-column bg-img-cover-center vh-100 pt-xxl-13 custom-height-sm"
            style="background-image: url('{{ asset('storage/' . $display->thumbnail) }}')">
            <div class="d-flex flex-column h-100 justify-content-center">
                <div class="container container-xxl z-index-1">
                    <h1 class="fs-38 fs-xl-60 mb-4 text-white">
                        Sebuah cerita <br />
                        singkat perjalanan
                    </h1>
                    <p class="mb-0 mxw-435px text-white">{{ $display->konten }} Kami</p>
                </div>
                <div class="card-img-overlay" style="background-color: rgba(0, 0, 0, 0.65)"></div>
            </div>
        </section>
    @endif
    <!-- End Banner Section -->
    <section class="pb-5 pb-lg-10 bg-main">
        <div id="cd-timeline" class="cd-container">
            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-picture"></div>

                <div class="cd-timeline-content shadow bg-accent">
                    <h2>2012</h2>
                    <div class="d-flex flex-column flex-wrap align-items-center">
                        <div class="position-relative">
                            <img src="/assets/images/logo/Logo Hoofd.png" alt="Logo Hoofd" class="img-fluid" />
                        </div>
                        <p>
                            Pada tahun ini kami menggunakan nama Hoofd Screenprinting.
                            Bermula dari hanya merintis jasa konveksi.
                        </p>
                    </div>
                </div>
                <!-- cd-timeline-content -->
            </div>
            <!-- cd-timeline-block -->

            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-movie"></div>
                <!-- cd-timeline-img -->

                <div class="cd-timeline-content shadow bg-accent">
                    <h2>2013</h2>
                    <p>Kami mulai memberanikan diri untuk merambah ke jasa sablon.</p>
                </div>
                <!-- cd-timeline-content -->
            </div>
            <!-- cd-timeline-block -->

            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-picture"></div>
                <!-- cd-timeline-img -->

                <div class="cd-timeline-content shadow bg-accent">
                    <h2>2014</h2>
                    <p>
                        Dengan pengalaman di bidang jasa sablon, kami mencoba mengadakan
                        kelas sablon untuk anak-anak jalanan. Lalu membuka workshop di
                        penjara-penjara Garut. Harapan kami sederhana yaitu membuka
                        lapangan pekerjaan.
                    </p>
                </div>
                <!-- cd-timeline-content -->
            </div>
            <!-- cd-timeline-block -->

            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-location"></div>
                <!-- cd-timeline-img -->

                <div class="cd-timeline-content shadow bg-accent">
                    <h2>2017</h2>
                    <p>
                        2017 adalah tahun dimana kami membuat acara sablon, yaitu
                        Screenprintour sebuah acara edukasi dan workshop. Di acara ini
                        kami dipertemukan dengan banyak para pelaku sablon, mulai dari
                        desainer, tukang sablon itu sendiri hingga beberapa brand
                        clothing.
                    </p>
                </div>
                <!-- cd-timeline-content -->
            </div>
            <!-- cd-timeline-block -->

            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-location"></div>

                <div class="cd-timeline-content shadow bg-accent">
                    <h2>2023</h2>
                    <p>Kini kami bertransformasi menjadi ternama konveksi</p>
                    <div class="text-center">
                        <img src="/assets/images/logo/logo_putih.png" alt="Ternama Konveksi" class="img-fluid w-75" />
                    </div>
                </div>
                <!-- cd-timeline-content -->
            </div>
            <!-- cd-timeline-block -->
        </div>
    </section>
@endsection
