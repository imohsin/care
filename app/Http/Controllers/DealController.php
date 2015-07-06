<?php

namespace Care\Http\Controllers;

use DB;
use Input;
use Care\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class DealController extends Controller
{

    public function create()
    {
        return view('createdeal');
    }

    public function edit()
    {
        return view('editdeal');
    }

    public function delete()
    {
        return Redirect::action('CouponController@home');
    }

    public function handleCreate()
    {

		DB::table('deal')->insert(
		    ['product_id' => Input::get('product_id'),'deal_number' => Input::get('product_id'),'deal_price' => Input::get('deal_price')]
		);

        return Redirect::action('CouponController@home');
    }

    public function handleEdit()
    {
        return view('editdeal');
    }

    public function handleDelete()
    {
        return Redirect::action('CouponController@home');
    }

}