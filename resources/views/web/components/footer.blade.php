<!-- FOOTER -->
<footer class="typefooter-1">
  <!-- NEWLETTER -->
  {{-- <div class="newletter">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 newletter-left">
          <h4 class="new-letter-title">NEED HELP? CALL OUR AWARD-WINNING </h4>
          <p>SUPPORT TEAM 24/7 AT <a href="tel:(844)555-8386">(844) 555-8386</a></p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 newletter-right">
          <form action="#" method="post" class="send-letter form-inline">
            <div class="form-group form-box">
              <input type="text" name="email" placeholder="Enter your email address" class="form-control">
              <button type="submit" class="form-control">SUBSCRIBE</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> --}}
  <!-- //NEWLETTER -->
  <?php
    $getlogo = DB::table('logo')->where('id_logo', '1')->first();
    $logo = $getlogo->logo;

    $carabelanja = DB::table('page')->where('id', '1')->first();
    $slugbelanja = $carabelanja->slug;

    $term = DB::table('page')->where('id', '2')->first();
    $slugterm  = $term ->slug;

    $profiltoko = DB::table('profiltoko')->where('id_profiltoko', '1')->first();
    $namatoko  = $profiltoko ->nama;
    $profile  = $profiltoko ->profile;
    $alamat  = $profiltoko ->alamat;
    $telepon  = $profiltoko ->telepon;
    $email  = $profiltoko ->email;

    $gettwitter = DB::table('twitter')->where('id_twitter', '1')->first();
    $twitter  = $gettwitter ->twitter;
    $getinstagram = DB::table('instagram')->where('id_instagram', '1')->first();
    $instagram  = $getinstagram ->instagram;
    $getfacebook = DB::table('facebook')->where('id_facebook', '1')->first();
    $facebook  = $getfacebook ->facebook;
    $getyoutube = DB::table('youtube')->where('id_youtube', '1')->first();
    $youtube  = $getyoutube ->youtube;
  ?>
  <div class="footer-box">
    <!-- FOOTER MIDDLE -->
    <div class="footer-middle">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="footer-middle-box">
              <h3 class="footer-title">{{ $namatoko }}</h3>
              <div style="color: white;">
                  <p>{!! $profile !!}</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="footer-middle-box footer-middle-right">
              <h3 class="footer-title">contact us</h3>
              <ul class="contact-list">
                <li>
                  <i class="fa fa-map-marker" aria-hidden="true"></i>{{$alamat}}
                </li>
                <li>
                  <i class="fa fa-mobile" aria-hidden="true"></i><a href="tel:{{$telepon}}">{{$telepon}}</a>
                </li>
                <li>
                  <i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:{{$email}}">{{$email}}</a>
                </li>
              </ul>
              {{-- <div class="payment">
                <img src="{{ asset('web/image/catalog/demo/footer/paymen.png') }}" class="img-responsive" alt="">
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- //FOOTER MIDDLE -->
    <!-- FOOTER BOTTOM -->
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="footer-bottom-left">
              <h6 class="footer-bottom-title">
                Download Our App
              </h6>
              <a href="#" class="d-inline-block">
                <img src="{{ asset('web/image/catalog/demo/footer/down-app.png') }}" class="img-responsive" alt="">
              </a>
            </div>
          </div> --}}
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="footer-bottom-right">
              <h6 class="footer-bottom-title">
                Follow Us
              </h6>
              <ul class="footer-social">
                <li>
                  <a href="{{ $facebook }}" class="smooth" title="">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                  </a>
                </li>
                <li>
                  <a href="{{ $instagram }}" class="smooth" title="">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                  </a>
                </li>
                <li>
                  <a href="{{ $twitter }}" class="smooth" title="">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                  </a>
                </li>
                <li>
                  <a href="{{ $youtube }}" class="smooth" title="">
                    <i class="fa fa-youtube" aria-hidden="true"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              {{ $namatoko }} © {{ date('Y') }}. All Rights Reserved.
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- //FOOTER BOTTOM -->
  </div>
</footer>
<!-- //FOOTER -->
