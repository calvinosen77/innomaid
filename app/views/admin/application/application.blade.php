@extends('admin.layout')

    @section('content')
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
          <div class="row">
            <div class="col-sm-12">
              <section class="panel">
                <header class="panel-heading">{{ $sub_path }}</header>
                <!-- Ajax Loading Image -->
                <div id="ajaxLoadingDiv" style="position: fixed; left: 50%; top: 50%; margin-left: -50px; margin-top: -50px; z-index: 9999; display: none;">
                  <img width="100" height="100" src="/assets/backend/img/custom/ajax-loading1.gif">
                </div>
  <!-- add button -->
                @if(Session::get('user_group') != 1)
                <div class="row"><div class="panel-heading" style="margin-left: 20px;"><a href="{{ URL::route('admin.maidapplication.addApplication') }}" class="btn btn-primary"><i class="fa fa-plus" style="margin-right: 15px;"></i>Add Application</a></div></div>
                @endif
  <!--//end -->

				<div class="panel-body">
                    <div class="adv-table">
                        <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                                  <tr>
                                      <th style="text-align: center;">Employer</th>
                                      <th style="text-align: center;">Maid</th>
                                      <th style="text-align: center;">Purpose</th>
                                      <th style="text-align: center;">Date created</th>
                                      <th style="text-align: center;">Date Modified</th>
                                      <th style="text-align: center;">Action</th>
                                  </tr>
                            </thead>

							<tbody>
                            @for($i=0;$i<$num;$i++)
                                  <tr class="gradeX">
                                      <td style="text-align: center;">{{ $employer_data[$i]->first_name . ' ' . $employer_data[$i]->last_name }}</td>
                                      <td style="text-align: center;">{{ $maid_data[$i]->name }}</td>
                                      <td style="text-align: center;">{{ $application_data[$i]->purpose }}</td>
                                      <td style="text-align: center;">{{ $application_data[$i]->created_at }}</td>
                                      <td style="text-align: center;">{{ $application_data[$i]->updated_at }}</td>
                                      <td style="text-align: center;">
                                       @if(Session::get('user_group') != 1)
                                        <button tabindex="-1" data-toggle="dropdown" class="btn btn-warning dropdown-toggle" type="button" aria-expanded="true"><i class="fa fa-download" style="margin-right: 10px;"></i>Download<span class="caret" style="margin-left: 10px;"></span></button>
                                           <ul role="menu" class="dropdown-menu" id="dropDownBox">
                                              <li><a href="{{ URL::route('admin.maidapplication.downloadPDFApplication', array('id' => $application_data[$i]->id, 'id2' => 1)) }}"><i class="fa fa-file" style="margin-right: 10px;"></i>Employer Data Sheet</a></li>
                                              <li><a href="{{ URL::route('admin.maidapplication.downloadPDFApplication', array('id' => $application_data[$i]->id, 'id2' => 2)) }}"><i class="fa fa-file" style="margin-right: 10px;"></i>Services & Fees Schedule</a></li>
                                          </ul>
                                       @endif
                                        <a href="{{ URL::route('admin.maidapplication.viewApplication', $application_data[$i]->id) }}"><button class="btn btn-success" type="button"><i class="fa fa-file-text-o" style="margin-right: 10px;"></i>View</button></a>
                                        @if(Session::get('user_group') != 1)
                                        <a href="{{ URL::route('admin.maidapplication.updateApplication', $application_data[$i]->id) }}"><button class="btn btn-info" type="button"><i class="fa fa-pencil" style="margin-right: 10px;"></i>Edit</button></a>
                                        <button class="btn btn-danger" type="button" onclick="showConfirmModal('{{ $application_data[$i]->id }}');"><i class="fa fa-trash-o" style="margin-right: 10px;"></i>Delete</button>
                                        @endif
                                      </td>
                                  </tr>
                            @endfor
                            </tbody>

                        </table>
                    </div>
                </div>

              </section>
            </div>
          </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
        <form id="deleteApplicationData_form" action="{{ URL::route('admin.maidapplication.deleteApplication') }}" method="post" role="form">
            <input type="hidden" id="applicationDataId" name="applicationDataId">
        </form>

      <!-- ShowToast -->
        <button type="button" class="btn btn-success" id="showtoast" style="display: none;">Show Toast</button>
      <!--main content end-->

      <!--Modal-->
        <a class="btn btn-danger" data-toggle="modal" href="#confirmModal" id="confirmButton" style="display: none;">Delete</a>
        <div class="modal fade " id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header" style="background-color: #D24E4E;">
                          <button type="button" class="close" id="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Warning</h4>
                      </div>
                      <div class="modal-body">

                          <b>Are you sure delete this data?</b>

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-danger" type="button" onclick="deleteApplicationData();">Delete</button>
                      </div>
                  </div>
              </div>
        </div>
      <!-- //end modal -->


    @stop

@stop

@section('custom-scripts')
    @include('js.admin.maidApplication');
@stop
