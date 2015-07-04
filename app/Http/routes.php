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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('organizations', array(
    'as' => 'organizations',
    'uses' => 'OrganizationController@home',
    function() {
        return View::make('organizations');
    }
));

Route::group(array('prefix' => 'organizations'), function()
{
	Route::get('/create', 'OrganizationController@create');
	Route::get('/edit/{org}', 'OrganizationController@edit');
	Route::get('/delete/{org}', 'OrganizationController@delete');

	// Handle form submissions.
	Route::post('/create', 'OrganizationController@handleCreate');
	Route::post('/edit', 'OrganizationController@handleEdit');
	Route::post('/delete', 'OrganizationController@handleDelete');

});

Route::get('coupons', array(
    'as' => 'coupons',
    function() {
        return View::make('coupons');
    }
));

Route::get('deliveries', array(
    'as' => 'deliveries',
    function() {
        return View::make('deliveries');
    }
));

Route::get('returns', array(
    'as' => 'returns',
    function() {
        return View::make('returns');
    }
));

Route::get('enquiries', array(
    'as' => 'enquiries',
    function() {
        return View::make('enquiries');
    }
));

Route::get('import', array(
    'as' => 'import',
    function() {
        return View::make('import');
    }
));

Route::get('export', array(
    'as' => 'export',
    function() {
        return View::make('export');
    }
));

Route::get('/contacts', 'ContactController@index');

