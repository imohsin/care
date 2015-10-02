<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//user authentication
Route::get('auth', array(
    'as' => 'auth',
    'uses' => 'Auth\AuthController@index',
    function() {
        return View::make('auth');
    }
));

Route::group(array('prefix' => 'auth'), function()
{
	// Authentication
	Route::get('/login', 'Auth\AuthController@login');
	// Registration
	Route::get('/register', 'Auth\AuthController@register');
	// Password reset
	//Route::get('/reset', 'Auth\PasswordController@remind');
	//Logout - the Auth\AuthController@logout is buggy...redirects to 'home' and does not logout
	Route::get('/logout', function() {
	    Auth::logout();
	    Session::forget('user');
	    Session::flush();
	    return Redirect::to('/');
	});

	// Authentication
	Route::post('/login', 'Auth\AuthController@handleLogin');
	// Registration
	Route::post('/register', 'Auth\AuthController@handleRegister');
	// Password reset
	//Route::post('/reset', 'Auth\PasswordController@handleRemind');
});

//password reset
Route::get('password', array(
    'as' => 'password',
    'uses' => 'Auth\PasswordController@index',
    function() {
        return View::make('password');
    }
));

Route::group(array('prefix' => 'password'), function()
{
	Route::get('/email', 'Auth\PasswordController@remind');
	Route::post('/email', 'Auth\PasswordController@handleRemind');

	// Password reset routes...
	Route::get('/reset', 'Auth\PasswordController@reset');
	Route::get('/reset/{token}', 'Auth\PasswordController@reset');
	Route::post('/reset', 'Auth\PasswordController@handleReset');
});


//dashboard
Route::get('/', array(
	'middleware' => 'auth',
	function () {
    	return view('dashboard');
	}
));

//the OOTB Auth\AuthController tends to redirect to 'home' - so we make this the dashboard
Route::get('home', array(
	'as' => 'home',
	'middleware' => 'auth',
	function () {
    	return view('dashboard');
	}
));

Route::get('organizations', array(
    'as' => 'organizations',
    'uses' => 'OrganizationController@index',
    'middleware' => 'auth',
    function() {
        return View::make('organizations');
    }
));

Route::group(array('prefix' => 'organizations', 'middleware' => 'auth'), function()
{
	//organization
	Route::get('/create', 'OrganizationController@create');
	Route::get('/edit/{id}', 'OrganizationController@edit');
	Route::get('/delete/{id}', 'OrganizationController@delete');
	Route::post('/create', 'OrganizationController@handleCreate');
	Route::post('/edit', 'OrganizationController@handleEdit');
	//company
	Route::get('/create/company/{org}', 'CompanyController@create');
	Route::get('/edit/company/{id}', 'CompanyController@edit');
	Route::get('/delete/company/{id}/{org}', 'CompanyController@delete');
	Route::post('/create/company', 'CompanyController@handleCreate');
	Route::post('/edit/company/{id}', 'CompanyController@handleEdit');
	//opencart
	Route::get('/create/opencart/{org}', 'OpencartInfoController@create');
	Route::get('/edit/opencart/{id}', 'OpencartInfoController@edit');
	Route::get('/delete/opencart/{id}/{org}', 'OpencartInfoController@delete');
	Route::post('/create/opencart', 'OpencartInfoController@handleCreate');
	Route::post('/edit/opencart/{id}', 'OpencartInfoController@handleEdit');
	//smtp
	Route::get('/create/smtpinfo/{org}', 'SmtpInfoController@create');
	Route::get('/edit/smtpinfo/{id}', 'SmtpInfoController@edit');
	Route::get('/delete/smtpinfo/{id}/{org}', 'SmtpInfoController@delete');
	Route::post('/create/smtpinfo', 'SmtpInfoController@handleCreate');
	Route::post('/edit/smtpinfo/{id}', 'SmtpInfoController@handleEdit');
	//contact
	Route::get('/create/company/contact/{co}', 'ContactController@create');
	Route::get('/edit/company/contact/{id}', 'ContactController@edit');
	Route::get('/delete/company/contact/{id}/{co}', 'ContactController@delete');
	Route::post('/create/company/contact', 'ContactController@handleCreate');
	Route::post('/edit/company/contact/{id}', 'ContactController@handleEdit');
	//communication
	Route::get('/create/company/contact/communication/{con}', 'CommunicationController@create');
	Route::get('/edit/company/contact/communication/{id}', 'CommunicationController@edit');
	Route::get('/delete/company/contact/communication/{id}/{con}', 'CommunicationController@delete');
	Route::post('/create/company/contact/communication/', 'CommunicationController@handleCreate');
	Route::post('/edit/company/contact/communication/{id}', 'CommunicationController@handleEdit');
	//address
	Route::get('/create/company/address/{co}', 'AddressController@create');
	Route::get('/edit/company/address/{id}', 'AddressController@edit');
	Route::get('/delete/company/address/{id}/{co}', 'AddressController@delete');
	Route::post('/create/company/address', 'AddressController@handleCreate');
	Route::post('/edit/company/address/{id}', 'AddressController@handleEdit');
	//backoffice
	Route::get('/create/company/backoffice/{co}', 'BackofficeController@create');
	Route::get('/edit/company/backoffice/{id}', 'BackofficeController@edit');
	Route::get('/delete/company/backoffice/{id}/{co}', 'BackofficeController@delete');
	Route::post('/create/company/backoffice', 'BackofficeController@handleCreate');
	Route::post('/edit/company/backoffice/{id}', 'BackofficeController@handleEdit');
});

