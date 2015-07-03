<?php

namespace Care\Http\Controllers;

use DB;
use Care\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $contacts = DB::select('select * from contact where expired = ?', [0]);

        return view('contacts', ['contacts' => $contacts]);
    }
}