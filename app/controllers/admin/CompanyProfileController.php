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

class CompanyProfileController extends \BaseController {

    /**Company Profile Page*/
    public function profileCompany() {
        $param = [];
        $param['title'] = " | Company Profile";
        return View::make('admin.company.profileCompany')->with($param);
    }

    /**Edit Company Profile*/
    public function editCompany() {
        $param = [];
        $param['title'] = " | Edit Company Profile";
        return View::make('admin.company.editCompany')->with($param);
    }

}
