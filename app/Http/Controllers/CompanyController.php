<?php

namespace Care\Http\Controllers;

use DB;
use Auth;
use Care\User;
use Input;
use Care\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class CompanyController extends Controller
{

    public function create($org)
    {
		$cotypes = DB::table('company_type')->select('id', 'type')
			->where('company_type.expired', '=', 0)
			->orderBy('company_type.id')
			->get();

        return view('company', ['org' => $org, 'cotypes' => $cotypes]);
    }

    public function edit($id)
    {
	    $id = Auth::user()->id;
	    $currentUser = User::find($id);
		$company = DB::table('company')->where('id',$id)->first();
		$orgs = DB::table('organization')->select('id', 'long_name')
		 	->where('organization.expired', '=', 0)
		 	->where('organization.id', '=',	$currentUser->organization_id)
		 	->orderBy('organization.long_name')
		 	->get();
		$cotypes = DB::table('company_type')->select('id', 'type')
			->where('company_type.expired', '=', 0)
			->orderBy('company_type.type')
			->get();
		$contacts = DB::table('contact')
			->where('expired', '=', 0)
			->where('company_id',$id)
			->get();
		$addresses = DB::table('address')
			->where('expired', '=', 0)
			->where('company_id',$id)
			->get();
		$backoffices = DB::table('company_backoffice')
			->where('expired', '=', 0)
			->where('company_id',$id)
			->get();
		$deals = DB::table('deal')
			->where('expired', '=', 0)
			->where('company_id',$id)
			->get();

        return view('company', ['company' => $company, 'orgs' => $orgs, 'cotypes' => $cotypes, 'contacts' => $contacts
        						, 'addresses' => $addresses, 'backoffices' => $backoffices, 'deals' => $deals]);
    }

    public function delete($id, $org)
    {
		//DB::table('deal')->where('id',$id)->delete();
		DB::table('company')
            ->where('id', $id)
            ->update(['expired' => 1]
        );
        return Redirect::action('OrganizationController@edit', $org);
    }

    public function handleCreate()
    {

		$id = DB::table('company')->insertGetId(
		    ['organization_id' => Input::get('organization_id'),'company_type_id' => Input::get('company_type_id'),'name' => Input::get('name')]
		);

        return Redirect::action('CompanyController@edit', $id);
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