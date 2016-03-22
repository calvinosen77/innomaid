  <script>

      //step wizard

      $(function() {
          $('#default').stepy({
              backLabel: 'Previous',
              block: true,
              nextLabel: 'Next',
              titleClick: true,
              titleTarget: '.stepy-tab'
          });
      });
  </script>

  <script type="text/javascript">
      $(document).ready(function () {
           calc_fee();
           calc_fee_replacement();
           calc_fee_other();
           $('input[type=text]').attr('disabled', true);
           $('input[type=number]').attr('disabled', true);
           $('select').attr('disabled', true);
           $('input[type=button][value="Add New"]').css('display', 'none');

//initial numbers
          var type = '{{ $applicationitem_data->purpose }}';
          if(type == 'Replacement'){
              var numList = $('[name="replacement_list_title"]').length;
              for(var i=0;i<numList;i++){
                  $('[name="replacement_list_title"]').eq(i).empty();
                  $('[name="replacement_list_title"]').eq(i).append(i+1);
              }
          }else{
              var numList = $('[name="list_title"]').length;
              for(var i=0;i<numList;i++){
                  $('[name="list_title"]').eq(i).empty();
                  $('[name="list_title"]').eq(i).append(i+1);
              }
          }
//end

          var employer_id = '{{ $applicationitem_data->employer_id }}';
          getEmployerData(employer_id);
          var form = $("#wizard-validation-form");
          form.validate({
              errorPlacement: function errorPlacement(error, element) {
                  element.after(error);
              }
          });
          form.children("div").steps({
              headerTag: "h3",
              bodyTag: "section",
              transitionEffect: "slideLeft",
              onStepChanging: function (event, currentIndex, newIndex) {
                  form.validate().settings.ignore = ":disabled,:hidden";
                  if(form.valid() == true){
                    if(newIndex == 1){
                       calc_fee();
                       calc_fee_replacement();
                       calc_fee_other();
                    }
                    if(newIndex == 0) $('#wrap_selectEmployer').css('display','block');
                    else $('#wrap_selectEmployer').css('display','none');
                  }
                  return form.valid();
              },
              onFinishing: function (event, currentIndex) {
                  form.validate().settings.ignore = ":disabled";
                  return form.valid();
              },
              onFinished: function (event, currentIndex) {
//                  alert("Submitted!");
                  $('#ajaxLoadingDiv').css('display','block');
                  form.submit();
              }
          });


      });

      function add_new_row() {
            var id = $('#num_table_row').val();
            var updated_id = parseInt(id) + 1;
            $('#num_table_row').val(updated_id);
            var html_content = '<tr>' +
                               '    <td style="text-align: center;">' +
                               '        <input class="form-control" name="date_from' + id +'" type="date">' +
                               '    </td>' +
                               '    <td style="text-align: center;">' +
                               '        <input class="form-control" name="date_to' + id +'" type="date">' +
                               '    </td>' +
                               '    <td style="text-align: center;">' +
                               '        <input class="form-control" name="country' + id +'" type="text">' +
                               '    </td>' +
                               '    <td style="text-align: center;">' +
                               '        <input class="form-control" name="employer' + id +'" type="text">' +
                               '    </td>' +
                               '    <td style="text-align: center;">' +
                               '        <textarea class="form-control" name="work_duty' + id +'"></textarea>' +
                               '    </td>' +
                               '    <td style="text-align: center;">' +
                               '        <textarea class="form-control" name="remarks' + id +'"></textarea>' +
                               '    </td>' +
                               '</tr>';
            $('#insert_row').append(html_content);
      }

      function add_new_row_family() {
            var id = $('#num_table_row_family').val();
            var updated_id = parseInt(id) + 1;
            $('#num_table_row_family').val(updated_id);
            var html_content = '<tr>' +
                               '  <td style="text-align: center;">' +
                               '      <input class="form-control" name="family_name' + id + '" type="text">' +
                               '  </td>' +
                               '  <td style="text-align: center;">' +
                               '      <input class="form-control" name="family_nric' + id + '" type="text">' +
                               '  </td>' +
                               '  <td style="text-align: center;">' +
                               '    <div class="row">' +
                               '        <div class="col-lg-3">' +
                               '          <select class="form-control" name="family_birthday_day' + id + '">';
                                             for(var i=1;i<=31;i++){
            html_content +=    '             <option value="' + i +'">' + i + '</option>';
                                             }
            html_content +=    '          </select>' +
                               '        </div>' +
                               '        <div class="col-lg-1"><label class="subtitle_text">/</label></div>' +
                               '        <div class="col-lg-3">' +
                               '          <select class="form-control" name="family_birthday_month' + id +'">';
                                             for(var i=1;i<=12;i++){
            html_content +=    '             <option value="' + i + '">' + i + '</option>';
                                             }
            html_content +=    '          </select>' +
                               '        </div>' +
                               '        <div class="col-lg-1"><label class="subtitle_text">/</label></div>' +
                               '        <div class="col-lg-4">' +
                               '          <select class="form-control" name="family_birthday_year' + id + '">';
                                             for(var i=1950;i<=2010;i++){
            html_content +=    '             <option value="' + i + '">' + i + '</option>';
                                             }
            html_content +=    '          </select>' +
                               '        </div>' +
                               '    </div>' +
                               '  </td>' +
                               '  <td style="text-align: center;">' +
                               '    <select class="form-control" name="relationship' + id + '">' +
                               '          <option value="Father">Father</option>' +
                               '          <option value="Mother">Mother</option>' +
                               '          <option value="Others">Others</option>' +
                               '      </select>' +
                               '  </td>' +
                               '</tr>';
            $('#insert_row_family').append(html_content);
      }

      function add_new_row_replacement() {
            var id = $('#num_table_row_replacement').val();
            var updated_id = parseInt(id) + 1;
            $('#num_table_row_replacement').val(updated_id);
            var html_content = '<tr>' +
                               '     <td style="text-align: center;">' +
                               '          <input class="form-control" name="new_price_cos_first' + id + '" type="number">' +
                               '          <input name="costreplacement_id' + id + '" type="hidden" value="0">' +
                               '      </td>' +
                               '      <td style="text-align: center;">' +
                               '          <label class="control-label">replacement within</label>' +
                               '      </td>' +
                               '      <td style="text-align: center;">' +
                               '          <input class="form-control" name="new_price_cos_second' + id + '" type="number">' +
                               '      </td>' +
                               '      <td style="text-align: center;">' +
                               '          <label class="control-label">months </label>' +
                               '      </td>' +
                               '      <td style="text-align: center;">' +
                               '          <input class="form-control" name="new_price_cos_third' + id +'" type="number" placeholder="$">' +
                               '      </td>' +
                               '</tr>';
            $('#insert_row_replacement').append(html_content);
      }

      function add_new_row_other() {
            var id = $('#num_table_row_other').val();
            var updated_id = parseInt(id) + 1;
            $('#num_table_row_other').val(updated_id);
            var html_content = '<tr>' +
                               '    <td style="text-align: center;" width="70%">' +
                               '        <input class="form-control" name="new_price_other_title' + id + '" type="text">' +
                               '        <input name="otherservices_id' + id + '" type="hidden" value="0">' +
                               '    </td>' +
                               '    <td style="text-align: center;">' +
                               '        <input class="form-control calc_item" name="new_price_other_price' + id + '" type="number" placeholder="$" onchange="calc_fee();">' +
                               '    </td>' +
                               '</tr>';

            $('#insert_row_other').append(html_content);
      }

      function add_new_row_other_replacement() {
            var id = $('#replacement_num_table_row_other').val();
            var updated_id = parseInt(id) + 1;
            $('#replacement_num_table_row_other').val(updated_id);
            var html_content = '<tr>' +
                               '    <td style="text-align: center;" width="70%">' +
                               '        <input class="form-control" name="replacement_price_other_title' + id + '" type="text">' +
                               '        <input name="replacement_otherservices_id' + id + '" type="hidden" value="0">' +
                               '    </td>' +
                               '    <td style="text-align: center;">' +
                               '        <input class="form-control calc_item_replacement" name="replacement_price_other_price' + id + '" type="number" placeholder="$" onchange="calc_fee_replacement();">' +
                               '    </td>' +
                               '</tr>';

            $('#insert_row_other_replacement').append(html_content);
      }

      function add_new_row_payment() {
            var id = $('#num_table_row_payment').val();
            var updated_id = parseInt(id) + 1;
            $('#num_table_row_payment').val(updated_id);
            var html_content = '<tr>' +
                               '  <td style="text-align: center;">' +
                               '     <input class="form-control" name="new_price_pay_first' + id + '" type="number">' +
                               '     <input name="placementfee_id' + id + '" type="hidden" value="0">' +
                               '  </td>' +
                               '  <td style="text-align: center;">' +
                               '     <label class="control-label">post-dated cheques of</label>' +
                               '  </td>' +
                               '  <td style="text-align: center;">' +
                               '     <input class="form-control" name="new_price_pay_second' + id + '" type="number" placeholder="$">' +
                               '  </td>' +
                               '  <td style="text-align: center;">' +
                               '    <label class="control-label">each</label>' +
                               '  </td>' +
                               '</tr>';

            $('#insert_row_payment').append(html_content);
      }

      function add_new_row_payment_replacement() {
            var id = $('#replacement_num_table_row_payment').val();
            var updated_id = parseInt(id) + 1;
            $('#replacement_num_table_row_payment').val(updated_id);
            var html_content = '<tr>' +
                               '  <td style="text-align: center;">' +
                               '     <input class="form-control" name="replacement_price_pay_first' + id + '" type="number">' +
                               '     <input name="replacement_placementfee_id' + id + '" type="hidden" value="0">' +
                               '  </td>' +
                               '  <td style="text-align: center;">' +
                               '     <label class="control-label">post-dated cheques of</label>' +
                               '  </td>' +
                               '  <td style="text-align: center;">' +
                               '     <input class="form-control" name="replacement_price_pay_second' + id + '" type="number" placeholder="$">' +
                               '  </td>' +
                               '  <td style="text-align: center;">' +
                               '    <label class="control-label">each</label>' +
                               '  </td>' +
                               '</tr>';

            $('#insert_row_payment_replacement').append(html_content);
      }

      function onUploadImage_profile() {
          $('#imageUpload_profile').click();
      }

      function onUploadImage_full() {
          $('#imageUpload_full').click();
      }

      function readURL_profile(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#profileImg_profile').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
          }
      }

      function readURL_full(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#profileImg_full').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
          }
      }

    $('[name=backButton]').click(function(){
        location.href = '{{ URL::route('admin.maidapplication.application') }}';
    })

    function getEmployerData(id){

        $.ajax({
            url: "{{ URL::route('admin.maidapplication.getEmployerData') }}",
            dataType : "json",
            type : "POST",
            data : {id : id},
            success : function(data) {
                if (data.result == 'success') {
//                    msg_title = 'Message';
//                    msg_content = 'Maid data has been deleted successfully!';
//                    $('#showtoast').click();
//                    location.reload();
//                    $('#ajaxLoadingDiv').css('display','none');
                    var employeritem_data = data.employeritem_data;
                    var employerfamily_data = data.employerfamily_data;
                    var num_family = data.num_family;
                    if(employeritem_data == null){
                        employeritem_data = [];
                        employerfamily_data = [];
                        num_family = 0;
                    }
                    $('[name=salutation]').val(employeritem_data['salutation']);
                    $('[name=first_name]').val(employeritem_data['first_name']);
                    $('[name=last_name]').val(employeritem_data['last_name']);
                    $('[name=employer_passport_no]').val(employeritem_data['employer_passport_no']);
                    $('[name=nric]').val(employeritem_data['nric']);
                    $('[name=birthday_day]').val(employeritem_data['birthday_day']);
                    $('[name=birthday_month]').val(employeritem_data['birthday_month']);
                    $('[name=birthday_year]').val(employeritem_data['birthday_year']);
                    $('[name=address]').val(employeritem_data['address']);
                    $('[name=marital_status]').val(employeritem_data['marital_status']);
                    $('[name=residence_type]').val(employeritem_data['residence_type']);
                    $('[name=marriage_registered_status][value=' + employeritem_data['marriage_registered_status'] + ']').prop('checked', true);
                    $('[name=citizenship]').val(employeritem_data['citizenship']);
                    $('[name=phone_number]').val(employeritem_data['phone_number']);
                    $('[name=home_number]').val(employeritem_data['home_number']);
                    $('[name=office_phone_number]').val(employeritem_data['office_phone_number']);
                    $('[name=occupation]').val(employeritem_data['occupation']);
                    $('[name=company_name]').val(employeritem_data['company_name']);

                    $('[name=spouse_salutation]').val(employeritem_data['spouse_salutation']);
                    $('[name=spouse_first_name]').val(employeritem_data['spouse_first_name']);
                    $('[name=spouse_last_name]').val(employeritem_data['spouse_last_name']);
                    $('[name=spouse_passport_no]').val(employeritem_data['spouse_passport_no']);
                    $('[name=spouse_nric]').val(employeritem_data['spouse_nric']);
                    $('[name=spouse_birthday_day]').val(employeritem_data['spouse_birthday_day']);
                    $('[name=spouse_birthday_month]').val(employeritem_data['spouse_birthday_month']);
                    $('[name=spouse_birthday_year]').val(employeritem_data['spouse_birthday_year']);
                    $('[name=spouse_relationship][value=' + employeritem_data['spouse_relationship'] + ']').prop('checked', true);
                    $('[name=spouse_citizenship]').val(employeritem_data['spouse_citizenship']);
                    $('[name=spouse_phone_number]').val(employeritem_data['spouse_phone_number']);
                    $('[name=spouse_home_number]').val(employeritem_data['spouse_home_number']);
                    $('[name=spouse_office_phone_number]').val(employeritem_data['spouse_office_phone_number']);
                    $('[name=spouse_occupation]').val(employeritem_data['spouse_occupation']);
                    $('[name=spouse_company_name]').val(employeritem_data['spouse_company_name']);

                    $('[name=employer_year_assessment1]').val(employeritem_data['employer_year_assessment1']);
                    $('[name=employer_annual_income1]').val(employeritem_data['employer_annual_income1']);
                    $('[name=employer_year_assessment2]').val(employeritem_data['employer_year_assessment2']);
                    $('[name=employer_annual_income2]').val(employeritem_data['employer_annual_income2']);
                    $('[name=spouse_year_assessment1]').val(employeritem_data['spouse_year_assessment1']);
                    $('[name=spouse_annual_income1]').val(employeritem_data['spouse_annual_income1']);
                    $('[name=spouse_year_assessment2]').val(employeritem_data['spouse_year_assessment2']);
                    $('[name=spouse_annual_income2]').val(employeritem_data['spouse_annual_income2']);

                    $('[name=combined_income]').val(employeritem_data['combined_income']);

                    if(employeritem_data['marital_status'] == 'Single'){
                        $('#maritalDiv').css('display', 'none');
                    }else{
                        $('#maritalDiv').css('display', 'block');
                    }

                    if(employeritem_data['marital_status'] != 'Single'){
                        $('#spouse_div').css('display', 'block');
                        $('#spouse_line').css('display', 'block');
                        $('#spouse_assessment1').css('display', 'block');
                        $('#spouse_assessment2').css('display', 'block');
                    }else{
                        $('#spouse_div').css('display', 'none');
                        $('#spouse_line').css('display', 'none');
                        $('#spouse_assessment1').css('display', 'none');
                        $('#spouse_assessment2').css('display', 'none');
                    }

                    var html_content = '';
                    $('#insert_row_family').empty();
                    var monthArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                    for(var k=0;k<num_family;k++){
                            html_content = '<tr>' +
                                           '    <td style="text-align: center;">' +
                                           '        <input class="form-control" type="text" readonly value="' + employerfamily_data[k]['name'] +'">' +
                                           '    </td>' +
                                           '    <td style="text-align: center;">' +
                                           '        <input class="form-control" type="text" readonly value="' + employerfamily_data[k]['nric'] + '">' +
                                           '    </td>' +
                                           '    <td style="text-align: center;">' +
                                           '        <div class="row">' +
                                           '            <div class="col-lg-3" style="padding-right: 0px;">' +
                                           '                <input class="form-control" type="text" readonly value="' + employerfamily_data[k]['birthday_day'] +'">' +
                                           '            </div>' +
                                           '            <div class="col-lg-1"><label class="subtitle_text">/</label></div>' +
                                           '            <div class="col-lg-3" style="padding-right: 0px;">' +
                                           '                 <input class="form-control" type="text" readonly value="' + monthArray[employerfamily_data[k]['birthday_month'] - 1] + '">' +
                                           '             </div>' +
                                           '             <div class="col-lg-1"><label class="subtitle_text">/</label></div>' +
                                           '             <div class="col-lg-4">' +
                                           '                <input class="form-control" type="text" readonly value="' + employerfamily_data[k]['birthday_year'] + '">' +
                                           '             </div>' +
                                           '        </div>' +
                                           '    </td>' +
                                           '    <td style="text-align: center;">' +
                                           '        <input class="form-control" type="text" readonly value="' + employerfamily_data[k]['relationship'] + '">' +
                                           '    </td>' +
                                           '</tr>';

                                            $('#insert_row_family').append(html_content);
                    }


                }
            }
        });
    }

        function calc_fee(){
            var num_other = parseFloat($('[name=num_table_row_other]').val());
            var total_num = 9 + num_other;
            var sum_fee = 0;
            var item = 0;
            for(var i=0;i<total_num;i++){
               item = parseFloat($('.calc_item').eq(i).val());
                if(!isNaN(item)) sum_fee += item;
            }
            var conv_val = sum_fee.toFixed(2);
            $('[name=calc_sum]').val(conv_val);
        }

        function calc_fee_other(){
            var total_num = 3;
            var sum_fee = 0;
            var item = 0;
            for(var i=0;i<total_num;i++){
               item = parseFloat($('.calc_item_other').eq(i).val());
                if(!isNaN(item)) sum_fee += item;
            }
            var conv_val = sum_fee.toFixed(2);
            $('[name=calc_sum_other]').val(conv_val);

        }

        function calc_fee_replacement(){
            var num_other = parseFloat($('[name=replacement_num_table_row_other]').val());
            var total_num = 9 + num_other;
            var sum_fee = 0;
            var item = 0;
            for(var i=0;i<total_num;i++){
               item = parseFloat($('.calc_item_replacement').eq(i).val());
                if(!isNaN(item)) sum_fee += item;
            }
            var conv_val = sum_fee.toFixed(2);
            $('[name=replacement_calc_sum]').val(conv_val);

        }

        function changeServiceForm(type){
            if(type == 'New' || type == 'Add'){
                $('#new_maid').css('display', 'block');
                $('#replacement_maid').css('display', 'none');
            }else{
                $('#new_maid').css('display', 'none');
                $('#replacement_maid').css('display', 'block');
            }
        }


  </script>
