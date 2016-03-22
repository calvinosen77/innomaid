<?php

use Illuminate\Support\Facades\Redirect;
Route::pattern('id', '[0-9]+');
Route::pattern('country', '[a-zA-Z0-9-]+');
Route::pattern('agency', '[a-zA-Z0-9-]+');
Route::pattern('id2', '[0-9]+');
Route::pattern('slug', '[a-zA-Z0-9-]+');
Route::pattern('job_slug', '[a-zA-Z0-9-]+');
Route::pattern('company_slug', '[a-zA-Z0-9-]+');
Route::pattern('code', '[a-zA-Z0-9-]+');
Route::pattern('company_id', '[0-9]+');
Route::pattern('user_id', '[0-9]+');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::route('user.user.index');
});


Route::get('home/{id?}',   	                        ['as' => 'user.user.index',                 'uses' => 'User\UserController@index']);
Route::get('homepage',   	                        ['as' => 'user.user.homepage',              'uses' => 'User\UserController@homePage']);

Route::get('login',                                 ['as' => 'user.user.login',                 'uses' => 'User\UserController@login']);
Route::get('signup',                                ['as' => 'user.user.signup',                'uses' => 'User\UserController@signup']);
Route::get('maidDetails/{id?}',                     ['as' => 'user.user.maidDetails',           'uses' => 'User\UserController@maidDetails']);

Route::post('currentPage',                          ['as' => 'user.user.asyncCurrentPage',      'uses' => 'User\UserController@asyncCurrentPage']);

Route::get('allMaid',                               ['as' => 'user.maidfilter.allGetMaid',      'uses' => 'User\MaidFilterController@allGetMaid']);
Route::get('countryMaid/{country?}',                ['as' => 'user.maidfilter.countryGetMaid',  'uses' => 'User\MaidFilterController@countryGetMaid']);
Route::get('agecnyMaid/{agency?}',                  ['as' => 'user.maidfilter.agencyGetMaid',   'uses' => 'User\MaidFilterController@agencyGetMaid']);
Route::post('searchMaid',                           ['as' => 'user.maidfilter.searchMaid',      'uses' => 'User\MaidFilterController@searchMaid']);

Route::post('dosignup',                             ['as' => 'user.user.dosignup',              'uses' => 'User\UserController@dosignup']);
Route::post('dologin',                              ['as' => 'user.user.dologin',               'uses' => 'User\UserController@dologin']);

