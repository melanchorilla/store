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
              <h1 class="page-title">Reset Password</h1>
              <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="current"><span>Reset Password</span></li>
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
                    <div class="row">
                        <div class="col-md-6 mb-sm--50">
                            <div class="login-box">
                            <form action="/resetpass" method="post" class="form form--login">
                             @csrf
                                    <div class="form__group mb--20">
                                        <label class="form__label form__label--2" for="username_email">Email <span class="required">*</span></label>
                                        <input type="email" class="form__input form__input--2" id="email" name="email" maxlength="90">
                                    </div>
                                    <div class="d-flex align-items-center mb--20">
                                        <div class="form__group mr--30">
                                            <input type="button" id="submit" value="Reset Password" class="btn-submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
          $(document).ready(function() {

            $("#submit").click(function(){

              var dataform = $("#updateform").serialize();

              var token = $("input[name='_token']").val();
              var email = $("#email").val();

              if(email.length == 0){
                alert("Maaf, Email tidak boleh kosong");
                $("#email").focus();
                return (false);
              }

              $.ajax({
          		    type: "POST",
          		    url : "/cekemail",
          		    data: "_token="+token+
                    "&email="+email,
          		    beforeSend: function() {
          		        $.LoadingOverlay("show");
          		    },
          		    success: function(msg){
                    //alert(msg);
                    if(msg=='1'){
                      //konten
                      $.ajax({
                        type: "POST",
                        url : "/resetpass",
                        data: dataform,
                        beforeSend: function() {
                          //$.LoadingOverlay("show");
                        },
                        success: function(msg){
                          //location.reload();
                          document.location.href="/resetsuccess";
                        }
                      });
                      //konten
                    }else{
                      $.LoadingOverlay("hide");
                      alert('Email tidak ditemukan');
                    }
                  }
              });

            });

          });
        </script>
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
