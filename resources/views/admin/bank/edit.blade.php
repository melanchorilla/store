@extends('layouts.admin.layout')
@section('header', 'Edit Bank')

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

                <form role="form" action="{{ route('bank.update', $bank->id_bank) }}" method="post" enctype="multipart/form-data">
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
                      <label for="exampleInputEmail1">Nama Bank</label>
                      <input type="text" class="form-control" name="nama" maxlength="90" value="{{ $bank->nama_bank }}" placeholder="Kategori Produk">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Gambar </label>
                      <img src="{{$bank->getGambar()}}" style="max-height: 50px;"/>
                      <input type="hidden" class="form-control" name="gambar_lama" value="{{ $bank->gambar }}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Gambar</label>
                      <input type="file" class="form-control" name="gambar" placeholder="Gambar">
                    </div>

                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/bank" class="btn btn-secondary">Kembali</a>
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
