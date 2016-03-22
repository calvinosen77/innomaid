  <script>

      //knob
      $(".knob").knob();

      var msg_title;
      var msg_content;

      $(document).ready(function () {

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

      function onUploadImage_company() {
          $('#imageUpload_company').click();
      }

      function readURL_company(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#profileImg_company').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
          }
      }

  </script>
