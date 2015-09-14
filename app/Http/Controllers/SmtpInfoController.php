<?php

namespace Care\Http\Controllers;

use DB;
use Input;
use Care\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class SmtpInfoController extends Controller
{

    public function create()
    {
        return view('smtpinfo');
    }

    public function edit($id)
    {
		$smtpinfo = DB::table('smtp_info')->where('id',$id)->first();
        return view('smtpinfo', ['smtpinfo' => $smtpinfo]);
    }

    public function delete($id)
    {
		DB::table('smtp_info')
            ->where('id', $id)
            ->update(['expired' => 1]
        );
        return Redirect::action('OrganizationController@index');
    }

    public function handleCreate()
    {

		DB::table('smtp_info')->insert(
		    ['organization_id' => Input::get('organization_id'),'host' => Input::get('host'),'port' => Input::get('port'),
		    'username' => Input::get('username'),'password' => Input::get('password')]
		);
        return Redirect::action('OrganizationController@index');
    }

    public function handleEdit()
    {
		DB::table('smtp_info')
            ->where('id', Input::get('id'))
            ->update(
		    ['organization_id' => Input::get('organization_id'),'host' => Input::get('host'),'port' => Input::get('port'),
		    'username' => Input::get('username'),'password' => Input::get('password')]
		);
        return Redirect::action('SmtpInfoController@edit', Input::get('id'));
    }

}