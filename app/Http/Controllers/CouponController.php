<?php

namespace Care\Http\Controllers;

use DB;
use Care\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class CouponController extends Controller
{
    /**
     * Show a list of all of the coupons.
     *
     * @return Response
     */
    public function index()
    {
		$coupons = DB::table('coupon')
		            ->select('coupon.*')
		            ->where('expired', '=', 0)
            		->orderBy('coupon.campaign_id')
            		->get();
		$deals = DB::table('deal')
		            ->select('deal.*')
		            ->where('expired', '=', 0)
            		->orderBy('deal.id')
            		->get();
		$campaigns = DB::table('campaign')
		            ->select('campaign.*')
		            ->where('expired', '=', 0)
            		->orderBy('campaign.id')
            		->get();
		$redemptions = DB::table('redemption_report')
		            ->select('redemption_report.*')
		            ->where('expired', '=', 0)
            		->orderBy('redemption_report.id')
            		->get();

        return view('coupons', ['coupons' => $coupons, 'deals' => $deals, 'campaigns' => $campaigns, 'redemptions' => $redemptions]);
    }

    public function create()
    {
        return view('coupons');
    }

    public function edit()
    {
        return view('coupons');
    }

    public function delete($id)
    {
		DB::table('coupon')
            ->where('id', $id)
            ->update(['expired' => 1]
        );
        return Redirect::action('CouponController@index');
    }

    public function handleCreate()
    {
        return Redirect::action('CouponController@index');
    }

    public function handleEdit()
    {
        return view('coupons');
    }

    public function handleDelete()
    {
        return view('coupons');
    }

}