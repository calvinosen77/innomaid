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

class SettingsController extends \BaseController {

    /**Settings*/
    public function settings() {
        $param = [];
        $param['title'] = " | Settings";
        return View::make('admin.settings.settings')->with($param);
    }


}
