
@extends('base')

@section('title', 'Organization')

@section('body')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
  @foreach ($errors->all() as $message)
    {{$message}}<br />
  @endforeach
  </div>
@endif

@if (isset($organization))
  <?php echo Form::open(array('action' => 'OrganizationController@handleEdit','class'=>'form300')); ?>
  <?php echo Form::hidden('id', $organization->id); ?>
@else
  <?php echo Form::open(array('action' => 'OrganizationController@handleCreate','class'=>'form300')); ?>
@endif

<?php echo Form::label('short_name', 'Short Name', array('class' => 'sr-only')); ?>
<?php echo Form::text('short_name', (isset($organization)) ? $organization->short_name : '' , array('class' => 'form-control', 'placeholder' => 'Short Name' )) ; ?>
<?php echo Form::label('long_name', 'Long Name', array('class' => 'sr-only')); ?>
<?php echo Form::text('long_name', (isset($organization)) ? $organization->long_name : '' , array('class' => 'form-control', 'placeholder' => 'Long Name' )); ?>

@if (isset($organization))
	<?php echo Form::submit('Update', array('class' => 'btn btn-sm btn-primary')); ?>
@else
	<?php echo Form::submit('Add', array('class' => 'btn btn-sm btn-primary')); ?>
@endif

<a class="btn btn-sm btn-default" href="{{ action('OrganizationController@index') }}">Back</a>

<?php echo Form::close(); ?>
	

@if (isset($organization))
<div class="panel panel-default">
  <div class="panel-heading">Companies</div>
  <table class="table table-striped">
    @foreach ($companies as $company)
      @if (isset($company->id))
        <tr>
          <td class="col-xs-9">{{ $company->name }}</td>
          <td class="col-xs-3">
            <div class="pull-right">
              <a class="btn btn-sm btn-default" href="{{ action('CompanyController@edit', ['id' => $company->id]) }}">Edit</a>
              <a class="btn btn-sm btn-default" href="{{ action('CompanyController@delete', ['id' => $company->id, 'org' => $organization->id]) }}">Delete</a>
            </div>
          </td>
        </tr>
      @endif
    @endforeach
  </table>
  <div class="panel-footer clearfix">
    <a class="btn btn-sm btn-primary pull-right" href="{{ action('CompanyController@create', ['org' => $organization->id]) }}">Add</a>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">OpenCart Info</div>
  <table class="table table-striped">
    @foreach ($opencartInfos as $ocInfo)
      @if (isset($ocInfo->id))
        <tr class="">
          <td class="col-xs-9">{{ $ocInfo->host }}</td>
          <td class="col-xs-3">
            <div class="pull-right">
              <a class="btn btn-sm btn-default" href="{{ action('OpencartInfoController@edit', ['id' => $ocInfo->id]) }}">Edit</a>
              <a class="btn btn-sm btn-default" href="{{ action('OpencartInfoController@delete', ['id' => $ocInfo->id, 'org' => $organization->id]) }}">Delete</a>
            </div>
          </td>
        </td>
      @endif
    @endforeach
  </table>
  <div class="panel-footer clearfix">
    <a class="btn btn-sm btn-primary pull-right" href="{{ action('OpencartInfoController@create', ['org' => $organization->id]) }}">Add</a>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">SMTP Info</div>
  <table class="table table-striped">
    @foreach ($smtpInfos as $smtpInfo)
      @if (isset($smtpInfo->id))
        <tr class="">
          <td class="col-xs-9">{{ $smtpInfo->host }}</td>
          <td class="col-xs-3">
            <div class="pull-right">
              <a class="btn btn-sm btn-default" href="{{ action('SmtpInfoController@edit', ['id' => $smtpInfo->id]) }}">Edit</a>
              <a class="btn btn-sm btn-default" href="{{ action('SmtpInfoController@delete', ['id' => $smtpInfo->id, 'org' => $organization->id]) }}">Delete</a>
            </div>
          </td>
        </td>
      @endif
    @endforeach
  </table>
  <div class="panel-footer clearfix">
    <a class="btn btn-sm btn-primary pull-right" href="{{ action('SmtpInfoController@create', ['org' => $organization->id]) }}">Add</a>
  </div>
</div>

@endif

@stop