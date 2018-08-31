@extends('admin.layouts.master')

@section('content')


@if ($commondata->count())
<div class="portlet box green">
  <div class="portlet-title">
    <div class="caption">{{ trans('quickadmin::templates.templates-view_index-list') }}</div>
  </div>
  <div class="portlet-body">
    <table class="table table-striped table-hover table-responsive datatable" id="datatable">
      <thead>
        <tr>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>&nbsp;</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($commondata as $row)
        <tr>
          <td>{{ $row->common_email }}</td>
          <td>{{ $row->common_phone }}</td>
          <td>{{ $row->common_address }}</td>
          <td>
            {!! link_to_route(config('quickadmin.route').'.commondata.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}

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
