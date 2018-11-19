@extends('layouts.default')

@section('content')

@foreach ($InvestData as $value)
@section('meta_title', __($value->seo_title))
@section('meta_keywords', __($value->seo_keywords))
@section('meta_description', __($value->seo_description))
<section class="hero-section invest-page">
  <div class="hero-area invest-hero position-relative overflow-hidden text-center parallax-window"
  style="background: url('{{ Image::url(asset('uploads') . '/'.  $value->invest_header_image,1613,641,array('crop' => 'top_center')) }}') no-repeat center; background-size: cover;"
  data-paroller-factor="0.5"
  data-paroller-factor-xs="0.2">
  <div class="hero-area-inner">
    <h1 class="head-lead">{{ $value->invest_title }}</h1>
  </div>
  {{-- <img src="{{ Image::url(asset('uploads') . '/'.  $value->invest_header_image,1613,641,array('crop')) }}" class="hidden-int-image"> --}}
</div>
</section>
<section class="invest-body">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        {!! $value->invest_body !!}
      </div>
    </div>
  </div>
</section>
@endforeach
@foreach ($сommonData as $value)
<section class="invest-contacts">
  <div class="container">
    <div class="row">
      <div class="col-md-6 email-holder">
        <p><i class="fas fa-envelope"></i> <a href="mailto:{{ $value->common_email }}">{{ $value->common_email }}</a></p>
      </div>
      <div class="col-md-6 phone-holder">
        <p><i class="fas fa-phone"></i> <a href="tel:+{{ preg_replace('/\D+/', '', $value->common_phone) }}">{{ $value->common_phone }}</a></p>
      </div>
    </div>
  </div>
</section>
@endforeach
@stop
