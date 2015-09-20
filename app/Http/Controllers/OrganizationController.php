<?php

namespace Care\Http\Controllers;

use DB;
use Input;
use Care\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class OrganizationController extends Controller
{
    /**
     * Show a list of all of the organizations.
     *
     * @return Response
     */
    public function index()
    {

		$organizations = DB::table('organization')
		            ->where('expired', '=', 0)
            		->orderBy('organization.long_name')
            		->get();
		$companies = DB::table('company')
		            ->where('expired', '=', 0)
            		->get();
		$ocInfos = DB::table('opencart_info')
		            ->where('expired', '=', 0)
            		->get();
		$smtpInfos = DB::table('smtp_info')
		            ->where('expired', '=', 0)
            		->get();

        return view('organizations', ['organizations' => $organizations,'companies' => $companies,
        							'ocInfos' => $ocInfos,'smtpInfos' => $smtpInfos]);
    }

    public function create()
    {
        return view('organization');
    }

    public function edit($id)
    {
		$organization = DB::table('organization')->where('id',$id)->where('organization.expired', '=', 0)->first();
		if(is_null($organization)) {
			return Redirect::action('OrganizationController@index');
		} else {
			$companies = DB::table('company')->where('organization_id',$id)->where('company.expired', '=', 0)->get();
			$opencartInfos = DB::table('opencart_info')->where('organization_id',$id)->where('opencart_info.expired', '=', 0)->get();
			$smtpInfos = DB::table('smtp_info')->where('organization_id',$id)->where('smtp_info.expired', '=', 0)->get();

			return view('organization', ['organization' => $organization,'companies' => $companies,
						'opencartInfos' => $opencartInfos,'smtpInfos' => $smtpInfos,]);
		}
    }

    public function delete($id)
    {
 		DB::table('organization')
             ->where('id', $id)
             ->update(['expired' => 1]
         );
        return Redirect::action('OrganizationController@index');
    }

    public function handleCreate()
    {
		$id = DB::table('organization')->insertGetId(
		    ['short_name' => Input::get('short_name'),'long_name' => Input::get('long_name')]
		);
        return Redirect::action('OrganizationController@edit', $id);
    }

    public function handleEdit()
    {
		DB::table('organization')
            ->where('id', Input::get('id'))
            ->update(
		    ['short_name' => Input::get('short_name'),'long_name' => Input::get('long_name')]
		);
        return Redirect::action('OrganizationController@edit', Input::get('id'));
    }

}