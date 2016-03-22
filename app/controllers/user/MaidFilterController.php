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


class MaidFilterController extends \BaseController {

    /**show All Maid*/
    public function allGetMaid() {
        $param = [];

        $nationality_data   = NationalityInformsModel::all();
        $maidagency_data    = MaidAgencyModel::all();
        $maidtype_data      = MaidTypeModel::all();

        $param['nationality_data']  = $nationality_data;
        $param['maidagency_data']   = $maidagency_data;
        $param['maidtype_data']     = $maidtype_data;

        $maidinforms_data           = MaidInformsModel::select('maid_informs.*', 'agency_informs.company_name')
            ->leftJoin('agency_informs', 'maid_informs.supplier_id', '=', 'agency_informs.user_id')
            ->get();
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

    /**Filter Country Maid*/
    public function countryGetMaid($country) {
        $param = [];

        $nationality_data   = NationalityInformsModel::all();
        $maidagency_data    = MaidAgencyModel::all();
        $maidtype_data      = MaidTypeModel::all();

        $param['nationality_data']  = $nationality_data;
        $param['maidagency_data']   = $maidagency_data;
        $param['maidtype_data']     = $maidtype_data;

        $maidinforms_data           = MaidInformsModel::select('maid_informs.*', 'agency_informs.company_name')
            ->where('nationality', $country)
            ->leftJoin('agency_informs', 'maid_informs.supplier_id', '=', 'agency_informs.user_id')
            ->get();
        $num_maidData               = count($maidinforms_data);
        $param['maidinforms_data']  = $maidinforms_data;
        $param['num_maidData']  = $num_maidData;

        Session::set('currentPage', 1);

        Session::set('maid_country', $country);
        Session::set('maid_agency', '');

        Session::set('keyword_duty', '');
        Session::set('keyword_nationality', '');
        Session::set('keyword_type', '');
        Session::set('keyword_salary', '');
        Session::set('keyword_age1', '');
        Session::set('keyword_age2', '');

        $param['title']             = " | Portal Site";
        return View::make('user.home.index')->with($param);
    }

    /**Filter Agency Maid*/
    public function agencyGetMaid($agency) {
        $param = [];

        $nationality_data   = NationalityInformsModel::all();
        $maidagency_data    = MaidAgencyModel::all();
        $maidtype_data      = MaidTypeModel::all();

        $param['nationality_data']  = $nationality_data;
        $param['maidagency_data']   = $maidagency_data;
        $param['maidtype_data']     = $maidtype_data;

        $maidinforms_data           = MaidInformsModel::select('maid_informs.*', 'agency_informs.company_name')
            ->where('agency', '=', $agency)
            ->leftJoin('agency_informs', 'maid_informs.supplier_id', '=', 'agency_informs.user_id')
            ->get();
        $num_maidData               = count($maidinforms_data);
        $param['maidinforms_data']  = $maidinforms_data;
        $param['num_maidData']  = $num_maidData;

        Session::set('currentPage', 1);

        Session::set('maid_agency', $agency);
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

    /**Filter Search Box*/
    public function searchMaid() {
        $param = [];

        $nationality_data   = NationalityInformsModel::all();
        $maidagency_data    = MaidAgencyModel::all();
        $maidtype_data      = MaidTypeModel::all();

        $param['nationality_data']  = $nationality_data;
        $param['maidagency_data']   = $maidagency_data;
        $param['maidtype_data']     = $maidtype_data;

        $year1 = date('Y') - Input::get('age1');
        $year2 = date('Y') - Input::get('age2');

        if(Input::get('basic_salary') == '') $salary = 100000;
        else $salary = Input::get('basic_salary');

        $maidinforms_data           = MaidInformsModel::select('maid_informs.*', 'agency_informs.company_name')
            ->where('primary_duty', 'like', '%' . Input::get('primary_duty') . '%')
            ->where('nationality', 'like', '%' . Input::get('nationality') . '%')
            ->where('agency', 'like', '%' . Input::get('type') . '%')
            ->where('basic_salary', '<=', $salary)
            ->where('birthday_year', '<=', $year1)
            ->where('birthday_year', '>=', $year2)
            ->leftJoin('agency_informs', 'maid_informs.supplier_id', '=', 'agency_informs.user_id')
            ->get();

        if(!Input::get('age1')){
            $maidinforms_data           = MaidInformsModel::select('maid_informs.*', 'agency_informs.company_name')
                ->where('primary_duty', 'like', '%' . Input::get('primary_duty') . '%')
                ->where('nationality', 'like', '%' . Input::get('nationality') . '%')
                ->where('agency', 'like', '%' . Input::get('type') . '%')
                ->where('basic_salary', '<=', $salary)
                ->where('birthday_year', '>=', $year2)
                ->leftJoin('agency_informs', 'maid_informs.supplier_id', '=', 'agency_informs.user_id')
                ->get();
        }
        if(!Input::get('age2')){
            $maidinforms_data           = MaidInformsModel::select('maid_informs.*', 'agency_informs.company_name')
                ->where('primary_duty', 'like', '%' . Input::get('primary_duty') . '%')
                ->where('nationality', 'like', '%' . Input::get('nationality') . '%')
                ->where('agency', 'like', '%' . Input::get('type') . '%')
                ->where('basic_salary', '<=', $salary)
                ->where('birthday_year', '<=', $year1)
                ->leftJoin('agency_informs', 'maid_informs.supplier_id', '=', 'agency_informs.user_id')
                ->get();
        }
        if(!Input::get('age1') && !Input::get('age2')){
            $maidinforms_data           = MaidInformsModel::select('maid_informs.*', 'agency_informs.company_name')
                ->where('primary_duty', 'like', '%' . Input::get('primary_duty') . '%')
                ->where('nationality', 'like', '%' . Input::get('nationality') . '%')
                ->where('agency', 'like', '%' . Input::get('type') . '%')
                ->where('basic_salary', '<=', $salary)
                ->leftJoin('agency_informs', 'maid_informs.supplier_id', '=', 'agency_informs.user_id')
                ->get();
        }
        $num_maidData               = count($maidinforms_data);
        $param['maidinforms_data']  = $maidinforms_data;
        $param['num_maidData']  = $num_maidData;

        $param['keyword_duty']             = Input::get('primary_duty');
        $param['keyword_nationality']      = Input::get('nationality');
        $param['keyword_type']             = Input::get('type');
        $param['keyword_salary']           = Input::get('basic_salary');
        $param['keyword_age1']             = Input::get('age1');
        $param['keyword_age2']             = Input::get('age2');

        Session::set('maid_agency', '');
        Session::set('maid_country', '');

        Session::set('keyword_duty', Input::get('primary_duty'));
        Session::set('keyword_nationality', Input::get('nationality'));
        Session::set('keyword_type', Input::get('type'));
        Session::set('keyword_salary', Input::get('basic_salary'));
        Session::set('keyword_age1', Input::get('age1'));
        Session::set('keyword_age2', Input::get('age2'));

        $param['title']             = " | Portal Site";
        return View::make('user.home.index')->with($param);
    }

}
