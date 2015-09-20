
@extends('base')

@section('body')

<h2>Contact</h2>
@if (isset($contact))
	<a href="{{ action('CompanyController@edit', $contact->company_id) }}">Back</a>
@elseif (isset($co))
	<a href="{{ action('CompanyController@edit', $co) }}">Back</a>
@else
	<a href="{{ action('CompanyController@index') }}">Back</a>
@endif
<div class="table-responsive">
	<table class="table table-striped">
		<tbody>

		@if (isset($contact))
			<?php echo Form::open(array('action' => 'ContactController@handleEdit')); ?>
			<?php echo Form::hidden('id', $contact->id); ?>
		@else
			<?php echo Form::open(array('action' => 'ContactController@handleCreate')); ?>
		@endif
			<?php echo Form::token(); ?>

			@if(isset($contact))
			<tr>
				<td><?php echo Form::label('company_id', 'Company'); ?> </td>
				<td>
				  <select class="form-control" name="company_id">
					@foreach($companies as $company)
						<?php $selected = ''; ?>
						@if (isset($contact) && ($company->id === $contact->company_id))
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
				<td><?php echo Form::label('name', 'Name'); ?></td>
				<td><?php echo Form::text('name', (isset($contact)) ? $contact->name : '' ); ?></td>
			</tr>
			<tr>
				<td><?php echo Form::label('job_title', 'Job Title'); ?></td>
				<td><?php echo Form::text('job_title', (isset($contact)) ? $contact->job_title : '' ); ?></td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					@if (isset($contact))
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