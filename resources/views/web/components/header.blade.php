<!-- HEADER CONTAINER -->
<header class="typeheader-1">
  <!-- HEADER TOP -->
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-9">
          <div class="header-user">
            <ul>
              <?php
              $profiltoko = DB::table('profiltoko')->where('id_profiltoko', '1')->first();
              $email  = $profiltoko->email;
              $telepon  = $profiltoko->telepon;
              ?>
              <li>
                <a href="javascript:;" class="smooth" title="">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                  Email : {{$email}}</a>
                </li>

              </ul>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-3">
            <div class="header-hotline">
              <div class="item">
                <p>
                  <span class="hidden-md">Contact Us:</span> <a href="tel:{{$telepon}}" class="smooth" title=""><span>{{$telepon}}</span></a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- //HEADER TOP -->

    <!-- HEADER CENTER -->
    <div class="header-center">
      <div class="container">
        <?php
          $getlogo = DB::table('logo')->where('id_logo', '1')->first();
          $logo = $getlogo->logo;
        ?>
        <div class="logo">
          <a href="/home" class="" title="">
            <img src="{{asset('public/assets/logo/'.$logo)}}" alt="">
          </a>
        </div>

        <style>
          @media (max-width: 767px) {
            .hidden-xs {
            display: none !important;
            }
          }
          @media (min-width: 768px) and (max-width: 991px) {
            .hidden-sm {
            display: none !important;
            }
          }
          @media (min-width: 992px) and (max-width: 1199px) {
            .hidden-md {
            display: none !important;
            }
          }
          @media (min-width: 1200px) {
            .hidden-lg {
            display: none !important;
            }
          }
        </style>

        <div class="search-form hidden-xs" style="width: 68%;">
          <button type="button" class="smooth search-form-btn"><i class="fa fa-search"></i></button>
          <form action="/search" method="post">
            @csrf
            <div class="icon">
              <i class="fa fa-search" aria-hidden="true"></i>
            </div>
            <input type="text" name="search" id="search" placeholder="Enter your keyword...">
            <button type="submit">Search</button>
          </form>
        </div>

        <div class="search-form hidden-sm hidden-md hidden-lg" style="width: 100%;">
          <button type="button" class="smooth search-form-btn"><i class="fa fa-search"></i></button>
          <form action="/search" method="post">
            @csrf
            <div class="icon">
              <i class="fa fa-search" aria-hidden="true"></i>
            </div>
            <input type="text" name="search" id="search" placeholder="Enter your keyword...">
            <button type="submit">Search</button>
          </form>
        </div>

        <?php
        $no_pemesanan = Session::get('no_pemesanan');
        $jumlahPemesanan  = DB::table('detailpemesanan')->where('no_pemesanan', $no_pemesanan)->count();
        if($jumlahPemesanan){
          $val_jumlah = $jumlahPemesanan;
        }else{
          $val_jumlah = '0';
        }
        ?>
        <div class="cart">
          <a href="javascript:;" onclick="window.location.href='/cart';" class="smooth cart-box dropdown-toggle" title="" data-toggle="dropdown">
            <img src="{{ asset('web/image/catalog/demo/header/cart.png') }}" class="cart-image" alt="">
            <p class="quantity">{{ $val_jumlah }} item(s)</p>
            <p class="cart-title">MY COURSE</p>
          </a>
          {{-- <ul class="dropdown-menu shopping-cart">
          <li class="shopping-cart-title clearfix">
          <label>Your Course Order</label>
          <label>Price</label>
        </li>
        <li class="product-item">
        <table class="table cart-table">
        <tbody>
        <tr>
        <td class="product-item-image">
        <a href="detail.html" class="" title="">
        <img src="{{ asset('web/image/catalog/demo/products/cart-product1.png') }}" alt="" class="img-responsive">
      </a>
      <button class="remove-product-cart smooth">
      <i class="fa fa-times"></i>
    </button>
  </td>
  <td class="product-item-name">
  <h4 class="product-name">
  <a href="detail.html" class="smooth" title="">Diam nonummy nibh</a>
</h4>
<span class="product-item-quantity">Quantity: 01</span>
</td>
<td class="product-item-price">
<span class="shopping-price">$320.00</span>
</td>
</tr>
<tr>
<td class="product-item-image">
<a href="detail.html" class="" title="">
<img src="{{ asset('web/image/catalog/demo/products/cart-product2.png') }}" alt="" class="img-responsive">
</a>
<button class="remove-product-cart smooth">
<i class="fa fa-times"></i>
</button>
</td>
<td class="product-item-name">
<h4 class="product-name">
<a href="detail.html" class="smooth" title="">Diam nonummy nibh</a>
</h4>
<span class="product-item-quantity">Quantity: 01</span>
</td>
<td class="product-item-price">
<span class="shopping-price">$450.00</span>
</td>
</tr>
<tr>
<td class="product-item-image">
<a href="detail.html" class="" title="">
<img src="{{ asset('web/image/catalog/demo/products/cart-product3.png') }}" alt="" class="img-responsive">
</a>
<button class="remove-product-cart smooth">
<i class="fa fa-times"></i>
</button>
</td>
<td class="product-item-name">
<h4 class="product-name">
<a href="detail.html" class="smooth" title="">Diam nonummy nibh</a>
</h4>
<span class="product-item-quantity">Quantity: 01</span>
</td>
<td class="product-item-price">
<span class="shopping-price">$250.00</span>
</td>
</tr>
</tbody>
</table>
</li>
<li class="total-price clearfix">
<label class="total-title">TOTAL:</label>
<label class="float-right">$1030.00</label>
</li>
<li class="shopping-cart-checkout">
<a href="cart.html" class="smooth" title="">GO TO CART</a>
<a href="checkout.html" class="smooth" title="">CHECKOUT</a>
</li>
</ul> --}}
</div>
</div>
</div>
<!-- //HEADER CENTER -->

<!-- HEADER BOTTOM -->
<div class="header-bottom">
  <div class="container">
    <div class="header-bottom-left">
      <div class="header-menu">
        <div class="megamenu-style-dev megamenu-dev">
          <div class="responsive">
            <nav class="navbar-default">
              <div class="container-megamenu-horizontal">
                <div class="nav-bar-header">
                  <button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle smooth">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                  </button>
                </div>
                <div class="megamenu-wrapper">
                  <span id="remove-megamenu"><i class="fa fa-times" aria-hidden="true"></i></span>
                  <div class="megamenu-pattern">
                    <div class="container1">
                      <ul class="megamenu clearfix" data-transition="fade" data-animationtime="500">
                        <li class="full-width">
                          <a href="{{route('home')}}" class="smooth cleafix" title="">
                            HOME
                          </a>
                        </li>
                        <!-- <li class="full-width">
                          <a href="{{route('about')}}" class="smooth cleafix" title="">
                            
                          </a>
                        </li> -->
                        <li class="full-width menu-contact with-sub-menu hover">
                          <p class="close-menu"></p>
                          <a href="javascript:;" class="smooth cleafix" title="">
                          ABOUT US
                            <b class="caret"> </b>
                          </a>
                          <div class="sub-menu" style="max-width: 350px;">
                            <div class="content">
                              <div class="row">
                                <div class="col-sm-6">
                                  <ul>
                                    <li>
                                      <a href="{{route('about')}}" class="smooth" title="">About Us</a>
                                    </li>
                                    <li>
                                    <a href="{{route('facility')}}" class="smooth cleafix" title="">Facilities</a>
                                    </li>
                                    <li>
                                    <a href="{{route('partnership')}}" class="smooth cleafix" title="">Partnership</a>
                                    </li>
                                    <li>
                                    <a href="{{route('testimoni')}}" class="smooth cleafix" title="">Testimonial</a>
                                    </li>
                                    <li>
                                    <a href="{{route('faq')}}" class="smooth cleafix" title="">FAQs</a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="full-width menu-contact with-sub-menu hover">
                          <p class="close-menu"></p>
                          <a href="javascript:;" class="smooth cleafix" title="">
                            COURSES
                            <b class="caret"> </b>
                          </a>
                          <div class="sub-menu" style="max-width: 350px;">
                            <div class="content">
                              <div class="row">
                                <div class="col-sm-6">
                                  <ul>
                                    <li>
                                      <a href="/page/nasa-akademi" class="smooth" title="">NASA AKADEMI</a>
                                    </li>
                                    <li>
                                    <a href="{{route('products')}}" class="smooth cleafix" title="">NASA ONLINE</a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="full-width">
                          <a href="{{route('contact')}}" class="smooth cleafix" title="">
                            CONTACT US
                          </a>
                        </li>
                        
                        <li class="full-width menu-contact with-sub-menu hover">
                          <p class="close-menu"></p>
                          <a href="javascript:;" class="smooth cleafix" title="">
                            ACCOUNT
                            <b class="caret"> </b>
                          </a>
                          <div class="sub-menu">
                            <div class="content">
                              <div class="row">
                                <div class="col-sm-6">
                                  <ul>
                                    <?php $email = Session::get('email'); ?>
                                    <?php if($email){ ?>
                                      <li><a href="/member/dashboard" class="smooth">DASHBOARD</a></li>
                                      <li><a href="/memberlogout" class="smooth">LOGOUT</a></li>
                                      <?php }else{ ?>
                                        <li><a href="/login" class="smooth">LOGIN</a></li>
                                        <li><a href="/register" class="smooth">REGISTER</a></li>
                                        <?php } ?>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </li>


                            <li class="full-width">
                              <a href="{{route('blog')}}" class="smooth cleafix" title="">
                                BLOG
                              </a>
                            </li>

                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="header-bottom-right">
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
          <ul>
            <li>
              <a href="{{$facebook}}" target="_blank" class="smooth" title>
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
            </li>
            <li>
              <a href="{{$instagram}}" target="_blank" class="smooth" title>
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </li>
            <li>
              <a href="{{$twitter}}" target="_blank" class="smooth" title>
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
            </li>
            <li>
              <a href="{{$youtube}}" target="_blank" class="smooth" title>
                <i class="fa fa-youtube" aria-hidden="true"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- //HEADER BOTTOM -->
  </header>
  <!-- //HEADER CONTAINER -->
