
@extends('base')

@section('title', 'Backoffice')

@section('body')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
  @foreach ($errors->all() as $message)
    {{$message}}<br />
  @endforeach
  </div>
@endif

@if (isset($backoffice))
	<?php echo Form::open(array('action' => 'BackofficeController@handleEdit','class'=>'form300')); ?>
	<?php echo Form::hidden('id', $backoffice->id); ?>
@else
	<?php echo Form::open(array('action' => 'BackofficeController@handleCreate','class'=>'form300')); ?>
@endif

@if(isset($backoffice))
	<?php echo Form::label('company_id', 'Company', array('class' => 'sr-only')); ?>
	<select class="form-control" name="company_id">
		@foreach($companies as $company)
			<?php $selected = ''; ?>
			@if (isset($backoffice) && ($company->id === $backoffice->company_id))
				<?php $selected="selected=true"; ?>
			@endif
		  <option value="{{$company->id}}" {{$selected}}>{{$company->name}}</option>
		@endforeach
	</select>
@else
	<?php echo Form::hidden('company_id', $co); ?>
@endif

<?php echo Form::label('url', 'Url', array('class' => 'sr-only')); ?>
<?php echo Form::text('url', (isset($backoffice)) ? $backoffice->url : '' , array('class' => 'form-control', 'placeholder' => 'URL' )); ?>
<?php echo Form::label('username', 'Username', array('class' => 'sr-only')); ?>
<?php echo Form::text('username', (isset($backoffice)) ? $backoffice->username : '', array('class' => 'form-control', 'placeholder' => 'Username' ) ); ?>
<?php echo Form::label('password', 'Password', array('class' => 'sr-only')); ?>
<?php echo Form::password('password', ['class' => 'form-control'], array('class' => 'form-control', 'placeholder' => 'Password' )); ?>

@if (isset($backoffice))
	<?php echo Form::submit('Edit', array('class' => 'btn btn-sm btn-primary')); ?>
@else
	<?php echo Form::submit('Add', array('class' => 'btn btn-sm btn-primary')); ?>
@endif

@if (isset($backoffice))
	<a class="btn btn-sm btn-default" href="{{ action('CompanyController@edit', $backoffice->company_id) }}">Back</a>
@elseif (isset($co))
	<a class="btn btn-sm btn-default" href="{{ action('CompanyController@edit', $co) }}">Back</a>
@else
	<a class="btn btn-sm btn-default" href="{{ action('OrganizationController@index') }}">Back</a>
@endif

<?php echo Form::close(); ?>

@stop