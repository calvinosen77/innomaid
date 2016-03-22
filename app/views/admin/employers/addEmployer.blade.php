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

                              <form id="wizard-validation-form" action="{{ URL::route('admin.employers.addNewEmployer') }}" method="post" role="form" class="form-login margin-top-normal" enctype="multipart/form-data">
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
                                                       <option value="Mr">Mr</option>
                                                       <option value="Mrs">Mrs</option>
                                                     </select>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="first_name">Name</label>
                                              <div class="col-lg-5">
                                                  <input class="required form-control" id="first_name" name="first_name" type="text" placeholder="First Name">
                                              </div>
                                              <div class="col-lg-5">
                                                  <input class="required form-control" id="last_name" name="last_name" type="text" placeholder="Last Name">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="employer_passport_no">Passport NO.</label>
                                              <div class="col-lg-10">
                                                  <input class="form-control" id="employer_passport_no" name="employer_passport_no" type="text">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="nric">NRIC</label>
                                              <div class="col-lg-10">
                                                  <input class="form-control" id="nric" name="nric" type="text">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label ">Date of Birth</label>
                                              <div class="col-lg-10">
                                                  <div class="col-lg-3" style="padding-left: 0px;">
                                                    <select class="required form-control" id="birthday_day" name="birthday_day">
                                                        <option value="">--</option>
                                                        @for($i=1;$i<=31;$i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                  </div>
                                                  <div class="col-lg-1"><label class="subtitle_text">/</label></div>
                                                  <div class="col-lg-3">
                                                    <select class="required form-control" id="birthday_month" name="birthday_month">
                                                        <option value="">--</option>
                                                        <?php $monthArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; ?>
                                                        @for($i=1;$i<=12;$i++)
                                                        <option value="{{ $i }}">{{ $monthArray[$i-1] }}</option>
                                                        @endfor
                                                    </select>
                                                  </div>
                                                  <div class="col-lg-1"><label class="subtitle_text">/</label></div>
                                                  <div class="col-lg-3">
                                                    <select class="required form-control" id="birthday_year" name="birthday_year">
                                                        <option value="">----</option>
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
                                                  <input id="address" name="address" type="text" class="form-control">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="marital_status">Marital Status</label>
                                              <div class="col-lg-10">
                                                  <select id="marital_status" name="marital_status" class="form-control" onchange="spouseformOnoff(this.value);">
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
                                                  <select id="residence_type" name="residence_type" class="form-control">
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
                                          <div class="form-group clearfix" id="marriageDiv">
                                              <label class="col-lg-4 control-label " for="marriage_registered_status">Marriage Registered in Singapore</label>
                                              <input class="col-lg-1" style="margin-top: 10px" name="marriage_registered_status" type="radio" value="1" checked>
                                              <label class="col-lg-1 control-label ">Yes</label>
                                              <input class="col-lg-1" style="margin-top: 10px" name="marriage_registered_status" type="radio" value="0">
                                              <label class="col-lg-1 control-label ">No</label>
                                          </div>
                                          <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="citizenship">Citizenship</label>
                                                <div class="col-lg-10">
                                                      <select class="form-control" id="citizenship" name="citizenship">
                                                          <option value="Singapore">Singapore</option>
                                                          <option value="Others">Others</option>
                                                      </select>
                                                </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="phone_number">Contact Number</label>
                                              <div class="col-lg-3">
                                                  <input class="form-control" id="phone_number" name="phone_number" type="text" placeholder="Phone Number">
                                              </div>
                                              <div class="col-lg-3">
                                                  <input class="form-control" id="home_number" name="home_number" type="text" placeholder="Home Number">
                                              </div>
                                              <div class="col-lg-3">
                                                  <input class="form-control" id="office_phone_number" name="office_phone_number" type="text" placeholder="Office Number">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="occupation">Occupation</label>
                                              <div class="col-lg-10">
                                                  <input id="occupation" name="occupation" type="text" class="form-control">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="company_name">Company Name</label>
                                              <div class="col-lg-10">
                                                  <input id="company_name" name="company_name" type="text" class="form-control">
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                      </section>
<!-- Part B -->
                                      <h3>SPOUSE'S PARTICULARS</h3>
                                      <section>
                                      <div class="row" id="spouse_div">
                                        <div class="col-lg-10">
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_salutation">Salutation</label>
                                              <div class="col-lg-10">
                                                     <select id="spouse_salutation" name="spouse_salutation" class="form-control">
                                                       <option value="Mr">Mr</option>
                                                       <option value="Mrs">Mrs</option>
                                                     </select>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_first_name">Name</label>
                                              <div class="col-lg-5">
                                                  <input class="form-control" id="spouse_first_name" name="spouse_first_name" type="text" placeholder="First Name">
                                              </div>
                                              <div class="col-lg-5">
                                                  <input class="form-control" id="spouse_last_name" name="spouse_last_name" type="text" placeholder="Last Name">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_passport_no">Passport NO.</label>
                                              <div class="col-lg-10">
                                                  <input class="form-control" id="spouse_passport_no" name="spouse_passport_no" type="text">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_nric">NRIC</label>
                                              <div class="col-lg-10">
                                                  <input class="form-control" id="spouse_nric" name="spouse_nric" type="text">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label ">Date of Birth</label>
                                              <div class="col-lg-10">
                                                  <div class="col-lg-3" style="padding-left: 0px;">
                                                    <select class="form-control" id="spouse_birthday_day" name="spouse_birthday_day">
                                                        <option value="">--</option>
                                                        @for($i=1;$i<=31;$i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                  </div>
                                                  <div class="col-lg-1"><label class="subtitle_text">/</label></div>
                                                  <div class="col-lg-3">
                                                    <select class="form-control" id="spouse_birthday_month" name="spouse_birthday_month">
                                                        <option value="">--</option>
                                                        <?php $monthArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; ?>
                                                        @for($i=1;$i<=12;$i++)
                                                        <option value="{{ $i }}">{{ $monthArray[$i-1] }}</option>
                                                        @endfor
                                                    </select>
                                                  </div>
                                                  <div class="col-lg-1"><label class="subtitle_text">/</label></div>
                                                  <div class="col-lg-3">
                                                    <select class="form-control" id="spouse_birthday_year" name="spouse_birthday_year">
                                                        <option value="">----</option>
                                                        @for($i=1950;$i<=2010;$i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-4 control-label " for="spouse_relationship">Relationship with Employer</label>
                                              <input class="col-lg-1" style="margin-top: 10px" name="spouse_relationship" type="radio" value="1" checked>
                                              <label class="col-lg-1 control-label ">Husband</label>
                                              <input class="col-lg-1" style="margin-top: 10px" name="spouse_relationship" type="radio" value="0">
                                              <label class="col-lg-1 control-label ">Wife</label>
                                          </div>
                                          <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="spouse_citizenship">Citizenship</label>
                                                <div class="col-lg-10">
                                                      <select class="form-control" id="spouse_citizenship" name="spouse_citizenship">
                                                          <option value="Singapore">Singapore</option>
                                                          <option value="Others">Others</option>
                                                      </select>
                                                </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_phone_number">Contact Number</label>
                                              <div class="col-lg-3">
                                                  <input class="form-control" id="spouse_phone_number" name="spouse_phone_number" type="text" placeholder="Phone Number">
                                              </div>
                                              <div class="col-lg-3">
                                                  <input class="form-control" id="spouse_home_number" name="spouse_home_number" type="text" placeholder="Home Number">
                                              </div>
                                              <div class="col-lg-3">
                                                  <input class="form-control" id="spouse_office_phone_number" name="spouse_office_phone_number" type="text" placeholder="Office Number">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_occupation">Occupation</label>
                                              <div class="col-lg-10">
                                                  <input id="spouse_occupation" name="spouse_occupation" type="text" class="form-control">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_company_name">Company Name</label>
                                              <div class="col-lg-10">
                                                  <input id="spouse_company_name" name="spouse_company_name" type="text" class="form-control">
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                      </section>
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
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                  </select>
                                              </div>
                                              <label class="col-lg-2 control-label " for="employer_annual_income1">Annual Income</label>
                                              <div class="col-lg-2 input-group">
                                                  <span class="input-group-addon">$</span><input class="form-control" id="employer_annual_income1" name="employer_annual_income1" type="text" class="form-control">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-4 control-label " for="employer_year_assessment2"></label>
                                              <div class="col-lg-2">
                                                  <select class="form-control" id="employer_year_assessment2" name="employer_year_assessment2" class="form-control">
                                                        @for($i=2000;$i<=2015;$i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                  </select>
                                              </div>
                                              <label class="col-lg-2 control-label " for="employer_annual_income2">Annual Income</label>
                                              <div class="col-lg-2 input-group">
                                                  <span class="input-group-addon">$</span><input class="form-control" id="employer_annual_income2" name="employer_annual_income2" type="text" class="form-control">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix" id="spouse_assessment1">
                                              <label class="col-lg-4 control-label " for="spouse_year_assessment1">Spouse's Year of Assessment</label>
                                              <div class="col-lg-2">
                                                  <select class="form-control" id="spouse_year_assessment1" name="spouse_year_assessment1" class="form-control">
                                                        @for($i=2000;$i<=2015;$i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                  </select>
                                              </div>
                                              <label class="col-lg-2 control-label " for="spouse_annual_income1">Annual Income</label>
                                              <div class="col-lg-2 input-group">
                                                  <span class="input-group-addon">$</span><input class="form-control" id="spouse_annual_income1" name="spouse_annual_income1" type="text" class="form-control">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix" id="spouse_assessment2">
                                              <label class="col-lg-4 control-label " for="spouse_year_assessment2"></label>
                                              <div class="col-lg-2">
                                                  <select class="form-control" id="spouse_year_assessment2" name="spouse_year_assessment2" class="form-control">
                                                        @for($i=2000;$i<=2015;$i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                  </select>
                                              </div>
                                              <label class="col-lg-2 control-label " for="spouse_annual_income2">Annual Income</label>
                                              <div class="col-lg-2 input-group">
                                                  <span class="input-group-addon">$</span><input class="form-control" id="spouse_annual_income2" name="spouse_annual_income2" type="text" class="form-control">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-4 control-label " for="combined_income">Monthly Combined Income of Employer and Spouse</label>
                                              <div class="col-lg-8">
                                                  <input type="text" class="form-control" id="combined_income" name="combined_income">
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
                                                    <tr>
                                                        <td style="text-align: center;">
                                                            <input class="form-control" name="family_name0" type="text">
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <input class="form-control" name="family_nric0" type="text">
                                                        </td>
                                                        <td style="text-align: center;">
                                                          <div class="row">
                                                              <div class="col-lg-3" style="padding-right: 0px;">
                                                                <select class="form-control" name="family_birthday_day0">
                                                                    @for($i=1;$i<=31;$i++)
                                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                                    @endfor
                                                                </select>
                                                              </div>
                                                              <div class="col-lg-1"><label class="subtitle_text">/</label></div>
                                                              <div class="col-lg-3" style="padding-right: 0px;">
                                                                <select class="form-control" name="family_birthday_month0">
                                                                    <?php $monthArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; ?>
                                                                    @for($i=1;$i<=12;$i++)
                                                                    <option value="{{ $i }}">{{ $monthArray[$i-1] }}</option>
                                                                    @endfor
                                                                </select>
                                                              </div>
                                                              <div class="col-lg-1"><label class="subtitle_text">/</label></div>
                                                              <div class="col-lg-4">
                                                                <select class="form-control" name="family_birthday_year0">
                                                                    @for($i=1950;$i<=2010;$i++)
                                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                                    @endfor
                                                                </select>
                                                              </div>
                                                          </div>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <select class="form-control" name="relationship0">
                                                                <option value="Father">Father</option>
                                                                <option value="Mother">Mother</option>
                                                                <option value="Others">Others</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="col-lg-12">
                                              <input class="col-lg-2 btn btn-primary" type="button" id="add_new_family" value="Add New" onclick="add_new_row_family();">
                                              <input type="hidden" value="1" name="num_table_row_family" id="num_table_row_family">
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

        <!-- ShowToast -->
        <button type="button" class="btn btn-success" id="showtoast" style="display: none;">Show Toast</button>
        <!--main content end-->

    @stop

@stop

@section('custom-scripts')
    @include('js.admin.addEmployer');
@stop
