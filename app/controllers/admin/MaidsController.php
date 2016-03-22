<?php namespace Admin;

use Illuminate\Routing\Controllers\Controller;
use Illuminate\Routing\Route;
use View, Input, Redirect, Session, Validator, Response, Mail, URL, Queue, App, HTML,PDF;
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

class MaidsController extends \BaseController {

    /**Add the Maid Data*/
    public function addMaid() {
        $param                      = [];

        $nationality_data   = NationalityInformsModel::all();
        $maidagency_data    = MaidAgencyModel::all();
        $maidtype_data      = MaidTypeModel::all();

        $param['title']             = " | Add Maid Data";
        $param['sub_path']          = " Maid Data &DoubleRightArrow; Add New";
        $param['nationality_data']  = $nationality_data;
        $param['maidagency_data']   = $maidagency_data;
        $param['maidtype_data']     = $maidtype_data;
        return View::make('admin.maids.addMaid')->with($param);
    }

    /**Add New Maid Data*/
    public function addNewMaid() {
        $param = [];
        $check_exisitng = MaidInformsModel::where('name', Input::get('name'))->where('passport_no',Input::get('passport_no'))->where('birthday_year',Input::get('birthday_year'))->where('birthday_month',Input::get('birthday_month'))->where('birthday_day',Input::get('birthday_day'))->get();
        if(count($check_exisitng) == 0) {

            $maidinforms = new MaidInformsModel;

            $maidinforms->supplier_id = Session::get('user_id');
            $maidinforms->name = Input::get('name');
            $maidinforms->passport_no = Input::get('passport_no');
            $maidinforms->birthday_year = Input::get('birthday_year');
            $maidinforms->birthday_month = Input::get('birthday_month');
            $maidinforms->birthday_day = Input::get('birthday_day');
            $maidinforms->birth_place = Input::get('birth_place');
            $maidinforms->height = Input::get('height');
            $maidinforms->weight = Input::get('weight');
            $maidinforms->nationality = Input::get('nationality');
            $maidinforms->agency = Input::get('agency');
//            $maidinforms->type = Input::get('type');
            $maidinforms->residential_address = Input::get('residential_address');
            $maidinforms->contact_number = Input::get('contact_number');
            $maidinforms->religion = Input::get('religion');
            $maidinforms->education_level = Input::get('education_level');
            $maidinforms->sibling_number = Input::get('sibling_number');
            $maidinforms->marital_status = Input::get('marital_status');
            $maidinforms->children_number = Input::get('children_number');
            $maidinforms->allergy = Input::get('allergy');
            $maidinforms->mental_illness = Input::get('mental_illness');
            $maidinforms->epilepsy = Input::get('epilepsy');
            $maidinforms->asthma = Input::get('asthma');
            $maidinforms->diabetes = Input::get('diabetes');
            $maidinforms->hypertension = Input::get('hypertension');
            $maidinforms->tuberculosis = Input::get('tuberculosis');
            $maidinforms->heart_disease = Input::get('heart_disease');
            $maidinforms->malaria = Input::get('malaria');
            $maidinforms->operations = Input::get('operations');
            $maidinforms->others = Input::get('others');
            $maidinforms->physical_disabilities = Input::get('physical_disabilities');
            $maidinforms->dietary_restrictions = Input::get('dietary_restrictions');
            $maidinforms->food_handling_pork = Input::get('food_handling_pork');
            $maidinforms->food_handling_beef = Input::get('food_handling_beef');
            $maidinforms->food_handling_others = Input::get('food_handling_others');
            $maidinforms->preference_rest_day = Input::get('preference_rest_day');
            $maidinforms->any_other_remarks = Input::get('any_other_remarks');
            $maidinforms->base_on_fdw = Input::get('base_on_fdw');
            $maidinforms->interviewed_singapore = Input::get('interviewed_singapore');
            $maidinforms->interviewed_overseas = Input::get('interviewed_overseas');
            $maidinforms->care_infant_willingness = Input::get('care_infant_willingness');
            $maidinforms->care_infant_years = Input::get('care_infant_years');
            $maidinforms->care_infant_rate = Input::get('care_infant_rate');
            $maidinforms->care_infant_remark = Input::get('care_infant_remark');
            $maidinforms->care_elderly_willingness = Input::get('care_elderly_willingness');
            $maidinforms->care_elderly_years = Input::get('care_elderly_years');
            $maidinforms->care_elderly_rate = Input::get('care_elderly_rate');
            $maidinforms->care_elderly_remark = Input::get('care_elderly_remark');
            $maidinforms->care_disabled_willingness = Input::get('care_disabled_willingness');
            $maidinforms->care_disabled_years = Input::get('care_disabled_years');
            $maidinforms->care_disabled_rate = Input::get('care_disabled_rate');
            $maidinforms->care_disabled_remark = Input::get('care_disabled_remark');
            $maidinforms->general_housework_willingness = Input::get('general_housework_willingness');
            $maidinforms->general_housework_years = Input::get('general_housework_years');
            $maidinforms->general_housework_rate = Input::get('general_housework_rate');
            $maidinforms->general_housework_remark = Input::get('general_housework_remark');
            $maidinforms->cooking_willingness = Input::get('cooking_willingness');
            $maidinforms->cooking_years = Input::get('cooking_years');
            $maidinforms->cooking_rate = Input::get('cooking_rate');
            $maidinforms->cooking_remark = Input::get('cooking_remark');
            $maidinforms->language_ability_name1 = Input::get('language_ability_name1');
            $maidinforms->language_ability_name2 = Input::get('language_ability_name2');
            $maidinforms->language_ability_name3 = Input::get('language_ability_name3');
            $maidinforms->other_skills_name = Input::get('other_skills_name');
            $maidinforms->other_skills_level = Input::get('other_skills_level');
            $maidinforms->primary_duty = Input::get('primary_duty');
            $maidinforms->employment_history_singapore = Input::get('employment_history_singapore');

            if (Input::hasFile('imageUpload_profile')) {

                $filename = str_random(24) . "." . Input::file('imageUpload_profile')->getClientOriginalExtension();
                Input::file('imageUpload_profile')->move('assets/upload/images/maids/', $filename);
                $maidinforms->profile_img = '/assets/upload/images/maids/' . $filename;
            }
            if (Input::hasFile('imageUpload_full')) {
                $filename = str_random(24) . "." . Input::file('imageUpload_full')->getClientOriginalExtension();
                Input::file('imageUpload_full')->move('assets/upload/images/maids/', $filename);
                $maidinforms->profile_full_img = '/assets/upload/images/maids/' . $filename;
            }
            $maidinforms->basic_salary = Input::get('basic_salary');

            $maidinforms->save();

            $num_row = Input::get('num_table_row');

            for ($i = 0; $i < $num_row; $i++) {
                $maidemploymenthistory = new MaidEmploymentHistoryModel;

                $maidemploymenthistory->user_id = $maidinforms->id;
                $maidemploymenthistory->date_from = Input::get('date_from' . $i);
                $maidemploymenthistory->date_to = Input::get('date_to' . $i);
                $maidemploymenthistory->country = Input::get('country' . $i);
                $maidemploymenthistory->employer = Input::get('employer' . $i);
                $maidemploymenthistory->work_duty = Input::get('work_duty' . $i);
                $maidemploymenthistory->remarks = Input::get('remarks' . $i);

                if (Input::get('date_from' . $i) != "") $maidemploymenthistory->save();

            }

            $num_row_singapore = Input::get('num_table_row_singapore');

            for ($i = 0; $i < $num_row_singapore; $i++) {
                $maidemploymenthistorysingapore = new MaidEmploymentHistorySingaporeModel;

                $maidemploymenthistorysingapore->user_id = $maidinforms->id;
                $maidemploymenthistorysingapore->employer = Input::get('employer_singapore' . $i);
                $maidemploymenthistorysingapore->feedback = Input::get('feedback' . $i);

                if (Input::get('employer_singapore' . $i) != "") $maidemploymenthistorysingapore->save();

            }

//        return Redirect::route('admin.maids.editMaid');

            $param['msg_register'] = "New Maid data has been registered successfully!";
        }else{

            $nationality_data   = NationalityInformsModel::all();
            $maidagency_data    = MaidAgencyModel::all();
            $maidtype_data      = MaidTypeModel::all();

            $param['title']             = " | Add Maid Data";
            $param['sub_path']          = " Maid Data &DoubleRightArrow; Add New";
            $param['msg_register'] = "This maid data already exist!";
            $param['nationality_data']  = $nationality_data;
            $param['maidagency_data']   = $maidagency_data;
            $param['maidtype_data']     = $maidtype_data;
            return View::make('admin.maids.addMaid')->with($param);
        }

//        $maidinforms_data = MaidInformsModel::all();
        $maidinforms_data = MaidInformsModel::where('supplier_id', Session::get('user_id'))->get();

        $param['maidinforms_data'] = $maidinforms_data;
        $param['title'] = " | Maid Data";
        $param['sub_path'] = " Maid Data";
        return View::make('admin.maids.editMaid')->with($param);
    }

