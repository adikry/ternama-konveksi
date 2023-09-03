@if ($portofolios)
    @foreach ($portofolios as $porto)
        <section class="py-5 py-lg-8 bg-main">
            <div class="container container-xxl">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-2">
                        <h1 class="fs-30 fs-lg-40 text-white">{{ $porto->kategori_id }}</h1>
                    </div>
                    <div class="col-lg-10">
                        <div class="category-slider">
                            <div class="slick-slider dots-inner-center custom-slider-01"
                                data-slick-options='{"slidesToShow": 1, "infinite":true,"autoplay":false,"dots":true,"arrows":true, "responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":1}},{"breakpoint": 576,"settings": {"slidesToShow": 1}}]}'>
                                <div class="box">
                                    <div
                                        class="card bg-accent card-display rounded-lg shadow-sm px-2 py-2 position-relative">
                                        <div class="d-flex justify-content-between">
                                            <div class="w-50 img-card-custom" style="padding-bottom: 40%">
                                                <img src="/assets/images/porto/porto1.jpg" alt="T-Shirt"
                                                    class="card-img rounded-lg shadow" />
                                            </div>
                                            <div class="w-50 d-inline-flex flex-column px-5 pt-3 pb-4">
                                                <h1 class="mb-2 pt-5 fs-20 fs-lg-30 lh-1 text-white">
                                                    Porto Judul / Nama
                                                </h1>
                                                <h3 class="mt-5 fs-16 fs-lg-20 text-white">
                                                    Detail portofolio / project detail
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box">
                                    <div
                                        class="card bg-accent card-display rounded-lg shadow-sm px-2 py-2 position-relative">
                                        <div class="d-flex justify-content-between">
                                            <div class="w-50 img-card-custom" style="padding-bottom: 40%">
                                                <img src="/assets/images/porto/porto1.jpg" alt="T-Shirt"
                                                    class="card-img rounded-lg shadow" />
                                            </div>
                                            <div class="w-50 d-inline-flex flex-column px-5 pt-3 pb-4">
                                                <h1 class="mb-2 pt-5 fs-20 fs-lg-30 lh-1 text-white">
                                                    Porto Judul / Nama
                                                </h1>
                                                <h3 class="mt-5 fs-16 fs-lg-20 text-white">
                                                    Detail portofolio / project detail
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box">
                                    <div
                                        class="card bg-accent card-display rounded-lg shadow-sm px-2 py-2 position-relative">
                                        <div class="d-flex justify-content-between">
                                            <div class="w-50 img-card-custom" style="padding-bottom: 40%">
                                                <img src="/assets/images/porto/porto1.jpg" alt="T-Shirt"
                                                    class="card-img rounded-lg shadow" />
                                            </div>
                                            <div class="w-50 d-inline-flex flex-column px-5 pt-3 pb-4">
                                                <h1 class="mb-2 pt-5 fs-20 fs-lg-30 lh-1 text-white">
                                                    Porto Judul / Nama
                                                </h1>
                                                <h3 class="mt-5 fs-16 fs-lg-20 text-white">
                                                    Detail portofolio / project detail
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endif
