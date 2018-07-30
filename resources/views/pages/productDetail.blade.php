@extends('layouts.default')
@section('meta_title', $ProductData->product_title)
@section('meta_description', '')
@section('meta_keywords', '')

@section('content')
<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">{{ $ProductData->product_title }}</h1>
  </div>
</section>

<div class="album py-5">
  <div class="container">

    <div class="row">
      <div class="col-md-12 text-center">
        <h2></h2>
        <p></p>
      </div>
    </div>

  </div>
</div>

<div class="album py-5">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        {!! $ProductData->product_specs !!}
      </div>
    </div>

  </div>
</div>

<div class="album py-5">
      <div class="swiper-container gallery-top">
        <div class="swiper-wrapper">
          @foreach($ProductData->getMedia('product_gallery') as $media)
          <div class="swiper-slide">
            <img src="{{ $media->getUrl() }}" alt="">
          </div>
          @endforeach
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
      </div>
      <div class="swiper-container gallery-thumbs">
        <div class="swiper-wrapper">
          @foreach($ProductData->getMedia('product_gallery') as $media)
          <div class="swiper-slide" style="background-image:url({{ $media->getUrl() }})"></div>
          @endforeach
        </div>
      </div>
</div>
@stop
