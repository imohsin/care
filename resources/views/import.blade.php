
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
	<h2>Payment Providers</h2>
	<div class="row">
		<div class="col-sm-4 col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">Barclays</div>
				<div class="panel-body">
					<?php echo Form::open(array('action' => 'ImportController@handleCreateBarclays','class'=>'form300', 'files' => true)); ?>
					<?php echo Form::select('organization_id', $organizations, null, array('class' => 'form-control', 'placeholder' => '- Select Organization -' )); ?>
					<?php echo Form::select('barclays_account_id', $barclays_accounts, null, array('class' => 'form-control', 'placeholder' => '- Select Barclays account -' )); ?>
					<?php echo Form::label('import_file', 'File', array('class' => 'sr-only')); ?>
					<?php echo Form::file('import_file', null, array('class' => 'form-control', 'placeholder' => 'File' ) ); ?>
					<?php echo Form::submit('Import', array('class' => 'btn btn-sm btn-primary')); ?>
					<?php echo Form::close(); ?>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">Paypal</div>
				<div class="panel-body">
					<?php echo Form::open(array('action' => 'ImportController@handleCreatePaypal','class'=>'form300', 'files' => true)); ?>
					<?php echo Form::select('organization_id', $organizations, null, array('class' => 'form-control', 'placeholder' => '- Select Organization -' )); ?>
					<?php echo Form::select('bank_id', $paypal_accounts, null, array('class' => 'form-control', 'placeholder' => '- Select PayPal Account -' )); ?>
					<?php echo Form::label('import_file', 'File', array('class' => 'sr-only')); ?>
					<?php echo Form::file('import_file', null, array('class' => 'form-control', 'placeholder' => 'File' ) ); ?>
					<?php echo Form::submit('Import', array('class' => 'btn btn-sm btn-primary')); ?>
					<?php echo Form::close(); ?>
				</div>
			</div>
		</div>
	</div>
	<h2>Deal Providers</h2>
	<div class="row">
		<div class="col-sm-4 col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">Deal Providers</div>
				<div class="panel-body">
					<?php echo Form::open(array('action' => 'ImportController@handleCreateDealProvider','class'=>'form300', 'files' => true)); ?>
					<?php echo Form::select('organization_id', $organizations, null, array('class' => 'form-control', 'placeholder' => '- Select Organization -' )); ?>
					<?php echo Form::select('deal_provider_id', $deal_providers, null, array('class' => 'form-control', 'placeholder' => '- Select Deal Provider -' )); ?>
					<?php echo Form::label('import_file', 'File', array('class' => 'sr-only')); ?>
					<?php echo Form::file('import_file', null, array('class' => 'form-control', 'placeholder' => 'File' ) ); ?>
					<?php echo Form::submit('Import', array('class' => 'btn btn-sm btn-primary')); ?>
					<?php echo Form::close(); ?>
				</div>
			</div>
		</div>
	</div>
	<h2>Deliveries</h2>
	<div class="row">
		<div class="col-sm-4 col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">Deliveries</div>
				<div class="panel-body">
					<?php echo Form::open(array('action' => 'ImportController@handleCreateDelivery','class'=>'form300', 'files' => true)); ?>
					<?php echo Form::select('organization_id', $organizations, null, array('class' => 'form-control', 'placeholder' => '- Select Organization -' )); ?>
					<?php echo Form::select('shop_id', $shops, null, array('class' => 'form-control', 'placeholder' => '- Select Shop -' )); ?>
					<?php echo Form::select('deal_provider_id', $deal_providers, null, array('class' => 'form-control', 'placeholder' => '- Select Deal Provider -' )); ?>
					<?php echo Form::label('import_file', 'File', array('class' => 'sr-only')); ?>
					<?php echo Form::file('import_file', null, array('class' => 'form-control', 'placeholder' => 'File' ) ); ?>
					<?php echo Form::submit('Import', array('class' => 'btn btn-sm btn-primary')); ?>
					<?php echo Form::close(); ?>
				</div>
			</div>
		</div>
	</div>
@endif

@stop