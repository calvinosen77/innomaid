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
use Application as ApplicationModel;
use CostReplacement as CostReplacementModel;
use OtherServices as OtherServicesModel;
use ServicesNew as ServicesNewModel;
use ServicesReplacement as ServicesReplacementModel;
use PlacementFee as PlacementFeeModel;

class MaidApplicationController extends \BaseController {

    public function application() {
        $param = [];

//        $application_data           = ApplicationModel::all();
        $application_data           = ApplicationModel::where('supplier_id', Session::get('user_id'))->get();

        $num                        = count($application_data);
        $employer_data              = array();
        $maid_data                  = array();
        for($i=0;$i<$num;$i++){
            $employer_row           = EmployerInformsModel::where('id', $application_data[$i]->employer_id)->get();
            $employer_data[$i]      = $employer_row[0];
            $maid_row               = MaidInformsModel::where('id', $application_data[$i]->maid_id)->get();
            $maid_data[$i]          = $maid_row[0];
        }

        $param['application_data']  = $application_data;
        $param['num']               = $num;
        $param['employer_data']     = $employer_data;
        $param['maid_data']         = $maid_data;
        $param['title']             = " | Maid Application";
        $param['sub_path']          = " Maid Application";
        return View::make('admin.application.application')->with($param);
    }

    public function addApplication() {
        $param = [];

//        $maidinformItem_data        = MaidInformsModel::all();
//        $employerinformItem_data    = EmployerInformsModel::all();

        $maidinformItem_data          = MaidInformsModel::where('supplier_id', Session::get('user_id'))->get();
        $employerinformItem_data      = EmployerInformsModel::where('supplier_id', Session::get('user_id'))->get();

        $nationality_data           = NationalityInformsModel::all();

        $param['maidinform_data']       = $maidinformItem_data;
        $param['employerinform_data']   = $employerinformItem_data;
        $param['nationality_data']      = $nationality_data;

        $param['title']             = " | Add New Application";
        $param['sub_path']          = " Maid Application &DoubleRightArrow; Add New";
        return View::make('admin.application.addApplication')->with($param);
    }

    /**View Application*/
    public function viewApplication($id) {
        $param                        = [];

        $applicationitem_data         = ApplicationModel::find($id);

        $maidinformItem_data          = MaidInformsModel::all();
        $employerinformItem_data      = EmployerInformsModel::all();

        if($applicationitem_data->purpose == 'Replacement'){
            $servicesItem_data        = ServicesReplacementModel::where('application_id', $id)->get();
            $otherservices_data       = OtherServicesModel::where('application_id', $id)->get();
            $row_otherservices        = count($otherservices_data);
            $placementfee_data        = PlacementFeeModel::where('application_id', $id)->get();
            $row_placementfee         = count($placementfee_data);

            $param['servicesItem_data']        = $servicesItem_data[0];
            $param['otherservices_data']       = $otherservices_data;
            $param['row_otherservices']        = $row_otherservices;
            $param['placementfee_data']        = $placementfee_data;
            $param['row_placementfee']         = $row_placementfee;
        }else{
            $servicesItem_data        = ServicesNewModel::where('application_id', $id)->get();
            $costreplacement_data     = CostReplacementModel::where('application_id', $id)->get();
            $row_costreplacement      = count($costreplacement_data);
            $otherservices_data       = OtherServicesModel::where('application_id', $id)->get();
            $row_otherservices        = count($otherservices_data);
            $placementfee_data        = PlacementFeeModel::where('application_id', $id)->get();
            $row_placementfee         = count($placementfee_data);

            $param['servicesItem_data']        = $servicesItem_data[0];
            $param['costreplacement_data']     = $costreplacement_data;
            $param['row_costreplacement']      = $row_costreplacement;
            $param['otherservices_data']       = $otherservices_data;
            $param['row_otherservices']        = $row_otherservices;
            $param['placementfee_data']        = $placementfee_data;
            $param['row_placementfee']         = $row_placementfee;
        }

        $nationality_data   = NationalityInformsModel::all();

        $param['title']                 = " | View Application";
        $param['sub_path']              = " Maid Application &DoubleRightArrow; View";

        $param['employerinform_data']   = $employerinformItem_data;
        $param['applicationitem_data']  = $applicationitem_data;
        $param['maidinform_data']       = $maidinformItem_data;

        $param['nationality_data'] = $nationality_data;

        return View::make('admin.application.viewApplication')->with($param);
    }


    /**Update Application*/
    public function updateApplication($id) {
        $param                        = [];

        $applicationitem_data         = ApplicationModel::find($id);

//        $maidinformItem_data          = MaidInformsModel::all();
//        $employerinformItem_data      = EmployerInformsModel::all();

        $maidinformItem_data          = MaidInformsModel::where('supplier_id', Session::get('user_id'))->get();
        $employerinformItem_data      = EmployerInformsModel::where('supplier_id', Session::get('user_id'))->get();

        if($applicationitem_data->purpose == 'Replacement'){
            $servicesItem_data        = ServicesReplacementModel::where('application_id', $id)->get();
            $otherservices_data       = OtherServicesModel::where('application_id', $id)->get();
            $row_otherservices        = count($otherservices_data);
            $placementfee_data        = PlacementFeeModel::where('application_id', $id)->get();
            $row_placementfee         = count($placementfee_data);

            $param['servicesItem_data']        = $servicesItem_data[0];
            $param['otherservices_data']       = $otherservices_data;
            $param['row_otherservices']        = $row_otherservices;
            $param['placementfee_data']        = $placementfee_data;
            $param['row_placementfee']         = $row_placementfee;
        }else{
            $servicesItem_data        = ServicesNewModel::where('application_id', $id)->get();
            $costreplacement_data     = CostReplacementModel::where('application_id', $id)->get();
            $row_costreplacement      = count($costreplacement_data);
            $otherservices_data       = OtherServicesModel::where('application_id', $id)->get();
            $row_otherservices        = count($otherservices_data);
            $placementfee_data        = PlacementFeeModel::where('application_id', $id)->get();
            $row_placementfee         = count($placementfee_data);

            $param['servicesItem_data']        = $servicesItem_data[0];
            $param['costreplacement_data']     = $costreplacement_data;
            $param['row_costreplacement']      = $row_costreplacement;
            $param['otherservices_data']       = $otherservices_data;
            $param['row_otherservices']        = $row_otherservices;
            $param['placementfee_data']        = $placementfee_data;
            $param['row_placementfee']         = $row_placementfee;
        }

        $nationality_data   = NationalityInformsModel::all();

        $param['title']                 = " | Edit Application";
        $param['sub_path']              = " Maid Application &DoubleRightArrow; Edit";

        $param['employerinform_data']   = $employerinformItem_data;
        $param['applicationitem_data']  = $applicationitem_data;
        $param['maidinform_data']       = $maidinformItem_data;

        $param['nationality_data'] = $nationality_data;

        return View::make('admin.application.updateApplication')->with($param);
    }

