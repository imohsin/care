<?php

namespace Care\Http\Controllers;

use Auth;
use Care\User;
use DB;
use Input;
use Validator;
use Schema;
use Care\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class ImportController extends Controller
{

    public function create()
    {
	    $id = Auth::user()->id;
	    $currentUser = User::find($id);
		$shops = DB::table('company')
				->where('expired', '=', 0)
				->where('company_type_id', '=', 1)
				->orderBy('name')
				->get();
		$templates = DB::table('import_type')
				->where('expired', '=', 0)
				->orderBy('sort_order')
				->get();
	  	return view('import', ['shops' => $shops, 'templates' => $templates]);
    }

    public function display($table, $id)
    {
		$imports = DB::table($table)
				->where('shop_id', '=', $id)
				->get();
		$columns = Schema::getColumnListing($table);
        return view('import', ['imports' => $imports, 'columns' => $columns]);
    }

    public function handleCreate()
    {

	  // getting all of the post data
	  $file = Input::file('import_file');
	  // setting up rules
	  $rules = array('import_file' => 'required');
	  // doing the validation, passing post data, rules and the messages
	  $validator = Validator::make(
		['file' => $file,'extension' => strtolower($file->getClientOriginalExtension())],
		['file' => 'required','extension' => 'required|in:csv']
	  );
	  if ($validator->fails()) {
		// send back to the page with the input data and errors
		return Redirect::to('import')->withInput()->withErrors($validator);
	  }
	  else {

		  //exists and readable?
		  if(file_exists($file) && is_readable($file)) {

			$name = time() . $file->getClientOriginalName();
			$path = base_path() . '/storage/imports/';
			// Move file to folder on server
			$file->move($path, $name);
			$table = 'import_' . strtolower(Input::get('supplier_name'));
			$shop_id = Input::get('shop_id');
			$account_number = Input::get('account_number');
			//Import uploaded file to Database
			$handle = fopen($path . $name, "r");
			$firstline = true;
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				if($firstline) { $firstline = false; continue; }
				$insert = sprintf("INSERT IGNORE INTO %s VALUES(%s, %s, %s)", addslashes($table),
					("'" . $shop_id ."'"),("'" . $account_number ."'"), $this->getColumnValueData($data));
				DB::insert($insert);
			}

			return Redirect::action('ImportController@display', ['table' => $table, 'id' => $shop_id]);

		  }//file exists

	  }//validation

	  echo "something is amiss...";

    }

	private function getColumnValueData($data) {
		$cvd = '';
		$length = count($data);
		for($i=0;$i<$length;$i++) {
			$cvd = $cvd . "'" . str_replace(array("'", "\"", "&quot;"), "", htmlspecialchars($data[$i])) . "'";
			if(!($i==($length - 1)))
				$cvd = $cvd . ",";
		}

		return $cvd;
	}

}