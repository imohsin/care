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
		    ['product_id' => Input::get('product_id'),'deal_number' => Input::get('product_id'),'deal_price' => Input::get('deal_price')]
		);
        return Redirect::action('CouponController@index');
    }

    public function handleEdit()
    {
		DB::table('campaign')
            ->where('id', Input::get('id'))
            ->update(['product_id' => Input::get('product_id'),'deal_number' => Input::get('product_id'),'deal_price' => Input::get('deal_price')]
        );
        return Redirect::action('CampaignController@edit', Input::get('id'));
    }

}