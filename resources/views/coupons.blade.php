@extends('base')

@section('title', 'Coupons')

@section('body')

<div class="panel panel-default">
  <div class="panel-heading">Deals</div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Product Id</th>
        <th>Deal Number</th>
        <th>Deal Price</th>
        <th>{{--edit/delete--}}</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($deals as $deal)
        <tr>
          <td>{{ $deal->id }}</td>
          <td>{{ $deal->product_id }}</td>
          <td>{{ $deal->deal_number }}</td>
          <td>{{ $deal->deal_price }}</td>
          <td>
            <div class="pull-right">
              <a class="btn btn-sm btn-default" href="{{ action('DealController@edit', $deal->id) }}">Edit</a>
              <a class="btn btn-sm btn-default" href="{{ action('DealController@delete', $deal->id) }}">Delete</a>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div class="panel-footer clearfix">
    <a class="btn btn-sm btn-primary pull-right" href="{{ action('DealController@create') }}">Add</a>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">Campaigns</div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Campaign</th>
        <th>End</th>
        <th>Commission</th>
        <th>{{--edit/delete--}}</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($campaigns as $campaign)
        <tr>
          <td>{{ $campaign->campaign_reference }}</td>
          <td>{{ $campaign->campaign_end_date }}</td>
          <td>{{ $campaign->deal_provider_commission }}</td>
          <td>
            <div class="pull-right">
              <a class="btn btn-sm btn-default" href="{{ action('CampaignController@edit', $campaign->id) }}">Edit</a>
              <a class="btn btn-sm btn-default" href="{{ action('CampaignController@delete', $campaign->id) }}">Delete</a>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div class="panel-footer clearfix">
    <a class="btn btn-sm btn-primary pull-right" href="{{ action('CampaignController@create') }}">Add</a>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">Coupons</div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Coupon Code</th>
        <th>Campaign Id</th>
        <th>Value</th>
        <th>Start</th>
        <th>Expiry</th>
        <th>Redeemed</th>
        <th>Redeemed Date</th>
        <th>{{--edit/delete--}}</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($coupons as $coupon)
        <tr>
          <td>{{ $coupon->coupon_code }}</td>
          <td>{{ $coupon->campaign_id }}</td>
          <td>{{ $coupon->value }}</td>
          <td>{{ $coupon->start }}</td>
          <td>{{ $coupon->expiry }}</td>
          <td>{{ $coupon->coupon_redeemed }}</td>
          <td>{{ $coupon->coupon_date_redeemed }}</td>
          <td>
            <div class="pull-right">
              <a class="btn btn-sm btn-default" href="{{ action('CouponController@edit', ['id' => $coupon->campaign_id,'code' => $coupon->coupon_code]) }}">Edit</a>
              <a class="btn btn-sm btn-default" href="{{ action('CouponController@delete', ['id' => $coupon->campaign_id,'code' => $coupon->coupon_code]) }}">Delete</a>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div class="panel-footer clearfix">
    <a class="btn btn-sm btn-primary pull-right" href="{{ action('CouponController@create') }}">Add</a>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">Redemptions</div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Deal Provider Id</th>
        <th>Shop Id</th>
        <th>Payment Made</th>
        <th>Payment Amount</th>
        <th>Payment Date</th>
        <th>Payment Account Id</th>
        <th>Payment Verified By Id</th>
        <th>Report Csv File</th>
        <th>Redemption Date</th>
        <th>{{--edit/delete--}}</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($redemptions as $redemption)
        <tr>
          <td>{{ $redemption->id }}</td>
          <td>{{ $redemption->deal_provider_id }}</td>
          <td>{{ $redemption->shop_id }}</td>
          <td>{{ $redemption->payment_made }}</td>
          <td>{{ $redemption->payment_amount }}</td>
          <td>{{ $redemption->payment_date }}</td>
          <td>{{ $redemption->payment_account_id }}</td>
          <td>{{ $redemption->payment_verified_by_id }}</td>
          <td>{{ $redemption->report_csv_file }}</td>
          <td>{{ $redemption->redemption_date }}</td>
          <td>
            <div class="pull-right">
              <a class="btn btn-sm btn-default" href="{{ action('RedemptionController@edit', $redemption->id) }}">Edit</a>
              <a class="btn btn-sm btn-default" href="{{ action('RedemptionController@delete', $redemption->id) }}">Delete</a>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div class="panel-footer clearfix">
    <a class="btn btn-sm btn-primary pull-right" href="{{ action('RedemptionController@create') }}">Add</a>
  </div>
</div>

@stop