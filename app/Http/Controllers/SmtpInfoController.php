<?php

namespace Care\Http\Controllers;

use DB;
use Auth;
use Care\User;
use Input;
use Care\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class SmtpInfoController extends Controller
{

    public function create($org)
    {
        return view('smtpinfo',['org' => $org]);
    }

    public function edit($id)
    {
	    $uid = Auth::user()->id;
	    $currentUser = User::find($uid);
		$smtpinfo = DB::table('smtp_info')->where('id',$id)->first();
		$orgs = DB::table('organization')->select('id', 'long_name')
		 	->where('organization.expired', '=', 0)
		 	->where('organization.id', '=',	$currentUser->organization_id)
		 	->orderBy('organization.long_name')
		 	->get();
        return view('smtpinfo', ['smtpinfo' => $smtpinfo,'orgs' => $orgs]);
    }

    public function delete($id, $org)
    {
		DB::table('smtp_info')
            ->where('id', $id)
            ->update(['expired' => 1]
        );
        return Redirect::action('OrganizationController@edit', $org);
    }

    public function handleCreate()
    {

		$id = DB::table('smtp_info')->insertGetId(
		    ['organization_id' => Input::get('organization_id'),'host' => Input::get('host'),'port' => Input::get('port'),
		    'username' => Input::get('username'),'password' => Input::get('password')]
		);
        return Redirect::action('SmtpInfoController@edit', $id);
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