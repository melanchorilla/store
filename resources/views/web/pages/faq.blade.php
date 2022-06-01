@extends('layouts.web')

<?php $seo = DB::table('seo')->where('id_seo', '1')->first(); ?>
@section('title')
  {{ $seo->title ? $seo->title : 'Qnanz Official' }}
@endsection

@section('description')
  {{ $seo->deskripsi ? $seo->deskripsi : 'Qnanz Official' }}
@endsection

@section('keyword')
  {{ $seo->keyword ? $seo->keyword : 'Qnanz Official' }}
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
