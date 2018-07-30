@extends('layouts.default')

@section('meta_title', 'Home')
@section('meta_description', '')
@section('meta_keywords', '')

@section('content')

@foreach ($HomeData as $value)
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light" style="background-image:url('{{ asset('uploads') . '/'.  $value->home_header_image }}')">
  <div class="col-md-5 p-lg-5 mx-auto my-5">
    <img src="{{ asset('uploads') . '/'.  $value->home_image_block_1 }}" alt="">
    <p class="lead font-weight-normal">Turn-key Cryptocurrency<br>Mining Systems</p>
    <a class="btn btn-outline-secondary" href="/product">Meet Caddy</a>
  </div>
  <div class="product-device box-shadow d-none d-md-block"></div>
  <div class="product-device product-device-2 box-shadow d-none d-md-block"></div>
</div>
<div class="container">

<div class="row">
  <div class="col-lg-6">
    {!! $value->home_text_block_1 !!}
  </div>
  <div class="col-lg-6">
  </div>
</div>
<div class="row">
  <div class="col-lg-6">
    {!! $value->home_text_block_2 !!}
  </div>
  <div class="col-lg-6">
    <img class="img-fluid rounded" src="{{ asset('uploads') . '/'.  $value->home_image_block_2 }}" alt="">
  </div>
</div>
<div class="row">
  <div class="col-lg-6">
    {!! $value->home_text_block_3 !!}
  </div>
  <div class="col-lg-6">
    <img class="img-fluid rounded" src="{{ asset('uploads') . '/'.  $value->home_image_block_3 }}" alt="">
  </div>
</div>
<div class="row">
  <div class="col-lg-6">
    {!! $value->home_text_block_4 !!}
  </div>
  <div class="col-lg-6">
    <img class="img-fluid rounded" src="{{ asset('uploads') . '/'.  $value->home_image_block_4 }}" alt="">
  </div>
</div>
<div class="row">
  <div class="col-lg-6">
    {!! $value->home_text_block_5 !!}
  </div>
  <div class="col-lg-6">
    <img class="img-fluid rounded" src="{{ asset('uploads') . '/'.  $value->home_image_block_5 }}" alt="">
  </div>
</div>
</div>

@endforeach

@stop
