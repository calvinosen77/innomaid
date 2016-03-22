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
class EmployersController extends \BaseController {

    /**List Employer Data*/
    public function employer() {
        $param                           = [];

//        $employerinforms_data           = EmployerInformsModel::all();
        $employerinforms_data           = EmployerInformsModel::where('supplier_id', Session::get('user_id'))->get();

        $param['employerinforms_data']  = $employerinforms_data;
        $param['sub_path']              = " Employer Data";
        $param['title'] = " | Employer Data";
        return View::make('admin.employers.employer')->with($param);
    }

    public function addEmployer() {
        $param = [];

        $nationality_data   = NationalityInformsModel::all();

        $param['nationality_data']      = $nationality_data;

        $param['title']             = " | Add New Employer";
        $param['sub_path']          = " Employer &DoubleRightArrow; Add New";
        return View::make('admin.employers.addEmployer')->with($param);
    }

    public function updateEmployer($id) {
        $param                          = [];

        $employeritem_data            = EmployerInformsModel::find($id);
        $employerfamily_data          = UserFamilymembersModel::where('user_id', $id)->get();
        $num_family                   = count($employerfamily_data);

        $nationality_data             = NationalityInformsModel::all();

        $param['employeritem_data']   = $employeritem_data;
        $param['employerfamily_data'] = $employerfamily_data;
        $param['num_family']          = $num_family;

        $param['nationality_data']      = $nationality_data;

        $param['title']             = " | Edit Employer";
        $param['sub_path']          = " Employer &DoubleRightArrow; Edit";
        return View::make('admin.employers.updateEmployer')->with($param);
    }

    public function deleteEmployer() {
        $param = [];

        $employerDataId = Input::get('employerDataId');

        if(EmployerInformsModel::find($employerDataId)) {
            EmployerInformsModel::where('id', $employerDataId)->delete();
            UserFamilymembersModel::where('user_id', $employerDataId)->delete();

            $param['msg_register'] = "Employer data has been deleted successfully!";
        }else{
            $param['msg_register'] = "";
        }

//        $employerinforms_data            = EmployerInformsModel::all();
        $employerinforms_data           = EmployerInformsModel::where('supplier_id', Session::get('user_id'))->get();

        $param['employerinforms_data']  = $employerinforms_data;

        $param['sub_path']               = " Employer Data";
        $param['title'] = " | Employer Data";
        return View::make('admin.employers.employer')->with($param);
    }

