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

                              <form id="wizard-validation-form" action="{{ URL::route('admin.maids.doupdateMaid') }}" method="post" role="form" class="form-login margin-top-normal" enctype="multipart/form-data">
                                  <div>
<!-- Part A -->
                                      <h3><span class="subtitle_text">Part A.</span> PROFILE OF FDW</h3>
                                      <section>
                                      <div class="row">
    <!-- Personal Information -->       <div class="col-lg-8">
                                          <div style="margin-top: 40px; margin-bottom: 40px;"><h4>A1. PERSONAL INFORMATION</h4></div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="name">Name</label>
                                              <div class="col-lg-10">
                                                  <input name="id" type="hidden" value="{{ $maidinformItem_data->id }}">
                                                  <input class="required form-control" id="name" name="name" type="text" value="{{ $maidinformItem_data->name }}">

                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="passport_no">Passport NO.</label>
                                              <div class="col-lg-10">
                                                  <input class="form-control" id="passport_no" name="passport_no" type="text" value="{{ $maidinformItem_data->passport_no }}">

                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label ">Date of Birth</label>
                                              <div class="col-lg-10">
                                                  <div class="col-lg-3" style="padding-left: 0px;">
                                                    <select class="form-control" id="birthday_day" name="birthday_day">
                                                        @for($i=1;$i<=31;$i++)
                                                        <option value="{{ $i }}" <?php echo ($maidinformItem_data->birthday_day == $i)? 'selected' : ''; ?>>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                  </div>
                                                  <div class="col-lg-1"><label class="subtitle_text">/</label></div>
                                                  <div class="col-lg-3">
                                                    <select class="form-control" id="birthday_month" name="birthday_month">
                                                        <?php $monthArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; ?>
                                                        @for($i=1;$i<=12;$i++)
                                                        <option value="{{ $i }}" <?php echo ($maidinformItem_data->birthday_month == $i)? 'selected' : ''; ?>>{{ $monthArray[$i-1] }}</option>
                                                        @endfor
                                                    </select>
                                                  </div>
                                                  <div class="col-lg-1"><label class="subtitle_text">/</label></div>
                                                  <div class="col-lg-3">
                                                    <select class="form-control" id="birthday_year" name="birthday_year">
                                                        @for($i=1950;$i<=2010;$i++)
                                                        <option value="{{ $i }}" <?php echo ($maidinformItem_data->birthday_year == $i)? 'selected' : ''; ?>>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="birth_place">Place of Birth</label>
                                              <div class="col-lg-10">
                                                  <input id="birth_place" name="birth_place" type="text" class="form-control" value="{{ $maidinformItem_data->birth_place }}">

                                              </div>
                                          </div>

                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="height">Height(cm)</label>
                                              <div class="col-lg-3">
                                                  <input id="height" name="height" type="number" class="form-control" value="{{ $maidinformItem_data->height }}">
                                              </div>
                                              <label class="col-lg-2 control-label " for="weight">Weight(kg)</label>
                                              <div class="col-lg-3">
                                                  <input id="weight" name="weight" type="number" class="form-control" value="{{ $maidinformItem_data->weight }}">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="agency">Agency</label>
                                                <div class="col-lg-10">
                                                      <select class="form-control" id="agency" name="agency">
                                                          @foreach($maidagency_data as $item)
                                                          <option value="{{ $item->agency }}" <?php echo ($maidinformItem_data->agency == $item->agency)? 'selected' : ''; ?>>{{ $item->agency }}</option>
                                                          @endforeach
                                                      </select>
                                                </div>
                                          </div>

                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="nationality">Nationality</label>
                                              <div class="col-lg-10">
                                                    <select class="form-control" id="nationality" name="nationality">
                                                        @foreach($nationality_data as $item)
                                                        <option value="{{ $item->nationality }}" <?php echo ($maidinformItem_data->agency == $item->nationality)? 'selected' : ''; ?>>{{ $item->nationality }}</option>
                                                        @endforeach
                                                    </select>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="residential_address">Residential Address</label>
                                              <div class="col-lg-10">
                                                  <input id="residential_address" name="residential_address" type="text" class="form-control" value="{{ $maidinformItem_data->residential_address }}">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="contact_number">Contact Number</label>
                                              <div class="col-lg-10">
                                                  <input id="contact_number" name="contact_number" type="text" class="form-control" value="{{ $maidinformItem_data->contact_number }}">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="religion">Religion</label>
                                              <div class="col-lg-10">
                                                  <input id="religion" name="religion" type="text" class="form-control" value="{{ $maidinformItem_data->religion }}">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="education_level">Education Level</label>
                                              <div class="col-lg-10">
                                                  <input id="education_level" name="education_level" type="text" class="form-control" value="{{ $maidinformItem_data->education_level }}">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="sibling_number">Number of Sibling</label>
                                              <div class="col-lg-10">
                                                  <input id="sibling_number" name="sibling_number" type="text" class="form-control" value="{{ $maidinformItem_data->sibling_number }}">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="marital_status">Marital Status</label>
                                              <div class="col-lg-10">
                                                  <input id="marital_status" name="marital_status" type="text" class="form-control" value="{{ $maidinformItem_data->marital_status }}">
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="children_number">Number of Children</label>
                                              <div class="col-lg-10">
                                                  <input id="children_number" name="children_number" type="text" class="form-control" value="{{ $maidinformItem_data->children_number }}">
                                              </div>
                                          </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                    <input type="file" name="imageUpload_profile" id="imageUpload_profile" class="form-control" style="display:none;" onchange="readURL_profile(this);">
                                                    <div id="profileImage_profile" style="width:90px; height:120px;"><img style="width:100%;height:120px;" id="profileImg_profile" src="{{ $maidinformItem_data->profile_img }}"></div>
                                                    <input type="button" class="btn btn-primary" onclick="onUploadImage_profile();" style="margin-top: 10px;" value="Upload Thumbnail Picture">
                                            </div>
                                            <div class="row" style="margin-top: 20px;">
                                                    <input type="file" name="imageUpload_full" id="imageUpload_full" class="form-control" style="display:none;" onchange="readURL_full(this);">
                                                    <div id="profileImage_full" style="width:300px; height:500px;"><img style="width:100%;height:500px;" id="profileImg_full" src="{{ $maidinformItem_data->profile_full_img }}"></div>
                                                    <input type="button" class="btn btn-primary" onclick="onUploadImage_full();" style="margin-top: 10px;" value="Upload Full Picture">
                                            </div>
                                        </div>
                                      </div>
    <!-- Medical History -->
                                          <div style="margin-top: 40px; margin-bottom: 40px;"><h4>A2. MEDICAL HISTORY / DIETARY RESTRICTIONS</h4></div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label " for="allergy">Allergies(if any)</label>
                                              <div class="col-lg-10">
                                                  <input class="form-control" id="allergy" name="allergy" type="text" class="form-control" value="{{ $maidinformItem_data->allergy }}">

                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <div class="col-lg-12" style="font-weight: bold; margin-top: 10px; margin-bottom: 20px;">Past and existing illnesses(including chronic ailments and illnesses requireing medication):</div>
                                              <div class="col-lg-12">
                                                <div class="col-lg-6">
                                                  <label class="col-lg-5 control-label ">Mental illness</label>
                                                  <input class="col-lg-1" style="margin-top: 10px" name="mental_illness" type="radio" value="1" <?php echo ($maidinformItem_data->mental_illness == 1)? 'checked' : ''; ?>>
                                                  <label class="col-lg-2 control-label ">Yes</label>
                                                  <input class="col-lg-1" style="margin-top: 10px" name="mental_illness" type="radio" value="0" <?php echo ($maidinformItem_data->mental_illness == 0)? 'checked' : ''; ?>>
                                                  <label class="col-lg-2 control-label ">No</label>
                                                </div>
                                                <div class="col-lg-6">
                                                  <label class="col-lg-5 control-label ">Tuberculosis</label>
                                                  <input class="col-lg-1" style="margin-top: 10px" name="tuberculosis" type="radio" value="1" <?php echo ($maidinformItem_data->tuberculosis == 1)? 'checked' : ''; ?>>
                                                  <label class="col-lg-2 control-label ">Yes</label>
                                                  <input class="col-lg-1" style="margin-top: 10px" name="tuberculosis" type="radio" value="0" <?php echo ($maidinformItem_data->tuberculosis == 0)? 'checked' : ''; ?>>
                                                  <label class="col-lg-2 control-label ">No</label>
                                                </div>
                                              </div>
                                              <div class="col-lg-12">
                                                <div class="col-lg-6">
                                                  <label class="col-lg-5 control-label ">Epilepsy</label>
                                                  <input class="col-lg-1" style="margin-top: 10px" name="epilepsy" type="radio" value="1" <?php echo ($maidinformItem_data->epilepsy == 1)? 'checked' : ''; ?>>
                                                  <label class="col-lg-2 control-label ">Yes</label>
                                                  <input class="col-lg-1" style="margin-top: 10px" name="epilepsy" type="radio" value="0" <?php echo ($maidinformItem_data->epilepsy == 0)? 'checked' : ''; ?>>
                                                  <label class="col-lg-2 control-label ">No</label>
                                                </div>
                                                <div class="col-lg-6">
                                                  <label class="col-lg-5 control-label ">Heart Disease</label>
                                                  <input class="col-lg-1" style="margin-top: 10px" name="heart_disease" type="radio" value="1" <?php echo ($maidinformItem_data->heart_disease == 1)? 'checked' : ''; ?>>
                                                  <label class="col-lg-2 control-label ">Yes</label>
                                                  <input class="col-lg-1" style="margin-top: 10px" name="heart_disease" type="radio" value="0" <?php echo ($maidinformItem_data->heart_disease == 0)? 'checked' : ''; ?>>
                                                  <label class="col-lg-2 control-label ">No</label>
                                                </div>
                                              </div>
                                              <div class="col-lg-12">
                                                <div class="col-lg-6">
                                                  <label class="col-lg-5 control-label ">Asthma</label>
                                                  <input class="col-lg-1" style="margin-top: 10px" name="asthma" type="radio" value="1" <?php echo ($maidinformItem_data->asthma == 1)? 'checked' : ''; ?>>
                                                  <label class="col-lg-2 control-label ">Yes</label>
                                                  <input class="col-lg-1" style="margin-top: 10px" name="asthma" type="radio" value="0" <?php echo ($maidinformItem_data->asthma == 0)? 'checked' : ''; ?>>
                                                  <label class="col-lg-2 control-label ">No</label>
                                                </div>
                                                <div class="col-lg-6">
                                                  <label class="col-lg-5 control-label ">Malaria</label>
                                                  <input class="col-lg-1" style="margin-top: 10px" name="malaria" type="radio" value="1" <?php echo ($maidinformItem_data->malaria == 1)? 'checked' : ''; ?>>
                                                  <label class="col-lg-2 control-label ">Yes</label>
                                                  <input class="col-lg-1" style="margin-top: 10px" name="malaria" type="radio" value="0" <?php echo ($maidinformItem_data->malaria == 0)? 'checked' : ''; ?>>
                                                  <label class="col-lg-2 control-label ">No</label>
                                                </div>
                                              </div>
                                              <div class="col-lg-12">
                                                <div class="col-lg-6">
                                                  <label class="col-lg-5 control-label ">Diabetes</label>
                                                  <input class="col-lg-1" style="margin-top: 10px" name="diabetes" type="radio" value="1" <?php echo ($maidinformItem_data->diabetes == 1)? 'checked' : ''; ?>>
                                                  <label class="col-lg-2 control-label ">Yes</label>
                                                  <input class="col-lg-1" style="margin-top: 10px" name="diabetes" type="radio" value="0" <?php echo ($maidinformItem_data->diabetes == 0)? 'checked' : ''; ?>>
                                                  <label class="col-lg-2 control-label ">No</label>
                                                </div>
                                                <div class="col-lg-6">
                                                  <label class="col-lg-5 control-label ">Operations</label>
                                                  <input class="col-lg-1" style="margin-top: 10px" name="operations" type="radio" value="1" <?php echo ($maidinformItem_data->operations == 1)? 'checked' : ''; ?>>
                                                  <label class="col-lg-2 control-label ">Yes</label>
                                                  <input class="col-lg-1" style="margin-top: 10px" name="operations" type="radio" value="0" <?php echo ($maidinformItem_data->operations == 0)? 'checked' : ''; ?>>
                                                  <label class="col-lg-2 control-label ">No</label>
                                                </div>
                                              </div>
                                              <div class="col-lg-12">
                                                <div class="col-lg-6">
                                                  <label class="col-lg-5 control-label ">Hypertension</label>
                                                  <input class="col-lg-1" style="margin-top: 10px" name="hypertension" type="radio" value="1" <?php echo ($maidinformItem_data->hypertension == 1)? 'checked' : ''; ?>>
                                                  <label class="col-lg-2 control-label ">Yes</label>
                                                  <input class="col-lg-1" style="margin-top: 10px" name="hypertension" type="radio" value="0" <?php echo ($maidinformItem_data->hypertension == 0)? 'checked' : ''; ?>>
                                                  <label class="col-lg-2 control-label ">No</label>
                                                </div>
                                                <div class="col-lg-6">
                                                  <label class="col-lg-5 control-label ">Others(if any)</label>
                                                  <textarea class="col-lg-6" style="margin-top: 10px" name="others" class="form-control">{{ $maidinformItem_data->others }}</textarea>
                                                </div>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label ">Physical Disabilities</label>
                                              <div class="col-lg-10">
                                                  <input class="col-lg-1" style="margin-top: 10px" name="physical_disabilities" type="radio" value="1" <?php echo ($maidinformItem_data->physical_disabilities == 1)? 'checked' : ''; ?>>
                                                  <label class="col-lg-1 control-label ">Yes</label>
                                                  <input class="col-lg-1" style="margin-top: 10px" name="physical_disabilities" type="radio" value="0" <?php echo ($maidinformItem_data->physical_disabilities == 0)? 'checked' : ''; ?>>
                                                  <label class="col-lg-1 control-label ">No</label>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-2 control-label ">Dietary Restrictions</label>
                                              <div class="col-lg-10">
                                                  <input class="col-lg-1" style="margin-top: 10px" name="dietary_restrictions" type="radio" value="1" <?php echo ($maidinformItem_data->dietary_restrictions == 1)? 'checked' : ''; ?>>
                                                  <label class="col-lg-1 control-label ">Yes</label>
                                                  <input class="col-lg-1" style="margin-top: 10px" name="dietary_restrictions" type="radio" value="0" <?php echo ($maidinformItem_data->dietary_restrictions == 0)? 'checked' : ''; ?>>
                                                  <label class="col-lg-1 control-label ">No</label>
                                              </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-3 control-label ">Food Handling Preferences</label>
                                              <div class="col-lg-9">
                                                  <div class="col-lg-12">
                                                    <label class="col-lg-1 control-label ">Pork</label>
                                                    <input class="col-lg-1" style="margin-top: 10px" name="food_handling_pork" type="radio" value="1" <?php echo ($maidinformItem_data->food_handling_pork == 1)? 'checked' : ''; ?>>
                                                    <label class="col-lg-2 control-label ">Yes</label>
                                                    <input class="col-lg-1" style="margin-top: 10px" name="food_handling_pork" type="radio" value="0" <?php echo ($maidinformItem_data->food_handling_pork == 0)? 'checked' : ''; ?>>
                                                    <label class="col-lg-2 control-label ">No</label>
                                                  </div>
                                                  <div class="col-lg-12">
                                                    <label class="col-lg-1 control-label ">Beef</label>
                                                    <input class="col-lg-1" style="margin-top: 10px" name="food_handling_beef" type="radio" value="1" <?php echo ($maidinformItem_data->food_handling_beef == 1)? 'checked' : ''; ?>>
                                                    <label class="col-lg-2 control-label ">Yes</label>
                                                    <input class="col-lg-1" style="margin-top: 10px" name="food_handling_beef" type="radio" value="0" <?php echo ($maidinformItem_data->food_handling_beef == 0)? 'checked' : ''; ?>>
                                                    <label class="col-lg-2 control-label ">No</label>
                                                  </div>
                                                  <div class="col-lg-12">
                                                    <label class="col-lg-3 control-label ">Others(if any)</label>
                                                    <textarea class="col-lg-4" style="margin-top: 10px" name="food_handling_others" class="form-control">{{ $maidinformItem_data->food_handling_others }}</textarea>
                                                  </div>

                                              </div>
                                          </div>
    <!-- Others -->
                                          <div style="margin-top: 40px; margin-bottom: 40px;"><h4>A3. OTHERS</h4></div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-3 control-label " for="preference_rest_day">Preference for rest day</label>
                                              <div class="col-lg-6">
                                                  <input id="preference_rest_day" name="preference_rest_day" type="text" class="form-control" value="{{ $maidinformItem_data->preference_rest_day }}">
                                              </div>
                                              <label class="col-lg-3 control-label " style="padding-left: 0px;">rest day(s) per month</label>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-3 control-label " for="any_other_remarks">Any other Remarks</label>
                                              <div class="col-lg-6">
                                                  <input id="any_other_remarks" name="any_other_remarks" type="text" class="form-control" value="{{ $maidinformItem_data->any_other_remarks }}">
                                              </div>
                                          </div>

                                      </section>

