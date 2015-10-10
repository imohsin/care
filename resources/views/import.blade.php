
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

@if (isset($imports))
	<div class="table-responsive">
	  <table class="table table-striped">
		<thead>
			<tr>
			@foreach($columns as $column)
				<th>{{$column}}</th>
			@endforeach
			</tr>
		</thead>
		<tbody>
			@foreach($imports as $imp)
			<tr>
				@foreach($columns as $column)
					<td>{{$imp->$column}}</td>
				@endforeach
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
@else

	<div class="panel panel-default">
	  <div class="panel-heading">Import Paypal</div>
	  <div class="panel-body">
		<?php echo Form::open(array('action' => 'ImportController@handleCreate','class'=>'form300', 'files' => true)); ?>
		<?php echo Form::label('account_number', 'Account Number', array('class' => 'sr-only')); ?>
		<?php echo Form::text('account_number', null, array('class' => 'form-control', 'placeholder' => 'Account Number' )); ?>
		<?php echo Form::label('import_file', 'File', array('class' => 'sr-only')); ?>
		<?php echo Form::file('import_file', null, array('class' => 'form-control', 'placeholder' => 'File' ) ); ?>
		<?php echo Form::submit('Import', array('class' => 'btn btn-sm btn-primary')); ?>
		<?php echo Form::close(); ?>
	  </div>
	</div>
	<div class="panel panel-default">
	  <div class="panel-heading">Import Barclays</div>
	  <div class="panel-body">
		<?php echo Form::open(array('action' => 'ImportController@handleCreate','class'=>'form300', 'files' => true)); ?>
		<?php echo Form::label('import_file', 'File', array('class' => 'sr-only')); ?>
		<?php echo Form::file('import_file', null, array('class' => 'form-control', 'placeholder' => 'File' ) ); ?>
		<?php echo Form::submit('Import', array('class' => 'btn btn-sm btn-primary')); ?>
		<?php echo Form::close(); ?>
	  </div>
   </div>

@endif

@stop