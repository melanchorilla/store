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
  .container p {
    font-size: 14px;
  }

  .mt-5 {
    margin-top: 50px;
  }

</style>

  <div class="breadcrumbs">
    <div class="container">
      <h1 class="category-name">FACILITY</h1>
      <ul class="breadcrumb">
        <li>
          <a href="/home" class="smooth" title="">Home</a>
        </li>
        <li>
          <a href="#" class="smooth" title="">Facility</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="container">
    <div class="row mt-5 text-center">
      <h2 class="about-title">Our Facility</h2>
      @foreach($facilities as $facility)
        <div class="col-sm-4">
          <div class="thumbnail">
            <img src="{{ asset('assets/fasilitas/' . $facility->gambar) }}" alt="" srcset="">
            <p><strong>{{ $facility->judul }}</strong></p>
            <p>{{ $facility->deskripsi }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  @include('web.components.footer')

@endsection