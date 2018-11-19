@extends('layouts.default')

@section('content')

@foreach ($HomeData as $value)
@section('meta_title', __($value->seo_title))
@section('meta_keywords', __($value->seo_keywords))
@section('meta_description', __($value->seo_description))
<section class="hero-section home-page">
  <div class="hero-area position-relative overflow-hidden text-center parallax-window"
  style="background: url('{{ Image::url(asset('uploads') . '/'.  $value->home_header_image,1613,641,array('crop')) }}') no-repeat center; background-size: cover;"
  data-paroller-factor="0.5"
  data-paroller-factor-xs="0.2">
  <div class="hero-area-inner">
    <img src="{{ asset('uploads') . '/'.  $value->home_image_block_1 }}" alt="" class="header-image">
    <p class="head-lead">Turn-key<span class="mobile-divider"></span> Cryptocurrency<br>Mining Systems</p>
    <a class="btn btn-outline-secondary" href="/product">Meet Caddy</a>
  </div>
</div>
</section>
<section class="block-1">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 home-text-block-1">
        {!! $value->home_text_block_1 !!}
      </div>
      <div class="col-lg-6 col-md-6">
      </div>
    </div>
  </div>
</section>
<section class="bg-light ellipse block-2">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6">
        <img class="img-fluid  wow zoomIn" data-wow-duration="1.5s" data-wow-delay="0.5s" src="{{ asset('uploads') . '/'.  $value->home_image_block_2 }}" alt="">
      </div>
      <div class="col-lg-6 col-md-6 home-text-block-2">
        {!! $value->home_text_block_2 !!}
      </div>
    </div>
  </div>
</section>
<section class="block-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6  home-text-block-3">
        {!! $value->home_text_block_3 !!}
      </div>
      <div class="col-lg-6 col-md-6">
        <img class="img-fluid  wow zoomIn" data-wow-duration="1.5s" data-wow-delay="0.5s" src="{{ asset('uploads') . '/'.  $value->home_image_block_3 }}" alt="">
      </div>
    </div>
  </div>
</section>
<section class="block-4 bg-green ellipse">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6">
        <img class="img-fluid  wow zoomIn" data-wow-duration="1.5s" data-wow-delay="0.5s" src="{{ asset('uploads') . '/'.  $value->home_image_block_4 }}" alt="">
      </div>
      <div class="col-lg-6 col-md-6  home-text-block-4">
        {!! $value->home_text_block_4 !!}
      </div>
    </div>
  </div>
</section>
<section class="block-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6  home-text-block-5">
        {!! $value->home_text_block_5 !!}
      </div>
      <div class="col-lg-6 col-md-6">
        <img class="img-fluid  wow zoomIn" data-wow-duration="1.5s" data-wow-delay="0.5s" src="{{ asset('uploads') . '/'.  $value->home_image_block_5 }}" alt="">
      </div>
    </div>
  </div>
</section>
@endforeach

@stop
