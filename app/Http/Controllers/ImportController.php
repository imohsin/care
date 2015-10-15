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
		$uid = Auth::user()->id;
		$currentUser = User::find($uid);
	    if($currentUser->organization_id == config('constants.SUPER_USER')) {
			$organizations = DB::table('organization')
				->where('expired', '=', 0)
				->orderBy('organization.long_name')
				->lists('short_name','id');
		} else {
			$organizations = DB::table('organization')
				->where('expired', '=', 0)
				->where('organization.id', '=',	$currentUser->organization_id)
				->orderBy('organization.long_name')
				->lists('short_name','id');
		}

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
		$deal_providers = DB::table('deal_provider')
			->where('expired', '=', 0)
			->where('organization_id', '=', 1)
			->orderBy('name')
			->lists('name','id');
  	return view('import', ['organizations' => $organizations , 'shops' => $shops , 'barclays_accounts' => $barclays_accounts ,'paypal_accounts' => $paypal_accounts , 'deal_providers' => $deal_providers]);
  }

  public function display($table, $id_prefix, $id)
  {
	$imports = DB::table($table)
			->where($id_prefix.'id', '=', $id)
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
	  } else {

		  //exists and readable?
		  if(file_exists($file) && is_readable($file)) {

				$name = time() . $file->getClientOriginalName();
				$path = base_path() . '/storage/imports/';
				// Move file to folder on server
				$file->move($path, $name);

				$import_type = Input::get('import_type');
				$organization_id = Input::get('organization_id');

				if($import_type == 'barclays') {
					$id_prefix = "bank_";
					$id = Input::get('bank_id');
					$table = 'import_barclays';
				} elseif($import_type == 'paypal') {
					$id_prefix = "bank_";
					$id = Input::get('bank_id');
					$table = 'import_paypal';
				} elseif($import_type == 'deal_provider') {
					$id_prefix = "deal_provider_";
					$id = Input::get('deal_provider_id');
					$table = $this->getDealProviderTable($id);
				} elseif($import_type == 'delivery') {
					$id_prefix = "bank_";
					$id = Input::get('shop_id');
					$table = 'import_paypal';
				}

				//Import uploaded file to Database
				$handle = fopen($path . $name, "r");
				$firstline = true;
				$secondline = true;
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					if($firstline) { $firstline = false; continue; }
					if($import_type == 'barclays') {
						if($secondline) { $secondline = false; continue; }
					}
					$insert = sprintf(
						"INSERT IGNORE INTO %s VALUES(%s, %s, %s)" , addslashes($table),
						$organization_id, $id, $this->getColumnValueData($data));
					DB::insert($insert);
				}

				return Redirect::action('ImportController@display', ['table' => $table, 'id_prefix' => $id_prefix, 'id' => $id]);

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

	private function getDealProviderTable( $id ){
		return $current_deal_providers = DB::table('deal_provider')
			->select('deal_provider_type.table')
			->join('deal_provider_type','deal_provider_type.id','=','deal_provider.deal_provider_type_id')
			->where('deal_provider.id', '=', $id)
			->pluck('groupName');
	}
}