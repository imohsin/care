<?php

namespace Care\Http\Controllers;

use DB;
use Input;
use Care\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class DeliveryController extends Controller
{

    /**
     * Show a list of all of the deliveries.
     *
     * @return Response
     */
    public function index()
    {
		$deliveries = DB::table('delivery')
		            ->select('delivery.*')
		            ->where('expired', '=', 0)
            		->orderBy('delivery.id')
            		->get();

        return view('deliveries', ['deliveries' => $deliveries]);
    }

    public function create()
    {
        return view('delivery');
    }

    public function edit($id)
    {
		$delivery = DB::table('delivery')->where('id',$id)->first();
        return view('delivery', ['delivery' => $delivery]);
    }

    public function delete($id)
    {
		DB::table('delivery')
            ->where('id', $id)
            ->update(['expired' => 1]
        );
        return Redirect::action('DeliveryController@index');
    }

    public function handleCreate()
    {

		DB::table('delivery')->insert([
            'shop_id' => Input::get('shop_id'),
            'courier_id' => Input::get('courier_id'),
            'purchase_id' => Input::get('purchase_id'),
		    'tracking_number' => Input::get('tracking_number'),
            'dispatch_date' => Input::get('dispatch_date'),
            'customer_name' => Input::get('customer_name'),
		    'delivery_address' => Input::get('delivery_address'),
            'contact_number' => Input::get('contact_number'),
            'delivery_notes' => Input::get('delivery_notes')
        ]);
        return Redirect::action('DeliveryController@index');
    }

    public function handleEdit()
    {
		DB::table('delivery')
            ->where('id', Input::get('id'))
            ->update([
                'shop_id' => Input::get('shop_id'),
                'courier_id' => Input::get('courier_id'),
                'purchase_id' => Input::get('purchase_id'),
                'tracking_number' => Input::get('tracking_number'),
                'dispatch_date' => Input::get('dispatch_date'),
                'customer_name' => Input::get('customer_name'),
                'delivery_address' => Input::get('delivery_address'),
                'contact_number' => Input::get('contact_number'),
                'delivery_notes' => Input::get('delivery_notes')
        ]);
        return Redirect::action('DeliveryController@edit', Input::get('id'));
    }

}