    /**Edit Maid Data*/
    public function editMaid() {
        $param                      = [];

//        $maidinforms_data           = MaidInformsModel::all();
        $maidinforms_data = MaidInformsModel::where('supplier_id', Session::get('user_id'))->get();

        $param['maidinforms_data']  = $maidinforms_data;
        $param['title']             = " | Maid Data";
        $param['sub_path']          = " Maid Data";
        return View::make('admin.maids.editMaid')->with($param);
    }

    /**Update Maid Data*/
    public function updateMaid($id) {
        $param                          = [];

        $maidinformItem_data            = MaidInformsModel::find($id);
        $maidemployment_data            = MaidEmploymentHistoryModel::where('user_id', $id)->get();
        $maidemployment_singapore_data  = MaidEmploymentHistorySingaporeModel::where('user_id', $id)->get();
        $num_history                    = count($maidemployment_data);
        $num_history_singapore          = count($maidemployment_singapore_data);

        $nationality_data   = NationalityInformsModel::all();
        $maidagency_data    = MaidAgencyModel::all();
        $maidtype_data      = MaidTypeModel::all();

        $param['title']                 = " | Edit Maid Data";
        $param['sub_path']              = " Maid Data &DoubleRightArrow; Edit";

        $param['maidinformItem_data']   = $maidinformItem_data;
        $param['maidemployment_data']   = $maidemployment_data;
        $param['maidemployment_singapore_data']   = $maidemployment_singapore_data;
        $param['num_history']           = $num_history;
        $param['num_history_singapore'] = $num_history_singapore;

        $param['nationality_data']      = $nationality_data;
        $param['maidagency_data']       = $maidagency_data;
        $param['maidtype_data']         = $maidtype_data;

        return View::make('admin.maids.updateMaid')->with($param);
    }

