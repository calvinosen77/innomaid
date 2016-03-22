@extends('admin.layout')

    @section('content')
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <!--progress bar start-->
                      <section class="panel">
                          <header class="panel-heading">
                              <b>{{ $sub_path }}</b>
                          </header>
                          <div class="panel-body" style="text-align: right;">
                                <input type="button" class="btn btn-info" value="Back" name="backButton" style="color: #ffffff!important;">
                          </div>
                          <!-- Ajax Loading Image -->
                          <div id="ajaxLoadingDiv" style="position: fixed; left: 50%; top: 50%; margin-left: -50px; margin-top: -50px; z-index: 9999; display: none;">
                            <img width="100" height="100" src="/assets/backend/img/custom/ajax-loading1.gif">
                          </div>
                          <!--//end -->
                            <div class="panel-body">

                              <form id="wizard-validation-form" action="{{ URL::route('admin.maidapplication.addNewApplication') }}" method="post" role="form" class="form-login margin-top-normal" enctype="multipart/form-data">
                                  <div>
                                      <div class="form-group clearfix" id="wrap_selectEmployer">
                                          <label class="col-lg-2 control-label " for="first_name">Select Employer</label>
                                          <div class="col-lg-5">
                                              <select name="employer_id" class="required form-control" onchange="getEmployerData(this.value);">
                                                   <option value="">-- Select Employer -- </option>
                                                @foreach($employerinform_data as $item)
                                                    <option value="{{ $item->id }}">{{ $item->first_name . ' ' . $item->last_name }}</option>
                                                @endforeach
                                              </select>
                                          </div>
                                      </div>
