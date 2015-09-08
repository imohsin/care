<?php

namespace Care\Http\Controllers\Auth;

use View;
use Input;
use Hash;
use Lang;
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

	//GET remind form
	public function remind()
	{
		return View::make('/auth/password');
	}

	//POST remind and send reset email
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

	//GET reset
	public function reset($token)
	{
		return View::make('/auth/reset', ['token' => $token]);
	}

	//POST reset
	public function handleReset()
	{

        $credentials = Input::only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $response = Password::reset($credentials, function($user, $password)
        {
            $user->password = Hash::make($password);

            $user->save();
        });

		switch ($response)
		{
		  /*case Password::INVALID_USER:
			return Redirect::back()->withErrors(['reason' => 'User does not exist.  Try again?']);
		  case Password::INVALID_PASSWORD:
			return Redirect::back()->withErrors(['reason' => 'Invalid password.  Try again?']);
		  case Password::INVALID_TOKEN:
			return Redirect::back()->withErrors(['reason' => 'Invalid token.  Try again?']);*/
		  case Password::INVALID_PASSWORD:
		  case Password::INVALID_TOKEN:
		  case Password::INVALID_USER:
			return Redirect::back()->withErrors(['reason' => Lang::get($response)]);
		  case Password::PASSWORD_RESET:
			return Redirect::back()->with('success', 'reset token sent');

		}
	}
}