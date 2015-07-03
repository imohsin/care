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
    return view('home');
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

