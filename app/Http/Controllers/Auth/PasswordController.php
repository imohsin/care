<?php

namespace Care\Http\Controllers\Auth;

use View;
use Input;
use Care\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

	//reset form
	public function remind()
	{
		return View::make('/auth/password');
	}

	//send email
	public function request()
	{
	  $credentials = array('email' => Input::get('email'), 'password' => Input::get('password'));

	  return $this->remind($credentials);
	}
}
