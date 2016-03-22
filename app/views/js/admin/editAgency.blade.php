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
                  alert("Submitted!");
              }
          });

         @if (isset($msg_email))
	        @if ($msg_email != '')
	            msg_title = 'Notification';
	            msg_content = '{{ $msg_email }}';
                $('#other_showtoast').click();
	        @endif
	     @endif

         @if (isset($msg_register))
	        @if ($msg_register != '')
	            msg_title = 'Message';
	            msg_content = '{{ $msg_register }}';
                $('#showtoast').click();
	        @endif
	     @endif

      });

      $('#other_showtoast').click(function () {

          var shortCutFunction = 'info';
          var msg = msg_content;
          var title = msg_title;

          toastr.options = {
              closeButton: true,
              positionClass: 'toast-top-right',
              onclick: null
          };
          var $toast = toastr[shortCutFunction](msg, title);

      });

      $('#showtoast').click(function () {

          var shortCutFunction = 'success';
          var msg = msg_content;
          var title = msg_title;

          toastr.options = {
              closeButton: true,
              positionClass: 'toast-top-right',
              onclick: null
          };
          var $toast = toastr[shortCutFunction](msg, title);

      });

      function showConfirmModal(id){
        $('#agencyDataId').val(id);

        $('#confirmButton').click();
      }
      function deleteAgencyData(){
            var agency_id = $('#agencyDataId').val();
            $('#ajaxLoadingDiv').css('display','block');
            $('#close').click();
            $('#deleteAgencyData_form').submit();
/*
            $.ajax({
                url: "{{ URL::route('admin.employers.deleteEmployer') }}",
                dataType : "json",
                type : "POST",
                data : {maid_id : maid_id},
                success : function(data) {
                    if (data.result == 'success') {
	                    msg_title = 'Message';
	                    msg_content = 'Maid data has been deleted successfully!';
                        $('#showtoast').click();
                        location.reload();
                        $('#ajaxLoadingDiv').css('display','none');
                    }
                }
            });
*/
      }
  </script>
