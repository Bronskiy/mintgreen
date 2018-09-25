@extends('layouts.default')

@section('meta_title', __($ProductData->seo_title))
@section('meta_keywords', __($ProductData->seo_keywords))
@section('meta_description', __($ProductData->seo_description))

@section('content')

<section class="hero-section product-{{ $ProductData->id }}">
  <div class="hero-area position-relative overflow-hidden text-center" style='background-image:url("{{ Image::url(asset('uploads') . '/'.  $ProductData->product_image,1613,641,array('crop')) }}")'>
    {{-- <h1 class="head-lead">{{ $ProductData->product_title }}</h1> --}}
    <img src="{{ Image::url(asset('uploads') . '/'.  $ProductData->product_image,1613,641,array('crop')) }}" alt="background-image" class="hidden-int-image">
    <img src="{{ asset('uploads') . '/'.  $ProductData->product_circle_image }}" alt="circle-image" class="circle-image">
    <a class="btn btn-outline-secondary" data-toggle="modal" data-target="#myRequest" href="#">Request a quote</a>
  </div>
</section>


@foreach($ProductData->productblocks as $block)
<section class="{{ $block->product_block_class }} @if(($loop->iteration) % 2 == 0) bg-light ellipse @endif">
  <div class="container">
    <div class="row">
      @if(($loop->iteration) % 2 != 0 && $loop->iteration != 7)
      <div class="col-lg-6 col-md-6">
        <img class="img-fluid " src="{{ asset('uploads') . '/'.  $block->product_block_image }}" alt="{{ $block->product_block_title }}">
      </div>
      @endif
      <div class="col-lg-6 col-md-6">
        <div class="product-description">
          <h3>{{ $block->product_block_title }}</h3>
          {!! $block->product_block_text !!}
        </div>
      </div>
      @if(($loop->iteration) % 2 == 0 || $loop->iteration == 7)
      <div class="col-lg-6 col-md-6">
        <img class="img-fluid " src="{{ asset('uploads') . '/'.  $block->product_block_image }}" alt="{{ $block->product_block_title }}">
      </div>
      @endif
    </div>
  </div>
</section>
@endforeach
<section class="product-specs bg-green ellipse">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        {!! $ProductData->product_specs !!}
      </div>
    </div>
  </div>
</section>

<section class="caddy-gallery">
  <div class="container">
    <div class="row text-center">
      <div class="col-lg-12">
        <h3>Gallery</h3>
      </div>
    </div>
    <div class="row">
      <div class="gallery-container">
        <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
            @foreach($ProductData->getMedia('product_gallery') as $media)
            <div class="swiper-slide">
              <img src="{{ $media->getUrl() }}" alt="">
            </div>
            @endforeach
          </div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-black"></div>
        <div class="swiper-button-prev swiper-button-black"></div>
        <div class="swiper-container gallery-thumbs">
          <div class="swiper-wrapper">
            @foreach($ProductData->getMedia('product_gallery') as $media)
            <div class="swiper-slide" style="background-image:url({{ $media->getUrl() }})"></div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop
