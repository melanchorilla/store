@extends('layouts.web')


@section('content')

  @include('web.components.header')

<style>
.container p {
    font-size: 14px;
}

.mt-5 {
    margin-top: 50px;
}

.mb-5 {
    margin-bottom: 50px;
}

hr .bottom-text {
    width:50px;
    border-top: 5px solid #beae59;
}

</style>

    <div class="breadcrumbs">
        <div class="container">
        <h1 class="category-name">PARTNERSHIP</h1>
        <ul class="breadcrumb">
            <li>
            <a href="/home" class="smooth" title="">Home</a>
            </li>
            <li>
            <a href="#" class="smooth" title="">Partnership</a>
            </li>
        </ul>
        </div>
    </div>

    <div class="container mt-10">
        @foreach($partnerships as $partnership)
            <div class="row mt-5 mb-5">
                <div class="col-md-3">
                    <img class="img-responsive" src="{{ asset('assets/partnership/' . $partnership->gambar) }}" alt="">
                </div>
                <div class="col-md-9">
                    <h3 class="mb-15">{{ $partnership->nama_perusahaan }}</h3>
                    <p>{!! $partnership->deskripsi !!}</p>
                </div>
            </div>
        @endforeach

    </div>



  @include('web.components.footer')

@endsection