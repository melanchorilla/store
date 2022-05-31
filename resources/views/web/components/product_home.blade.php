<div class="featured-products best-seller">
  <div class="container">
    <h3 class="featured-title">
      <span>
        OUR <span>PRODUCTS</span>
      </span>
    </h3>

	<div class="product-list-view">
		<div class="row">
      <?php $dataproduct = DB::table('produk')->limit(8)->get(); ?>
      @foreach ($dataproduct as $result)
      <?php
        $kategori = $result->kategoriproduk_id;
        $product = DB::table('kategoriproduk')->where('id', $kategori)->first();
        $namaKategori = $product->nama;
        $slug = $product->slug;
      ?>
			<div class="product-layout product-layout-table col-lg-3 col-md-3 col-sm-6 col-xs-6 col-12">
				<div class="product-box clearfix">
					<div class="product-image">
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
						{{-- <div class="product-desc">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit
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
				</div>
			</div>
      @endforeach
		</div>
	</div>

</div>
</div>
