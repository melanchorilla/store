<!-- HOME SLIDER -->
<div class="home-slider yt-content-slider" data-autoplay="yes" data-delay="4" data-speed="0.6" data-items_column00="1" data-margin="0" data-items_column0="1" data-items_column1="1" data-items_column2="1" data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="yes" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
  @foreach ($banner as $result)
  <div class="item-slider">
    <a href="#" class="">
      <img src="{{asset('assets/banner/'.$result->gambar)}}" alt="">
    </a>
    <div class="slider-info">
      <div class="container">
        <h3 class="small-title">{{ $result->text1 }}</h3>
        {{-- <h4 class="small-desc">Survive The Reality Of Everyday Life</h4> --}}
        <h2 class="big-title">{!! $result->text2 !!}</h2>
        <div class="text-center">
          <a href="{{ $result->customlink }}" class="smooth see-more" title="">{{ $result->button_text }}</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
<!-- //HOME SLIDER -->
