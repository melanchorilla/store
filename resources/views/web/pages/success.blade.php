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

  <!-- Main Content Wrapper Start -->

  <div class="breadcrumbs">
    <div class="container">
      <h1 class="category-name">Registrasi Berhasil</h1>
      <ul class="breadcrumb">
        <li>
          <a href="/home" class="smooth" title="">Home</a>
        </li>
        <li>
          <a href="/home" class="smooth" title="">Registrasi Berhasil</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="account-login my-account">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row" style="margin: 50px;">

            <!-- konten -->
            <div style="text-align: center;">
              <h2>Silakan periksa email untuk detail registrasi</h2><br>
              <a href="/login" class="btn btn-primary">Login disini</a>
            </div>

            <hr>
            <!-- konten -->

          </div>
        </div>

      </div>

    </div>


    <!-- Main Content Wrapper End -->

    @include('web.components.footer')

  @endsection
