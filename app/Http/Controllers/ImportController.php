<?php

namespace Care\Http\Controllers;

use DB;
use Input;
use Validator;
use Care\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class ImportController extends Controller
{

    public function create()
    {
		$suppliers = DB::table('import_supplier')
		 	->where('expired', '=', 0)
		 	->orderBy('sort_order')
		 	->get();
        return view('import', ['suppliers' => $suppliers]);
    }

    public function display($imp)
    {
        return view('import', ['imp' => $imp]);
    }

    public function handleCreate()
    {

	  // getting all of the post data
	  $file = array('import_file' => Input::file('import_file'));
	  // setting up rules
	  $rules = array('import_file' => 'required|mimes:xls,xlsx,csv',);
	  // doing the validation, passing post data, rules and the messages
	  $validator = Validator::make($file, $rules);
	  if ($validator->fails()) {
		// send back to the page with the input data and errors
		return Redirect::to('import')->withInput()->withErrors($validator);
	  }
	  else {
		  //do something
	  }

		/*$id = DB::table('import_paypal')->insertGetId(
		    ['company_id' => Input::get('company_id'),'url' => Input::get('url'),'username' => Input::get('username'),'password' => Input::get('password')]
		);*/
        //return Redirect::action('ImportController@display', 'id');
    }

}