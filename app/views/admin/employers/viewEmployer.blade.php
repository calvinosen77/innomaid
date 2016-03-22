@extends('admin.layout')

    @section('content')
      <style>
        .right_label{
            color: #0F25C1;
        }
      </style>
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
<!-- Part A -->
                                      <h4>EMPLOYER'S PARTICULARS</h4>
                                      <div class="row">
                                        <div class="col-lg-10">
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="salutation">Salutation</label>
                                              <div class="col-lg-10">
                                                     <label class="right_label">{{ $employeritem_data->salutation }}</label>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="first_name">Name</label>
                                              <div class="col-lg-7">
                                                  <label class="right_label">{{ $employeritem_data->first_name }} {{ $employeritem_data->last_name }}</label>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="employer_passport_no">Passport NO.</label>
                                              <div class="col-lg-10">
                                                  <label class="right_label">{{ $employeritem_data->employer_passport_no }}</label>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="nric">NRIC</label>
                                              <div class="col-lg-10">
                                                  <label class="right_label">{{ $employeritem_data->nric }}</label>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label ">Date of Birth</label>
                                              <div class="col-lg-10">
                                                    <?php $monthArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; ?>
                                                    <label class="right_label">{{ $employeritem_data->birthday_day }}  {{ $monthArray[$employeritem_data->birthday_month - 1] }}. {{ $employeritem_data->birthday_year }}</label>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="address">Address</label>
                                              <div class="col-lg-10">
                                                  <label class="right_label">{{ $employeritem_data->address }}</label>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="marital_status">Marital Status</label>
                                              <div class="col-lg-10">
                                                  <label class="right_label">{{ $employeritem_data->marital_status }}</label>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="residence_type">Type of Residence</label>
                                              <div class="col-lg-10">
                                                  <label class="right_label">{{ $employeritem_data->residence_type }}</label>
                                              </div>
                                          </div>
                                          @if($employeritem_data->marital_status != 'Single')
                                          <div class="form-group clearfix">
                                              <label class="col-lg-4 control-label " for="marriage_registered_status">Marriage Registered in Singapore</label>
                                              <label class="right_label">{{ ($employeritem_data->marriage_registered_status==1)? 'Yes': 'No' }}</label>
                                          </div>
                                          @endif
                                          <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="citizenship">Citizenship</label>
                                                <div class="col-lg-10">
                                                      <label class="right_label">{{ $employeritem_data->citizenship }}</label>
                                                </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="phone_number">Contact Number</label>
                                              <div class="col-lg-3">
                                                  Phone Number: <label class="right_label">{{ $employeritem_data->phone_number }}</label>
                                              </div>
                                              <div class="col-lg-3">
                                                  Home Number: <label class="right_label">{{ $employeritem_data->home_number }}</label>
                                              </div>
                                              <div class="col-lg-3">
                                                  Office Number: <label class="right_label">{{ $employeritem_data->office_phone_number }}</label>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="occupation">Occupation</label>
                                              <div class="col-lg-10">
                                                  <label class="right_label">{{ $employeritem_data->occupation }}</label>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="company_name">Company Name</label>
                                              <div class="col-lg-10">
                                                  <label class="right_label">{{ $employeritem_data->company_name }}</label>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="panel-heading"></div>
<!-- Part B -->
                                      @if($employeritem_data->marital_status != 'Single')
                                      <h4>SPOUSE'S PARTICULARS</h4>
                                      <div class="row">
                                        <div class="col-lg-10">
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_salutation">Salutation</label>
                                              <div class="col-lg-10">
                                                     <label class="right_label">{{ $employeritem_data->spouse_salutation }}</label>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_first_name">Name</label>
                                              <div class="col-lg-5">
                                                  <label class="right_label">{{ $employeritem_data->spouse_first_name }} {{ $employeritem_data->spouse_last_name }}</label>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_passport_no">Passport NO.</label>
                                              <div class="col-lg-10">
                                                  <label class="right_label">{{ $employeritem_data->spouse_passport_no }}</label>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_nric">NRIC</label>
                                              <div class="col-lg-10">
                                                  <label class="right_label">{{ $employeritem_data->spouse_nric }}</label>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label ">Date of Birth</label>
                                              <div class="col-lg-10">
                                                  <div class="col-lg-3" style="padding-left: 0px;">
                                                    <?php $monthArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; ?>
                                                    <label class="right_label">{{ $employeritem_data->spouse_birthday_day }} {{ $monthArray[$employeritem_data->spouse_birthday_month - 1] }}. {{ $employeritem_data->spouse_birthday_year }}</label>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-4 control-label " for="spouse_relationship">Relationship with Employer</label>
                                              <label class="right_label">{{ ($employeritem_data->spouse_relationship==1)? 'Husband': 'Wife' }}</label>
                                          </div>
                                          <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="spouse_citizenship">Citizenship</label>
                                                <div class="col-lg-10">
                                                      <label class="right_label">{{ $employeritem_data->spouse_citizenship }}</label>
                                                </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_phone_number">Contact Number</label>
                                              <div class="col-lg-3">
                                                  Phone Number: <label class="right_label">{{ $employeritem_data->spouse_phone_number }}</label>
                                              </div>
                                              <div class="col-lg-3">
                                                  Home Number: <label class="right_label">{{ $employeritem_data->spouse_home_number }}</label>
                                              </div>
                                              <div class="col-lg-3">
                                                  Office Number: <label class="right_label">{{ $employeritem_data->spouse_office_phone_number }}</label>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_occupation">Occupation</label>
                                              <div class="col-lg-10">
                                                  <label class="right_label">{{ $employeritem_data->spouse_occupation }}</label>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="spouse_company_name">Company Name</label>
                                              <div class="col-lg-10">
                                                  <label class="right_label">{{ $employeritem_data->spouse_company_name }}</label>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="panel-heading"></div>
                                      @endif
