
@extends('base')

@section('title', 'Company')

@section('body')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
  @foreach ($errors->all() as $message)
    {{$message}}<br />
  @endforeach
  </div>
@endif

@if (isset($company))
	<?php echo Form::open(array('action' => 'CompanyController@handleEdit','class'=>'form300')); ?>
	<?php echo Form::hidden('id', $company->id); ?>
@else
	<?php echo Form::open(array('action' => 'CompanyController@handleCreate','class'=>'form300')); ?>
@endif

@if(isset($company))
	<?php echo Form::label('organization_id', 'Organization', array('class' => 'sr-only')); ?>
	<select class="form-control" name="organization_id">
		<option value="" disabled="">-- Choose Company --</option>
		@foreach($orgs as $org)
			<?php $selected = ''; ?>
			@if (isset($company) && ($org->id === $company->organization_id))
				<?php $selected="selected=true"; ?>
			@endif
			<option value="{{$org->id}}" {{$selected}}>{{$org->long_name}}</option>
		@endforeach
	</select>
@else
	<?php echo Form::hidden('organization_id', $org); ?>
@endif

<?php echo Form::label('company_type_id', 'Company Type', array('class' => 'sr-only')); ?>
<select class="form-control" name="company_type_id" place-holder="test">
	<option value="" disabled="">-- Choose Company Type --</option>
	@foreach($cotypes as $cotype)
		<?php $selected = ''; ?>
		@if ((isset($company) && ($cotype->id === $company->company_type_id))
				|| ($cotype->id == Request::input('ct')))
			<?php $selected="selected=true"; ?>
		@endif
		<option value="{{$cotype->id}}" {{$selected}}>{{$cotype->type}}</option>
	@endforeach
</select>
<?php echo Form::label('name', 'Company Name', array('class' => 'sr-only')); ?>
<?php echo Form::text('name', (isset($company)) ? $company->name : '', array('class' => 'form-control', 'placeholder' => 'Company Name' )); ?>

@if (isset($company))
	<?php echo Form::submit('Edit', array('class' => 'btn btn-sm btn-primary')); ?>
@else
	<?php echo Form::submit('Add', array('class' => 'btn btn-sm btn-primary')); ?>
@endif

@if (isset($company))
	<a class="btn btn-sm btn-default" href="{{ action('OrganizationController@edit', $company->organization_id) }}">Back</a>
@elseif (isset($org))
	<a class="btn btn-sm btn-default" href="{{ action('OrganizationController@edit', $org) }}">Back</a>
@else
	<a class="btn btn-sm btn-default" href="{{ action('OrganizationController@index') }}">Back</a>
@endif

<?php echo Form::close(); ?>

@if (isset($company))
	<div class="panel panel-default">
	  <div class="panel-heading">Contacts</div>
	  <table class="table table-striped">
			@foreach ($contacts as $contact)
		    <tr>
		      <td class="col-xs-9">{{ $contact->name }} - {{ $contact->job_title }}</td>
		      <td class="col-xs-3">
		        <div class="pull-right">
		          <a class="btn btn-sm btn-default" href="{{ action('ContactController@edit', ['id' => $contact->id]) }}">Edit</a>
		          <a class="btn btn-sm btn-default" href="{{ action('ContactController@delete', ['id' => $contact->id, 'co' => $company->id]) }}">Delete</a>
		        </div>
		      </td>
		    </tr>
		  @endforeach
	  </table>
	  <div class="panel-footer clearfix">
	    <a class="btn btn-sm btn-primary pull-right" href="{{ action('ContactController@create', ['co' => $company->id]) }}">Add</a>
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">Addresses</div>
	  <table class="table table-striped">
			@foreach ($addresses as $address)
		    <tr>
		      <td class="col-xs-9">{{ $address->address1 }}...{{ $address->city }}</td>
		      <td class="col-xs-3">
		        <div class="pull-right">
		          <a class="btn btn-sm btn-default" href="{{ action('AddressController@edit', ['id' => $address->id]) }}">Edit</a>
		          <a class="btn btn-sm btn-default" href="{{ action('AddressController@delete', ['id' => $address->id, 'co' => $company->id]) }}">Delete</a>
		        </div>
		      </td>
		    </tr>
		  @endforeach
	  </table>
	  <div class="panel-footer clearfix">
	    <a class="btn btn-sm btn-primary pull-right" href="{{ action('AddressController@create', ['co' => $company->id]) }}">Add</a>
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">Deals</div>
	  <table class="table table-striped">
			@foreach ($deals as $deal)
		    <tr>
		      <td class="col-xs-9">{{ $deal->deal_number }}</td>
		      <td class="col-xs-3">
		        <div class="pull-right">
		          <a class="btn btn-sm btn-default" href="{{ action('DealController@edit', ['id' => $deal->id]) }}">Edit</a>
		          <a class="btn btn-sm btn-default" href="{{ action('DealController@delete', ['id' => $deal->id, 'co' => $company->id]) }}">Delete</a>
		        </div>
		      </td>
		    </tr>
		  @endforeach
	  </table>
	  <div class="panel-footer clearfix">
	    <a class="btn btn-sm btn-primary pull-right" href="{{ action('DealController@create', ['co' => $company->id]) }}">Add</a>
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">Company Backoffice</div>
	  <table class="table table-striped">
			@foreach ($backoffices as $backoffice)
		    <tr>
		      <td class="col-xs-9">{{ $backoffice->url }}</td>
		      <td class="col-xs-3">
		        <div class="pull-right">
		          <a class="btn btn-sm btn-default" href="{{ action('BackofficeController@edit', ['id' => $backoffice->id]) }}">Edit</a>
		          <a class="btn btn-sm btn-default" href="{{ action('BackofficeController@delete', ['id' => $backoffice->id, 'co' => $company->id]) }}">Delete</a>
		        </div>
		      </td>
		    </tr>
		  @endforeach
	  </table>
	  <div class="panel-footer clearfix">
	    <a class="btn btn-sm btn-primary pull-right" href="{{ action('BackofficeController@create', ['co' => $company->id]) }}">Add</a>
	  </div>
	</div>
@endif

@stop