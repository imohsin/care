
@extends('base')

@section('body')

<h3>Delivery</h3>
<table  cellpadding="10" border="1">
<tr><td colspan="2" align="right"><a href="{{ action('DeliveryController@index') }}">Back</a></td></tr>

@if (isset($delivery))
<?php echo Form::open(array('action' => 'DeliveryController@handleEdit')); ?>
<?php echo Form::hidden('id', $delivery->id); ?>
@else
<?php echo Form::open(array('action' => 'DeliveryController@handleCreate')); ?>
@endif
<?php echo Form::token(); ?>

<tr><td> <?php echo Form::label('shop_id', 'Shop Id'); ?> </td>
	<td><?php echo Form::text('shop_id', (isset($delivery)) ? $delivery->shop_id : '' ); ?></td></tr>
<tr><td><?php echo Form::label('courier_id', 'Courier Id'); ?></td>
	<td><?php echo Form::text('courier_id', (isset($delivery)) ? $delivery->courier_id : '' ); ?></td></tr>
<tr><td><?php echo Form::label('purchase_id', 'Purchase Id'); ?></td>
	<td><?php echo Form::text('purchase_id', (isset($delivery)) ? $delivery->purchase_id : '' ); ?></td></tr>
<tr><td><?php echo Form::label('tracking_number', 'Tracking Number'); ?></td>
	<td><?php echo Form::date('tracking_number', (isset($delivery)) ? $delivery->tracking_number : '' ); ?></td></tr>
<tr><td><?php echo Form::label('dispatch_date', 'Dispatch Date'); ?></td>
	<td><?php echo Form::date('dispatch_date', (isset($delivery)) ? $delivery->dispatch_date : '' ); ?></td></tr>
<tr><td><?php echo Form::label('customer_name', 'Customer Name'); ?></td>
	<td><?php echo Form::text('customer_name', (isset($delivery)) ? $delivery->customer_name : '' ); ?></td></tr>
<tr><td><?php echo Form::label('delivery_address', 'Delivery Address'); ?></td>
	<td><?php echo Form::text('delivery_address', (isset($delivery)) ? $delivery->delivery_address : '' ); ?></td></tr>
<tr><td><?php echo Form::label('contact_number', 'Contact Number'); ?></td>
	<td><?php echo Form::text('contact_number', (isset($delivery)) ? $delivery->contact_number : '' ); ?></td></tr>
<tr><td><?php echo Form::label('delivery_notes', 'Delivery Notes'); ?></td>
	<td><?php echo Form::text('delivery_notes', (isset($delivery)) ? $delivery->delivery_notes : '' ); ?></td></tr>

<tr><td colspan="2" align="right">
	@if (isset($delivery))
		<?php echo Form::submit('Edit'); ?>
	@else
		<?php echo Form::submit('Add'); ?>
	@endif
</td></tr>
<?php echo Form::close(); ?>

</table>

@stop