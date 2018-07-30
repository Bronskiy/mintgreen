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

{!! Form::open(array('files' => true, 'route' => config('quickadmin.route').'.home.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

<div class="form-group">
    {!! Form::label('home_header_image', 'Header Image', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('home_header_image') !!}
        {!! Form::hidden('home_header_image_w', 4096) !!}
        {!! Form::hidden('home_header_image_h', 4096) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('home_image_block_1', 'Image Block 1', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('home_image_block_1') !!}
        {!! Form::hidden('home_image_block_1_w', 4096) !!}
        {!! Form::hidden('home_image_block_1_h', 4096) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('home_text_block_1', 'Text  Block 1', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('home_text_block_1', old('home_text_block_1'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('home_image_block_2', 'Image  Block 2', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('home_image_block_2') !!}
        {!! Form::hidden('home_image_block_2_w', 4096) !!}
        {!! Form::hidden('home_image_block_2_h', 4096) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('home_text_block_2', 'Text  Block 2', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('home_text_block_2', old('home_text_block_2'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('home_image_block_3', 'Image  Block 3', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('home_image_block_3') !!}
        {!! Form::hidden('home_image_block_3_w', 4096) !!}
        {!! Form::hidden('home_image_block_3_h', 4096) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('home_text_block_3', 'Text  Block 3', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('home_text_block_3', old('home_text_block_3'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('home_image_block_4', 'Image  Block 4', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('home_image_block_4') !!}
        {!! Form::hidden('home_image_block_4_w', 4096) !!}
        {!! Form::hidden('home_image_block_4_h', 4096) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('home_text_block_4', 'Text  Block 4', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('home_text_block_4', old('home_text_block_4'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('home_image_block_5', 'Image  Block 5', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('home_image_block_5') !!}
        {!! Form::hidden('home_image_block_5_w', 4096) !!}
        {!! Form::hidden('home_image_block_5_h', 4096) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('home_text_block_5', 'Text  Block 5', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('home_text_block_5', old('home_text_block_5'), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn btn-primary')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection