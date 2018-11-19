@extends('layouts.default')

@section('content')

@foreach ($ThankYou as $value)
@section('meta_title', $value->thank_you_title )
@section('meta_description', '')
@section('meta_keywords', '')
<section class="hero-section">
  <div class="hero-area position-relative overflow-hidden text-center parallax-window"
  style="background: url('{{ Image::url(asset('uploads') . '/'.  $value->thank_you_header_image,1613,641,array('crop' => 'top_center')) }}') no-repeat center; background-size: cover;"
  data-paroller-factor="0.5"
  data-paroller-factor-xs="0.2">
  <div class="hero-area-inner">
    <h1 class="head-lead">{{ $value->thank_you_title }}</h1>
  </div>
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
