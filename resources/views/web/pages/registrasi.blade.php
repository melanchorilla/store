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
      <h1 class="category-name">Register</h1>
      <ul class="breadcrumb">
        <li>
          <a href="/" class="smooth" title="">Home</a>
        </li>
        <li>
          <a href="/register" class="smooth" title="">Register</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="register my-account" style="margin-bottom: 100px;">
    <!-- Main Container  -->
    <div class="main-container container">
      <div class="row">
        <div class="col-md-9">
          <h2 class="title">Register Account</h2>
          <form method="post" action="/registerinsert" id="updateform" class="form-horizontal account-register clearfix">
            @csrf
            <fieldset>
              <legend>Your Personal Details</legend>

              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-firstname">Nama</label>
                <div class="col-sm-10">
                  <input type="text" name="name" id="name" maxlength="90" placeholder="Nama Lengkap" class="form-control">
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-lastname">Email</label>
                <div class="col-sm-10">
                  <input type="email" id="email" name="email" maxlength="90"  placeholder="Email" class="form-control">
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-telephone">Telepon</label>
                <div class="col-sm-10">
                  <input type="text" name="telepon" id="telepon" maxlength="90"  placeholder="Telepon" class="form-control">
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-telephone">Password</label>
                <div class="col-sm-10">
                  <input type="password" name="password" id="password" maxlength="90"  placeholder="Password" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-fax"></label>
                <div class="col-sm-10">
                  <div class="buttons">
                    <div class="pull-left">
                      <input type="button" id="submit" value="Continue" class="btn btn-primary">
                    </div>
                  </div>
                </div>
              </div>
            </fieldset>
          </form>
          <script type="text/javascript">
            $(document).ready(function() {

              $("#submit").click(function(){

                var dataform = $("#updateform").serialize();

                var token = $("input[name='_token']").val();
                var name = $("#name").val();
                var email = $("#email").val();
                var telepon = $("#telepon").val();
                var password = $("#password").val();

                if(name.length == 0){
                  alert("Maaf, Nama tidak boleh kosong");
                  $("#name").focus();
                  return (false);
                }

                if(email.length == 0){
                  alert("Maaf, Email tidak boleh kosong");
                  $("#email").focus();
                  return (false);
                }

                if(telepon.length == 0){
                  alert("Maaf, Telepon tidak boleh kosong");
                  $("#telepon").focus();
                  return (false);
                }

                if(password.length == 0){
                  alert("Maaf, Password tidak boleh kosong");
                  $("#password").focus();
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
                        alert('Email sudah digunakan');
                      }else{
                        //konten
                        $.ajax({
                          type: "POST",
                          url : "/registerinsert",
                          data: dataform,
                          beforeSend: function() {
                            //$.LoadingOverlay("show");
                          },
                          success: function(msg){
                            //location.reload();
                            document.location.href="/registersuccess";
                          }
                        });
                        //konten
                      }
                    }
                });

              });

            });
          </script>
        </div>
        <aside class="col-md-3 col-sm-4 col-xs-12 content-aside right_column sidebar-offcanvas"></aside>
    </div>
  </div>
  <!-- //Main Container -->
</div>

  <!-- Main Content Wrapper End -->

  @include('web.components.footer')

@endsection
