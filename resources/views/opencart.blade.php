
@extends('base')

@section('title', 'OpenCart Info')

@section('body')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
  @foreach ($errors->all() as $message)
    {{$message}}<br />
  @endforeach
  </div>
@endif

@if (isset($opencart))
	<?php echo Form::open(array('action' => 'OpencartInfoController@handleEdit','class'=>'form300')); ?>
	<?php echo Form::hidden('id', $opencart->id); ?>
@else
	<?php echo Form::open(array('action' => 'OpencartInfoController@handleCreate','class'=>'form300')); ?>
@endif

@if(isset($opencart))
	<?php echo Form::label('organization_id', 'Organization', array('class' => 'sr-only')); ?>
  <select class="form-control" name="organization_id">
	@foreach($orgs as $org)
		<?php $selected = ''; ?>
		@if (isset($opencart) && ($org->id === $opencart->organization_id))
			<?php $selected="selected=true"; ?>
		@endif
	  <option value="{{$org->id}}" {{$selected}}>{{$org->long_name}}</option>
	@endforeach
  </select>
@else
	<?php echo Form::hidden('organization_id', $org); ?>
@endif

<?php echo Form::label('driver', 'Driver', array('class' => 'sr-only')); ?>
<?php echo Form::text('driver', (isset($opencart)) ? $opencart->driver : '' , array('class' => 'form-control', 'placeholder' => 'Driver' )); ?>
<?php echo Form::label('host', 'Host', array('class' => 'sr-only')); ?>
<?php echo Form::text('host', (isset($opencart)) ? $opencart->host : '' , array('class' => 'form-control', 'placeholder' => 'Host' )); ?>
<?php echo Form::label('username', 'Username', array('class' => 'sr-only')); ?>
<?php echo Form::text('username', (isset($opencart)) ? $opencart->username : '' , array('class' => 'form-control', 'placeholder' => 'Username' )); ?>
<?php echo Form::label('password', 'Password', array('class' => 'sr-only')); ?>
<?php echo Form::password('password', ['class' => 'form-control']); ?>
<?php echo Form::label('database', 'Database', array('class' => 'sr-only')); ?>
<?php echo Form::text('database', (isset($opencart)) ? $opencart->database : '' , array('class' => 'form-control', 'placeholder' => 'Database' )); ?>
<?php echo Form::label('prefix', 'Prefix', array('class' => 'sr-only')); ?>
<?php echo Form::text('prefix', (isset($opencart)) ? $opencart->prefix : '' , array('class' => 'form-control', 'placeholder' => 'Prefix' )); ?>

@if (isset($opencart))
	<?php echo Form::submit('Edit', array('class' => 'btn btn-sm btn-primary')); ?>
@else
	<?php echo Form::submit('Add', array('class' => 'btn btn-sm btn-primary')); ?>
@endif

@if (isset($opencart))
	<a class="btn btn-sm btn-default" href="{{ action('OrganizationController@edit', $opencart->organization_id) }}">Back</a>
@elseif (isset($org))
	<a class="btn btn-sm btn-default" href="{{ action('OrganizationController@edit', $org) }}">Back</a>
@else
	<a class="btn btn-sm btn-default" href="{{ action('OrganizationController@index') }}">Back</a>
@endif

<?php echo Form::close(); ?>

@stop