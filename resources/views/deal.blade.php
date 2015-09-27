
@extends('base')

@section('title', 'Deal')

@section('body')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
  @foreach ($errors->all() as $message)
    {{$message}}<br />
  @endforeach
  </div>
@endif

@if (isset($deal))
  <?php echo Form::open(array('action' => 'DealController@handleEdit','class'=>'form300')); ?>
  <?php echo Form::hidden('id', $deal->id); ?>
@else
  <?php echo Form::open(array('action' => 'DealController@handleCreate','class'=>'form300')); ?>
@endif

<?php echo Form::label('product_id', 'Product Id', array('class' => 'sr-only')); ?>
<?php echo Form::text('product_id', (isset($deal)) ? $deal->product_id : '' , array('class' => 'form-control', 'placeholder' => 'Product' )); ?>
<?php echo Form::label('deal_number', 'Deal Number', array('class' => 'sr-only')); ?>
<?php echo Form::text('deal_number', (isset($deal)) ? $deal->deal_number : '' , array('class' => 'form-control', 'placeholder' => 'Deal Number' )); ?>
<?php echo Form::label('deal_price', 'Deal Price', array('class' => 'sr-only')); ?>
<?php echo Form::text('deal_price', (isset($deal)) ? $deal->deal_price : '' , array('class' => 'form-control', 'placeholder' => 'Deal Price' )); ?>

@if (isset($deal))
	<?php echo Form::submit('Edit', array('class' => 'btn btn-sm btn-primary')); ?>
@else
	<?php echo Form::submit('Add', array('class' => 'btn btn-sm btn-primary')); ?>
@endif

<a class="btn btn-sm btn-default" href="{{ action('CouponController@index') }}">Back</a>

<?php echo Form::close(); ?>

@stop