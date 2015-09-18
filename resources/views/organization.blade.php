
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
<td valign="top" width="400">

@if (isset($organization))
	<table class="table table-striped">
	<tr><td>
			<table>
				  <tr><td colspan="3"><b>Companies</b></td><td align="right"><a href="{{ action('CompanyController@create', ['org' => $organization->id]) }}">Add</a></td></tr>
				  @foreach ($companies as $company)
					@if (isset($company->id))
					  <tr>
						<td width="100%">{{ $company->name }}</td>
						<td width="50">&nbsp;</td>
						<td><a href="{{ action('CompanyController@edit', ['id' => $company->id]) }}">Edit</a>&nbsp;</td>
						<td><a href="{{ action('CompanyController@delete', ['id' => $company->id, 'org' => $organization->id]) }}">Delete</a></td>
					  </tr>
					@endif
				  @endforeach
			</table>
	</td></tr>
	<tr><td>
			<table>
				  <tr><td colspan="3"><b>Open Cart Info</b></td><td align="right"><a href="{{ action('OpencartInfoController@create', ['org' => $organization->id]) }}">Add</a></td></tr>
				  @foreach ($opencartInfos as $ocInfo)
					@if (isset($ocInfo->id))
					  <tr>
						<td width="100%">{{ $ocInfo->host }}</td>
						<td width="50">&nbsp;</td>
						<td><a href="{{ action('OpencartInfoController@edit', ['id' => $ocInfo->id]) }}">Edit</a>&nbsp;</td>
						<td><a href="{{ action('OpencartInfoController@delete', ['id' => $ocInfo->id, 'org' => $organization->id]) }}">Delete</a></td>
					  </tr>
					@endif
				  @endforeach
			</table>
	</td></tr>
	<tr><td>
			<table>
				  <tr><td colspan="3"><b>Smtp Info</b></td><td align="right"><a href="{{ action('SmtpInfoController@create', ['org' => $organization->id]) }}">Add</a></td></tr>
				  @foreach ($smtpInfos as $smtpInfo)
					@if (isset($smtpInfo->id))
					  <tr>
						<td width="100%">{{ $smtpInfo->host }}</td>
						<td width="50">&nbsp;</td>
						<td><a href="{{ action('SmtpInfoController@edit', ['id' => $smtpInfo->id]) }}">Edit</a>&nbsp;</td>
						<td><a href="{{ action('SmtpInfoController@delete', ['id' => $smtpInfo->id, 'org' => $organization->id]) }}">Delete</a></td>
					  </tr>
					@endif
				  @endforeach
			</table>
	</td></tr>
	</table>
@endif

</td></tr></table>

@stop