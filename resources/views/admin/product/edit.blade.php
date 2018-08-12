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

{!! Form::model($product, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PUT', 'route' => array(config('quickadmin.route').'.product.update', $product->id))) !!}

<div class="form-group">
  {!! Form::label('product_title', 'Title*', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-10">
    {!! Form::text('product_title', old('product_title',$product->product_title), array('class'=>'form-control')) !!}

  </div>
</div><div class="form-group">
  {!! Form::label('product_url', 'URL*', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-10">
    {!! Form::text('product_url', old('product_url',$product->product_url), array('class'=>'form-control')) !!}

  </div>
</div>
<div class="form-group">
  {!! Form::label('product_image', 'Background Image', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-10">
    {!! Form::file('product_image') !!}
    {!! Form::hidden('product_image_w', 4096) !!}
    {!! Form::hidden('product_image_h', 4096) !!}

  </div>
</div>
<div class="form-group">
  {!! Form::label('product_circle_image', 'Circle Image', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-10">
    {!! Form::file('product_circle_image') !!}
    {!! Form::hidden('product_circle_image_w', 4096) !!}
    {!! Form::hidden('product_circle_image_h', 4096) !!}

  </div>
</div>
<div class="form-group">
  {!! Form::label('product_specs', 'Specs', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-10">
    {!! Form::textarea('product_specs', old('product_specs',$product->product_specs), array('class'=>'form-control ckeditor')) !!}

  </div>
</div>
<div class="form-group">

  {!! Form::label('product_gallery', 'Product Gallery', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-10">
    {!! Form::file('product_gallery[]', [
    'multiple',
    'class' => 'form-control file-upload',
    'data-url' => route('admin.media.upload'),
    'data-bucket' => 'product_gallery',
    'data-filekey' => 'product_gallery',
    ]) !!}
    <div class="photo-block">
      <div class="progress-bar form-group">&nbsp;</div>
      <div class="files-list">
        @foreach($product->getMedia('product_gallery') as $media)
        <p class="form-group">
          <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->name }} ({{ $media->size }} KB)</a>
          <a href="#" class="btn btn-xs btn-danger remove-file">Remove</a>
          <input type="hidden" name="product_gallery_id[]" value="{{ $media->id }}">
        </p>
        @endforeach
      </div>
    </div>
    @if($errors->has('product_gallery'))
    <p class="help-block">
      {{ $errors->first('product_gallery') }}
    </p>
    @endif
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    Product Blocks
  </div>
  <div class="panel-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Class</th>
          <th>Title</th>
          <th>Text</th>
          <th>Image</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="productblocks">
        @forelse(old('productblocks', []) as $index => $data)
        @include('admin.product.productblocks_row', [
        'index' => $index
        ])
        @empty
        @foreach($product->productblocks as $item)
        @include('admin.product.productblocks_row', [
        'index' => 'id-' . $item->id,
        'field' => $item
        ])
        @endforeach
        @endforelse
      </tbody>
    </table>
    <a href="#" class="btn btn-success pull-right add-new">Add New</a>
  </div>
</div>
<div class="form-group">
  <div class="col-sm-10 col-sm-offset-2">
    {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
    {!! link_to_route(config('quickadmin.route').'.product.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
  </div>
</div>

{!! Form::close() !!}

@stop

@section('javascript')
@parent

<script src="{{ asset('quickadmin/plugins/fileUpload/js/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('quickadmin/plugins/fileUpload/js/jquery.fileupload.js') }}"></script>
<script>
$(function () {
  $('.file-upload').each(function () {
    var $this = $(this);
    var $parent = $(this).parent();
    $(this).fileupload({
      dataType: 'json',
      formData: {
        model_name: 'Product',
        bucket: $this.data('bucket'),
        file_key: $this.data('filekey'),
        _token: '{{ csrf_token() }}'
      },
      add: function (e, data) {
        data.submit();
      },
      done: function (e, data) {
        $.each(data.result.files, function (index, file) {
          var $line = $($('<p/>', {class: "form-group"}).html(file.name + ' (' + file.size + ' bytes)').appendTo($parent.find('.files-list')));
          $line.append('<a href="#" class="btn btn-xs btn-danger remove-file">Remove</a>');
          $line.append('<input type="hidden" name="' + $this.data('bucket') + '_id[]" value="' + file.id + '"/>');
          if ($parent.find('.' + $this.data('bucket') + '-ids').val() != '') {
            $parent.find('.' + $this.data('bucket') + '-ids').val($parent.find('.' + $this.data('bucket') + '-ids').val() + ',');
          }
          $parent.find('.' + $this.data('bucket') + '-ids').val($parent.find('.' + $this.data('bucket') + '-ids').val() + file.id);
        });
        $parent.find('.progress-bar').hide().css(
          'width',
          '0%'
        );
      }
    }).on('fileuploadprogressall', function (e, data) {
      var progress = parseInt(data.loaded / data.total * 100, 10);
      $parent.find('.progress-bar').show().css(
        'width',
        progress + '%'
      );
    });
  });
  $(document).on('click', '.remove-file', function () {
    var $parent = $(this).parent();
    $parent.remove();
    return false;
  });
});
</script>

<script type="text/html" id="productblocks-template">
  @include('admin.product.productblocks_row',
  [
  'index' => '_INDEX_',
  ])
</script >

<script>
$('.add-new').click(function () {
  var tableBody = $(this).parent().find('tbody');
  var template = $('#' + tableBody.attr('id') + '-template').html();
  var lastIndex = parseInt(tableBody.find('tr').last().data('index'));
  if (isNaN(lastIndex)) {
    lastIndex = 0;
  }
  tableBody.append(template.replace(/_INDEX_/g, lastIndex + 1));
  return false;
});
$(document).on('click', '.remove', function () {
  var row = $(this).parentsUntil('tr').parent();
  row.remove();
  return false;
});
</script>
@stop
