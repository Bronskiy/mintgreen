<tr data-index="{{ $index }}">
  <td>{!! Form::text('productblocks['.$index.'][product_block_class]', old('productblocks['.$index.'][product_block_class]', isset($field) ? $field->product_block_class: ''), ['class' => 'form-control']) !!}</td>
  <td>{!! Form::text('productblocks['.$index.'][product_block_title]', old('productblocks['.$index.'][product_block_title]', isset($field) ? $field->product_block_title: ''), ['class' => 'form-control']) !!}</td>
  <td>{!! Form::textarea('productblocks['.$index.'][product_block_text]', old('productblocks['.$index.'][product_block_text]', isset($field) ? $field->product_block_text: ''), ['class' => 'form-control ckeditor']) !!}</td>
  <td>
    {!! Form::file('productblocks['.$index.'][product_block_image]') !!}
    {{--
    {!! Form::file('productblocks['.$index.'][product_block_image]') !!}
    {!! Form::file('product_image') !!}
    {!! Form::text('product_title', old('product_title'), array('class'=>'form-control', 'id'=>'title')) !!}
    {!! Form::file('productblocks['.$index.'][product_block_image]', old('productblocks['.$index.'][product_block_image]'), ['class' => '']) !!}
    --}}
    {!! Form::hidden('productblocks['.$index.'][product_block_image_w]', 4096) !!}
    {!! Form::hidden('productblocks['.$index.'][product_block_image_h]', 4096) !!}
  </td>
  <td>
    <a href="#" class="remove btn btn-xs btn-danger">Delete</a>
  </td>
</tr>
