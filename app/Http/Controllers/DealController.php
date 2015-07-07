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
        return view('deal');
    }

    public function edit($id)
    {
		$deal = DB::table('deal')->where('id',$id)->first();
        return view('deal', ['deal' => $deal]);
    }

    public function delete()
    {
        return Redirect::action('CouponController@index');
    }

    public function handleCreate()
    {

		DB::table('deal')->insert(
		    ['product_id' => Input::get('product_id'),'deal_number' => Input::get('product_id'),'deal_price' => Input::get('deal_price')]
		);
        return Redirect::action('CouponController@index');
    }

    public function handleEdit()
    {
		DB::table('deal')
            ->where('id', Input::get('id'))
            ->update(['product_id' => Input::get('product_id'),'deal_number' => Input::get('product_id'),'deal_price' => Input::get('deal_price')]
        );
        return Redirect::action('DealController@edit', Input::get('id'));
    }

    public function handleDelete()
    {
        return Redirect::action('CouponController@index');
    }

}