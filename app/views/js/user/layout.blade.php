<script type="text/javascript">
    var msg_title;
    var msg_content;
	$(document).ready(function() {

        @if (isset($msg_register))
	        @if ($msg_register != '')
	            msg_title = 'Message';
	            msg_content = '{{ $msg_register }}';
                $('#showtoast').click();

	        @endif
	    @endif

	    var currentPage = '{{ Session::get('currentPage') }}';

        $('#pagination' + currentPage).removeClass('disable_div');
        $('#pagination' + currentPage).addClass('enable_div');
        $('#lastPageNum').val(currentPage);

        if(currentPage != 1){
            $('#pagination1').removeClass('enable_div');
            $('#pagination1').addClass('disable_div');
        }
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

    $('#pagination-demo').twbsPagination({
    	totalPages: '{{ $total_page }}',
    	visiblePages: 5,
    	startPage: parseInt({{ $currentPage }}),
            onPageClick: function (event, page) {
                $.ajax({
                    url: "{{ URL::route('user.user.asyncCurrentPage') }}",
                    dataType : "json",
                    type : "POST",
                    data : {currentPage : page},
                    success : function(data) {
                        if (data.result == 'success') {

                            $('#pagination' + page).removeClass('disable_div');
                            $('#pagination' + page).addClass('enable_div');
                            var lastPageNum = $('#lastPageNum').val();
                            $('#pagination' + lastPageNum).removeClass('enable_div');
                            $('#pagination' + lastPageNum).addClass('disable_div');
                            $('#lastPageNum').val(page);

                        }
                    }
                });
            }

    });

</script>