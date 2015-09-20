
@extends('base')

@section('body')

<h2>Open Cart Info</h2>
@if (isset($opencart))
	<a href="{{ action('OrganizationController@edit', $opencart->organization_id) }}">Back</a>
@elseif (isset($org))
	<a href="{{ action('OrganizationController@edit', $org) }}">Back</a>
@else
	<a href="{{ action('OrganizationController@index') }}">Back</a>
@endif
<div class="table-responsive">
	<table class="table table-striped">
		<tbody>

		@if (isset($opencart))
			<?php echo Form::open(array('action' => 'OpencartInfoController@handleEdit')); ?>
			<?php echo Form::hidden('id', $opencart->id); ?>
		@else
			<?php echo Form::open(array('action' => 'OpencartInfoController@handleCreate')); ?>
		@endif
			<?php echo Form::token(); ?>

			@if(isset($opencart))
			<tr>
				<td><?php echo Form::label('organization_id', 'Organization'); ?> </td>
				<td>
				  <select class="form-control" name="organization_id">
					@foreach($orgs as $org)
						<?php $selected = ''; ?>
						@if (isset($opencart) && ($org->id === $opencart->organization_id))
							<?php $selected="selected=true"; ?>
						@endif
					  <option value="{{$org->id}}" {{$selected}}>{{$org->long_name}}</option>
					@endforeach
				  </select>
				</td>
			</tr>
   		    @else
				<?php echo Form::hidden('organization_id', $org); ?>
			@endif
			<tr>
				<td><?php echo Form::label('driver', 'Driver'); ?></td>
				<td><?php echo Form::text('driver', (isset($opencart)) ? $opencart->driver : '' ); ?></td>
			</tr>
			<tr>
				<td><?php echo Form::label('host', 'Host'); ?></td>
				<td><?php echo Form::text('host', (isset($opencart)) ? $opencart->host : '' ); ?></td>
			</tr>
			<tr>
				<td><?php echo Form::label('username', 'Username'); ?></td>
				<td><?php echo Form::text('username', (isset($opencart)) ? $opencart->username : '' ); ?></td>
			</tr>
			<tr>
				<td><?php echo Form::label('password', 'Password'); ?></td>
				<td><?php echo Form::password('password', ['class' => 'form-control']); ?></td>
			</tr>
			<tr>
				<td><?php echo Form::label('database', 'Database'); ?></td>
				<td><?php echo Form::text('database', (isset($opencart)) ? $opencart->database : '' ); ?></td>
			</tr>
			<tr>
				<td><?php echo Form::label('prefix', 'Prefix'); ?></td>
				<td><?php echo Form::text('prefix', (isset($opencart)) ? $opencart->prefix : '' ); ?></td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					@if (isset($opencart))
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