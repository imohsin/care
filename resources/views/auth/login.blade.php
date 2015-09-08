
@extends('base')

@section('body')

<h3>Login</h3>
<table  cellpadding="10" border="1">

<?php echo Form::open(array('action' => 'Auth\AuthController@handleLogin')); ?>
<?php echo Form::token(); ?>
@foreach ($errors->all() as $message)

<font color="red">{{$message}}</font>

@endforeach
<tr><td>Email</td>
	<td><input type="email" name="email" value="{{ old('email') }}"></td></tr>
<tr><td>Password</td>
	<td><input type="password" name="password" id="password"></td></tr>
<tr><td><input type="checkbox" name="remember">Remember Me</td></tr>

<tr><td colspan="2" align="right">
		<button type="submit">Login</button>
		<div>&nbsp;</div>
		<div><a href="{{ action('Auth\PasswordController@remind') }}">Forgot Password?</a> | <a href="register">Not Registered?</a></div>
</td></tr>
<?php echo Form::close(); ?>

</table>

@stop