
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keyword" content="innomaid, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo $title; ?></title>

</head>

<style>

    .color_blue{
        color: #0F25C1;
    }
    .row{
        width: 100%;
        display: block;
    }
    td{
        padding-left: 20px;
    }
    [name=list_title]{
        margin-right: 20px;
    }
    [name=replacement_list_title]{
        margin-right: 20px;
    }
</style>

<body>
	<div class="row">
        <div class="row" style="text-align: center;">
            <h2>Services & Fees Schedule</h2>
            <h2>for <span style="color: red;"><?php echo $applicationitem_data->purpose;?></span> of FDW</h2>
        </div>
<!-- Part B (Add/New) -->
    <div class="row" style="margin-left: 40px">
        <?php if($applicationitem_data->purpose != 'Replacement'){ ?>
    <!-- part B1 -->
        <div class="row"><h4><b>A</b>. PARTICULARS OF FDW SELECTED</h4></div>
        <div class="row">
            <table width="100%" border="1" cellspacing="0" style="margin: 0px auto;">
                <tr>
                    <td width="40%"><span>Name of FDW Selected: </span></td>
                    <td width="30%"><span class="color_blue"><?php echo $maidinform_data->name; ?></span></td>
                    <td width="10%"><span>Date: </span></td>
                    <td width="20%"><span class="color_blue"><?php echo $servicesItem_data->created_date; ?></span></td>
                </tr>
                <tr>
                    <td><span>Nationality: </span></td>
                    <td><span class="color_blue"><?php echo $maidinform_data->nationality; ?></span></td>
                    <td rowspan="3"></td>
                    <td rowspan="3"></td>
                </tr>
                <tr>
                    <td><span>Passport NO.: </span></td>
                    <td><span class="color_blue"><?php echo $maidinform_data->passport_no; ?></span></td>
                </tr>
                <tr>
                    <td><span>Salary: </span></td>
                    <td><span class="color_blue"><?php echo $maidinform_data->basic_salary; ?></span></td>
                </tr>
            </table>
        </div>
    <!-- part B2 -->
        <div class="row"><h4><b>B</b>. SERVICE FEE</h4></div>
        <div class="row">
            <table width="100%" border="0">
                <tr>
                    <td width="80%"><span>The Service Fee shall include the following: </span></td>
                    <td style="text-align: center;"><span>Price(S$)</span></td>
                </tr>
            </table>
        </div>
        <div class="row">
            <?php $k = 0; ?>
            <table width="100%" border="1" cellspacing="0" style="margin: 0px auto;">
                <?php if(!is_null($servicesItem_data->price_reg)){ ?>
                <?php $k++; ?>
                <tr>
                    <td width="80%"><span name="list_title"><?php echo $k;?></span><span><?php echo $servicesItem_data->price_reg_title; ?></span></td>
                    <td style="text-align: center;"><span class="color_blue"><?php echo $servicesItem_data->price_reg; ?></span></td>
                    <input type="hidden" class="calc_item" value="<?php echo $servicesItem_data->price_reg; ?>">
                </tr>
                <?php } ?>
                <?php if(!is_null($servicesItem_data->price_doc)){ ?>
                <?php $k++; ?>
                <tr>
                    <td width="80%"><span name="list_title"><?php echo $k;?></span><span><?php echo $servicesItem_data->price_doc_title; ?></span></td>
                    <td style="text-align: center;"><span class="color_blue"><?php echo $servicesItem_data->price_doc; ?></span></td>
                    <input type="hidden" class="calc_item" value="<?php echo $servicesItem_data->price_doc; ?>">
                </tr>
                <?php } ?>
                <?php if(!is_null($servicesItem_data->price_med)){ ?>
                <?php $k++; ?>
                <tr>
                    <td width="80%"><span name="list_title"><?php echo $k;?></span><span><?php echo $servicesItem_data->price_med_title; ?></span></td>
                    <td style="text-align: center;"><span class="color_blue"><?php echo $servicesItem_data->price_med; ?></span></td>
                    <input type="hidden" class="calc_item" value="<?php echo $servicesItem_data->price_med; ?>">
                </tr>
                <?php } ?>
                <?php if(!is_null($servicesItem_data->price_pre)){ ?>
                <?php $k++; ?>
                <tr>
                    <td width="80%"><span name="list_title"><?php echo $k;?></span><span><?php echo $servicesItem_data->price_pre_title; ?></span></td>
                    <td style="text-align: center;"><span class="color_blue"><?php echo $servicesItem_data->price_pre; ?></span></td>
                    <input type="hidden" class="calc_item" value="<?php echo $servicesItem_data->price_pre; ?>">
                </tr>
                <?php } ?>
                <?php if(!is_null($servicesItem_data->price_rei)){ ?>
                <?php $k++; ?>
                <tr>
                    <td width="80%"><span name="list_title"><?php echo $k;?></span><span><?php echo $servicesItem_data->price_rei_title; ?></span></td>
                    <td style="text-align: center;"><span class="color_blue"><?php echo $servicesItem_data->price_rei; ?></span></td>
                    <input type="hidden" class="calc_item" value="<?php echo $servicesItem_data->price_rei; ?>">
                </tr>
                <?php } ?>
                <?php if(!is_null($servicesItem_data->price_hom)){ ?>
                <?php $k++; ?>
                <tr>
                    <td width="80%"><span name="list_title"><?php echo $k;?></span><span><?php echo $servicesItem_data->price_hom_title; ?></span></td>
                    <td style="text-align: center;"><span class="color_blue"><?php echo $servicesItem_data->price_hom; ?></span></td>
                    <input type="hidden" class="calc_item" value="<?php echo $servicesItem_data->price_hom; ?>">
                </tr>
                <?php } ?>
                <?php if(!is_null($servicesItem_data->price_cou)){ ?>
                <?php $k++; ?>
                <tr>
                    <td width="80%"><span name="list_title"><?php echo $k;?></span><span><?php echo $servicesItem_data->price_cou_title; ?></span></td>
                    <td style="text-align: center;"><span class="color_blue"><?php echo $servicesItem_data->price_cou; ?></span></td>
                    <input type="hidden" class="calc_item" value="<?php echo $servicesItem_data->price_cou; ?>">
                </tr>
                <?php } ?>
                <?php if(!is_null($servicesItem_data->price_eng)){ ?>
                <?php $k++; ?>
                <tr>
                    <td width="80%"><span name="list_title"><?php echo $k;?></span><span><?php echo $servicesItem_data->price_eng_title; ?></span></td>
                    <td style="text-align: center;"><span class="color_blue"><?php echo $servicesItem_data->price_eng; ?></span></td>
                    <input type="hidden" class="calc_item" value="<?php echo $servicesItem_data->price_eng; ?>">
                </tr>
                <?php } ?>
                <?php if(!is_null($servicesItem_data->price_saf)){ ?>
                <?php $k++; ?>
                <tr>
                    <td width="80%"><span name="list_title"><?php echo $k;?></span><span><?php echo $servicesItem_data->price_saf_title; ?></span></td>
                    <td style="text-align: center;"><span class="color_blue"><?php echo $servicesItem_data->price_saf; ?></span></td>
                    <input type="hidden" class="calc_item" value="<?php echo $servicesItem_data->price_saf; ?>">
                </tr>
                <?php } ?>
                <?php if($row_costreplacement > 0){ ?>
                <?php $k++; ?>
                <tr>
                    <td colspan="2"><span name="list_title"><?php echo $k;?></span><span>Cost for Replacement within the Maximum Replacement Period of 12 *months/years: </span></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table width="100%" border="0" cellspacing="0">
                            <?php for($i=0;$i<$row_costreplacement;$i++){ ?>
                                <tr>
                                    <td style="text-align: right;" width="20%"><span class="color_blue"><?php echo $costreplacement_data[$i]->price_cos_first; ?></span></td>
                                    <td style="text-align: center;" width="30%"><span>replacement within</span></td>
                                    <td style="text-align: left;" width="15%"><span class="color_blue"><?php echo $costreplacement_data[$i]->price_cos_second; ?></span></td>
                                    <td style="text-align: center;" width="15%"><span>months</span></td>
                                    <td style="text-align: left;"><span class="color_blue"><?php echo $costreplacement_data[$i]->price_cos_third; ?></span></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </td>
                </tr>
                <?php } ?>
                <?php if($row_otherservices > 0){ ?>
                <?php $k++; ?>
                <tr>
                    <td colspan="2"><span name="list_title"><?php echo $k;?></span><span>Other Services Provided (where applicable): </span></td>
                </tr>
                <?php for($i=0;$i<$row_otherservices;$i++){ ?>
                <tr>
                    <td width="80%" style="padding-left: 40px;"><span><?php echo $otherservices_data[$i]->price_other_title; ?></span></td>
                    <td style="text-align: center;"><span class="color_blue"><?php echo $otherservices_data[$i]->price_other_price; ?></span></td>
                    <input type="hidden" class="calc_item" value="<?php echo $otherservices_data[$i]->price_other_price; ?>">
                </tr>
                <?php } ?>
                <?php } ?>
            </table>
        </div>
        <div class="row" style="margin-bottom: 20px;">
            <table width="100%" border="0">
                <tr>
                    <td width="80%" style="text-align: right;"><span><b>Total Package Service Fee:</b></span></td>
                    <td style="text-align: center; border: 2px solid #000000;"><span style="font-weight: bold; color: #FF0000!important;"><b>$ <?php echo $total_package; ?><b></span></td>
                </tr>
            </table>
        </div>
        <div class="row">
            <table width="100%" border="0" cellspacing="0">
                <tr>
                    <td>Payment of Service Fee as agreed in this schedule shall be made as follows</td>
                </tr>
            </table>

        <div class="row">
            <table width="100%" border="1" cellspacing="0">
                <tr>
                    <td width="10%" style="text-align: center;">1</td>
                    <td>Deposit - On confirmation of  FDW through Bio data/ Others (please specify: <span class="color_blue"><?php echo $servicesItem_data->price_dep; ?></span>)</td>
                </tr>
                <tr>
                    <td style="text-align: center;">2</td>
                    <td>Final Payment - When the FDW reports for work/ Others (please specify: <span class="color_blue"><?php echo $servicesItem_data->price_fin; ?></span>)</td>
                </tr>
            </table>
        </div>
    <!-- part B3 -->
        <div class="row"><h4><b>C</b>. PLACEMENT FEE</h4></div>
        <div class="row">
            <table width="100%" border="0">
                <tr>
                    <td width="80%">The Placement Fee shall include the following:</td>
                    <td style="text-align: center;">Price(S$)</td>
                </tr>
            </table>
        </div>
        <div class="row">
            <table width="100%" border="1" cellspacing="0">
                <tr>
                    <td width="10%" style="text-align: center;">1</td>
                    <td width="70%">Service Fee charged on the FDW by the Agency (subject to fee cap):</td>
                    <td style="text-align: center;"><span class="color_blue"><?php echo $servicesItem_data->price_ser; ?></span></td>
                    <input class="calc_item_other" type="hidden" value="<?php echo $servicesItem_data->price_ser; ?>">
                </tr>
                <tr>
                    <td style="text-align: center;">2</td>
                    <td>Personal Loan incurred by the FDW overseas:</td>
                    <td style="text-align: center;"><span class="color_blue"><?php echo $servicesItem_data->price_per; ?></span></td>
                    <input class="calc_item_other" type="hidden" value="<?php echo $servicesItem_data->price_per; ?>">
                </tr>
                <tr>
                    <td style="text-align: center;">3</td>
                    <td>Personal Loan incurred by the FDW overseas:</td>
                    <td style="text-align: center;"><span class="color_blue"><?php echo $servicesItem_data->price_boi; ?></span></td>
                    <input class="calc_item_other" type="hidden" value="<?php echo $servicesItem_data->price_boi; ?>">
                </tr>
            </table>
        </div>
        <div class="row">
            <table width="100%" border="0">
                <tr>
                    <td width="80%" style="text-align: right;"><span><b>Total Placement Fee:</b></span></td>
                    <td style="text-align: center; border: 2px solid #000000;"><span style="font-weight: bold; color: #FF0000!important;"><b>$ <?php echo $total_placement; ?></b></span></td>
                </tr>
            </table>
        </div>
        <?php if($row_placementfee > 0){ ?>
        <div class="row">
            <table width="100%" border="0">
                <tr>
                    <td>Payment of Placement Fee as agreed in this schedule shall be made as follows: (tick where applicable)</td>
                </tr>
                <tr>
                    <td>
                        <table width="80%" border="1" cellspacing="0">
                            <?php for($i=0;$i<$row_placementfee;$i++){ ?>
                            <tr>
                                <td style="text-align: center;" width="10%" ><span class="color_blue"><?php echo $placementfee_data[$i]->price_pay_first; ?></span></td>
                                <td style="text-align: left;" width="40%"><span>post-dated cheques of</span></td>
                                <td style="text-align: center;" width="15%"><span class="color_blue">$ <?php echo $placementfee_data[$i]->price_pay_second; ?></span></td>
                                <td style="text-align: left;"><span>each</span></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <?php } ?>
        <div class="row">
            <table width="100%" border="0">
                <tr>
                    <td width="90%"><span>Full sum payable upon *handover / signing of contract / others (please specify):</span></td>
                    <td><span class="color_blue"><?php echo  $servicesItem_data->price_ful; ?></span></td>
                </tr>
            </table>
        </div>
        <div class="row">
            <table width="100%" border="0">
                <tr>
                    <td width="30%"><span>Others (please specify):</span></td>
                    <td><span class="color_blue"><?php echo  $servicesItem_data->price_oth; ?></span></td>
                </tr>
            </table>
        </div>

    </div>
    <?php }else{ ?>
    <!-- part B1 -->
        <div class="row"><h4><b>A</b>. PARTICULARS OF FDW SELECTED</h4></div>
        <div class="row">
            <table width="100%" border="1" cellspacing="0" style="margin: 0px auto;">
                <tr>
                    <td width="40%"><span>Name of FDW Selected: </span></td>
                    <td width="30%"><span class="color_blue"><?php echo $maidinform_data->name; ?></span></td>
                    <td width="10%"><span>Date: </span></td>
                    <td width="20%"><span class="color_blue"><?php echo $servicesItem_data->created_date; ?></span></td>
                </tr>
                <tr>
                    <td><span>Nationality: </span></td>
                    <td><span class="color_blue"><?php echo $maidinform_data->nationality; ?></span></td>
                    <td rowspan="5"></td>
                    <td rowspan="5"></td>
                </tr>
                <tr>
                    <td><span>Passport NO.: </span></td>
                    <td><span class="color_blue"><?php echo $maidinform_data->passport_no; ?></span></td>
                </tr>
                <tr>
                    <td><span>Salary: </span></td>
                    <td><span class="color_blue"><?php echo $maidinform_data->basic_salary; ?></span></td>
                </tr>
                <tr>
                    <td><span>Name of FDW Replaced: </span></td>
                    <td><span class="color_blue"><?php echo $replacemaidinformItem_data->name; ?></span></td>
                </tr>
                <tr>
                    <td><span>Passport NO. of FDW Replaced: </span></td>
                    <td><span class="color_blue"><?php echo $replacemaidinformItem_data->nationality; ?></span></td>
                </tr>
            </table>
        </div>
        <!-- part B2 -->
        <div class="row"><h4><b>B</b>. SERVICE FEE</h4></div>
        <div class="row">
            <table width="100%" border="0">
                <tr>
                    <td width="80%"><span>The Service Fee shall include the following: </span></td>
                    <td style="text-align: center;"><span>Price(S$)</span></td>
                </tr>
            </table>
        </div>
        <div class="row">
            <?php $k = 0; ?>
            <table width="100%" border="1" cellspacing="0" style="margin: 0px auto;">
                <?php if(!is_null($servicesItem_data->price_reg)){ ?>
                    <?php $k++; ?>
                    <tr>
                        <td width="80%"><span name="replacement_list_title"><?php echo $k;?></span><span><?php echo $servicesItem_data->price_reg_title; ?></span></td>
                        <td style="text-align: center;"><span class="color_blue"><?php echo $servicesItem_data->price_reg; ?></span></td>
                        <input type="hidden" class="calc_item" value="<?php echo $servicesItem_data->price_reg; ?>">
                    </tr>
                <?php } ?>
                <?php if(!is_null($servicesItem_data->price_doc)){ ?>
                    <?php $k++; ?>
                    <tr>
                        <td width="80%"><span name="replacement_list_title"><?php echo $k;?></span><span><?php echo $servicesItem_data->price_doc_title; ?></span></td>
                        <td style="text-align: center;"><span class="color_blue"><?php echo $servicesItem_data->price_doc; ?></span></td>
                        <input type="hidden" class="calc_item" value="<?php echo $servicesItem_data->price_doc; ?>">
                    </tr>
                <?php } ?>
                <?php if(!is_null($servicesItem_data->price_med)){ ?>
                    <?php $k++; ?>
                    <tr>
                        <td width="80%"><span name="replacement_list_title"><?php echo $k;?></span><span><?php echo $servicesItem_data->price_med_title; ?></span></td>
                        <td style="text-align: center;"><span class="color_blue"><?php echo $servicesItem_data->price_med; ?></span></td>
                        <input type="hidden" class="calc_item" value="<?php echo $servicesItem_data->price_med; ?>">
                    </tr>
                <?php } ?>
                <?php if(!is_null($servicesItem_data->price_pre)){ ?>
                    <?php $k++; ?>
                    <tr>
                        <td width="80%"><span name="replacement_list_title"><?php echo $k;?></span><span><?php echo $servicesItem_data->price_pre_title; ?></span></td>
                        <td style="text-align: center;"><span class="color_blue"><?php echo $servicesItem_data->price_pre; ?></span></td>
                        <input type="hidden" class="calc_item" value="<?php echo $servicesItem_data->price_pre; ?>">
                    </tr>
                <?php } ?>
                <?php if(!is_null($servicesItem_data->price_rei)){ ?>
                    <?php $k++; ?>
                    <tr>
                        <td width="80%"><span name="replacement_list_title"><?php echo $k;?></span><span><?php echo $servicesItem_data->price_rei_title; ?></span></td>
                        <td style="text-align: center;"><span class="color_blue"><?php echo $servicesItem_data->price_rei; ?></span></td>
                        <input type="hidden" class="calc_item" value="<?php echo $servicesItem_data->price_rei; ?>">
                    </tr>
                <?php } ?>
                <?php if(!is_null($servicesItem_data->price_hom)){ ?>
                    <?php $k++; ?>
                    <tr>
                        <td width="80%"><span name="replacement_list_title"><?php echo $k;?></span><span><?php echo $servicesItem_data->price_hom_title; ?></span></td>
                        <td style="text-align: center;"><span class="color_blue"><?php echo $servicesItem_data->price_hom; ?></span></td>
                        <input type="hidden" class="calc_item" value="<?php echo $servicesItem_data->price_hom; ?>">
                    </tr>
                <?php } ?>
                <?php if(!is_null($servicesItem_data->price_cou)){ ?>
                    <?php $k++; ?>
                    <tr>
                        <td width="80%"><span name="replacement_list_title"><?php echo $k;?></span><span><?php echo $servicesItem_data->price_cou_title; ?></span></td>
                        <td style="text-align: center;"><span class="color_blue"><?php echo $servicesItem_data->price_cou; ?></span></td>
                        <input type="hidden" class="calc_item" value="<?php echo $servicesItem_data->price_cou; ?>">
                    </tr>
                <?php } ?>
                <?php if(!is_null($servicesItem_data->price_eng)){ ?>
                    <?php $k++; ?>
                    <tr>
                        <td width="80%"><span name="replacement_list_title"><?php echo $k;?></span><span><?php echo $servicesItem_data->price_eng_title; ?></span></td>
                        <td style="text-align: center;"><span class="color_blue"><?php echo $servicesItem_data->price_eng; ?></span></td>
                        <input type="hidden" class="calc_item" value="<?php echo $servicesItem_data->price_eng; ?>">
                    </tr>
                <?php } ?>
                <?php if(!is_null($servicesItem_data->price_saf)){ ?>
                    <?php $k++; ?>
                    <tr>
                        <td width="80%"><span name="replacement_list_title"><?php echo $k;?></span><span><?php echo $servicesItem_data->price_saf_title; ?></span></td>
                        <td style="text-align: center;"><span class="color_blue"><?php echo $servicesItem_data->price_saf; ?></span></td>
                        <input type="hidden" class="calc_item" value="<?php echo $servicesItem_data->price_saf; ?>">
                    </tr>
                <?php } ?>
                <?php if($row_otherservices > 0){ ?>
                    <?php $k++; ?>
                    <tr>
                        <td colspan="2"><span name="replacement_list_title"><?php echo $k;?></span><span>Other Services Provided (where applicable): </span></td>
                    </tr>
                    <?php for($i=0;$i<$row_otherservices;$i++){ ?>
                    <tr>
                        <td width="80%" style="padding-left: 40px;"><span><?php echo $otherservices_data[$i]->price_other_title; ?></span></td>
                        <td style="text-align: center;"><span class="color_blue"><?php echo $otherservices_data[$i]->price_other_price; ?></span></td>
                        <input type="hidden" class="calc_item" value="<?php echo $otherservices_data[$i]->price_other_price; ?>">
                    </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>
        <div class="row" style="margin-bottom: 20px;">
            <table width="100%" border="0">
                <tr>
                    <td width="80%" style="text-align: right;"><span><b>Total Package Service Fee: </b></span></td>
                    <td style="text-align: center; border: 2px solid #000000;"><span style="font-weight: bold; color: #FF0000!important;"><b>$ <?php echo $total_package; ?></b></span></td>
                </tr>
            </table>
        </div>
        <div class="row">
            <table width="100%" border="0">
                <tr>
                    <td colspan="2">Payment of Service Fee as agreed in this schedule shall be made as follows</td>
                </tr>
            </table>
        </div>
        <div class="row">
            <table width="100%" border="1" cellspacing="0">
                <tr>
                    <td width="10%" style="text-align: center;">1</td>
                    <td>Deposit - On confirmation of  FDW through Bio data/ Others (please specify: <span class="color_blue"><?php echo $servicesItem_data->price_dep; ?></span>)</td>
                </tr>
                <tr>
                    <td style="text-align: center;">2</td>
                    <td>Final Payment - When the FDW reports for work/ Others (please specify: <span class="color_blue"><?php echo $servicesItem_data->price_fin; ?></span>)</td>
                </tr>
            </table>
        </div>
        <!-- part B3 -->
        <div class="row"><h4><b>C</b>. PLACEMENT FEE</h4></div>
        <?php if($row_placementfee > 0){ ?>
            <div class="row">
                <table width="100%" border="0">
                    <tr>
                        <td>Payment of Placement Fee as agreed in this schedule shall be made as follows: (tick where applicable)</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="80%" border="1" cellspacing="0">
                                <?php for($i=0;$i<$row_placementfee;$i++){ ?>
                                    <tr>
                                        <td style="text-align: center;" width="10%"><span class="color_blue"><?php echo $placementfee_data[$i]->price_pay_first; ?></span></td>
                                        <td style="text-align: left;" width="40%"><span>post-dated cheques of</span></td>
                                        <td style="text-align: center;" width="15%"><span class="color_blue">$ <?php echo $placementfee_data[$i]->price_pay_second; ?></span></td>
                                        <td style="text-align: left;"><span>each</span></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        <?php } ?>
        <div class="row">
            <table width="100%" border="0">
                <tr>
                    <td width="90%"><span>Full sum payable upon *handover / signing of contract / others (please specify):</span></td>
                    <td><span class="color_blue"><?php echo  $servicesItem_data->price_ful; ?></span></td>
                </tr>
            </table>
        </div>
        <div class="row">
            <table width="100%" border="0">
                <tr>
                    <td width="30%"><span>Others (please specify):</span></td>
                    <td><span class="color_blue"><?php echo  $servicesItem_data->price_oth; ?></span></td>
                </tr>
            </table>
        </div>

            </div>

    <?php } ?>

    </div>
</body>

</html>