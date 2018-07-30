@extends('layouts.default')

@section('meta_title', 'About')
@section('meta_description', '')
@section('meta_keywords', '')

@section('content')

@foreach ($AboutData as $value)
<section style="background-image:url('{{ asset('uploads') . '/'.  $value->about_header_image }}')">
  <h1>{{ $value->about_title }}</h1>

</section>
<section class="about-slogan">
  {{ $value->about_slogan }}
</section>
<section>
  {!! $value->about_body !!}

</section>

@endforeach
<div class="album py-5 bg-light bg-rounded">
  <div class="container">
    <div class="row">
      @foreach ($SpecializationData as $value)
      <div class="col-md-4 about-feature-item text-center">
        <img src="{{ asset('uploads') . '/'.  $value->specialization_icon }}" alt="{{ $value->specialization_title }}">
        <h4>{{ $value->specialization_title }}</h4>
        <div class="hover-open">
          <p>
            {{ $value->specialization_description }}
          </p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@stop
