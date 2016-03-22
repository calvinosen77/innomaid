<?php namespace User;

use Illuminate\Routing\Controllers\Controller;
use View, Input, Redirect, Session, Validator, Response, Mail, URL, Queue, DB;
use AgencyInforms as AgencyInformsModel;
use CompanyProfile as CompanyProfileModel;
use EmployerInforms as EmployerInformsModel;
use MaidEmploymentHistory as MaidEmploymentHistoryModel;
use MaidEmploymentHistorySingapore as MaidEmploymentHistorySingaporeModel;
use MaidInforms as MaidInformsModel;
use SpouseAssessment as SpouseAssessmentModel;
use SuperInforms as SuperInformsModel;
use SupplierInforms as SupplierInformsModel;
use UserAssessment as UserAssessmentModel;
use UserFamilymembers as UserFamilymembersModel;
use UserGroup as UserGroupModel;
use Users as UsersModel;
use NationalityInforms as NationalityInformsModel;
use MaidAgency as MaidAgencyModel;
use MaidType as MaidTypeModel;


class UserController extends \BaseController {

    /**show first page*/
    public function index() {
        $param = [];

        $maidinforms_data           = MaidInformsModel::select('maid_informs.*', 'agency_informs.company_name')
            ->leftJoin('agency_informs', 'maid_informs.supplier_id', '=', 'agency_informs.user_id')
            ->get();

        $nationality_data   = NationalityInformsModel::all();
        $maidagency_data    = MaidAgencyModel::all();
        $maidtype_data      = MaidTypeModel::all();

        $param['nationality_data']  = $nationality_data;
        $param['maidagency_data']   = $maidagency_data;
        $param['maidtype_data']     = $maidtype_data;

        $num_maidData               = count($maidinforms_data);
        $param['maidinforms_data']  = $maidinforms_data;
        $param['num_maidData']  = $num_maidData;

        Session::set('currentPage', 1);

        Session::set('maid_agency', '');
        Session::set('maid_country', '');

        Session::set('keyword_duty', '');
        Session::set('keyword_nationality', '');
        Session::set('keyword_type', '');
        Session::set('keyword_salary', '');
        Session::set('keyword_age1', '');
        Session::set('keyword_age2', '');


        $param['title']             = " | Portal Site";
        return View::make('user.home.index')->with($param);
    }

