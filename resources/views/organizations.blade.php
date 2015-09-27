
@extends('base')

@section('title', 'Organizations')

@section('body')

<div class="panel panel-default">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>OpenCart Info</th>
        <th>Companies</th>
        <th>SMTP Info</th>
        <th>{{--edit/delete--}}</th>
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
            <td align="right">
              <a class="btn btn-sm btn-default" href="{{ action('OrganizationController@edit', $organization->id) }}">Edit</a>
              <a class="btn btn-sm btn-default" href="{{ action('OrganizationController@delete', $organization->id) }}">Delete</a>
            </td>
          </tr>
        @endif
      @endforeach
    </tbody>
  </table>
  <div class="panel-footer clearfix">
    <a class="btn btn-sm btn-primary pull-right" href="{{ action('OrganizationController@create') }}">Add</a>
  </div>
</div>
@stop