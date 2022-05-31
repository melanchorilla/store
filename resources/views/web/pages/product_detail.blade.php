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

  <style>
    .product-detail-top .product-slider-box .gallery-box .product-detail-slider-gallery{
      padding: 0px;
    }
  </style>

  <!-- Main Content Wrapper Start -->
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60f7888399aec0ca"></script>


  <div class="breadcrumbs">
    <div class="container">
      <h2 class="category-name">{{ $product->nama }}</h2>
      <ul class="breadcrumb">
        <li>
          <a href="#" class="smooth" title="">Home</a>
        </li>
        <li>
          <a href="#" class="smooth" title="">Detail Produk</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="product-detail-top">
    <div class="container">
      <div class="clearfix box">
        <div class="product-slider-box clearfix">
          <div class="main-slider-box">
            <div class="product-detail-slider popup-gallery">
              <div class="item-slider">
                <a href="{{asset('assets/product/'.$product->gambar1)}}">
                  <img id="zoom_05" data-zoom-image="{{asset('assets/product/'.$product->gambar1)}}" src="{{asset('assets/product/'.$product->gambar1)}}">
                </a>
              </div>
              <div class="item-slider">
                <a href="{{asset('assets/product/'.$product->gambar2)}}">
                  <img id="zoom_05" data-zoom-image="{{asset('assets/product/'.$product->gambar2)}}" src="{{asset('assets/product/'.$product->gambar2)}}">
                </a>
              </div>
              <div class="item-slider">
                <a href="{{asset('assets/product/'.$product->gambar3)}}">
                  <img id="zoom_05" data-zoom-image="{{asset('assets/product/'.$product->gambar3)}}" src="{{asset('assets/product/'.$product->gambar3)}}">
                </a>
              </div>
              <div class="item-slider">
                <a href="{{asset('assets/product/'.$product->gambar4)}}">
                  <img id="zoom_05" data-zoom-image="{{asset('assets/product/'.$product->gambar4)}}" src="{{asset('assets/product/'.$product->gambar4)}}">
                </a>
              </div>
            </div>
          </div>

          <div class="gallery-box">
            <div class="product-detail-slider-gallery">
              <div class="gallery-item">
                <img src="{{asset('assets/product/'.$product->gambar1)}}">
              </div>
              <div class="gallery-item">
                <img src="{{asset('assets/product/'.$product->gambar2)}}">
              </div>
              <div class="gallery-item">
                <img src="{{asset('assets/product/'.$product->gambar3)}}">
              </div>
              <div class="gallery-item">
                <img src="{{asset('assets/product/'.$product->gambar4)}}">
              </div>
            </div>
          </div>
        </div>
        <div class="product-infomation">
          <div class="product-box">
            <h1 class="product-name">{{ $product->nama }}</h1>
            {{-- <div class="review-box">
              <div class="rating">
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
              </div>
              <a href="#reviews" data-toggle="scroll" class="smooth reviews-button"> 1 Reviews</a>
              <a href="#reviews" data-toggle="scroll" class="smooth add-reviews">Add Your Rivew</a>
            </div> --}}
            <div class="price">
              Rp {{ number_format($product->harga) }}
            </div>
            <div class="product-desc-box">
              <h4 class="product-desc-title">Quick Overview</h4>
              <p class="product-desc">{!! $product->deskripsi1 !!}</p>
              </div>
              <form method="post" id="updateform">
              @csrf
              <input type="hidden" name="idProduk" value="{{ $product->id }}">
              <div class="option-group">
                <div class="quantity-control-box">
                  <label>Qty:</label>
                  <input type="text" maxlength="12" id="qty" name="qty" class="input-quantity only-number" value="1">
                  <span class="quantity-control-btn quantity-add">+</span>
                  <span class="quantity-control-btn quantity-minus">-</span>
                </div>
                <div class="button-group">
                  {{-- <button class="add-to-cart smooth" onclick="window.location.href='cart.html'">
                    ADD TO CART
                  </button> --}}
                  <?php
                    $email = Session::get('email');
                    if($email){
                  ?>
                    <button id="submit" class="add-to-cart smooth" title="Add to Cart" type="button">Add to cart</button>
                  <?php
                    }else{
                      $segmen = Request::segment(1);
                      if($segmen){
                      ?>
                      <button onclick="window.location.href='/loginsegmen/{{ Request::segment(1) }}'" class="add-to-cart smooth" title="Add to Cart" type="button">Add to cart</button>
                      <?php }else{ ?>
                        <button onclick="window.location.href='/login'" class="add-to-cart smooth" title="Add to Cart" type="button">Add to cart</button>
                      <?php } ?>
                  <?php } ?>
                  {{-- <button class="wishlist-btn smooth" onclick="window.location.href='compare.html'">
                    <i class="fa fa-retweet" aria-hidden="true"></i>
                  </button>
                  <button class="wishlist-btn smooth" onclick="window.location.href='wishlist.html'">
                    <i class="fa fa-heart" aria-hidden="true"></i>
                  </button> --}}
                </div>
              </div>
              </form>

              <script type="text/javascript">
                $(document).ready(function() {
                    //alert('test');
                    //$.LoadingOverlay("show");
                    $("#submit").click(function(){

                    var dataform = $("#updateform").serialize();
                    //tinymce.triggerSave();
                    var token = $("input[name='_token']").val();
                    var qty = $("#qty").val();

                    if(qty <= 0){
                      alert("Maaf, Jumlah tidak boleh kosong");
                      $("#qty").focus();
                      return (false);
                    }

                    $.ajax({
                      type: "POST",
                      url : "/cartadd",
                      data: dataform,
                      beforeSend: function() {
                        //$.LoadingOverlay("show");
                      },
                      success: function(msg){
                        document.location.href="/cart";
                      }
                    });

                  });

                });
              </script>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="content-product">
      <div class="container">
        <div class="content-product-tab clearfix">

          <div class="tab-content" style="width: 100%;">
            <div id="description" class="tab-pane fade in active">
              <h3 class="featured-title">
                <span>
                  DESKRIPSI <span>PRODUK</span>
                </span>
              </h3>

              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>

                  </div>
                </div>
              </div>
            </div>

            <!-- RELEATED PRODUCTS -->
            <div class="featured-products releated-products">
              <div class="container">
                <h3 class="featured-title">
                  <span>
                    PRODUK <span>TERKAIT</span>
                  </span>
                </h3>
                <div class="featured-slider yt-content-slider" data-autoplay="yes" data-delay="4" data-speed="0.6" data-margin="30" data-items_column0="4" data-items_column1="4" data-items_column2="3" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
                  <?php
                  $id = $product->id;
                  $data_produk = DB::table('produk')->whereNotIn('id', [$id])->limit(4)->get();
                  ?>

                  @foreach ($data_produk as $result)
                  <div class="item">
                    <div class="product-box">
                      <div class="product-image">
                        <a href="{{ $result->slug }}" class="c-img link-product">
                          <img src="{{asset('assets/product/'.$result->gambar1)}}" class="img-responsive">
                        </a>
                        <a class="smooth quickview iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" target="_self" data-fancybox-type="iframe">
                          <i class="fa fa-search" aria-hidden="true"></i>
                        </a>
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
                        <?php
                          $email = Session::get('email');
                          if($email){
                        ?>
                          <button id="submit" class="add-to-cart smooth" title="Detail" type="button" style="width: 100%;">Detail</button>
                        <?php
                          }else{
                            $segmen = Request::segment(1);
                            if($segmen){
                            ?>
                            <button onclick="window.location.href='/loginsegmen/{{ Request::segment(1) }}'" class="add-to-cart smooth" title="Add to Cart" type="button">Add to cart</button>
                            <?php }else{ ?>
                              <button onclick="window.location.href='/login'" class="add-to-cart smooth" title="Add to Cart" type="button">Add to cart</button>
                            <?php } ?>
                        <?php } ?>
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
            <!-- //RELEATED PRODUCTS -->

            <!-- Main Content Wrapper End -->

            @include('web.components.footer')

          @endsection
