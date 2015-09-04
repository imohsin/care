<?php

namespace Care\Http\Controllers\Auth;

use Care\User;
use Validator;
use Auth;
use Input;
use Hash;
use Care\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

	/*
	* GET Login
	*/
    public function login()
    {
		return view('auth.login');
	}

	/*
	* POST Login
	*/
    public function handleLogin()
    {
		//hash password if unhashed
		//echo('password before = ' . Input::get('password') . '<br/>');
		//$encrypted = Hash::make(Input::get('password'));
		//echo('password after = ' . $encrypted . '<br/>');
		//echo('done');

		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')), Input::get('remember')))
		{
			return redirect('/');
		} else {
			return redirect('/auth/login')->withErrors([
		            'email' => 'The credentials you entered did not match our records. Try again?',
    	    ]);
		}
	}

	public function logout()
	{
		echo('logout func');
		Auth::logout($this);
	}

	public function handleLogout()
	{
		echo('handlelogout func');
		Auth::logout($this);
	}

}
