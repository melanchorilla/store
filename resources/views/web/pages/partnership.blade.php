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

.mb-5 {
    margin-bottom: 50px;
}

hr .bottom-text {
    width:50px;
    border-top: 5px solid #beae59;
}

</style>

    <div class="breadcrumbs">
        <div class="container">
        <h1 class="category-name">PARTNERSHIP</h1>
        <ul class="breadcrumb">
            <li>
            <a href="/home" class="smooth" title="">Home</a>
            </li>
            <li>
            <a href="#" class="smooth" title="">Partnership</a>
            </li>
        </ul>
        </div>
    </div>

    <div class="container">
        <div class="row mt-5">
            <h1 class="text-center">Partnership</h1>
        </div>
        @foreach($partnerships as $partnership)
            <div class="row mt-5 mb-5">
                <div class="col-md-3">
                    <img class="img-responsive" src="{{ asset('assets/partnership/' . $partnership->gambar) }}" alt="">
                </div>
                <div class="col-md-9">
                    <h3>{{ $partnership->nama_perusahaan }}</h3>
                    <p>{!! $partnership->deskripsi !!}</p>
                </div>
            </div>
        @endforeach

    </div>



  @include('web.components.footer')

@endsection