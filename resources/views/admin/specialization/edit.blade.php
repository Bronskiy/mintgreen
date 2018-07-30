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

{!! Form::model($specialization, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.specialization.update', $specialization->id))) !!}

<div class="form-group">
    {!! Form::label('specialization_icon', 'Icon', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('specialization_icon') !!}

    </div>
</div><div class="form-group">
    {!! Form::label('specialization_title', 'Title*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('specialization_title', old('specialization_title',$specialization->specialization_title), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('specialization_description', 'Description', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('specialization_description', old('specialization_description',$specialization->specialization_description), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('specialization_order', 'Order', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('specialization_order', old('specialization_order',$specialization->specialization_order), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.specialization.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection
