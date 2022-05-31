
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<!-- Basic page needs
	============================================ -->
	<title>Store 15 Website Tangguh</title>
	<meta charset="utf-8">
	<meta name="keywords" content="html template, furniture html template, interior html template, furniture & interior html template, best html template, best furniture template, best furniture theme, furniture theme, theme for furniture" />
	<meta name="description" content="Furnicom is an awesome premium HTML template for any kind of online store, especially for furniture, interior, decoration, design studio and more. Quickly & easily build your website just by some clicks." />
	<meta name="author" content="Smartaddons">
	<meta name="robots" content="index, follow" />
<!-- Mobile specific metas
	============================================ -->

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Favicon
	============================================ -->
	<?php
    $getfavicon = DB::table('logo')->where('id_logo', '1')->first();
    $favicon = $getfavicon->favicon;
  ?>
	<link rel="shortcut icon" type="image/png" href="{{asset('assets/favicon/'.$favicon)}}"/>
	<script type="text/javascript" src="{{ asset('web/js/jquery-2.2.4.min.js') }}"></script>

<!-- Libs CSS
	============================================ -->
	<link rel="stylesheet" href="{{ asset('web/css/bootstrap/css/bootstrap.min.css') }}">
  <link href="{{ asset('web/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('web/js/datetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
  <link href="{{ asset('web/js/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
  <link href="{{ asset('web/js/lightslider/lightslider.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/themecss/lib.css') }}" rel="stylesheet">
  <link href="{{ asset('web/js/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
  <link href="{{ asset('web/js/minicolors/miniColors.css') }}" rel="stylesheet">
  <link href="{{ asset('web/js/slick-slider/slick.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('web/js/quickview/magnific-popup.css') }}">
<!-- Theme CSS
  ============================================ -->
  <link href="{{ asset('web/css/themecss/so_sociallogin.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/themecss/so_searchpro.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/themecss/so_megamenu.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/themecss/so-categories.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/themecss/so-listing-tabs.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/themecss/so-category-slider.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/themecss/so-newletter-popup.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/footer/footer1.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/header/header1.css') }}" rel="stylesheet">
  <link id="color_scheme" href="{{ asset('web/css/theme.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/responsive.css') }}" rel="stylesheet">
  <link href="{{ asset('web/css/quickview/quickview.css') }}" rel="stylesheet">
<!-- Google web fonts
	============================================ -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700&amp;display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lobster&amp;display=swap" rel="stylesheet">
	<style>
	body{
		font-family: 'Poppins', sans-serif;
	}
</style>

<!-- loading -->
  <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@1.5.4/src/loadingoverlay.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@1.5.4/extras/loadingoverlay_progress/loadingoverlay_progress.min.js"></script>
<!-- loading -->

</head>
<body class="common-here res layout-1">

	<?php
    $getbannerimage = DB::table('bannerimage')->where('id_bannerimage', '1')->first();
    $gambarbanner  = $getbannerimage ->gambar;

		$getfooterimage = DB::table('footerimage')->where('id_footerimage', '1')->first();
  	$gambar  = $getfooterimage ->gambar;
  ?>
  <style>
  .breadcrumbs {
  margin-top: 0px;
  position: relative;
  background: url({{asset('assets/bannerimage/'.$gambarbanner)}}) no-repeat center;
  background-attachment: fixed;
  background-size: cover;
  padding-top: 120px;
  padding-bottom: 140px;
  color: #fff;
  text-align: center; }

	.typefooter-1 .footer-box {
  background: url({{asset('assets/footerimage/'.$gambar)}}); }
  </style>

	<div id="wrapper" class="wrapper-fluid banner-effect-3">

		@yield('content')

		<div class="back-to-top">
			<i class="fa fa-angle-up" aria-hidden="true"></i>
		</div>
	</div>
<!-- End Color Scheme
	============================================ -->
<!-- Include Libs & Plugins
	============================================ -->
	<!-- Placed at the end of the document so the pages load faster -->

	<script type="text/javascript" src="{{ asset('web/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('web/js/themejs/so_megamenu.js') }}"></script>
  <script type="text/javascript" src="{{ asset('web/js/owl-carousel/owl.carousel.js') }}"></script>
  <script type="text/javascript" src="{{ asset('web/js/lightslider/lightslider.js') }}"></script>
  <script type="text/javascript" src="{{ asset('web/js/slick-slider/slick.js') }}"></script>
  <script type="text/javascript" src="{{ asset('web/js/themejs/libs.js') }}"></script>
  <script type="text/javascript" src="{{ asset('web/js/unveil/jquery.unveil.js') }}"></script>
  <script type="text/javascript" src="{{ asset('web/js/countdown/jquery.countdown.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('web/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('web/js/datetimepicker/moment.js') }}"></script>
  <script type="text/javascript" src="{{ asset('web/js/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('web/js/jquery-ui/jquery-ui.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('web/js/modernizr/modernizr-2.6.2.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('web/js/minicolors/jquery.miniColors.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('web/js/jquery.nav.js') }}"></script>
  <script type="text/javascript" src="{{ asset('web/js/quickview/jquery.elevateZoom-3.0.8.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('web/js/quickview/jquery.magnific-popup.min.js') }}"></script>
<!-- Theme files
  ============================================ -->
  <script type="text/javascript" src="{{ asset('web/js/themejs/application.js') }}"></script>
  <script type="text/javascript" src="{{ asset('web/js/themejs/homepage.js') }}"></script>
  <script type="text/javascript" src="{{ asset('web/js/themejs/cd1.js') }}"></script>
  <script type="text/javascript" src="{{ asset('web/js/themejs/addtocart.js') }}"></script>
  <script type="text/javascript" src="{{ asset('web/js/themejs/nouislider.js') }}"></script>
  <script type="text/javascript" src="{{ asset('web/js/themejs/script.js') }}"></script>

	<script type="text/javascript" src="{{asset('assets/js/highlight.pack.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/tabifier.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/jPages.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/js.js')}}"></script>

  <script>
  /* when document is ready */
  $(function() {
    /* initiate plugin */
    $("div.holder").jPages({
      containerID: "itemContainer"
    });
  });

  </script>
</body>

</html>
