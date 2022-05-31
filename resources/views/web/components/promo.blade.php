<!-- INFOMATION SHIPPING -->
<div class="infomation">
  <div class="container">
    <div class="infomation-bg">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 box">
            <!-- BANNER -->
            <?php
              $getpromo = DB::table('promo')->where('id', 4)->first();
              $gambar = $getpromo->gambar;
              $permalink = $getpromo->permalink;
            ?>
    				<div>
    					<a href="{{$permalink}}" class="hv-full-light">
    						<img src="{{asset('assets/promo/'.$gambar)}}" class="img-responsive" alt="">
    					</a>
    				</div>
    				<!-- BANNER -->
        </div>

      </div>
    </div>
  </div>
</div>
<!-- //INFOMATION SHIPPING -->
