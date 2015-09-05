
@extends('base')

@section('body')

<h3>Register</h3>
<table  cellpadding="10" border="1">

<?php echo Form::open(array('action' => 'Auth\AuthController@handleRegister')); ?>
<?php echo Form::token(); ?>
@foreach ($errors->all() as $message)

<font color="red">{{$message}}</font>

@endforeach
<tr><td>Name</td>
	<td><input type="name" name="name" value="{{ old('name') }}"></td></tr>
<tr><td>Email</td>
	<td><input type="email" name="email" value="{{ old('email') }}"></td></tr>
<tr><td>Password</td>
	<td><input type="password" name="password" id="password"></td></tr>
<tr><td>Confirm Password</td>
	<td><input type="password" name="password_confirmation" id="password_confirmation"></td></tr>
<tr><td colspan="2" align="right">
	<button type="submit">Register</button>
</td></tr>
<?php echo Form::close(); ?>

</table>

@stop