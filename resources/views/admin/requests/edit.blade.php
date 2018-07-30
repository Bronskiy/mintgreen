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

{!! Form::model($requests, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.requests.update', $requests->id))) !!}

<div class="form-group">
    {!! Form::label('requests_first_name', 'First Name', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('requests_first_name', old('requests_first_name',$requests->requests_first_name), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('requests_last_name', 'Last Name', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('requests_last_name', old('requests_last_name',$requests->requests_last_name), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('requests_email', 'Email', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::email('requests_email', old('requests_email',$requests->requests_email), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('requests_phone', 'Phone', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('requests_phone', old('requests_phone',$requests->requests_phone), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('requests_country', 'Country', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('requests_country', old('requests_country',$requests->requests_country), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('requests_address_line_1', 'Address Line 1', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('requests_address_line_1', old('requests_address_line_1',$requests->requests_address_line_1), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('requests_address_line_2', 'Address Line 2', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('requests_address_line_2', old('requests_address_line_2',$requests->requests_address_line_2), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('requests_city', 'City', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('requests_city', old('requests_city',$requests->requests_city), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('requests_province', 'Province', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('requests_province', old('requests_province',$requests->requests_province), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('requests_postal', 'Postal', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('requests_postal', old('requests_postal',$requests->requests_postal), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('product_id', 'Choose your model', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('product_id', $product, old('product_id',$requests->product_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('requests_comment', 'Comment', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('requests_comment', old('requests_comment',$requests->requests_comment), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.requests.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection