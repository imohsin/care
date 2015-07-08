<?php

namespace Care\Http\Controllers;

use DB;
use Care\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class OrganizationController extends Controller
{
    /**
     * Show a list of all of the organizations.
     *
     * @return Response
     */
    public function index()
    {
        //$organizations = DB::select('select * from organization where expired = ?', [0]);
		$organizations = DB::table('organization')
					->join('company', function ($joincompany) {
						$joincompany->on('organization.id', '=', 'company.organization_id')
							 ->where('company.expired', '=', 0);
					})
					->join('opancart_info', function ($joinocinfo) {
						$joinocinfo->on('organization.id', '=', 'opancart_info.organization_id')
							 ->where('opancart_info.expired', '=', 0);
					})
					->join('smtp_info', function ($joinsmtpinfo) {
						$joinsmtpinfo->on('organization.id', '=', 'smtp_info.organization_id')
							 ->where('smtp_info.expired', '=', 0);
					})
					->leftJoin('contact', function ($joincontact) {
						$joincontact->on('company.id', '=', 'contact.company_id')
							 ->where('contact.expired', '=', 0);
					})
			        ->select('organization.*',  DB::raw('count(distinct company.id) as companies'),
		            	'opancart_info.host as ocHost', 'smtp_info.host as smtpHost', DB::raw('count(contact.id) as contacts'))
		            ->where('organization.expired', '=', 0)
		            ->orderBy('organization.long_name')
            		->get();

        return view('organizations', ['organizations' => $organizations]);
    }

    public function create()
    {
        return view('organizations');
    }

    public function edit($id)
    {
		$organization = DB::table('organization')->where('id',$id)->first();
        return view('organization', ['organization' => $organization]);
    }

    public function delete($id)
    {
 		DB::table('organization')
             ->where('id', $id)
             ->update(['expired' => 1]
         );
        return Redirect::action('OrganizationController@index');
    }

    public function handleCreate()
    {
		DB::table('organization')->insert(
		    ['campaign_id' => Input::get('campaign_id'),'coupon_code' => Input::get('coupon_code'),'value' => Input::get('value')
		    ,'is_percentage' => Input::get('is_percentage'),'use_once' => Input::get('use_once'),'is_used' => Input::get('is_used')
		    ,'active' => Input::get('active'),'every_product' => Input::get('every_product'),'start' => Input::get('start')
		    ,'expiry' => Input::get('expiry'),'condition' => Input::get('condition'),'coupon_redeemed' => Input::get('coupon_redeemed')
		    ,'coupon_date_redeemed' => Input::get('coupon_date_redeemed')]
		);
        return Redirect::action('OrganizationController@index');
    }

    public function handleEdit()
    {
		DB::table('organization')
            ->where('id', Input::get('id'))
            ->update(
		    ['campaign_id' => Input::get('campaign_id'),'coupon_code' => Input::get('coupon_code'),'value' => Input::get('value')
		    ,'is_percentage' => Input::get('is_percentage'),'use_once' => Input::get('use_once'),'is_used' => Input::get('is_used')
		    ,'active' => Input::get('active'),'every_product' => Input::get('every_product'),'start' => Input::get('start')
		    ,'expiry' => Input::get('expiry'),'condition' => Input::get('condition'),'coupon_redeemed' => Input::get('coupon_redeemed')
		    ,'coupon_date_redeemed' => Input::get('coupon_date_redeemed')]
		);
        return Redirect::action('OrganizationController@edit', Input::get('id'));
    }

}