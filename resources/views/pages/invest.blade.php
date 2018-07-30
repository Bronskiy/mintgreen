@extends('layouts.default')

@section('meta_title', 'Invest')
@section('meta_description', '')
@section('meta_keywords', '')
@section('content')

@foreach ($InvestData as $value)
{{ $value->invest_title }}
{{ $value->invest_header_image }}
{!! $value->invest_body !!}
@endforeach

@stop
