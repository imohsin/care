
@extends('base')

@section('body')

<h2>Communication</h2>
@if (isset($communication))
	<a href="{{ action('ContactController@edit', $communication->contact_id) }}">Back</a>
@elseif (isset($org))
	<a href="{{ action('ContactController@edit', $org) }}">Back</a>
@else
	<a href="{{ action('OrganizationController@index') }}">Back</a>
@endif
<div class="table-responsive">
	<table class="table table-striped">
		<tbody>

		@if (isset($communication))
			<?php echo Form::open(array('action' => 'CommunicationController@handleEdit')); ?>
			<?php echo Form::hidden('id', $communication->id); ?>
		@else
			<?php echo Form::open(array('action' => 'CommunicationController@handleCreate')); ?>
		@endif
			<?php echo Form::token(); ?>

			@if(isset($communication))
			<tr>
				<td><?php echo Form::label('contact_id', 'Contact'); ?> </td>
				<td>
				  <select class="form-control" name="contact_id">
					@foreach($contacts as $contact)
						<?php $selected = ''; ?>
						@if (isset($communication) && ($contact->id === $communication->contact_id))
							<?php $selected="selected=true"; ?>
						@endif
					  <option value="{{$contact->id}}" {{$selected}}>{{$contact->name}} - {{$contact->job_title}}</option>
					@endforeach
				  </select>
				</td>
			</tr>
   		    @else
				<?php echo Form::hidden('contact_id', $con); ?>
			@endif
			<tr>
				<td><?php echo Form::label('communication_type_id', 'Communication Type'); ?> </td>
				<td>
				  <select class="form-control" name="communication_type_id">
					@foreach($communicationTypes as $communicationType)
						<?php $selected = ''; ?>
						@if (isset($communication) && ($communicationType->id === $communication->communication_type_id))
							<?php $selected="selected=true"; ?>
						@endif
					  <option value="{{$communicationType->id}}" {{$selected}}>{{$communicationType->name}}</option>
					@endforeach
				  </select>
				</td>
			</tr>
			<tr>
				<td><?php echo Form::label('value', 'Value'); ?></td>
				<td><?php echo Form::text('value', (isset($communication)) ? $communication->value : '', ['class' => 'form-control']); ?></td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					@if (isset($communication))
						<?php echo Form::submit('Edit'); ?>
					@else
						<?php echo Form::submit('Add'); ?>
					@endif
				</td>
			</tr>

		<?php echo Form::close(); ?>

		</tbody>
	</table>
</div>

@stop