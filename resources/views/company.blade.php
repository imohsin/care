
@extends('base')

@section('body')

<h2>Company</h2>
<a href="{{ action('OrganizationController@index') }}">Back</a>
<div class="table-responsive">
	<table class="table table-striped">
		<tbody>

		@if (isset($company))
			<?php echo Form::open(array('action' => 'CompanyController@handleEdit')); ?>
			<?php echo Form::hidden('id', $company->id); ?>
		@else
			<?php echo Form::open(array('action' => 'CompanyController@handleCreate')); ?>
		@endif
			<?php echo Form::token(); ?>

			<tr>
				<td><?php echo Form::label('organization_id', 'Organization'); ?> </td>
				<td>
				  <select class="form-control" name="organization_id">
					@foreach($orgs as $org)
						<?php $selected = ''; ?>
						@if (isset($company) && ($org->id === $company->organization_id))
							<?php $selected="selected=true"; ?>
						@endif
					  <option value="{{$org->id}}" {{$selected}}>{{$org->long_name}}</option>
					@endforeach
				  </select>
				</td>
			</tr>
			<tr>
				<td><?php echo Form::label('company_type_id', 'Company Type'); ?> </td>
				<td>
				  <select class="form-control" name="company_type_id">
					@foreach($cotypes as $cotype)
						<?php $selected = ''; ?>
						@if (isset($company) && ($cotype->id === $company->company_type_id))
							<?php $selected="selected=true"; ?>
						@endif
					  <option value="{{$cotype->id}}" {{$selected}}>{{$cotype->type}}</option>
					@endforeach
				  </select>
				</td>
			</tr>
			<tr>
				<td><?php echo Form::label('name', 'Company Name'); ?></td>
				<td><?php echo Form::text('name', (isset($company)) ? $company->name : '' ); ?></td>
			</tr>

			<tr>
				<td colspan="2" align="right">
					@if (isset($company))
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