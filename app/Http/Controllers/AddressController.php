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
		$countries = DB::table('country')
		 	->where('country.expired', '=', 0)
		 	->orderBy('country.sort_order')
		 	->get();
        return view('address',['co' => $co,'countries' => $countries]);
    }

    public function edit($id)
    {
		$address = DB::table('address')->where('id',$id)->first();
		$companies = DB::table('company')->select('id', 'name')
		 	->where('company.expired', '=', 0)
		 	->orderBy('company.name')
		 	->get();
		$countries = DB::table('country')
		 	->where('country.expired', '=', 0)
		 	->orderBy('country.sort_order')
		 	->get();
        return view('address', ['address' => $address,'companies' => $companies,'countries' => $countries]);
    }

    public function delete($id, $co)
    {
		DB::table('address')
            ->where('id', $id)
            ->update(['expired' => 1]
        );
        return Redirect::action('CompanyController@edit', $co);
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