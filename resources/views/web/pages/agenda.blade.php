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

  <style>

 
  </style>

  <div class="breadcrumbs">
    <div class="container">
      <h1 class="category-name">AGENDA</h1>
      <ul class="breadcrumb">
        <li>
          <a href="/home" class="smooth" title="">Home</a>
        </li>
        <li>
          <a href="#" class="smooth" title="">Agenda</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="container">
      <div class="row">
        @foreach($agendas as $agenda)
            <div class="col-md-4">
                <a href="/agenda/{{ $agenda->id }}">link</a>
                <p>{{ $agenda->nama_kegiatan }}</p>
                <p>{!! $agenda->deskripsi_kegiatan !!}</p>
                <p>{{ $agenda->gambar_kegiatan }}</p>
                <p>{{ $agenda->mulai_kegiatan }}</p>
                <p>{{ $agenda->akhir_kegiatan }}</p>
            </div>
        @endforeach
      </div>
  </div>



<script>

</script>


  @include('web.components.footer')

@endsection