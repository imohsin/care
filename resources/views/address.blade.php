
@extends('base')

@section('title', 'Address')

@section('body')

@if($errors->any())
  <div class="alert alert-danger" role="alert">
  @foreach ($errors->all() as $message)
    {{$message}}<br />
  @endforeach
  </div>
@endif

@if (isset($address))
  <?php echo Form::open(array('action' => 'AddressController@handleEdit','class'=>'form300')); ?>
  <?php echo Form::hidden('id', $address->id); ?>
@else
  <?php echo Form::open(array('action' => 'AddressController@handleCreate','class'=>'form300')); ?>
@endif

@if(isset($address))
  <?php echo Form::label('company_id', 'Company', array('class' => 'sr-only')); ?>
  <select class="form-control" name="company_id">
    @foreach($companies as $company)
      <?php $selected = ''; ?>
      @if (isset($address) && ($company->id === $address->company_id))
        <?php $selected="selected=true"; ?>
      @endif
      <option value="{{$company->id}}" {{$selected}}>{{$company->name}}</option>
    @endforeach
  </select>
@else
  <?php echo Form::hidden('company_id', $co); ?>
@endif

<?php echo Form::label('address1', 'Address Line 1', array('class' => 'sr-only')); ?>
<?php echo Form::text('address1', (isset($address)) ? $address->address1 : '' , array('class' => 'form-control', 'placeholder' => 'Address 1' )); ?>
<?php echo Form::label('address2', 'Address Line 2', array('class' => 'sr-only')); ?>
<?php echo Form::text('address2', (isset($address)) ? $address->address2 : '' , array('class' => 'form-control', 'placeholder' => 'Address 2' )); ?>
<?php echo Form::label('city', 'City', array('class' => 'sr-only')); ?>
<?php echo Form::text('city', (isset($address)) ? $address->city : '' , array('class' => 'form-control', 'placeholder' => 'City' )); ?>
<?php echo Form::label('state', 'State', array('class' => 'sr-only')); ?>
<?php echo Form::text('state', (isset($address)) ? $address->state : '' , array('class' => 'form-control', 'placeholder' => 'State' )); ?>
<?php echo Form::label('zip', 'Zip', array('class' => 'sr-only')); ?>
<?php echo Form::text('zip', (isset($address)) ? $address->zip : '' , array('class' => 'form-control', 'placeholder' => 'Zip' )); ?>
<?php echo Form::label('country_id', 'Country', array('class' => 'sr-only')); ?>

<select class="form-control" name="country_id">
  @foreach($countries as $country)
    <?php $selected = ''; ?>
    @if (isset($address) && ($country->id === $address->country_id))
      <?php $selected="selected=true"; ?>
    @endif
    <option value="{{$country->id}}" {{$selected}}>{{$country->name}}</option>
  @endforeach
</select>

@if (isset($address))
  <?php echo Form::submit('Edit', array('class' => 'btn btn-sm btn-primary')); ?>
@else
  <?php echo Form::submit('Add', array('class' => 'btn btn-sm btn-primary')); ?>
@endif

@if (isset($address))
  <a class="btn btn-sm btn-default" href="{{ action('CompanyController@edit', $address->company_id) }}">Back</a>
@elseif (isset($co))
  <a class="btn btn-sm btn-default" href="{{ action('CompanyController@edit', $co) }}">Back</a>
@else
  <a class="btn btn-sm btn-default" href="{{ action('OrganizationController@index') }}">Back</a>
@endif

<?php echo Form::close(); ?>

@stop