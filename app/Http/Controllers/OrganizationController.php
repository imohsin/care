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
        //$organizations = DB::select('select * from organization where expired = ?', [0]);
		$organizations = DB::table('organization')
					->leftJoin('company', function ($joincompany) {
						$joincompany->on('organization.id', '=', 'company.organization_id')
							 ->where('company.expired', '=', 0);
					})
					->leftJoin('opencart_info', function ($joinocinfo) {
						$joinocinfo->on('organization.id', '=', 'opencart_info.organization_id')
							 ->where('opencart_info.expired', '=', 0);
					})
					->leftJoin('smtp_info', function ($joinsmtpinfo) {
						$joinsmtpinfo->on('organization.id', '=', 'smtp_info.organization_id')
							 ->where('smtp_info.expired', '=', 0);
					})
					->leftJoin('contact', function ($joincontact) {
						$joincontact->on('company.id', '=', 'contact.company_id')
							 ->where('contact.expired', '=', 0);
					})
			        ->select('organization.*',  DB::raw('count(distinct company.id) as companies'),
		            	'opencart_info.host as ocHost', 'smtp_info.host as smtpHost', DB::raw('count(distinct contact.id) as contacts'))
		            ->where('organization.expired', '=', 0)
		            ->orderBy('organization.long_name')
            		->get();

        return view('organizations', ['organizations' => $organizations]);
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
			$companies = DB::table('company')->where('organization_id',$id)->get();
			$opencartInfos = DB::table('opencart_info')->where('organization_id',$id)->get();
			$smtpInfos = DB::table('smtp_info')->where('organization_id',$id)->get();

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