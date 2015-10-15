<?php

namespace Care\Http\Controllers\Auth;

use Care\User;
use Validator;
use Auth;
use Input;
use Hash;
use DB;
use Redirect;
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
            'password_confirmation' => 'required|min:6',
            'organization_id' => 'required',
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
            'organization_id' => $data['organization_id']
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

		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'), 'confirmed' => 1), Input::get('remember')))
		{
			return Redirect::intended('/');
		} else {
			return Redirect::to('/auth/login')->withErrors([
		            'email' => 'Either the credentials you entered did not match our records or you have not been confirmed yet.  Please try again or contact the Administrator.',
    	    ]);
		}
	}

	/*
	* GET Register
	*/
	public function register()
	{
		$orgs = DB::table('organization')
			->where('expired', '=', 0)
			->orderBy('short_name')
			->get();

		return view('auth.register', ['orgs' => $orgs]);
	}

	/*
	* POST Register
	*/
    public function handleRegister()
    {
		//validate input
		$validation = $this->validator(array('name' => Input::get('name'),'email' => Input::get('email'),
								'password' => Input::get('password'),'password_confirmation' => Input::get('password_confirmation'),
								'organization_id' => Input::get('organization_id')));
		if($validation->fails()) {
			return redirect('/auth/register')->withInput()->withErrors($validation);
		}

		//create user
		$user = $this->create(array('name' => Input::get('name'),
								'email' => Input::get('email'),
								'password' => Input::get('password'),
								'organization_id' => Input::get('organization_id')));
		if(!$user) {
			return Redirect::to('/auth/register')->withInput()->withErrors([
					            'name' => 'The registration was unsuccessful.  Try again?',
    	    ]);
		} else {
			//Auth::login($user);
			return Redirect::intended('/');
		}


	}

}