<!-- Part B -->
                                      <h3><span class="subtitle_text">Part B.</span> SKILLS OF FDW</h3>
                                      <section>
    <!-- Method of Evaluation of Skills -->
                                          <div style="margin-top: 40px; margin-bottom: 40px;"><h4>B1. METHOD OF EVALUATION OF SKILLS</h4></div>
                                          <div class="form-group clearfix">
                                              <div class="col-lg-12" style="font-weight: bold; margin-top: 10px; margin-bottom: 20px;">Please indicate the method(s) used to evaluate the FDW's skills(can tick more than one):</div>
                                              <div class="col-lg-12">
                                                <div class="col-lg-12">
                                                  <input class="col-lg-1" style="margin-top: 10px" name="base_on_fdw" type="checkbox" value="1" <?php echo ($maidinformItem_data->base_on_fdw == 1)? 'checked' : ''; ?>>
                                                  <label class="col-lg-10 control-label ">Based on FDW's declaration, no evaluation/observation by Singapore EA or overseas training centre/EA</label>
                                                </div>
                                                <div class="col-lg-12">
                                                  <input class="col-lg-1" style="margin-top: 10px" name="interviewed_singapore" type="checkbox" value="1" <?php echo ($maidinformItem_data->interviewed_singapore == 1)? 'checked' : ''; ?>>
                                                  <label class="col-lg-10 control-label ">Interviewed by Singapore EA</label>
                                                </div>
                                                <div class="col-lg-12">
                                                  <input class="col-lg-1" style="margin-top: 10px" name="interviewed_overseas" type="checkbox" value="1" <?php echo ($maidinformItem_data->interviewed_overseas == 1)? 'checked' : ''; ?>>
                                                  <label class="col-lg-10 control-label ">Interviewed by overseas training centre/EA</label>
                                                </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-lg-12">
                                              <div class="panel-body">
                                                <section id="flip-scroll">
                                                    <table class="table table-bordered table-striped table-condensed cf">
                                                        <thead class="cf">
                                                            <tr>
                                                                <th class="numeric" style="text-align: center;">No</th>
                                                                <th style="text-align: center;">Areas of Work</th>
                                                                <th style="text-align: center;">Willingness<br>(Yes/No)</th>
                                                                <th style="text-align: center;">Experience<br>(Years)</th>
                                                                <th style="text-align: center;">Assessment/Observation<br>(indicate N.A. of no evaluation was done)<br>Poor ...... Excellent ... N.A.<br>1 2 3 4 5 N.A.</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="numeric" style="text-align: center;">1</td>
                                                                <td>Care of infants/children<br><br>Please specify age range:<br><b>2 to 4</b></td>
                                                                <td style="text-align: center;">
                                                                    <select class="form-control" id="care_infant_willingness" name="care_infant_willingness">
                                                                          <option value="1" <?php echo ($maidinformItem_data->care_infant_willingness == 1)? 'selected' : ''; ?>>Yes</option>
                                                                          <option value="0" <?php echo ($maidinformItem_data->care_infant_willingness == 0)? 'selected' : ''; ?>>No</option>
                                                                    </select>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                    <input class="form-control" name="care_infant_years" type="text" value="{{ $maidinformItem_data->care_infant_years }}">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-lg-1" style="margin-top: 10px; margin-right: 10px;">Rate:</div>
                                                                        <div class="col-lg-4"><input class="form-control" name="care_infant_rate" type="number" value="{{ $maidinformItem_data->care_infant_rate }}"></div>
                                                                    </div>
                                                                    <br><textarea class="form-control" name="care_infant_remark">{{ $maidinformItem_data->care_infant_remark }}</textarea>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="numeric" style="text-align: center;">2</td>
                                                                <td>Care of elderly<br><br>Please specify age range:<br><b>2 to 4</b></td>
                                                                <td style="text-align: center;">
                                                                    <select class="form-control" id="care_elderly_willingness" name="care_elderly_willingness">
                                                                          <option value="1" <?php echo ($maidinformItem_data->care_elderly_willingness == 1)? 'selected' : ''; ?>>Yes</option>
                                                                          <option value="0" <?php echo ($maidinformItem_data->care_elderly_willingness == 0)? 'selected' : ''; ?>>No</option>
                                                                    </select>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                    <input class="form-control" name="care_elderly_years" type="text" value="{{ $maidinformItem_data->care_elderly_years }}">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-lg-1" style="margin-top: 10px; margin-right: 10px;">Rate:</div>
                                                                        <div class="col-lg-4"><input class="form-control" name="care_elderly_rate" type="number" value="{{ $maidinformItem_data->care_elderly_rate }}"></div>
                                                                    </div>
                                                                    <br><textarea class="form-control" name="care_elderly_remark">{{ $maidinformItem_data->care_elderly_remark }}</textarea>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="numeric" style="text-align: center;">3</td>
                                                                <td>Care of disabled<br><br>Please specify age range:<br><b>2 to 4</b></td>
                                                                <td style="text-align: center;">
                                                                    <select class="form-control" id="care_disabled_willingness" name="care_disabled_willingness">
                                                                          <option value="1" <?php echo ($maidinformItem_data->care_disabled_willingness == 1)? 'selected' : ''; ?>>Yes</option>
                                                                          <option value="0" <?php echo ($maidinformItem_data->care_disabled_willingness == 0)? 'selected' : ''; ?>>No</option>
                                                                    </select>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                    <input class="form-control" name="care_disabled_years" type="text" value="{{ $maidinformItem_data->care_disabled_years }}">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-lg-1" style="margin-top: 10px; margin-right: 10px;">Rate:</div>
                                                                        <div class="col-lg-4"><input class="form-control" name="care_disabled_rate" type="number" value="{{ $maidinformItem_data->care_disabled_rate }}"></div>
                                                                    </div>
                                                                    <br><textarea class="form-control" name="care_disabled_remark">{{ $maidinformItem_data->care_disabled_remark }}</textarea>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="numeric" style="text-align: center;">4</td>
                                                                <td>General housework<br><br>Please specify age range:<br><b>2 to 4</b></td>
                                                                <td style="text-align: center;">
                                                                    <select class="form-control" id="general_housework_willingness" name="general_housework_willingness">
                                                                          <option value="1" <?php echo ($maidinformItem_data->general_housework_willingness == 1)? 'selected' : ''; ?>>Yes</option>
                                                                          <option value="0" <?php echo ($maidinformItem_data->general_housework_willingness == 0)? 'selected' : ''; ?>>No</option>
                                                                    </select>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                    <input class="form-control" name="general_housework_years" type="text" value="{{ $maidinformItem_data->general_housework_years }}">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-lg-1" style="margin-top: 10px; margin-right: 10px;">Rate:</div>
                                                                        <div class="col-lg-4"><input class="form-control" name="general_housework_rate" type="number" value="{{ $maidinformItem_data->general_housework_rate }}"></div>
                                                                    </div>
                                                                    <br><textarea class="form-control" name="general_housework_remark">{{ $maidinformItem_data->general_housework_remark }}</textarea>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="numeric" style="text-align: center;">5</td>
                                                                <td>Cooking<br><br>Please specify age range:<br><b>2 to 4</b></td>
                                                                <td style="text-align: center;">
                                                                    <select class="form-control" id="cooking_willingness" name="cooking_willingness">
                                                                          <option value="1" <?php echo ($maidinformItem_data->cooking_willingness == 1)? 'selected' : ''; ?>>Yes</option>
                                                                          <option value="0" <?php echo ($maidinformItem_data->cooking_willingness == 0)? 'selected' : ''; ?>>No</option>
                                                                    </select>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                    <input class="form-control" name="cooking_years" type="text" value="{{ $maidinformItem_data->cooking_years }}">
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-lg-1" style="margin-top: 10px; margin-right: 10px;">Rate:</div>
                                                                        <div class="col-lg-4"><input class="form-control" name="cooking_rate" type="number" value="{{ $maidinformItem_data->cooking_rate }}"></div>
                                                                    </div>
                                                                    <br><textarea class="form-control" name="cooking_remark">{{ $maidinformItem_data->cooking_remark }}</textarea>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="numeric" style="text-align: center;">6</td>
                                                                <td>Language abilities(spoken)</td>
                                                                <td style="text-align: center;"></td>
                                                                <td style="text-align: center;"></td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-lg-3" style="margin-top: 10px; margin-right: 10px;">Language 1:</div>
                                                                        <div class="col-lg-8"><input class="form-control" name="language_ability_name1" type="text" value="{{ $maidinformItem_data->language_ability_name1 }}"></div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-3" style="margin-top: 10px; margin-right: 10px;">Language 2:</div>
                                                                        <div class="col-lg-8"><input class="form-control" name="language_ability_name2" type="text" value="{{ $maidinformItem_data->language_ability_name2 }}"></div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-3" style="margin-top: 10px; margin-right: 10px;">Language 3</div>
                                                                        <div class="col-lg-8"><input class="form-control" name="language_ability_name3" type="text" value="{{ $maidinformItem_data->language_ability_name3 }}"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="numeric" style="text-align: center;">7</td>
                                                                <td>Other skills, if any<br><br>Please specify:</td>
                                                                <td style="text-align: center;"></td>
                                                                <td style="text-align: center;"></td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-lg-2" style="margin-top: 10px; margin-right: 10px;">Name:</div>
                                                                        <div class="col-lg-6"><input class="form-control" name="other_skills_name" type="text" value="{{ $maidinformItem_data->other_skills_name }}"></div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-2" style="margin-top: 10px; margin-right: 10px;">Rate:</div>
                                                                        <div class="col-lg-6"><input class="form-control" name="other_skills_level" type="number" value="{{ $maidinformItem_data->other_skills_level }}"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </section>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group clearfix">
                                                <label class="col-lg-2 control-label " for="primary_duty">Primary Duty</label>
                                                <div class="col-lg-4">
                                                      <select class="form-control" id="primary_duty" name="primary_duty">
                                                          <option value="infants" <?php echo ($maidinformItem_data->primary_duty == $item->nationality)? 'selected' : ''; ?>>Care of infants/children</option>
                                                          <option value="elderly" <?php echo ($maidinformItem_data->primary_duty == $item->nationality)? 'selected' : ''; ?>>Care of elderly</option>
                                                          <option value="disabled" <?php echo ($maidinformItem_data->primary_duty == $item->nationality)? 'selected' : ''; ?>>Care of disabled</option>
                                                          <option value="housework" <?php echo ($maidinformItem_data->primary_duty == $item->nationality)? 'selected' : ''; ?>>General housework</option>
                                                          <option value="cooking" <?php echo ($maidinformItem_data->primary_duty == $item->nationality)? 'selected' : ''; ?>>Cooking</option>
                                                          <option value="other" <?php echo ($maidinformItem_data->primary_duty == $item->nationality)? 'selected' : ''; ?>>Other</option>
                                                      </select>
                                                </div>
                                          </div>

                                      </section>
