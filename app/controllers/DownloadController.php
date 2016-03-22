<?php
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
use ServicesReplacement as ServicesReplacementModel;
use OtherServices as OtherServicesModel;
use PlacementFee as PlacementFeeModel;
use ServicesNew as ServicesNewModel;
use CostReplacement as CostReplacementModel;

class DownloadController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index( $id )
	{
		$param                          = array();

        $maidinformItem_data            = MaidInformsModel::find($id);
        $maidemployment_data            = MaidEmploymentHistoryModel::where('user_id', $id)->get();
        $maidemployment_singapore_data  = MaidEmploymentHistorySingaporeModel::where('user_id', $id)->get();
        $num_history                    = count($maidemployment_data);
        $num_history_singapore          = count($maidemployment_singapore_data);

        $nationality_data               = NationalityInformsModel::all();
        $maidagency_data                = MaidAgencyModel::all();
        $maidtype_data                  = MaidTypeModel::all();

        $param['title']                 = "Download PDF";

        $param['maidinformItem_data']   = $maidinformItem_data;
        $param['maidemployment_data']   = $maidemployment_data;
        $param['maidemployment_singapore_data']   = $maidemployment_singapore_data;
        $param['num_history']           = $num_history;
        $param['num_history_singapore'] = $num_history_singapore;

        $param['nationality_data']      = $nationality_data;
        $param['maidagency_data']       = $maidagency_data;
        $param['maidtype_data']         = $maidtype_data;

        $pdf = PDF::loadView('downloadPDF', $param);
        $current_date = date('Ymd');
        $filename = "FDW(" . $maidinformItem_data->name . ")" . $current_date . ".pdf";
        return $pdf->download($filename);
	}

	public function application( $id, $id2 )
	{
        $param                        = array();

        $applicationitem_data         = ApplicationModel::find($id);

        $maidinformItem_data0         = MaidInformsModel::where('id', $applicationitem_data->maid_id)->get();
        $maidinformItem_data          = $maidinformItem_data0[0];

        $employerinformItem_data0     = EmployerInformsModel::where('id', $applicationitem_data->employer_id)->get();
        $employerinformItem_data      = $employerinformItem_data0[0];

        $familyinformItem_data        = UserFamilymembersModel::where('user_id', $employerinformItem_data->id)->get();
        $countfamilyitem              = count($familyinformItem_data);

        if($applicationitem_data->purpose == 'Replacement'){
            $servicesItem_data        = ServicesReplacementModel::where('application_id', $id)->get();
            $replacemaidinformItem_data0  = MaidInformsModel::where('id',$servicesItem_data[0]->replace_maid_id)->get();
            $replacemaidinformItem_data   = $replacemaidinformItem_data0[0];
            $otherservices_data       = OtherServicesModel::where('application_id', $id)->get();
            $row_otherservices        = count($otherservices_data);
            $placementfee_data        = PlacementFeeModel::where('application_id', $id)->get();
            $row_placementfee         = count($placementfee_data);

            $param['servicesItem_data']           = $servicesItem_data[0];
            $param['replacemaidinformItem_data']  = $replacemaidinformItem_data;
            $param['otherservices_data']          = $otherservices_data;
            $param['row_otherservices']           = $row_otherservices;
            $param['placementfee_data']           = $placementfee_data;
            $param['row_placementfee']            = $row_placementfee;
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

        $param['title']                 = " Download View Application";

        $param['employerinform_data']   = $employerinformItem_data;
        $param['applicationitem_data']  = $applicationitem_data;
        $param['maidinform_data']       = $maidinformItem_data;
        $param['familyinformItem_data'] = $familyinformItem_data;
        $param['countfamilyitem']       = $countfamilyitem;

        $param['nationality_data'] = $nationality_data;

// calculate the total price
        $total_package = 0;
        if(!is_null($servicesItem_data[0]->price_reg)) $total_package += $servicesItem_data[0]->price_reg;
        if(!is_null($servicesItem_data[0]->price_doc)) $total_package += $servicesItem_data[0]->price_doc;
        if(!is_null($servicesItem_data[0]->price_med)) $total_package += $servicesItem_data[0]->price_med;
        if(!is_null($servicesItem_data[0]->price_pre)) $total_package += $servicesItem_data[0]->price_pre;
        if(!is_null($servicesItem_data[0]->price_rei)) $total_package += $servicesItem_data[0]->price_rei;
        if(!is_null($servicesItem_data[0]->price_hom)) $total_package += $servicesItem_data[0]->price_hom;
        if(!is_null($servicesItem_data[0]->price_cou)) $total_package += $servicesItem_data[0]->price_cou;
        if(!is_null($servicesItem_data[0]->price_eng)) $total_package += $servicesItem_data[0]->price_eng;
        if(!is_null($servicesItem_data[0]->price_saf)) $total_package += $servicesItem_data[0]->price_saf;

        for($i=0;$i<$row_otherservices;$i++) {
            if (!is_null($otherservices_data[$i]->price_other_price)) $total_package += $otherservices_data[$i]->price_other_price;
        }
        $param['total_package'] = $total_package;

        $total_placement = 0;
        if(!is_null($servicesItem_data[0]->price_ser)) $total_placement += $servicesItem_data[0]->price_ser;
        if(!is_null($servicesItem_data[0]->price_per)) $total_placement += $servicesItem_data[0]->price_per;
        if(!is_null($servicesItem_data[0]->price_boi)) $total_placement += $servicesItem_data[0]->price_boi;
        $param['total_placement'] = $total_placement;
//end
        if($id2 == 1) {
            $pdf = PDF::loadView('downloadPDFApplicationEmployer', $param);
            $current_date = date('Ymd');
            $filename = "Employment(" . $applicationitem_data->purpose . ")" . $current_date . ".pdf";
            return $pdf->download($filename);
        }
        if($id2 == 2){
            $pdf = PDF::loadView('downloadPDFApplicationServices', $param);
            $current_date = date('Ymd');
            $filename = "Services_Fee(" . $applicationitem_data->purpose . ")" . $current_date . ".pdf";
            return $pdf->download($filename);
        }
	}

}
