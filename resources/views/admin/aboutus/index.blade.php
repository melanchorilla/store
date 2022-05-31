@extends('layouts.admin.layout')
@section('header', 'About Us')

@section('content')

  <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  {{-- <h3 class="card-title">Quick Example</h3> --}}
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form role="form" action="/modulaboutus/update" method="post" enctype="multipart/form-data">
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
                      <label for="title">Title</label>
                      <div class="col-md-5">
                        <input type="text" class="form-control" name="title" value="{{ $aboutus->title }}" maxlength="90" placeholder="Title">
                      </div>
                    </div>

                    {{-- <div class="form-group">
                      <label for="exampleInputEmail1">Subtitle</label>
                      <div class="col-md-5">
                        <input type="text" class="form-control" name="subtitle" value="{{ $aboutus->subtitle }}" maxlength="90" placeholder="Subtitle">
                      </div>
                    </div> --}}

                    {{-- <div class="form-group">
                      <label for="exampleInputEmail1">Deskripsi Singkat</label>
                      <div class="col-md-5">
                        <textarea name="deskripsi" class="form-control" rows="5">{{ $aboutus->deskripsi }}</textarea>
                      </div>
                    </div> --}}

                    <div class="form-group">
                      <label for="konten">Konten</label>
                      <div class="col-md-8">
                        <textarea name="konten" class="form-control ckeditor" rows="5">{{ $aboutus->konten }}</textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="visi">Visi</label>
                      <div class="col-md-8">
                        <textarea name="visi" class="form-control ckeditor" rows="5">{{ $aboutus->visi }}</textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="misi">Misi</label>
                      <div class="col-md-8">
                        <textarea name="misi" class="form-control ckeditor" rows="5">{{ $aboutus->misi }}</textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="gambar">Gambar</label>
                      <div class="col-md-5">
                        <img src="{{$aboutus->getImage()}}" style="max-height: 50px;"/>
                        <input type="hidden" class="form-control" name="gambar_lama" value="{{ $aboutus->gambar }}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="gambar">Gambar (Rekomendasi width: 600px, height: 450px)</label>
                      <div class="col-md-5">
                        <input type="file" class="form-control" name="gambar" placeholder="Gambar">
                      </div>
                    </div>

                    <hr>

                    <div class="form-group">
                      <label for="gambar_visi">Gambar Visi</label>
                      <div class="col-md-5">
                        <img src="{{$aboutus->getImageVisi()}}" style="max-height: 50px;"/>
                        <input type="hidden" class="form-control" name="gambar_visi_lama" value="{{ $aboutus->gambar_visi }}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="gambar_visi">Gambar Visi (Rekomendasi width: 600px, height: 450px)</label>
                      <div class="col-md-5">
                        <input type="file" class="form-control" name="gambar_visi" placeholder="Gambar Visi">
                      </div>
                    </div>

                    <hr>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Gambar Misi</label>
                      <div class="col-md-5">
                        <img src="{{$aboutus->getImageMisi()}}" style="max-height: 50px;"/>
                        <input type="hidden" class="form-control" name="gambar_misi_lama" value="{{ $aboutus->gambar_misi }}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="gambar_misi">Gambar Misi (Rekomendasi width: 600px, height: 450px)</label>
                      <div class="col-md-5">
                        <input type="file" class="form-control" name="gambar_misi" placeholder="Gambar Misi">
                      </div>
                    </div>


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