    /**delete Application*/
    public function deleteApplication() {
        $param = [];

        $application_id = Input::get('applicationDataId');

        if(ApplicationModel::find($application_id)) {
            ApplicationModel::where('id', $application_id)->delete();
            CostReplacementModel::where('application_id', $application_id)->delete();
            OtherServicesModel::where('application_id', $application_id)->delete();
            PlacementFeeModel::where('application_id', $application_id)->delete();
            ServicesNewModel::where('application_id', $application_id)->delete();
            ServicesReplacementModel::where('application_id', $application_id)->delete();

            $param['msg_register'] = "Maid Application has been deleted successfully!";
        }else{
            $param['msg_register'] = "";
        }


//        $application_data           = ApplicationModel::all();
        $application_data           = ApplicationModel::where('supplier_id', Session::get('user_id'))->get();
        $num                        = count($application_data);
        $employer_data              = array();
        $maid_data                  = array();
        for($i=0;$i<$num;$i++){
            $employer_row           = EmployerInformsModel::where('id', $application_data[$i]->employer_id)->get();
            $employer_data[$i]      = $employer_row[0];
            $maid_row               = MaidInformsModel::where('id', $application_data[$i]->maid_id)->get();
            $maid_data[$i]          = $maid_row[0];
        }

        $param['application_data']  = $application_data;
        $param['num']               = $num;
        $param['employer_data']     = $employer_data;
        $param['maid_data']         = $maid_data;
        $param['title']             = " | Maid Application";
        $param['sub_path']          = " Maid Application";
        return View::make('admin.application.application')->with($param);
    }

