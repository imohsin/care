
@extends('base')

@section('body')

@if (Session::has('error'))
  {{ trans(Session::get('reason')) }}
@elseif (Session::has('success'))
  An email with the password reset has been sent.
@endif

<h3>Password Reset</h3>
<table  cellpadding="10" border="1">

<?php echo Form::open(array('route' => 'password.request')); ?>
<?php echo Form::token(); ?>
@foreach ($errors->all() as $message)

<font color="red">{{$message}}</font>

@endforeach
<tr><td>Email</td>
	<td><input type="email" name="email" value="{{ old('email') }}"></td></tr>
<tr><td colspan="2" align="right">
	<button type="submit">Send reset email</button>
</td></tr>
<?php echo Form::close(); ?>

</table>

@stop