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
                <h2>Mohon Segera Selesaikan Pembayaran</h2><br>
                <h2>Jumlah yang harus dibayar</h2>
              </div>

              <hr>

              <div class="table-area">
                <div class="table-responsive">
                  <table class="table table-bordered text-center">
                    <thead>
                      <tr class="c-head">
                        <th style="border:1px solid #dee2e6;">Gambar</th>
                        <th style="border:1px solid #dee2e6;">Produk</th>
                        <th style="border:1px solid #dee2e6;">Harga</th>
                        <th style="border:1px solid #dee2e6;">Jumlah</th>
                        <!--<th>Berat</th>-->
                        <th style="border:1px solid #dee2e6;">Subtotal</th>
                      </tr>
                    </thead>
                    @foreach ($keranjang as $result)
                      <?php
                      $kode_produk = $result->kode_produk;
                      $product = DB::table('produk')->where('kode_produk', $kode_produk)->first();
                      $kode_produk = $product->kode_produk;
                      $nama = $product->nama;
                      $harga = $product->harga;
                      $berat = $product->berat;
                      $gambar1 = $product->gambar1;
                      ?>
                      <tr>
                        <td style="border:1px solid #dee2e6;">
                          <img style="width:100px;" src="{{asset('assets/product/'.$gambar1)}}" alt="" />
                        </td>
                        <td style="border:1px solid #dee2e6;">
                          {{ $nama }}
                        </td>
                        <td style="border:1px solid #dee2e6;">
                          <p>Rp {{ number_format($harga) }}</p>
                        </td>
                        <td style="border:1px solid #dee2e6;"><span>{{ $result->jumlah }}</span></td>
                        <td style="border:1px solid #dee2e6;">Rp {{ number_format($result->total) }}</td>
                      </tr>
                    @endforeach
                    <tr>
                      <td colspan="4" align="right" style="border:1px solid #dee2e6; padding-right:10px;">
                        Subtotal
                      </td>
                      <td style="border:1px solid #dee2e6;">Rp {{ number_format($datapemesanan->subtotal) }}</td>
                    </tr>
                    <tr>
                      <td colspan="4" align="right" style="border:1px solid #dee2e6; padding-right:10px;">
                        Pengiriman ({{ strtoupper($datapemesanan->provider_ongkir) }} - {{ strtoupper($datapemesanan->service_ongkir) }})
                      </td>
                      <td style="border:1px solid #dee2e6;">
                        Rp {{ number_format($datapemesanan->cost_ongkir) }}
                      </td>
                    </tr>
                    <tr>
                      <td colspan="4" align="right" style="border:1px solid #dee2e6; padding-right:10px;">
                        Grand Total
                      </td>
                      <td style="border:1px solid #dee2e6;">
                        Rp {{ number_format($datapemesanan->grandtotal) }}
                      </td>
                    </tr>
                  </table>

                </div>
              </div>

              <hr>
              <div class="short-description" style="text-align: center; margin-top:20px;">
                <img style="width:100px;" src="{{asset('assets/bank/'.$databank->gambar)}}">
              </div>
              <br>
              <div class="short-description" style="text-align: center; margin-bottom:20px;">
                <h2>{{ $datarekening->rekening }}</h2><br>
                <h2>a/n {{ $datarekening->atasnama }}</h2>
              </div>
              <hr>
              <div class="add-to-box" style="text-align: center; margin-top:20px;">
                <div class="add-to-cart">
                  <button onclick="location.href='/member/paymentstatus'" style="float: none; padding: 10px; margin:0px;background-color: #1c95d1; color: white; font-weight: normal; cursor: pointer;" class="button" title="Cek Status Pemesanan" type="button"><span style="font-size: 20px;">Cek Status Pembayaran</span></button>
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
