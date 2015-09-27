
@extends('base')

@section('title', 'Campaign')

@section('body')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
  @foreach ($errors->all() as $message)
    {{$message}}<br />
  @endforeach
  </div>
@endif

@if (isset($campaign))
	<?php echo Form::open(array('action' => 'CampaignController@handleEdit','class'=>'form300')); ?>
	<?php echo Form::hidden('id', $campaign->id); ?>
@else
	<?php echo Form::open(array('action' => 'CampaignController@handleCreate','class'=>'form300')); ?>
@endif

<?php echo Form::label('deal_provider_id', 'Deal Provider Id', array('class' => 'sr-only')); ?>
<?php echo Form::text('deal_provider_id', (isset($campaign)) ? $campaign->deal_provider_id : '', array('class' => 'form-control', 'placeholder' => 'Deal Provider' )); ?>
<?php echo Form::label('shop_id', 'Shop Id', array('class' => 'sr-only')); ?>
<?php echo Form::text('shop_id', (isset($campaign)) ? $campaign->shop_id : '' , array('class' => 'form-control', 'placeholder' => 'Shop' )); ?>
<?php echo Form::label('campaign_reference', 'Campaign Reference', array('class' => 'sr-only')); ?>
<?php echo Form::text('campaign_reference', (isset($campaign)) ? $campaign->campaign_reference : '' , array('class' => 'form-control', 'placeholder' => 'Campaign Reference' )); ?>
<?php echo Form::label('campaign_start_date', 'Campaign Start Date', array('class' => 'sr-only')); ?>
<?php echo Form::date('campaign_start_date', (isset($campaign)) ? $campaign->campaign_start_date : '' , array('class' => 'form-control', 'placeholder' => 'Start Date' )); ?>
<?php echo Form::label('campaign_end_date', 'Campaign End Date', array('class' => 'sr-only')); ?>
<?php echo Form::date('campaign_end_date', (isset($campaign)) ? $campaign->campaign_end_date : '' , array('class' => 'form-control', 'placeholder' => 'End Date' )); ?>
<?php echo Form::label('deal_provider_commission', 'Deal Provider Commission', array('class' => 'sr-only')); ?>
<?php echo Form::text('deal_provider_commission', (isset($campaign)) ? $campaign->deal_provider_commission : '' , array('class' => 'form-control', 'placeholder' => 'Commission' )); ?>

@if (isset($campaign))
	<?php echo Form::submit('Edit', array('class' => 'btn btn-sm btn-primary')); ?>
@else
	<?php echo Form::submit('Add', array('class' => 'btn btn-sm btn-primary')); ?>
@endif

<a class="btn btn-sm btn-default" href="{{ action('CouponController@index') }}">Back</a>

<?php echo Form::close(); ?>

@stop