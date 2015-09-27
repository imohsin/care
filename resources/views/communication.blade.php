
@extends('base')

@section('title', 'Communication')

@section('body')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
  @foreach ($errors->all() as $message)
    {{$message}}<br />
  @endforeach
  </div>
@endif

@if (isset($communication))
	<?php echo Form::open(array('action' => 'CommunicationController@handleEdit','class'=>'form300')); ?>
	<?php echo Form::hidden('id', $communication->id); ?>
@else
	<?php echo Form::open(array('action' => 'CommunicationController@handleCreate','class'=>'form300')); ?>
@endif

@if(isset($communication))
	<?php echo Form::label('contact_id', 'Contact', array('class' => 'sr-only')); ?>
	<select class="form-control" name="contact_id">
		@foreach($contacts as $contact)
			<?php $selected = ''; ?>
			@if (isset($communication) && ($contact->id === $communication->contact_id))
				<?php $selected="selected=true"; ?>
			@endif
		  <option value="{{$contact->id}}" {{$selected}}>{{$contact->name}} - {{$contact->job_title}}</option>
		@endforeach
	</select>
@else
	<?php echo Form::hidden('contact_id', $con); ?>
@endif

<?php echo Form::label('communication_type_id', 'Communication Type', array('class' => 'sr-only')); ?>
<select class="form-control" name="communication_type_id">
	@foreach($communicationTypes as $communicationType)
		<?php $selected = ''; ?>
		@if (isset($communication) && ($communicationType->id === $communication->communication_type_id))
			<?php $selected="selected=true"; ?>
		@endif
	  <option value="{{$communicationType->id}}" {{$selected}}>{{$communicationType->name}}</option>
	@endforeach
</select>
<?php echo Form::label('value', 'Value', array('class' => 'sr-only')); ?>
<?php echo Form::text('value', (isset($communication)) ? $communication->value : '', ['class' => 'form-control', 'placeholder' => 'Value' ]); ?>

@if (isset($communication))
	<?php echo Form::submit('Edit', array('class' => 'btn btn-sm btn-primary')); ?>
@else
	<?php echo Form::submit('Add', array('class' => 'btn btn-sm btn-primary')); ?>
@endif

@if (isset($communication))
	<a class="btn btn-sm btn-default" href="{{ action('ContactController@edit', $communication->contact_id) }}">Back</a>
@elseif (isset($org))
	<a class="btn btn-sm btn-default" href="{{ action('ContactController@edit', $org) }}">Back</a>
@else
	<a class="btn btn-sm btn-default" href="{{ action('OrganizationController@index') }}">Back</a>
@endif

<?php echo Form::close(); ?>

@stop