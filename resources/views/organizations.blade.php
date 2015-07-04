
@extends('base')

@section('body')

<table  cellpadding="10" border="1">
<tr><td>Name</td>
	<td>OpenCart Info</td>
	<td>Shops</td>
	<td>Contacts</td>
	<td>Smtp Info</td>
	<td>{{--edit--}}</td>
	<td>{{--delete--}}</td></tr>
@foreach ($organizations as $organization)
   <tr><td>{{ $organization->long_name }}</td>
    		<td>{{ $organization->ocHost }}</td>
    		<td>{{ $organization->companies }}</td>
    		<td>{{ $organization->contacts }}</td>
    		<td>{{ $organization->smtpHost }}</td>
    		<td><a href="{{ action('OrganizationController@edit', $organization->id) }}">Edit</a></td>
    		<td><a href="{{ action('OrganizationController@delete', $organization->id) }}">Delete</a></td>
   </tr>
@endforeach
<tr><td colspan="100%" align="right"><a href="{{ action('OrganizationController@create') }}">Add</a></td></tr>
</table>

@stop