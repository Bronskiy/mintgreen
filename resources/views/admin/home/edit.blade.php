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

{!! Form::model($home, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.home.update', $home->id))) !!}

<div class="form-group">
  {!! Form::label('home_header_image', 'Header Image', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-10">
    {!! Form::file('home_header_image') !!}
    {!! Form::hidden('home_header_image_w', 4096) !!}
    {!! Form::hidden('home_header_image_h', 4096) !!}

  </div>
</div>
<div class="form-group">
  {!! Form::label('home_image_block_1', 'Block 1', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-3">
    {!! Form::file('home_image_block_1') !!}
    {!! Form::hidden('home_image_block_1_w', 4096) !!}
    {!! Form::hidden('home_image_block_1_h', 4096) !!}
  </div>
  <div class="col-sm-7">
    {!! Form::textarea('home_text_block_1', old('home_text_block_1',$home->home_text_block_1), array('class'=>'form-control ckeditor')) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('home_image_block_2', 'Block 2', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-3">
    {!! Form::file('home_image_block_2') !!}
    {!! Form::hidden('home_image_block_2_w', 4096) !!}
    {!! Form::hidden('home_image_block_2_h', 4096) !!}
  </div>
  <div class="col-sm-7">
    {!! Form::textarea('home_text_block_2', old('home_text_block_2',$home->home_text_block_2), array('class'=>'form-control ckeditor')) !!}
  </div>
</div>
<div class="form-group">
  {!! Form::label('home_image_block_3', 'Image  Block 3', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-3">
    {!! Form::file('home_image_block_3') !!}
    {!! Form::hidden('home_image_block_3_w', 4096) !!}
    {!! Form::hidden('home_image_block_3_h', 4096) !!}

  </div>
  <div class="col-sm-7">
    {!! Form::textarea('home_text_block_3', old('home_text_block_3',$home->home_text_block_3), array('class'=>'form-control ckeditor')) !!}
  </div>
</div>
<div class="form-group">
  {!! Form::label('home_image_block_4', 'Block 4', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-3">
    {!! Form::file('home_image_block_4') !!}
    {!! Form::hidden('home_image_block_4_w', 4096) !!}
    {!! Form::hidden('home_image_block_4_h', 4096) !!}

  </div>
  <div class="col-sm-7">
    {!! Form::textarea('home_text_block_4', old('home_text_block_4',$home->home_text_block_4), array('class'=>'form-control ckeditor')) !!}
  </div>
</div>
<div class="form-group">
  {!! Form::label('home_image_block_5', 'Block 5', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-3">
    {!! Form::file('home_image_block_5') !!}
    {!! Form::hidden('home_image_block_5_w', 4096) !!}
    {!! Form::hidden('home_image_block_5_h', 4096) !!}
  </div>
  <div class="col-sm-7">
    {!! Form::textarea('home_text_block_5', old('home_text_block_5',$home->home_text_block_5), array('class'=>'form-control ckeditor')) !!}
  </div>
</div>
<div class="form-group">
    {!! Form::label('seo_title', 'SEO Title', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('seo_title', old('seo_title',$home->seo_title), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('seo_keywords', 'SEO Keywords', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('seo_keywords', old('seo_keywords',$home->seo_keywords), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('seo_description', 'SEO Description', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('seo_description', old('seo_description',$home->seo_description), array('class'=>'form-control')) !!}

    </div>
</div>
<div class="form-group">
  <div class="col-sm-10 col-sm-offset-2">
    {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
    {!! link_to_route(config('quickadmin.route').'.home.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
  </div>
</div>

{!! Form::close() !!}

@endsection
