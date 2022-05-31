@extends('layouts.admin.layout')
@section('header', 'Welcome')

@section('content')
<div class="container-fluid">
    <div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
        <div class="card-header">
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form role="form" action="/modulwelcome/update" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

            @if (count($errors)>0)
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ $error }}
                </div>
                @endforeach
            @endif

            <div class="form-group">
                <label for="judul">Judul</label>
                <div class="col-md-5">
                <input type="text" class="form-control" name="judul" value="{{ $welcome->judul }}"  placeholder="Judul">
                </div>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <div class="col-md-8">
                <textarea name="deskripsi" class="form-control ckeditor" rows="5">{{ $welcome->deskripsi }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="gambar">Gambar</label>
                <div class="col-md-5">
                <img src="{{$welcome->getImage()}}" style="max-height: 50px;"/>
                <input type="hidden" class="form-control" name="gambar_lama" value="{{ $welcome->gambar }}">
                </div>
            </div>

            <div class="form-group">
                <label for="gambar">Gambar (Rekomendasi width: 600px, height: 450px)</label>
                <div class="col-md-5">
                <input type="file" class="form-control" name="gambar" placeholder="Gambar">
                </div>
            </div>

            <hr>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div>
        <!-- /.card -->
    </div>
    <!--/.col (left) -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
@endsection