@extends('admin.layout')

    @section('content')
      <!--main content start-->

      <section id="main-content">
        <section class="wrapper">
          <!-- page start-->
          <div class="row">
            <div class="col-sm-12">
              <section class="panel">
                <header class="panel-heading">
                  <b>{{ $sub_path }} List</b>
                </header>
            <!-- Ajax Loading Image -->
            <div id="ajaxLoadingDiv" style="position: fixed; left: 50%; top: 50%; margin-left: -50px; margin-top: -50px; z-index: 9999; display: none;">
              <img width="100" height="100" src="/assets/backend/img/custom/ajax-loading1.gif">
            </div>
<!-- add button -->
            @if(Session::get('user_group') != 1)
            <div class="row"><div class="panel-heading" style="margin-left: 20px;"><a href="{{ URL::route('admin.employers.addEmployer') }}" class="btn btn-primary"><i class="fa fa-plus" style="margin-right: 15px;"></i>Add Employer Data</a></div></div>
            @endif
<!--//end -->
                <div class="panel-body">
                    <div class="adv-table">
                        <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                                  <tr>
                                      <th style="text-align: center;">Name</th>
                                      <th style="text-align: center;">NRIC</th>
                                      <th style="text-align: center;">Name of Company</th>
                                      <th style="text-align: center;">Action</th>
                                  </tr>
                            </thead>
                            <tbody>
                            @foreach($employerinforms_data as $item)
                                  <tr class="gradeX">
                                      <td style="text-align: center;">
                                            <b>{{ $item->first_name . ' ' . $item->last_name }}</b>
                                      </td>
                                      <td style="text-align: center;">
                                            <b>{{ $item->nric }}</b>
                                      </td>
                                      <td style="text-align: center;">
                                            <b>{{ $item->company_name }}</b>
                                      </td>
                                      <td style="text-align: center;">
                                        <a href="{{ URL::route('admin.employers.viewEmployer', $item->id) }}"><button class="btn btn-success" type="button"><i class="fa fa-file-text-o" style="margin-right: 10px;"></i>View</button></a>
                                        @if(Session::get('user_group') != 1)
                                        <a href="{{ URL::route('admin.employers.updateEmployer', $item->id) }}"><button class="btn btn-info" type="button"><i class="fa fa-pencil" style="margin-right: 10px;"></i>Edit</button></a>
                                        <button class="btn btn-danger" type="button" onclick="showConfirmModal('{{ $item->id }}');"><i class="fa fa-trash-o" style="margin-right: 10px;"></i>Delete</button>
                                        @endif
                                      </td>
                                  </tr>
                            @endforeach
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

        <form id="deleteEmployerData_form" action="{{ URL::route('admin.employers.deleteEmployer') }}" method="post" role="form">
            <input type="hidden" id="employerDataId" name="employerDataId">
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
                          <button class="btn btn-danger" type="button" onclick="deleteEmployerData();">Delete</button>
                      </div>
                  </div>
              </div>
        </div>
      <!-- //end modal -->


    @stop

@stop

@section('custom-scripts')
    @include('js.admin.editEmployer');
@stop
