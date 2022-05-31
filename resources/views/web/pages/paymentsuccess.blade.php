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

  <div class="breadcrumbs">
    <div class="container">
      <h1 class="category-name">Checkout Berhasil</h1>
      <ul class="breadcrumb">
        <li>
          <a href="/home" class="smooth" title="">Home</a>
        </li>
        <li>
          <a href="javascript:;" class="smooth" title="">Checkout Berhasil</a>
        </li>
      </ul>
    </div>
  </div>


  <!-- ABOUT US -->
  <div class="about-us">
    <div style="padding: 50px;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 about-desc-box">
            {{-- <h2 class="about-title">CHECKOUT<span> BERHASIL</span></h2> --}}
            <div class="about-desc">
              <!-- konten -->
              <div style="text-align: center;">
                <h2>Terima Kasih, Sudah Berbelanja di Toko Kami</h2><br>
                <h2>Transaksi Anda Sedang Diproses</h2><br>
              </div>

              <hr>

              <div class="add-to-box" style="text-align: center; margin-top:20px;">
                <div class="add-to-cart">
                  <button onclick="location.href='/member/confirmation'" style="float: none; padding: 10px; margin:0px;background-color: #1c95d1; color: white; font-weight: normal; cursor: pointer;" class="button" title="Cek Status Pemesanan" type="button"><span style="font-size: 20px;">Cek Status Pemesanan</span></button>
                </div>
              </div>

              <!-- konten -->
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- //ABOUT US -->

  <!-- Main Content Wrapper End -->

  @include('web.components.footer')

@endsection