    /**Add New Employer*/
    public function addNewEmployer() {
        $param = [];
        $check_exisitng = EmployerInformsModel::where('first_name', Input::get('first_name'))->where('last_name', Input::get('last_name'))->where('birthday_year',Input::get('birthday_year'))->where('birthday_month',Input::get('birthday_month'))->where('birthday_day',Input::get('birthday_day'))->where('employer_passport_no',Input::get('employer_passport_no'))->get();
        if(count($check_exisitng) == 0) {

            $employerinforms = new EmployerInformsModel;

            $employerinforms->supplier_id = Session::get('user_id');
            $employerinforms->salutation = Input::get('salutation');
            $employerinforms->first_name = Input::get('first_name');
            $employerinforms->last_name = Input::get('last_name');
            $employerinforms->employer_passport_no = Input::get('employer_passport_no');
            $employerinforms->nric = Input::get('nric');
            $employerinforms->birthday_day = Input::get('birthday_day');
            $employerinforms->birthday_month = Input::get('birthday_month');
            $employerinforms->birthday_year = Input::get('birthday_year');
            $employerinforms->address = Input::get('address');
            $employerinforms->marital_status = Input::get('marital_status');
            $employerinforms->residence_type = Input::get('residence_type');
            $employerinforms->marriage_registered_status = Input::get('marriage_registered_status');
            $employerinforms->citizenship = Input::get('citizenship');
            $employerinforms->phone_number = Input::get('phone_number');
            $employerinforms->home_number = Input::get('home_number');
            $employerinforms->office_phone_number = Input::get('office_phone_number');
            $employerinforms->occupation = Input::get('occupation');
            $employerinforms->company_name = Input::get('company_name');
            $employerinforms->spouse_salutation = Input::get('spouse_salutation');
            $employerinforms->spouse_first_name = Input::get('spouse_first_name');
            $employerinforms->spouse_last_name = Input::get('spouse_last_name');
            $employerinforms->spouse_passport_no = Input::get('spouse_passport_no');
            $employerinforms->spouse_nric = Input::get('spouse_nric');
            $employerinforms->spouse_birthday_day = Input::get('spouse_birthday_day');
            $employerinforms->spouse_birthday_month = Input::get('spouse_birthday_month');
            $employerinforms->spouse_birthday_year = Input::get('spouse_birthday_year');
            $employerinforms->spouse_relationship = Input::get('spouse_relationship');
            $employerinforms->spouse_citizenship = Input::get('spouse_citizenship');
            $employerinforms->spouse_phone_number = Input::get('spouse_phone_number');
            $employerinforms->spouse_home_number = Input::get('spouse_home_number');
            $employerinforms->spouse_office_phone_number = Input::get('spouse_office_phone_number');
            $employerinforms->spouse_occupation = Input::get('spouse_occupation');
            $employerinforms->spouse_company_name = Input::get('spouse_company_name');
            $employerinforms->employer_year_assessment1 = Input::get('employer_year_assessment1');
            $employerinforms->employer_annual_income1 = Input::get('employer_annual_income1');
            $employerinforms->employer_year_assessment2 = Input::get('employer_year_assessment2');
            $employerinforms->employer_annual_income2 = Input::get('employer_annual_income2');
            $employerinforms->spouse_year_assessment1 = Input::get('spouse_year_assessment1');
            $employerinforms->spouse_annual_income1 = Input::get('spouse_annual_income1');
            $employerinforms->spouse_year_assessment2 = Input::get('spouse_year_assessment2');
            $employerinforms->spouse_annual_income2 = Input::get('spouse_annual_income2');
            $employerinforms->combined_income = Input::get('combined_income');

            $employerinforms->save();

            $employer_id = $employerinforms->id;

            $num_row_family = Input::get('num_table_row_family');

            for ($i = 0; $i < $num_row_family; $i++) {
                $familymembers = new UserFamilymembersModel;

                $familymembers->user_id = $employer_id;
                $familymembers->name = Input::get('family_name' . $i);
                $familymembers->nric = Input::get('family_nric' . $i);
                $familymembers->birthday_day = Input::get('family_birthday_day' . $i);
                $familymembers->birthday_month = Input::get('family_birthday_month' . $i);
                $familymembers->birthday_year = Input::get('family_birthday_year' . $i);
                $familymembers->relationship = Input::get('relationship' . $i);

                if (Input::get('family_name' . $i) != "") $familymembers->save();

            }

            $param['msg_register'] = "New Employer has been registered successfully!";

        }else{

            $nationality_data           = NationalityInformsModel::all();

            $param['nationality_data']  = $nationality_data;

            $param['title']             = " | Add New Employer";
            $param['sub_path']          = " Employer &DoubleRightArrow; Add New";
            $param['msg_register']      = "This employer data already exist!";
            return View::make('admin.employers.addEmployer')->with($param);
        }

//        $employerinforms_data            = EmployerInformsModel::all();
        $employerinforms_data           = EmployerInformsModel::where('supplier_id', Session::get('user_id'))->get();

        $param['employerinforms_data']  = $employerinforms_data;
        $param['sub_path']               = " Employer Data";
        $param['title'] = " | Employer Data";
        return View::make('admin.employers.employer')->with($param);
    }

