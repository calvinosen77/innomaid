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

class AgencyController extends \BaseController {

    /**List Agency Data*/
    public function index() {
        $param                   = [];

        $agencyItems             = array();
        $agencyInforms_data      = UsersModel::where('user_group', 2)->get();
        $countAgency             = count($agencyInforms_data);
        for($i=0;$i<$countAgency;$i++){
            $item                = AgencyInformsModel::where('user_id', $agencyInforms_data[$i]->id)->get();
            $agencyItems[$i]     = $item[0];
        }
        $param['agencyInforms']  = $agencyInforms_data;
        $param['agencyItems']    = $agencyItems;
        $param['countAgency']    = $countAgency;
        $param['sub_path']       = " Agency Data";
        $param['title'] = " | Agency Data";
        return View::make('admin.agencies.agency')->with($param);
    }

    public function addAgency() {
        $param = [];

        $param['title']             = " | Add New Agency";
        $param['sub_path']          = " Agency &DoubleRightArrow; Add New";
        return View::make('admin.agencies.addAgency')->with($param);
    }

    public function updateAgency($id) {
        $param                          = [];

        $agencyInform              = UsersModel::find($id);
        $agencyItem                = AgencyInformsModel::where('user_id', $id)->get();

        $param['agencyInform']     = $agencyInform;
        $param['agencyItem']       = $agencyItem[0];

        $param['msg_duplicate'] = "";

        $param['title']            = " | Edit Agency";
        $param['sub_path']         = " Agency &DoubleRightArrow; Edit";
        return View::make('admin.agencies.updateAgency')->with($param);
    }

    public function deleteAgency() {
        $param = [];

        $agencyDataId = Input::get('agencyDataId');

        if(UsersModel::find($agencyDataId)) {
            UsersModel::where('id', $agencyDataId)->delete();
            AgencyInformsModel::where('user_id', $agencyDataId)->delete();

            $param['msg_register'] = "Agency data has been deleted successfully!";
        }else{
            $param['msg_register'] = "";
        }


        $agencyItems             = array();
        $agencyInforms_data      = UsersModel::where('user_group', 2)->get();
        $countAgency             = count($agencyInforms_data);
        for($i=0;$i<$countAgency;$i++){
            $item                = AgencyInformsModel::where('user_id', $agencyInforms_data[$i]->id)->get();
            $agencyItems[$i]     = $item[0];
        }
        $param['agencyInforms']  = $agencyInforms_data;
        $param['agencyItems']    = $agencyItems;
        $param['countAgency']    = $countAgency;
        $param['sub_path']       = " Agency Data";
        $param['title'] = " | Agency Data";
        return View::make('admin.agencies.agency')->with($param);
    }

    /**Add New Employer*/
    public function addNewAgency() {
        $param = [];
        $check_existing = UsersModel::where('email', Input::get('email'))->get();
        if(count($check_existing) == 0) {

            $users                  = new UsersModel;

            $users->email           = Input::get('email');
            $users->password        = md5(Input::get('password'));
            $users->user_group      = 2;
            $users->active          = Input::get('active');
            if(Input::get('active') == 1) $users->mail_status = 1;

            $users->save();

            $userInforms = new AgencyInformsModel;

            if (Input::hasFile('imageUpload_logo')) {

                $filename = str_random(24).".".Input::file('imageUpload_logo')->getClientOriginalExtension();
                Input::file('imageUpload_logo')->move('assets/upload/images/companies/', $filename);
                $userInforms->company_logo      = '/assets/upload/images/companies/' . $filename;
            }

            $userInforms->user_id               = $users->id;
            $userInforms->company_name          = Input::get('company_name');
            $userInforms->company_no            = Input::get('company_no');
            $userInforms->address               = Input::get('address');
            $userInforms->phone_number          = Input::get('phone_number');

            $userInforms->save();

            $adminInform0 = UsersModel::where('user_group', 1)->get();
            $adminInform = $adminInform0[0];
            $adminItem0 = SuperInformsModel::where('user_id', $adminInform->id)->get();
            $adminItem = $adminItem0[0];

            if(Input::get('active') == 1) {
//Send email
                $data = array();
                $data['from_name'] = $adminItem->first_name . ' ' . $adminItem->last_name;
                $data['to_name'] = Input::get('company_name');
                $name = $data['from_name'];
                $from_address = $adminInform->email;
                $to_address = Input::get('email');
                $subject = 'Notification - InnoMaid.com';
                Mail::send('admin.mailAgency', $data, function ($message) use ($from_address, $name, $to_address, $subject) {
                    $message->from($from_address, $name);
                    $message->to($to_address);
                    $message->subject($subject);
                });
//end
                $param['msg_email'] = "Approving mail has been sent to the Customer!";
            }else {
                $param['msg_email'] = "";
            }
            $agencyItems             = array();
            $agencyInforms_data      = UsersModel::where('user_group', 2)->get();
            $countAgency             = count($agencyInforms_data);
            for($i=0;$i<$countAgency;$i++){
                $item                = AgencyInformsModel::where('user_id', $agencyInforms_data[$i]->id)->get();
                $agencyItems[$i]     = $item[0];
            }
            $param['agencyInforms']  = $agencyInforms_data;
            $param['agencyItems']    = $agencyItems;
            $param['countAgency']    = $countAgency;

            $param['msg_register'] = "New Agency data has been registered successfully!";
            $param['sub_path']       = " Agency Data";
            $param['title'] = " | Agency Data";
            return View::make('admin.agencies.agency')->with($param);


            $param['msg_register'] = "New Employer has been registered successfully!";

        }else{
            $param['msg_register'] = "";
            $param['msg_email'] = "";
            $param['msg_duplicate'] = "Current email address is already used by other account!";

            $param['company_name']       = Input::get('company_name');
            $param['company_no']         = Input::get('company_no');
            $param['address']            = Input::get('address');
            $param['phone_number']       = Input::get('phone_number');

            $param['title']            = " | Add Agency";
            $param['sub_path']         = " Agency &DoubleRightArrow; Add";
            return View::make('admin.agencies.addAgency')->with($param);

        }

    }

