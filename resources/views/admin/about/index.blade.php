@extends('admin.layouts.master')

@section('content')


@if ($about->count())
<div class="portlet box green">
  <div class="portlet-title">
    <div class="caption">{{ trans('quickadmin::templates.templates-view_index-list') }}</div>
  </div>
  <div class="portlet-body">
    <table class="table table-striped table-hover table-responsive datatable" id="datatable">
      <thead>
        <tr>
          <th>
            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
          </th>
          <th>Title</th>
          <th>Header Image</th>
          <th>Slogan</th>

          <th>&nbsp;</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($about as $row)
        <tr>
          <td>
            {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
          </td>
          <td>{{ $row->about_title }}</td>
          <td>@if($row->about_header_image != '')<img src="{{ asset('uploads/thumb') . '/'.  $row->about_header_image }}">@endif</td>
          <td>{{ $row->about_slogan }}</td>

          <td>
            {!! link_to_route(config('quickadmin.route').'.about.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}

          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>
@else
{{ trans('quickadmin::templates.templates-view_index-no_entries_found') }}
@endif

@endsection

@section('javascript')
<script>
$(document).ready(function () {
  $('#delete').click(function () {
    if (window.confirm('{{ trans('quickadmin::templates.templates-view_index-are_you_sure') }}')) {
      var send = $('#send');
      var mass = $('.mass').is(":checked");
      if (mass == true) {
        send.val('mass');
      } else {
        var toDelete = [];
        $('.single').each(function () {
          if ($(this).is(":checked")) {
            toDelete.push($(this).data('id'));
          }
        });
        send.val(JSON.stringify(toDelete));
      }
      $('#massDelete').submit();
    }
  });
});
</script>
@stop
