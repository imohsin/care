
@extends('base')

@section('body')

<h3>Deliveries</h3>
<table  cellpadding="10" border="1">
<tr><td>Id</td>
	<td>Shop Id</td>
	<td>Courier Id</td>
	<td>Purchase Id</td>
	<td>Tracking Number</td>
	<td>Dispatch Date</td>
	<td>Customer Name</td>
	<td>Delivery Address</td>
	<td>Contact Number</td>
	<td>Delivery Notes</td>
	<td>{{--edit--}}</td>
	<td>{{--delete--}}</td></tr>
@foreach ($deliveries as $delivery)
   <tr><td>{{ $delivery->id }}</td>
    		<td>{{ $delivery->shop_id }}</td>
    		<td>{{ $delivery->courier_id }}</td>
    		<td>{{ $delivery->purchase_id }}</td>
    		<td>{{ $delivery->tracking_number }}</td>
    		<td>{{ $delivery->dispatch_date }}</td>
    		<td>{{ $delivery->customer_name }}</td>
    		<td>{{ $delivery->delivery_address }}</td>
    		<td>{{ $delivery->contact_number }}</td>
    		<td>{{ $delivery->delivery_notes }}</td>
    		<td><a href="{{ action('DeliveryController@edit', $delivery->id) }}">Edit</a></td>
    		<td><a href="{{ action('DeliveryController@delete', $delivery->id) }}">Delete</a></td>
   </tr>
@endforeach
<tr><td colspan="100%" align="right"><a href="{{ action('DeliveryController@create') }}">Add</a></td></tr>
</table>

@stop