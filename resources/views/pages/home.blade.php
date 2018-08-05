@extends('layouts.default')

@section('meta_title', 'Home')
@section('meta_description', '')
@section('meta_keywords', '')

@section('content')

@foreach ($HomeData as $value)
<section class="hero-section">
  <div class="hero-area position-relative overflow-hidden text-center" style="background-image:url('{{ asset('uploads') . '/'.  $value->home_header_image }}')">
    <img src="{{ asset('uploads') . '/'.  $value->home_image_block_1 }}" alt="" class="header-image">
    <p class="head-lead">Turn-key Cryptocurrency<br>Mining Systems</p>
    <a class="btn btn-outline-secondary" href="/product">Meet Caddy</a>
    <img src="{{ asset('uploads') . '/'.  $value->home_header_image }}" class="hidden-int-image">
  </div>
</section>
<section class="block-1">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        {!! $value->home_text_block_1 !!}
      </div>
      <div class="col-lg-6">
      </div>
    </div>
  </div>
</section>
<section class="bg-light ellipse block-2">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <img class="img-fluid " src="{{ asset('uploads') . '/'.  $value->home_image_block_2 }}" alt="">
      </div>
      <div class="col-lg-6">
        {!! $value->home_text_block_2 !!}
      </div>
    </div>
  </div>
</section>
<section class="block-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        {!! $value->home_text_block_3 !!}
      </div>
      <div class="col-lg-6">
        <img class="img-fluid " src="{{ asset('uploads') . '/'.  $value->home_image_block_3 }}" alt="">
      </div>
    </div>
  </div>
</section>
<section class="block-4 bg-green ellipse">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <img class="img-fluid " src="{{ asset('uploads') . '/'.  $value->home_image_block_4 }}" alt="">
      </div>
      <div class="col-lg-6">
        {!! $value->home_text_block_4 !!}
      </div>
    </div>
  </div>
</section>
<section class="block-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        {!! $value->home_text_block_5 !!}
      </div>
      <div class="col-lg-6">
        <img class="img-fluid " src="{{ asset('uploads') . '/'.  $value->home_image_block_5 }}" alt="">
      </div>
    </div>
  </div>
</section>


@endforeach

@stop
