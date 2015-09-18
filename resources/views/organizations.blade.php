
@extends('base')

@section('title', 'Organizations')

@section('body')

<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>OpenCart Info</th>
        <th>Companies</th>
        <th>SMTP Info</th>
        <th>{{--edit--}}</th>
        <th>{{--delete--}}</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($organizations as $organization)
        @if (isset($organization->id))
          <tr>
            <td>{{ $organization->long_name }}</td>
            <td>
				@foreach($ocInfos as $ocInfo)
					@if($ocInfo->organization_id === $organization->id)
					   	{{$ocInfo->host}}</br>
				    @endif
				@endforeach
            </td>
            <td>
            	<?php $shopcount = 0 ?>
				@foreach($companies as $company)
					@if($company->organization_id === $organization->id)
					   	<?php $shopcount++ ?>
				    @endif
				@endforeach
				{{ $shopcount }}
            </td>
            <td>
				@foreach($smtpInfos as $smtpInfo)
					@if($smtpInfo->organization_id === $organization->id)
					   	{{$smtpInfo->host}}</br>
				    @endif
				@endforeach
            </td>
            <td></td>
            <td><a href="{{ action('OrganizationController@edit', $organization->id) }}">Edit</a></td>
            <td><a href="{{ action('OrganizationController@delete', $organization->id) }}">Delete</a></td>
          </tr>
        @endif
      @endforeach
    </tbody>
    <tfooter>
      <tr>
        <td colspan="100%" align="right"><a href="{{ action('OrganizationController@create') }}">Add</a></td>
      </tr>
    </tfooter>
  </table>
</div>

@stop