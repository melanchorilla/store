@extends('layouts.admin.layout')
@section('header', 'Tambah Fasilitas')

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

                <form role="form" action="{{ route('modulfasilitas.store') }}" method="post" enctype="multipart/form-data">
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
                      <label for="exampleInputEmail1">Judul</label>
                      <div class="col-md-5">
                        <input type="text" class="form-control" name="judul" maxlength="90" placeholder="Nama Fasilitas">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Deskripsi</label>
                      <div class="col-md-5">
                        <textarea name="deskripsi" class="form-control" rows="5"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Gambar</label>
                      <div class="col-md-5">
                        <input type="file" class="form-control" name="gambar" placeholder="Gambar">
                      </div>
                    </div>

                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/modulfasilitas" class="btn btn-secondary">Kembali</a>
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
