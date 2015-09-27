
@extends('auth')

@section('title', 'Please sign in')

@section('body')

@if($errors->any())
<div class="alert alert-danger" role="alert">
@foreach ($errors->all() as $message)
{{$message}}<br />
@endforeach
</div>
@endif

<?php echo Form::open(array('action' => 'Auth\AuthController@handleLogin','class'=>'form300')); ?>

<label for="email" class="sr-only">Email address</label>
<input type="email" name="email" id="email" class="form-control" placeholder="Email address" required autofocus>
<label for="password" class="sr-only">Password</label>
<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
<div class="checkbox">
  <label>
    <input type="checkbox" name="remember" value="remember-me">Remember me
  </label>
</div>
<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
<div class="alert alert-default" role="alert">
	<a href="{{ action('Auth\PasswordController@remind') }}">Forgot Password?</a> | <a href="register">Not Registered?</a>
</div>

<?php echo Form::close(); ?>

@stop