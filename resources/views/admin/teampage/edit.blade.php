@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>{{ trans('quickadmin::templates.templates-view_edit-edit') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($teampage, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.teampage.update', $teampage->id))) !!}

<div class="form-group">
    {!! Form::label('team_page_title', 'Team Page Title', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('team_page_title', old('team_page_title',$teampage->team_page_title), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('team_page_header_image', 'Team Page Header Image', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('team_page_header_image') !!}
        {!! Form::hidden('team_page_header_image_w', 4096) !!}
        {!! Form::hidden('team_page_header_image_h', 4096) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('seo_title', 'SEO Title', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('seo_title', old('seo_title',$teampage->seo_title), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('seo_keywords', 'SEO Keywords', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('seo_keywords', old('seo_keywords',$teampage->seo_keywords), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('seo_description', 'SEO Description', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('seo_description', old('seo_description',$teampage->seo_description), array('class'=>'form-control')) !!}

    </div>
</div>
<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.teampage.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection
