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
    public function home()
    {
		$coupons = DB::table('coupon')
		            ->select('coupon.*')
            		->orderBy('coupon.campaign_id')
            		->get();

        return view('coupons', ['coupons' => $coupons]);
    }

    public function create()
    {
        return view('coupons');
    }

    public function edit()
    {
        return view('coupons');
    }

    public function delete()
    {
        return Redirect::action('CouponController@home');
    }

    public function handleCreate()
    {
		$org = new Organization;
		$org->short_name = Input::get('shortname');
		$org->long_name = Input::get('longname');
		$org->save();

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