    public function doupdateEmployer() {
        $param = [];

        $id                                         = Input::get('id');

        $employerinforms = EmployerInformsModel::find($id);

        $employerinforms->supplier_id = Session::get('user_id');
        $employerinforms->salutation = Input::get('salutation');
        $employerinforms->first_name = Input::get('first_name');
        $employerinforms->last_name = Input::get('last_name');
        $employerinforms->employer_passport_no = Input::get('employer_passport_no');
        $employerinforms->nric = Input::get('nric');
        $employerinforms->birthday_day = Input::get('birthday_day');
        $employerinforms->birthday_month = Input::get('birthday_month');
        $employerinforms->birthday_year = Input::get('birthday_year');
        $employerinforms->address = Input::get('address');
        $employerinforms->marital_status = Input::get('marital_status');
        $employerinforms->residence_type = Input::get('residence_type');
        $employerinforms->marriage_registered_status = Input::get('marriage_registered_status');
        $employerinforms->citizenship = Input::get('citizenship');
        $employerinforms->phone_number = Input::get('phone_number');
        $employerinforms->home_number = Input::get('home_number');
        $employerinforms->office_phone_number = Input::get('office_phone_number');
        $employerinforms->occupation = Input::get('occupation');
        $employerinforms->company_name = Input::get('company_name');
        $employerinforms->spouse_salutation = Input::get('spouse_salutation');
        $employerinforms->spouse_first_name = Input::get('spouse_first_name');
        $employerinforms->spouse_last_name = Input::get('spouse_last_name');
        $employerinforms->spouse_passport_no = Input::get('spouse_passport_no');
        $employerinforms->spouse_nric = Input::get('spouse_nric');
        $employerinforms->spouse_birthday_day = Input::get('spouse_birthday_day');
        $employerinforms->spouse_birthday_month = Input::get('spouse_birthday_month');
        $employerinforms->spouse_birthday_year = Input::get('spouse_birthday_year');
        $employerinforms->spouse_relationship = Input::get('spouse_relationship');
        $employerinforms->spouse_citizenship = Input::get('spouse_citizenship');
        $employerinforms->spouse_phone_number = Input::get('spouse_phone_number');
        $employerinforms->spouse_home_number = Input::get('spouse_home_number');
        $employerinforms->spouse_office_phone_number = Input::get('spouse_office_phone_number');
        $employerinforms->spouse_occupation = Input::get('spouse_occupation');
        $employerinforms->spouse_company_name = Input::get('spouse_company_name');
        $employerinforms->employer_year_assessment1 = Input::get('employer_year_assessment1');
        $employerinforms->employer_annual_income1 = Input::get('employer_annual_income1');
        $employerinforms->employer_year_assessment2 = Input::get('employer_year_assessment2');
        $employerinforms->employer_annual_income2 = Input::get('employer_annual_income2');
        $employerinforms->spouse_year_assessment1 = Input::get('spouse_year_assessment1');
        $employerinforms->spouse_annual_income1 = Input::get('spouse_annual_income1');
        $employerinforms->spouse_year_assessment2 = Input::get('spouse_year_assessment2');
        $employerinforms->spouse_annual_income2 = Input::get('spouse_annual_income2');
        $employerinforms->combined_income = Input::get('combined_income');

        $employerinforms->save();

        $employer_id = $employerinforms->id;

        $num_row_family = Input::get('num_table_row_family');

        for ($i = 0; $i < $num_row_family; $i++) {
            $employerfamily_id = Input::get('employerfamily_id' . $i);
            if($employerfamily_id == 0) {
                $familymembers = new UserFamilymembersModel;

                $familymembers->user_id = $employer_id;
                $familymembers->name = Input::get('family_name' . $i);
                $familymembers->nric = Input::get('family_nric' . $i);
                $familymembers->birthday_day = Input::get('family_birthday_day' . $i);
                $familymembers->birthday_month = Input::get('family_birthday_month' . $i);
                $familymembers->birthday_year = Input::get('family_birthday_year' . $i);
                $familymembers->relationship = Input::get('relationship' . $i);

                if (Input::get('family_name' . $i) != "") $familymembers->save();
            }else{
                $familymembers = UserFamilymembersModel::find($employerfamily_id);
                $familymembers->user_id = $employer_id;
                $familymembers->name = Input::get('family_name' . $i);
                $familymembers->nric = Input::get('family_nric' . $i);
                $familymembers->birthday_day = Input::get('family_birthday_day' . $i);
                $familymembers->birthday_month = Input::get('family_birthday_month' . $i);
                $familymembers->birthday_year = Input::get('family_birthday_year' . $i);
                $familymembers->relationship = Input::get('relationship' . $i);

                if (Input::get('family_name' . $i) != "") $familymembers->save();
                else $familymembers->delete();
            }
        }


        $param['msg_register']      = "Employer data has been updated successfully!";

//        $employerinforms_data            = EmployerInformsModel::all();
        $employerinforms_data           = EmployerInformsModel::where('supplier_id', Session::get('user_id'))->get();

        $param['employerinforms_data']  = $employerinforms_data;
        $param['sub_path']               = " Employer Data";
        $param['title'] = " | Employer Data";
        return View::make('admin.employers.employer')->with($param);

    }

    public function viewEmployer($id) {
        $param                          = [];

        $employeritem_data            = EmployerInformsModel::find($id);
        $employerfamily_data          = UserFamilymembersModel::where('user_id', $id)->get();
        $num_family                   = count($employerfamily_data);

        $nationality_data             = NationalityInformsModel::all();

        $param['employeritem_data']   = $employeritem_data;
        $param['employerfamily_data'] = $employerfamily_data;
        $param['num_family']          = $num_family;

        $param['nationality_data']      = $nationality_data;

        $param['title']             = " | View Employer";
        $param['sub_path']          = " Employer &DoubleRightArrow; View";

        return View::make('admin.employers.viewEmployer')->with($param);

    }

}
