<?php

namespace Care\Http\Controllers;

use DB;
use Care\Http\Controllers\Controller;

class OrganizationController extends Controller
{
    /**
     * Show a list of all of the organizations.
     *
     * @return Response
     */
    public function home()
    {
        //$organizations = DB::select('select * from organization where expired = ?', [0]);
		$organizations = DB::table('organization')
		            ->join('company', 'organization.id', '=', 'company.organization_id')
		            ->join('opancart_info', 'organization.id', '=', 'opancart_info.organization_id')
		            ->join('smtp_info', 'organization.id', '=', 'smtp_info.organization_id')
		            ->leftJoin('contact', 'company.id', '=', 'contact.company_id')
		            ->select('organization.*',  DB::raw('count(distinct company.id) as companies'),
		            	'opancart_info.host as ocHost', 'smtp_info.host as smtpHost', DB::raw('count(contact.id) as contacts'))
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
        return view('organizations');
    }

    public function handleCreate()
    {
		$org = new Organization;
		$org->short_name = Input::get('shortname');
		$org->long_name = Input::get('longname');
		$org->save();

        return Redirect::action('GamesController@index');
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