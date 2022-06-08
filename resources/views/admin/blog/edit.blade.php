@extends('layouts.admin.layout')
@section('header', 'Edit Blog')

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

                <form role="form" action="{{ route('modulblog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
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
                      <label for="exampleInputEmail1">Nama</label>
                      <div class="col-md-5">
                        <input type="text" class="form-control" name="nama" maxlength="90" placeholder="Nama" value="{{ $blog->nama }}">
                      </div>
                    </div>

                    {{-- <div class="form-group">
                      <label for="exampleInputEmail1">Kategori</label>
                      <div class="col-md-5">
                        <select class="form-control" name="kategori">
                          <option value="" holder>Pilih Kategori</option>
                          @foreach ($blogcat as $result)
                            <option value="{{ $result->id }}"
                              @if ($blog->kategoriblog_id == $result->id)
                                selected
                              @endif
                              >{{ $result->nama }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div> --}}

                    <div class="form-group">
                      <label for="exampleInputEmail1">Konten</label>
                      <div class="col-md-8">
                        <textarea name="konten" class="form-control ckeditor">{{ $blog->konten }}</textarea>
                      </div>
                    </div>

                    <?php
                      $gambar1 = $blog->gambar1;
                      if($gambar1){
                    ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Gambar</label>
                      <div class="col-md-5">
                        <img src="{{$blog->getGambar1()}}" style="max-height: 50px;"/>
                        <input type="hidden" class="form-control" name="gambar_lama1" value="{{ $blog->gambar1 }}">
                      </div>
                    </div>
                    <?php }else{} ?>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Gambar(Rekomendasi width: 512px, height: 512px)</label>
                      <div class="col-md-5">
                        <input type="file" class="form-control" name="gambar1" placeholder="Gambar">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Meta Title</label>
                      <div class="col-md-8">
                        <textarea name="meta_title" class="form-control">{{ $blog->meta_title }}</textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Meta Description</label>
                      <div class="col-md-8">
                        <textarea name="meta_description" class="form-control">{{ $blog->meta_description }}</textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Meta Keyword</label>
                      <div class="col-md-8">
                        <textarea name="meta_keyword" class="form-control">{{ $blog->meta_keyword }}</textarea>
                      </div>
                    </div>

                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/blog" class="btn btn-secondary">Kembali</a>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (left) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->

        <script type="text/javascript">

        $(document).ready(function() {

          // $("#harga").keypress(function(data){
        	// 	if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57))
        	// 	{
        	// 		return false;
        	// 	}
        	// });
          //
        	// $("#harga_coret").keypress(function(data){
        	// 	if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57))
        	// 	{
        	// 		return false;
        	// 	}
        	// });
          //
        	// $("#stok").keypress(function(data){
        	// 	if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57))
        	// 	{
        	// 		return false;
        	// 	}
        	// });
          //
        	// $("#berat").keypress(function(data){
        	// 	if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57))
        	// 	{
        	// 		return false;
        	// 	}
        	// });

        });

        </script>

@endsection