    /**show current page*/
    public function homePage() {
        $param = [];
/*
        $maidinforms_data           = MaidInformsModel::select('maid_informs.*', 'agency_informs.company_name')
            ->leftJoin('agency_informs', 'maid_informs.supplier_id', '=', 'agency_informs.user_id')
            ->get();
*/

        $year1 = date('Y') - Session::get('keyword_age1');
        $year2 = date('Y') - Session::get('keyword_age2');

        if(Session::get('keyword_salary') == '') $salary = 100000;
        else $salary = Session::get('keyword_salary');

        $maidinforms_data           = MaidInformsModel::select('maid_informs.*', 'agency_informs.company_name')
            ->where('primary_duty', 'like', '%' . Session::get('keyword_duty') . '%')
            ->where('nationality', 'like', '%' . Session::get('keyword_nationality') . '%')
            ->where('type', 'like', '%' . Session::get('keyword_type') . '%')
            ->where('basic_salary', '<=', $salary)
            ->where('birthday_year', '<=', $year1)
            ->where('birthday_year', '>=', $year2)
            ->leftJoin('agency_informs', 'maid_informs.supplier_id', '=', 'agency_informs.user_id')
            ->get();

        if(!Session::get('age1')){
            $maidinforms_data           = MaidInformsModel::select('maid_informs.*', 'agency_informs.company_name')
                ->where('primary_duty', 'like', '%' . Session::get('keyword_duty') . '%')
                ->where('nationality', 'like', '%' . Session::get('keyword_nationality') . '%')
                ->where('type', 'like', '%' . Session::get('keyword_type') . '%')
                ->where('basic_salary', '<=', $salary)
                ->where('birthday_year', '>=', $year2)
                ->leftJoin('agency_informs', 'maid_informs.supplier_id', '=', 'agency_informs.user_id')
                ->get();
        }
        if(!Session::get('keyword_age2')){
            $maidinforms_data           = MaidInformsModel::select('maid_informs.*', 'agency_informs.company_name')
                ->where('primary_duty', 'like', '%' . Session::get('keyword_duty') . '%')
                ->where('nationality', 'like', '%' . Session::get('keyword_nationality') . '%')
                ->where('type', 'like', '%' . Session::get('keyword_type') . '%')
                ->where('basic_salary', '<=', $salary)
                ->where('birthday_year', '<=', $year1)
                ->leftJoin('agency_informs', 'maid_informs.supplier_id', '=', 'agency_informs.user_id')
                ->get();
        }
        if(!Session::get('keyword_age1') && !Session::get('keyword_age2')){
            $maidinforms_data           = MaidInformsModel::select('maid_informs.*', 'agency_informs.company_name')
                ->where('primary_duty', 'like', '%' . Session::get('keyword_duty') . '%')
                ->where('nationality', 'like', '%' . Session::get('keyword_nationality') . '%')
                ->where('type', 'like', '%' . Session::get('keyword_type') . '%')
                ->where('basic_salary', '<=', $salary)
                ->leftJoin('agency_informs', 'maid_informs.supplier_id', '=', 'agency_informs.user_id')
                ->get();
        }

        if(Session::get('maid_agency')){
            $maidinforms_data           = MaidInformsModel::select('maid_informs.*', 'agency_informs.company_name')
                ->where('agency', '=', Session::get('maid_agency'))
                ->leftJoin('agency_informs', 'maid_informs.supplier_id', '=', 'agency_informs.user_id')
                ->get();

        }

        if(Session::get('maid_country')){
            $maidinforms_data           = MaidInformsModel::select('maid_informs.*', 'agency_informs.company_name')
                ->where('nationality', Session::get('maid_country'))
                ->leftJoin('agency_informs', 'maid_informs.supplier_id', '=', 'agency_informs.user_id')
                ->get();

        }

        $param['keyword_duty']             = Session::get('keyword_duty');
        $param['keyword_nationality']      = Session::get('keyword_nationality');
        $param['keyword_type']             = Session::get('keyword_type');
        $param['keyword_salary']           = Session::get('keyword_salary');
        $param['keyword_age1']             = Session::get('keyword_age1');
        $param['keyword_age2']             = Session::get('keyword_age2');

        $nationality_data   = NationalityInformsModel::all();
        $maidagency_data    = MaidAgencyModel::all();
        $maidtype_data      = MaidTypeModel::all();

        $param['nationality_data']  = $nationality_data;
        $param['maidagency_data']   = $maidagency_data;
        $param['maidtype_data']     = $maidtype_data;

        $num_maidData               = count($maidinforms_data);
        $param['maidinforms_data']  = $maidinforms_data;
        $param['num_maidData']  = $num_maidData;

        $param['title']             = " | Portal Site";
        return View::make('user.home.index')->with($param);
    }


    /**login form*/
    public function login() {
        $param = [];
        $param['title'] = " | LogIn";
        return View::make('user.home.login')->with($param);
    }

    /**signup form*/
    public function signup() {
        $param = [];
        $param['title'] = " | SignUp";
        return View::make('user.home.signup')->with($param);
    }
    /**register account*/
    public function dosignup() {

        $param = [];

        $check_duplication = UsersModel::where('email', '=', Input::get('email'))->get();
        if(count($check_duplication) > 0) {
            $param['title'] = " | SignUp";
            $param['msg_duplication'] = "This Email is used by other account.";

            return View::make('user.home.signup')->with($param);
        }
        $users = new UsersModel;

        $users->email = Input::get('email');
        $users->password = md5(Input::get('password'));
        $users->user_group = 2;
        $users->active = 0;

        $users->save();

        $agency_informs = new AgencyInformsModel;

        $agency_informs->user_id = $users->id;
        $agency_informs->company_logo = '/assets/upload/images/companies/default_company_logo.png';
        $agency_informs->company_name = Input::get('company_name');
        $agency_informs->company_no = Input::get('company_no');
        $agency_informs->address = Input::get('address');
        $agency_informs->phone_number = Input::get('phone_number');

        $agency_informs->save();

        $adminInform0 = UsersModel::where('user_group', 1)->get();
        $adminInform = $adminInform0[0];
        $adminItem0 = SuperInformsModel::where('user_id', $adminInform->id)->get();
        $adminItem = $adminItem0[0];

//Send email
            $data = array();
            $data['from_name'] = $adminItem->first_name . ' ' . $adminItem->last_name;
            $data['to_name'] = Input::get('company_name');
            $name = $data['from_name'];
            $from_address = $adminInform->email;
            $to_address = Input::get('email');
            $subject = 'Notification - InnoMaid.com';
            Mail::send('admin.mailAgencyWait', $data, function ($message) use ($from_address, $name, $to_address, $subject) {
                $message->from($from_address, $name);
                $message->to($to_address);
                $message->subject($subject);
            });

            $data['email'] = Input::get('email');
            $name = $data['to_name'];
            $from_address = Input::get('email');
            $to_address = $adminInform->email;
            $subject = 'Request for account';
            Mail::send('admin.mailAdmin', $data, function ($message) use ($from_address, $name, $to_address, $subject) {
                $message->from($from_address, $name);
                $message->to($to_address);
                $message->subject($subject);
            });
//end
            $param['msg_email'] = "Approving mail has been sent to the Customer!";


        $param['title'] = " | Portal Site";
        $param['msg_register'] = "Your account should is registered successfully!<br>It should be approved by InnoMaid Team.";

        $maidinforms_data           = MaidInformsModel::select('maid_informs.*', 'agency_informs.company_name')
            ->leftJoin('agency_informs', 'maid_informs.supplier_id', '=', 'agency_informs.user_id')
            ->get();

        $nationality_data   = NationalityInformsModel::all();
        $maidagency_data    = MaidAgencyModel::all();
        $maidtype_data      = MaidTypeModel::all();

        $param['nationality_data']  = $nationality_data;
        $param['maidagency_data']   = $maidagency_data;
        $param['maidtype_data']     = $maidtype_data;

        $num_maidData               = count($maidinforms_data);
        $param['maidinforms_data']  = $maidinforms_data;
        $param['num_maidData']  = $num_maidData;

        Session::set('currentPage', 1);

        Session::set('maid_agency', '');
        Session::set('maid_country', '');

        Session::set('keyword_duty', '');
        Session::set('keyword_nationality', '');
        Session::set('keyword_type', '');
        Session::set('keyword_salary', '');
        Session::set('keyword_age1', '');
        Session::set('keyword_age2', '');


        $param['title']             = " | Portal Site";

        return View::make('user.home.index')->with($param);

    }