<!-- Part C -->
                                      <h4>SUBMISSION OF NOTICE OF ASSESSMENTS</h4>
                                      <div class="row">
                                        <div class="col-lg-10">
                                          <div class="form-group clearfix">
                                              <label class="col-lg-4 control-label " for="employer_year_assessment1">Employer's Year of Assessment</label>
                                              <div class="col-lg-2">
                                                  <label class="right_label">{{ $employeritem_data->employer_year_assessment1 }}</label>
                                              </div>
                                              <label class="col-lg-2 control-label " for="employer_annual_income1">Annual Income</label>
                                              <div class="col-lg-2">
                                                <label class="right_label">$ {{ $employeritem_data->employer_annual_income1 }}</label>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-4 control-label " for="employer_year_assessment2"></label>
                                              <div class="col-lg-2">
                                                  <label class="right_label">{{ $employeritem_data->employer_year_assessment2 }}</label>
                                              </div>
                                              <label class="col-lg-2 control-label " for="employer_annual_income2">Annual Income</label>
                                              <div class="col-lg-2">
                                                <label class="right_label">$ {{ $employeritem_data->employer_annual_income2 }}</label>
                                              </div>
                                          </div>
                                          @if($employeritem_data->marital_status != 'Single')
                                          <div class="form-group clearfix">
                                              <label class="col-lg-4 control-label " for="spouse_year_assessment1">Spouse's Year of Assessment</label>
                                              <div class="col-lg-2">
                                                  <label class="right_label">{{ $employeritem_data->spouse_year_assessment1 }}</label>
                                              </div>
                                              <label class="col-lg-2 control-label " for="spouse_annual_income1">Annual Income</label>
                                              <div class="col-lg-2">
                                                <label class="right_label">$ {{ $employeritem_data->spouse_annual_income1 }}</label>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-4 control-label " for="spouse_year_assessment2"></label>
                                              <div class="col-lg-2">
                                                  <label class="right_label">{{ $employeritem_data->spouse_year_assessment2 }}</label>
                                              </div>
                                              <label class="col-lg-2 control-label " for="spouse_annual_income2">Annual Income</label>
                                              <div class="col-lg-2">
                                                <label class="right_label">$ {{ $employeritem_data->spouse_annual_income2 }}</label>
                                              </div>
                                          </div>
                                          @endif
                                          <div class="form-group clearfix">
                                              <label class="col-lg-4 control-label " for="combined_income">Monthly Combined Income of Employer and Spouse</label>
                                              <div class="col-lg-8">
                                                  <label class="right_label">{{ $employeritem_data->combined_income }}</label>
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
                                                            <label class="right_label">{{ $employerfamily_data[$k]->name }}</label>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <label class="right_label">{{ $employerfamily_data[$k]->nric }}</label>
                                                        </td>
                                                        <td style="text-align: center;">
                                                          <div class="row">
                                                              <div class="col-lg-3" style="padding-right: 0px;">
                                                                <?php $monthArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; ?>
                                                                <label class="right_label">{{ $employerfamily_data[$k]->birthday_day }}  {{ $monthArray[$employerfamily_data[$k]->birthday_month - 1] }}. {{ $employerfamily_data[$k]->birthday_year }}</label>
                                                              </div>
                                                          </div>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <label class="right_label">{{ $employerfamily_data[$k]->relationship }}</label>
                                                        </td>
                                                    </tr>
                                                    @endfor
                                                </tbody>
                                            </table>
                                          </div>
                                        </div>
                                      </div>
                          </div>


              <!-- page end-->
                </section>
            </div>
          </div>
      </section>
      <!--main content end-->
    @stop

@stop

@section('custom-scripts')
    @include('js.admin.addEmployer');
@stop
