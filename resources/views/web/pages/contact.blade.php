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
      <h1 class="category-name">CONTACT US</h1>
      <ul class="breadcrumb">
        <li>
          <a href="/home" class="smooth" title="">Home</a>
        </li>
        <li>
          <a href="javascript:;" class="smooth" title="">Contact Us</a>
        </li>
      </ul>
    </div>
  </div>

  <!-- ABOUT US -->
  <div class="contact-us">
    <div class="container">
      <div class="contact-maps">
        <iframe src="{{ $profiletoko->maps }}" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <div class="row">
        <div class="info-store col-lg-4 col-sm-4">
          <h2 class="contact-title">INFOMATION</h2>
          <div class="store-desc">
            {{-- <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p> --}}
          </div>
          <div class="store-address store-item">
            <p>{{ $profiletoko->alamat }}</p>
          </div>
          <div class="store-email store-item">
            <p>Email : <a href="mailto:{{ $profiletoko->email }}">{{ $profiletoko->email }}</a></p>
          </div>
          <div class="store-hotline store-item">
            <p>Hotline : <a href="tel:{{ $profiletoko->telepon }}">{{ $profiletoko->telepon }}</a></p>
          </div>
          <?php
            $gettwitter = DB::table('twitter')->where('id_twitter', '1')->first();
            $twitter  = $gettwitter ->twitter;
            $getinstagram = DB::table('instagram')->where('id_instagram', '1')->first();
            $instagram  = $getinstagram ->instagram;
            $getfacebook = DB::table('facebook')->where('id_facebook', '1')->first();
            $facebook  = $getfacebook ->facebook;
            $getyoutube = DB::table('youtube')->where('id_youtube', '1')->first();
            $youtube  = $getyoutube ->youtube;
          ?>
          <div class="store-social store-item">
            <ul>
              <li>
                <a href="{{ $twitter }}" target="_blank" class="smooth" title="">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li>
                <a href="{{ $facebook }}" target="_blank" class="smooth" title="">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li>
                <a href="{{ $instagram }}" target="_blank" class="smooth" title="">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li>
                <a href="{{ $youtube }}" target="_blank" class="smooth" title="">
                  <i class="fa fa-youtube" aria-hidden="true"></i>
                </a>
              </li>

            </ul>
          </div>
        </div>
        <div class="contact-form col-lg-8 col-sm-8">
          @csrf
          <h2 class="contact-title">Send your comments</h2>
          <form class="contact-form-submit" method="post" action="/contactadd" id="updateform">
            <div class="row row10">
              <div class="col-lg-6 col10 form-group">
                <input type="text" name="nama" id="nama" placeholder="Your Name :" class="form-control">
              </div>
              <div class="col-lg-6 col10 form-group">
                <input type="text" name="email" id="email" placeholder="Your Email :" class="form-control">
              </div>
              <div class=" col-lg-12 col10 form-group">
                <textarea name="message" id="message" placeholder="Your Comments :" class="form-control"></textarea>
              </div>
              <dic class="col-lg-12 col10">
                <button type="button" id="submit" class="form-control">SEND EMAIL</button>
              </dic>
            </div>
          </form>
          <script type="text/javascript">
            $(document).ready(function() {

              $("#submit").click(function(){

                var dataform = $("#updateform").serialize();

                var token = $("input[name='_token']").val();
                var nama = $("#nama").val();
                var email = $("#email").val();
                var message = $("#message").val();

                if(nama.length == 0){
                  alert("Maaf, Nama tidak boleh kosong");
                  $("#nama").focus();
                  return (false);
                }

                if(email.length == 0){
                  alert("Maaf, Email tidak boleh kosong");
                  $("#email").focus();
                  return (false);
                }

                if(message.length == 0){
                  alert("Maaf, Pesan tidak boleh kosong");
                  $("#message").focus();
                  return (false);
                }

                $.ajax({
                  type: "POST",
                  url : "/contactadd",
                  data: dataform,
                  beforeSend: function() {
                    //$.LoadingOverlay("show");
                  },
                  success: function(msg){
                    document.location.href="/contactsuccess";
                  }
                });

              });

            });
          </script>

        </div>
      </div>
    </div>
  </div>
  <!-- //ABOUT US -->

  <!-- Main Content Wrapper End -->

  @include('web.components.footer')

@endsection