    /**Login account*/
    public function dologin() {
        $param = [];

        $check_match = UsersModel::where('email', '=', Input::get('email'))->where('password', '=', md5(Input::get('password')))->where('active', 1)->get();
        if(count($check_match) > 0) {

            if($check_match[0]->user_group == 1){
                $user_data = SuperInformsModel::where('user_id', $check_match[0]->id)->get();
                $user_name = $user_data[0]->first_name . $user_data[0]->last_name;
            }
            if($check_match[0]->user_group == 2){
                $user_data = AgencyInformsModel::where('user_id', $check_match[0]->id)->get();
                $user_name = $user_data[0]->company_name;
            }
            if($check_match[0]->user_group == 3){
                $user_data = SuperInformsModel::where('user_id', $check_match[0]->id)->get();
                $user_name = $user_data[0]->first_name . $user_data[0]->last_name;
            }


            Session::set('user_id', $check_match[0]->id);
            Session::set('user_group', $check_match[0]->user_group);
            Session::set('user_name', $user_name);

            if($check_match[0]->user_group == 1) return Redirect::route('admin.agency.index');
            else return Redirect::route('admin.admin.index');

        }else{

            $param['title'] = " | LogIn";
            $param['msg_login_error'] = "Email or Password is incorrect.";
            return View::make('user.home.login')->with($param);
        }
    }

    /**Show Maid Details data*/
    public function maidDetails($id) {
        $param                          = [];

        $maidinformItem_data            = MaidInformsModel::find($id);
        $maidemployment_data            = MaidEmploymentHistoryModel::where('user_id', $id)->get();
        $maidemployment_singapore_data  = MaidEmploymentHistorySingaporeModel::where('user_id', $id)->get();
        $num_history                    = count($maidemployment_data);
        $num_history_singapore          = count($maidemployment_singapore_data);

        $nationality_data   = NationalityInformsModel::all();
        $maidagency_data    = MaidAgencyModel::all();
        $maidtype_data      = MaidTypeModel::all();

        $param['nationality_data']  = $nationality_data;
        $param['maidagency_data']   = $maidagency_data;
        $param['maidtype_data']     = $maidtype_data;

        $param['title']                 = " | Details Data";

        $param['maidinformItem_data']   = $maidinformItem_data;
        $param['maidemployment_data']   = $maidemployment_data;
        $param['maidemployment_singapore_data']   = $maidemployment_singapore_data;
        $param['num_history']           = $num_history;
        $param['num_history_singapore'] = $num_history_singapore;

        return View::make('user.home.maidDetails')->with($param);
    }

    /**ajax functions*/
    public function asyncCurrentPage() {
        $currentPage = Input::get('currentPage');

        Session::set('currentPage', $currentPage);

        return Response::json(['result' => 'success', 'currentPage' => $currentPage]);
    }



}
