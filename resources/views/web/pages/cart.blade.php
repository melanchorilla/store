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
      <h2 class="category-name">SHOPPING CART</h2>
      <ul class="breadcrumb">
        <li>
          <a href="index.html" class="smooth" title="">Home</a>
        </li>
        <li>
          <a href="/cart" class="smooth" title="">Shooping Cart</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="cart-page">
    <div class="container">
      <div id="checkout-cart" class="container">
        @csrf
        <?php
        $no_pemesanan = Session::get('no_pemesanan');
        if($no_pemesanan){
          ?>
          <div class="row" style="padding-top: 50px;">
            <div id="content" class="col-sm-12">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <td class="text-center">Image</td>
                      <td class="text-left">Product Name</td>
                      <td class="text-left">Quantity</td>
                      <td class="text-right">Unit Price</td>
                      <td class="text-right">Total</td>
                      <td class="text-left">Remove</td>
                    </tr>
                  </thead>
                  <tbody>
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
                        <td class="text-center">
                          <a href="#"><img src="{{asset('assets/product/'.$product->gambar1)}}" style="max-height: 100px;" alt="{{ $nama }}" title="{{ $nama }}" class="img-thumbnail"></a>
                        </td>
                        <td class="text-left">
                          <a href="#">{{ $nama }}</a>
                        </td>

                        <td class="text-left">
                          <div class="input-group btn-block" style="max-width: 200px;">
                            <input type="number" value="{{ $result->jumlah }}" class="form-control" name="qty" id="qty_<?php echo $kode_produk; ?>" min="0" max="<?php echo $stok;?>">
                          </div>
                        </td>
                        <td class="text-right">Rp {{ number_format($harga) }}</td>
                        <td class="text-right">Rp {{ number_format($result->total) }}</td>
                        <td class="text-left">
                          <a href="javascript:;" id="deletecart<?php echo $kode_produk;?>"><button type="button" data-toggle="tooltip" title="" class="btn btn-danger"data-original-title="Remove"><i class="fa fa-times-circle"></i></button></a>
                        </td>
                      </tr>
                    @endforeach
                    <!-- delete cart -->
                    <script type="text/javascript" charset="utf-8">
                    $(document).ready(function() {
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
                      $("#deletecart<?php echo $kode_produk; ?>").click(function(){

                        var kode_produk = '<?php echo $kode_produk; ?>';
                        var no_pemesanan = '<?php echo $no_pemesanan; ?>';
                        var token = $("input[name='_token']").val();

                        //alert(kode_produk+' '+no_pemesanan);
                        $.ajax({
                          type: "POST",
                          url : "/deletecart",
                          data: "_token="+token+
                          "&kode_produk="+kode_produk+
                          "&no_pemesanan="+no_pemesanan,
                          beforeSend: function() {
                            // setting a timeout
                            $.LoadingOverlay("show");
                          },
                          success: function(msg){
                            location.reload();
                          }
                        });

                      });
                      @endforeach

                      $("#updatecart").click(function(){
                        @foreach ($keranjang as $result)
                        <?php
                        $kode_produk = $result->kode_produk;
                        ?>
                        var kode_produk = '<?php echo $kode_produk; ?>';
                        var qty = $("#qty_<?php echo $kode_produk; ?>").val();
                        var token = $("input[name='_token']").val();

                        //alert(kode_produk+' '+qty);
                        $.ajax({
                          type: "POST",
                          url : "/updatecart",
                          data: "_token="+token+
                          "&kode_produk="+kode_produk+
                          "&qty="+qty,
                          beforeSend: function() {
                            // setting a timeout
                            $.LoadingOverlay("show");
                          },
                          success: function(msg){
                            location.reload();
                          }
                        });

                        @endforeach
                      });

                    });
                    </script>
                    <!-- delete cart -->
                  </tbody>

                </table>
              </div>

              <div class="buttons clearfix">
                <div class="pull-left"><a href="{{route('products')}}" class="btn btn-default">Continue Shopping</a>
                </div>
                <div class="pull-right">
                    <a href="javascript:;" id="updatecart" class="btn btn-primary">
                        Update Cart
                    </a>
                </div>
              </div>

              <br>
              <div class="row">
                <div class="col-sm-4 col-sm-offset-8">
                  <table class="table table-bordered">
                    <tbody>
                      <?php
                      $no_pemesanan = Session::get('no_pemesanan');
                      $get_pemesanan = DB::table('pemesanan')->where('no_pemesanan', $no_pemesanan)->first();
                      $get_subtotal = $get_pemesanan->subtotal;
                      $get_grandtotal = $get_pemesanan->grandtotal;
                      ?>
                      <tr>
                        <td class="text-right"><strong>Total:</strong></td>
                        <td class="text-right"><?php echo 'Rp'.number_format($get_subtotal,0,',','.'); ?></td>
                      </tr>
                    </tbody>
                  </table>

                </div>
              </div>
              <div class="buttons clearfix">
                <div class="pull-right">
                  <form role="form" method="post" id="checkoutform">
                    @csrf
                    <input type="hidden" name="kurir" value="none">
                    <input type="hidden" name="paket" value="none">
                    <input type="hidden" name="biaya" value="0">
                    <input type="hidden" name="diskon" value="0">
                    <input type="hidden" name="subtotal" value="<?php echo $get_subtotal; ?>">
                    <input type="hidden" name="total" value="<?php echo $get_subtotal; ?>">
                    <a href="javascript:;" id="sendcheckout" class="btn btn-primary">
                        Proceed To Checkout
                    </a>
                  </form>
                  {{-- <a href="checkout.html" class="btn btn-primary">Checkout</a> --}}
                </div>
              </div>
            </div>
          </div>
          <?php }else{ echo "Belum ada transaksi"; } ?>
        </div>
      </div>
      <script type="text/javascript">
        $(document).ready(function() {

            $("#sendcheckout").click(function(){

            var dataform = $("#checkoutform").serialize();
            //tinymce.triggerSave();
            var token = $("input[name='_token']").val();
            var kurir = $("#kurir").val();
            var paket = $("#paket").val();
            var biaya = $("#biaya").val();
            var diskon = $("#diskon").val();
            var subtotal = $("#subtotal").val();
            var total = $("#total").val();

            $.ajax({
              type: "POST",
              url : "/checkoutstore",
              data: dataform,
              beforeSend: function() {
                $.LoadingOverlay("show");
              },
              success: function(msg){
                document.location.href="/checkout";
              }
            });

          });

        });
      </script>

      <!-- Main Content Wrapper End -->

      @include('web.components.footer')

    @endsection
