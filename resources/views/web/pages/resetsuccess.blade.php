@extends('layouts.web')

<?php $seo = DB::table('seo')->where('id_seo', '1')->first(); ?>
@section('title')
  {{ $seo->title ? $seo->title : 'Store 1' }}
@endsection

@section('description')
  {{ $seo->deskripsi ? $seo->deskripsi : 'Store 1' }}
@endsection

@section('keyword')
  {{ $seo->keyword ? $seo->keyword : 'Store 1' }}
@endsection

@section('content')
  <!-- konten -->
  <!-- Preloader Start -->
  <div class="zakas-preloader active">
    <div class="zakas-preloader-inner h-100 d-flex align-items-center justify-content-center">
      <div class="zakas-child zakas-bounce1"></div>
      <div class="zakas-child zakas-bounce2"></div>
      <div class="zakas-child zuka-bounce3"></div>
    </div>
  </div>
  <!-- Preloader End -->

  <!-- Main Wrapper Start -->
  <div class="wrapper">
    <!-- Header Start -->
    @include('web.components.header')
    <!-- Header End -->

    <!-- Breadcrumb area Start -->
    <div class="breadcrumb-area bg-color ptb--90" data-bg-color="#f6f6f6">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column">
              <h1 class="page-title">Reset Berhasil</h1>
              <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="current"><span>Reset Berhasil</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Breadcrumb area End -->

    <!-- Main Content Wrapper Start -->
    <div class="main-content-wrapper">
            <div class="page-content-inner pt--75 pb--80">
                <div class="container">
                    <div>
                      <!-- konten -->
      <div style="text-align: center;">
        <h2>Reset Password Sukses, Detail Password Sudah Dikirim Via Email</h2><br>
        <h2>Silakan Login <a href="{{route('login')}}">Disini</a></h2>
      </div>

        <!-- konten -->
                    </div>
                </div>
            </div>
        </div>
    <!-- Main Content Wrapper End -->

    <!-- Footer Start-->
    @include('web.components.footer')
    <!-- Footer End-->

    <!-- Mini Cart Start -->
    @include('web.components.minicart')
    <!-- Mini Cart End -->

    <!-- Global Overlay Start -->
    <div class="zakas-global-overlay"></div>
    <!-- Global Overlay End -->
  </div>
  <!-- Main Wrapper End -->
  <!-- konten -->
@endsection
