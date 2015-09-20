<?php

namespace Care\Http\Controllers;

use DB;
use Input;
use Care\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class BackofficeController extends Controller
{

    public function create($co)
    {
        return view('backoffice',['co' => $co]);
    }

    public function edit($id)
    {
		$backoffice = DB::table('company_backoffice')->where('id',$id)->first();
		$companies = DB::table('company')->select('id', 'name')
		 	->where('company.expired', '=', 0)
		 	->orderBy('company.name')
		 	->get();
        return view('backoffice', ['backoffice' => $backoffice,'companies' => $companies]);
    }

    public function delete($id, $co)
    {
		DB::table('company_backoffice')
            ->where('id', $id)
            ->update(['expired' => 1]
        );
        return Redirect::action('CompanyController@edit', $co);
    }

    public function handleCreate()
    {

		$id = DB::table('company_backoffice')->insertGetId(
		    ['company_id' => Input::get('company_id'),'url' => Input::get('url'),'username' => Input::get('username'),'password' => Input::get('password')]
		);
        return Redirect::action('BackofficeController@edit', $id);
    }

    public function handleEdit()
    {
		DB::table('company_backoffice')
            ->where('id', Input::get('id'))
            ->update(
		    ['company_id' => Input::get('company_id'),'url' => Input::get('url'),'username' => Input::get('username'),'password' => Input::get('password')]
		);
        return Redirect::action('BackofficeController@edit', Input::get('id'));
    }

}