
@extends('base')

@section('title', 'Delivery')

@section('body')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
  @foreach ($errors->all() as $message)
    {{$message}}<br />
  @endforeach
  </div>
@endif

@if (isset($delivery))
	<?php echo Form::open(array('action' => 'DeliveryController@handleEdit','class'=>'form300')); ?>
	<?php echo Form::hidden('id', $delivery->id); ?>
@else
	<?php echo Form::open(array('action' => 'DeliveryController@handleCreate','class'=>'form300')); ?>
@endif

<?php echo Form::label('shop_id', 'Shop Id', array('class' => 'sr-only')); ?>
<?php echo Form::text('shop_id', (isset($delivery)) ? $delivery->shop_id : '' , array('class' => 'form-control', 'placeholder' => 'Shop' )); ?>
<?php echo Form::label('courier_id', 'Courier Id', array('class' => 'sr-only')); ?>
<?php echo Form::text('courier_id', (isset($delivery)) ? $delivery->courier_id : '' , array('class' => 'form-control', 'placeholder' => 'Courier' )); ?>
<?php echo Form::label('purchase_id', 'Purchase Id', array('class' => 'sr-only')); ?>
<?php echo Form::text('purchase_id', (isset($delivery)) ? $delivery->purchase_id : '' , array('class' => 'form-control', 'placeholder' => 'Purchase ID' )); ?>
<?php echo Form::label('tracking_number', 'Tracking Number', array('class' => 'sr-only')); ?>
<?php echo Form::date('tracking_number', (isset($delivery)) ? $delivery->tracking_number : '' , array('class' => 'form-control', 'placeholder' => 'Tracking Number' )); ?>
<?php echo Form::label('dispatch_date', 'Dispatch Date', array('class' => 'sr-only')); ?>
<?php echo Form::date('dispatch_date', (isset($delivery)) ? $delivery->dispatch_date : '' , array('class' => 'form-control', 'placeholder' => 'Dispatch Date' )); ?>
<?php echo Form::label('customer_name', 'Customer Name', array('class' => 'sr-only')); ?>
<?php echo Form::text('customer_name', (isset($delivery)) ? $delivery->customer_name : '' , array('class' => 'form-control', 'placeholder' => 'Customer Name' )); ?>
<?php echo Form::label('delivery_address', 'Delivery Address', array('class' => 'sr-only')); ?>
<?php echo Form::text('delivery_address', (isset($delivery)) ? $delivery->delivery_address : '' , array('class' => 'form-control', 'placeholder' => 'Delivery Address' )); ?>
<?php echo Form::label('contact_number', 'Contact Number', array('class' => 'sr-only')); ?>
<?php echo Form::text('contact_number', (isset($delivery)) ? $delivery->contact_number : '' , array('class' => 'form-control', 'placeholder' => 'Contact Number' )); ?>
<?php echo Form::label('delivery_notes', 'Delivery Notes', array('class' => 'sr-only')); ?>
<?php echo Form::text('delivery_notes', (isset($delivery)) ? $delivery->delivery_notes : '' , array('class' => 'form-control', 'placeholder' => 'Delivery Notes' )); ?>

@if (isset($delivery))
	<?php echo Form::submit('Edit', array('class' => 'btn btn-sm btn-primary')); ?>
@else
	<?php echo Form::submit('Add', array('class' => 'btn btn-sm btn-primary')); ?>
@endif

<a class="btn btn-sm btn-default" href="{{ action('DeliveryController@index') }}">Back</a>

<?php echo Form::close(); ?>

@stop