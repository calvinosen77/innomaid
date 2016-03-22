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

                          <div class="panel-body">

                              <form id="wizard-validation-form" action="{{ URL::route('admin.employers.doupdateEmployer') }}" method="post" role="form" class="form-login margin-top-normal" enctype="multipart/form-data">
                                 <input name="id" type="hidden" value="{{ $employeritem_data->id }}">
                                 <div>
<!-- Part A -->
                                      <h3>EMPLOYER'S PARTICULARS</h3>
                                      <section>
                                      <div class="row">
                                        <div class="col-lg-10">
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="salutation">Salutation</label>
                                              <div class="col-lg-10">
                                                     <select id="salutation" name="salutation" class="form-control">
                                                       <option value="Mr" {{ ($employeritem_data->salutation=='Mr')? 'selected': '' }}>Mr</option>
                                                       <option value="Mrs" {{ ($employeritem_data->salutation=='Mrs')? 'selected': '' }}>Mrs</option>
                                                     </select>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="first_name">Name</label>
                                              <div class="col-lg-5">
                                                  <input class="required form-control" id="first_name" name="first_name" type="text" value="{{ $employeritem_data->first_name }}" placeholder="First Name">
                                              </div>
                                              <div class="col-lg-5">
                                                  <input class="required form-control" id="last_name" name="last_name" type="text" value="{{ $employeritem_data->last_name }}" placeholder="Last Name">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="employer_passport_no">Passport NO.</label>
                                              <div class="col-lg-10">
                                                  <input class="form-control" id="employer_passport_no" name="employer_passport_no" type="text" value="{{ $employeritem_data->employer_passport_no }}">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="nric">NRIC</label>
                                              <div class="col-lg-10">
                                                  <input class="form-control" id="nric" name="nric" type="text" value="{{ $employeritem_data->nric }}">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label ">Date of Birth</label>
                                              <div class="col-lg-10">
                                                  <div class="col-lg-3" style="padding-left: 0px;">
                                                    <select class="form-control" id="birthday_day" name="birthday_day">
                                                        @for($i=1;$i<=31;$i++)
                                                        <option value="{{ $i }}" {{ ($employeritem_data->birthday_day==$i)? 'selected': '' }}>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                  </div>
                                                  <div class="col-lg-1"><label class="subtitle_text">/</label></div>
                                                  <div class="col-lg-3">
                                                    <select class="form-control" id="birthday_month" name="birthday_month">
                                                        <?php $monthArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; ?>
                                                        @for($i=1;$i<=12;$i++)
                                                        <option value="{{ $i }}" {{ ($employeritem_data->birthday_month==$i)? 'selected': '' }}>{{ $monthArray[$i-1] }}</option>
                                                        @endfor
                                                    </select>
                                                  </div>
                                                  <div class="col-lg-1"><label class="subtitle_text">/</label></div>
                                                  <div class="col-lg-3">
                                                    <select class="form-control" id="birthday_year" name="birthday_year">
                                                        @for($i=1950;$i<=2010;$i++)
                                                        <option value="{{ $i }}" {{ ($employeritem_data->birthday_year==$i)? 'selected': '' }}>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="address">Address</label>
                                              <div class="col-lg-10">
                                                  <input id="address" name="address" type="text" class="form-control" value="{{ $employeritem_data->address }}">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="marital_status">Marital Status</label>
                                              <div class="col-lg-10">
                                                  <select id="marital_status" name="marital_status" class="form-control" disabled>
                                                    <option value="Married" {{ ($employeritem_data->marital_status=='Married')? 'selected': '' }}>Married</option>
                                                    <option value="Single" {{ ($employeritem_data->marital_status=='Single')? 'selected': '' }}>Single</option>
                                                    <option value="Divorced" {{ ($employeritem_data->marital_status=='Divorced')? 'selected': '' }}>Divorced</option>
                                                    <option value="Widowed" {{ ($employeritem_data->marital_status=='Widowed')? 'selected': '' }}>Widowed</option>
                                                  </select>
                                              </div>
                                              <input type="hidden" name="marital_status" value="{{ $employeritem_data->marital_status }}">
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="residence_type">Type of Residence</label>
                                              <div class="col-lg-10">
                                                  <select id="residence_type" name="residence_type" class="form-control">
                                                    <option value="Bungalow" {{ ($employeritem_data->residence_type=='Bungalow')? 'selected': '' }}>Bungalow</option>
                                                    <option value="Semi-D" {{ ($employeritem_data->residence_type=='Semi-D')? 'selected': '' }}>Semi-D</option>
                                                    <option value="Terrace" {{ ($employeritem_data->residence_type=='Terrace')? 'selected': '' }}>Terrace</option>
                                                    <option value="Private Flat" {{ ($employeritem_data->residence_type=='Private Flat')? 'selected': '' }}>Private Flat</option>
                                                    <option value="HDB 4 Room & Less" {{ ($employeritem_data->residence_type=='HDB 4 Room & Less')? 'selected': '' }}>HDB 4 Room & Less</option>
                                                    <option value="HDB 5 Room & Above" {{ ($employeritem_data->residence_type=='HDB 5 Room & Above')? 'selected': '' }}>HDB 5 Room & Above</option>
                                                    <option value="Condominium" {{ ($employeritem_data->residence_type=='Condominium')? 'selected': '' }}>Condominium</option>
                                                    <option value="Other" {{ ($employeritem_data->residence_type=='Other')? 'selected': '' }}>Other</option>
                                                  </select>
                                              </div>
                                          </div>
                                          @if($employeritem_data->marital_status!='Single')
                                          <div class="form-group clearfix">
                                              <label class="col-lg-4 control-label " for="marriage_registered_status">Marriage Registered in Singapore</label>
                                              <input class="col-lg-1" style="margin-top: 10px" name="marriage_registered_status" type="radio" value="1" {{ ($employeritem_data->marriage_registered_status==1)? 'checked': '' }}>
                                              <label class="col-lg-1 control-label ">Yes</label>
                                              <input class="col-lg-1" style="margin-top: 10px" name="marriage_registered_status" type="radio" value="0" {{ ($employeritem_data->marriage_registered_status==0)? 'checked': '' }}>
                                              <label class="col-lg-1 control-label ">No</label>
                                          </div>
                                          @endif
                                          <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="citizenship">Citizenship</label>
                                                <div class="col-lg-10">
                                                      <select class="form-control" id="citizenship" name="citizenship">
                                                          <option value="Singapore" {{ ($employeritem_data->marriage_registered_status=='Singapore')? 'selected': '' }}>Singapore</option>
                                                          <option value="Others" {{ ($employeritem_data->marriage_registered_status=='Others')? 'selected': '' }}>Others</option>
                                                      </select>
                                                </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="phone_number">Contact Number</label>
                                              <div class="col-lg-3">
                                                  <input class="form-control" id="phone_number" name="phone_number" type="text" placeholder="Phone Number" value="{{ $employeritem_data->phone_number }}">
                                              </div>
                                              <div class="col-lg-3">
                                                  <input class="form-control" id="home_number" name="home_number" type="text" placeholder="Home Number" value="{{ $employeritem_data->home_number }}">
                                              </div>
                                              <div class="col-lg-3">
                                                  <input class="form-control" id="office_phone_number" name="office_phone_number" type="text" placeholder="Office Number" value="{{ $employeritem_data->office_phone_number }}">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="occupation">Occupation</label>
                                              <div class="col-lg-10">
                                                  <input id="occupation" name="occupation" type="text" class="form-control" value="{{ $employeritem_data->occupation }}">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="company_name">Company Name</label>
                                              <div class="col-lg-10">
                                                  <input id="company_name" name="company_name" type="text" class="form-control" value="{{ $employeritem_data->company_name }}">
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                      </section>
<!-- Part B -->
                                      @if($employeritem_data->marital_status != 'Single')
                                      <h3>SPOUSE'S PARTICULARS</h3>
                                      <section>
                                      <div class="row">
                                        <div class="col-lg-10">
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_salutation">Salutation</label>
                                              <div class="col-lg-10">
                                                     <select id="spouse_salutation" name="spouse_salutation" class="form-control">
                                                       <option value="Mr" {{ ($employeritem_data->spouse_salutation=='Mr')? 'selected': '' }}>Mr</option>
                                                       <option value="Mrs" {{ ($employeritem_data->spouse_salutation=='Mrs')? 'selected': '' }}>Mrs</option>
                                                     </select>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_first_name">Name</label>
                                              <div class="col-lg-5">
                                                  <input class="required form-control" id="spouse_first_name" name="spouse_first_name" type="text" value="{{ $employeritem_data->spouse_first_name }}" placeholder="First Name">
                                              </div>
                                              <div class="col-lg-5">
                                                  <input class="required form-control" id="spouse_last_name" name="spouse_last_name" type="text" value="{{ $employeritem_data->spouse_last_name }}" placeholder="Last Name">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_passport_no">Passport NO.</label>
                                              <div class="col-lg-10">
                                                  <input class="form-control" id="spouse_passport_no" name="spouse_passport_no" type="text" value="{{ $employeritem_data->spouse_passport_no }}">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_nric">NRIC</label>
                                              <div class="col-lg-10">
                                                  <input class="form-control" id="spouse_nric" name="spouse_nric" type="text" value="{{ $employeritem_data->spouse_nric }}">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label ">Date of Birth</label>
                                              <div class="col-lg-10">
                                                  <div class="col-lg-3" style="padding-left: 0px;">
                                                    <select class="form-control" id="spouse_birthday_day" name="spouse_birthday_day">
                                                        @for($i=1;$i<=31;$i++)
                                                        <option value="{{ $i }}" {{ ($employeritem_data->spouse_birthday_day==$i)? 'selected': '' }}>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                  </div>
                                                  <div class="col-lg-1"><label class="subtitle_text">/</label></div>
                                                  <div class="col-lg-3">
                                                    <select class="form-control" id="spouse_birthday_month" name="spouse_birthday_month">
                                                        <?php $monthArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; ?>
                                                        @for($i=1;$i<=12;$i++)
                                                        <option value="{{ $i }}" {{ ($employeritem_data->spouse_birthday_month==$i)? 'selected': '' }}>{{ $monthArray[$i-1] }}</option>
                                                        @endfor
                                                    </select>
                                                  </div>
                                                  <div class="col-lg-1"><label class="subtitle_text">/</label></div>
                                                  <div class="col-lg-3">
                                                    <select class="form-control" id="spouse_birthday_year" name="spouse_birthday_year">
                                                        @for($i=1950;$i<=2010;$i++)
                                                        <option value="{{ $i }}" {{ ($employeritem_data->spouse_birthday_year==$i)? 'selected': '' }}>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-4 control-label " for="spouse_relationship">Relationship with Employer</label>
                                              <input class="col-lg-1" style="margin-top: 10px" name="spouse_relationship" type="radio" value="1" {{ ($employeritem_data->spouse_relationship==1)? 'checked': '' }}>
                                              <label class="col-lg-1 control-label ">Husband</label>
                                              <input class="col-lg-1" style="margin-top: 10px" name="spouse_relationship" type="radio" value="0" {{ ($employeritem_data->spouse_relationship==0)? 'checked': '' }}>
                                              <label class="col-lg-1 control-label ">Wife</label>
                                          </div>
                                          <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="spouse_citizenship">Citizenship</label>
                                                <div class="col-lg-10">
                                                      <select class="form-control" id="spouse_citizenship" name="spouse_citizenship">
                                                          <option value="Singapore" {{ ($employeritem_data->spouse_citizenship=='Singapore')? 'selected': '' }}>Singapore</option>
                                                          <option value="Others" {{ ($employeritem_data->spouse_citizenship=='Others')? 'selected': '' }}>Others</option>
                                                      </select>
                                                </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_phone_number">Contact Number</label>
                                              <div class="col-lg-3">
                                                  <input class="form-control" id="spouse_phone_number" name="spouse_phone_number" type="text" placeholder="Phone Number" value="{{ $employeritem_data->spouse_phone_number }}">
                                              </div>
                                              <div class="col-lg-3">
                                                  <input class="form-control" id="spouse_home_number" name="spouse_home_number" type="text" placeholder="Home Number" value="{{ $employeritem_data->spouse_home_number }}">
                                              </div>
                                              <div class="col-lg-3">
                                                  <input class="form-control" id="spouse_office_phone_number" name="spouse_office_phone_number" type="text" placeholder="Office Number" value="{{ $employeritem_data->spouse_office_phone_number }}">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_occupation">Occupation</label>
                                              <div class="col-lg-10">
                                                  <input id="spouse_occupation" name="spouse_occupation" type="text" class="form-control" value="{{ $employeritem_data->spouse_occupation }}">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_company_name">Company Name</label>
                                              <div class="col-lg-10">
                                                  <input id="spouse_company_name" name="spouse_company_name" type="text" class="form-control" value="{{ $employeritem_data->spouse_company_name }}">
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                      </section>
                                      @endif
