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
        return view('coupon');
    }

    public function edit($id, $code)
    {
		$coupon = DB::table('coupon')->where('campaign_id',$id)->where('coupon_code',$code)->first();
        return view('coupon', ['coupon' => $coupon]);
    }

    public function delete($id, $code)
    {
		DB::table('coupon')
            ->where('campaign_id', $id)
            ->where('coupon_code', $code)
            ->update(['expired' => 1]
        );
        return Redirect::action('CouponController@index');
    }

    public function handleCreate()
    {

		DB::table('coupon')->insert(
		    ['deal_provider_id' => Input::get('deal_provider_id'),'shop_id' => Input::get('shop_id'),'campaign_reference' => Input::get('campaign_reference')
		    ,'campaign_start_date' => Input::get('campaign_start_date'),'campaign_end_date' => Input::get('campaign_end_date'),'deal_provider_commission' => Input::get('deal_provider_commission')]
		);
        return Redirect::action('CouponController@index');
    }

    public function handleEdit()
    {
		DB::table('coupon')
            ->where('campaign_id', Input::get('id'))
            ->where('coupon_code', Input::get('code'))
            ->update(
				['deal_provider_id' => Input::get('deal_provider_id'),'shop_id' => Input::get('shop_id'),'campaign_reference' => Input::get('campaign_reference')
		        ,'campaign_start_date' => Input::get('campaign_start_date'),'campaign_end_date' => Input::get('campaign_end_date'),'deal_provider_commission' => Input::get('deal_provider_commission')]
        );
        return Redirect::action('CampaignController@edit', array(Input::get('id'), Input::get('code')));
    }

}