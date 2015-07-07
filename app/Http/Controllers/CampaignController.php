<?php

namespace Care\Http\Controllers;

use DB;
use Input;
use Care\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class CampaignController extends Controller
{

    public function create()
    {
        return view('campaign');
    }

    public function edit($id)
    {
		$deal = DB::table('campaign')->where('id',$id)->first();
        return view('campaign', ['campaign' => $deal]);
    }

    public function delete($id)
    {
		DB::table('campaign')
            ->where('id', $id)
            ->update(['expired' => 1]
        );
        return Redirect::action('CouponController@index');
    }

    public function handleCreate()
    {

		DB::table('campaign')->insert(
		    ['deal_provider_id' => Input::get('deal_provider_id'),'shop_id' => Input::get('shop_id'),'campaign_reference' => Input::get('campaign_reference')
		    ,'campaign_start_date' => Input::get('campaign_start_date'),'campaign_end_date' => Input::get('campaign_end_date'),'deal_provider_commission' => Input::get('deal_provider_commission')]
		);
        return Redirect::action('CouponController@index');
    }

    public function handleEdit()
    {
		DB::table('campaign')
            ->where('id', Input::get('id'))
            ->update(
				['deal_provider_id' => Input::get('deal_provider_id'),'shop_id' => Input::get('shop_id'),'campaign_reference' => Input::get('campaign_reference')
		        ,'campaign_start_date' => Input::get('campaign_start_date'),'campaign_end_date' => Input::get('campaign_end_date'),'deal_provider_commission' => Input::get('deal_provider_commission')]
        );
        return Redirect::action('CampaignController@edit', Input::get('id'));
    }

}