
@extends('base')

@section('body')

<h3>Deal</h3>
<table  cellpadding="10" border="1">
<tr><td colspan="2" align="right"><a href="{{ action('CouponController@index') }}">Back</a></td></tr>

@if (isset($campaign))
<?php echo Form::open(array('action' => 'CampaignController@handleEdit')); ?>
<?php echo Form::hidden('id', $campaign->id); ?>
@else
<?php echo Form::open(array('action' => 'CampaignController@handleCreate')); ?>
@endif
<?php echo Form::token(); ?>

<tr><td> <?php echo Form::label('deal_provider_id', 'Deal Provider Id'); ?> </td>
	<td><?php echo Form::text('deal_provider_id', (isset($campaign)) ? $campaign->deal_provider_id : '' ); ?></td></tr>
<tr><td><?php echo Form::label('shop_id', 'Shop Id'); ?></td>
	<td><?php echo Form::text('shop_id', (isset($campaign)) ? $campaign->shop_id : '' ); ?></td></tr>
<tr><td><?php echo Form::label('campaign_reference', 'Campaign Reference'); ?></td>
	<td><?php echo Form::text('campaign_reference', (isset($campaign)) ? $campaign->campaign_reference : '' ); ?></td></tr>
<tr><td><?php echo Form::label('campaign_start_date', 'Campaign Start Date'); ?></td>
	<td><?php echo Form::date('campaign_start_date', (isset($campaign)) ? $campaign->campaign_start_date : '' ); ?></td></tr>
<tr><td><?php echo Form::label('campaign_end_date', 'Campaign End Date'); ?></td>
	<td><?php echo Form::date('campaign_end_date', (isset($campaign)) ? $campaign->campaign_end_date : '' ); ?></td></tr>
<tr><td><?php echo Form::label('deal_provider_commission', 'Deal Provider Commission'); ?></td>
	<td><?php echo Form::text('deal_provider_commission', (isset($campaign)) ? $campaign->deal_provider_commission : '' ); ?></td></tr>

<tr><td colspan="2" align="right">
	@if (isset($campaign))
		<?php echo Form::submit('Edit'); ?>
	@else
		<?php echo Form::submit('Add'); ?>
	@endif
</td></tr>
<?php echo Form::close(); ?>

</table>

@stop