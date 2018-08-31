@extends('layouts.default')
@section('meta_title', 'Team')

@section('content')
@foreach ($TeamPage as $value)
<section class="hero-section">
  <div class="hero-area position-relative overflow-hidden text-center" style="background-image:url('{{ asset('uploads') . '/'.  $value->team_page_header_image }}')">
    <h1 class="head-lead team-head-lead">{{ $value->team_page_title }}</h1>
    <img src="{{ asset('uploads') . '/'.  $value->team_page_header_image }}" class="hidden-int-image">
  </div>
</section>
@endforeach
@foreach ($TeamData as $key=>$teamCategory)
<section class="team-category @if(($loop->first) == 1) first @endif @if(($loop->first) % 2 != 0) bg-light ellipse @endif">
  <div class="container">
    @foreach ($teamCategory as $value)
    @if($loop->first)
    <div class="row team-category-header">
      <div class="col-md-10 offset-md-1 text-center">
        <h3>{{ $Category[$key]->team_category_title }}</h3>
        <p>{{ $Category[$key]->team_category_description }}</p>
      </div>
    </div>
    <div class="row">
      @endif
      <div class="col-md-6 team-item">
        <div class="team-item-container" data-id="{{ $value->id }}">
          @if($value->team_member_photo)
          <img src="{{ Image::url(asset('uploads') . '/'.  $value->team_member_photo,240,240,array('crop')) }}" alt="{{ $value->team_member_name }}">
          @else
          <img src="http://via.placeholder.com/240?text=user" alt="{{ $value->team_member_name }}">
          @endif
          <div class="team-item-description">
            <h4>{{ $value->team_member_name }}</h4>
            <h5>{{ $value->team_member_position }}</h5>
            <p><a href="{{ $value->team_member_linkedin }}" class="linkedin-link"><i class="fab fa-linkedin"></i></a></p>
          </div>
        </div>
      </div>
      @if($loop->last)
    </div>
    @endif
    @endforeach
  </div>
</section>
@endforeach
@stop
