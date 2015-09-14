<?php

namespace Care\Http\Controllers;

use DB;
use Input;
use Care\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class OpencartInfoController extends Controller
{

    public function create()
    {
        return view('opencart');
    }

    public function edit($id)
    {
		$opencart = DB::table('opencart_info')->where('id',$id)->first();
        return view('opencart', ['opencart' => $opencart]);
    }

    public function delete($id)
    {
		DB::table('opencart_info')
            ->where('id', $id)
            ->update(['expired' => 1]
        );
        return Redirect::action('OrganizationController@index');
    }

    public function handleCreate()
    {

		DB::table('opencart_info')->insert(
		    ['organization_id' => Input::get('organization_id'),'driver' => Input::get('driver'),'host' => Input::get('host'),
		    'username' => Input::get('username'),'password' => Input::get('password'),'database' => Input::get('database'),'prefix' => Input::get('prefix')]
		);
        return Redirect::action('OrganizationController@index');
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