<style>
.brands {
  padding: 4rem 0; }
  .brands .brand-left {
    width: 23.08%;
    float: left; }
  .brands .brand-left .brand-title {
    padding: 51px 0 50.5px 0;
    font-size: 2rem;
    background-color: #49ccf3;
    font-weight: 700;
    text-align: center;
    color: #fff; }
  .brands .brand-left .brand-title > span {
    border-top: 1px solid #fff;
    border-bottom: 1px solid #fff;
    position: relative; }
  .brands .brand-left .brand-title > span:before {
    content: "";
    border-top: 6px solid #fff;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    position: absolute;
    left: calc(50% - 5px);
    bottom: -6px; }
  .brands .brand-left .brand-title > span > span {
    font-weight: 300; }
  .brands .brand-center {
    width: calc(100% - 23.08%);
    float: left; }
  .brands .brand-center-slider .owl2-controls .owl2-nav > div {
    width: 35px;
    height: 35px;
    background-color: #fff;
    border: 1px solid #ddd;
    position: absolute;
    top: calc(50% - 35px / 2);
    color: #b6b6b6;
    text-align: center;
    line-height: 35px;
    font-size: 16px;
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out; }
    .brands .brand-center-slider .owl2-controls .owl2-nav > div:hover {
      background-color: #49ccf3;
      color: #fff;
      border: 1px solid #49ccf3; }
  .brands .brand-center-slider .owl2-controls .owl2-nav .owl2-prev {
    right: calc(100% - 35px / 2); }
  .brands .brand-center-slider .owl2-controls .owl2-nav .owl2-next {
    left: calc(100% - 35px / 2); }
</style>

<div class="brands">
				<div class="container">
					<div class="brand-left">
						<h4 class="brand-title"><span>OUR<span> BRANDS</span></span></h4>
					</div>
					<div class="brand-center">
						<div class="brand-center-slider yt-content-slider" data-autoplay="yes" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="4" data-items_column0="4" data-items_column1="3" data-items_column2="3" data-items_column3="3" data-items_column4="2" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
              <?php $databrand = DB::table('brand')->limit(9)->get(); ?>
              @foreach ($databrand as $result)
              <div class="item-slider">
								<a href="#" class="" target="_blank">
									<img src="{{asset('assets/brand/'.$result->gambar)}}" class="img-responsive" alt="">
								</a>
							</div>
              @endforeach
						</div>
					</div>
				</div>
			</div>
