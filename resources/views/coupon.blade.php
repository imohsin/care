
@extends('base')

@section('title', 'Coupon')

@section('body')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
  @foreach ($errors->all() as $message)
    {{$message}}<br />
  @endforeach
  </div>
@endif

@if (isset($coupon))
	<?php echo Form::open(array('action' => 'CouponController@handleEdit','class'=>'form300')); ?>
	<?php echo Form::hidden('id', $coupon->campaign_id); ?>
	<?php echo Form::hidden('code', $coupon->coupon_code); ?>
@else
	<?php echo Form::open(array('action' => 'CouponController@handleCreate','class'=>'form300')); ?>
@endif

<?php echo Form::label('campaign_id', 'Campaign Id', array('class' => 'sr-only')); ?>
<?php echo Form::text('campaign_id', (isset($coupon)) ? $coupon->campaign_id : '' , array('class' => 'form-control', 'placeholder' => 'Campaign' )); ?>
<?php echo Form::label('coupon_code', 'Coupon Code', array('class' => 'sr-only')); ?>
<?php echo Form::text('coupon_code', (isset($coupon)) ? $coupon->coupon_code : '' , array('class' => 'form-control', 'placeholder' => 'Coupon Code' )); ?>
<?php echo Form::label('value', 'Value', array('class' => 'sr-only')); ?>
<?php echo Form::text('value', (isset($coupon)) ? $coupon->value : '' , array('class' => 'form-control', 'placeholder' => 'Value' )); ?>
<?php echo Form::label('is_percentage', 'Is Percentage', array('class' => 'sr-only')); ?>
<?php echo Form::checkbox('is_percentage', '1', (isset($coupon)) ? $coupon->is_percentage : '0' , array('class' => 'form-control', 'placeholder' => 'Is Percentage?' )); ?>
<?php echo Form::label('use_once', 'Use Once', array('class' => 'sr-only')); ?>
<?php echo Form::checkbox('use_once', '1', (isset($coupon)) ? $coupon->use_once : '0' , array('class' => 'form-control', 'placeholder' => 'Use Once?' )); ?>
<?php echo Form::label('is_used', 'Is Used', array('class' => 'sr-only')); ?>
<?php echo Form::checkbox('is_used', '1', (isset($coupon)) ? $coupon->is_used : '0' , array('class' => 'form-control', 'placeholder' => 'Is Used?' )); ?>
<?php echo Form::label('active', 'Active', array('class' => 'sr-only')); ?>
<?php echo Form::checkbox('active', '1', (isset($coupon)) ? $coupon->active : '0' , array('class' => 'form-control', 'placeholder' => 'Active?' )); ?>
<?php echo Form::label('every_product', 'Every Product', array('class' => 'sr-only')); ?>
<?php echo Form::checkbox('every_product', '1', (isset($coupon)) ? $coupon->every_product : '0' , array('class' => 'form-control', 'placeholder' => 'Every Product?' )); ?>
<?php echo Form::label('start', 'Start', array('class' => 'sr-only')); ?>
<?php echo Form::date('start', (isset($coupon)) ? $coupon->start : '' , array('class' => 'form-control', 'placeholder' => 'Start' )); ?>
<?php echo Form::label('expiry', 'Expiry', array('class' => 'sr-only')); ?>
<?php echo Form::date('expiry', (isset($coupon)) ? $coupon->expiry : '' , array('class' => 'form-control', 'placeholder' => 'Expiry' )); ?>
<?php echo Form::label('condition', 'Condition', array('class' => 'sr-only')); ?>
<?php echo Form::text('condition', (isset($coupon)) ? $coupon->condition : '' , array('class' => 'form-control', 'placeholder' => 'Condition' )); ?>
<?php echo Form::label('coupon_redeemed', 'Coupon Redeemed', array('class' => 'sr-only')); ?>
<?php echo Form::text('coupon_redeemed', (isset($coupon)) ? $coupon->coupon_redeemed : '' , array('class' => 'form-control', 'placeholder' => 'Coupon Redeemed' )); ?>
<?php echo Form::label('coupon_date_redeemed', 'Coupon Date Redeemed', array('class' => 'sr-only')); ?>
<?php echo Form::date('coupon_date_redeemed', (isset($coupon)) ? $coupon->coupon_date_redeemed : '' , array('class' => 'form-control', 'placeholder' => 'Date Redeemed' )); ?>

@if (isset($coupon))
	<?php echo Form::submit('Edit', array('class' => 'btn btn-sm btn-primary')); ?>
@else
	<?php echo Form::submit('Add', array('class' => 'btn btn-sm btn-primary')); ?>
@endif
		
<a class="btn btn-sm btn-default" href="{{ action('CouponController@index') }}">Back</a>

<?php echo Form::close(); ?>

@stop