@extends('layouts.admin.layout')
@section('header', 'Tambah Partnership')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header"></div>
                <form role="form" action="{{ route('modulpartnership.store') }}"  method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf

                        @if (count($errors)>0)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <div class="form-group">
                            <label for="nama_perusahaan">Nama Perusahaan</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="nama_perusahaan" maxlength="90" placeholder="Nama Perusahaan">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <div class="col-md-8">
                                <textarea name="deskripsi" class="form-control ckeditor" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <div class="col-md-5">
                                <input type="file" class="form-control" name="gambar" placeholder="Gambar">
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="/modulpartnership" class="btn btn-secondary">Kembali</a>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection