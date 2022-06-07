@extends('layouts.web')

<?php $seo = DB::table('seo')->where('id_seo', '1')->first(); ?>
@section('title')
  {{ $seo->title ? $seo->title : 'Jasa Pembuatan Website | websitetangguh.com' }}
@endsection

@section('description')
  {{ $seo->deskripsi ? $seo->deskripsi : 'Jasa Pembuatan Website | websitetangguh.com' }}
@endsection

@section('keyword')
  {{ $seo->keyword ? $seo->keyword : 'Jasa Pembuatan Website | websitetangguh.com' }}
@endsection

@section('content')

  @include('web.components.header')

  <!-- Main Content Wrapper Start -->
  <div class="light-wrapper">
    <div class="container inner">
      <div class="blog classic-view row">
        <div class="col-sm-8 blog-content">
          <div class="blog-posts">
            <div class="post">
              <div class="post-content">
                <figure class="main"> <img src="{{asset('assets/blog/'.$blog->gambar1)}}" alt="" /></figure>
                <div class="meta"><span class="date"><?php echo date('d', strtotime($blog->updated_at)); ?></span> <?php echo date('M', strtotime($blog->updated_at)); ?> <?php echo date('Y', strtotime($blog->updated_at)); ?></span></div>
                <h3 class="post-title"><a href="blog-post.html">{{$blog->nama}}</a></h3>
                <p>{!!$blog->konten!!}</p>

                <div class="clearfix"></div>
              </div>
              <!-- /.post-content -->
            </div>
            <!-- /.post -->

          </div>
          <!-- /.blog-posts -->

          <!-- /.comment-form-wrapper -->

        </div>
        <!-- /.blog-content -->

        <aside class="col-sm-4 sidebar">
          {{-- <div class="sidebox widget">
            <h4 class="widget-title">Search</h4>
            <form class="searchform" method="get">
              <input type="text" id="s1" name="s" value="Search something" onfocus="this.value=''" onblur="this.value='Search something'">
              <button type="submit" class="btn btn-default">Find</button>
            </form>
          </div> --}}
          <!-- /.widget -->
          <div class="sidebox widget">
            <h4 class="widget-title">Latest Posts</h4>
            <ul class="post-list">
              <?php $datablog = DB::table('blog')->whereNotIn('id', [$blog->id])->orderBy('id', 'DESC')->limit(8)->get(); ?>
              @foreach ($datablog as $result)
              <li>
                <figure class="overlay"> <a href="{{$result->slug}}">
                  <div class="overlay icon">
                    <div class="info"></div>
                  </div>
                  <img src="{{asset('assets/blog/'.$result->gambar1)}}" alt="" /> </a> </figure>
                <div class="post-content">
                  <div class="meta"><span class="date"><?php echo date('d', strtotime($result->updated_at)); ?> <?php echo date('M', strtotime($result->updated_at)); ?> <?php echo date('Y', strtotime($result->updated_at)); ?></span> </div>
                  <p> <a href="{{$result->slug}}">{{$result->nama}}</a> </p>
                </div>
              </li>
              @endforeach
            </ul>
            <!-- /.post-list -->
          </div>
          <!-- /.widget -->

          {{-- <div class="sidebox widget">
            <h4 class="widget-title">Categories</h4>
            <ul class="list-unstyled">
              <li><a href="#">Web Design (21)</a></li>
              <li><a href="#">Photography (19)</a></li>
              <li><a href="#">Graphic Design (16)</a></li>
              <li><a href="#">Manipulation (15)</a></li>
              <li><a href="#">Motion Graphics (12)</a></li>
            </ul>
          </div> --}}
          <!-- /.widget -->

        </aside>
        <!-- /column .sidebar -->

      </div>
      <!-- /.blog -->
    </div>
    <!-- /.container -->
  </div>
  <!-- Main Content Wrapper End -->

  @include('web.components.footer')

@endsection
