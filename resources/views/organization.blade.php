
@extends('base')

@section('body')

<h3>Organization</h3>

<table><tr><td valign="top">

<table class="table table-striped">
<tr><td colspan="2" align="right"><a href="{{ action('OrganizationController@index') }}">Back</a></td></tr>

@if (isset($organization))
<?php echo Form::open(array('action' => 'OrganizationController@handleEdit')); ?>
<?php echo Form::hidden('id', $organization->id); ?>
@else
<?php echo Form::open(array('action' => 'OrganizationController@handleCreate')); ?>
@endif
<?php echo Form::token(); ?>

<tr><td> <?php echo Form::label('short_name', 'Short Name'); ?> </td>
	<td><?php echo Form::text('short_name', (isset($organization)) ? $organization->short_name : '' ); ?></td></tr>
<tr><td><?php echo Form::label('long_name', 'Long Name'); ?></td>
	<td><?php echo Form::text('long_name', (isset($organization)) ? $organization->long_name : '' ); ?></td></tr>

<tr><td colspan="2" align="right">
	@if (isset($organization))
		<?php echo Form::submit('Edit'); ?>
	@else
		<?php echo Form::submit('Add'); ?>
	@endif
</td></tr>
<?php echo Form::close(); ?>

</table>

</td>
<td width="50">&nbsp;</td>
<td valign="top" width="300">

<table class="table table-striped">
<tr><td>
		<table>
			  <tr><td colspan="3"><b>Companies</b></td><td align="right"><a href="{{ action('CompanyController@create') }}">Add</a></td></tr>
		      @foreach ($companies as $company)
		        @if (isset($company->id))
		          <tr>
		            <td width="100%">{{ $company->name }}</td>
		            <td width="50">&nbsp;</td>
					<td><a href="{{ action('CompanyController@edit', $company->id) }}">Edit</a>&nbsp;</td>
					<td><a href="{{ action('CompanyController@delete', $company->id) }}">Delete</a></td>
				  </tr>
				@endif
			  @endforeach
		</table>
</td></tr>
<tr><td>
		<table>
			  <tr><td colspan="3"><b>Open Cart</b></td><td align="right"><a href="{{ action('OpencartInfoController@create') }}">Add</a></td></tr>
		      @foreach ($opencartInfos as $ocInfo)
		        @if (isset($ocInfo->id))
		          <tr>
		            <td width="100%">{{ $ocInfo->host }}</td>
		            <td width="50">&nbsp;</td>
					<td><a href="{{ action('OpencartInfoController@edit', $ocInfo->id) }}">Edit</a>&nbsp;</td>
					<td><a href="{{ action('OpencartInfoController@delete', $ocInfo->id) }}">Delete</a></td>
				  </tr>
				@endif
			  @endforeach
		</table>
</td></tr>
<tr><td>
		<table>
			  <tr><td colspan="3"><b>Smtp Info</b></td><td align="right"><a href="{{ action('SmtpInfoController@create') }}">Add</a></td></tr>
		      @foreach ($smtpInfos as $smtpInfo)
		        @if (isset($smtpInfo->id))
		          <tr>
		            <td width="100%">{{ $smtpInfo->host }}</td>
		            <td width="50">&nbsp;</td>
					<td><a href="{{ action('SmtpInfoController@edit', $smtpInfo->id) }}">Edit</a>&nbsp;</td>
					<td><a href="{{ action('SmtpInfoController@delete', $smtpInfo->id) }}">Delete</a></td>
				  </tr>
				@endif
			  @endforeach
		</table>
</td></tr>
</table>

</td></tr></table>

@stop