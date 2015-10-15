<?php

namespace Care\Http\Controllers;

use DB;
use Input;
use Care\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class OpencartInfoController extends Controller
{

    public function create($org)
    {
		/*$orgs = DB::table('organization')->select('id', 'long_name')
		 	->where('organization.expired', '=', 0)
		 	->orderBy('organization.long_name')
		 	->get();*/
        return view('opencart', ['org' => $org]);
    }

    public function edit($id)
    {
		$opencart = DB::table('opencart_info')->where('id',$id)->first();
		$orgs = DB::table('organization')->select('id', 'long_name')
		 	->where('organization.expired', '=', 0)
		 	->orderBy('organization.long_name')
		 	->get();
        return view('opencart', ['opencart' => $opencart, 'orgs' => $orgs]);
    }

    public function delete($id, $org)
    {
		DB::table('opencart_info')
            ->where('id', $id)
            ->update(['expired' => 1]
        );
        return Redirect::action('OrganizationController@edit', $org);
    }

    public function handleCreate()
    {

		$id = DB::table('opencart_info')->insertGetId(
		    ['organization_id' => Input::get('organization_id'),'driver' => Input::get('driver'),'host' => Input::get('host'),
		    'username' => Input::get('username'),'password' => Input::get('password'),'database' => Input::get('database'),'prefix' => Input::get('prefix')]
		);

        return Redirect::action('OpencartInfoController@edit', $id);
    }

    public function handleEdit()
    {
		DB::table('opencart_info')
            ->where('id', Input::get('id'))
            ->update(
		    ['organization_id' => Input::get('organization_id'),'driver' => Input::get('driver'),'host' => Input::get('host'),
		    'username' => Input::get('username'),'password' => Input::get('password'),'database' => Input::get('database'),'prefix' => Input::get('prefix')]
        );
        return Redirect::action('OpencartInfoController@edit', Input::get('id'));
    }

}