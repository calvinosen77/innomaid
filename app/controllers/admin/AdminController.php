<?php namespace Admin;

use Illuminate\Routing\Controllers\Controller;
use View, Input, Redirect, Session, Validator, Response, Mail, URL, Queue;
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

class AdminController extends \BaseController {

    /**show first admin page*/
    public function index() {
        $param = [];

        $param['title'] = " | Admin System";
        return View::make('admin.home.index')->with($param);
    }

    /**logout*/
    public function logout() {

        Session::forget('user_id');
        Session::forget('user_group');
        Session::forget('user_name');
        return Redirect::route('user.user.index');
    }

    /**show Profile page*/
    public function profile() {
        $param                      = [];

        $user_data                  = UsersModel::find(Session::get('user_id'));

        if(Session::get('user_group') == 1) $userDetail_data = SuperInformsModel::where('user_id', Session::get('user_id'))->get();
        if(Session::get('user_group') == 2) $userDetail_data = AgencyInformsModel::where('user_id', Session::get('user_id'))->get();
        if(Session::get('user_group') == 3) $userDetail_data = SupplierInformsModel::where('user_id', Session::get('user_id'))->get();

        $param['user_data']         = $user_data;
        $param['userDetail_data']   = $userDetail_data[0];

        $param['title']             = " | Profile";
        return View::make('admin.profile')->with($param);
    }

    /**Update Profile data*/
    public function profileUpdate() {
        $param                 = [];

        $users                  = UsersModel::find(Session::get('user_id'));

        $users->email           = Input::get('email');
        $users->password        = md5(Input::get('password'));
        $users->user_group      = Session::get('user_group');

        $users->save();

        $user_data                  = UsersModel::find(Session::get('user_id'));


        if(Session::get('user_group') == 1) {

            $userInforms = SuperInformsModel::where('user_id', Session::get('user_id'));
        }

        if(Session::get('user_group') == 2) {

            $userInforms = AgencyInformsModel::where('user_id', Session::get('user_id'))->get();

            $userInforms[0]->user_id               = Session::get('user_id');
            if (Input::hasFile('imageUpload_company')) {

                $filename = str_random(24).".".Input::file('imageUpload_company')->getClientOriginalExtension();
                Input::file('imageUpload_company')->move('assets/upload/images/companies/', $filename);
                $userInforms[0]->company_logo      = '/assets/upload/images/companies/' . $filename;
            }

            $userInforms[0]->company_name          = Input::get('company_name');
            $userInforms[0]->company_no            = Input::get('company_no');
            $userInforms[0]->address               = Input::get('address');
            $userInforms[0]->phone_number          = Input::get('phone_number');

            $userInforms[0]->save();

            $userDetail_data = AgencyInformsModel::where('user_id', Session::get('user_id'))->get();

        }

        if(Session::get('user_group') == 3) {

            $userInforms = SupplierInformsModel::where('user_id', Session::get('user_id'));
        }

        $userDetail_data = AgencyInformsModel::where('user_id', Session::get('user_id'))->get();

        $param['user_data']         = $user_data;
        $param['userDetail_data']   = $userDetail_data[0];

        $param['title']             = " | Profile";
        $param['msg_register']      = "Your account is updated successfully!";
        return View::make('admin.profile')->with($param);
    }


}
