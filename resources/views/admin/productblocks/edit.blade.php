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

{!! Form::model($productblocks, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.productblocks.update', $productblocks->id))) !!}

<div class="form-group">
    {!! Form::label('product_block_class', 'Class', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('product_block_class', old('product_block_class',$productblocks->product_block_class), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('product_block_title', 'Title', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('product_block_title', old('product_block_title',$productblocks->product_block_title), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('product_block_text', 'Text', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('product_block_text', old('product_block_text',$productblocks->product_block_text), array('class'=>'form-control ckeditor')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('product_block_image', 'Image', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('product_block_image') !!}
        {!! Form::hidden('product_block_image_w', 4096) !!}
        {!! Form::hidden('product_block_image_h', 4096) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.productblocks.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection