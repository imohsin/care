
@extends('base')

@section('title', 'SMTP Info')

@section('body')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
  @foreach ($errors->all() as $message)
    {{$message}}<br />
  @endforeach
  </div>
@endif

@if (isset($smtpinfo))
	<?php echo Form::open(array('action' => 'SmtpInfoController@handleEdit','class'=>'form300')); ?>
	<?php echo Form::hidden('id', $smtpinfo->id); ?>
@else
	<?php echo Form::open(array('action' => 'SmtpInfoController@handleCreate','class'=>'form300')); ?>
@endif

@if(isset($smtpinfo))
	<?php echo Form::label('organization_id', 'Organization', array('class' => 'sr-only')); ?>
  <select class="form-control" name="organization_id">
		@foreach($orgs as $org)
			<?php $selected = ''; ?>
			@if (isset($smtpinfo) && ($org->id === $smtpinfo->organization_id))
				<?php $selected="selected=true"; ?>
			@endif
			<option value="{{$org->id}}" {{$selected}}>{{$org->long_name}}</option>
		@endforeach
	</select>
@else
	<?php echo Form::hidden('organization_id', $org); ?>
@endif

<?php echo Form::label('host', 'Host', array('class' => 'sr-only')); ?>
<?php echo Form::text('host', (isset($smtpinfo)) ? $smtpinfo->host : '' , array('class' => 'form-control', 'placeholder' => 'Host' )); ?>
<?php echo Form::label('port', 'Port', array('class' => 'sr-only')); ?>
<?php echo Form::text('port', (isset($smtpinfo)) ? $smtpinfo->port : '' , array('class' => 'form-control', 'placeholder' => 'Port' )); ?>
<?php echo Form::label('username', 'Username', array('class' => 'sr-only')); ?>
<?php echo Form::text('username', (isset($smtpinfo)) ? $smtpinfo->username : '' , array('class' => 'form-control', 'placeholder' => 'Username' )); ?>
<?php echo Form::label('password', 'Password', array('class' => 'sr-only')); ?>
<?php echo Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password' )); ?>

@if (isset($smtpinfo))
	<?php echo Form::submit('Edit', array('class' => 'btn btn-sm btn-primary')); ?>
@else
	<?php echo Form::submit('Add', array('class' => 'btn btn-sm btn-primary')); ?>
@endif

@if (isset($smtpinfo))
	<a class="btn btn-sm btn-default" href="{{ action('OrganizationController@edit', $smtpinfo->organization_id) }}">Back</a>
@elseif (isset($org))
	<a class="btn btn-sm btn-default" href="{{ action('OrganizationController@edit', $org) }}">Back</a>
@else
	<a class="btn btn-sm btn-default" href="{{ action('OrganizationController@index') }}">Back</a>
@endif

<?php echo Form::close(); ?>

@stop