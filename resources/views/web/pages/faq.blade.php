@extends('layouts.web')

<?php $seo = DB::table('seo')->where('id_seo', '1')->first(); ?>
@section('title')
  {{ $seo->title ? $seo->title : 'Pusat Pendidikan dan Pelatihan Pramugari | Nasa.or.id' }}
@endsection

@section('description')
  {{ $seo->deskripsi ? $seo->deskripsi : 'Pusat Pendidikan dan Pelatihan Pramugari | Nasa.or.id' }}
@endsection

@section('keyword')
  {{ $seo->keyword ? $seo->keyword : 'Pusat Pendidikan dan Pelatihan Pramugari | Nasa.or.id' }}
@endsection

@section('content')

<style>
    .mt-5 {
        margin-top: 50px;
    }
</style>

    <div class="animsition">
        <div class="full-box">
            <main>
                @include('web.components.header')
                <div class="breadcrumbs">
    <div class="container">
      <h1 class="category-name">FREQUENTLY ASKED QUESTIONS (FAQs)</h1>
      <ul class="breadcrumb">
        <li>
          <a href="/home" class="smooth" title="">Home</a>
        </li>
        <li>
          <a href="#" class="smooth" title="">faqs</a>
        </li>
      </ul>
    </div>
  </div>
                <div class="container">
                    <div class="box">
                        <div class="row mt-5">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <div class="list-group">

                                    @foreach($faqs as $faq)
                                        <div class="list-group-item show-hidden">
                                            <h4 class="list-group-item-heading"><a href="#jawab{{ $faq->id }}" data-toggle="collapse" aria-expanded="false" aria-controls="jawab{{$faq->id}}">{{ $faq->tanya }}</a></h4>
                                            <p class="list-group-item-text collapse" id="jawab{{ $faq->id }}">
                                                {{ $faq->jawab }}
                                            </p>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <hr />


                    </div>
                </div>

            </main>


            @include('web.components.footer')

        </div>
    </div>

<script>
</script>
@endsection
