<div class="sidenav canvas-sidebar bg-dark">
    <div class="canvas-overlay"></div>
    <div class="pt-5 pb-7 bg-dark card border-0 h-100">
        <div class="d-flex align-items-center card-header border-0 py-0 pl-8 pr-7 mb-9 bg-transparent">
            <span class="canvas-close d-inline-block text-right fs-24 ml-auto lh-1 text-white"><i
                    class="fal fa-times"></i></span>
        </div>
        <div class="overflow-y-auto pb-6 pl-8 pr-7 card-body pt-0">
            <ul class="navbar-nav main-menu px-0">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }} my-1 px-0">
                    <a class="nav-link text-white pl-2" href="/"> Home </a>
                </li>
                <li aria-haspopup="true" aria-expanded="false"
                    class="nav-item dropdown my-1 px-0 {{ Request::is('portofolio*') ? 'show' : '' }}">
                    <a class="nav-link text-white dropdown-toggle pl-2" href="#" data-toggle="dropdown">
                        Portofolio
                        <span class="caret"></span>
                    </a>
                    <div
                        class="dropdown-menu p-0 dropdown-menu-listing x-animated x-fadeInUp {{ Request::is('portofolio*') ? 'show' : '' }}">
                        <!-- List -->
                        @if ($kategories)
                            @foreach ($kategories as $kategori)
                                <div class="dropdown-item pl-2 ">
                                    <a class="dropdown-link pl-3 text-white" href="/portofolio/{{ $kategori->slug }}">
                                        {{ $kategori->nama }}
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </li>
                <li class="nav-item {{ Request::is('blog*') ? 'active' : '' }} my-1 px-0">
                    <a class="nav-link text-white pl-2" href="/blog"> Blog </a>
                </li>
                <li class="nav-item {{ Request::is('about-us*') ? 'active' : '' }} my-1 px-0">
                    <a class="nav-link text-white pl-2" href="/about-us"> Tentang Kami </a>
                </li>
                <li class="nav-item {{ Request::is('contact*') ? 'active' : '' }} my-1 px-0">
                    <a class="nav-link text-white pl-2" href="/contact"> Kontak </a>
                </li>
            </ul>
        </div>
        <div class="card-footer bg-transparent border-0 mt-auto pl-8 pr-7 pb-0 pt-4">
            <ul class="list-inline d-flex align-items-center mb-3">
                <li class="list-inline-item mr-4">
                    <a href="#" class="fs-20 lh-1 text-white"><i class="fab fa-pinterest-p"></i></a>
                </li>
                <li class="list-inline-item mr-4">
                    <a href="#" class="fs-20 lh-1 text-white"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li class="list-inline-item mr-4">
                    <a href="#" class="fs-20 lh-1 text-white"><i class="fab fa-instagram"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="#" class="fs-20 lh-1 text-white"><i class="fab fa-twitter"></i></a>
                </li>
            </ul>
            <p class="mb-0 text-gray">
                © 2023 Ternama Konveksi.<br />
                All rights reserved.
            </p>
        </div>
    </div>
</div>
