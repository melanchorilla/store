<div class="featured-products best-seller">
  <div class="container">
    <h3 class="featured-title">
      <span>
        NEW <span>PRODUCTS</span>
      </span>
    </h3>
    <div class="featured-slider yt-content-slider" data-autoplay="yes" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="4" data-items_column0="4" data-items_column1="4" data-items_column2="3" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="no" data-loop="no" data-hoverpause="yes">
      <?php $dataproduct = DB::table('produk')->where('jenisproduk','1')->limit(8)->get(); ?>
      @foreach ($dataproduct as $result)
      <?php
        $kategori = $result->kategoriproduk_id;
        $product = DB::table('kategoriproduk')->where('id', $kategori)->first();
        $namaKategori = $product->nama;
        $slug = $product->slug;
      ?>
      <div class="item">
        <div class="product-box">
          <div class="product-image so-quickview left-block">
            <a href="{{ $result->slug }}" class="c-img link-product">
              <img src="{{asset('assets/product/'.$result->gambar1)}}" class="img-responsive" alt="">
            </a>
            {{-- <a class="smooth quickview iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" target="_self" data-fancybox-type="iframe">
              <i class="fa fa-search" aria-hidden="true"></i>
            </a> --}}
          </div>
          <div class="product-info">
            <h4 class="product-name"><a href="{{ $result->slug }}" class="smooth" title="">{{ $result->nama }}</a></h4>
            <div class="price">
              Rp {{ number_format($result->harga) }}
            </div>
            {{-- <div class="rating">
              <div class="rating-box">
                <span class="fa fa-stack">
                  <i class="fa fa-star fa-stack-1x"></i>
                  <i class="fa fa-star-o fa-stack-1x"></i>
                </span>
                <span class="fa fa-stack">
                  <i class="fa fa-star fa-stack-1x"></i>
                  <i class="fa fa-star-o fa-stack-1x"></i>
                </span>
                <span class="fa fa-stack">
                  <i class="fa fa-star fa-stack-1x"></i>
                  <i class="fa fa-star-o fa-stack-1x"></i>
                </span>
                <span class="fa fa-stack">
                  <i class="fa fa-star fa-stack-1x"></i>
                  <i class="fa fa-star-o fa-stack-1x"></i>
                </span>
                <span class="fa fa-stack">
                  <i class="fa fa-star-o fa-stack-1x"></i>
                </span>
              </div>
            </div> --}}
          </div>
          <div class="button-group">
            {{-- <button class="wishlist-btn smooth" onclick="window.location.href='compare.html'">
              <i class="fa fa-retweet" aria-hidden="true"></i>
            </button> --}}
            <button class="add-to-cart smooth" onclick="window.location.href='{{ $result->slug }}'"  style="width: 100%;">
              DETAIL
            </button>
            {{-- <button class="wishlist-btn smooth" onclick="window.location.href='wishlist.html'">
              <i class="fa fa-heart" aria-hidden="true"></i>
            </button> --}}
          </div>
          {{-- <span class="label-sale red-right">SALE</span> --}}
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