    /**update Application*/
    public function doupdateApplication() {

        $param = [];


        $application_id = Input::get('application_id');
        $employer_id    = Input::get('employer_id');
        $maid_id        = Input::get('maid_id');
        $purpose        = Input::get('purpose');
//application table
        $application = ApplicationModel::find($application_id);
        $application->supplier_id = Session::get('user_id');
        $application->employer_id = $employer_id;
        $application->maid_id = $maid_id;
        $application->purpose = $purpose;

        $application->save();

        if($purpose == 'New' || $purpose == 'Add') {
//services new table
            $servicesnew0                         = ServicesNewModel::where('application_id', $application->id)->get();
            $servicesnew = $servicesnew0[0];
            $servicesnew->select_maid_id         = Input::get('new_select_maid_id');
            $servicesnew->created_date           = Input::get('new_created_date');
            $servicesnew->nationality            = Input::get('new_nationality');
            $servicesnew->passport_no            = Input::get('new_passport_no');
            $servicesnew->salary                 = Input::get('new_salary');
            $servicesnew->price_reg              = Input::get('new_price_reg');
            $servicesnew->price_reg_title        = Input::get('new_price_reg_title');
            $servicesnew->price_doc              = Input::get('new_price_doc');
            $servicesnew->price_doc_title        = Input::get('new_price_doc_title');
            $servicesnew->price_med              = Input::get('new_price_med');
            $servicesnew->price_med_title        = Input::get('new_price_med_title');
            $servicesnew->price_pre              = Input::get('new_price_pre');
            $servicesnew->price_pre_title        = Input::get('new_price_pre_title');
            $servicesnew->price_rei              = Input::get('new_price_rei');
            $servicesnew->price_rei_title        = Input::get('new_price_rei_title');
            $servicesnew->price_hom              = Input::get('new_price_hom');
            $servicesnew->price_hom_title        = Input::get('new_price_hom_title');
            $servicesnew->price_cou              = Input::get('new_price_cou');
            $servicesnew->price_cou_title        = Input::get('new_price_cou_title');
            $servicesnew->price_eng              = Input::get('new_price_eng');
            $servicesnew->price_eng_title        = Input::get('new_price_eng_title');
            $servicesnew->price_saf              = Input::get('new_price_saf');
            $servicesnew->price_saf_title        = Input::get('new_price_saf_title');
            $servicesnew->price_dep              = Input::get('new_price_dep');
            $servicesnew->price_fin              = Input::get('new_price_fin');
            $servicesnew->price_ser              = Input::get('new_price_ser');
            $servicesnew->price_per              = Input::get('new_price_per');
            $servicesnew->price_boi              = Input::get('new_price_boi');
            $servicesnew->price_ful              = Input::get('new_price_ful');
            $servicesnew->price_oth              = Input::get('new_price_oth');

            $servicesnew->save();

            $num_table_row_replacement = Input::get('num_table_row_replacement');

            for ($i = 0; $i < $num_table_row_replacement; $i++) {
                $costreplacement_id = Input::get('costreplacement_id' . $i);
                if($costreplacement_id == 0) {

                    $costreplacement = new CostReplacementModel;

                    $costreplacement->application_id = $application->id;
                    $costreplacement->price_cos_first = Input::get('new_price_cos_first' . $i);
                    $costreplacement->price_cos_second = Input::get('new_price_cos_second' . $i);
                    $costreplacement->price_cos_third = Input::get('new_price_cos_third' . $i);

                    if (Input::get('new_price_cos_first' . $i) != "") $costreplacement->save();
                }else{
                    $costreplacement0 = CostReplacementModel::where('application_id', $application->id)->get();
                    $costreplacement = $costreplacement0[0];

                    $costreplacement->price_cos_first = Input::get('new_price_cos_first' . $i);
                    $costreplacement->price_cos_second = Input::get('new_price_cos_second' . $i);
                    $costreplacement->price_cos_third = Input::get('new_price_cos_third' . $i);

                    if (Input::get('new_price_cos_first' . $i) != "") $costreplacement->save();
                    else $costreplacement->delete();

                }
            }
//other services table
            $num_table_row_other = Input::get('num_table_row_other');

            for ($i = 0; $i < $num_table_row_other; $i++) {
                $otherservices_id = Input::get('otherservices_id' . $i);
                if($otherservices_id == 0) {
                    $otherservices = new OtherServicesModel;

                    $otherservices->application_id = $application->id;
                    $otherservices->price_other_title = Input::get('new_price_other_title' . $i);
                    $otherservices->price_other_price = Input::get('new_price_other_price' . $i);

                    if (Input::get('new_price_other_title' . $i) != "") $otherservices->save();
                }else{
                    $otherservices0 = OtherServicesModel::where('application_id', $application->id)->get();
                    $otherservices = $otherservices0[0];

                    $otherservices->price_other_title = Input::get('new_price_other_title' . $i);
                    $otherservices->price_other_price = Input::get('new_price_other_price' . $i);

                    if (Input::get('new_price_other_title' . $i) != "") $otherservices->save();
                    else $otherservices->delete();

                }
            }
//placement fee table
            $num_table_row_payment = Input::get('num_table_row_payment');

            for ($i = 0; $i < $num_table_row_payment; $i++) {
                $placementfee_id = Input::get('placementfee_id' . $i);
                if($placementfee_id == 0) {
                    $placementfee = new PlacementFeeModel;

                    $placementfee->application_id = $application->id;
                    $placementfee->price_pay_first = Input::get('new_price_pay_first' . $i);
                    $placementfee->price_pay_second = Input::get('new_price_pay_second' . $i);

                    if (Input::get('new_price_pay_first' . $i) != "") $placementfee->save();
                }else{
                    $placementfee0 = PlacementFeeModel::where('application_id', $application->id)->get();
                    $placementfee = $placementfee0[0];

                    $placementfee->price_pay_first = Input::get('new_price_pay_first' . $i);
                    $placementfee->price_pay_second = Input::get('new_price_pay_second' . $i);

                    if (Input::get('new_price_pay_first' . $i) != "") $placementfee->save();
                    else $placementfee->delete();
                }
            }


        }else{
//services replacement table
            $servicesreplacement0                         = ServicesReplacementModel::where('application_id', $application->id)->get();
            $servicesreplacement = $servicesreplacement0[0];
            $servicesreplacement->select_maid_id         = Input::get('replacement_select_maid_id');
            $servicesreplacement->created_date           = Input::get('replacement_created_date');
            $servicesreplacement->nationality            = Input::get('replacement_nationality');
            $servicesreplacement->passport_no            = Input::get('replacement_passport_no');
            $servicesreplacement->salary                 = Input::get('replacement_salary');
            $servicesreplacement->replace_maid_id        = Input::get('replacement_replace_maid_id');
            $servicesreplacement->replace_passport_no    = Input::get('replacement_replace_passport_no');
            $servicesreplacement->price_reg              = Input::get('replacement_price_reg');
            $servicesreplacement->price_reg_title        = Input::get('replacement_price_reg_title');
            $servicesreplacement->price_doc              = Input::get('replacement_price_doc');
            $servicesreplacement->price_doc_title        = Input::get('replacement_price_doc_title');
            $servicesreplacement->price_med              = Input::get('replacement_price_med');
            $servicesreplacement->price_med_title        = Input::get('replacement_price_med_title');
            $servicesreplacement->price_pre              = Input::get('replacement_price_pre');
            $servicesreplacement->price_pre_title        = Input::get('replacement_price_pre_title');
            $servicesreplacement->price_rei              = Input::get('replacement_price_rei');
            $servicesreplacement->price_rei_title        = Input::get('replacement_price_rei_title');
            $servicesreplacement->price_hom              = Input::get('replacement_price_hom');
            $servicesreplacement->price_hom_title        = Input::get('replacement_price_hom_title');
            $servicesreplacement->price_cou              = Input::get('replacement_price_cou');
            $servicesreplacement->price_cou_title        = Input::get('replacement_price_cou_title');
            $servicesreplacement->price_eng              = Input::get('replacement_price_eng');
            $servicesreplacement->price_eng_title        = Input::get('replacement_price_eng_title');
            $servicesreplacement->price_saf              = Input::get('replacement_price_saf');
            $servicesreplacement->price_saf_title        = Input::get('replacement_price_saf_title');
            $servicesreplacement->price_dep              = Input::get('replacement_price_dep');
            $servicesreplacement->price_fin              = Input::get('replacement_price_fin');
            $servicesreplacement->price_ful              = Input::get('replacement_price_ful');
            $servicesreplacement->price_oth              = Input::get('replacement_price_oth');

            $servicesreplacement->save();

//other services table
            $replacement_num_table_row_other = Input::get('replacement_num_table_row_other');

            for ($i = 0; $i < $replacement_num_table_row_other; $i++) {
                $replacement_otherservices_id = Input::get('replacement_otherservices_id' . $i);
                if($replacement_otherservices_id == 0) {
                    $otherservices = new OtherServicesModel;

                    $otherservices->application_id = $application->id;
                    $otherservices->price_other_title = Input::get('replacement_price_other_title' . $i);
                    $otherservices->price_other_price = Input::get('replacement_price_other_price' . $i);

                    if (Input::get('replacement_price_other_title' . $i) != "") $otherservices->save();
                }else{
                    $otherservices0 = OtherServicesModel::where('application_id', $application->id)->get();
                    $otherservices = $otherservices0[0];

                    $otherservices->price_other_title = Input::get('replacement_price_other_title' . $i);
                    $otherservices->price_other_price = Input::get('replacement_price_other_price' . $i);

                    if (Input::get('replacement_price_other_title' . $i) != "") $otherservices->save();
                    else $otherservices->delete();
                }
            }
//placement fee table
            $replacement_num_table_row_payment = Input::get('replacement_num_table_row_payment');

            for ($i = 0; $i < $replacement_num_table_row_payment; $i++) {
                $replacement_placementfee_id = Input::get('replacement_placementfee_id' . $i);
                if($replacement_placementfee_id == 0) {

                    $placementfee = new PlacementFeeModel;

                    $placementfee->application_id = $application->id;
                    $placementfee->price_pay_first = Input::get('replacement_price_pay_first' . $i);
                    $placementfee->price_pay_second = Input::get('replacement_price_pay_second' . $i);

                    if (Input::get('replacement_price_pay_first' . $i) != "") $placementfee->save();
                }else{
                    $placementfee0 = PlacementFeeModel::where('application_id', $application->id)->get();
                    $placementfee = $placementfee0[0];

                    $placementfee->price_pay_first = Input::get('replacement_price_pay_first' . $i);
                    $placementfee->price_pay_second = Input::get('replacement_price_pay_second' . $i);

                    if (Input::get('replacement_price_pay_first' . $i) != "") $placementfee->save();
                    else $placementfee->delete();

                }
            }

        }

        $param['msg_register'] = "Current Maid Application has been updated successfully!";

//        $application_data           = ApplicationModel::all();
        $application_data           = ApplicationModel::where('supplier_id', Session::get('user_id'))->get();
        $num                        = count($application_data);
        $employer_data              = array();
        $maid_data                  = array();
        for($i=0;$i<$num;$i++){
            $employer_row           = EmployerInformsModel::where('id', $application_data[$i]->employer_id)->get();
            $employer_data[$i]      = $employer_row[0];
            $maid_row               = MaidInformsModel::where('id', $application_data[$i]->maid_id)->get();
            $maid_data[$i]          = $maid_row[0];
        }

        $param['application_data']  = $application_data;
        $param['num']               = $num;
        $param['employer_data']     = $employer_data;
        $param['maid_data']         = $maid_data;
        $param['title']             = " | Maid Application";
        $param['sub_path']          = " Maid Application";

        return View::make('admin.application.application')->with($param);

    }

