
@extends('auth')

@section('title', 'Password Reset')

@section('body')

@if (Session::has('success'))
<div class="alert alert-success" role="alert">Your password has been reset.  Please <a href="{{ url('/') }}">login</a> again.</div>
@endif

@if($errors->any())
<div class="alert alert-danger" role="alert">
@foreach ($errors->all() as $message)
{{$message}}<br />
@endforeach
</div>
@endif

<?php echo Form::open(array('action' => 'Auth\PasswordController@handleReset','class'=>'form300')); ?>

<label for="email" class="sr-only">Email address</label>
<input type="email" name="email" id="email" class="form-control" placeholder="Email address" value="{{ old('email') }}" required autofocus>
<label for="password" class="sr-only">Password</label>
<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
<label for="password_confirmation" class="sr-only">Password</label>
<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" required>
<button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>

<?php echo Form::close(); ?>

@stop