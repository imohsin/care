
@extends('base')

@section('body')

<h2>Open Cart Info</h2>
@if (isset($smtpinfo))
	<a href="{{ action('OrganizationController@edit', $smtpinfo->organization_id) }}">Back</a>
@elseif (isset($org))
	<a href="{{ action('OrganizationController@edit', $org) }}">Back</a>
@else
	<a href="{{ action('OrganizationController@index') }}">Back</a>
@endif
<div class="table-responsive">
	<table class="table table-striped">
		<tbody>

		@if (isset($smtpinfo))
			<?php echo Form::open(array('action' => 'SmtpInfoController@handleEdit')); ?>
			<?php echo Form::hidden('id', $smtpinfo->id); ?>
		@else
			<?php echo Form::open(array('action' => 'SmtpInfoController@handleCreate')); ?>
		@endif
			<?php echo Form::token(); ?>

			@if(isset($smtpinfo))
			<tr>
				<td><?php echo Form::label('organization_id', 'Organization'); ?> </td>
				<td>
				  <select class="form-control" name="organization_id">
				  	<option value="">-- choose one --</option>
					@foreach($orgs as $org)
						<?php $selected = ''; ?>
						@if (isset($smtpinfo) && ($org->id === $smtpinfo->organization_id))
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
				<td><?php echo Form::label('host', 'Host'); ?></td>
				<td><?php echo Form::text('host', (isset($smtpinfo)) ? $smtpinfo->host : '' ); ?></td>
			</tr>
			<tr>
				<td><?php echo Form::label('port', 'Port'); ?></td>
				<td><?php echo Form::text('port', (isset($smtpinfo)) ? $smtpinfo->port : '' ); ?></td>
			</tr>
			<tr>
				<td><?php echo Form::label('username', 'Username'); ?></td>
				<td><?php echo Form::text('username', (isset($smtpinfo)) ? $smtpinfo->username : '' ); ?></td>
			</tr>
			<tr>
				<td><?php echo Form::label('password', 'Password'); ?></td>
				<td><?php echo Form::text('password', (isset($smtpinfo)) ? $smtpinfo->password : '' ); ?></td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					@if (isset($smtpinfo))
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