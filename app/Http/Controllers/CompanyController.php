<?php

namespace Care\Http\Controllers;

use DB;
use Input;
use Care\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class CompanyController extends Controller
{

    public function create()
    {
        return view('company');
    }

    public function edit($id)
    {
		$company = DB::table('company')->where('id',$id)->first();
        return view('company', ['company' => $company]);
    }

    public function delete($id)
    {
		//DB::table('deal')->where('id',$id)->delete();
		DB::table('company')
            ->where('id', $id)
            ->update(['expired' => 1]
        );
        return Redirect::action('OrganizationController@index');
    }

    public function handleCreate()
    {

		DB::table('company')->insert(
		    ['organization_id' => Input::get('organization_id'),'company_type_id' => Input::get('company_type_id'),'name' => Input::get('name')]
		);
        return Redirect::action('OrganizationController@index');
    }

    public function handleEdit()
    {
		DB::table('company')
            ->where('id', Input::get('id'))
            ->update(['organization_id' => Input::get('organization_id'),'company_type_id' => Input::get('company_type_id'),'name' => Input::get('name')]
        );
        return Redirect::action('CompanyController@edit', Input::get('id'));
    }

}