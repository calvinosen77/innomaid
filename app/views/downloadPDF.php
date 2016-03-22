
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

</style>

<body>
	<div class="row">
<!-- Part A -->
		<div class="row"><h3>(A) <span style="text-decoration: underline;">PROFILE OF FDW</span></h3></div>
    <!-- A1 -->
	    <div class="row"><h4>A1. PERSONAL INFORMATION</h4></div>
        <div class="row">
		    <div style="width: 60%; display: inline-block;">
                <table border="0" width="100%">
                    <tr>
                        <td>1. </td>
                        <td><span>Name: </span><span class="color_blue"><?php echo  $maidinformItem_data->name; ?></span></td>
                    </tr>
                    <tr>
                        <td>2. </td>
                        <td><span>Passport NO.: </span><span class="color_blue"><?php echo  $maidinformItem_data->passport_no; ?></span></td>
                    </tr>
                    <tr>
                        <td>3. </td>
                        <?php $monthArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; ?>
                        <td><span>Date of Birth: </span><span class="color_blue"><?php echo $maidinformItem_data->birthday_day; ?> <?php echo $monthArray[$maidinformItem_data->birthday_month - 1]; ?>. <?php echo $maidinformItem_data->birthday_year; ?></span></td>
					</tr>
                    <tr>
                        <td>4. </td>
                        <td><span>Place of Birth: </span><span class="color_blue"><?php echo $maidinformItem_data->birth_place; ?></span></td>
                    </tr>
                    <tr>
                        <td>5. </td>
                        <td><span>Height & Weight: </span><span class="color_blue"><?php echo $maidinformItem_data->height ; ?> </span><span>cm </span><span class="color_blue"><?php echo $maidinformItem_data->weight ; ?> </span><span>kg</span></td>
                    </tr>
					<tr>
                        <td>6. </td>
                        <td><span>Nationality: </span><span class="color_blue"><?php echo $maidinformItem_data->nationality ; ?></span></td>
                    </tr>
                    <tr>
                        <td>7. </td>
                        <td><span>Residential address in home country: </span><span class="color_blue"><?php echo $maidinformItem_data->residential_address ; ?></span></td>
                    </tr>
                    <tr>
                        <td>8. </td>
                        <td><span>Contact number in home country: </span><span class="color_blue"><?php echo $maidinformItem_data->contact_number ; ?></span></td>
                    </tr>
                    <tr>
                        <td>9. </td>
                        <td><span>Religion: </span><span class="color_blue"><?php echo $maidinformItem_data->religion ; ?></span></td>
                    </tr>
                    <tr>
                        <td>10. </td>
                        <td><span>Education level: </span><span class="color_blue"><?php echo $maidinformItem_data->education_level ; ?></span></td>
                    </tr>
                    <tr>
                        <td>11. </td>
                        <td><span>Number of sibling: </span><span class="color_blue"><?php echo $maidinformItem_data->sibling_number ; ?></span></td>
                    </tr>
                    <tr>
                        <td>12. </td>
                        <td><span>Marital status: </span><span class="color_blue"><?php echo $maidinformItem_data->marital_status ; ?></span></td>
                    </tr>
                    <tr>
                        <td>13. </td>
                        <td><span>Number of children: </span><span class="color_blue"><?php echo $maidinformItem_data->children_number ; ?></span></td>
                    </tr>
                </table>
            </div>
            <div style="display: inline-block;">
		        <div class="row" style="height: 350px;">
                    <img style="width:250px;" src="<?php echo ltrim($maidinformItem_data->profile_full_img, '/'); ?>">
                </div>
            </div>
        </div>
    <!-- A2 -->
        <div class="row" style="margin-top: -30%;">
            <div class="row"><h4>A2. MEDICAL HISTORY / DIETARY RESTRICTIONS</h4></div>
            <div class="row">
                <table border="0" width="70%">
                    <tr>
                        <td>14. </td>
                        <td><span>Allergies(if any): </span><span class="color_blue"><?php echo $maidinformItem_data->allergy ; ?></span></td>
                    </tr>
                    <tr>
                        <td>15. </td>
                        <td><span>Past and existing illnesses(including chronic ailments and illnesses requireing medication): </span></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <table border="0" width="100%">
                                <tr>
                                    <td>i. </td>
                                    <td><span>Mental illness</span></td>
                                    <td><span class="color_blue"><?php echo ($maidinformItem_data->mental_illness == 1)? 'Yes' : 'No'; ?></span></td>
                                    <td>vi. </td>
                                    <td><span>Tuberculosis</span></td>
                                    <td><span class="color_blue"><?php echo ($maidinformItem_data->tuberculosis == 1)? 'Yes' : 'No'; ?></span></td>
                                </tr>
                                <tr>
                                    <td>ii. </td>
                                    <td><span>Epilepsy</span></td>
                                    <td><span class="color_blue"><?php echo ($maidinformItem_data->epilepsy == 1)? 'Yes' : 'No'; ?></span></td>
                                    <td>vii. </td>
                                    <td><span>Heart Disease</span></td>
                                    <td><span class="color_blue"><?php echo ($maidinformItem_data->heart_disease == 1)? 'Yes' : 'No'; ?></span></td>
                                </tr>
                                <tr>
                                    <td>iii. </td>
                                    <td><span>Asthma</span></td>
                                    <td><span class="color_blue"><?php echo ($maidinformItem_data->asthma == 1)? 'Yes' : 'No'; ?></span></td>
                                    <td>viii. </td>
                                    <td><span>Malaria</span></td>
                                    <td><span class="color_blue"><?php echo ($maidinformItem_data->malaria == 1)? 'Yes' : 'No'; ?></span></td>
                                </tr>
                                <tr>
                                    <td>iv. </td>
                                    <td><span>Diabetes</span></td>
                                    <td><span class="color_blue"><?php echo ($maidinformItem_data->diabetes == 1)? 'Yes' : 'No'; ?></span></td>
                                    <td>ix. </td>
                                    <td><span>Operations</span></td>
                                    <td><span class="color_blue"><?php echo ($maidinformItem_data->operations == 1)? 'Yes' : 'No'; ?></span></td>
                                </tr>
                                <tr>
                                    <td>v. </td>
                                    <td><span>Hypertension</span></td>
                                    <td><span class="color_blue"><?php echo ($maidinformItem_data->hypertension == 1)? 'Yes' : 'No'; ?></span></td>
                                    <td>x. </td>
                                    <td><span>Others(if any)</span></td>
                                    <td><span class="color_blue"><?php echo $maidinformItem_data->others ; ?></span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>16. </td>
                        <td><span>Physical disabilities: </span><span class="color_blue"><?php echo ($maidinformItem_data->physical_disabilities == 1)? 'Yes' : 'No'; ?></span></td>
                    </tr>
                    <tr>
                        <td>17. </td>
                        <td><span>Dietary Restrictions: </span><span class="color_blue"><?php echo ($maidinformItem_data->dietary_restrictions == 1)? 'Yes' : 'No'; ?></span></td>
                    </tr>
                    <tr>
                        <td>18. </td>
                        <td><span>Food Handling Preferences: </span><span class="color_blue"><?php echo ($maidinformItem_data->food_handling_preferences == 1)? 'Yes' : 'No'; ?></span></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><span>Pork: </span><span class="color_blue"><?php echo ($maidinformItem_data->food_handling_pork == 1)? 'Yes' : 'No'; ?> </span> <span>Beef: </span><span class="color_blue"><?php echo ($maidinformItem_data->food_handling_beef == 1)? 'Yes' : 'No'; ?> </span><br><span>Others(if any): </span><span class="color_blue"><?php echo $maidinformItem_data->food_handling_others ; ?></span></td>
                    </tr>
                </table>
            </div>
        </div>
    <!-- Others -->
        <div class="row"><h4>A3. OTHERS</h4></div>
        <div class="row">
            <table border="0" width="70%">
                <tr>
                    <td>19. </td>
                    <td><span>Preference for rest day: </span><span class="color_blue"><?php echo $maidinformItem_data->preference_rest_day ; ?> </span><span>rest day(s) per month</span></td>
                </tr>
                <tr>
                    <td>20. </td>
                    <td><span>Any other Remarks: </span><span class="color_blue"><?php echo $maidinformItem_data->any_other_remarks ; ?></span></td>
                </tr>
            </table>
        </div>
