
@extends('base')

@section('title', 'Contact')

@section('body')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
  @foreach ($errors->all() as $message)
    {{$message}}<br />
  @endforeach
  </div>
@endif

@if (isset($contact))
	<?php echo Form::open(array('action' => 'ContactController@handleEdit','class'=>'form300')); ?>
	<?php echo Form::hidden('id', $contact->id); ?>
@else
	<?php echo Form::open(array('action' => 'ContactController@handleCreate','class'=>'form300')); ?>
@endif

@if(isset($contact))
	<?php echo Form::label('company_id', 'Company', array('class' => 'sr-only')); ?>
  <select class="form-control" name="company_id">
	@foreach($companies as $company)
		<?php $selected = ''; ?>
		@if (isset($contact) && ($company->id === $contact->company_id))
			<?php $selected="selected=true"; ?>
		@endif
	  <option value="{{$company->id}}" {{$selected}}>{{$company->name}}</option>
	@endforeach
  </select>
@else
	<?php echo Form::hidden('company_id', $co); ?>
@endif

<?php echo Form::label('name', 'Name', array('class' => 'sr-only')); ?>
<?php echo Form::text('name', (isset($contact)) ? $contact->name : '' , ['class' => 'form-control', 'placeholder' => 'Name' ]); ?>
<?php echo Form::label('job_title', 'Job Title', array('class' => 'sr-only')); ?>
<?php echo Form::text('job_title', (isset($contact)) ? $contact->job_title : '' , ['class' => 'form-control', 'placeholder' => 'Job Title' ]); ?>

@if (isset($contact))
	<?php echo Form::submit('Edit', array('class' => 'btn btn-sm btn-primary')); ?>
@else
	<?php echo Form::submit('Add', array('class' => 'btn btn-sm btn-primary')); ?>
@endif

@if (isset($contact))
	<a class="btn btn-sm btn-default" href="{{ action('CompanyController@edit', $contact->company_id) }}">Back</a>
@elseif (isset($co))
	<a class="btn btn-sm btn-default" href="{{ action('CompanyController@edit', $co) }}">Back</a>
@else
	<a class="btn btn-sm btn-default" href="{{ action('OrganizationController@index') }}">Back</a>
@endif

<?php echo Form::close(); ?>

@if (isset($company))
<div class="panel panel-default">
  <div class="panel-heading">Communication</div>
  <table class="table table-striped">
	  @foreach ($communications as $communication)
      <tr>
        <td class="col-xs-9">{{ $communication->value }}</td>
        <td class="col-xs-3">
          <div class="pull-right">
            <a class="btn btn-sm btn-default" href="{{ action('CommunicationController@edit', ['id' => $communication->id]) }}">Edit</a>
            <a class="btn btn-sm btn-default" href="{{ action('CommunicationController@delete', ['id' => $communication->id, 'con' => $contact->id]) }}">Delete</a>
          </div>
        </td>
      </tr>
	  @endforeach
  </table>
  <div class="panel-footer clearfix">
    <a class="btn btn-sm btn-primary pull-right" href="{{ action('CommunicationController@create', ['con' => $contact->id]) }}">Add</a>
  </div>
</div>

@endif

@stop