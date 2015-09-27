
@extends('base')

@section('title', 'Redemption')

@section('body')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
  @foreach ($errors->all() as $message)
    {{$message}}<br />
  @endforeach
  </div>
@endif

@if (isset($redemption))
	<?php echo Form::open(array('action' => 'RedemptionController@handleEdit','class'=>'form300')); ?>
	<?php echo Form::hidden('id', $redemption->id); ?>
@else
	<?php echo Form::open(array('action' => 'RedemptionController@handleCreate','class'=>'form300')); ?>
@endif

<?php echo Form::label('deal_provider_id', 'Deal Provider Id', array('class' => 'sr-only')); ?>
<?php echo Form::text('deal_provider_id', (isset($redemption)) ? $redemption->deal_provider_id : '' , array('class' => 'form-control', 'placeholder' => 'Deal Provider' )); ?>
<?php echo Form::label('shop_id', 'Shop Id', array('class' => 'sr-only')); ?>
<?php echo Form::text('shop_id', (isset($redemption)) ? $redemption->shop_id : '' , array('class' => 'form-control', 'placeholder' => 'Shop' )); ?>
<?php echo Form::label('payment_made', 'Payment Made', array('class' => 'sr-only')); ?>
<?php echo Form::checkbox('payment_made', '1', (isset($redemption)) ? $redemption->payment_made : '0' , array('class' => 'form-control', 'placeholder' => 'Payment Made?' )); ?>
<?php echo Form::label('payment_amount', 'Payment Amount', array('class' => 'sr-only')); ?>
<?php echo Form::date('payment_amount', (isset($redemption)) ? $redemption->payment_amount : '' , array('class' => 'form-control', 'placeholder' => 'Payment Amount' )); ?>
<?php echo Form::label('payment_date', 'Payment Date', array('class' => 'sr-only')); ?>
<?php echo Form::date('payment_date', (isset($redemption)) ? $redemption->payment_date : '' , array('class' => 'form-control', 'placeholder' => 'Payment Date' )); ?>
<?php echo Form::label('payment_account_id', 'Payment Account Id', array('class' => 'sr-only')); ?>
<?php echo Form::text('payment_account_id', (isset($redemption)) ? $redemption->payment_account_id : '' , array('class' => 'form-control', 'placeholder' => 'Payment Account ID' )); ?>
<?php echo Form::label('payment_verified_by_id', 'Payment Verified by Id', array('class' => 'sr-only')); ?>
<?php echo Form::text('payment_verified_by_id', (isset($redemption)) ? $redemption->payment_verified_by_id : '' , array('class' => 'form-control', 'placeholder' => 'Payment Verified by ID' )); ?>
<?php echo Form::label('report_csv_file', 'Report Csv File', array('class' => 'sr-only')); ?>
<?php echo Form::text('report_csv_file', (isset($redemption)) ? $redemption->report_csv_file : '' , array('class' => 'form-control', 'placeholder' => 'Report CSV File' )); ?>
<?php echo Form::label('redemption_date', 'Redemption Date', array('class' => 'sr-only')); ?>
<?php echo Form::date('redemption_date', (isset($redemption)) ? $redemption->redemption_date : '' , array('class' => 'form-control', 'placeholder' => 'Redemption Date' )); ?>

@if (isset($redemption))
	<?php echo Form::submit('Edit', array('class' => 'btn btn-sm btn-primary')); ?>
@else
	<?php echo Form::submit('Add', array('class' => 'btn btn-sm btn-primary')); ?>
@endif

<a class="btn btn-sm btn-default" href="{{ action('CouponController@index') }}">Back</a>

<?php echo Form::close(); ?>

@stop