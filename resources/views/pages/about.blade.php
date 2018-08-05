@extends('layouts.default')

@section('meta_title', 'About')
@section('meta_description', '')
@section('meta_keywords', '')

@section('content')

@foreach ($AboutData as $value)
<section class="hero-section">
  <div class="hero-area position-relative overflow-hidden text-center" style="background-image:url('{{ asset('uploads') . '/'.  $value->about_header_image }}')">
    <h1 class="head-lead">{{ $value->about_title }}</h1>
    <img src="{{ asset('uploads') . '/'.  $value->about_header_image }}" class="hidden-int-image">
  </div>
</section>
<section class="about-slogan">
  <div class="container">
    <div class="row">
      <h4>{{ $value->about_slogan }}</h4>
    </div>
  </div>
</section>
<section class="about-body">
  <div class="container">
    <div class="row">
      {!! $value->about_body !!}
    </div>
  </div>
</section>
@endforeach
<div class="album py-5 bg-light ellipse-top">
  <div class="container">
    <div class="row">
      @foreach ($SpecializationData as $value)
      <div class="col-md-4 about-feature-item text-center">
        <img src="{{ asset('uploads') . '/'.  $value->specialization_icon }}" alt="{{ $value->specialization_title }}">
        <h4>{{ $value->specialization_title }}</h4>
        <div class="hover-open">
          <p>{{ $value->specialization_description }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@stop