<!-- Part B -->
        <div class="row"><h3><span style="text-decoration: underline;">(B) SKILLS OF FDW</span></h3></div>
    <!-- B1 -->
        <div class="row"><h4>B1. METHOD OF EVALUATION OF SKILLS</h4></div>
        <div class="row"><span>Please indicate the method(s) used to evaluate the FDW's skills(can tick more than one): </span></div>
        <div class="row">
            <table border="0" width="100%">
                <tr>
                    <td width="20"><input type="checkbox" disabled <?php echo ($maidinformItem_data->base_on_fdw == 1)? 'checked' : ''; ?>></td>
                    <td><span>Based on FDW's declaration, no evaluation/observation by Singapore EA or overseas training centre/EA</span></td>
                </tr>
                <tr>
                    <td><input style="margin-top: 10px" type="checkbox" disabled <?php echo ($maidinformItem_data->interviewed_singapore == 1)? 'checked' : ''; ?>></td>
                    <td><span>Interviewed by Singapore EA</span></td>
                </tr>
                <tr>
                    <td><input style="margin-top: 10px" type="checkbox" disabled <?php echo ($maidinformItem_data->interviewed_overseas == 1)? 'checked' : ''; ?>></td>
                    <td><span>Interviewed by overseas training centre/EA</span></td>
                </tr>
            </table>
        </div>
        <div class="row">
            <table border="1" cellspacing="0" width="100%" style="font-size: 10pt;">
                <tr bgcolor="#dcdcdc">
                    <th style="text-align: center;"><b>No</b></th>
                    <th style="text-align: center;"><b>Areas of Work</b></th>
                    <th style="text-align: center;"><b>Willingness<br>(Yes/No)</b></th>
                    <th style="text-align: center;"><b>Experience<br>(Years)</b></th>
                    <th style="text-align: center;"><b>Assessment/Observation<br>(indicate N.A. of no evaluation was done)<br>Poor ...... Excellent ... N.A.<br>1 2 3 4 5 N.A.</b></th>
                </tr>
                <tr>
                    <td style="text-align: center;">1.</td>
                    <td style="padding-left: 10px;">Care of infants/children<br><br>Please specify age range:<br><b>2 to 4</b></td>
                    <td style="text-align: center;">
                        <span><?php echo ($maidinformItem_data->care_infant_willingness == 1)? 'Yes' : 'No'; ?></span>
                    </td>
                    <td style="text-align: center;">
                        <span><?php echo $maidinformItem_data->care_infant_years ; ?></span>
                    </td>
                    <td style="padding-left: 10px;">
                        <span>Rate: </span><span style="font-weight: bold;"><?php echo $maidinformItem_data->care_infant_rate ; ?></span><br>
                        <span><?php echo $maidinformItem_data->care_infant_remark ; ?></span>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">2.</td>
                    <td style="padding-left: 10px;">Care of elderly</td>
                    <td style="text-align: center;">
                        <span><?php echo ($maidinformItem_data->care_elderly_willingness == 1)? 'Yes' : 'No'; ?></span>
                    </td>
                    <td style="text-align: center;">
                        <span><?php echo $maidinformItem_data->care_elderly_years ; ?></span>
                    </td>
                    <td style="padding-left: 10px;">
                        <span>Rate: </span><span style="font-weight: bold;"><?php echo $maidinformItem_data->care_elderly_rate ; ?></span><br>
                        <span><?php echo $maidinformItem_data->care_elderly_remark ; ?></span>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">3.</td>
                    <td style="padding-left: 10px;">Care of disabled</td>
                    <td style="text-align: center;">
                        <span><?php echo ($maidinformItem_data->care_disabled_willingness == 1)? 'Yes' : 'No'; ?></span>
                    </td>
                    <td style="text-align: center;">
                        <span><?php echo $maidinformItem_data->care_disabled_years ; ?></span>
                    </td>
                    <td style="padding-left: 10px;">
                        <span>Rate: </span><span style="font-weight: bold;"><?php echo $maidinformItem_data->care_disabled_rate ; ?></span><br>
                        <span><?php echo $maidinformItem_data->care_disabled_remark ; ?></span>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">4.</td>
                    <td style="padding-left: 10px;">General housework</td>
                    <td style="text-align: center;">
                        <span><?php echo ($maidinformItem_data->general_housework_willingness == 1)? 'Yes' : 'No'; ?></span>
                    </td>
                    <td style="text-align: center;">
                        <span><?php echo $maidinformItem_data->general_housework_years ; ?></span>
                    </td>
                    <td style="padding-left: 10px;">
                        <span>Rate: </span><span style="font-weight: bold;"><?php echo $maidinformItem_data->general_housework_rate ; ?></span><br>
                        <span><?php echo $maidinformItem_data->general_housework_remark ; ?></span>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">5.</td>
                    <td style="padding-left: 10px;">Cooking</td>
                    <td style="text-align: center;">
                        <span><?php echo ($maidinformItem_data->cooking_willingness == 1)? 'Yes' : 'No'; ?></span>
                    </td>
                    <td style="text-align: center;">
                        <span><?php echo $maidinformItem_data->cooking_years ; ?></span>
                    </td>
                    <td style="padding-left: 10px;">
                        <span>Rate: </span><span style="font-weight: bold;"><?php echo $maidinformItem_data->cooking_rate ; ?></span><br>
                        <span><?php echo $maidinformItem_data->cooking_remark ; ?></span>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">6.</td>
                    <td style="padding-left: 10px;">Language abilities(spoken)</td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;"></td>
                    <td style="padding-left: 10px;">
                        <span>Language 1: </span><span style="font-weight: bold;"><?php echo $maidinformItem_data->language_ability_name1 ; ?></span><br>
                        <span>Language 2: </span><span style="font-weight: bold;"><?php echo $maidinformItem_data->language_ability_name2 ; ?></span><br>
                        <span>Language 3: </span><span style="font-weight: bold;"><?php echo $maidinformItem_data->language_ability_name3 ; ?></span><br>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">7.</td>
                    <td style="padding-left: 10px;">Other skills, if any<br><br>Please specify:</td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;"></td>
                    <td style="padding-left: 10px;">
                        <span>Name: </span><span style="font-weight: bold;"><?php echo $maidinformItem_data->other_skills_name ; ?></span><br>
                        <span>Rate: </span><span style="font-weight: bold;"><?php echo $maidinformItem_data->other_skills_level ; ?></span>
                    </td>
                </tr>
            </table>
        </div>
