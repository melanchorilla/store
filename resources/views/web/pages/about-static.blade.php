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

    .mt-5 {
        margin-top: 50px;
    }

    .mt-2 {
        margin-top: 20px;
    }

    .mb-5 {
        margin-bottom: 50px
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
<div class="container">
    <div class="row mt-5">
        <h2>Latar Belakang</h2>
        <div class="col-md-2 mt-2">
            <img src="https://nasa.or.id/wp-content/uploads/2020/03/pak-guntur-direktur-utama-nasa-236x300.jpg" alt="" class="img-responsive">
        </div>
        <div class="col-md-10 mt-2">
            <p>{!! $aboutus->konten !!}</p>
        </div>
    </div>

    <div class="row mt-5">
        <h2>Visi</h2>
        <div class="col-md-12 mt-2">
            <p>{!! $aboutus->visi !!}</p>
        </div>
    </div>


    <div class="row mt-5 mb-5">
        <h2>Misi</h2>
        <div class="col-md-12 mt-2">
            <p>{!! $aboutus->misi !!}</p>
        </div>
    </div>

</div>     
  <!-- //ABOUT US -->

  <!-- Main Content Wrapper End -->

  @include('web.components.footer')

@endsection