    /**Add New Application*/
    public function addNewApplication() {
        $param = [];

        $employer_id    = Input::get('employer_id');
        $maid_id        = Input::get('maid_id');
        $purpose        = Input::get('purpose');

        $check_exisitng = ApplicationModel::where('employer_id', $employer_id)->where('maid_id', $maid_id)->where('purpose', $purpose)->get();
        if(count($check_exisitng) == 0) {
//application table
            $application = new ApplicationModel;
            $application->supplier_id = Session::get('user_id');
            $application->employer_id = $employer_id;
            $application->maid_id = $maid_id;
            $application->purpose = $purpose;

            $application->save();

            if($purpose == 'New' || $purpose == 'Add') {
//services new table
                $servicesnew                         = new ServicesNewModel;
                $servicesnew->application_id         = $application->id;
                $servicesnew->select_maid_id         = Input::get('new_select_maid_id');
                $servicesnew->created_date           = Input::get('new_created_date');
                $servicesnew->nationality            = Input::get('new_nationality');
                $servicesnew->passport_no            = Input::get('new_passport_no');
                $servicesnew->salary                 = Input::get('new_salary');
                $servicesnew->price_reg              = Input::get('new_price_reg');
                $servicesnew->price_reg_title        = Input::get('new_price_reg_title');
                $servicesnew->price_doc              = Input::get('new_price_doc');
                $servicesnew->price_doc_title        = Input::get('new_price_doc_title');
                $servicesnew->price_med              = Input::get('new_price_med');
                $servicesnew->price_med_title        = Input::get('new_price_med_title');
                $servicesnew->price_pre              = Input::get('new_price_pre');
                $servicesnew->price_pre_title        = Input::get('new_price_pre_title');
                $servicesnew->price_rei              = Input::get('new_price_rei');
                $servicesnew->price_rei_title        = Input::get('new_price_rei_title');
                $servicesnew->price_hom              = Input::get('new_price_hom');
                $servicesnew->price_hom_title        = Input::get('new_price_hom_title');
                $servicesnew->price_cou              = Input::get('new_price_cou');
                $servicesnew->price_cou_title        = Input::get('new_price_cou_title');
                $servicesnew->price_eng              = Input::get('new_price_eng');
                $servicesnew->price_eng_title        = Input::get('new_price_eng_title');
                $servicesnew->price_saf              = Input::get('new_price_saf');
                $servicesnew->price_saf_title        = Input::get('new_price_saf_title');
                $servicesnew->price_dep              = Input::get('new_price_dep');
                $servicesnew->price_fin              = Input::get('new_price_fin');
                $servicesnew->price_ser              = Input::get('new_price_ser');
                $servicesnew->price_per              = Input::get('new_price_per');
                $servicesnew->price_boi              = Input::get('new_price_boi');
                $servicesnew->price_ful              = Input::get('new_price_ful');
                $servicesnew->price_oth              = Input::get('new_price_oth');

                $servicesnew->save();

                $num_table_row_replacement = Input::get('num_table_row_replacement');

                for ($i = 0; $i < $num_table_row_replacement; $i++) {
                    $costreplacement = new CostReplacementModel;

                    $costreplacement->application_id    = $application->id;
                    $costreplacement->price_cos_first   = Input::get('new_price_cos_first' . $i);
                    $costreplacement->price_cos_second  = Input::get('new_price_cos_second' . $i);
                    $costreplacement->price_cos_third   = Input::get('new_price_cos_third' . $i);

                    if (Input::get('new_price_cos_first' . $i) != "") $costreplacement->save();

                }
//other services table
                $num_table_row_other = Input::get('num_table_row_other');

                for ($i = 0; $i < $num_table_row_other; $i++) {
                    $otherservices = new OtherServicesModel;

                    $otherservices->application_id    = $application->id;
                    $otherservices->price_other_title   = Input::get('new_price_other_title' . $i);
                    $otherservices->price_other_price  = Input::get('new_price_other_price' . $i);

                    if (Input::get('new_price_other_title' . $i) != "") $otherservices->save();

                }
//placement fee table
                $num_table_row_payment = Input::get('num_table_row_payment');

                for ($i = 0; $i < $num_table_row_payment; $i++) {
                    $placementfee = new PlacementFeeModel;

                    $placementfee->application_id    = $application->id;
                    $placementfee->price_pay_first   = Input::get('new_price_pay_first' . $i);
                    $placementfee->price_pay_second  = Input::get('new_price_pay_second' . $i);

                    if (Input::get('new_price_other_title' . $i) != "") $placementfee->save();

                }


            }else{
//services replacement table
                $servicesreplacement                         = new ServicesReplacementModel;
                $servicesreplacement->application_id         = $application->id;
                $servicesreplacement->select_maid_id         = Input::get('replacement_select_maid_id');
                $servicesreplacement->created_date           = Input::get('replacement_created_date');
                $servicesreplacement->nationality            = Input::get('replacement_nationality');
                $servicesreplacement->passport_no            = Input::get('replacement_passport_no');
                $servicesreplacement->salary                 = Input::get('replacement_salary');
                $servicesreplacement->replace_maid_id        = Input::get('replacement_replace_maid_id');
                $servicesreplacement->replace_passport_no    = Input::get('replacement_replace_passport_no');
                $servicesreplacement->price_reg              = Input::get('replacement_price_reg');
                $servicesreplacement->price_reg_title        = Input::get('replacement_price_reg_title');
                $servicesreplacement->price_doc              = Input::get('replacement_price_doc');
                $servicesreplacement->price_doc_title        = Input::get('replacement_price_doc_title');
                $servicesreplacement->price_med              = Input::get('replacement_price_med');
                $servicesreplacement->price_med_title        = Input::get('replacement_price_med_title');
                $servicesreplacement->price_pre              = Input::get('replacement_price_pre');
                $servicesreplacement->price_pre_title        = Input::get('replacement_price_pre_title');
                $servicesreplacement->price_rei              = Input::get('replacement_price_rei');
                $servicesreplacement->price_rei_title        = Input::get('replacement_price_rei_title');
                $servicesreplacement->price_hom              = Input::get('replacement_price_hom');
                $servicesreplacement->price_hom_title        = Input::get('replacement_price_hom_title');
                $servicesreplacement->price_cou              = Input::get('replacement_price_cou');
                $servicesreplacement->price_cou_title        = Input::get('replacement_price_cou_title');
                $servicesreplacement->price_eng              = Input::get('replacement_price_eng');
                $servicesreplacement->price_eng_title        = Input::get('replacement_price_eng_title');
                $servicesreplacement->price_saf              = Input::get('replacement_price_saf');
                $servicesreplacement->price_saf_title        = Input::get('replacement_price_saf_title');
                $servicesreplacement->price_dep              = Input::get('replacement_price_dep');
                $servicesreplacement->price_fin              = Input::get('replacement_price_fin');
                $servicesreplacement->price_ful              = Input::get('replacement_price_ful');
                $servicesreplacement->price_oth              = Input::get('replacement_price_oth');

                $servicesreplacement->save();

//other services table
                $replacement_num_table_row_other = Input::get('replacement_num_table_row_other');

                for ($i = 0; $i < $replacement_num_table_row_other; $i++) {
                    $otherservices = new OtherServicesModel;

                    $otherservices->application_id    = $application->id;
                    $otherservices->price_other_title   = Input::get('replacement_price_other_title' . $i);
                    $otherservices->price_other_price  = Input::get('replacement_price_other_price' . $i);

                    if (Input::get('replacement_price_other_title' . $i) != "") $otherservices->save();

                }
//placement fee table
                $replacement_num_table_row_payment = Input::get('replacement_num_table_row_payment');

                for ($i = 0; $i < $replacement_num_table_row_payment; $i++) {
                    $placementfee = new PlacementFeeModel;

                    $placementfee->application_id    = $application->id;
                    $placementfee->price_pay_first   = Input::get('replacement_price_pay_first' . $i);
                    $placementfee->price_pay_second  = Input::get('replacement_price_pay_second' . $i);

                    if (Input::get('replacement_price_other_title' . $i) != "") $placementfee->save();

                }

            }

            $param['msg_register'] = "New Maid Application has been registered successfully!";

        }else{

            $maidinformItem_data          = MaidInformsModel::where('supplier_id', Session::get('user_id'))->get();
            $employerinformItem_data      = EmployerInformsModel::where('supplier_id', Session::get('user_id'))->get();

            $nationality_data           = NationalityInformsModel::all();

            $param['maidinform_data']       = $maidinformItem_data;
            $param['employerinform_data']   = $employerinformItem_data;
            $param['nationality_data']      = $nationality_data;

            $param['title']             = " | Add New Application";
            $param['sub_path']          = " Maid Application &DoubleRightArrow; Add New";
            $param['msg_register'] = "This application data already exist!";
            return View::make('admin.application.addApplication')->with($param);

        }

//        $application_data           = ApplicationModel::all();
        $application_data           = ApplicationModel::where('supplier_id', Session::get('user_id'))->get();
        $num                        = count($application_data);
        $employer_data              = array();
        $maid_data                  = array();
        for($i=0;$i<$num;$i++){
            $employer_row           = EmployerInformsModel::where('id', $application_data[$i]->employer_id)->get();
            $employer_data[$i]      = $employer_row[0];
            $maid_row               = MaidInformsModel::where('id', $application_data[$i]->maid_id)->get();
            $maid_data[$i]          = $maid_row[0];
        }

        $param['application_data']  = $application_data;
        $param['num']               = $num;
        $param['employer_data']     = $employer_data;
        $param['maid_data']         = $maid_data;
        $param['title']             = " | Maid Application";
        $param['sub_path']          = " Maid Application";
        return View::make('admin.application.application')->with($param);
    }

    public function asyncGetEmployerData() {

        $id = Input::get('id');

        $employeritem_data            = EmployerInformsModel::find($id);
        $employerfamily_data          = UserFamilymembersModel::where('user_id', $id)->get();
        $num_family                   = count($employerfamily_data);

        return Response::json(['employeritem_data' => $employeritem_data, 'employerfamily_data' => $employerfamily_data, 'num_family' => $num_family, 'result' => 'success', 'msg' => 'Your template has been saved successfully.']);
    }

    public function asyncGetMaidData() {

        $id = Input::get('id');

        $maiditem_data                = MaidInformsModel::find($id);

        return Response::json(['maiditem_data' => $maiditem_data, 'result' => 'success']);
    }


}
