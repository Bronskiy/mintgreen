@extends('layouts.default')

@section('content')

@foreach ($AboutData as $value)
@section('meta_title', __($value->seo_title))
@section('meta_keywords', __($value->seo_keywords))
@section('meta_description', __($value->seo_description))
<section class="hero-section">
  <div class="hero-area position-relative overflow-hidden text-center" style='background-image:url("{{ Image::url(asset('uploads') . '/'.  $value->about_header_image,1613,641,array('crop')) }}")'>
    <h1 class="head-lead">{{ $value->about_title }}</h1>
    <img src="{{ Image::url(asset('uploads') . '/'.  $value->about_header_image,1613,641,array('crop')) }}" class="hidden-int-image">
  </div>
</section>
<section class="about-slogan">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4>{{ $value->about_slogan }}</h4>
      </div>
    </div>
  </div>
</section>
<section class="about-body">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        {!! $value->about_body !!}
      </div>
    </div>
  </div>
</section>
@endforeach
<section class="about-specialization bg-light ellipse-top">
  <div class="container">
    <div class="row text-center">
      <div class="col-lg-12">
        <h3>MintGreen Specializes in:</h3>
      </div>
    </div>
    <div class="row">
      @foreach ($SpecializationData as $value)
      <div class="col-sm-12 col-md-6 col-lg-4 about-feature-item-wrapper text-center wow fadeIn" data-wow-duration="1s" data-wow-delay="2s">
        <div class="about-feature-item">
          <div class="about-feature-item-content">
            <img src="{{ asset('uploads') . '/'.  $value->specialization_icon }}" alt="{{ $value->specialization_title }}">
            <h4>{{ $value->specialization_title }}</h4>
          </div>
          <div class="hover-open">
            <p>{{ $value->specialization_description }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

@stop
