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
  .container p {
    font-size: 14px;
  }

  .mt-5 {
    margin-top: 50px;
  }

</style>

  <div class="breadcrumbs">
    <div class="container">
      <h1 class="category-name">OUR FACILITIES</h1>
      <ul class="breadcrumb">
        <li>
          <a href="/home" class="smooth" title="">Home</a>
        </li>
        <li>
          <a href="#" class="smooth" title="">Facilities</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="container">
    <div class="row mt-5 text-center">
      @foreach($facilities as $facility)
        <div class="col-md-4 col-sm-2">
          <div class="thumbnail facility-col">
            <img src="{{ asset('assets/fasilitas/' . $facility->gambar) }}" alt="" srcset="">
            <h4 class="facilities-title">{{ $facility->judul }}</h4>
            <p>{{ $facility->deskripsi }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  @include('web.components.footer')

@endsection