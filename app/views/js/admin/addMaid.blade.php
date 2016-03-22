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

       $('.datepicker').datepicker({
          weekStart: 1,
          autoclose: true,
          todayHighlight: true,
          format: 'yyyy-mm-dd',
       });

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

      function add_new_row() {
            var id = $('#num_table_row').val();
            var updated_id = parseInt(id) + 1;
            $('#num_table_row').val(updated_id);
            var html_content = '<tr>' +
                               '    <td style="text-align: center;">' +
                               '        <input name="maidemployment_id' + id  + '" type="hidden" value="0">' +
                               '        <input class="form-control datepicker" name="date_from' + id +'">' +
                               '    </td>' +
                               '    <td style="text-align: center;">' +
                               '        <input class="form-control datepicker" name="date_to' + id +'">' +
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

            $('.datepicker').datepicker({
              weekStart: 1,
              autoclose: true,
              todayHighlight: true,
              format: 'yyyy-mm-dd',
            });

      }

      function add_new_row_singapore() {
            var id = $('#num_table_row_singapore').val();
            var updated_id = parseInt(id) + 1;
            $('#num_table_row_singapore').val(updated_id);
            var html_content = '<tr>' +
                               '    <td style="text-align: center;">' +
                               '        <input name="maidemployment_singapore_id' + id  + '" type="hidden" value="0">' +
                               '        <input class="form-control" name="employer_singapore' + id + '" type="text">' +
                               '    </td>' +
                               '    <td>' +
                               '        <textarea class="form-control" name="feedback' + id + '"></textarea>' +
                               '    </td>' +
                               '</tr>';

            $('#insert_row_singapore').append(html_content);
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
        location.href = '{{ URL::route('admin.maids.editMaid') }}';
    })

  </script>
