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
      var msg_title;
      var msg_content;

      $(document).ready(function () {
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

          @if (isset($msg_register))
             @if ($msg_register != '')
                 msg_title = 'Message';
          msg_content = '{{ $msg_register }}';
          $('#showtoast').click();
          @endif
       @endif

    });

      $('#showtoast').click(function () {

          var shortCutFunction = 'warning';
          var msg = msg_content;
          var title = msg_title;

          toastr.options = {
              closeButton: true,
              positionClass: 'toast-top-right',
              onclick: null
          };
          var $toast = toastr[shortCutFunction](msg, title);

      });

      function add_new_row_family() {
            var id = $('#num_table_row_family').val();
            var updated_id = parseInt(id) + 1;
            $('#num_table_row_family').val(updated_id);
            var html_content = '<tr>' +
                               '  <td style="text-align: center;">' +
                               '      <input type="hidden" name="employerfamily_id' + id + '" value="0">' +
                               '      <input class="form-control" name="family_name' + id + '" type="text">' +
                               '  </td>' +
                               '  <td style="text-align: center;">' +
                               '      <input class="form-control" name="family_nric' + id + '" type="text">' +
                               '  </td>' +
                               '  <td style="text-align: center;">' +
                               '    <div class="row">' +
                               '        <div class="col-lg-3" style="padding-right: 0px;">' +
                               '          <select class="form-control" name="family_birthday_day' + id + '">';
                                             for(var i=1;i<=31;i++){
            html_content +=    '             <option value="' + i +'">' + i + '</option>';
                                             }
            html_content +=    '          </select>' +
                               '        </div>' +
                               '        <div class="col-lg-1"><label class="subtitle_text">/</label></div>' +
                               '        <div class="col-lg-3" style="padding-right: 0px;">' +
                               '          <select class="form-control" name="family_birthday_month' + id +'">';
                                             var monthArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                                             for(var i=1;i<=12;i++){
            html_content +=    '             <option value="' + i + '">' + monthArray[i-1] + '</option>';
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
        location.href = '{{ URL::route('admin.employers.employer') }}';
    })

    function spouseformOnoff(status){
        if(status != 'Single'){
            $('#spouse_div').css('display', 'block');
            $('#marriageDiv').css('display', 'block');
            $('#spouse_assessment1').css('display', 'block');
            $('#spouse_assessment2').css('display', 'block');
        }else{
            $('#spouse_div').css('display', 'none');
            $('#marriageDiv').css('display', 'none');
            $('#spouse_assessment1').css('display', 'none');
            $('#spouse_assessment2').css('display', 'none');
        }
    }
  </script>
