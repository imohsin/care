
@extends('base')

@section('body')

<h2>Address</h2>
@if (isset($address))
	<a href="{{ action('CompanyController@edit', $address->company_id) }}">Back</a>
@elseif (isset($co))
	<a href="{{ action('CompanyController@edit', $co) }}">Back</a>
@else
	<a href="{{ action('OrganizationController@index') }}">Back</a>
@endif
<div class="table-responsive">
	<table class="table table-striped">
		<tbody>

		@if (isset($address))
			<?php echo Form::open(array('action' => 'AddressController@handleEdit')); ?>
			<?php echo Form::hidden('id', $address->id); ?>
		@else
			<?php echo Form::open(array('action' => 'AddressController@handleCreate')); ?>
		@endif
			<?php echo Form::token(); ?>

			@if(isset($address))
			<tr>
				<td><?php echo Form::label('company_id', 'Company'); ?> </td>
				<td>
				  <select class="form-control" name="company_id">
					@foreach($companies as $company)
						<?php $selected = ''; ?>
						@if (isset($address) && ($company->id === $address->company_id))
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
				<td><?php echo Form::label('address1', 'Address Line 1'); ?></td>
				<td><?php echo Form::text('address1', (isset($address)) ? $address->address1 : '' ); ?></td>
			</tr>
			<tr>
				<td><?php echo Form::label('address2', 'Address Line 2'); ?></td>
				<td><?php echo Form::text('address2', (isset($address)) ? $address->address2 : '' ); ?></td>
			</tr>
			<tr>
				<td><?php echo Form::label('city', 'City'); ?></td>
				<td><?php echo Form::text('city', (isset($address)) ? $address->city : '' ); ?></td>
			</tr>
			<tr>
				<td><?php echo Form::label('state', 'State'); ?></td>
				<td><?php echo Form::text('state', (isset($address)) ? $address->state : '' ); ?></td>
			</tr>
			<tr>
				<td><?php echo Form::label('zip', 'Zip'); ?></td>
				<td><?php echo Form::text('zip', (isset($address)) ? $address->zip : '' ); ?></td>
			</tr>
			<tr>
				<td><?php echo Form::label('country_id', 'Country'); ?> </td>
				<td>
				  <select class="form-control" name="country_id">
					@foreach($countries as $country)
						<?php $selected = ''; ?>
						@if (isset($address) && ($country->id === $address->country_id))
							<?php $selected="selected=true"; ?>
						@endif
					  <option value="{{$country->id}}" {{$selected}}>{{$country->name}}</option>
					@endforeach
				  </select>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					@if (isset($address))
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