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
		$orgs = DB::table('organization')->select('id', 'long_name')
			->where('organization.expired', '=', 0)
			->orderBy('organization.long_name')
			->get();
		$cotypes = DB::table('company_type')->select('id', 'type')
			->where('company_type.expired', '=', 0)
			->orderBy('company_type.type')
			->get();

        return view('company', ['orgs' => $orgs, 'cotypes' => $cotypes]);
    }

    public function edit($id)
    {
		$company = DB::table('company')->where('id',$id)->first();
		$orgs = DB::table('organization')->select('id', 'long_name')
		 	->where('organization.expired', '=', 0)
		 	->orderBy('organization.long_name')
		 	->get();
		$cotypes = DB::table('company_type')->select('id', 'type')
			->where('company_type.expired', '=', 0)
			->orderBy('company_type.type')
			->get();

        return view('company', ['company' => $company, 'orgs' => $orgs, 'cotypes' => $cotypes]);
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

		$id = DB::table('company')->insertGetId(
		    ['organization_id' => Input::get('organization_id'),'company_type_id' => Input::get('company_type_id'),'name' => Input::get('name')]
		);

        return Redirect::action('CompanyController@edit', $id)->withInput();
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