@extends('admin.layouts.master')

@section('content')


@if ($home->count())
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
          <th>Header Image</th>
          <th>Image Block 1</th>
          <th>Image  Block 2</th>
          <th>Image  Block 3</th>
          <th>Image  Block 4</th>
          <th>Image  Block 5</th>

          <th>&nbsp;</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($home as $row)
        <tr>
          <td>
            {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
          </td>
          <td>@if($row->home_header_image != '')<img src="{{ asset('uploads/thumb') . '/'.  $row->home_header_image }}">@endif</td>
          <td>@if($row->home_image_block_1 != '')<img src="{{ asset('uploads/thumb') . '/'.  $row->home_image_block_1 }}">@endif</td>
          <td>@if($row->home_image_block_2 != '')<img src="{{ asset('uploads/thumb') . '/'.  $row->home_image_block_2 }}">@endif</td>
          <td>@if($row->home_image_block_3 != '')<img src="{{ asset('uploads/thumb') . '/'.  $row->home_image_block_3 }}">@endif</td>
          <td>@if($row->home_image_block_4 != '')<img src="{{ asset('uploads/thumb') . '/'.  $row->home_image_block_4 }}">@endif</td>
          <td>@if($row->home_image_block_5 != '')<img src="{{ asset('uploads/thumb') . '/'.  $row->home_image_block_5 }}">@endif</td>

          <td>
            {!! link_to_route(config('quickadmin.route').'.home.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}

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
