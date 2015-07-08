
@extends('base')

@section('body')

<h3>Redemption</h3>
<table  cellpadding="10" border="1">
<tr><td colspan="2" align="right"><a href="{{ action('CouponController@index') }}">Back</a></td></tr>

@if (isset($redemption))
<?php echo Form::open(array('action' => 'RedemptionController@handleEdit')); ?>
<?php echo Form::hidden('id', $redemption->id); ?>
@else
<?php echo Form::open(array('action' => 'RedemptionController@handleCreate')); ?>
@endif
<?php echo Form::token(); ?>

<tr><td> <?php echo Form::label('deal_provider_id', 'Deal Provider Id'); ?> </td>
	<td><?php echo Form::text('deal_provider_id', (isset($redemption)) ? $redemption->deal_provider_id : '' ); ?></td></tr>
<tr><td><?php echo Form::label('shop_id', 'Shop Id'); ?></td>
	<td><?php echo Form::text('shop_id', (isset($redemption)) ? $redemption->shop_id : '' ); ?></td></tr>
<tr><td><?php echo Form::label('payment_made', 'Payment Made'); ?></td>
	<td><?php echo Form::checkbox('payment_made', '1', (isset($redemption)) ? $redemption->payment_made : '0' ); ?></td></tr>
<tr><td><?php echo Form::label('payment_amount', 'Payment Amount'); ?></td>
	<td><?php echo Form::date('payment_amount', (isset($redemption)) ? $redemption->payment_amount : '' ); ?></td></tr>
<tr><td><?php echo Form::label('payment_date', 'Payment Date'); ?></td>
	<td><?php echo Form::date('payment_date', (isset($redemption)) ? $redemption->payment_date : '' ); ?></td></tr>
<tr><td><?php echo Form::label('payment_account_id', 'Payment Account Id'); ?></td>
	<td><?php echo Form::text('payment_account_id', (isset($redemption)) ? $redemption->payment_account_id : '' ); ?></td></tr>
<tr><td><?php echo Form::label('payment_verified_by_id', 'Payment Verified by Id'); ?></td>
	<td><?php echo Form::text('payment_verified_by_id', (isset($redemption)) ? $redemption->payment_verified_by_id : '' ); ?></td></tr>
<tr><td><?php echo Form::label('report_csv_file', 'Report Csv File'); ?></td>
	<td><?php echo Form::text('report_csv_file', (isset($redemption)) ? $redemption->report_csv_file : '' ); ?></td></tr>
<tr><td><?php echo Form::label('redemption_date', 'Redemption Date'); ?></td>
	<td><?php echo Form::date('redemption_date', (isset($redemption)) ? $redemption->redemption_date : '' ); ?></td></tr>

<tr><td colspan="2" align="right">
	@if (isset($redemption))
		<?php echo Form::submit('Edit'); ?>
	@else
		<?php echo Form::submit('Add'); ?>
	@endif
</td></tr>
<?php echo Form::close(); ?>

</table>

@stop