@extends('layouts.admin.layout')
@section('header', 'Edit Agenda')

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

                <form role="form" action="{{ route('modulagenda.update', $agenda->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('patch')
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
                      <label for="exampleInputEmail1">Nama Kegiatan</label>
                      <div class="col-md-5">
                        <input type="text" class="form-control" name="nama_kegiatan" maxlength="90" value="{{ $agenda->nama_kegiatan }}" placeholder="Nama Kegiatan">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Deskripsi kegiatan</label>
                      <div class="col-md-8">
                        <textarea name="deskripsi_kegiatan" class="form-control ckeditor" rows="5">{{ $agenda->deskripsi_kegiatan }}</textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Gambar</label>
                      <div class="col-md-5">
                        <img src="{{$agenda->getImage()}}" style="max-height: 100px;"/>
                        <input type="hidden" class="form-control" name="gambar_lama" value="{{ $agenda->gambar_kegiatan }}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Gambar</label>
                      <div class="col-md-5">
                        <input type="file" class="form-control" name="gambar_kegiatan" placeholder="Gambar">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Mulai kegiatan</label>
                      <div class="col-md-5">
                        <input type="date" class="form-control" name="mulai_kegiatan" placeholder="Mulai Kegiatan" value="{{ $agenda->mulai_kegiatan }}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Akhir kegiatan</label>
                      <div class="col-md-5">
                        <input type="date" class="form-control" name="akhir_kegiatan" placeholder="Akhir Kegiatan" value="{{ $agenda->akhir_kegiatan }}">
                      </div>
                    </div>

                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/modulagenda" class="btn btn-secondary">Kembali</a>
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