    /**View Maid Data*/
    public function viewMaid($id) {
        $param                          = [];

        $maidinformItem_data            = MaidInformsModel::find($id);
        $maidemployment_data            = MaidEmploymentHistoryModel::where('user_id', $id)->get();
        $maidemployment_singapore_data  = MaidEmploymentHistorySingaporeModel::where('user_id', $id)->get();
        $num_history                    = count($maidemployment_data);
        $num_history_singapore          = count($maidemployment_singapore_data);

        $nationality_data   = NationalityInformsModel::all();
        $maidagency_data    = MaidAgencyModel::all();
        $maidtype_data      = MaidTypeModel::all();

        $param['title']                 = " | View Maid Data";
        $param['sub_path']              = " Maid Data &DoubleRightArrow; View";

        $param['maidinformItem_data']   = $maidinformItem_data;
        $param['maidemployment_data']   = $maidemployment_data;
        $param['maidemployment_singapore_data']   = $maidemployment_singapore_data;
        $param['num_history']           = $num_history;
        $param['num_history_singapore'] = $num_history_singapore;

        $param['nationality_data']      = $nationality_data;
        $param['maidagency_data']       = $maidagency_data;
        $param['maidtype_data']         = $maidtype_data;

        return View::make('admin.maids.viewMaid')->with($param);
    }

    /**delete Maid Data*/
    public function deleteMaidData() {
        $maid_id = Input::get('maidDataId');

        if(MaidInformsModel::find($maid_id)) {
            MaidInformsModel::where('id', $maid_id)->delete();
            MaidEmploymentHistoryModel::where('user_id', $maid_id)->delete();
            MaidEmploymentHistorySingaporeModel::where('user_id', $maid_id)->delete();

            $param['msg_register'] = "Maid data has been deleted successfully!";
        }else{
            $param['msg_register'] = "";
        }

//        $maidinforms_data = MaidInformsModel::all();
        $maidinforms_data = MaidInformsModel::where('supplier_id', Session::get('user_id'))->get();

        $param['maidinforms_data'] = $maidinforms_data;
        $param['title'] = " | Edit Maid Data";
        $param['sub_path'] = " Maid DataEdit";
        return View::make('admin.maids.editMaid')->with($param);
    }

    /**ajax functions*/
    public function asyncDeleteMaidData() {
        $maid_id = Input::get('maid_id');

        MaidInformsModel::where('id', $maid_id)->delete();
        MaidEmploymentHistoryModel::where('user_id', $maid_id)->delete();
        MaidEmploymentHistorySingaporeModel::where('user_id', $maid_id)->delete();

        return Response::json(['result' => 'success', 'msg' => 'Maid data deleted successfully.']);
    }

