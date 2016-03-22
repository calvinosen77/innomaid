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

         @if (isset($msg_duplicate))
	        @if ($msg_duplicate != '')
	            msg_title = 'Warning';
	            msg_content = '{{ $msg_duplicate }}';
                $('#showtoast').click();
	        @endif
	     @endif


      });

      $('#showtoast').click(function () {

          var shortCutFunction = 'error';
          var msg = msg_content;
          var title = msg_title;

          toastr.options = {
              closeButton: true,
              positionClass: 'toast-top-right',
              onclick: null
          };
          var $toast = toastr[shortCutFunction](msg, title);

      });

      function onUploadImage_logo() {
          $('#imageUpload_logo').click();
      }

      function readURL_logo(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#profileImg_logo').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
          }
      }

    $('[name=backButton]').click(function(){
        location.href = '{{ URL::route('admin.agency.index') }}';
    })

  </script>