Route::group(['prefix' => 'admin', 'before' => 'admin_auth'], function() {

//    Route::get('/',                     ['as' => 'admin.admin.index',                       'uses' => 'Admin\AdminController@index']);
    Route::get('/',                     ['as' => 'admin.admin.index',                       'uses' => 'Admin\MaidApplicationController@application']);
    Route::get('logout',                ['as' => 'admin.admin.logout',                      'uses' => 'Admin\AdminController@logout']);

    Route::get('agency',                ['as' => 'admin.agency.index',                      'uses' => 'Admin\AgencyController@index']);
    Route::get('addAgency',             ['as' => 'admin.agency.addAgency',                  'uses' => 'Admin\AgencyController@addAgency']);
    Route::post('addNewAgency',         ['as' => 'admin.agency.addNewAgency',               'uses' => 'Admin\AgencyController@addNewAgency']);
    Route::get('updateAgency/{id?}',    ['as' => 'admin.agency.updateAgency',               'uses' => 'Admin\AgencyController@updateAgency']);
    Route::post('doupdateAgency',       ['as' => 'admin.agency.doupdateAgency',             'uses' => 'Admin\AgencyController@doupdateAgency']);
    Route::post('deleteAgency',         ['as' => 'admin.agency.deleteAgency',               'uses' => 'Admin\AgencyController@deleteAgency']);
    Route::get('viewAgency/{id?}',      ['as' => 'admin.agency.viewAgency',                 'uses' => 'Admin\AgencyController@viewAgency']);

    Route::get('application',           ['as' => 'admin.maidapplication.application',           'uses' => 'Admin\MaidApplicationController@application']);
    Route::post('addNewApplication',    ['as' => 'admin.maidapplication.addNewApplication',     'uses' => 'Admin\MaidApplicationController@addNewApplication']);
    Route::get('addApplication',        ['as' => 'admin.maidapplication.addApplication',        'uses' => 'Admin\MaidApplicationController@addApplication']);
    Route::get('viewApplication/{id?}', ['as' => 'admin.maidapplication.viewApplication',       'uses' => 'Admin\MaidApplicationController@viewApplication']);
    Route::get('updateApplication/{id?}', ['as' => 'admin.maidapplication.updateApplication',   'uses' => 'Admin\MaidApplicationController@updateApplication']);
    Route::post('deleteApplication',    ['as' => 'admin.maidapplication.deleteApplication',     'uses' => 'Admin\MaidApplicationController@deleteApplication']);
    Route::post('doupdateApplication',  ['as' => 'admin.maidapplication.doupdateApplication',   'uses' => 'Admin\MaidApplicationController@doupdateApplication']);
    Route::post('getEmployerData',      ['as' => 'admin.maidapplication.getEmployerData',       'uses' => 'Admin\MaidApplicationController@asyncGetEmployerData']);
    Route::post('getMaidData',          ['as' => 'admin.maidapplication.getMaidData',           'uses' => 'Admin\MaidApplicationController@asyncGetMaidData']);
    Route::get('downloadPDFApplication/{id?}/{id2?}',     ['as' => 'admin.maidapplication.downloadPDFApplication','uses' => 'DownloadController@application']);

    Route::get('addMaid',               ['as' => 'admin.maids.addMaid',                     'uses' => 'Admin\MaidsController@addMaid']);
    Route::post('addNewMaid',           ['as' => 'admin.maids.addNewMaid',                  'uses' => 'Admin\MaidsController@addNewMaid']);

    Route::get('editMaid',              ['as' => 'admin.maids.editMaid',                    'uses' => 'Admin\MaidsController@editMaid']);
    Route::get('updateMaid/{id?}',      ['as' => 'admin.maids.updateMaid',                  'uses' => 'Admin\MaidsController@updateMaid']);
    Route::get('viewMaid/{id?}',        ['as' => 'admin.maids.viewMaid',                    'uses' => 'Admin\MaidsController@viewMaid']);
    Route::post('doupdateMaid',         ['as' => 'admin.maids.doupdateMaid',                'uses' => 'Admin\MaidsController@doupdateMaid']);
//    Route::post('deleteMaid',           ['as' => 'admin.maids.deleteMaid',                  'uses' => 'Admin\MaidsController@asyncDeleteMaidData']);
    Route::post('deleteMaid',           ['as' => 'admin.maids.deleteMaid',                  'uses' => 'Admin\MaidsController@deleteMaidData']);
    Route::get('downloadPDF/{id?}',     ['as' => 'admin.maids.downloadPDF',                 'uses' => 'DownloadController@index']);

    Route::get('employer',              ['as' => 'admin.employers.employer',                'uses' => 'Admin\EmployersController@employer']);
    Route::get('addEmployer',           ['as' => 'admin.employers.addEmployer',             'uses' => 'Admin\EmployersController@addEmployer']);
    Route::post('addNewEmployer',       ['as' => 'admin.employers.addNewEmployer',          'uses' => 'Admin\EmployersController@addNewEmployer']);
    Route::get('updateEmployer/{id?}',  ['as' => 'admin.employers.updateEmployer',          'uses' => 'Admin\EmployersController@updateEmployer']);
    Route::post('doupdateEmployer',     ['as' => 'admin.employers.doupdateEmployer',        'uses' => 'Admin\EmployersController@doupdateEmployer']);
    Route::post('deleteEmployer',       ['as' => 'admin.employers.deleteEmployer',          'uses' => 'Admin\EmployersController@deleteEmployer']);
    Route::get('viewEmployer/{id?}',    ['as' => 'admin.employers.viewEmployer',            'uses' => 'Admin\EmployersController@viewEmployer']);

    Route::get('addSupplier',           ['as' => 'admin.suppliers.addSupplier',             'uses' => 'Admin\SuppliersController@addSupplier']);
    Route::get('editSupplier',          ['as' => 'admin.suppliers.editSupplier',            'uses' => 'Admin\SuppliersController@editSupplier']);

    Route::get('payment',               ['as' => 'admin.payment.payment',                   'uses' => 'Admin\PaymentController@payment']);

    Route::get('refund',                ['as' => 'admin.refund.refund',                     'uses' => 'Admin\RefundController@refund']);

    Route::get('reports',               ['as' => 'admin.reports.reports',                   'uses' => 'Admin\ReportsController@reports']);

    Route::get('addUser',               ['as' => 'admin.users.addUser',                     'uses' => 'Admin\UsersController@addUser']);
    Route::get('editUser',              ['as' => 'admin.users.editUser',                    'uses' => 'Admin\UsersController@editUser']);
    Route::get('settingUser',           ['as' => 'admin.users.settingUser',                 'uses' => 'Admin\UsersController@settingUser']);

    Route::get('profileCompany',        ['as' => 'admin.companyprofile.profileCompany',     'uses' => 'Admin\CompanyProfileController@profileCompany']);
    Route::get('editCompany',           ['as' => 'admin.companyprofile.editCompany',        'uses' => 'Admin\CompanyProfileController@editCompany']);

    Route::get('settings',              ['as' => 'admin.settings.settings',                 'uses' => 'Admin\SettingsController@settings']);

    Route::get('profile',               ['as' => 'admin.users.profile',                     'uses' => 'Admin\AdminController@profile']);
    Route::post('profileUpdate',         ['as' => 'admin.users.profileUpdate',               'uses' => 'Admin\AdminController@profileUpdate']);

});