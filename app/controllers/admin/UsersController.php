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

class UsersController extends \BaseController {

    /**Add the User Data*/
    public function addUser() {
        $param = [];
        $param['title'] = " | Add User Data";
        return View::make('admin.users.addUser')->with($param);
    }

    /**Edit User Data*/
    public function editUser() {
        $param = [];
        $param['title'] = " | Edit User Data";
        return View::make('admin.users.editUser')->with($param);
    }

    /**Setting User Data*/
    public function settingUser() {
        $param = [];
        $param['title'] = " | Setting User Data";
        return View::make('admin.users.settingUser')->with($param);
    }

}
