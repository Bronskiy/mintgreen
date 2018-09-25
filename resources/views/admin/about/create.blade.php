@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>{{ trans('quickadmin::templates.templates-view_create-add_new') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::open(array('files' => true, 'route' => config('quickadmin.route').'.about.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

<div class="form-group">
    {!! Form::label('about_title', 'Title*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('about_title', old('about_title'), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('about_header_image', 'Header Image', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('about_header_image') !!}
        {!! Form::hidden('about_header_image_w', 4096) !!}
        {!! Form::hidden('about_header_image_h', 4096) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('about_slogan', 'Slogan', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('about_slogan', old('about_slogan'), array('class'=>'form-control')) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('about_body', 'Body', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('about_body', old('about_body'), array('class'=>'form-control ckeditor')) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('seo_title', 'SEO Title', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('seo_title', old('seo_title'), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('seo_keywords', 'SEO Keywords', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('seo_keywords', old('seo_keywords'), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('seo_description', 'SEO Description', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('seo_description', old('seo_description'), array('class'=>'form-control')) !!}

    </div>
</div>
<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn btn-primary')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection
