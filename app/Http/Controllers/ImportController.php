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
    //$organization_id = Auth::user()->organization_id;
    $currentUser = User::find($id);
		$organizations = DB::table('organization')
			->where('expired', '=', 0)
			->where('id', '=', 1)
			->orderBy('short_name')
			->lists('short_name','id');
		$shops = DB::table('company')
			->where('expired', '=', 0)
			->where('company_type_id', '=', 1)
			->where('organization_id', '=', 1)
			->orderBy('name')
			->lists('name','id');
		$barclays_accounts = DB::table('bank')
			->selectRaw('CONCAT(name, " - ", description) AS full_name, id')
			->where('expired', '=', 0)
			->where('bank_type_id', '=', 1)
			->where('organization_id', '=', 1)
			->orderBy('name')
			->lists('full_name','id');
		$paypal_accounts = DB::table('bank')
			->where('expired', '=', 0)
			->where('bank_type_id', '=', 2)
			->where('organization_id', '=', 1)
			->orderBy('name')
			->lists('name','id');
		$deal_providers = DB::table('company')
			->where('expired', '=', 0)
			->where('company_type_id', '=', 2)
			->where('organization_id', '=', 1)
			->orderBy('name')
			->lists('name','id');
  	return view('import', ['organizations' => $organizations , 'shops' => $shops , 'barclays_accounts' => $barclays_accounts ,'paypal_accounts' => $paypal_accounts , 'deal_providers' => $deal_providers]);
  }

  public function display($table, $id)
  {
	$imports = DB::table($table)
			->where('shop_id', '=', $id)
			->get();
	$columns = Schema::getColumnListing($table);
      return view('import', ['imports' => $imports, 'columns' => $columns]);
  }

  public function handleCreateBarclays()
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
	  } else {

		  //exists and readable?
		  if(file_exists($file) && is_readable($file)) {

				$name = time() . $file->getClientOriginalName();
				$path = base_path() . '/storage/imports/';
				// Move file to folder on server
				$file->move($path, $name);
				$table = 'import_paypal';

				$organization_id = Input::get('organization_id');
				$bank_id = Input::get('bank_id');

				//Import uploaded file to Database
				$handle = fopen($path . $name, "r");
				$firstline = true;
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					if($firstline) { $firstline = false; continue; }
					$insert = sprintf("INSERT IGNORE INTO %s VALUES(%s, %s)", addslashes($table),
						"$organization_id, $bank_id", $this->getColumnValueData($data));
					DB::insert($insert);
				}

				return Redirect::action('ImportController@display', ['table' => $table, 'id' => $shop_id]);

		  }//file exists

	  }//validation
	  	
  }

  public function handleCreatePaypal()
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
	  } else {

		  //exists and readable?
		  if(file_exists($file) && is_readable($file)) {

				$name = time() . $file->getClientOriginalName();
				$path = base_path() . '/storage/imports/';
				// Move file to folder on server
				$file->move($path, $name);
				$table = 'import_paypal';

				$organization_id = Input::get('organization_id');
				$bank_id = Input::get('bank_id');

				//Import uploaded file to Database
				$handle = fopen($path . $name, "r");
				$firstline = true;
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					if($firstline) { $firstline = false; continue; }
					$insert = sprintf(
						"INSERT IGNORE INTO %s VALUES(%s, %s)"
						, addslashes($table),
						('1' . $bank_id), $this->getColumnValueData($data));
					DB::insert($insert);
				}

				return Redirect::action('ImportController@display', ['table' => $table, 'id' => $bank_id]);

		  }//file exists

	  }//validation
	  	
  }

  public function handleCreateDealProvider()
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
	  } else {

		  //exists and readable?
		  if(file_exists($file) && is_readable($file)) {

				$name = time() . $file->getClientOriginalName();
				$path = base_path() . '/storage/imports/';
				// Move file to folder on server
				$file->move($path, $name);
				$table = 'import_paypal';

				$organization_id = Input::get('organization_id');
				$shop_id = Input::get('shop_id');

				//Import uploaded file to Database
				$handle = fopen($path . $name, "r");
				$firstline = true;
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					if($firstline) { $firstline = false; continue; }
					$insert = sprintf("INSERT IGNORE INTO %s VALUES(%s, %s)", addslashes($table),
						"$organization_id, $shop_id", $this->getColumnValueData($data));
					DB::insert($insert);
				}

				return Redirect::action('ImportController@display', ['table' => $table, 'id' => $shop_id]);

		  }//file exists

	  }//validation
	  	
  }

  public function handleCreateDelivery()
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
	  } else {

		  //exists and readable?
		  if(file_exists($file) && is_readable($file)) {

				$name = time() . $file->getClientOriginalName();
				$path = base_path() . '/storage/imports/';
				// Move file to folder on server
				$file->move($path, $name);
				$table = 'import_paypal';

				$organization_id = Input::get('organization_id');
				$shop_id = Input::get('shop_id');
				$bank_id = Input::get('bank_id');

				//Import uploaded file to Database
				$handle = fopen($path . $name, "r");
				$firstline = true;
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					if($firstline) { $firstline = false; continue; }
					$insert = sprintf("INSERT IGNORE INTO %s VALUES(%s, %s)", addslashes($table),
						"$organization_id, $shop_id, $bank_id", $this->getColumnValueData($data));
					DB::insert($insert);
				}

				return Redirect::action('ImportController@display', ['table' => $table, 'id' => $shop_id]);

		  }//file exists

	  }//validation
	  	
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