<?php

namespace Care\Http\Controllers;

use DB;
use Input;
use Care\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class AddressController extends Controller
{

    public function create($co)
    {
        return view('address',['co' => $co]);
    }

    public function edit($id)
    {
		$address = DB::table('address')->where('id',$id)->first();
		$companies = DB::table('company')->select('id', 'name')
		 	->where('company.expired', '=', 0)
		 	->orderBy('company.name')
		 	->get();
        return view('address', ['address' => $address,'companies' => $companies]);
    }

    public function delete($id, $co)
    {
		DB::table('address')
            ->where('id', $id)
            ->update(['expired' => 1]
        );
        return Redirect::action('AddressController@edit', $co);
    }

    public function handleCreate()
    {

		$id = DB::table('address')->insertGetId(
		    ['company_id' => Input::get('company_id'),'address1' => Input::get('address1'),'address2' => Input::get('address2'),
		     'city' => Input::get('city'),'state' => Input::get('state'),'zip' => Input::get('zip'),'country_id' => Input::get('country_id')]
		);
        return Redirect::action('AddressController@edit', $id);
    }

    public function handleEdit()
    {
		DB::table('address')
            ->where('id', Input::get('id'))
            ->update(
		    ['company_id' => Input::get('company_id'),'address1' => Input::get('address1'),'address2' => Input::get('address2'),
		     'city' => Input::get('city'),'state' => Input::get('state'),'zip' => Input::get('zip'),'country_id' => Input::get('country_id')]
		);
        return Redirect::action('AddressController@edit', Input::get('id'));
    }

}