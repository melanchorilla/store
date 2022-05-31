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
    </style>
  <!-- pagination -->

  <!-- Main Content Wrapper Start -->

  <div class="breadcrumbs">
    <div class="container">
      <h1 class="category-name">Keyword : {{ $keyword }}</h1>
      <ul class="breadcrumb">
        <li>
          <a href="/home" class="smooth" title="">Home</a>
        </li>
        <li>
          <a href="javascript:;" class="smooth" title="">Search Product</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="product-list">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="product-list-view">
            <div class="row" id="itemContainer">
              @csrf
              <?php if($ceksearch){ ?>
              @foreach ($search as $result)
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
                    <div class="product-desc">
                      {{ $result->deskripsi1 }}
                    </div>
                  </div>
                  <div class="button-group">
                    {{-- <button class="wishlist-btn smooth" onclick="window.location.href='compare.html'">
                      <i class="fa fa-retweet" aria-hidden="true"></i>
                    </button> --}}
                    <button class="add-to-cart smooth" onclick="window.location.href='{{ $result->slug }}'">
                      ADD TO CART
                    </button>
                    {{-- <button class="wishlist-btn smooth" onclick="window.location.href='wishlist.html'">
                      <i class="fa fa-heart" aria-hidden="true"></i>
                    </button> --}}
                  </div>
                </div>
              </div>
              @endforeach
              <?php }else{ echo "Data tidak ditemukan";} ?>
            </div>
          </div>
          <div class="product-filter-top">
            <div class="row">
              <div class="col-lg-12 col-sm-12 col-xs-12 form-inline">
                <div class="holder" style="text-align: center;"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Content Wrapper End -->

  @include('web.components.footer')

@endsection
