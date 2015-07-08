<?php

namespace Care\Http\Controllers;

use DB;
use Input;
use Care\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class RedemptionController extends Controller
{

    public function create()
    {
        return view('redemption');
    }

    public function edit($id)
    {
		$redemption = DB::table('redemption_report')->where('id',$id)->first();
        return view('redemption', ['redemption' => $redemption]);
    }

    public function delete($id)
    {
		DB::table('redemption_report')
            ->where('id', $id)
            ->update(['expired' => 1]
        );
        return Redirect::action('CouponController@index');
    }

    public function handleCreate()
    {

		DB::table('redemption_report')->insert(
		    ['deal_provider_id' => Input::get('deal_provider_id'),'shop_id' => Input::get('shop_id'),'payment_made' => Input::get('payment_made')
		    ,'payment_amount' => Input::get('payment_amount'),'payment_date' => Input::get('payment_date'),'payment_account_id' => Input::get('payment_account_id')
		    ,'payment_verified_by_id' => Input::get('payment_verified_by_id'),'report_csv_file' => Input::get('report_csv_file'),'redemption_date' => Input::get('redemption_date')]
		);
        return Redirect::action('CouponController@index');
    }

    public function handleEdit()
    {
		DB::table('redemption_report')
            ->where('id', Input::get('id'))
            ->update(
		    ['deal_provider_id' => Input::get('deal_provider_id'),'shop_id' => Input::get('shop_id'),'payment_made' => Input::get('payment_made')
		    ,'payment_amount' => Input::get('payment_amount'),'payment_date' => Input::get('payment_date'),'payment_account_id' => Input::get('payment_account_id')
		    ,'payment_verified_by_id' => Input::get('payment_verified_by_id'),'report_csv_file' => Input::get('report_csv_file'),'redemption_date' => Input::get('redemption_date')]
        );
        return Redirect::action('RedemptionController@edit', Input::get('id'));
    }

}