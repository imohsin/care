<?php

namespace Care\Http\Controllers;

use DB;
use Input;
use Care\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class CommunicationController extends Controller
{

    public function create($con)
    {
		$communicationTypes = DB::table('communication_type')
		 	->where('communication_type.expired', '=', 0)
		 	->orderBy('communication_type.name')
		 	->get();
        return view('communication',['communicationTypes' => $communicationTypes, 'con' => $con]);
    }

    public function edit($id)
    {
		$communication = DB::table('communication')->where('id',$id)->first();
		$contacts = DB::table('contact')
		 	->where('contact.expired', '=', 0)
		 	->orderBy('contact.name')
		 	->get();
		$communicationTypes = DB::table('communication_type')
		 	->where('communication_type.expired', '=', 0)
		 	->orderBy('communication_type.name')
		 	->get();
        return view('communication', ['communication' => $communication,'contacts' => $contacts, 'communicationTypes' => $communicationTypes]);
    }

    public function delete($id, $con)
    {
		DB::table('communication')
            ->where('id', $id)
            ->update(['expired' => 1]
        );
        return Redirect::action('ContactController@edit', $con);
    }

    public function handleCreate()
    {

		$id = DB::table('communication')->insertGetId(
		    ['contact_id' => Input::get('contact_id'),'communication_type_id' => Input::get('communication_type_id'),'value' => Input::get('value')]
		);
        return Redirect::action('CommunicationController@edit', $id);
    }

    public function handleEdit()
    {
		DB::table('communication')
            ->where('id', Input::get('id'))
            ->update(
			['contact_id' => Input::get('contact_id'),'communication_type_id' => Input::get('communication_type_id'),'value' => Input::get('value')]
		);
        return Redirect::action('CommunicationController@edit', Input::get('id'));
    }

}