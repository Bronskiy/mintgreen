@extends('admin.layouts.master')

@section('content')


@if ($teampage->count())
<div class="portlet box green">
  <div class="portlet-title">
    <div class="caption">{{ trans('quickadmin::templates.templates-view_index-list') }}</div>
  </div>
  <div class="portlet-body">
    <table class="table table-striped table-hover table-responsive datatable" id="datatable">
      <thead>
        <tr>

          <th>Team Page Title</th>
          <th>Team Page Header Image</th>

          <th>&nbsp;</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($teampage as $row)
        <tr>

          <td>{{ $row->team_page_title }}</td>
          <td>@if($row->team_page_header_image != '')<img src="{{ asset('uploads/thumb') . '/'.  $row->team_page_header_image }}">@endif</td>

          <td>
            {!! link_to_route(config('quickadmin.route').'.teampage.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}

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
