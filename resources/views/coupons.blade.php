@extends('base')

@section('body')

<h3>Coupons</h3>
<table  cellpadding="10" border="1">
<tr><td>Coupon Code</td>
	<td>Value</td>
	<td>Is Permanent</td>
	<td>Use Once</td>
	<td>Is Used</td>
	<td>Active</td>
	<td>Every Product</td>
	<td>Start</td>
	<td>Expiry</td>
	<td>Condition</td>
	<td>Coupon_redeemed</td>
	<td>Coupon Date Redeemed</td>
	<td>{{--edit--}}</td>
	<td>{{--delete--}}</td></tr>
@foreach ($coupons as $coupon)
   <tr><td>{{ $coupon->campaign_id }}</td>
    		<td>{{ $coupon->coupon_code }}</td>
    		<td>{{ $coupon->value }}</td>
    		<td>{{ $coupon->is-percentage }}</td>
    		<td>{{ $coupon->use-once }}</td>
    		<td>{{ $coupon->is-used }}</td>
    		<td>{{ $coupon->active }}</td>
    		<td>{{ $coupon->every_product }}</td>
    		<td>{{ $coupon->start }}</td>
    		<td>{{ $coupon->expiry }}</td>
    		<td>{{ $coupon->condition }}</td>
    		<td>{{ $coupon->coupon_redeemed }}</td>
    		<td>{{ $coupon->coupon_date_redeemed }}</td>
    		<td><a href="{{ action('CouponController@edit', $coupon->campaign_id) }}">Edit</a></td>
    		<td><a href="{{ action('CouponController@delete', $coupon->campaign_id) }}">Delete</a></td>
   </tr>
@endforeach
<tr><td colspan="100%" align="right"><a href="{{ action('CouponController@create') }}">Add</a></td></tr>
</table>

@stop