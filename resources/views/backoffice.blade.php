
@extends('base')

@section('body')

<h2>Backoffice</h2>
@if (isset($backoffice))
	<a href="{{ action('CompanyController@edit', $backoffice->company_id) }}">Back</a>
@elseif (isset($co))
	<a href="{{ action('CompanyController@edit', $co) }}">Back</a>
@else
	<a href="{{ action('OrganizationController@index') }}">Back</a>
@endif
<div class="table-responsive">
	<table class="table table-striped">
		<tbody>

		@if (isset($backoffice))
			<?php echo Form::open(array('action' => 'BackofficeController@handleEdit')); ?>
			<?php echo Form::hidden('id', $backoffice->id); ?>
		@else
			<?php echo Form::open(array('action' => 'BackofficeController@handleCreate')); ?>
		@endif
			<?php echo Form::token(); ?>

			@if(isset($backoffice))
			<tr>
				<td><?php echo Form::label('company_id', 'Company'); ?> </td>
				<td>
				  <select class="form-control" name="company_id">
					@foreach($companies as $company)
						<?php $selected = ''; ?>
						@if (isset($backoffice) && ($company->id === $backoffice->company_id))
							<?php $selected="selected=true"; ?>
						@endif
					  <option value="{{$company->id}}" {{$selected}}>{{$company->name}}</option>
					@endforeach
				  </select>
				</td>
			</tr>
   		    @else
				<?php echo Form::hidden('company_id', $co); ?>
			@endif
			<tr>
				<td><?php echo Form::label('url', 'Url'); ?></td>
				<td><?php echo Form::text('url', (isset($backoffice)) ? $backoffice->url : '' ); ?></td>
			</tr>
			<tr>
				<td><?php echo Form::label('username', 'Username'); ?></td>
				<td><?php echo Form::text('username', (isset($backoffice)) ? $backoffice->username : '' ); ?></td>
			</tr>
			<tr>
				<td><?php echo Form::label('password', 'Password'); ?></td>
				<td><?php echo Form::password('password', ['class' => 'form-control']); ?></td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					@if (isset($backoffice))
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