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
  <link href="{{ asset('web/css/themecss/so_onepagecheckout.css') }}" rel="stylesheet">
  <!-- spinner -->
  <style type="text/css">
  .loader {
    margin: 20px auto;
    font-size: 7px;
    width: 1em;
    height: 1em;
    border-radius: 50%;
    position: relative;
    text-indent: -9999em;
    -webkit-animation: load5 1.1s infinite ease;
    animation: load5 1.1s infinite ease;
    -webkit-transform: translateZ(0);
    -ms-transform: translateZ(0);
    transform: translateZ(0);
  }
  @-webkit-keyframes load5 {
    0%,
    100% {
      box-shadow: 0em -2.6em 0em 0em #f20707, 1.8em -1.8em 0 0em rgba(242,7,7, 0.2), 2.5em 0em 0 0em rgba(242,7,7, 0.2), 1.75em 1.75em 0 0em rgba(242,7,7, 0.2), 0em 2.5em 0 0em rgba(242,7,7, 0.2), -1.8em 1.8em 0 0em rgba(242,7,7, 0.2), -2.6em 0em 0 0em rgba(242,7,7, 0.5), -1.8em -1.8em 0 0em rgba(242,7,7, 0.7);
    }
    12.5% {
      box-shadow: 0em -2.6em 0em 0em rgba(242,7,7, 0.7), 1.8em -1.8em 0 0em #f20707, 2.5em 0em 0 0em rgba(242,7,7, 0.2), 1.75em 1.75em 0 0em rgba(242,7,7, 0.2), 0em 2.5em 0 0em rgba(242,7,7, 0.2), -1.8em 1.8em 0 0em rgba(242,7,7, 0.2), -2.6em 0em 0 0em rgba(242,7,7, 0.2), -1.8em -1.8em 0 0em rgba(242,7,7, 0.5);
    }
    25% {
      box-shadow: 0em -2.6em 0em 0em rgba(242,7,7, 0.5), 1.8em -1.8em 0 0em rgba(242,7,7, 0.7), 2.5em 0em 0 0em #f20707, 1.75em 1.75em 0 0em rgba(242,7,7, 0.2), 0em 2.5em 0 0em rgba(242,7,7, 0.2), -1.8em 1.8em 0 0em rgba(242,7,7, 0.2), -2.6em 0em 0 0em rgba(242,7,7, 0.2), -1.8em -1.8em 0 0em rgba(242,7,7, 0.2);
    }
    37.5% {
      box-shadow: 0em -2.6em 0em 0em rgba(242,7,7, 0.2), 1.8em -1.8em 0 0em rgba(242,7,7, 0.5), 2.5em 0em 0 0em rgba(242,7,7, 0.7), 1.75em 1.75em 0 0em #f20707, 0em 2.5em 0 0em rgba(242,7,7, 0.2), -1.8em 1.8em 0 0em rgba(242,7,7, 0.2), -2.6em 0em 0 0em rgba(242,7,7, 0.2), -1.8em -1.8em 0 0em rgba(242,7,7, 0.2);
    }
    50% {
      box-shadow: 0em -2.6em 0em 0em rgba(242,7,7, 0.2), 1.8em -1.8em 0 0em rgba(242,7,7, 0.2), 2.5em 0em 0 0em rgba(242,7,7, 0.5), 1.75em 1.75em 0 0em rgba(242,7,7, 0.7), 0em 2.5em 0 0em #f20707, -1.8em 1.8em 0 0em rgba(242,7,7, 0.2), -2.6em 0em 0 0em rgba(242,7,7, 0.2), -1.8em -1.8em 0 0em rgba(242,7,7, 0.2);
    }
    62.5% {
      box-shadow: 0em -2.6em 0em 0em rgba(242,7,7, 0.2), 1.8em -1.8em 0 0em rgba(242,7,7, 0.2), 2.5em 0em 0 0em rgba(242,7,7, 0.2), 1.75em 1.75em 0 0em rgba(242,7,7, 0.5), 0em 2.5em 0 0em rgba(242,7,7, 0.7), -1.8em 1.8em 0 0em #f20707, -2.6em 0em 0 0em rgba(242,7,7, 0.2), -1.8em -1.8em 0 0em rgba(242,7,7, 0.2);
    }
    75% {
      box-shadow: 0em -2.6em 0em 0em rgba(242,7,7, 0.2), 1.8em -1.8em 0 0em rgba(242,7,7, 0.2), 2.5em 0em 0 0em rgba(242,7,7, 0.2), 1.75em 1.75em 0 0em rgba(242,7,7, 0.2), 0em 2.5em 0 0em rgba(242,7,7, 0.5), -1.8em 1.8em 0 0em rgba(242,7,7, 0.7), -2.6em 0em 0 0em #f20707, -1.8em -1.8em 0 0em rgba(242,7,7, 0.2);
    }
    87.5% {
      box-shadow: 0em -2.6em 0em 0em rgba(242,7,7, 0.2), 1.8em -1.8em 0 0em rgba(242,7,7, 0.2), 2.5em 0em 0 0em rgba(242,7,7, 0.2), 1.75em 1.75em 0 0em rgba(242,7,7, 0.2), 0em 2.5em 0 0em rgba(242,7,7, 0.2), -1.8em 1.8em 0 0em rgba(242,7,7, 0.5), -2.6em 0em 0 0em rgba(242,7,7, 0.7), -1.8em -1.8em 0 0em #f20707;
    }
  }
  @keyframes load5 {
    0%,
    100% {
      box-shadow: 0em -2.6em 0em 0em #f20707, 1.8em -1.8em 0 0em rgba(242,7,7, 0.2), 2.5em 0em 0 0em rgba(242,7,7, 0.2), 1.75em 1.75em 0 0em rgba(242,7,7, 0.2), 0em 2.5em 0 0em rgba(242,7,7, 0.2), -1.8em 1.8em 0 0em rgba(242,7,7, 0.2), -2.6em 0em 0 0em rgba(242,7,7, 0.5), -1.8em -1.8em 0 0em rgba(242,7,7, 0.7);
    }
    12.5% {
      box-shadow: 0em -2.6em 0em 0em rgba(242,7,7, 0.7), 1.8em -1.8em 0 0em #f20707, 2.5em 0em 0 0em rgba(242,7,7, 0.2), 1.75em 1.75em 0 0em rgba(242,7,7, 0.2), 0em 2.5em 0 0em rgba(242,7,7, 0.2), -1.8em 1.8em 0 0em rgba(242,7,7, 0.2), -2.6em 0em 0 0em rgba(242,7,7, 0.2), -1.8em -1.8em 0 0em rgba(242,7,7, 0.5);
    }
    25% {
      box-shadow: 0em -2.6em 0em 0em rgba(242,7,7, 0.5), 1.8em -1.8em 0 0em rgba(242,7,7, 0.7), 2.5em 0em 0 0em #f20707, 1.75em 1.75em 0 0em rgba(242,7,7, 0.2), 0em 2.5em 0 0em rgba(242,7,7, 0.2), -1.8em 1.8em 0 0em rgba(242,7,7, 0.2), -2.6em 0em 0 0em rgba(242,7,7, 0.2), -1.8em -1.8em 0 0em rgba(242,7,7, 0.2);
    }
    37.5% {
      box-shadow: 0em -2.6em 0em 0em rgba(242,7,7, 0.2), 1.8em -1.8em 0 0em rgba(242,7,7, 0.5), 2.5em 0em 0 0em rgba(242,7,7, 0.7), 1.75em 1.75em 0 0em #f20707, 0em 2.5em 0 0em rgba(242,7,7, 0.2), -1.8em 1.8em 0 0em rgba(242,7,7, 0.2), -2.6em 0em 0 0em rgba(242,7,7, 0.2), -1.8em -1.8em 0 0em rgba(242,7,7, 0.2);
    }
    50% {
      box-shadow: 0em -2.6em 0em 0em rgba(242,7,7, 0.2), 1.8em -1.8em 0 0em rgba(242,7,7, 0.2), 2.5em 0em 0 0em rgba(242,7,7, 0.5), 1.75em 1.75em 0 0em rgba(242,7,7, 0.7), 0em 2.5em 0 0em #f20707, -1.8em 1.8em 0 0em rgba(242,7,7, 0.2), -2.6em 0em 0 0em rgba(242,7,7, 0.2), -1.8em -1.8em 0 0em rgba(242,7,7, 0.2);
    }
    62.5% {
      box-shadow: 0em -2.6em 0em 0em rgba(242,7,7, 0.2), 1.8em -1.8em 0 0em rgba(242,7,7, 0.2), 2.5em 0em 0 0em rgba(242,7,7, 0.2), 1.75em 1.75em 0 0em rgba(242,7,7, 0.5), 0em 2.5em 0 0em rgba(242,7,7, 0.7), -1.8em 1.8em 0 0em #f20707, -2.6em 0em 0 0em rgba(242,7,7, 0.2), -1.8em -1.8em 0 0em rgba(242,7,7, 0.2);
    }
    75% {
      box-shadow: 0em -2.6em 0em 0em rgba(242,7,7, 0.2), 1.8em -1.8em 0 0em rgba(242,7,7, 0.2), 2.5em 0em 0 0em rgba(242,7,7, 0.2), 1.75em 1.75em 0 0em rgba(242,7,7, 0.2), 0em 2.5em 0 0em rgba(242,7,7, 0.5), -1.8em 1.8em 0 0em rgba(242,7,7, 0.7), -2.6em 0em 0 0em #f20707, -1.8em -1.8em 0 0em rgba(242,7,7, 0.2);
    }
    87.5% {
      box-shadow: 0em -2.6em 0em 0em rgba(242,7,7, 0.2), 1.8em -1.8em 0 0em rgba(242,7,7, 0.2), 2.5em 0em 0 0em rgba(242,7,7, 0.2), 1.75em 1.75em 0 0em rgba(242,7,7, 0.2), 0em 2.5em 0 0em rgba(242,7,7, 0.2), -1.8em 1.8em 0 0em rgba(242,7,7, 0.5), -2.6em 0em 0 0em rgba(242,7,7, 0.7), -1.8em -1.8em 0 0em #f20707;
    }
  }
  </style>
  <!-- spinner -->

  <!-- Main Content Wrapper Start -->

  <div class="breadcrumbs">
    <div class="container">
      <h1 class="category-name">CHECKOUT</h1>
      <ul class="breadcrumb">
        <li>
          <a href="/home" class="smooth" title="">Home</a>
        </li>
        <li>
          <a href="javascript:;" class="smooth" title="">Checkout</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="checkout">
    <div class="container">
      <div class="row">
        <div id="content" class="col-sm-12">
          <h1 class="title"></h1>
          <div class="so-onepagecheckout layout1">
            <div class="col-left col-lg-6 col-md-6 col-sm-6 col-xs-12">

              <div class="checkout-content checkout-register">
                <fieldset id="account">
                  <h2 class="secondary-title"><i class="fa fa-user-plus"></i>Your Billing Details</h2>
                  <div class="payment-new box-inner">
                    <?php
                    $email = Session::get('email');
                    $detail_member = DB::table('member')->where('email', $email)->first();
                    $get_nama = $detail_member->name;
                    $get_email = $detail_member->email;
                    $get_telepon = $detail_member->telepon;
                    ?>
                    <div class="form-group required">
                      <input type="text" name="getnama" id="getnama" placeholder="Nama" value="{{ $get_nama }}" disabled class="form-control">
                    </div>
                    <div class="form-group required">
                      <input type="text" type="text" name="getemail" id="getemail" placeholder="Email"  value="{{ $get_email }}" disabled class="form-control">
                    </div>
                    <div class="form-group fax-input">
                      <input type="text" name="gettelepon" id="gettelepon" placeholder="Telepon" value="{{ $get_telepon }}" disabled class="form-control">
                    </div>
                  </div>
                </fieldset>

              </div>
            </div>

            <div class="col-right col-lg-6 col-md-6 col-sm-6 col-xs-12">

              <section class="section-right">
                <div class="checkout-content checkout-cart">
                  <h2 class="secondary-title"><i class="fa fa-shopping-cart"></i>Shopping Cart </h2>
                  <div class="box-inner">
                    <div class="table-responsive checkout-product">
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th class="text-left name" colspan="2">Product Name</th>
                            <th class="text-center quantity">Quantity</th>
                            <th class="text-center checkout-price">Unit Price</th>
                            <th class="text-right total">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no_pemesanan = Session::get('no_pemesanan');
                          $keranjang = DB::table('detailpemesanan')->where('no_pemesanan', $no_pemesanan)->get();
                          ?>
                          @foreach ($keranjang as $result)
                            <?php
                            $kode_produk = $result->kode_produk;
                            $product = DB::table('produk')->where('kode_produk', $kode_produk)->first();
                            $kode_produk = $product->kode_produk;
                            $nama = $product->nama;
                            $harga = $product->harga;
                            $berat = $product->berat;
                            $stok = $product->stok;
                            $gambar1 = $product->gambar1;
                            ?>
                            <tr>
                              <td class="text-left name" colspan="2">
                                <a href="javascript:;"><img src="{{asset('assets/product/'.$gambar1)}}" alt="{{ $nama }}" title="{{ $nama }}" class="img-thumbnail"></a>
                                <a href="javascript:;" class="product-name">{{ $nama }}</a>
                              </td>
                              <td class="text-left quantity">
                                {{ $result->jumlah }}
                              </td>
                              <td class="text-right price">Rp {{ number_format($harga) }}</td>
                              <td class="text-right total">Rp {{ number_format($harga*$result->jumlah) }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                        <tfoot>
                          <?php
                          $no_pemesanan = Session::get('no_pemesanan');
                          $get_pemesanan = DB::table('pemesanan')->where('no_pemesanan', $no_pemesanan)->first();
                          $get_subtotal = $get_pemesanan->subtotal;
                          $get_grandtotal = $get_pemesanan->grandtotal;
                          ?>
                          <tr>
                            <td colspan="4" class="text-left">Sub-Total:</td>
                            <td class="text-right">Rp {{ number_format($get_subtotal) }}</td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>

                    <!-- batas -->
                    <?php
                    $email = Session::get('email');
                    $detail_member = DB::table('member')->where('email', $email)->first();
                    $get_nama = $detail_member->name;
                    $get_email = $detail_member->email;
                    $get_telepon = $detail_member->telepon;
                    ?>
                    <form role="form" method="post" id="paymentform">
                      @csrf
                      <input type="text" name="namapen" id="namapen" value="{{ $get_nama }}" class="input-text validate-postcode" style="display:none;" hidden>
                      <input type="text" name="emailpen" id="emailpen" value="{{ $get_email }}" class="input-text validate-postcode" style="display:none;" hidden>
                      <input type="text" name="teleponpen" id="teleponpen" value="{{ $get_telepon }}" class="input-text validate-postcode" style="display:none;" hidden>
                      <input type="text" name="banktujuan" id="banktujuan" class="input-text validate-postcode" style="display:none;" hidden>

                      <div class="checkout-title mt--10">
                        <h5 style="margin-bottom:10px;">Pilih Alamat</h5>
                      </div>

                      <?php
                      $email = Session::get('email');
                      $detail_member = DB::table('member')->where('email', $email)->first();
                      $kode_member = $detail_member->kode_member;
                      $defalamat = DB::table('alamat')->where('kode_member', $kode_member)->orderBy('id_alamat', 'asc')->first();
                      $id_alamat = $defalamat->id_alamat;
                      ?>

                      <select name="alamatalternatif" id="alamatalternatif" class="form-control" style="font-size:15px; height:100%;">
                        <option value="0">Pilih Alamat Pengiriman</option>
                        <?php
                        $data_alamat = DB::table('alamat')->where('kode_member', $kode_member)->get();
                        ?>
                        @foreach ($data_alamat as $result)
                          <option value="{{ $result->id_alamat }}"
                            @if ($id_alamat == $result->id_alamat) selected @endif >{{ $result->nama_alamat }}</option>
                            @endforeach
                          </select>
                          <br>
                          <div id="row_alamat" style="font-size: 15px"></div>
                          <small># Alamat ini yang akan dipakai untuk pengiriman, jika akan menggunakan alamat lain silahkan ganti alamat</small>

                          <br>
                          {{-- <a href="/alamat" target="_blank" style="border:#c2080f solid 1px; line-height: 35px; min-height: 35px; min-width: 145px; margin:20px 0 20px 0;" class="btn">Ganti Alamat</a> --}}

                          <!-- script -->
                          <script type="text/javascript">
                          $(document).ready(function() {

                            //$("#spinner").hide();
                            //$("#alamatalternatif").change(function(){
                            var alamatalternatif = $("#alamatalternatif").val();
                            //alert(alamatalternatif);
                            if(alamatalternatif=='0'){ $("#row_alamat").hide(); }else{

                              $.ajax({
                                type: "GET",
                                url : "/getalamat/"+alamatalternatif,
                                beforeSend: function() {
                                  $("#row_alamat").hide();
                                  $("#spinner").show();
                                },
                                success: function(data){
                                  $("#spinner").hide();
                                  $("#row_alamat").show();
                                  $('#row_alamat').html(data.html);
                                }
                              });

                            }

                            //});

                            $("#alamatalternatif").change(function(){
                              var alamatalternatif = $("#alamatalternatif").val();
                              //alert('blog');
                              if(alamatalternatif=='0'){ $("#row_alamat").hide(); }else{

                                $.ajax({
                                  type: "GET",
                                  url : "/getalamat/"+alamatalternatif,
                                  beforeSend: function() {
                                    $("#row_alamat").hide();
                                    $("#spinner").show();
                                  },
                                  success: function(data){
                                    $("#spinner").hide();
                                    $("#row_alamat").show();
                                    $('#row_alamat').html(data.html);
                                  }
                                });

                              }

                              getShipping();

                            });

                          });
                          </script>
                          <!-- script -->
                          <br>
                          <h5 style="margin-bottom:10px;">Pilih Pengiriman :</h5>
                          <div>
                            <div id="jenis_kurir2">
                              <select name="jenis_kurir" id="jenis_kurir" class="form-control" style="font-size:15px; height:100%;">
                                <option value='0'>-- Pilih Pengiriman --</option>
                              </select>
                            </div>
                            <div class="loader" id="spinner2">Loading...</div>
                          </div>

                          <!-- script -->
                          <script type="text/javascript">
                          function addCommas(nStr) {
                            nStr += '';
                            x = nStr.split('.');
                            x1 = x[0];
                            x2 = x.length > 1 ? '.' + x[1] : '';
                            var rgx = /(\d+)(\d{3})/;
                            while (rgx.test(x1)) {
                              x1 = x1.replace(rgx, '$1' + '.' + '$2');
                            }
                            return x1 + x2;
                          }

                          function getShipping() {
                            $(document).ready(function() {
                              <?php
                              $profiltoko = DB::table('profiltoko')->where('id_profiltoko', '1')->first();
                              $origin = $profiltoko->kota;

                              $no_pemesanan = Session::get('no_pemesanan');
                              $sumberat = DB::table("detailpemesanan")->where('no_pemesanan', $no_pemesanan)->get()->sum('berat');

                              ?>

                              var origin = '<?php echo $origin;?>';
                              var idalamat = $("#alamatalternatif").val();
                              //var weight = '0';
                              var weight = '<?php echo $sumberat;?>';
                              //alert(destination);
                              var jne = "jne";
                              var tiki = "tiki";
                              var pos = "pos";
                              var jnt = "jnt";

                              $.ajax({
                                type: "GET",
                                url : "/shipping/"+origin+"/"+idalamat,
                                beforeSend: function() {
                                  $("#jenis_kurir").hide();
                                  $("#spinner2").show();
                                },
                                success: function(data){
                                  $("#spinner2").hide();
                                  //$(".nice-select").hide();
                                  $("#jenis_kurir").show();
                                  $('#jenis_kurir').html(data.html);
                                }
                              });
                            });

                            var biaya = 0;
                            //alert(url);
                            //var kurir_lain = $("#kurir_lain").val();
                            <?php
                            $no_pemesanan = Session::get('no_pemesanan');
                            $pemesanan = DB::table('pemesanan')->where('no_pemesanan', $no_pemesanan)->first();
                            $subtotal = $pemesanan->subtotal;
                            ?>
                            var total2 = '{{ $subtotal }}';
                            var jumlah2 = parseInt(biaya)+parseInt(total2);
                            var total_semua = jumlah2;

                            $("#biayacost").html("Rp "+addCommas(biaya));
                            $("#grand_total").html("Rp "+addCommas(total_semua));
                            $("#grand_total2").val(total_semua);
                            $("#amount").val(total_semua);

                          }
                          $(document).ready(function() {

                            getShipping();

                            $("#jenis_kurir").change(function(){
                              //alert('test');
                              var nilai=$(this).find('option:selected').val();
                              //alert(nilai);

                              var promo = $("#pot_promo").val();
                              var propinsi = $("#data_propinsi").val();
                              var kota = $("#data_kota").val();
                              var kurir2 = $("#jenis_kurir").val();
                              var url = nilai;
                              var explode = url.split('-');
                              var kurir = explode[0];
                              var paket = explode[1];
                              var biaya = explode[2];
                              //alert(url);
                              //var kurir_lain = $("#kurir_lain").val();
                              <?php
                              $no_pemesanan = Session::get('no_pemesanan');
                              $pemesanan = DB::table('pemesanan')->where('no_pemesanan', $no_pemesanan)->first();
                              $subtotal = $pemesanan->subtotal;
                              ?>
                              var total2 = '{{ $subtotal }}';
                              var jumlah2 = parseInt(biaya)+parseInt(total2);
                              var total_semua = jumlah2;

                              $("#biayacost").html("Rp "+addCommas(biaya));
                              $("#grand_total").html("Rp "+addCommas(total_semua));
                              $("#grand_total2").val(total_semua);
                              $("#amount").val(total_semua);

                              // }else{

                              //     $("#grand_total").val("Rp"+addCommas(total2));

                              // }

                            });

                          });
                          </script>
                          <!-- script -->

                          <br>

                          <table class="table text-right">
                            <?php
                            $no_pemesanan = Session::get('no_pemesanan');
                            $pemesanan = DB::table('pemesanan')->where('no_pemesanan', $no_pemesanan)->first();
                            ?>
                            <tr>
                              <td>Sub Total</td>
                              <td>Rp {{ number_format($pemesanan->subtotal) }}</td>
                            </tr>
                            <tr>
                              <td>Pengiriman</td>
                              <td id="biayacost">Rp {{ number_format($pemesanan->cost_ongkir) }}</td>
                            </tr>
                            <tr>
                              <td>Grand Total</td>
                              <td id="grand_total">Rp {{ number_format($pemesanan->subtotal) }}</td>
                            </tr>
                          </table>

                          <div class="payment-group mt--20">
                            <input type="text" name="grand_total2" id="grand_total2" style="display:none;" hidden/>
                            <a href="javascript:;" type="button" id="modalpembayaran" class="btn btn-primary button confirm-button">Pembayaran</a>

                          </div>
                        </form>
                        <!-- batas -->
                        <!-- payment request -->
                        <form action="/apirequest" id="MerchatPaymentPage" name="MerchatPaymentPage" method="post" >
                          @csrf
                          <?php
                          $no_pemesanan = Session::get('no_pemesanan');
                          $getpemesanan = DB::table('pemesanan')->where('no_pemesanan', $no_pemesanan)->first();
                          $grandtotal = $getpemesanan->$grandtotal;
                          $biaya = $getpemesanan->$cost_ongkir;
                          $keranjang = DB::table('detailpemesanan')->where('no_pemesanan', $no_pemesanan)->get();
                          ?>
                          @foreach ($keranjang as $result)
                            <?php
                            $kode_produk = $result->kode_produk;
                            $product = DB::table('produk')->where('kode_produk', $kode_produk)->first();
                            $kode_produk = $product->kode_produk;
                            $nama_produk = $product->nama;
                            $harga = $product->harga;
                            $qty = $result->jumlah;
                            $subtotal = $result->total;

                            // $nama_produk = $items['name'];
                            // $harga = $items['price'];
                            // $qty = $items['qty'];
                            // $subtotal = $items['subtotal'];
                            // $grandtotal = $this->cart->total();

                            $nama_harga = $nama_produk.','.number_format($harga,2,'.','').','.$qty.','.number_format($subtotal,2,'.','');
                            $arr_basket[] = $nama_harga;
                            ?>
                            @endforeach

                          <?php
                          $imp_basket = implode(';',$arr_basket);
                          $jumlah=1;
                          $ongkir = 'Ongkir,'.number_format($biaya,2,'.','').','.$jumlah.','.number_format($biaya,2,'.','');
                          ?>

                          <?php
                          $email = Session::get('email');
                          $detail_member = DB::table('member')->where('email', $email)->first();
                          $get_nama = $detail_member->name;
                          $get_email = $detail_member->email;
                          $get_telepon = $detail_member->telepon;
                          ?>
                            <input name="amount" type="hidden" id="amount" size="12" />
                            <input name="merchantorderid" type="hidden" id="TRANSIDMERCHANT" size="16" />
                            <input name="email" type="hidden" id="email" value="{{ $get_email }}" size="20" />
                            <input name="phonenumber" type="hidden" id="phonenumber" value="{{ $get_telepon }}" size="15" maxlength="20" />
                            <input type="hidden" id="paymentmethod" name="paymentmethod" value="" />


                            <!--<a class="next-btn" href="javascript:;" data-toggle="modal" data-target="#myModal">Lanjutkan Pembayaran</a>-->
                          </form>

                          <!-- payment request -->
                        </div>
                      </div>

                      {{-- <div class="checkout-content confirm-section">
                      <div class="confirm-order">
                      <button id="so-checkout-confirm-button" data-loading-text="Loading..." class="btn btn-primary button confirm-button">Confirm Order</button>
                    </div>
                  </div> --}}
                </section>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
    $(document).ready(function() {

      $("#modalpembayaran").click(function(){

        var alamatalternatif = $("#alamatalternatif").val();
        var jenis_kurir = $("#jenis_kurir").val();

        if(alamatalternatif==0){
          alert('Maaf, Alamat pengiriman tidak boleh kosong');
          $("#alamatalternatif").focus();
          return false();
        }

        if(jenis_kurir==0){
          alert('Maaf, Pengiriman tidak boleh kosong');
          $("#jenis_kurir").focus();
          return false();
        }

        $('#pilihpembayaran').modal('show');

      });
    });
    </script>
    <!-- modal payment 2 -->

    <div class="modal fade" id="pilihpembayaran" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Pilih Pembayaran</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <!--<button class="btn" data-toggle="modal" data-target="#myModal3" id="modal3">Modal 3</button>-->
            <ul class="list-group">
              <li class="list-group-item" style="background-color:#eae8e8;">Bank Transfer</li>
              <li class="list-group-item">
                <a href="javascript:;" onclick="payment('VA')"><img style="max-width:70px; display: inline;" class="img-responsive" src="{{asset('assets/bank/VA.PNG')}}"></a>
              </li>
              <li class="list-group-item">
                <a href="javascript:;" onclick="payment('BT')"><img style="max-width:70px; display: inline;" class="img-responsive" src="{{asset('assets/bank/BT.PNG')}}"></a>
              </li>
              <li class="list-group-item">
                <a href="javascript:;" onclick="payment('B1')"><img style="max-width:70px; display: inline;" class="img-responsive" src="{{asset('assets/bank/B1.PNG')}}"></a>
              </li>
              <li class="list-group-item">
                <a href="javascript:;" onclick="payment('A1')"><img style="max-width:70px; display: inline;" class="img-responsive" src="{{asset('assets/bank/A1.PNG')}}"></a>
              </li>
              <li class="list-group-item">
                <a href="javascript:;" onclick="payment('I1')"><img style="max-width:70px; display: inline;" class="img-responsive" src="{{asset('assets/bank/I1.PNG.jpg')}}"></a>
              </li>
              <li class="list-group-item" style="background-color:#eae8e8;">Kartu Kredit</li>
              <li class="list-group-item">
                <a href="javascript:;" onclick="payment('VC')"><img style="max-width:70px; display: inline;" class="img-responsive" src="{{asset('assets/bank/VC.PNG')}}"></a>
              </li>
              <li class="list-group-item" style="background-color:#eae8e8;">e-Banking</li>
              <li class="list-group-item">
                <a href="javascript:;" onclick="payment('BK')"><img style="max-width:70px; display: inline;" class="img-responsive" src="{{asset('assets/bank/BK.PNG')}}"></a>
              </li>
              <li class="list-group-item" style="background-color:#eae8e8;">Retail</li>
              <li class="list-group-item">
                <a href="javascript:;" onclick="payment('FT')"><img style="max-width:70px; display: inline;" class="img-responsive" src="{{asset('assets/bank/CONVENIENCESTOR.PNG.jpg')}}"></a>
              </li>
            </ul>
          </div>

          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
    $(document).ready(function() {

      <?php
      $databank  = DB::table('rekening')
      ->join('bank', 'rekening.bank', '=', 'bank.id_bank')
      ->select('rekening.id_rekening','bank.id_bank', 'bank.gambar')
      ->get();
      ?>
      @foreach ($databank as $i)
      $("#rekening{{ $i->id_bank }}").keypress(function(data){
        if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57))
        {
          return false;
        }
      });

      $("#manual{{ $i->id_rekening }}").click(function(){
        // var bank = $("#namabank").val();
        // var rekening = $("#rekening").val();
        // var nama = $("#nama").val();
        var dataform = $("#paymentform").serialize();
        var token = $("input[name='_token']").val();
        var banktujuan = '{{ $i->id_rekening }}';
        var namapen = $("#namapen").val();
        var emailpen = $("#emailpen").val();
        var teleponpen = $("#teleponpen").val();
        var alamatalternatif = $("#alamatalternatif").val();
        var data_propinsi = $("#data_propinsi").val();
        var data_kota = $("#data_kota").val();
        var jenis_kurir = $("#jenis_kurir").val();
        var url = jenis_kurir;
        var explode = url.split('-');
        var kurir = explode[0];
        var paket = explode[1];
        var biaya = explode[2];
        var promo = $("#promo").val();
        var total = $("#grand_total{{ $i->id_bank }}").val();
        var grandtotal = $("#grand_total").val();
        var grandtotal2 = $("#grand_total2").val();
        // alert(kurir);
        // alert(paket);
        // alert(biaya);
        // alert(total);
        // alert(detailkurir);

        $.ajax({
          type: "POST",
          url : "/payment",
          data: "_token="+token+
          "&namapen="+namapen+
          "&emailpen="+emailpen+
          "&teleponpen="+teleponpen+
          "&banktujuan="+banktujuan+
          "&alamatalternatif="+alamatalternatif+
          "&data_propinsi="+data_propinsi+
          "&data_kota="+data_kota+
          "&jenis_kurir="+jenis_kurir+
          "&grand_total2="+grandtotal2,

          beforeSend: function() {
            // setting a timeout
            $.LoadingOverlay("show");
          },
          success: function(msg){
            //alert(msg);
            document.location.href="/thankyou/"+msg;
          }
        });

      });

      @endforeach

    });
    </script>

    <script language="javascript" type="text/javascript">

    function randomString(STRlen) {
        var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
        var string_length = STRlen;
        var randomstring = '';
        for (var i=0; i<string_length; i++) {
            var rnum = Math.floor(Math.random() * chars.length);
            randomstring += chars.substring(rnum,rnum+1);
        }

        return randomstring;

    }

    function genInvoice() {
    document.MerchatPaymentPage.TRANSIDMERCHANT.value = randomString(12);
    }

    genInvoice();
    // getWords();
    // getRequestDateTime();
    // genSessionID();

    function payment(channel) {

      var channel = channel;
      $("#paymentmethod").val(channel);

      var token = $("input[name='_token']").val();
      var transidmerchant = $("#TRANSIDMERCHANT").val();
      var totalamount = $("#amount").val();
      var trxstatus = 'Requested';

      var dataform = $("#paymentform").serialize();
      var banktujuan = '';
      var namapen = $("#namapen").val();
      var emailpen = $("#emailpen").val();
      var teleponpen = $("#teleponpen").val();
      var alamatalternatif = $("#alamatalternatif").val();
      var data_propinsi = $("#data_propinsi").val();
      var data_kota = $("#data_kota").val();
      var jenis_kurir = $("#jenis_kurir").val();
      var url = jenis_kurir;
      var explode = url.split('-');
      var kurir = explode[0];
      var paket = explode[1];
      var biaya = explode[2];
      var promo = $("#promo").val();
      var total = '';
      var grandtotal = $("#grand_total").val();
      var grandtotal2 = $("#grand_total2").val();

      $.ajax({
        type: "POST",
        url : "/store",
        data: "_token="+token+
        "&transidmerchant="+transidmerchant+
        "&totalamount="+totalamount+
        "&trxstatus="+trxstatus+
        "&channel="+channel+
        "&namapen="+namapen+
        "&emailpen="+emailpen+
        "&teleponpen="+teleponpen+
        "&banktujuan="+banktujuan+
        "&alamatalternatif="+alamatalternatif+
        "&data_propinsi="+data_propinsi+
        "&data_kota="+data_kota+
        "&jenis_kurir="+jenis_kurir+
        "&grand_total2="+grandtotal2,
        beforeSend: function() {
          // setting a timeout
          //$("#loading").attr('hidden',false);
          $.LoadingOverlay("show");
        },
        success: function(msg){
          document.getElementById("MerchatPaymentPage").submit();
        }
      });

    }

    function paymentdebug(channel) {

      var channel = channel;
      $("#paymentmethod").val(channel);

      var token = $("input[name='_token']").val();
      var transidmerchant = $("#TRANSIDMERCHANT").val();
      var totalamount = $("#amount").val();
      var trxstatus = 'Requested';

      var dataform = $("#paymentform").serialize();
      var banktujuan = '';
      var namapen = $("#namapen").val();
      var emailpen = $("#emailpen").val();
      var teleponpen = $("#teleponpen").val();
      var alamatalternatif = $("#alamatalternatif").val();
      var data_propinsi = $("#data_propinsi").val();
      var data_kota = $("#data_kota").val();
      var jenis_kurir = $("#jenis_kurir").val();
      var url = jenis_kurir;
      var explode = url.split('-');
      var kurir = explode[0];
      var paket = explode[1];
      var biaya = explode[2];
      var promo = $("#promo").val();
      var total = '';
      var grandtotal = $("#grand_total").val();
      var grandtotal2 = $("#grand_total2").val();

      document.getElementById("MerchatPaymentPage").submit();


    }

    </script>
    <!-- Doku -->

    <script>
    var widget1;
    var response;
    var onloadCallback = function() {
      widget1 = grecaptcha.render('my-recaptcha-placeholder', {
        'sitekey' : '6LdoSwsUAAAAALSrorV56kpampIDD73WQfw370vv'
      });
    };

    function setPaymentInfo(isChecked)
    {
      var namapem = $("#namapem").val();
      var emailpem = $("#emailpem").val();
      var alamatpem = $("#alamatpem").val();
      var telponpem = $("#telponpem").val();
      var propinsipem = $("#propinsipem").val();
      var kotapem = $("#kotapem").val();
      var kodepospem = $("#kodepospem").val();

      var namapen = $("#namapen").val();
      var emailpen = $("#emailpen").val();
      var alamatpen = $("#alamatpen").val();
      var telponpen = $("#telponpen").val();
      var propinsipen = $("#propinsipen").val();
      var kotapen = $("#kotapen").val();
      var kodepospen = $("#kodepospen").val();

      if (isChecked) {
        $("#namapen").val(namapem);
        $("#emailpen").val(emailpem);
        $("#alamatpen").val(alamatpem);
        $("#telponpen").val(telponpem);
        $("#propinsipen").val(propinsipem);
        $("#kotapen").val(kotapem);
        $("#kodepospen").val(kodepospem);

      } else {
        $("#namapen").val('');
        $("#emailpen").val('');
        $("#alamatpen").val('');
        $("#telponpen").val('');
        $("#propinsipen").val('');
        $("#kotapen").val('');
        $("#kodepospen").val('');
      }

    }

    function myFunction() {
      var namapen = $("#namapen").val();
      var emailpen = $("#emailpen").val();
      var alamatpen = $("#alamatpen").val();
      var telponpen = $("#telponpen").val();
      var propinsipen = $("#propinsipen").val();
      var kotapen = $("#kotapen").val();
      var kodepospen = $("#kodepospen").val();

      // if(namapen ==0){
      // alert('Maaf, Nama Penerima  tidak boleh kosong');
      // $("#namapen ").focus();
      // return false();
      // }

      // if(alamatpen==0){
      // alert('Maaf, Alamat Pengiriman tidak boleh kosong');
      // $("#alamatpen").focus();
      // return false();
      // }

      // if(telponpen==0){
      // alert('Maaf, Telepon Penerima tidak boleh kosong');
      // $("#telponpen").focus();
      // return false();
      // }

      //response = grecaptcha.getResponse(widget1);
      //if(response){
      //alert('Berhasil');
      // document.reload();
      $("#loading").attr('hidden',false);
      document.getElementById("mycheckout").submit();
      //}else {
      //alert('Captcha tidak boleh kosong!');
      // }


    }
    </script>

    <!-- Main Content Wrapper End -->

    @include('web.components.footer')

  @endsection
