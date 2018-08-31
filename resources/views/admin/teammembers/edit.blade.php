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

{!! Form::model($teammembers, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.teammembers.update', $teammembers->id))) !!}

<div class="form-group">
    {!! Form::label('team_member_name', 'Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('team_member_name', old('team_member_name',$teammembers->team_member_name), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('team_member_position', 'Position', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('team_member_position', old('team_member_position',$teammembers->team_member_position), array('class'=>'form-control')) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('team_member_linkedin', 'LinkedIn', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('team_member_linkedin', old('team_member_linkedin',$teammembers->team_member_linkedin), array('class'=>'form-control')) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('team_member_email', 'Email', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('team_member_email', old('team_member_email',$teammembers->team_member_email), array('class'=>'form-control')) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('team_member_quote', 'Quote', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('team_member_quote', old('team_member_quote',$teammembers->team_member_quote), array('class'=>'form-control')) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('team_member_hobby', 'Hobbies', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('team_member_hobby', old('team_member_hobby',$teammembers->team_member_hobby), array('class'=>'form-control')) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('team_member_photo', 'Photo', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('team_member_photo') !!}

    </div>
</div><div class="form-group">
    {!! Form::label('team_member_description', 'Information', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('team_member_description', old('team_member_description',$teammembers->team_member_description), array('class'=>'form-control ckeditor')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('teamcategory_id', 'Category*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('teamcategory_id', $teamcategory, old('teamcategory_id',$teammembers->teamcategory_id), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.teammembers.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection
