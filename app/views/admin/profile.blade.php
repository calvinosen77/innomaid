@extends('admin.layout')

    @section('content')
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
            <form role="form" method="post" action="{{ URL::route('admin.users.profileUpdate') }}" id="updateProfileForm" name="updateProfileForm" enctype="multipart/form-data">

              <div class="row">
                  <aside class="profile-nav col-lg-4">
                      <section class="panel">
                          <div class="user-heading round">
                            <input type="file" name="imageUpload_company" id="imageUpload_company" class="form-control" style="display:none;" onchange="readURL_company(this);">
                            <div id="profileImage_company" class="border_img"><img src="{{ $userDetail_data->company_logo }}" width="250" alt="Company Logo" id="profileImg_company"></div>
                            <input type="button" class="btn btn-primary" onclick="onUploadImage_company();" style="margin-top: 40px;" value="Upload Company Logo">
                          </div>

                      </section>
                  </aside>
                  <aside class="profile-info col-lg-8">
                      <section class="panel">
                          <div class="bio-graph-heading">
                              <h3><b>Account Information</b></h3>
                          </div>
                          <div class="panel-body bio-graph-info">
                              <div class="row">
                                  <div class="form-group clearfix">
                                      <label class="col-lg-2 control-label " for="company_name">Company Name</label>
                                      <div class="col-lg-6">
                                          <input id="company_name" name="company_name" type="text" value="{{ $userDetail_data->company_name }}" class="validate epad form-control" required>
                                      </div>
                                  </div>
                                  <div class="form-group clearfix">
                                      <label class="col-lg-2 control-label " for="company_no">Company No.</label>
                                      <div class="col-lg-6">
                                          <input id="company_no" name="company_no" type="text" value="{{ $userDetail_data->company_no }}" class="validate epad form-control" required>
                                      </div>
                                  </div>
                                  <div class="form-group clearfix">
                                      <label class="col-lg-2 control-label " for="address">Address</label>
                                      <div class="col-lg-6">
                                          <input id="address" name="address" type="text" value="{{ $userDetail_data->address }}" class="validate epad form-control" required>
                                      </div>
                                  </div>
                                  <div class="form-group clearfix">
                                      <label class="col-lg-2 control-label " for="phone_number">Phone Number</label>
                                      <div class="col-lg-6">
                                          <input id="phone_number" name="phone_number" type="tel" value="{{ $userDetail_data->phone_number }}" class="validate epad form-control" required>
                                      </div>
                                  </div>
                                  <div class="form-group clearfix">
                                      <label class="col-lg-2 control-label " for="email">Email</label>
                                      <div class="col-lg-6">
                                          <input id="email" name="email" type="email" value="{{ $user_data->email }}" class="validate epad form-control" required>
                                      </div>
                                  </div>
                                  <div class="form-group clearfix">
                                      <label class="col-lg-2 control-label " for="password">Password</label>
                                      <div class="col-lg-6">
                                          <input id="password" name="password" title="Password must contain at least 6 characters, with one or more digits." type="password" class="validate valid form-control epad" required pattern="(?=.*\d)(?=.*[a-z]).{6,}" onchange=" this.setCustomValidity(this.validity.patternMismatch ? this.title : ''); if(this.checkValidity()) form.password_confirm.pattern = this.value; ">
                                      </div>
                                  </div>
                                  <div class="form-group clearfix">
                                      <label class="col-lg-2 control-label " for="password_confirm">Confirm Password</label>
                                      <div class="col-lg-6">
                                          <input id="password_confirm" name="password_confirm" title="Please enter the same password as above" type="password" class="validate valid form-control epad" required pattern="(?=.*\d)(?=.*[a-z]).{6,}" onchange=" this.setCustomValidity(this.validity.patternMismatch ? this.title : ''); ">
                                      </div>
                                  </div>
                              <div class="row" style="text-align: center;">
                                <div class="col-lg-8"></div>
                                <div class="col-lg-2">
                                    <input class="btn btn-success" type="submit" id="updateButton" name="updateButton" value="Update Profile">
                                </div>
                              </div>
                              </div>
                          </div>
                      </section>
                  </aside>
              </div>
            </form>

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
    @include('js.admin.profile');
@stop
