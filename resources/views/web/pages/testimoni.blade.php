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

  <style>
    .mt-5 {
      margin-top: 50px;
    }

/* Nomalize code for codepen */
 .body {
	 height: 90vh;
	 font-family: 'Poppins', sans-serif;
	 font-weight: 300;
	 color: #444;
	 /* line-height: 1.9; */
}
/* === True Code === */
 .slider {
	 height: 50rem;
	 margin: 0 auto;
	 position: relative;
	 /* overflow: hidden; */
}
 .slider .slide {
	 position: absolute;
	 top: 0;
	 height: 50rem;
	 display: flex;
	 align-items: center;
	 justify-content: center;
	 transition: transform 0.5s;
}
 @media (min-width: 600px) and (max-width: 767px) {
	 .slider .slide {
		 width: 300px;
	}
}
 @media (min-width: 768px) {
	 .slider .slide {
		 width: 370px;
	}
}
 .slider .slide > img {
	 width: 100%;
	 height: 100%;
	 object-fit: cover;
}
 .slider .slide .testimonial {
	 width: 90%;
	 min-height: 300px;
	 padding: 30px 40px;
	 position: relative;
	 background-color: #f8f8f8;
	 border-radius: 6px;
	 display: flex;
	 flex-direction: column;
	 justify-content: center;
	 gap: 15px;
}
 .slider .slide .testimonial:hover img {
	 filter: none;
	 transition: filter ease 0.3s;
}
 .slider .slide .testimonial::before {
	 content: '';
	 position: absolute;
	 background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='30' viewBox='0 0 40 30'%3E%3Cpath id='Caminho_1' data-name='Caminho 1' d='M9.091,11.964a8.878,8.878,0,0,0-1.3.13A7.2,7.2,0,0,1,8.3,10.731,8.453,8.453,0,0,1,9.237,9.04a9.974,9.974,0,0,1,1.2-1.477,13.579,13.579,0,0,1,1.38-1.21,8.469,8.469,0,0,1,1.424-.928,7.557,7.557,0,0,1,1.3-.7l1.075-.445.945-.395L15.588,0,14.4.289c-.381.1-.845.208-1.374.343a10.78,10.78,0,0,0-1.759.625,12.351,12.351,0,0,0-2.05.934A18.711,18.711,0,0,0,7.04,3.577,15.531,15.531,0,0,0,4.946,5.471,14.039,14.039,0,0,0,3.133,7.8a16.3,16.3,0,0,0-1.4,2.6A22.276,22.276,0,0,0,.8,13.08a24.3,24.3,0,0,0-.766,4.884,25.087,25.087,0,0,0,.056,3.5c.03.409.086.806.126,1.08l.05.337.052-.012a9,9,0,0,0,6.689,6.883,8.948,8.948,0,0,0,9.063-3.1,9.041,9.041,0,0,0-2.191-13.3A8.94,8.94,0,0,0,9.091,11.964Zm21.935,0a8.878,8.878,0,0,0-1.3.13,7.2,7.2,0,0,1,.507-1.363,8.453,8.453,0,0,1,.935-1.691,9.974,9.974,0,0,1,1.2-1.477,13.579,13.579,0,0,1,1.38-1.21,8.469,8.469,0,0,1,1.424-.928,7.557,7.557,0,0,1,1.3-.7l1.075-.445.945-.395L37.523,0l-1.19.289c-.381.1-.845.208-1.374.343a10.781,10.781,0,0,0-1.759.625,12.445,12.445,0,0,0-2.05.936,18.711,18.711,0,0,0-2.176,1.387A15.647,15.647,0,0,0,26.88,5.471,14.034,14.034,0,0,0,25.068,7.8a16.306,16.306,0,0,0-1.4,2.6,22.286,22.286,0,0,0-.933,2.677,24.3,24.3,0,0,0-.766,4.884,25.092,25.092,0,0,0,.056,3.5c.03.409.086.806.126,1.08l.05.337.052-.012a9,9,0,0,0,6.689,6.883A8.948,8.948,0,0,0,38,26.652a9.041,9.041,0,0,0-2.191-13.3A8.94,8.94,0,0,0,31.026,11.964Z' transform='translate(0)' fill='%2305bcb4'/%3E%3C/svg%3E%0A");
	 background-repeat: no-repeat;
	 width: 40px;
	 height: 30px;
	 top: -15px;
	 left: 12px;
	 line-height: 1;
	 font-size: 10rem;
	 font-family: inherit;
	 color: var(--color-primary);
	 z-index: 1;
}
 .slider .slide .testimonial img {
	 width: 14rem;
	 margin: 0 auto;
	 /* filter: grayscale(1); */
	 transition: filter ease 0.3s;
}
 .slider .slide .testimonial .testimonial__text {
	 font-size: 1.4rem;
	 margin-bottom: 2.5rem;
	 color: #666;
}
 .btns {
	 width: 100%;
	 display: flex;
	 justify-content: center;
	 gap: 25px;
   margin-bottom: 20px;
	 /* position: absolute;
	 bottom: 0; */
}
 .btns .slider__btn {
	 z-index: 10;
	 border: 2px solid #05bcb4;
	 background: #fff;
	 font-family: inherit;
	 color: #05bcb4;
	 border-radius: 50%;
	 height: 50px;
	 width: 50px;
	 font-size: 3rem;
	 cursor: pointer;
}
 
  </style>

  <div class="breadcrumbs">
    <div class="container">
      <h1 class="category-name">TESTIMONIAL</h1>
      <ul class="breadcrumb">
        <li>
          <a href="/home" class="smooth" title="">Home</a>
        </li>
        <li>
          <a href="#" class="smooth" title="">Testimonial</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">

        <div class="body">
          <section class="testimonials">
            <div class="slider">

              @foreach($testimonial as $testimoni)
                <div class="slide">
                  <div class="testimonial">
                    @if($testimoni->gambar)
                    <img src="{{ asset('assets/testimoni/' . $testimoni->gambar) }}" />
                    @endif
                    <p class="text-center">{{ $testimoni->nama }}</p>
                    <blockquote class="testimonial__text">
                      {{ $testimoni->testimoni }}
                    </blockquote>
                  </div>
                </div>
              @endforeach


            
              
            </div>
          </section>

        </div>

      </div>
    </div>
    <div class="row">
      <div class="btns">
            <button class="slider__btn slider__btn--left">

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill='#05BCB4'><path d="M16.4 18.2c0-.4-.1-.7-.4-.9L11.4 13c-.5-.5-.5-1.4 0-1.9L16 6.8c.3-.2.4-.6.4-.9 0-1.1-1.3-1.7-2.1-.9l-6.8 6.2c-.6.5-.6 1.4 0 1.9l6.8 6.2c.8.5 2.1-.1 2.1-1.1z"></path></g></svg>

        </button>
            <button class="slider__btn slider__btn--right">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill='#05BCB4'><path d="M7.6 5.8c0 .4.1.7.4.9l4.6 4.3c.5.5.5 1.4 0 1.9L8 17.2c-.3.2-.4.6-.4.9 0 1.1 1.3 1.7 2.1.9l6.8-6.2c.6-.5.6-1.4 0-1.9l-6.8-6c-.8-.7-2.1-.1-2.1.9z"></path></g></svg>
        </button>
      </div>
    </div>
  </div>


<script>
  // Slider
const slider = function () {
  const slides = document.querySelectorAll('.slide');
  const btnLeft = document.querySelector('.slider__btn--left');
  const btnRight = document.querySelector('.slider__btn--right');

  let curSlide = 0;
  const maxSlide = slides.length;

  const goToSlide = function (slide) {
    slides.forEach(
      (s, i) => (s.style.transform = `translateX(${100 * (i - slide)}%)`)
    );
  };

  // Next slide
  const nextSlide = function () {
    if (curSlide === maxSlide - 1) {
      curSlide = 0;
    } else {
      curSlide++;
    }

    goToSlide(curSlide);
  };

  const prevSlide = function () {
    if (curSlide === 0) {
      curSlide = maxSlide - 1;
    } else {
      curSlide--;
    }
    goToSlide(curSlide);
  };

  const init = function () {
    goToSlide(0);
  };
  init();

  // Event handlers
  btnRight.addEventListener('click', nextSlide);
  btnLeft.addEventListener('click', prevSlide);

  document.addEventListener('keydown', function (e) {
    if (e.key === 'ArrowLeft') prevSlide();
    e.key === 'ArrowRight' && nextSlide();
  });
};
slider();
</script>


  @include('web.components.footer')

@endsection