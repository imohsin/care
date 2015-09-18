
@extends('base')

@section('body')

<h2>Company</h2>

<table><tr><td valign="top">

<div class="table-responsive">
	<table class="table table-striped">
		<tbody>

		<tr><td colspan="2" align="right">
		@if (isset($company))
			<a href="{{ action('OrganizationController@edit', $company->organization_id) }}">Back</a>
		@elseif (isset($org))
			<a href="{{ action('OrganizationController@edit', $org) }}">Back</a>
		@else
			<a href="{{ action('OrganizationController@index') }}">Back</a>
		@endif
		</td></tr>

		@if (isset($company))
			<?php echo Form::open(array('action' => 'CompanyController@handleEdit')); ?>
			<?php echo Form::hidden('id', $company->id); ?>
		@else
			<?php echo Form::open(array('action' => 'CompanyController@handleCreate')); ?>
		@endif
			<?php echo Form::token(); ?>

			@if(isset($company))
			<tr>
				<td><?php echo Form::label('organization_id', 'Organization'); ?> </td>
				<td>
				  <select class="form-control" name="organization_id">
				  	<option value="">-- choose one -- </option>
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
   		    @else
				<?php echo Form::hidden('organization_id', $org); ?>
			@endif
			<tr>
				<td><?php echo Form::label('company_type_id', 'Company Type'); ?> </td>
				<td>
				  <select class="form-control" name="company_type_id">
				  	<option value="">-- choose one --</option>
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

</td>
<td width="50">&nbsp;</td>
<td valign="top" width="400">

@if (isset($company))
	<table class="table table-striped">
	<tr><td>
			<table>
				  <tr><td colspan="3"><b>Contacts</b></td>
				  <td align="right"><a href="{{ action('ContactController@create', ['co' => $company->id]) }}">Add</a></td></tr>
				  @foreach ($contacts as $contact)
					  <tr>
						<td width="100%">{{ $contact->name }} - {{ $contact->job_title }}</td>
						<td width="50">&nbsp;</td>
						<td><a href="{{ action('ContactController@edit', ['id' => $contact->id]) }}">Edit</a>&nbsp;</td>
						<td><a href="{{ action('ContactController@delete', ['id' => $contact->id, 'co' => $company->id]) }}">Delete</a></td>
					  </tr>
				  @endforeach
			</table>
	</td></tr>
	<tr><td>
			<table>
				  <tr><td colspan="3"><b>Addresses</b></td>
				  <td align="right"><a href="{{ action('AddressController@create', ['co' => $company->id]) }}">Add</a></td></tr>
				  @foreach ($addresses as $address)
					  <tr>
						<td width="100%">{{ $address->address1 }}...{{ $address->city }}</td>
						<td width="50">&nbsp;</td>
						<td><a href="{{ action('AddressController@edit', ['id' => $address->id]) }}">Edit</a>&nbsp;</td>
						<td><a href="{{ action('AddressController@delete', ['id' => $address->id, 'co' => $company->id]) }}">Delete</a></td>
					  </tr>
				  @endforeach
			</table>
	</td></tr>
	<tr><td>
			<table>
				  <tr><td colspan="3"><b>Deals</b></td>
				  <td align="right"><a href="{{ action('DealController@create', ['co' => $company->id]) }}">Add</a></td></tr>
				  @foreach ($deals as $deal)
					  <tr>
						<td width="100%">{{ $deal->deal_number }}</td>
						<td width="50">&nbsp;</td>
						<td><a href="{{ action('DealController@edit', ['id' => $deal->id]) }}">Edit</a>&nbsp;</td>
						<td><a href="{{ action('DealController@delete', ['id' => $deal->id, 'co' => $company->id]) }}">Delete</a></td>
					  </tr>
				  @endforeach
			</table>
	</td></tr>
	<tr><td>
			<table>
				  <tr><td colspan="3"><b>Company Backoffice</b></td>
				  <td align="right"><a href="{{ action('BackofficeController@create', ['co' => $company->id]) }}">Add</a></td></tr>
				  @foreach ($backoffices as $backoffice)
					  <tr>
						<td width="100%">{{ $backoffice->url }}</td>
						<td width="50">&nbsp;</td>
						<td><a href="{{ action('BackofficeController@edit', ['id' => $backoffice->id]) }}">Edit</a>&nbsp;</td>
						<td><a href="{{ action('BackofficeController@delete', ['id' => $backoffice->id, 'co' => $company->id]) }}">Delete</a></td>
					  </tr>
				  @endforeach
			</table>
	</td></tr>
	</table>
@endif

</td></tr>
</table>

@stop