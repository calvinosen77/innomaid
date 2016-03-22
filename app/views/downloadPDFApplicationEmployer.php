
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
        padding-left: 20px;;
    }
</style>

<body>
	<div class="row">
        <div class="row" style="text-align: center;">
            <h2>Employer Data Sheet</h2>
            <h2>(<span style="color: red;"><?php echo $employerinform_data->first_name . ' ' . $employerinform_data->last_name; ?></span>)</h2>
        </div>
<!-- Part A -->
        <div class="row" style="margin-left: 40px">
    <!-- Employer data -->
        <div class="row"><h4><b>A</b>. EMPLOYER'S PARTICULARS</h4></div>
        <div class="row">
            <table width="80%" border="1" cellspacing="0" style="margin: 0px auto;">
                <tr>
                    <td width="30%"><span>Salutation: </span></td>
                    <td><span class="color_blue"><?php echo $employerinform_data->salutation; ?></span></td>
                </tr>
                <tr>
                    <td><span>Name: </span></td>
                    <td><span class="color_blue"><?php echo $employerinform_data->first_name . ' ' . $employerinform_data->last_name; ?></span></td>
                </tr>
                <tr>
                    <td><span>Passport NO.: </span></td>
                    <td><span class="color_blue"><?php echo $employerinform_data->employer_passport_no; ?></span></td>
                </tr>
                <tr>
                    <td><span>NRIC: </span></td>
                    <td><span class="color_blue"><?php echo $employerinform_data->nric; ?></span></td>
                </tr>
                <tr>
                    <td><span>Date of Birth: </span></td>
                    <?php $monthArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; ?>
                    <td><span class="color_blue"><?php echo $employerinform_data->birthday_year . ' ' . $monthArray[$employerinform_data->birthday_month - 1] . '. ' . $employerinform_data->birthday_day; ?></span></td>
                </tr>
                <tr>
                    <td><span>Address: </span></td>
                    <td><span class="color_blue"><?php echo $employerinform_data->address; ?></span></td>
                </tr>
                <tr>
                    <td><span>Marital Status: </span></td>
                    <td><span class="color_blue"><?php echo $employerinform_data->marital_status; ?></span></td>
                </tr>
                <tr>
                    <td><span>Type of Residence: </span></td>
                    <td><span class="color_blue"><?php echo $employerinform_data->residence_type; ?></span></td>
                </tr>
                <?php if($employerinform_data->marital_status != 'Single'){ ?>
                <tr>
                    <td><span>Marriage Registered in Singapore: </span></td>
                    <td><span class="color_blue"><?php echo ($employerinform_data->marriage_registered_status==1)? 'Yes' : 'No'; ?></span></td>
                </tr>
                <?php } ?>
                <tr>
                    <td><span>Citizenship: </span></td>
                    <td><span class="color_blue"><?php echo $employerinform_data->citizenship; ?></span></td>
                </tr>
                <tr>
                    <td><span>Contact Number: </span></td>
                    <td><span>Phone Number: </span><span class="color_blue"><?php echo $employerinform_data->phone_number; ?></span><br>
                        <span>Home Number: </span><span class="color_blue"><?php echo $employerinform_data->home_number; ?></span><br>
                        <span>Office Number: </span><span class="color_blue"><?php echo $employerinform_data->office_phone_number; ?></span></td>
                </tr>
                <tr>
                    <td><span>Occupation: </span></td>
                    <td><span class="color_blue"><?php echo $employerinform_data->occupation; ?></span></td>
                </tr>
                <tr>
                    <td><span>Company Name: </span></td>
                    <td><span class="color_blue"><?php echo $employerinform_data->company_name; ?></span></td>
                </tr>
            </table>
        </div>
        <?php if($employerinform_data->marital_status != 'Single'){ ?>
    <!-- Spouse data -->
        <div class="row"><h4><b>B</b>. SPOUSE'S PARTICULARS</h4></div>
        <div class="row">
            <table width="80%" border="1" cellspacing="0" style="margin: 0px auto;">
                <tr>
                    <td width="30%"><span>Salutation: </span></td>
                    <td><span class="color_blue"><?php echo $employerinform_data->spouse_salutation; ?></span></td>
                </tr>
                <tr>
                    <td><span>Name: </span></td>
                    <td><span class="color_blue"><?php echo $employerinform_data->spouse_first_name . ' ' . $employerinform_data->spouse_last_name; ?></span></td>
                </tr>
                <tr>
                    <td><span>Passport NO.: </span></td>
                    <td><span class="color_blue"><?php echo $employerinform_data->spouse_passport_no; ?></span></td>
                </tr>
                <tr>
                    <td><span>NRIC: </span></td>
                    <td><span class="color_blue"><?php echo $employerinform_data->spouse_nric; ?></span></td>
                </tr>
                <tr>
                    <td><span>Date of Birth: </span></td>
                    <?php $monthArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; ?>
                    <td><span class="color_blue"><?php echo $employerinform_data->spouse_birthday_year . ' ' . $monthArray[$employerinform_data->spouse_birthday_month - 1] . '. ' . $employerinform_data->spouse_birthday_day; ?></span></td>
                </tr>
                <tr>
                    <td><span>Relationship with Employer: </span></td>
                    <td><span class="color_blue"><?php echo ($employerinform_data->spouse_relationship==1)? 'Husband' : 'Wife'; ?></span></td>
                </tr>
                <tr>
                    <td><span>Citizenship: </span></td>
                    <td><span class="color_blue"><?php echo $employerinform_data->spouse_citizenship; ?></span></td>
                </tr>
                <tr>
                    <td><span>Contact Number: </span></td>
                    <td><span>Phone Number: </span> <span class="color_blue"><?php echo $employerinform_data->spouse_phone_number; ?></span><br>
                        <span>Home Number: </span> <span class="color_blue"><?php echo $employerinform_data->spouse_home_number; ?></span><br>
                        <span> Office Number: </span> <span class="color_blue"><?php echo $employerinform_data->spouse_office_phone_number; ?></span></td>
                </tr>
                <tr>
                    <td><span>Occupation: </span></td>
                    <td><span class="color_blue"><?php echo $employerinform_data->spouse_occupation; ?></span></td>
                </tr>
                <tr>
                    <td><span>Company Name: </span></td>
                    <td><span class="color_blue"><?php echo $employerinform_data->spouse_company_name; ?></span></td>
                </tr>
            </table>
        </div>
        <?php } ?>
    <!-- submission -->
        <div class="row"><h4><b><?php echo ($employerinform_data->marital_status != 'Single')? 'C' : 'B'; ?></b>. SUBMISSION OF NOTICE OF ASSESSMENTS</h4></div>
        <div class="row">
            <table width="90%" border="1" cellspacing="0" style="margin: 0px auto;">
                <tr>
                    <td width="35%" rowspan="2"><span>Employer's Year of Assessment: </span></td>
                    <td width="20%"><span class="color_blue"><?php echo $employerinform_data->employer_year_assessment1; ?></span></td>
                    <td width="25%"><span>Annual Income: </span></td>
                    <td width="20%"><span class="color_blue"><?php echo $employerinform_data->employer_annual_income1; ?></span></td>
                </tr>
                <tr>
                    <td width="20%"><span class="color_blue"><?php echo $employerinform_data->employer_year_assessment2; ?></span></td>
                    <td width="25%"><span>Annual Income: </span></td>
                    <td width="20%"><span class="color_blue"><?php echo $employerinform_data->employer_annual_income2; ?></span></td>
                </tr>

                <?php if($employerinform_data->marital_status != 'Single'){ ?>
                <tr>
                    <td width="35%" rowspan="2"><span>Spouse's Year of Assessment: </span></td>
                    <td width="20%"><span class="color_blue"><?php echo $employerinform_data->spouse_year_assessment1; ?></span></td>
                    <td width="25%"><span>Annual Income: </span></td>
                    <td width="20%"><span class="color_blue"><?php echo $employerinform_data->spouse_annual_income1; ?></span></td>
                </tr>
                <tr>
                    <td width="20%"><span class="color_blue"><?php echo $employerinform_data->spouse_year_assessment2; ?></span></td>
                    <td width="25%"><span>Annual Income: </span></td>
                    <td width="20%"><span class="color_blue"><?php echo $employerinform_data->spouse_annual_income2; ?></span></td>
                </tr>
                <?php } ?>
                <tr>
                    <td width="35%" colspan="2"><span>Monthly Combined Income of Employer and Spouse: </span></td>
                    <td width="65%" colspan="2"><span class="color_blue"><?php echo $employerinform_data->combined_income; ?></span></td>
                </tr>
            </table>
        </div>
        <?php if($countfamilyitem > 0){ ?>
        <div class="row">
            <table width="90%" border="1" cellspacing="0" style="margin: 20px auto;">
                <tr>
                    <td width="20%" style="text-align: center">Name</td>
                    <td width="20%" style="text-align: center">NRIC</td>
                    <td width="40%" style="text-align: center">Date of Birth</td>
                    <td width="20%" style="text-align: center">Relationship</td>
                </tr>
                <?php for($i=0;$i<$countfamilyitem;$i++){ ?>
                <tr>
                    <td style="text-align: center;"><span class="color_blue"><?php echo $familyinformItem_data[$i]->name; ?></td>
                    <td style="text-align: center;"><span class="color_blue"><?php echo $familyinformItem_data[$i]->nric; ?></td>
                    <td style="text-align: center;"><span class="color_blue"><?php echo $familyinformItem_data[$i]->birthday_day . '/' . $familyinformItem_data[$i]->birthday_month . '/' . $familyinformItem_data[$i]->birthday_year; ?></td>
                    <td style="text-align: center;"><span class="color_blue"><?php echo $familyinformItem_data[$i]->relationship; ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <?php } ?>
    <!-- purpose -->
        <div class="row"><h4><b><?php echo ($employerinform_data->marital_status != 'Single')? 'D' : 'C'; ?></b>. PURPOSE OF THIS APPLICATION</h4></div>
        <div class="row">
                <table width="50%" border="1" cellspacing="0" style="margin: 0px auto;">
                    <tr>
                        <td style="30%"><span>Purpose: </span></td>
                        <td><span class="color_blue"><?php echo $applicationitem_data->purpose; ?></span></td>
                    </tr>
                    <tr>
                        <td><span>Select Maid: </span></td>
                        <td><span class="color_blue"><?php echo $maidinform_data->name; ?></span></td>
                    </tr>
                </table>
         </div>
    </div>
</body>

</html>