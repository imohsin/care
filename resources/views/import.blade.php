
@extends('base')

@section('title', 'Imports')

@section('body')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
  @foreach ($errors->all() as $message)
    {{$message}}<br />
  @endforeach
  </div>
@endif

@if (isset($imp))

		display imports here

@else

	<?php echo Form::open(array('action' => 'ImportController@handleCreate','class'=>'form300', 'files' => true)); ?>

	@if(isset($suppliers))
		<?php echo Form::label('name', 'Import Suppliers', array('class' => 'sr-only')); ?>
		<select class="form-control" name="supplier_name">
			<option value=''>- Choose a Supplier -</option>
			@foreach($suppliers as $supplier)
			  <option>{{$supplier->name}}</option>
			@endforeach
		</select>
	@endif

	<?php echo Form::label('import_id', 'Import Id', array('class' => 'sr-only')); ?>
	<?php echo Form::text('import_id', null, array('class' => 'form-control', 'placeholder' => 'Import ID' )); ?>
	<?php echo Form::label('import_file', 'File', array('class' => 'sr-only')); ?>
	<?php echo Form::file('import_file', null, array('class' => 'form-control', 'placeholder' => 'File' ) ); ?>

	<?php echo Form::submit('Add', array('class' => 'btn btn-sm btn-primary')); ?>

	<?php echo Form::close(); ?>

@endif

@stop