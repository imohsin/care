<?php

namespace Care\Http\Controllers;

use DB;
use Input;
use Care\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{

    public function create($co)
    {
        return view('contact',['co' => $co]);
    }

    public function edit($id)
    {
		$contact = DB::table('contact')->where('id',$id)->first();
		$companies = DB::table('company')->select('id', 'name')
		 	->where('company.expired', '=', 0)
		 	->orderBy('company.name')
		 	->get();
		$communications = DB::table('communication')
			->where('expired', '=', 0)
			->where('contact_id',$id)
			->get();
        return view('contact', ['contact' => $contact,'companies' => $companies, 'communications' => $communications]);
    }

    public function delete($id, $co)
    {
		DB::table('contact')
            ->where('id', $id)
            ->update(['expired' => 1]
        );
        return Redirect::action('CompanyController@edit', $co);
    }

    public function handleCreate()
    {

		$id = DB::table('contact')->insertGetId(
		    ['company_id' => Input::get('company_id'),'name' => Input::get('name'),'job_title' => Input::get('job_title')]
		);
        return Redirect::action('ContactController@edit', $id);
    }

    public function handleEdit()
    {
		DB::table('contact')
            ->where('id', Input::get('id'))
            ->update(
		    ['company_id' => Input::get('company_id'),'name' => Input::get('name'),'job_title' => Input::get('job_title')]
		);
        return Redirect::action('ContactController@edit', Input::get('id'));
    }

}