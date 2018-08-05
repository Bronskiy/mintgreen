@extends('layouts.default')

@section('content')

@foreach ($InvestData as $value)
@section('meta_title', $value->invest_title )
@section('meta_description', '')
@section('meta_keywords', '')
<section class="hero-section">
  <div class="hero-area position-relative overflow-hidden text-center" style="background-image:url('{{ asset('uploads') . '/'.  $value->invest_header_image }}')">
    <h1 class="head-lead">{{ $value->invest_title }}</h1>
    <img src="{{ asset('uploads') . '/'.  $value->invest_header_image }}" class="hidden-int-image">
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
        <p class="text-right"><i class="fas fa-envelope"></i> <a href="mailto:{{ $value->common_email }}">{{ $value->common_email }}</a></p>
      </div>
      <div class="col-md-6 phone-holder">
        <p><i class="fas fa-phone"></i> <a href="tel:+{{ preg_replace('/\D+/', '', $value->common_phone) }}">{{ $value->common_phone }}</a></p>
      </div>
    </div>
  </div>
</section>
@endforeach
@stop
