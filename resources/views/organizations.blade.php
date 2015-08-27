
@extends('base')

@section('title', 'Organizations')

@section('body')

<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>OpenCart Info</th>
        <th>Shops</th>
        <th>Contacts</th>
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
            <td>{{ $organization->ocHost }}</td>
            <td>{{ $organization->companies }}</td>
            <td>{{ $organization->contacts }}</td>
            <td>{{ $organization->smtpHost }}</td>
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