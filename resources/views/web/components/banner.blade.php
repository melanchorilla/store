<!-- BANNER -->
<div class="banner" style="margin-top: 0px;">
  <div class="container">
    <div class="row row0">
      <?php $datapromo = DB::table('promo')->whereNotIn('id', [4])->get(); ?>
      @foreach ($datapromo as $result)
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 col0">
        <a href="#" class="hv-border-inline-bg">
          <img src="{{asset('assets/promo/'.$result->gambar)}}" class="img-responsive" alt="">
        </a>
      </div>
      @endforeach
    </div>
  </div>
</div>
<!-- //BANNER -->
