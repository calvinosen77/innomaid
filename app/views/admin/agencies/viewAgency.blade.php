@extends('admin.layout')

    @section('content')
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <header class="panel-heading">
                <b>{{ $sub_path }}</b>
            </header>
              <!-- page start-->
              <div class="row">
                  <aside class="profile-nav col-lg-4">
                      <section class="panel">
                          <div class="user-heading round">
                            <div id="profileImage_logo" class="border_img"><img src="{{ $agencyItem->company_logo }}" width="250" alt="Company Logo" id="profileImg_logo"></div>
                          </div>

                      </section>
                  </aside>
                  <aside class="profile-info col-lg-8">
                      <section class="panel">
                          <div class="bio-graph-heading">
                              <h3><b>Agency Information</b></h3>
                          </div>
                          <div class="panel-body bio-graph-info">
                              <div class="row">
                                  <div class="form-group clearfix">
                                      <label class="col-lg-3 control-label " for="company_name">Company Name</label>
                                      <div class="col-lg-6">
                                          <input id="company_name" name="company_name" type="text" value="{{ $agencyItem->company_name }}" class="validate epad form-control" disabled>
                                      </div>
                                  </div>
                                  <div class="form-group clearfix">
                                      <label class="col-lg-3 control-label " for="company_no">Company No.</label>
                                      <div class="col-lg-6">
                                          <input id="company_no" name="company_no" type="text" value="{{ $agencyItem->company_no }}" class="validate epad form-control" disabled>
                                      </div>
                                  </div>
                                  <div class="form-group clearfix">
                                      <label class="col-lg-3 control-label " for="address">Address</label>
                                      <div class="col-lg-6">
                                          <input id="address" name="address" type="text" value="{{ $agencyItem->address }}" class="validate epad form-control" disabled>
                                      </div>
                                  </div>
                                  <div class="form-group clearfix">
                                      <label class="col-lg-3 control-label " for="phone_number">Phone Number</label>
                                      <div class="col-lg-6">
                                          <input id="phone_number" name="phone_number" type="tel" value="{{ $agencyItem->phone_number }}" class="validate epad form-control" disabled>
                                      </div>
                                  </div>
                                  <div class="form-group clearfix">
                                      <label class="col-lg-3 control-label " for="email">Email</label>
                                      <div class="col-lg-6">
                                          <input id="email" name="email" type="email" value="{{ $agencyInform->email }}" class="validate epad form-control" disabled>
                                      </div>
                                  </div>
                                  <div class="form-group clearfix">
                                      <label class="col-lg-3 control-label " for="active">Active Status</label>
                                      <div class="col-lg-6">
                                      <div class="row m-bot15">
                                          <div class="col-sm-6 text-center">
                                              <input type="checkbox" class="form-control" id="active" name="active" value="1" style="width: 25px;" {{ ($agencyInform->active == 1)? 'checked': '' }} disabled/>
                                          </div>
                                      </div>
                                      </div>
                                  </div>
                              <div class="row" style="text-align: center;">
                                <div class="col-lg-7"></div>
                                <div class="col-lg-2">
                                    <input class="btn btn-info" type="button" id="backButton" name="backButton" value="Back">
                                </div>
                              </div>
                              </div>
                          </div>
                      </section>
                  </aside>
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
    @include('js.admin.addAgency');
@stop
