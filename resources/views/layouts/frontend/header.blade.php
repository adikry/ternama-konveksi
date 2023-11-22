<!-- Start Header -->
<header class="main-header navbar-dark header-sticky header-sticky-smart position-absolute fixed-top"
    @if ($header === 'dark') style="background-color: #000 !important" @endif>
    <div class="sticky-area">
        <div class="container container-xxl">
            <div class="d-none d-xl-block">
                <nav class="navbar navbar-expand-xl px-0 py-2 py-xl-0 row no-gutters">
                    <div class="col-xl-3">
                        <a class="navbar-brand mr-0" href="/">
                            <img src="/assets/images/logo/logo_putih.png" alt="Ternama Konveksi"
                                class="sticky-logo w-100 h-100" />
                        </a>
                    </div>
                    <div class="mx-auto col-xl-7 d-flex justify-content-end position-static">
                        <ul class="navbar-nav hover-menu main-menu px-0 mx-xl-n4">
                            <li class="nav-item {{ Request::is('/') ? 'active' : '' }} py-xl-5 px-0 px-xl-4">
                                <a class="nav-link py-1 px-2 rounded-lg" href="/">
                                    Home
                                </a>
                            </li>
                            <li aria-haspopup="true" aria-expanded="false"
                                class="nav-item dropdown-item-shop dropdown py-2 py-xl-5 px-0 {{ Request::is('portofolio*') ? 'active' : '' }} px-xl-4">
                                <a class="nav-link dropdown-toggle py-1 px-2 rounded-lg" href="#"
                                    data-toggle="dropdown">
                                    Portofolio
                                    <span class="caret"></span>
                                </a>
                                <div
                                    class="dropdown-menu dropdown-menu-xl bg-main px-0 pb-10 pt-5 dropdown-menu-listing overflow-hidden x-animated x-fadeInUp">
                                    <div class="container container-xxl">
                                        <div class="row no-gutters w-100">
                                            @if ($kategories)
                                                @foreach ($kategories as $kategori)
                                                    <div class="col-2 h-100">
                                                        <div class="px-2">
                                                            <div
                                                                class="card {{ Request::is('portofolio/' . $kategori->slug) ? 'bg-warning' : 'bg-accent' }} rounded shadow border-0 mt-2 custom-kategori">
                                                                <a href="/portofolio/{{ $kategori->slug }}"
                                                                    class="hover-shine rounded">
                                                                    <img src="{{ asset('storage/' . $kategori->display) }}"
                                                                        alt="Image Menu" class="card-img">
                                                                    <div
                                                                        class="card-img-overlay position-absolute pos-fixed-center p-0 d-flex w-100 justify-content-center content-change-horizontal">
                                                                        <h3 class="fs-24 text-center text-primary">
                                                                            {{ $kategori->nama }}</h3>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li aria-haspopup="true" aria-expanded="false"
                                class="nav-item dropdown-item-shop dropdown py-2 py-xl-5 px-0 {{ Request::is('service*') ? 'active' : '' }} px-xl-4">
                                <a class="nav-link dropdown-toggle py-1 px-2 rounded-lg" href="#"
                                    data-toggle="dropdown">
                                    Service
                                    <span class="caret"></span>
                                </a>
                                <div
                                    class="dropdown-menu dropdown-menu-xl bg-main px-0 pb-10 pt-5 dropdown-menu-listing overflow-hidden x-animated x-fadeInUp">
                                    <div class="container container-xxl">
                                        <div class="row no-gutters w-100">
                                            @if ($services)
                                                @foreach ($services as $service)
                                                    <div class="col-2 h-100">
                                                        <div class="px-2">
                                                            <div
                                                                class="card rounded shadow border-0 mt-2 custom-kategori overflow-hidden">
                                                                <a href="/service/{{ $service->slug }}" class="rounded">
                                                                    <div class="img-post"
                                                                        style="padding-bottom: 80% !important">
                                                                        <img src="{{ asset('storage/' . $service->thumbnail) }}"
                                                                            alt="Servis Ternama Konveksi {{ $service->nama }}">
                                                                    </div>
                                                                    <div class="card-img-overlay d-inline-flex align-items-center justify-content-center p-4 custom-kategori list-service"
                                                                        style="background-color: {{ Request::is('service/' . $service->slug) ? 'rgba(0, 0, 0, 0.1)' : 'rgba(0,0,0, 0.6)' }}">
                                                                        <p
                                                                            class="text-uppercase font-weight-bold text-primary text-service rounded shadow-lg">
                                                                            {{ $service->nama }}</p>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <li class="dropdown-item">
                                                        <a href="/service/{{ $service->slug }}"
                                                            class="dropdown-link">{{ $service->nama }}</a>
                                                    </li> --}}
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item {{ Request::is('blog*') ? 'active' : '' }} py-xl-5 px-0 px-xl-4">
                                <a class="nav-link py-1 px-2 rounded-lg" href="/blog"> Blog </a>
                            </li>
                            <li class="nav-item {{ Request::is('about-us*') ? 'active' : '' }} py-xl-5 px-0 px-xl-4">
                                <a class="nav-link py-1 px-2 rounded-lg" href="/about-us">
                                    Tentang
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('contact*') ? 'active' : '' }} py-xl-5 px-0 px-xl-4">
                                <a class="nav-link py-1 px-2 rounded-lg" href="/contact">
                                    Kontak
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xl-2 position-relative">
                        <ul
                            class="pl-4 navbar-nav flex-row justify-content-xl-start d-flex flex-wrap text-body py-0 navbar-right">
                            <li class="border-4x border-left"></li>
                            <li class="nav-item p-2">
                                <a href="https://www.instagram.com/ternamakonveksi/" target="_blank"
                                    class="nav-link py-1 px-2 rounded-lg position-relative">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li class="nav-item p-2">
                                <a href="https://wa.me/+6281111120293?text=Haloadmin" target="_blank"
                                    class="nav-link py-1 px-2 rounded-lg position-relative">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="d-block d-xl-none">
                <nav class="navbar navbar-expand-xl px-0 py-2 py-xl-0 w-100 align-items-center">
                    <a class="navbar-brand d-inline-block" href="/">
                        <img src="/assets/images/logo/logo_putih.png" alt="Ternama Konveksi"
                            class="sticky-logo w-100 h-100" />
                    </a>
                    <button class="navbar-toggler border-0 px-0 canvas-toggle" type="button" data-canvas="true"
                        data-canvas-options='{"width":"250px","container":".sidenav"}' aria-label="Hamburger Button">
                        <span class="fs-24 toggle-icon"></span>
                    </button>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- End Header -->
