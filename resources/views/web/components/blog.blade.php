<!-- LATEST BLOGS -->
<div class="blogs">
  <div class="container">
    <h3 class="featured-title">
      <span>
        LATEST <span>BLOGS</span>
      </span>
    </h3>
    <div class="blog-slider yt-content-slider" data-autoplay="yes" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="2" data-items_column0="2" data-items_column1="2" data-items_column2="1" data-items_column3="1" data-items_column4="1" data-arrows="no" data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
      <?php $datablog = DB::table('blog')->limit(3)->get(); ?>
      @foreach ($datablog as $result)
      <div class="blog-slider-item">
        <div class="blog-box clearfix">
          <div class="blog-image">
            <a href="{{$result->slug}}" class="hv-light-v2">
              <img src="{{asset('assets/blog/'.$result->gambar1)}}" class="img-responsive" alt="">
            </a>
            <div class="post-time">
              <span class="post-day"><?php echo date('d', strtotime($result->updated_at)); ?></span>
              <span class="post-month"><?php echo date('M', strtotime($result->updated_at)); ?></span>
            </div>
          </div>
          <div class="blog-info">
            <h5 class="blog-title"><a href="{{$result->slug}}" class="smooth" title="">{{$result->nama}}</a></h5>
            <p class="blog-desc">
              <?php
                  $isi = substr(strip_tags($result->konten),0,200);
                  echo $isi." ...";
              ?>
            </p>
            <a href="{{$result->slug}}" class="smooth read-more" title="">READ MORE<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<!-- //LATEST BLOGS -->