<!-- Part C -->
                                      <h3>SUBMISSION OF NOTICE OF ASSESSMENTS</h3>
                                      <section>
                                      <div class="row">
                                        <div class="col-lg-10">
                                          <div class="form-group clearfix">
                                              <label class="col-lg-4 control-label " for="employer_year_assessment1">Employer's Year of Assessment</label>
                                              <div class="col-lg-2">
                                                  <select class="form-control" id="employer_year_assessment1" name="employer_year_assessment1" class="form-control">
                                                        @for($i=2000;$i<=2015;$i++)
                                                        <option value="{{ $i }}" {{ ($employeritem_data->employer_year_assessment1==$i)? 'selected': '' }}>{{ $i }}</option>
                                                        @endfor
                                                  </select>
                                              </div>
                                              <label class="col-lg-2 control-label " for="employer_annual_income1">Annual Income</label>
                                              <div class="col-lg-2 input-group">
                                                  <span class="input-group-addon">$</span><input class="form-control" id="employer_annual_income1" name="employer_annual_income1" type="text" class="form-control" value="{{ $employeritem_data->employer_annual_income1 }}">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-4 control-label " for="employer_year_assessment2"></label>
                                              <div class="col-lg-2">
                                                  <select class="form-control" id="employer_year_assessment2" name="employer_year_assessment2" class="form-control">
                                                        @for($i=2000;$i<=2015;$i++)
                                                        <option value="{{ $i }}" {{ ($employeritem_data->employer_year_assessment2==$i)? 'selected': '' }}>{{ $i }}</option>
                                                        @endfor
                                                  </select>
                                              </div>
                                              <label class="col-lg-2 control-label " for="employer_annual_income2">Annual Income</label>
                                              <div class="col-lg-2 input-group">
                                                  <span class="input-group-addon">$</span><input class="form-control" id="employer_annual_income2" name="employer_annual_income2" type="text" class="form-control" value="{{ $employeritem_data->employer_annual_income2 }}">
                                              </div>
                                          </div>
                                          @if($employeritem_data->marital_status!='Single')
                                          <div class="form-group clearfix" id="spouse_assessment1">
                                              <label class="col-lg-4 control-label " for="spouse_year_assessment1">Spouse's Year of Assessment</label>
                                              <div class="col-lg-2">
                                                  <select class="form-control" id="spouse_year_assessment1" name="spouse_year_assessment1" class="form-control">
                                                        @for($i=2000;$i<=2015;$i++)
                                                        <option value="{{ $i }}" {{ ($employeritem_data->spouse_year_assessment1==$i)? 'selected': '' }}>{{ $i }}</option>
                                                        @endfor
                                                  </select>
                                              </div>
                                              <label class="col-lg-2 control-label " for="spouse_annual_income1">Annual Income</label>
                                              <div class="col-lg-2 input-group">
                                                  <span class="input-group-addon">$</span><input class="form-control" id="spouse_annual_income1" name="spouse_annual_income1" type="text" class="form-control" value="{{ $employeritem_data->spouse_annual_income1 }}">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix" id="spouse_assessment2">
                                              <label class="col-lg-4 control-label " for="spouse_year_assessment2"></label>
                                              <div class="col-lg-2">
                                                  <select class="form-control" id="spouse_year_assessment2" name="spouse_year_assessment2" class="form-control">
                                                        @for($i=2000;$i<=2015;$i++)
                                                        <option value="{{ $i }}" {{ ($employeritem_data->spouse_year_assessment2==$i)? 'selected': '' }}>{{ $i }}</option>
                                                        @endfor
                                                  </select>
                                              </div>
                                              <label class="col-lg-2 control-label " for="spouse_annual_income2">Annual Income</label>
                                              <div class="col-lg-2 input-group">
                                                  <span class="input-group-addon">$</span><input class="form-control" id="spouse_annual_income2" name="spouse_annual_income2" type="text" class="form-control" value="{{ $employeritem_data->spouse_annual_income2 }}">
                                              </div>
                                          </div>
                                          @endif
                                          <div class="form-group clearfix">
                                              <label class="col-lg-4 control-label " for="combined_income">Monthly Combined Income of Employer and Spouse</label>
                                              <div class="col-lg-8">
                                                  <input type="text" class="form-control" id="combined_income" name="combined_income" value="{{ $employeritem_data->combined_income }}">
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="panel-heading"></div>
    <!-- family member -->            <div class="row">
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
                                                    @for($k=0;$k<$num_family;$k++)
                                                    <tr>
                                                        <td style="text-align: center;">
                                                            <input type="hidden" name="employerfamily_id{{ $k }}" value="{{ $employerfamily_data[$k]->id }}">
                                                            <input class="form-control" name="family_name{{ $k }}" type="text" value="{{ $employerfamily_data[$k]->name }}">
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <input class="form-control" name="family_nric{{ $k }}" type="text" value="{{ $employerfamily_data[$k]->nric }}">
                                                        </td>
                                                        <td style="text-align: center;">
                                                          <div class="row">
                                                              <div class="col-lg-3" style="padding-right: 0px;">
                                                                <select class="form-control" name="family_birthday_day{{ $k }}">
                                                                    @for($i=1;$i<=31;$i++)
                                                                    <option value="{{ $i }}" {{ ($employerfamily_data[$k]->birthday_day==$i)? 'selected': '' }}>{{ $i }}</option>
                                                                    @endfor
                                                                </select>
                                                              </div>
                                                              <div class="col-lg-1"><label class="subtitle_text">/</label></div>
                                                              <div class="col-lg-3" style="padding-right: 0px;">
                                                                <select class="form-control" name="family_birthday_month{{ $k }}">
                                                                    <?php $monthArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; ?>
                                                                    @for($i=1;$i<=12;$i++)
                                                                    <option value="{{ $i }}" {{ ($employerfamily_data[$k]->birthday_month==$i)? 'selected': '' }}>{{ $monthArray[$i-1] }}</option>
                                                                    @endfor
                                                                </select>
                                                              </div>
                                                              <div class="col-lg-1"><label class="subtitle_text">/</label></div>
                                                              <div class="col-lg-4">
                                                                <select class="form-control" name="family_birthday_year{{ $k }}">
                                                                    @for($i=1950;$i<=2010;$i++)
                                                                    <option value="{{ $i }}" {{ ($employerfamily_data[$k]->birthday_year==$i)? 'selected': '' }}>{{ $i }}</option>
                                                                    @endfor
                                                                </select>
                                                              </div>
                                                          </div>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <select class="form-control" name="relationship{{ $k }}">
                                                                <option value="Father" {{ ($employerfamily_data[$k]->relationship=='Father')? 'selected': '' }}>Father</option>
                                                                <option value="Mother" {{ ($employerfamily_data[$k]->relationship=='Mother')? 'selected': '' }}>Mother</option>
                                                                <option value="Others" {{ ($employerfamily_data[$k]->relationship=='Others')? 'selected': '' }}>Others</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                            <div class="col-lg-12">
                                              <input class="col-lg-2 btn btn-primary" type="button" id="add_new_family" value="Add New" onclick="add_new_row_family();">
                                              <input type="hidden" value="{{ $num_family }}" name="num_table_row_family" id="num_table_row_family">
                                            </div>

                                          </div>
                                        </div>
                                      </div>
                                  </section>
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
    @stop

@stop

@section('custom-scripts')
    @include('js.admin.addEmployer');
@stop
