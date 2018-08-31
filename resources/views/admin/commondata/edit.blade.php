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

{!! Form::model($commondata, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.commondata.update', $commondata->id))) !!}
<div class="form-group">
    {!! Form::label('common_logo', 'Logo', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('common_logo') !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('common_email', 'Email', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::email('common_email', old('common_email',$commondata->common_email), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('common_phone', 'Phone', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('common_phone', old('common_phone',$commondata->common_phone), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('common_address', 'Address', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('common_address', old('common_address',$commondata->common_address), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('common_linked_in', 'Linked In', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('common_linked_in', old('common_linked_in',$commondata->common_linked_in), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('common_twitter', 'Twitter', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('common_twitter', old('common_twitter',$commondata->common_twitter), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('common_facebook', 'Facebook', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('common_facebook', old('common_facebook',$commondata->common_facebook), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('common_instagram', 'Instagram', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('common_instagram', old('common_instagram',$commondata->common_instagram), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.commondata.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection
