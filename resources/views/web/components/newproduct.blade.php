<section class="product-tab-area mb--95">
    <div class="container">
      <div class="row justify-content-center mb--45">
          <div class="col-xl-6 text-center">
              <h2 class="heading__secondary mb--10">New Product</h2>
              {{-- <p>Lorem og elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim.</p> --}}
          </div>
      </div>
        <div class="row">
            <div class="col-12">
                <div class="product-tab tab-style-2">

                    <div class="tab-content" id="new-arrival-tab-content">
                        <div class="tab-pane fade show active" id="nav-new" role="tabpanel" aria-labelledby="nav-new-tab">
                            <div class="zakas-element-carousel nav-right-center custom-center" data-slick-options='{
                                "spaceBetween": 30,
                                "slidesToShow": 4,
                                "slidesToScroll": 1,
                                "arrows": true,
                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-double-left" },
                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-double-right" }
                            }'
                            data-slick-responsive= '[
                                {"breakpoint":1199, "settings": {
                                    "slidesToShow": 3
                                }},
                                {"breakpoint":991, "settings": {
                                    "slidesToShow": 2
                                }},
                                {"breakpoint":575, "settings": {
                                    "slidesToShow": 1
                                }}
                            ]'>
                            <?php $dataproduct = DB::table('produk')->where('jenisproduk','1')->limit(8)->get(); ?>
                              @foreach ($dataproduct as $result)
                              <?php
                                $kategori = $result->kategoriproduk_id;
                                $product = DB::table('kategoriproduk')->where('id', $kategori)->first();
                                $namaKategori = $product->nama;
                                $slug = $product->slug;
                              ?>
                                <div class="item">
                                    <div class="zakas-product">
                                        <div class="product-inner">
                                            <figure class="product-image">
                                                <a href="{{ $result->slug }}">
                                                    <img src="{{asset('assets/product/'.$result->gambar1)}}" alt="Products">
                                                </a>

                                            </figure>
                                            <div class="product-info">
                                                <h3 class="product-title mb--15">
                                                    <a href="{{ $result->slug }}">{{ $result->nama }}</a>
                                                </h3>
                                                <div class="product-price-wrapper mb--30">
                                                    <span class="money">Rp {{ number_format($result->harga) }}</span>
                                                </div>
                                                <a href="{{ $result->slug }}" class="btn btn-small btn-bg-sand btn-color-dark">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
