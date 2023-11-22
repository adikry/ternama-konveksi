<!-- Start Footer Content -->
<footer class="pt-10 pb-9 footer bg-primary">
    <div class="container container-xxl">
        <div class="row">
            <div class="col-lg mb-6 mb-lg-0 d-flex justify-content-center">
                <ul class="list-unstyled mb-0 py-2">
                    <li class="py-0">
                        <a href="#" class="footer-logo d-block">
                            <img src="/assets/images/logo/logo_putih.png" alt="Ternama Konveksi Logo" width="140"
                                height="auto" />
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg mb-6 mb-lg-0">
                <ul class="list-unstyled mb-0">
                    <li class="py-0">
                        <a href="/about-us" class="lh-213 font-weight-500 text-white">Tentang Kami</a>
                    </li>
                    @if ($kategories)
                    <li class="py-0">
                        <a href="/portofolio/{{ $kategories[0]->slug }}" class="lh-213 font-weight-500 text-white">Portofolio</a>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="col-sm-6 col-lg mb-6 mb-lg-0">
                <ul class="list-unstyled mb-0">
                    <li class="py-0">
                        <a href="/contact" class="lh-213 font-weight-500 text-white">Kontak</a>
                    </li>
                    <li class="py-0">
                        <a href="#" class="lh-213 font-weight-500 text-white">Maps</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-4 mb-6 mb-lg-0">
                <ul class="list-unstyled mb-0">
                    <li class="py-0">
                        <p class="text-white mb-0 lh-213 font-weight-600">Connect With Us. </p>
                    </li>
                    <li class="py-0">
                        <ul class="list-inline">
                            <li class="list-inline-item mr-2">
                                <a href="https://wa.me/+6281111120293?text=Haloadmin" target="_blank"
                                    class="text-white d-flex align-items-center"><i class="fs-24 mr-1 fab fa-whatsapp"></i> <span class="lh-213 font-weight-500 text-white"> Whatsapp</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="py-0">
                        <ul class="list-inline">
                            <li class="list-inline-item mr-2">
                                <a href="https://www.instagram.com/ternamakonveksi/" target="_blank"
                                    class="text-white d-flex align-items-center"><i class="mr-1 fab fa-instagram fs-24"></i> <span class="lh-213 font-weight-500"> Instagram</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pt-3 border-top mt-5">
            <p class="mb-3 mb-md-0 lh-1">
                © 2023 PT ANP. All rights reserved.
            </p>
        </div>
    </div>
</footer>
<!-- End Footer Content -->