    /**update Maid Data*/
    public function doupdateMaid() {
        $param = [];

        $id                                         = Input::get('id');

        $maidinforms = MaidInformsModel::find($id);

        $maidinforms->supplier_id                   = Session::get('user_id');
        $maidinforms->name                          = Input::get('name');
        $maidinforms->passport_no                   = Input::get('passport_no');
        $maidinforms->birthday_year                 = Input::get('birthday_year');
        $maidinforms->birthday_month                = Input::get('birthday_month');
        $maidinforms->birthday_day                  = Input::get('birthday_day');
        $maidinforms->birth_place                   = Input::get('birth_place');
        $maidinforms->height                        = Input::get('height');
        $maidinforms->weight                        = Input::get('weight');
        $maidinforms->nationality                   = Input::get('nationality');
        $maidinforms->agency                        = Input::get('agency');
//        $maidinforms->type                          = Input::get('type');
        $maidinforms->residential_address           = Input::get('residential_address');
        $maidinforms->contact_number                = Input::get('contact_number');
        $maidinforms->religion                      = Input::get('religion');
        $maidinforms->education_level               = Input::get('education_level');
        $maidinforms->sibling_number                = Input::get('sibling_number');
        $maidinforms->marital_status                = Input::get('marital_status');
        $maidinforms->children_number               = Input::get('children_number');
        $maidinforms->allergy                       = Input::get('allergy');
        $maidinforms->mental_illness                = Input::get('mental_illness');
        $maidinforms->epilepsy                      = Input::get('epilepsy');
        $maidinforms->asthma                        = Input::get('asthma');
        $maidinforms->diabetes                      = Input::get('diabetes');
        $maidinforms->hypertension                  = Input::get('hypertension');
        $maidinforms->tuberculosis                  = Input::get('tuberculosis');
        $maidinforms->heart_disease                 = Input::get('heart_disease');
        $maidinforms->malaria                       = Input::get('malaria');
        $maidinforms->operations                    = Input::get('operations');
        $maidinforms->others                        = Input::get('others');
        $maidinforms->physical_disabilities         = Input::get('physical_disabilities');
        $maidinforms->dietary_restrictions          = Input::get('dietary_restrictions');
        $maidinforms->food_handling_pork            = Input::get('food_handling_pork');
        $maidinforms->food_handling_beef            = Input::get('food_handling_beef');
        $maidinforms->food_handling_others          = Input::get('food_handling_others');
        $maidinforms->preference_rest_day           = Input::get('preference_rest_day');
        $maidinforms->any_other_remarks             = Input::get('any_other_remarks');
        $maidinforms->base_on_fdw                   = Input::get('base_on_fdw');
        $maidinforms->interviewed_singapore         = Input::get('interviewed_singapore');
        $maidinforms->interviewed_overseas          = Input::get('interviewed_overseas');
        $maidinforms->care_infant_willingness       = Input::get('care_infant_willingness');
        $maidinforms->care_infant_years             = Input::get('care_infant_years');
        $maidinforms->care_infant_rate              = Input::get('care_infant_rate');
        $maidinforms->care_infant_remark            = Input::get('care_infant_remark');
        $maidinforms->care_elderly_willingness      = Input::get('care_elderly_willingness');
        $maidinforms->care_elderly_years            = Input::get('care_elderly_years');
        $maidinforms->care_elderly_rate             = Input::get('care_elderly_rate');
        $maidinforms->care_elderly_remark           = Input::get('care_elderly_remark');
        $maidinforms->care_disabled_willingness     = Input::get('care_disabled_willingness');
        $maidinforms->care_disabled_years           = Input::get('care_disabled_years');
        $maidinforms->care_disabled_rate            = Input::get('care_disabled_rate');
        $maidinforms->care_disabled_remark          = Input::get('care_disabled_remark');
        $maidinforms->general_housework_willingness = Input::get('general_housework_willingness');
        $maidinforms->general_housework_years       = Input::get('general_housework_years');
        $maidinforms->general_housework_rate        = Input::get('general_housework_rate');
        $maidinforms->general_housework_remark      = Input::get('general_housework_remark');
        $maidinforms->cooking_willingness           = Input::get('cooking_willingness');
        $maidinforms->cooking_years                 = Input::get('cooking_years');
        $maidinforms->cooking_rate                  = Input::get('cooking_rate');
        $maidinforms->cooking_remark                = Input::get('cooking_remark');
        $maidinforms->language_ability_name1        = Input::get('language_ability_name1');
        $maidinforms->language_ability_name2        = Input::get('language_ability_name2');
        $maidinforms->language_ability_name3        = Input::get('language_ability_name3');
        $maidinforms->other_skills_name             = Input::get('other_skills_name');
        $maidinforms->other_skills_level            = Input::get('other_skills_level');
        $maidinforms->primary_duty = Input::get('primary_duty');
        $maidinforms->employment_history_singapore  = Input::get('employment_history_singapore');

        if (Input::hasFile('imageUpload_profile')) {

            $filename = str_random(24).".".Input::file('imageUpload_profile')->getClientOriginalExtension();
            Input::file('imageUpload_profile')->move('assets/upload/images/maids/', $filename);
            $maidinforms->profile_img               = '/assets/upload/images/maids/' . $filename;
        }
        if (Input::hasFile('imageUpload_full')) {
            $filename = str_random(24).".".Input::file('imageUpload_full')->getClientOriginalExtension();
            Input::file('imageUpload_full')->move('assets/upload/images/maids/', $filename);
            $maidinforms->profile_full_img          = '/assets/upload/images/maids/' . $filename;
        }
        $maidinforms->basic_salary                  = Input::get('basic_salary');

        $maidinforms->save();

        $num_row = Input::get('num_table_row');

        for($i=0;$i<$num_row;$i++){
            $maidemployment_id = Input::get('maidemployment_id' . $i);
            if($maidemployment_id == 0) {
                $maidemploymenthistory = new MaidEmploymentHistoryModel;

                $maidemploymenthistory->user_id = $maidinforms->id;
                $maidemploymenthistory->date_from = Input::get('date_from' . $i);
                $maidemploymenthistory->date_to = Input::get('date_to' . $i);
                $maidemploymenthistory->country = Input::get('country' . $i);
                $maidemploymenthistory->employer = Input::get('employer' . $i);
                $maidemploymenthistory->work_duty = Input::get('work_duty' . $i);
                $maidemploymenthistory->remarks = Input::get('remarks' . $i);

                if (Input::get('date_from' . $i) != "") $maidemploymenthistory->save();
            }else{
                $maidemploymenthistory = MaidEmploymentHistoryModel::find($maidemployment_id);

                $maidemploymenthistory->user_id = $maidinforms->id;
                $maidemploymenthistory->date_from = Input::get('date_from' . $i);
                $maidemploymenthistory->date_to = Input::get('date_to' . $i);
                $maidemploymenthistory->country = Input::get('country' . $i);
                $maidemploymenthistory->employer = Input::get('employer' . $i);
                $maidemploymenthistory->work_duty = Input::get('work_duty' . $i);
                $maidemploymenthistory->remarks = Input::get('remarks' . $i);

                if (Input::get('date_from' . $i) != "") $maidemploymenthistory->save();
                else $maidemploymenthistory->delete();
            }
        }

        $num_row_singapore = Input::get('num_table_row_singapore');

        for($i=0;$i<$num_row_singapore;$i++){
            $maidemployment_singapore_id = Input::get('maidemployment_singapore_id' . $i);
            if($maidemployment_singapore_id == 0) {
                $maidemploymenthistorysingapore = new MaidEmploymentHistorySingaporeModel;

                $maidemploymenthistorysingapore->user_id = $maidinforms->id;
                $maidemploymenthistorysingapore->employer = Input::get('employer_singapore' . $i);
                $maidemploymenthistorysingapore->feedback = Input::get('feedback' . $i);

                if (Input::get('employer_singapore' . $i) != "") $maidemploymenthistorysingapore->save();
            }else{
                $maidemploymenthistorysingapore = MaidEmploymentHistorySingaporeModel::find($maidemployment_singapore_id);

                $maidemploymenthistorysingapore->user_id = $maidinforms->id;
                $maidemploymenthistorysingapore->employer = Input::get('employer_singapore' . $i);
                $maidemploymenthistorysingapore->feedback = Input::get('feedback' . $i);

                if (Input::get('employer_singapore' . $i) != "") $maidemploymenthistorysingapore->save();
                else $maidemploymenthistorysingapore->delete();
            }
        }

//        return Redirect::route('admin.maids.editMaid');

//        $maidinforms_data           = MaidInformsModel::all();
        $maidinforms_data = MaidInformsModel::where('supplier_id', Session::get('user_id'))->get();

        $param['maidinforms_data']  = $maidinforms_data;
        $param['title']             = " | Maid Data";
        $param['msg_register']      = "Maid data has been updated successfully!";
        $param['sub_path']          = " Maid Data";
        return View::make('admin.maids.editMaid')->with($param);
    }


}
