
@extends('base')

@section('body')

@if (Session::has('success'))
  Your password has been reset.  Please <a href="{{ url('/') }}">login</a> again
@endif

<h3>Reset Passsword</h3>
<table  cellpadding="10" border="1">

<?php echo Form::open(array('action' => 'Auth\PasswordController@handleReset')); ?>
<?php echo Form::token(); ?>
@foreach ($errors->all() as $message)

<font color="red">{{$message}}</font>

@endforeach
<tr><td>Email</td>
	<td><input type="email" name="email" value="{{ old('email') }}"></td></tr>
<tr><td>Password</td>
	<td><input type="password" name="password"></td></tr>
<tr><td>Confirm Password</td>
	<td><input type="password" name="password_confirmation"></td></tr>
<tr><td colspan="2" align="right">
    <input type="hidden" name="token" value="{{ $token }}">
	<button type="submit">Reset Password</button>
</td></tr>
<?php echo Form::close(); ?>

</table>



@stop