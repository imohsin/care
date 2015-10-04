<?php

namespace Care\Http\Controllers;

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
		$suppliers = DB::table('import_supplier')
		 	->where('expired', '=', 0)
		 	->orderBy('sort_order')
		 	->get();
        return view('import', ['suppliers' => $suppliers]);
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
			$importId = Input::get('import_id');
			//Import uploaded file to Database
			$handle = fopen($path . $name, "r");
			$firstline = true;
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				if($firstline) { $firstline = false; continue; }
				$insert = sprintf("INSERT into %s values(%s, %s)", addslashes($table),
					("'" . $importId ."'"), $this->getColumnValueData($data));
				DB::insert($insert);
			}

			return Redirect::action('ImportController@display', ['table' => $table, 'id' => $importId]);

		  }//file exists

	  }//validation

	  echo "something is amiss...";

    }

	private function getColumnValueData($data) {
		$cvd = '';
		$length = count($data);
		for($i=0;$i<$length;$i++) {
			$cvd = $cvd . "'" . $data[$i] . "'";
			if(!($i==($length - 1)))
				$cvd = $cvd . ",";
		}

		return $cvd;
	}

}