<!-- Part C -->
                                      <h3><span class="subtitle_text">Part C.</span> EMPLOYMENT HISTORY OF THE FDW</h3>
                                      <section>
    <!-- Employment History Overseas -->
                                          <div style="margin-top: 40px; margin-bottom: 40px;"><h4>C1. EMPLOYMENT HISTORY OVERSEAS</h4></div>
                                          <div class="col-lg-12">
                                            <input class="col-lg-2 btn btn-primary" type="button" id="add_new" value="Add New" onclick="add_new_row();">
                                            <input type="hidden" value="{{ $num_history }}" name="num_table_row" id="num_table_row">
                                          </div>
                                          <div class="row">
                                            <div class="col-lg-12">
                                              <div class="panel-body">
                                                <section id="flip-scroll">
                                                    <table class="table table-bordered table-striped table-condensed cf">
                                                        <thead class="cf">
                                                            <tr>
                                                                <th style="text-align: center;">Date From</th>
                                                                <th style="text-align: center;">Date To</th>
                                                                <th style="text-align: center;">Country</th>
                                                                <th style="text-align: center;">Employer</th>
                                                                <th style="text-align: center;">Work Duties</th>
                                                                <th style="text-align: center;">Remarks</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="insert_row">
                                                        @for($i=0;$i<$num_history;$i++)
                                                            <tr>
                                                                <td style="text-align: center;">
                                                                    <input name="maidemployment_id{{ $i }}" type="hidden" value="{{ $maidemployment_data[$i]->id }}">
                                                                    <input class="form-control datepicker" name="date_from{{ $i }}" value="{{ $maidemployment_data[$i]->date_from }}">
                                                                </td>
                                                                <td style="text-align: center;">
                                                                    <input class="form-control datepicker" name="date_to{{ $i }}" value="{{ $maidemployment_data[$i]->date_to }}">
                                                                </td>
                                                                <td style="text-align: center;">
                                                                    <input class="form-control" name="country{{ $i }}" type="text" value="{{ $maidemployment_data[$i]->country }}">
                                                                </td>
                                                                <td style="text-align: center;">
                                                                    <input class="form-control" name="employer{{ $i }}" type="text" value="{{ $maidemployment_data[$i]->employer }}">
                                                                </td>
                                                                <td style="text-align: center;">
                                                                    <textarea class="form-control" name="work_duty{{ $i }}">{{ $maidemployment_data[$i]->work_duty }}</textarea>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                    <textarea class="form-control" name="remarks{{ $i }}">{{ $maidemployment_data[$i]->remark }}</textarea>
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                        </tbody>
                                                    </table>
                                                </section>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group clearfix">
                                              <label class="col-lg-3 control-label " for="basic_salary">Basic salary</label>
                                              <div class="col-lg-2 input-group">
                                                  <span class="input-group-addon">$</span><input id="basic_salary" name="basic_salary" type="number" class="form-control required" value="{{ $maidinformItem_data->basic_salary }}">
                                              </div>
                                          </div>

    <!-- Employment History in Singapore -->
                                          <div style="margin-top: 40px; margin-bottom: 40px;"><h4>C2. EMPLOYMENT HISTORY IN SINGAPORE</h4></div>
                                          <div class="form-group clearfix">
                                              <div class="col-lg-12">
                                                  <label class="col-lg-6 control-label">Previous working experience in Singapore: </label>
                                                  <input class="col-lg-1" style="margin-top: 10px;" name="employment_history_singapore" type="radio" value="1" <?php echo ($maidinformItem_data->employment_history_singapore == 1)? 'checked' : '';?>>
                                                  <label class="col-lg-1 control-label">Yes</label>
                                                  <input class="col-lg-1" style="margin-top: 10px;" name="employment_history_singapore" type="radio" value="0" <?php echo ($maidinformItem_data->employment_history_singapore == 0)? 'checked' : '';?>>
                                                  <label class="col-lg-1 control-label">No</label>
                                              </div>
                                              <div class="col-lg-12" style="margin-top: 20px;">(The EA si required to obtain the FDW's employment history from MOM and furnish the employer with the employment history of the FDW. The employer may also verify the FDW's employment history in Singapore through WPOL using SingPass)</div>
                                          </div>
    <!-- Feedback from previous employers in Singapore -->
                                          <div style="margin-top: 40px; margin-bottom: 40px;"><h4>C3. FEEDBACK FROM PREVIOUS EMPLOYERS IN SINGAPORE</h4></div>
                                          <div class="form-group clearfix">
                                                <div class="col-lg-12">Feedback was/was not obtained by the EA from the previous employers. If feedback was obtained(attach testimonial if possible), please indicate the feedback in the table below:</div>
                                          </div>
                                          <div class="col-lg-12">
                                             <input class="col-lg-2 btn btn-primary" type="button" id="add_new_singapore" value="Add New" onclick="add_new_row_singapore();">
                                             <input type="hidden" value="{{ $num_history_singapore }}" name="num_table_row_singapore" id="num_table_row_singapore">
                                          </div>
                                          <div class="row">
                                            <div class="col-lg-12">
                                              <div class="panel-body">
                                                <section id="flip-scroll">
                                                    <table class="table table-bordered table-striped table-condensed cf">
                                                        <thead class="cf">
                                                            <tr>
                                                                <th style="text-align: center;" width="20%">Employer</th>
                                                                <th style="text-align: center;">Feedback</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="insert_row_singapore">
                                                            @for($i=0;$i<$num_history_singapore;$i++)
                                                            <tr>
                                                                <td style="text-align: center;">
                                                                    <input name="maidemployment_singapore_id{{ $i }}" type="hidden" value="{{ $maidemployment_singapore_data[$i]->id }}">
                                                                    <input class="form-control" name="employer_singapore{{ $i }}" type="text" value="{{ $maidemployment_singapore_data[$i]->employer }}">
                                                                </td>
                                                                <td>
                                                                    <textarea class="form-control" name="feedback{{ $i }}">{{ $maidemployment_singapore_data[$i]->feedback }}</textarea>
                                                                </td>
                                                            </tr>
                                                            @endfor
                                                        </tbody>
                                                    </table>
                                                </section>
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
    @include('js.admin.addMaid');
@stop
