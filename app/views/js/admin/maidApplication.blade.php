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

         @if (isset($msg_register))
	        @if ($msg_register != '')
	            msg_title = 'Message';
	            msg_content = '{{ $msg_register }}';
                $('#showtoast').click();
	        @endif
	     @endif

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
        $('#applicationDataId').val(id);

        $('#confirmButton').click();
      }
      function deleteApplicationData(){
            var application_id = $('#applicationDataId').val();
            $('#ajaxLoadingDiv').css('display','block');
            $('#close').click();
            $('#deleteApplicationData_form').submit();
/*
            $.ajax({
                url: "{{ URL::route('admin.maidapplication.deleteApplication') }}",
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

      function listBoxOnoff(id){
        var flag = $('#listBox' + id).css('display');
        if(flag == 'none'){
            $('#listBox' + id).css('display', 'block');
        }else{
            $('#listBox' + id).css('display', 'none');
        }
      }

/*
     function listBoxOff(id){
        $('#listBox' + id).css('display', 'none');
     }
*/

  </script>
