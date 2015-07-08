
@extends('base')

@section('body')

<h3>Coupon</h3>
<table  cellpadding="10" border="1">
<tr><td colspan="2" align="right"><a href="{{ action('CouponController@index') }}">Back</a></td></tr>

@if (isset($coupon))
<?php echo Form::open(array('action' => 'CouponController@handleEdit')); ?>
<?php echo Form::hidden('id', $coupon->campaign_id); ?>
<?php echo Form::hidden('code', $coupon->coupon_code); ?>
@else
<?php echo Form::open(array('action' => 'CouponController@handleCreate')); ?>
@endif
<?php echo Form::token(); ?>

<tr><td> <?php echo Form::label('campaign_id', 'Campaign Id'); ?> </td>
	<td><?php echo Form::text('campaign_id', (isset($coupon)) ? $coupon->campaign_id : '' ); ?></td></tr>
<tr><td><?php echo Form::label('coupon_code', 'Coupon Code'); ?></td>
	<td><?php echo Form::text('coupon_code', (isset($coupon)) ? $coupon->coupon_code : '' ); ?></td></tr>
<tr><td><?php echo Form::label('value', 'Value'); ?></td>
	<td><?php echo Form::text('value', (isset($coupon)) ? $coupon->value : '' ); ?></td></tr>
<tr><td><?php echo Form::label('is_percentage', 'Is Percentage'); ?></td>
	<td><?php echo Form::checkbox('is_percentage', '1', (isset($coupon)) ? $coupon->is_percentage : '0' ); ?></td></tr>
<tr><td><?php echo Form::label('use_once', 'Use Once'); ?></td>
	<td><?php echo Form::checkbox('use_once', '1', (isset($coupon)) ? $coupon->use_once : '0' ); ?></td></tr>
<tr><td><?php echo Form::label('is_used', 'Is Used'); ?></td>
	<td><?php echo Form::checkbox('is_used', '1', (isset($coupon)) ? $coupon->is_used : '0' ); ?></td></tr>
<tr><td><?php echo Form::label('active', 'Active'); ?></td>
	<td><?php echo Form::checkbox('active', '1', (isset($coupon)) ? $coupon->active : '0' ); ?></td></tr>
<tr><td><?php echo Form::label('every_product', 'Every Product'); ?></td>
	<td><?php echo Form::checkbox('every_product', '1', (isset($coupon)) ? $coupon->every_product : '0' ); ?></td></tr>
<tr><td><?php echo Form::label('start', 'Start'); ?></td>
	<td><?php echo Form::date('start', (isset($coupon)) ? $coupon->start : '' ); ?></td></tr>
<tr><td><?php echo Form::label('expiry', 'Expiry'); ?></td>
	<td><?php echo Form::date('expiry', (isset($coupon)) ? $coupon->expiry : '' ); ?></td></tr>
<tr><td><?php echo Form::label('condition', 'Condition'); ?></td>
	<td><?php echo Form::text('condition', (isset($coupon)) ? $coupon->condition : '' ); ?></td></tr>
<tr><td><?php echo Form::label('coupon_redeemed', 'Coupon Redeemed'); ?></td>
	<td><?php echo Form::text('coupon_redeemed', (isset($coupon)) ? $coupon->coupon_redeemed : '' ); ?></td></tr>
<tr><td><?php echo Form::label('coupon_date_redeemed', 'Coupon Date Redeemed'); ?></td>
	<td><?php echo Form::date('coupon_date_redeemed', (isset($coupon)) ? $coupon->coupon_date_redeemed : '' ); ?></td></tr>

<tr><td colspan="2" align="right">
	@if (isset($coupon))
		<?php echo Form::submit('Edit'); ?>
	@else
		<?php echo Form::submit('Add'); ?>
	@endif
</td></tr>
<?php echo Form::close(); ?>

</table>

@stop