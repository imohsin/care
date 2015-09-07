<?php

namespace Care\Http\Controllers\Auth;

use View;
use Input;
use Redirect;
use Password;
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
	public function handleRemind()
	{
		switch (Password::sendResetLink(Input::only('email')))
		{
		  case Password::INVALID_USER:
			return Redirect::back()->withErrors(['reason' => 'User does not exist.  Try again?']);

		  case Password::RESET_LINK_SENT:
			return Redirect::back()->with('success', 'reset token sent');
		}
	}
}