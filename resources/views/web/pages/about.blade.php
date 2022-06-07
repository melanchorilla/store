@extends('layouts.web')

<?php $seo = DB::table('seo')->where('id_seo', '1')->first(); ?>
@section('title')
  {{ $seo->title ? $seo->title : 'Pusat Pendidikan dan Pelatihan Pramugari | Nasa.or.id' }}
@endsection

@section('description')
  {{ $seo->deskripsi ? $seo->deskripsi : 'Pusat Pendidikan dan Pelatihan Pramugari | Nasa.or.id' }}
@endsection

@section('keyword')
  {{ $seo->keyword ? $seo->keyword : 'Pusat Pendidikan dan Pelatihan Pramugari | Nasa.or.id' }}
@endsection

@section('content')

  @include('web.components.header')

  <style>
    body {
      font-size: 16px;
    }
  </style>

  <!-- Main Content Wrapper Start -->
  
  <div class="breadcrumbs">
    <div class="container">
      <h1 class="category-name">{{ $aboutus->title }}</h1>
      <ul class="breadcrumb">
        <li>
          <a href="/home" class="smooth" title="">Home</a>
        </li>
        <li>
          <a href="#" class="smooth" title="">About Us</a>
        </li>
      </ul>
    </div>
  </div>


  <!-- ABOUT US -->
  <div class="about-us">
    <div class="about-us-top">
      <section>
        <div class="container">
          <!-- about us -->
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
              <img src="{{asset('assets/aboutus/'.$aboutus->gambar)}}" alt="" class="img-responsive animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="200">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 about-desc-box" data-animation="fadeInRight" data-animation-delay="200">
              <h4>About Us</h4>
              <h2 class="about-title">{{ $aboutus->title }}</h2>
              <div class="about-desc">
                <p>{!! $aboutus->konten !!}</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <section class="visi" style="background-image: url('{{asset('assets/aboutus/'.$aboutus->gambar_visi)}}');">
        <div class="container">
          <!-- Visi -->
          <div class="row">
            <div class="visi-nasa">
              <div class="col-md-7">
                <div class="box-visi animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="200">
                  <h2 class="sec-title">Our Vision</h2>
                  {!! $aboutus->visi !!}
                </div>
              </div>
              <div class="col-md-5">
                <div id="all">
                  <a id="play-video" class="play-button" data-url="https://www.youtube.com/embed/inH2nfz0Xt0?rel=0&autoplay=1" data-toggle="modal" data-target="#myModal" title="inH2nfz0Xt0"><i class="fa fa-play"></i></a>
                  <h2 class="text-play-video">CHECKOUT OUR VIDEO</h2>
                </div>
              </div>
                <!-- VIDEO MODAL -->
                  <div class="modal fade youtube-video" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-body">
                                  <div id="video-container" class="video-container">
                                      <iframe id="youtubevideo" src="" width="640" height="360" frameborder="0" allowfullscreen></iframe>
                                  </div>        
                              </div>
                              <div class="modal-footer">
                                  <button id="close-video" type="button" class="button btn btn-default" data-dismiss="modal"><i class="" aria-hidden="true">X</i></button>
                              </div>
                          </div> 
                      </div>
                  </div>
                  <!-- VIDEO MODAL -->
             
            </div>
          </div>
        </div>
      </section>
        

        <!-- Misi -->
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <img src="{{asset('assets/aboutus/'.$aboutus->gambar_misi)}}" alt="" class="img-responsive">
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 about-misi">
            <h2 class="about-title">Our Mission</h2>
            <div class="about-desc">
              <p>{!! $aboutus->misi !!}</p>
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
