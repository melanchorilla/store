@extends('layouts.admin.layout')
@section('header', 'Partnership')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('modulpartnership.create') }}" class="btn btn-info btn-sm">Tambah Partnership</a>
                    <br> <br>
                    <table class="table table-bordered table-striped" id="partnership">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Perusahaan</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = '1'; ?>
                            @foreach($partnerships as $partnership)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $partnership->nama_perusahaan }}</td>
                                <td>{!! $partnership->deskripsi !!}</td>
                                <td>
                                    @if($partnership->gambar)
                                        <img src="{{asset('assets/partnership/'.$partnership->gambar)}}" style="max-height: 50px;"/>
                                    @else
                                        {{ "Tidak ada gambar" }}
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('modulpartnership.destroy', $partnership->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('modulpartnership.edit', $partnership->id) }}" class="btn btn-primary">Edit</a>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin mau dihapus ?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php $no++; ?>
                            @endforeach
                        </tbody>
                    </table>                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
  $(function () {
    $("#partnership").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
@endsection
