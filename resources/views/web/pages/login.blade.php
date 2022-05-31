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
      <h1 class="category-name">LOGIN</h1>
      <ul class="breadcrumb">
        <li>
          <a href="/home" class="smooth" title="">Home</a>
        </li>
        <li>
          <a href="/home" class="smooth" title="">login</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="account-login my-account">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">

              <div class="col-sm-6">

                <div class="well col-sm-12 clearfix" style="min-height: 10px; margin: 50px 0 50px 0;">

                  <form action="/memberlogin" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="link" class="form_login" value="{{ $link }}">
                    <div class="form-group">
                      <label class="control-label" for="input-email">E-Mail Address</label>
                      <input type="text" id="email" name="email" maxlength="90" value="" placeholder="E-Mail Address" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="input-password">Password</label>
                      <input type="password" id="password" name="password" maxlength="90" value="" placeholder="Password" class="form-control">
                      <a href="{{route('reset')}}">Forgotten Password</a></div>

                      <input type="submit" value="Login" class="btn btn-primary pull-left">
                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>


  <!-- Main Content Wrapper End -->

  @include('web.components.footer')

@endsection
