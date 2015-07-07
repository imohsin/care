<?php

namespace Care\Http\Controllers;

use DB;
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
					->join('company', function ($joincompany) {
						$joincompany->on('organization.id', '=', 'company.organization_id')
							 ->where('company.expired', '=', 0);
					})
					->join('opancart_info', function ($joinocinfo) {
						$joinocinfo->on('organization.id', '=', 'opancart_info.organization_id')
							 ->where('opancart_info.expired', '=', 0);
					})
					->join('smtp_info', function ($joinsmtpinfo) {
						$joinsmtpinfo->on('organization.id', '=', 'smtp_info.organization_id')
							 ->where('smtp_info.expired', '=', 0);
					})
					->leftJoin('contact', function ($joincontact) {
						$joincontact->on('company.id', '=', 'contact.company_id')
							 ->where('contact.expired', '=', 0);
					})
			        ->select('organization.*',  DB::raw('count(distinct company.id) as companies'),
		            	'opancart_info.host as ocHost', 'smtp_info.host as smtpHost', DB::raw('count(contact.id) as contacts'))
		            ->where('organization.expired', '=', 0)
		            ->orderBy('organization.long_name')
            		->get();

        return view('organizations', ['organizations' => $organizations]);
    }

    public function create()
    {
        return view('organizations');
    }

    public function edit()
    {
        return view('organizations');
    }

    public function delete()
    {
        return Redirect::action('OrganizationController@index');
    }

    public function handleCreate()
    {
		$org = new Organization;
		$org->short_name = Input::get('shortname');
		$org->long_name = Input::get('longname');
		$org->save();

        return Redirect::action('OrganizationController@index');
    }

    public function handleEdit()
    {
        return view('organizations');
    }

    public function handleDelete()
    {
        return view('organizations');
    }
}