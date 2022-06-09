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

  <!-- pagination -->
    <style type="text/css">
    .holder {
      margin: 15px 0;
    }
    .holder a {
      font-size: 12px;
      cursor: pointer;
      margin: 0 5px;
      color: #0088cc;
      background-color: white;
      border:solid 1px #dddddd;
      padding: 10px;
    }
    .holder a:hover {
      background-color: #dddddd;
      color: black;
      text-decoration: none;
    }
    .holder a.jp-current, a.jp-current:hover {
      color: #0088cc;
      font-weight: bold;
      cursor: default;
      background: white;
    }
    .holder span { margin: 0 5px; }
    .customBtns { position: relative; }
    .arrowPrev, .arrowNext { width:29px; height:29px; position: absolute; top: 55px; cursor: pointer; }
    .arrowPrev { background-image: url('img/back.gif'); left: -45px; }
    .arrowNext { background-image: url('img/next.gif'); right: -40px; }
    .arrowPrev.jp-disabled, .arrowNext.jp-disabled { display: none; }

    .mt-5 {
      margin-top: 50px;
    }
    </style>
    <!-- pagination -->

  <!-- Main Content Wrapper Start -->

    <div class="light-wrapper">
    <div class="container inner">
      <div class="blog grid-view col3">
        <div class="blog-posts">
          <div class="row mt-5">
            <div class="col-md-12">
              <!-- form -->
              <form action="/blog" method="get" class="form-inline">
                {{-- <div class="form-group">
                  <label for="">Kategori</label>
                  <select class="form-control" name="category">
                    <option value="">-Pilih Kategori-</option>
                    @foreach($datablogcat as $blogcat)
                      <option value="{{ $blogcat->slug }}">{{ $blogcat->nama }}</option>
                    @endforeach
                  </select>
                </div> --}}

                <div class="form-group">
                  <label for="keyword">Keyword</label>
                  <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Cari Blog">
                </div>

                <button type="submit" class="btn btn-default">Search</button>
              </form>
              <!-- endform -->
            </div>
          </div>
          <div class="isotope row mt-5" id="itemContainer">
            @foreach ($datablog as $result)
            <div class="col-sm-6 col-md-4 grid-view-post">
              <div class="post">
                <figure class="main"><img src="{{asset('assets/blog/'.$result->gambar1)}}" alt="" /></figure>
                <div class="box ">
                  <div class="meta"><span class="date"><?php echo date('d', strtotime($result->updated_at)); ?> <?php echo date('M', strtotime($result->updated_at)); ?> <?php echo date('Y', strtotime($result->updated_at)); ?></span></div>
                  <h3 class="post-title"><a href="/blog/{{ $result->slug }}">{{$result->nama}}</a></h3>
                  <a href="/blog/{{ $result->slug }}" class="more">Read more</a>
                </div>
                <!-- /.box -->

              </div>
              <!-- /.post -->
            </div>
            <!-- /column -->
            @endforeach
          </div>
          <!-- /.isotope -->
        </div>
        <!-- /.blog-posts -->

        <div class="pagination text-center">
          <div class="holder">{{ $datablog->links() }}</div>
        </div>
        <!-- /.pagination -->

      </div>
      <!-- /.blog -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.light-wrapper -->

  <!-- Main Content Wrapper End -->

  @include('web.components.footer')

@endsection
