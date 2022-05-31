<!-- CUSTOMER OPINION -->
<div class="customer-opinion">
  <div class="container">
    <div class="customer-opinion-slider yt-content-slider" data-autoplay="yes" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1" data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
      <?php $gettestimoni = DB::table('testimoni')->get(); ?>
      @foreach ($gettestimoni as $result)
      <div class="item clearfix">
        <div class="customer-avatar">
          <img src="{{asset('assets/testimoni/'.$result->gambar)}}" class="img-responsive" alt="">
        </div>
        <div class="opinion">
          <p class="opinion-detail">{{ $result->testimoni }}</p>
          <p class="customer-name"><span>{{ $result->nama }} - {{ $result->jabatan }}</span></p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<!-- //CUSTOMER OPINION -->
