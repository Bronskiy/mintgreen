@extends('layouts.default')

@section('content')

@foreach ($ThankYou as $value)
@section('meta_title', $value->thank_you_title )
@section('meta_description', '')
@section('meta_keywords', '')
<section class="hero-section">
  <div class="hero-area position-relative overflow-hidden text-center" style="background-image:url('{{ asset('uploads') . '/'.  $value->thank_you_header_image }}')">
    <h1 class="head-lead">{{ $value->thank_you_title }}</h1>
    <img src="{{ asset('uploads') . '/'.  $value->thank_you_header_image }}" class="hidden-int-image">
  </div>
</section>
<section class="thank-you-body">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        {!! $value->thank_you_body !!}
      </div>
    </div>
  </div>
</section>
@endforeach
@stop