    public function doupdateAgency() {
        $param = [];

        $id                     = Input::get('id');
        $users                  = UsersModel::find($id);

        $users->email           = Input::get('email');
        if(Input::get('password') != '') $users->password = md5(Input::get('password'));
        $users->user_group      = 2;
        $users->active          = Input::get('active');

        if($users->active == 1){
            if($users->mail_status == 1) {
                $status =  0;
            }
            else{
                $status = 1;
                $users->mail_status = 1;
            }
        } else {
                $status =  0;
                $users->mail_status = 0;
        }
        $users->save();

        $userInforms = AgencyInformsModel::where('user_id', $id)->get();

        $userInforms[0]->user_id               = $id;
        if (Input::hasFile('imageUpload_logo')) {

            $filename = str_random(24).".".Input::file('imageUpload_logo')->getClientOriginalExtension();
            Input::file('imageUpload_logo')->move('assets/upload/images/companies/', $filename);
            $userInforms[0]->company_logo      = '/assets/upload/images/companies/' . $filename;
        }

        $userInforms[0]->company_name          = Input::get('company_name');
        $userInforms[0]->company_no            = Input::get('company_no');
        $userInforms[0]->address               = Input::get('address');
        $userInforms[0]->phone_number          = Input::get('phone_number');

        $userInforms[0]->save();

        $adminInform0 = UsersModel::where('user_group', 1)->get();
        $adminInform = $adminInform0[0];
        $adminItem0 = SuperInformsModel::where('user_id', $adminInform->id)->get();
        $adminItem = $adminItem0[0];

        if(Input::get('active') == 1 && $status == 1) {

//Send email
            $data = array();
            $data['from_name'] = $adminItem->first_name . ' ' . $adminItem->last_name;
            $data['to_name'] = Input::get('company_name');
            $name = $data['from_name'];
            $from_address = $adminInform->email;
            $to_address = Input::get('email');
            $subject = 'Notification - InnoMaid.com';
            Mail::send('admin.mailAgency', $data, function ($message) use ($from_address, $name, $to_address, $subject) {
                $message->from($from_address, $name);
                $message->to($to_address);
                $message->subject($subject);
            });
//end
            $param['msg_email'] = "Approving mail has been sent to the Customer!";
        }else {
            $param['msg_email'] = "";
        }
        $agencyItems             = array();
        $agencyInforms_data      = UsersModel::where('user_group', 2)->get();
        $countAgency             = count($agencyInforms_data);
        for($i=0;$i<$countAgency;$i++){
            $item                = AgencyInformsModel::where('user_id', $agencyInforms_data[$i]->id)->get();
            $agencyItems[$i]     = $item[0];
        }
        $param['agencyInforms']  = $agencyInforms_data;
        $param['agencyItems']    = $agencyItems;
        $param['countAgency']    = $countAgency;

        $param['msg_register'] = "Agency data has been updated successfully!";
        $param['sub_path']       = " Agency Data";
        $param['title'] = " | Agency Data";
        return View::make('admin.agencies.agency')->with($param);
    }

    public function viewAgency($id) {
        $param                          = [];

        $agencyInform              = UsersModel::find($id);
        $agencyItem                = AgencyInformsModel::where('user_id', $id)->get();

        $param['agencyInform']     = $agencyInform;
        $param['agencyItem']       = $agencyItem[0];

        $param['title']            = " | View Agency";
        $param['sub_path']         = " Agency &DoubleRightArrow; View";
        return View::make('admin.agencies.viewAgency')->with($param);

    }

}
