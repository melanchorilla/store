<div class="light-wrapper">
  <div class="container inner">
    <div class="section-title">
      <h2>Our Recent News</h2>
    </div>
    <!-- /.section-title -->
    <div class="carousel-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
      <div class="owl-posts blog-carousel">
        <?php $datablog = DB::table('blog')->limit(3)->get(); ?>
        @foreach ($datablog as $result)
        <div class="item post">
          <figure class="main"><img src="{{asset('assets/blog/'.$result->gambar1)}}" alt="" /></figure>
          <div class="box">
            <div class="meta"><span class="date"><?php echo date('d', strtotime($result->updated_at)); ?> <?php echo date('M', strtotime($result->updated_at)); ?> <?php echo date('Y', strtotime($result->updated_at)); ?></span></div>
            <h3 class="post-title"><a href="{{$result->slug}}">{{$result->nama}}</a></h3>
            <a href="{{$result->slug}}" class="more">Read more</a> </div>
          <!-- /.box -->

        </div>
        @endforeach
        <!-- /.post -->
      </div>
      <!--/.carousel -->
    </div>
    <!--/.carousel-wrapper -->
  </div>
  <!-- /.container -->
</div>
<!-- /.light-wrapper -->
