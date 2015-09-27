
@extends('auth')

@section('title', 'Password Reset')

@section('body')

@if (Session::has('success'))
<div class="alert alert-success" role="alert">An email with the password reset has been sent.</div>
@endif

@if($errors->any())
<div class="alert alert-danger" role="alert">
@foreach ($errors->all() as $message)
{{$message}}<br />
@endforeach
</div>
@endif

<?php echo Form::open(array('action' => 'Auth\PasswordController@handleRemind','class'=>'form300')); ?>

<label for="email" class="sr-only">Email address</label>
<input type="email" name="email" id="email" class="form-control" placeholder="Email address" value="{{ old('email') }}" required autofocus>
<button class="btn btn-lg btn-primary btn-block" type="submit">Send reset email</button>

<?php echo Form::close(); ?>

@stop