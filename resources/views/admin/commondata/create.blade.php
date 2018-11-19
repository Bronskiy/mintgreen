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

{!! Form::open(array('route' => config('quickadmin.route').'.commondata.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

<div class="form-group">
    {!! Form::label('common_email', 'Email', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::email('common_email', old('common_email'), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('common_phone', 'Phone', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('common_phone', old('common_phone'), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('common_address', 'Address', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('common_address', old('common_address'), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('common_linked_in', 'Linked In', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('common_linked_in', old('common_linked_in'), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('common_twitter', 'Twitter', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('common_twitter', old('common_twitter'), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('common_facebook', 'Facebook', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('common_facebook', old('common_facebook'), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('common_instagram', 'Instagram', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('common_instagram', old('common_instagram'), array('class'=>'form-control')) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('common_google_analytics', 'Google Analytics', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('common_google_analytics', old('common_google_analytics'), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('common_google_tag_head', 'Google Tag Manager HEAD', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('common_google_tag_head', old('common_google_tag_head'), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('common_google_tag_bottom', 'Google Tag Manager BODY', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('common_google_tag_bottom', old('common_google_tag_bottom'), array('class'=>'form-control')) !!}

    </div>
</div>
<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn btn-primary')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection
