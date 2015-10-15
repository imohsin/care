
@extends('base')

@section('title', 'Deliveries')

@section('body')

<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Shop Id</th>
        <th>Courier Id</th>
        <th>Purchase Id</th>
        <th>Tracking Number</th>
        <th>Dispatch Date</th>
        <th>Customer Name</th>
        <th>Delivery Address</th>
        <th>Contact Number</th>
        <th>Delivery Notes</th>
        <th>{{--edit--}}</th>
        <th>{{--delete--}}</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($deliveries as $delivery)
        <tr>
        <td>{{ $delivery->id }}</td>
        <td>{{ $delivery->shop_id }}</td>
        <td>{{ $delivery->courier_id }}</td>
        <td>{{ $delivery->purchase_id }}</td>
        <td>{{ $delivery->tracking_number }}</td>
        <td>{{ $delivery->dispatch_date }}</td>
        <td>{{ $delivery->customer_name }}</td>
        <td>{{ $delivery->delivery_address }}</td>
        <td>{{ $delivery->contact_number }}</td>
        <td>{{ $delivery->delivery_notes }}</td>
        <td><a class="btn btn-sm btn-default" href="{{ action('DeliveryController@edit', $delivery->id) }}">Edit</a></td>
        <td><a class="btn btn-sm btn-default" href="{{ action('DeliveryController@delete', $delivery->id) }}">Delete</a></td>
        </tr>
    @endforeach
    </tbody>
    <tfooter>
      <tr>
        <td colspan="100%" align="right"><a class="btn btn-sm btn-primary pull-right" href="{{ action('DeliveryController@create') }}">Add</a></td>
      </tr>
    </tfooter>
  </table>
</div>

@stop