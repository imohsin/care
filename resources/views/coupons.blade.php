@extends('base')

@section('body')

<h3>Coupons</h3>
<table  cellpadding="10" border="1">
<tr><td>Campaign Id</td>
    <td>Coupon Code</td>
	<td>Value</td>
	<td>Is Permanent</td>
	<td>Use Once</td>
	<td>Is Used</td>
	<td>Active</td>
	<td>Every Product</td>
	<td>Start</td>
	<td>Expiry</td>
	<td>Condition</td>
	<td>Coupon Redeemed</td>
	<td>Coupon Date Redeemed</td>
	<td>{{--edit--}}</td>
	<td>{{--delete--}}</td></tr>
@foreach ($coupons as $coupon)
   <tr><td>{{ $coupon->campaign_id }}</td>
		<td>{{ $coupon->coupon_code }}</td>
		<td>{{ $coupon->value }}</td>
		<td>{{ $coupon->is_percentage }}</td>
		<td>{{ $coupon->use_once }}</td>
		<td>{{ $coupon->is_used }}</td>
		<td>{{ $coupon->active }}</td>
		<td>{{ $coupon->every_product }}</td>
		<td>{{ $coupon->start }}</td>
		<td>{{ $coupon->expiry }}</td>
		<td>{{ $coupon->condition }}</td>
		<td>{{ $coupon->coupon_redeemed }}</td>
		<td>{{ $coupon->coupon_date_redeemed }}</td>
		<td><a href="{{ action('CouponController@edit', ['id' => $coupon->campaign_id,'code' => $coupon->coupon_code]) }}">Edit</a></td>
		<td><a href="{{ action('CouponController@delete', ['id' => $coupon->campaign_id,'code' => $coupon->coupon_code]) }}">Delete</a></td>
   </tr>
@endforeach
<tr><td colspan="100%" align="right"><a href="{{ action('CouponController@create') }}">Add</a></td></tr>
</table>

{{-- deals and campaigns --}}
<table><tr><td>

<h3>Deals</h3>
<table  cellpadding="10" border="1">
<tr><td>Id</td>
    <td>Product Id</td>
	<td>Deal Number</td>
	<td>Deal Price</td>
	<td>{{--edit--}}</td>
	<td>{{--delete--}}</td></tr>
@foreach ($deals as $deal)
   <tr><td>{{ $deal->id }}</td>
		<td>{{ $deal->product_id }}</td>
		<td>{{ $deal->deal_number }}</td>
		<td>{{ $deal->deal_price }}</td>
		<td><a href="{{ action('CouponController@edit', $deal->id) }}">Edit</a></td>
		<td><a href="{{ action('CouponController@delete', $deal->id) }}">Delete</a></td>
   </tr>
@endforeach
<tr><td colspan="100%" align="right"><a href="{{ action('CouponController@create') }}">Add</a></td></tr>
</table>

</td><td width="100">&nbsp;</td><td>

<h3>Campaigns</h3>
<table  cellpadding="10" border="1">
<tr><td>Id</td>
    <td>Deal Provider Id</td>
	<td>Shop Id</td>
	<td>Campaign Reference</td>
	<td>Campaign Start Date</td>
	<td>Campaign End Date</td>
	<td>Deal Provider Commission</td>
	<td>{{--edit--}}</td>
	<td>{{--delete--}}</td></tr>
@foreach ($campaigns as $campaign)
   <tr><td>{{ $campaign->id }}</td>
		<td>{{ $campaign->deal_provider_id }}</td>
		<td>{{ $campaign->shop_id }}</td>
		<td>{{ $campaign->campaign_reference }}</td>
		<td>{{ $campaign->campaign_start_date }}</td>
		<td>{{ $campaign->campaign_end_date }}</td>
		<td>{{ $campaign->deal_provider_commission }}</td>
		<td><a href="{{ action('CouponController@edit', $campaign->id) }}">Edit</a></td>
		<td><a href="{{ action('CouponController@delete', $campaign->id) }}">Delete</a></td>
   </tr>
@endforeach
<tr><td colspan="100%" align="right"><a href="{{ action('CouponController@create') }}">Add</a></td></tr>
</table>

</td></tr></table>

<h3>Redemptions</h3>
<table  cellpadding="10" border="1">
<tr><td>Id</td>
    <td>Deal Provider Id</td>
	<td>Shop Id</td>
	<td>Payment Made</td>
	<td>Payment Amount</td>
	<td>Payment Date</td>
	<td>Payment Account Id</td>
	<td>Payment Verified By Id</td>
	<td>Report Csv File</td>
	<td>Redemption Date</td>
	<td>{{--edit--}}</td>
	<td>{{--delete--}}</td></tr>
@foreach ($redemptions as $redemption)
   <tr><td>{{ $redemption->id }}</td>
		<td>{{ $redemption->deal_provider_id }}</td>
		<td>{{ $redemption->shop_id }}</td>
		<td>{{ $redemption->payment_made }}</td>
		<td>{{ $redemption->payment_amount }}</td>
		<td>{{ $redemption->payment_date }}</td>
		<td>{{ $redemption->payment_account_id }}</td>
		<td>{{ $redemption->payment_verified_by_id }}</td>
		<td>{{ $redemption->report_csv_file }}</td>
		<td>{{ $redemption->redemption_date }}</td>
		<td><a href="{{ action('CouponController@edit', $redemption->id) }}">Edit</a></td>
		<td><a href="{{ action('CouponController@delete', $redemption->id) }}">Delete</a></td>
   </tr>
@endforeach
<tr><td colspan="100%" align="right"><a href="{{ action('CouponController@create') }}">Add</a></td></tr>
</table>

@stop