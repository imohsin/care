
@extends('base')

@section('body')

<h3>Deal</h3>
<table  cellpadding="10" border="1">

<?php echo Form::open(array('action' => 'DealController@handleCreate')); ?>
<?php echo Form::token(); ?>

<tr><td> <?php echo Form::label('product_id', 'Product Id'); ?> </td>
	<td><?php echo Form::text('product_id'); ?></td></tr>
<tr><td><?php echo Form::label('deal_number', 'Deal Number'); ?></td>
	<td><?php echo Form::text('product_id'); ?></td></tr>
<tr><td><?php echo Form::label('deal_price', 'Deal Price'); ?></td>
	<td><?php echo Form::text('deal_price'); ?></td></tr>

<tr><td colspan="2" align="right"><?php echo Form::submit('Add'); ?></td></tr>
<?php echo Form::close(); ?>

</table>

@stop