Route::get('coupons', array(
    'as' => 'coupons',
    'uses' => 'CouponController@index',
    'middleware' => 'auth',
    function() {
        return View::make('coupons');
    }
));

Route::group(array('prefix' => 'coupons', 'middleware' => 'auth'), function()
{
	Route::get('/create', 'CouponController@create');
	Route::get('/edit/{id}/{code}', 'CouponController@edit');
	Route::get('/delete/{id}/{code}', 'CouponController@delete');

	// Handle form submissions.
	Route::post('/create', 'CouponController@handleCreate');
	Route::post('/edit', 'CouponController@handleEdit');
	Route::post('/delete', 'CouponController@handleDelete');
});

Route::group(array('prefix' => 'deals', 'middleware' => 'auth'), function()
{
	Route::get('/create', 'DealController@create');
	Route::get('/edit/{id}', 'DealController@edit');
	Route::get('/delete/{id}', 'DealController@delete');

	// Handle form submissions.
	Route::post('/create', 'DealController@handleCreate');
	Route::post('/edit', 'DealController@handleEdit');
	Route::post('/delete', 'DealController@handleDelete');
});

Route::group(array('prefix' => 'campaigns', 'middleware' => 'auth'), function()
{
	Route::get('/create', 'CampaignController@create');
	Route::get('/edit/{id}', 'CampaignController@edit');
	Route::get('/delete/{id}', 'CampaignController@delete');

	// Handle form submissions.
	Route::post('/create', 'CampaignController@handleCreate');
	Route::post('/edit', 'CampaignController@handleEdit');
	Route::post('/delete', 'CampaignController@handleDelete');
});

Route::group(array('prefix' => 'redemptions', 'middleware' => 'auth'), function()
{
	Route::get('/create', 'RedemptionController@create');
	Route::get('/edit/{id}', 'RedemptionController@edit');
	Route::get('/delete/{id}', 'RedemptionController@delete');

	// Handle form submissions.
	Route::post('/create', 'RedemptionController@handleCreate');
	Route::post('/edit', 'RedemptionController@handleEdit');
	Route::post('/delete', 'RedemptionController@handleDelete');
});

Route::get('deliveries', array(
    'as' => 'deliveries',
    'uses' => 'DeliveryController@index',
    'middleware' => 'auth',
    function() {
        return View::make('deliveries');
    }
));

Route::group(array('prefix' => 'deliveries', 'middleware' => 'auth'), function()
{
	Route::get('/create', 'DeliveryController@create');
	Route::get('/edit/{id}', 'DeliveryController@edit');
	Route::get('/delete/{id}', 'DeliveryController@delete');

	// Handle form submissions.
	Route::post('/create', 'DeliveryController@handleCreate');
	Route::post('/edit', 'DeliveryController@handleEdit');
	Route::post('/delete', 'DeliveryController@handleDelete');
});

Route::get('returns', array(
    'as' => 'returns',
    'middleware' => 'auth',
    function() {
        return View::make('returns');
    }
));

Route::get('enquiries', array(
    'as' => 'enquiries',
    'middleware' => 'auth',
    function() {
        return View::make('enquiries');
    }
));

Route::get('import', array(
    'as' => 'import',
    'uses' => 'ImportController@create',
    'middleware' => 'auth',
    function() {
        return View::make('import');
    }
));

Route::group(array('prefix' => 'import', 'middleware' => 'auth'), function()
{
	Route::get('/display/{imp}', 'ImportController@display');

	// Handle form submissions.
	Route::post('/create', 'ImportController@handleCreate');
});

Route::get('export', array(
    'as' => 'export',
    'middleware' => 'auth',
    function() {
        return View::make('export');
    }
));

Route::get('settings', array(
    'as' => 'settings',
    'middleware' => 'auth',
    function() {
        return View::make('settings');
    }
));

Route::get('profile', array(
    'as' => 'profile',
    'middleware' => 'auth',
    function() {
        return View::make('profile');
    }
));

Route::get('help', array(
    'as' => 'help',
    function() {
        return View::make('help');
    }
));