<!-- Part C -->
        <div class="row"><h3>(C) <span style="text-decoration: underline;">EMPLOYMENT HISTORY OF THE FDW</span></h3></div>
    <!-- C1 -->
        <div class="row"><h4>C1. EMPLOYMENT HISTORY OVERSEAS</h4></div>
        <div class="row">
            <table border="1" cellspacing="0" width="100%" style="font-size: 10pt;">
                <tr bgcolor="#dcdcdc">
                    <th style="text-align: center;"><b>Date From</b></th>
                    <th style="text-align: center;"><b>Date To</b></th>
                    <th style="text-align: center;"><b>Country</b></th>
                    <th style="text-align: center;"><b>Employer</b></th>
                    <th style="text-align: center;"><b>Work Duties</b></th>
                    <th style="text-align: center;"><b>Remarks</b></th>
                </tr>
                <?php for($i=0;$i<$num_history;$i++) { ?>
                <tr>
                    <td style="text-align: center;">
                        <span><?php echo $maidemployment_data[$i]->date_from ; ?></span>
                    </td>
                    <td style="text-align: center;">
                        <span><?php echo $maidemployment_data[$i]->date_to ; ?></span>
                    </td>
                    <td style="text-align: center;">
                        <span><?php echo $maidemployment_data[$i]->country ; ?></span>
                    </td>
                    <td style="text-align: center;">
                        <span><?php echo $maidemployment_data[$i]->employer ; ?></span>
                    </td>
                    <td style="text-align: center;">
                        <span><?php echo $maidemployment_data[$i]->work_duty ; ?></span>
                    </td>
                    <td style="text-align: center;">
                        <span><?php echo $maidemployment_data[$i]->remark ; ?></span>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    <!-- C2 -->
        <div class="row"><h4>C2. EMPLOYMENT HISTORY IN SINGAPORE</h4></div>
        <div class="row">
            <table border="0" width="100%">
                <tr>
                    <td><span>Previous working experience in Singapore: </span><span class="color_blue"><?php echo ($maidinformItem_data->employment_history_singapore == 1)? 'Yes' : 'No'; ?></span></td>
                </tr>
                <tr>
                    <td><span>(The EA si required to obtain the FDW's employment history from MOM and furnish the employer with the employment history of the FDW. The employer may also verify the FDW's employment history in Singapore through WPOL using SingPass)</span></td>
                </tr>
            </table>
        </div>
    <!-- C3 -->
        <div class="row"><h4>C3. FEEDBACK FROM PREVIOUS EMPLOYERS IN SINGAPORE</h4></div>
        <div class="row"><span>Feedback was/was not obtained by the EA from the previous employers. If feedback was obtained(attach testimonial if possible), please indicate the feedback in the table below: </span></div>
        <div class="row" style="margin-top: 20px;">
            <table border="1" cellspacing="0" width="100%">
                <tr bgcolor="#dcdcdc">
                    <th style="text-align: center;" width="20%"><b>Employer</b></th>
                    <th style="text-align: center;"><b>Feedback</b></th>
                </tr>
                <?php for($i=0;$i<$num_history_singapore;$i++) { ?>
                <tr>
                    <td style="text-align: center;">
                        <span><?php echo $maidemployment_singapore_data[$i]->employer ; ?></span>
                    </td>
                    <td style="padding-left: 10px;">
                        <span><?php echo $maidemployment_singapore_data[$i]->feedback ; ?></span>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    </div>
</body>
</html>