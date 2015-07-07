
@extends('base')

@section('body')

<h3>Deal</h3>
<table  cellpadding="10" border="1">
<tr><td colspan="2" align="right"><a href="{{ action('CouponController@index') }}">Back</a></td></tr>

@if (isset($deal))
<?php echo Form::open(array('action' => 'DealController@handleEdit')); ?>
<?php echo Form::hidden('id', $deal->id); ?>
@else
<?php echo Form::open(array('action' => 'DealController@handleCreate')); ?>
@endif
<?php echo Form::token(); ?>

<tr><td> <?php echo Form::label('product_id', 'Product Id'); ?> </td>
	<td><?php echo Form::text('product_id', (isset($deal)) ? $deal->product_id : '' ); ?></td></tr>
<tr><td><?php echo Form::label('deal_number', 'Deal Number'); ?></td>
	<td><?php echo Form::text('deal_number', (isset($deal)) ? $deal->deal_number : '' ); ?></td></tr>
<tr><td><?php echo Form::label('deal_price', 'Deal Price'); ?></td>
	<td><?php echo Form::text('deal_price', (isset($deal)) ? $deal->deal_price : '' ); ?></td></tr>

<tr><td colspan="2" align="right">
	@if (isset($deal))
		<?php echo Form::submit('Edit'); ?>
	@else
		<?php echo Form::submit('Add'); ?>
	@endif
</td></tr>
<?php echo Form::close(); ?>

</table>

@stop