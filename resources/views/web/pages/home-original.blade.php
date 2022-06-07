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

    @include('web.components.sliders')
    @include('web.components.service')

    {{-- @include('web.components.deal') --}}

    @include('web.components.banner')

    @include('web.components.featured')

    @include('web.components.promo')

    @include('web.components.product_home')

    @include('web.components.customer')

    {{-- @include('web.components.categories') --}}

    {{-- @include('web.components.blog') --}}

    @include('web.components.brand')

  <!-- Main Content Wrapper End -->

  @include('web.components.footer')

@endsection
