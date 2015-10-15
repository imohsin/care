
@extends('auth')

@section('title', 'Register')

@section('body')

@if($errors->any())
<div class="alert alert-danger" role="alert">
@foreach ($errors->all() as $message)
{{$message}}<br />
@endforeach
</div>
@endif

<?php echo Form::open(array('action' => 'Auth\AuthController@handleRegister','class'=>'form300')); ?>

<label for="name" class="sr-only">Name</label>
<input type="name" name="name" id="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required autofocus>
<label for="email" class="sr-only">Email address</label>
<input type="email" name="email" id="email" class="form-control" placeholder="Email address" value="{{ old('email') }}" required>
<label for="password" class="sr-only">Password</label>
<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
<label for="password_confirmation" class="sr-only">Password</label>
<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" required>
@if(isset($orgs))
<label for="name" class="sr-only">Organization</label>
<select class="form-control" name="organization_id">
	<option value="">-- Choose Oranization --</option>
	@foreach($orgs as $org)
		<option value="{{$org->id}}">{{$org->long_name}}</option>
	@endforeach
</select>
@endif
</p>
<button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>

<?php echo Form::close(); ?>

@stop