@extends('layouts.default')
@section('meta_title', 'Team')

@section('content')
<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">Team</h1>
  </div>
</section>

@foreach ($TeamData as $key=>$teamCategory)
<div class="album py-5 @if(($loop->first) % 2 != 0) bg-light bg-rounded @endif">
  <div class="container">
    @foreach ($teamCategory as $value)
    @if($loop->first)
    <div class="row">
      <div class="col-md-12 text-center">
        <h2>{{ $Category[$key]->team_category_title }}</h2>
        <p>{{ $Category[$key]->team_category_description }}</p>
      </div>
    </div>
    <div class="row">
      @endif
      <div class="col-md-6 team-item">

        @if($value->team_member_photo)
        <img src="{{ asset('uploads') . '/'.  $value->team_member_photo }}" alt="{{ $value->team_member_name }}">
        @else
        <img src="http://via.placeholder.com/240?text=user" alt="{{ $value->team_member_name }}">
        @endif
        <h3>{{ $value->team_member_name }}</h3>
        <h5>{{ $value->team_member_position }}</h5>
        <p><a href="{{ $value->team_member_linkedin }}"><i class="fab fa-linkedin"></i></a></p>

        {{ $value->teamcategory->team_category_title }}
        {!! $value->teamcategory->team_category_description !!}
      </div>
      @if($loop->last)
    </div>
    @endif
    @endforeach
  </div>
</div>
@endforeach
@stop