<!-- Part A -->
                                      <h3>EMPLOYER MAID DATA SHEET</h3>
                                      <section>
                                      <div class="row">
    <!-- Employer data -->              <div class="col-lg-10">
                                          <div style="margin-top: 40px; margin-bottom: 40px;"><h4>EMPLOYER'S PARTICULARS</h4></div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="salutation">Salutation</label>
                                              <div class="col-lg-10">
                                                     <select id="salutation" name="salutation" class="form-control" disabled>
                                                       <option value="Mr">Mr</option>
                                                       <option value="Mrs">Mrs</option>
                                                     </select>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="first_name">Name</label>
                                              <div class="col-lg-5">
                                                  <input class="required form-control" id="first_name" name="first_name" type="text" disabled>
                                              </div>
                                              <div class="col-lg-5">
                                                  <input class="required form-control" id="last_name" name="last_name" type="text" disabled>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="employer_passport_no">Passport NO.</label>
                                              <div class="col-lg-10">
                                                  <input class="form-control" id="employer_passport_no" name="employer_passport_no" type="text" disabled>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="nric">NRIC</label>
                                              <div class="col-lg-10">
                                                  <input class="form-control" id="nric" name="nric" type="text" disabled>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label ">Date of Birth</label>
                                              <div class="col-lg-10">
                                                  <div class="col-lg-3" style="padding-left: 0px;">
                                                    <select class="required form-control" id="birthday_day" name="birthday_day" disabled>
                                                        <option value="">--</option>
                                                        @for($i=1;$i<=31;$i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                  </div>
                                                  <div class="col-lg-1"><label class="subtitle_text">/</label></div>
                                                  <div class="col-lg-3">
                                                    <select class="required form-control" id="birthday_month" name="birthday_month" disabled>
                                                        <option value="">--</option>
                                                        <?php $monthArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; ?>
                                                        @for($i=1;$i<=12;$i++)
                                                        <option value="{{ $i }}">{{ $monthArray[$i-1] }}</option>
                                                        @endfor
                                                    </select>
                                                  </div>
                                                  <div class="col-lg-1"><label class="subtitle_text">/</label></div>
                                                  <div class="col-lg-3">
                                                    <select class="required form-control" id="birthday_year" name="birthday_year" disabled>
                                                        <option value="">--</option>
                                                        @for($i=1950;$i<=2010;$i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="address">Address</label>
                                              <div class="col-lg-10">
                                                  <input id="address" name="address" type="text" class="form-control" disabled>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="marital_status">Marital Status</label>
                                              <div class="col-lg-10">
                                                  <select id="marital_status" name="marital_status" class="form-control" disabled>
                                                    <option value="Married">Married</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Divorced">Divorced</option>
                                                    <option value="Widowed">Widowed</option>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="residence_type">Type of Residence</label>
                                              <div class="col-lg-10">
                                                  <select id="residence_type" name="residence_type" class="form-control" disabled>
                                                    <option value="Bungalow">Bungalow</option>
                                                    <option value="Semi-D">Semi-D</option>
                                                    <option value="Terrace">Terrace</option>
                                                    <option value="Private Flat">Private Flat</option>
                                                    <option value="HDB 4 Room & Less">HDB 4 Room & Less</option>
                                                    <option value="HDB 5 Room & Above">HDB 5 Room & Above</option>
                                                    <option value="Condominium">Condominium</option>
                                                    <option value="Other">Other</option>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix" id="maritalDiv">
                                              <label class="col-lg-4 control-label " for="marriage_registered_status">Marriage Registered in Singapore</label>
                                              <input class="col-lg-1" style="margin-top: 10px" name="marriage_registered_status" type="radio" value="1" disabled>
                                              <label class="col-lg-1 control-label ">Yes</label>
                                              <input class="col-lg-1" style="margin-top: 10px" name="marriage_registered_status" type="radio" value="0" disabled>
                                              <label class="col-lg-1 control-label ">No</label>
                                          </div>
                                          <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="citizenship">Citizenship</label>
                                                <div class="col-lg-10">
                                                      <select class="form-control" id="citizenship" name="citizenship" disabled>
                                                          <option value="Singapore">Singapore</option>
                                                          <option value="Others">Others</option>
                                                      </select>
                                                </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="phone_number">Contact Number</label>
                                              <div class="col-lg-3">
                                                  <input class="form-control" id="phone_number" name="phone_number" type="text" placeholder="Phone Number" disabled>
                                              </div>
                                              <div class="col-lg-3">
                                                  <input class="form-control" id="home_number" name="home_number" type="text" placeholder="Home Number" disabled>
                                              </div>
                                              <div class="col-lg-3">
                                                  <input class="form-control" id="office_phone_number" name="office_phone_number" type="text" placeholder="Office Number" disabled>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="occupation">Occupation</label>
                                              <div class="col-lg-10">
                                                  <input id="occupation" name="occupation" type="text" class="form-control" disabled>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="company_name">Company Name</label>
                                              <div class="col-lg-10">
                                                  <input id="company_name" name="company_name" type="text" class="form-control" disabled>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="panel-heading"></div>
    <!-- Spouse data -->              <div class="row" id="spouse_div">
                                        <div class="col-lg-10">
                                          <div style="margin-top: 40px; margin-bottom: 40px;"><h4>SPOUSE'S PARTICULARS</h4></div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_salutation">Salutation</label>
                                              <div class="col-lg-10">
                                                     <select id="spouse_salutation" name="spouse_salutation" class="form-control" disabled>
                                                       <option value="Mr">Mr</option>
                                                       <option value="Mrs">Mrs</option>
                                                     </select>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_first_name">Name</label>
                                              <div class="col-lg-5">
                                                  <input class="required form-control" id="spouse_first_name" name="spouse_first_name" type="text" disabled>
                                              </div>
                                              <div class="col-lg-5">
                                                  <input class="required form-control" id="spouse_last_name" name="spouse_last_name" type="text" disabled>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_passport_no">Passport NO.</label>
                                              <div class="col-lg-10">
                                                  <input class="form-control" id="spouse_passport_no" name="spouse_passport_no" type="text" disabled>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_nric">NRIC</label>
                                              <div class="col-lg-10">
                                                  <input class="form-control" id="spouse_nric" name="spouse_nric" type="text" disabled>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label ">Date of Birth</label>
                                              <div class="col-lg-10">
                                                  <div class="col-lg-3" style="padding-left: 0px;">
                                                    <select class="form-control" id="spouse_birthday_day" name="spouse_birthday_day" disabled>
                                                        @for($i=1;$i<=31;$i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                  </div>
                                                  <div class="col-lg-1"><label class="subtitle_text">/</label></div>
                                                  <div class="col-lg-3">
                                                    <select class="form-control" id="spouse_birthday_month" name="spouse_birthday_month" disabled>
                                                        <?php $monthArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; ?>
                                                        @for($i=1;$i<=12;$i++)
                                                        <option value="{{ $i }}">{{ $monthArray[$i-1] }}</option>
                                                        @endfor
                                                    </select>
                                                  </div>
                                                  <div class="col-lg-1"><label class="subtitle_text">/</label></div>
                                                  <div class="col-lg-3">
                                                    <select class="form-control" id="spouse_birthday_year" name="spouse_birthday_year" disabled>
                                                        @for($i=1950;$i<=2010;$i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-4 control-label " for="spouse_relationship">Relationship with Employer</label>
                                              <input class="col-lg-1" style="margin-top: 10px" name="spouse_relationship" type="radio" value="1" disabled>
                                              <label class="col-lg-1 control-label ">Husband</label>
                                              <input class="col-lg-1" style="margin-top: 10px" name="spouse_relationship" type="radio" value="0" disabled>
                                              <label class="col-lg-1 control-label ">Wife</label>
                                          </div>
                                          <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="spouse_citizenship">Citizenship</label>
                                                <div class="col-lg-10">
                                                      <select class="form-control" id="spouse_citizenship" name="spouse_citizenship" disabled>
                                                          <option value="Singapore">Singapore</option>
                                                          <option value="Others">Others</option>
                                                      </select>
                                                </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_phone_number">Contact Number</label>
                                              <div class="col-lg-3">
                                                  <input class="form-control" id="spouse_phone_number" name="spouse_phone_number" type="text" placeholder="Phone Number" disabled>
                                              </div>
                                              <div class="col-lg-3">
                                                  <input class="form-control" id="spouse_home_number" name="spouse_home_number" type="text" placeholder="Home Number" disabled>
                                              </div>
                                              <div class="col-lg-3">
                                                  <input class="form-control" id="spouse_office_phone_number" name="spouse_office_phone_number" type="text" placeholder="Office Number" disabled>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_occupation">Occupation</label>
                                              <div class="col-lg-10">
                                                  <input id="spouse_occupation" name="spouse_occupation" type="text" class="form-control" disabled>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_company_name">Company Name</label>
                                              <div class="col-lg-10">
                                                  <input id="spouse_company_name" name="spouse_company_name" type="text" class="form-control" disabled>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="panel-heading" id="spouse_line"></div>
    <!-- submission -->               <div class="row">
                                        <div class="col-lg-10">
                                          <div style="margin-top: 40px; margin-bottom: 40px;"><h4>SUBMISSION OF NOTICE OF ASSESSMENTS</h4></div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-4 control-label " for="employer_year_assessment1">Employer's Year of Assessment</label>
                                              <div class="col-lg-2">
                                                  <select class="form-control" id="employer_year_assessment1" name="employer_year_assessment1" class="form-control" disabled>
                                                        @for($i=2000;$i<=2015;$i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                  </select>
                                              </div>
                                              <label class="col-lg-2 control-label " for="employer_annual_income1">Annual Income</label>
                                              <div class="col-lg-2 input-group">
                                                  <span class="input-group-addon">$</span><input class="form-control" id="employer_annual_income1" name="employer_annual_income1" type="text" class="form-control" disabled>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-4 control-label " for="employer_year_assessment2"></label>
                                              <div class="col-lg-2">
                                                  <select class="form-control" id="employer_year_assessment2" name="employer_year_assessment2" class="form-control" disabled>
                                                        @for($i=2000;$i<=2015;$i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                  </select>
                                              </div>
                                              <label class="col-lg-2 control-label " for="employer_annual_income2">Annual Income</label>
                                              <div class="col-lg-2 input-group">
                                                  <span class="input-group-addon">$</span><input class="form-control" id="employer_annual_income2" name="employer_annual_income2" type="text" class="form-control" disabled>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix" id="spouse_assessment1">
                                              <label class="col-lg-4 control-label " for="spouse_year_assessment1">Spouse's Year of Assessment</label>
                                              <div class="col-lg-2">
                                                  <select class="form-control" id="spouse_year_assessment1" name="spouse_year_assessment1" class="form-control" disabled>
                                                        @for($i=2000;$i<=2015;$i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                  </select>
                                              </div>
                                              <label class="col-lg-2 control-label " for="spouse_annual_income1">Annual Income</label>
                                              <div class="col-lg-2 input-group">
                                                  <span class="input-group-addon">$</span><input class="form-control" id="spouse_annual_income1" name="spouse_annual_income1" type="text" class="form-control" disabled>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix" id="spouse_assessment2">
                                              <label class="col-lg-4 control-label " for="spouse_year_assessment2"></label>
                                              <div class="col-lg-2">
                                                  <select class="form-control" id="spouse_year_assessment2" name="spouse_year_assessment2" class="form-control" disabled>
                                                        @for($i=2000;$i<=2015;$i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                  </select>
                                              </div>
                                              <label class="col-lg-2 control-label " for="spouse_annual_income2">Annual Income</label>
                                              <div class="col-lg-2 input-group">
                                                  <span class="input-group-addon">$</span><input class="form-control" id="spouse_annual_income2" name="spouse_annual_income2" type="text" class="form-control" disabled>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-4 control-label " for="combined_income">Monthly Combined Income of Employer and Spouse</label>
                                              <div class="col-lg-8">
                                                  <input type="text" class="form-control" id="combined_income" name="combined_income" disabled>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="panel-heading"></div>
    <!-- family member -->               <div class="row">
                                        <div class="col-lg-12">
                                          <div class="form-group clearfix">
                                            <table class="table table-bordered table-striped table-condensed cf">
                                                <thead class="cf">
                                                    <tr>
                                                        <th width="20%">Name</th>
                                                        <th width="20%">NRIC</th>
                                                        <th width="40%">Date of Birth</th>
                                                        <th width="20%">Relationship</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="insert_row_family">
                                                </tbody>
                                            </table>

                                          </div>
                                        </div>
                                      </div>
                                      <div class="panel-heading"></div>
    <!-- purpose -->                  <div class="row">
                                        <div class="col-lg-10">
                                          <div style="margin-top: 40px; margin-bottom: 40px;"><h4>PURPOSE OF THIS APPLICATION</h4></div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="purpose">Purpose</label>
                                              <div class="col-lg-6">
                                                  <select id="purpose" name="purpose" class="form-control" onchange="changeServiceForm(this.value);">
                                                    <option value="New">New</option>
                                                    <option value="Replacement">Replacement</option>
                                                    <option value="Add">Add</option>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="maid_id">Select Maid</label>
                                              <div class="col-lg-6">
                                                  <select id="maid_id" name="maid_id" class="required form-control">
                                                    @foreach($maidinform_data as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                  </select>
                                              </div>
                                          </div>
                                        </div>
                                      </div>

                                      </section>

<!-- Part B -->
                                      <h3>SERVICES & FEES SCHEDULE</h3>
                                      <section>
    <!-- New/Add Maid -->               <div class="row" id="new_maid">
    <!-- part B1 -->                      <div style="margin-top: 40px; margin-bottom: 40px;"><h4>PART A. PARTICULARS OF FDW SELECTED</h4></div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-3 control-label " for="new_select_maid_id">Name of FDW Selected: </label>
                                              <div class="col-lg-5">
                                                <select id="new_select_maid_id" name="new_select_maid_id" class="required form-control" onchange="getMaidData(this.value);">
                                                      <option value="">-- select --</option>
                                                  @foreach($maidinform_data as $item)
                                                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                  @endforeach
                                                </select>
                                              </div>
                                              <label class="col-lg-1 control-label " for="new_date">Date: </label>
                                              <div class="col-lg-3">
                                                  <input name="new_created_date" class="form-control datepicker" value="<?php echo date('Y-m-d'); ?>">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-3 control-label " for="new_nationality">Nationality: </label>
                                              <div class="col-lg-5">
                                                    <select class="form-control" name="new_nationality">
                                                        @foreach($nationality_data as $item)
                                                        <option value="{{ $item->nationality }}">{{ $item->nationality }}</option>
                                                        @endforeach
                                                    </select>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-3 control-label " for="new_passport_no">Passport NO.: </label>
                                              <div class="col-lg-5">
                                                  <input name="new_passport_no" type="text" class="form-control">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-3 control-label " for="new_salary">Salary: </label>
                                              <div class="col-lg-5">
                                                  <input name="new_salary" type="text" class="form-control">
                                              </div>
                                          </div>

                                          <div class="panel-heading"></div>

    <!-- part B2 -->                      <div style="margin-top: 40px; margin-bottom: 40px;"><h4>PART B. SERVICE FEE</h4></div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-8 control-label ">The Service Fee shall include the following: </label>
                                              <label class="col-lg-2 control-label " style="text-align: center;">Price(S$)</label>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label "><span name="list_title">1</span></label>
                                              <div class="col-lg-7">
                                                <input name="new_price_reg_title" class="form-control" value="Registration">
                                              </div>
                                              <div class="col-lg-2">
                                                  <input name="new_price_reg" type="number" class="form-control calc_item" onchange="calc_fee();">
                                              </div>
                                              <div class="col-lg-2"><input type="button" class="btn btn-danger" value="Remove Item"></div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label "><span name="list_title">2</span></label>
                                              <div class="col-lg-7">
                                                <input name="new_price_doc_title" class="form-control" value="Documentation and Application/Collection of Work Permit">
                                              </div>
                                              <div class="col-lg-2">
                                                  <input name="new_price_doc" type="number" class="form-control calc_item" onchange="calc_fee();">
                                              </div>
                                              <div class="col-lg-2"><input type="button" class="btn btn-danger" value="Remove Item"></div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label "><span name="list_title">3</span></label>
                                              <div class="col-lg-7">
                                                <input name="new_price_med_title" class="form-control" value="Medical Examination Fee (for the issuance of work permit)">
                                              </div>
                                              <div class="col-lg-2">
                                                  <input name="new_price_med" type="number" class="form-control calc_item" onchange="calc_fee();">
                                              </div>
                                              <div class="col-lg-2"><input type="button" class="btn btn-danger" value="Remove Item"></div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label "><span name="list_title">4</span></label>
                                              <div class="col-lg-7">
                                                <input name="new_price_pre_title" class="form-control" value="Premium for the Security Bond and the Personal Accident Insurance (Comprehensive Plan)">
                                              </div>
                                              <div class="col-lg-2">
                                                  <input name="new_price_pre" type="number" class="form-control calc_item" onchange="calc_fee();">
                                              </div>
                                              <div class="col-lg-2"><input type="button" class="btn btn-danger" value="Remove Item"></div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label "><span name="list_title">5</span></label>
                                              <div class="col-lg-7">
                                                <input name="new_price_rei_title" class="form-control" value="Reimbursement of Indemnity Policy">
                                              </div>
                                              <div class="col-lg-2">
                                                  <input name="new_price_rei" type="number" class="form-control calc_item" onchange="calc_fee();">
                                              </div>
                                              <div class="col-lg-2"><input type="button" class="btn btn-danger" value="Remove Item"></div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label "><span name="list_title">6</span></label>
                                              <div class="col-lg-7">
                                                <input name="new_price_hom_title" class="form-control" value="Home Service">
                                              </div>
                                              <div class="col-lg-2">
                                                  <input name="new_price_hom" type="number" class="form-control calc_item" onchange="calc_fee();">
                                              </div>
                                              <div class="col-lg-2"><input type="button" class="btn btn-danger" value="Remove Item"></div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label "><span name="list_title">7</span></label>
                                              <div class="col-lg-7">
                                                <input name="new_price_cou_title" class="form-control" value="Counseling Services at *Agency’s premise / Employer’s residence">
                                              </div>
                                              <div class="col-lg-2">
                                                  <input name="new_price_cou" type="number" class="form-control calc_item" onchange="calc_fee();">
                                              </div>
                                              <div class="col-lg-2"><input type="button" class="btn btn-danger" value="Remove Item"></div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label "><span name="list_title">8</span></label>
                                              <div class="col-lg-7">
                                                <input name="new_price_eng_title" class="form-control" value="English Entry Test">
                                              </div>
                                              <div class="col-lg-2">
                                                  <input name="new_price_eng" type="number" class="form-control calc_item" onchange="calc_fee();">
                                              </div>
                                              <div class="col-lg-2"><input type="button" class="btn btn-danger" value="Remove Item"></div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label "><span name="list_title">9</span></label>
                                              <div class="col-lg-7">
                                                <input name="new_price_saf_title" class="form-control" value="Safety Awareness Course">
                                              </div>
                                              <div class="col-lg-2">
                                                  <input name="new_price_saf" type="number" class="form-control calc_item" onchange="calc_fee();">
                                              </div>
                                              <div class="col-lg-2"><input type="button" class="btn btn-danger" value="Remove Item"></div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label "><span name="list_title">10</span></label>
                                              <label class="col-lg-7 control-label ">Cost for Replacement within the Maximum Replacement Period of  12 *months/years</label>
                                          </div>
                                          <div class="form-group clearfix">
                                            <table class="table table-bordered table-striped table-condensed cf">
                                                <tbody id="insert_row_replacement">
                                                    <tr>
                                                        <td style="text-align: center;">
                                                            <input class="form-control" name="new_price_cos_first0" type="number">
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <label class="control-label">replacement within</label>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <input class="form-control" name="new_price_cos_second0" type="number">
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <label class="control-label">months </label>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <input class="form-control" name="new_price_cos_third0" type="number" placeholder="$">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="col-lg-12">
                                              <input class="col-lg-2 btn btn-primary" type="button" id="add_new_replacement" value="Add New" onclick="add_new_row_replacement();">
                                              <input type="hidden" value="1" name="num_table_row_replacement" id="num_table_row_replacement">
                                            </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label "><span name="list_title">11</span></label>
                                              <label class="col-lg-7 control-label ">Other Services Provided (where applicable)</label>
                                          </div>
                                          <div class="form-group clearfix">
                                            <table class="table table-bordered table-striped table-condensed cf">
                                                <tbody id="insert_row_other">
                                                    <tr>
                                                        <td style="text-align: center;" width="70%">
                                                            <input class="form-control" name="new_price_other_title0" type="text">
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <input class="form-control calc_item" name="new_price_other_price0" type="number" placeholder="$" onchange="calc_fee();">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="col-lg-12">
                                              <input class="col-lg-2 btn btn-primary" type="button" id="add_new_other" value="Add New" onclick="add_new_row_other();">
                                              <input type="hidden" value="1" name="num_table_row_other" id="num_table_row_other">
                                            </div>
                                          </div>
                                          <div class="form-group clearfix">
                                            <div class="col-lg-5"></div>
                                            <div class="col-lg-4"><label class="col-lg-12 control-label" style="text-align: right;"><b>Total Package Service Fee: </b></label></div>
                                            <div class="col-lg-3">
                                                <input class="form-control" type="number" name="calc_sum" style="font-weight: bold; color: #FF0000!important; border: 1px solid #000000;" readonly>
                                            </div>
                                          </div>
                                          <div class="form-group clearfix">
                                            <label class="col-lg-12 control-label ">Payment of Service Fee as agreed in this schedule shall be made as follows</label>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label ">1</label>
                                              <label class="col-lg-7 control-label ">Deposit - On confirmation of  FDW through Bio data/ Others (please specify:</label>
                                              <div class="col-lg-3">
                                                  <input name="new_price_dep" type="number" class="form-control">
                                              </div>
                                              <label class="col-lg-1 control-label ">)</label>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label ">2</label>
                                              <label class="col-lg-7 control-label ">Final Payment - When the FDW reports for work/ Others (please specify:</label>
                                              <div class="col-lg-3">
                                                  <input name="new_price_fin" type="number" class="form-control">
                                              </div>
                                              <label class="col-lg-1 control-label ">)</label>
                                          </div>
    <!-- part B3 -->                      <div style="margin-top: 40px; margin-bottom: 40px;"><h4>PART C. PLACEMENT FEE</h4></div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-9 control-label ">The Placement Fee shall include the following: </label>
                                              <label class="col-lg-3 control-label " style="text-align: center;">Price(S$)</label>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label ">1</label>
                                              <label class="col-lg-8 control-label ">Service Fee charged on the FDW by the Agency (subject to fee cap)</label>
                                              <div class="col-lg-3">
                                                  <input name="new_price_ser" type="number" class="form-control calc_item_other" onchange="calc_fee_other();">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label ">2</label>
                                              <label class="col-lg-8 control-label ">Personal Loan incurred by the FDW overseas</label>
                                              <div class="col-lg-3">
                                                  <input name="new_price_per" type="number" class="form-control calc_item_other" onchange="calc_fee_other();">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label ">3</label>
                                              <label class="col-lg-8 control-label ">Boi data / Recruitment Costs payable to Supplier Company Employment Agency</label>
                                              <div class="col-lg-3">
                                                  <input name="new_price_boi" type="number" class="form-control calc_item_other" onchange="calc_fee_other();">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                            <div class="col-lg-5"></div>
                                            <div class="col-lg-4"><label class="col-lg-12 control-label" style="text-align: right;"><b>Total Placement Fee: </b></label></div>
                                            <div class="col-lg-3">
                                                <input class="form-control" type="number" name="calc_sum_other" style="font-weight: bold; color: #FF0000!important; border: 1px solid #000000;" readonly>
                                            </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-9 control-label ">Payment of Placement Fee as agreed in this schedule shall be made as follows: (tick where applicable)</label>
                                          </div>
                                          <div class="form-group clearfix">
                                            <table class="table table-bordered table-striped table-condensed cf">
                                                <tbody id="insert_row_payment">
                                                    <tr>
                                                        <td style="text-align: center;">
                                                            <input class="form-control" name="new_price_pay_first0" type="number">
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <label class="control-label">post-dated cheques of</label>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <input class="form-control" name="new_price_pay_second0" type="number" placeholder="$">
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <label class="control-label">each</label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="col-lg-12">
                                              <input class="col-lg-2 btn btn-primary" type="button" id="add_new_payment" value="Add New" onclick="add_new_row_payment();">
                                              <input type="hidden" value="1" name="num_table_row_payment" id="num_table_row_payment">
                                            </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-7 control-label ">Full sum payable upon *handover / signing of contract / others (please specify):</label>
                                              <div class="col-lg-5">
                                                  <input name="new_price_ful" type="text" class="form-control">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-3 control-label ">Others (please specify):</label>
                                              <div class="col-lg-9">
                                                  <input name="new_price_oth" type="text" class="form-control">
                                              </div>
                                          </div>

                                        </div>
    <!-- Replacement -->               <div class="row" id="replacement_maid">
    <!-- part B1 -->                      <div style="margin-top: 40px; margin-bottom: 40px;"><h4>PART A. PARTICULARS OF FDW SELECTED</h4></div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-3 control-label " for="replacement_select_maid_id">Name of FDW Selected: </label>
                                              <div class="col-lg-5">
                                                <select id="replacement_select_maid_id" name="replacement_select_maid_id" class="required form-control" onchange="getMaidDataSelect(this.value);">
                                                      <option value="">-- select --</option>
                                                  @foreach($maidinform_data as $item)
                                                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                  @endforeach
                                                </select>
                                              </div>
                                              <label class="col-lg-1 control-label " for="replacement_date">Date: </label>
                                              <div class="col-lg-3">
                                                  <input name="replacement_created_date" class="form-control datepicker" value="<?php echo date('Y-m-d'); ?>">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-3 control-label " for="replacement_nationality">Nationality: </label>
                                              <div class="col-lg-5">
                                                    <select class="form-control" name="replacement_nationality">
                                                        @foreach($nationality_data as $item)
                                                        <option value="{{ $item->nationality }}">{{ $item->nationality }}</option>
                                                        @endforeach
                                                    </select>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-3 control-label " for="replacement_passport_no">Passport NO.: </label>
                                              <div class="col-lg-5">
                                                  <input name="replacement_passport_no" type="text" class="form-control">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-3 control-label " for="replacement_salary">Salary: </label>
                                              <div class="col-lg-5">
                                                  <input name="replacement_salary" type="text" class="form-control">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-3 control-label " for="replacement_replace_maid_id">Name of FDW Replaced: </label>
                                              <div class="col-lg-5">
                                                <select id="replacement_replace_maid_id" name="replacement_replace_maid_id" class="required form-control" onchange="getMaidDataReplacement(this.value);">
                                                      <option value="">-- select --</option>
                                                  @foreach($maidinform_data as $item)
                                                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                  @endforeach
                                                </select>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-3 control-label " for="replacement_replace_passport_no">Passport NO. of FDW Replaced: </label>
                                              <div class="col-lg-5">
                                                  <input name="replacement_replace_passport_no" type="text" class="form-control">
                                              </div>
                                          </div>

                                          <div class="panel-heading"></div>

    <!-- part B2 -->                      <div style="margin-top: 40px; margin-bottom: 40px;"><h4>PART B. SERVICE FEE</h4></div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-8 control-label ">The Service Fee shall include the following: </label>
                                              <label class="col-lg-2 control-label " style="text-align: center;">Price(S$)</label>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label "><span name="replace_list_title">1</span></label>
                                              <div class="col-lg-7">
                                                <input name="replacement_price_reg_title" class="form-control" value="Registration">
                                              </div>
                                              <div class="col-lg-2">
                                                  <input name="replacement_price_reg" type="number" class="form-control calc_item_replacement" onchange="calc_fee_replacement();">
                                              </div>
                                              <div class="col-lg-2"><input type="button" class="btn btn-danger" value="Remove Item"></div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label "><span name="replace_list_title">2</span></label>
                                              <div class="col-lg-7">
                                                <input name="replacement_price_doc_title" class="form-control" value="Documentation and Application/Collection of Work Permit">
                                              </div>
                                              <div class="col-lg-2">
                                                  <input name="replacement_price_doc" type="number" class="form-control calc_item_replacement" onchange="calc_fee_replacement();">
                                              </div>
                                              <div class="col-lg-2"><input type="button" class="btn btn-danger" value="Remove Item"></div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label "><span name="replace_list_title">3</span></label>
                                              <div class="col-lg-7">
                                                <input name="replacement_price_med_title" class="form-control" value="Medical Examination Fee (for the issuance of work permit)">
                                              </div>
                                              <div class="col-lg-2">
                                                  <input name="replacement_price_med" type="number" class="form-control calc_item_replacement" onchange="calc_fee_replacement();">
                                              </div>
                                              <div class="col-lg-2"><input type="button" class="btn btn-danger" value="Remove Item"></div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label "><span name="replace_list_title">4</span></label>
                                              <div class="col-lg-7">
                                                <input name="replacement_price_pre_title" class="form-control" value="Premium for the Security Bond and the Personal Accident Insurance (Comprehensive Plan)">
                                              </div>
                                              <div class="col-lg-2">
                                                  <input name="replacement_price_pre" type="number" class="form-control calc_item_replacement" onchange="calc_fee_replacement();">
                                              </div>
                                              <div class="col-lg-2"><input type="button" class="btn btn-danger" value="Remove Item"></div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label "><span name="replace_list_title">5</span></label>
                                              <div class="col-lg-7">
                                                <input name="replacement_price_rei_title" class="form-control" value="Reimbursement of Indemnity Policy">
                                              </div>
                                              <div class="col-lg-2">
                                                  <input name="replacement_price_rei" type="number" class="form-control calc_item_replacement" onchange="calc_fee_replacement();">
                                              </div>
                                              <div class="col-lg-2"><input type="button" class="btn btn-danger" value="Remove Item"></div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label "><span name="replace_list_title">6</span></label>
                                              <div class="col-lg-7">
                                                <input name="replacement_price_hom_title" class="form-control" value="Home Service">
                                              </div>
                                              <div class="col-lg-2">
                                                  <input name="replacement_price_hom" type="number" class="form-control calc_item_replacement" onchange="calc_fee_replacement();">
                                              </div>
                                              <div class="col-lg-2"><input type="button" class="btn btn-danger" value="Remove Item"></div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label "><span name="replace_list_title">7</span></label>
                                              <div class="col-lg-7">
                                                <input name="replacement_price_cou_title" class="form-control" value="Counseling Services at *Agency’s premise / Employer’s residence">
                                              </div>
                                              <div class="col-lg-2">
                                                  <input name="replacement_price_cou" type="number" class="form-control calc_item_replacement" onchange="calc_fee_replacement();">
                                              </div>
                                              <div class="col-lg-2"><input type="button" class="btn btn-danger" value="Remove Item"></div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label "><span name="replace_list_title">8</span></label>
                                              <div class="col-lg-7">
                                                <input name="replacement_price_eng_title" class="form-control" value="English Entry Test">
                                              </div>
                                              <div class="col-lg-2">
                                                  <input name="replacement_price_eng" type="number" class="form-control calc_item_replacement" onchange="calc_fee_replacement();">
                                              </div>
                                              <div class="col-lg-2"><input type="button" class="btn btn-danger" value="Remove Item"></div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label "><span name="replace_list_title">9</span></label>
                                              <div class="col-lg-7">
                                                <input name="replacement_price_saf_title" class="form-control" value="Safety Awareness Course">
                                              </div>
                                              <div class="col-lg-2">
                                                  <input name="replacement_price_saf" type="number" class="form-control calc_item_replacement" onchange="calc_fee_replacement();">
                                              </div>
                                              <div class="col-lg-2"><input type="button" class="btn btn-danger" value="Remove Item"></div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label "><span name="replace_list_title">10</span></label>
                                              <label class="col-lg-7 control-label ">Other Services Provided (where applicable)</label>
                                          </div>
                                          <div class="form-group clearfix">
                                            <table class="table table-bordered table-striped table-condensed cf">
                                                <tbody id="insert_row_other_replacement">
                                                    <tr>
                                                        <td style="text-align: center;" width="70%">
                                                            <input class="form-control" name="replacement_price_other_title0" type="text">
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <input class="form-control calc_item_replacement" name="replacement_price_other_price0" type="number" placeholder="$" onchange="calc_fee_replacement();">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="col-lg-12">
                                              <input class="col-lg-2 btn btn-primary" type="button" id="add_new_other" value="Add New" onclick="add_new_row_other_replacement();">
                                              <input type="hidden" value="1" name="replacement_num_table_row_other" id="replacement_num_table_row_other">
                                            </div>
                                          </div>
                                          <div class="form-group clearfix">
                                            <div class="col-lg-5"></div>
                                            <div class="col-lg-4"><label class="col-lg-12 control-label" style="text-align: right;"><b>Total Package Service Fee: </b></label></div>
                                            <div class="col-lg-3">
                                                <input class="form-control" type="number" name="replacement_calc_sum" style="font-weight: bold; color: #FF0000!important; border: 1px solid #000000;" readonly>
                                            </div>
                                          </div>
                                          <div class="form-group clearfix">
                                            <label class="col-lg-12 control-label ">Payment of Service Fee as agreed in this schedule shall be made as follows</label>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label ">1</label>
                                              <label class="col-lg-7 control-label ">Deposit - On confirmation of  FDW through Bio data/ Others (please specify:</label>
                                              <div class="col-lg-3">
                                                  <input name="replacement_price_dep" type="number" class="form-control">
                                              </div>
                                              <label class="col-lg-1 control-label ">)</label>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-1 control-label ">2</label>
                                              <label class="col-lg-7 control-label ">Final Payment - When the FDW reports for work/ Others (please specify:</label>
                                              <div class="col-lg-3">
                                                  <input name="replacement_price_fin" type="number" class="form-control">
                                              </div>
                                              <label class="col-lg-1 control-label ">)</label>
                                          </div>
    <!-- part B3 -->                      <div style="margin-top: 40px; margin-bottom: 40px;"><h4>PART C. PLACEMENT FEE</h4></div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-9 control-label ">Payment of Placement Fee as agreed in this schedule shall be made as follows: (tick where applicable)</label>
                                          </div>
                                          <div class="form-group clearfix">
                                            <table class="table table-bordered table-striped table-condensed cf">
                                                <tbody id="insert_row_payment_replacement">
                                                    <tr>
                                                        <td style="text-align: center;">
                                                            <input class="form-control" name="replacement_price_pay_first0" type="number">
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <label class="control-label">post-dated cheques of</label>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <input class="form-control" name="replacement_price_pay_second0" type="number" placeholder="$">
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <label class="control-label">each</label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="col-lg-12">
                                              <input class="col-lg-2 btn btn-primary" type="button" id="add_new_payment" value="Add New" onclick="add_new_row_payment_replacement();">
                                              <input type="hidden" value="1" name="replacement_num_table_row_payment" id="replacement_num_table_row_payment">
                                            </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-7 control-label ">Full sum payable upon *handover / signing of contract / others (please specify):</label>
                                              <div class="col-lg-5">
                                                  <input name="replacement_price_ful" type="text" class="form-control">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-3 control-label ">Others (please specify):</label>
                                              <div class="col-lg-9">
                                                  <input name="replacement_price_oth" type="text" class="form-control">
                                              </div>
                                          </div>

                                        </div>
                                      </section>
<!-- Part C -->
                                  </div>
                              </form>
                          </div>
                      </section>


                  </div>


              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->

        <!-- ShowToast -->
        <button type="button" class="btn btn-success" id="showtoast" style="display: none;">Show Toast</button>
        <!--main content end-->


@stop

@stop

@section('custom-scripts')
    @include('js.admin.addApplication');
@stop
