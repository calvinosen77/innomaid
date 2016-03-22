@extends('main')

@section('styles')

    <!-- Bootstrap core CSS -->
	{{ HTML::style('/assets/frontend/css/bootstrap.min.css') }}
	{{ HTML::style('/assets/frontend/css/theme.css') }}
	{{ HTML::style('/assets/frontend/css/bootstrap-reset.css') }}
	<!--external css-->
	{{ HTML::style('/assets/frontend/font-awesome/css/font-awesome.css') }}
	{{ HTML::style('/assets/frontend/css/flexslider.css') }}
	{{ HTML::style('/assets/frontend/bxslider/jquery.bxslider.css') }}
    <!-- Custom styles for this template -->
    {{ HTML::style('/assets/frontend/css/style.css') }}
    {{ HTML::style('/assets/frontend/css/style-responsive.css') }}

    {{ HTML::style('/assets/frontend/css/custom.css') }}
    {{ HTML::style('/assets/frontend/css/bootstrap-dialog.min.css') }}

@stop

@section('custom-styles')

    <!--right slidebar-->
    {{ HTML::style('/assets/frontend/css/slidebars.css') }}
    <!--toastr-->
    {{ HTML::style('/assets/frontend/css/toastr.css') }}

@stop

@section('header')

  <body style="background-color: #eef3fa;">
    <!--container start-->
    <div class="container">
        <div class="row"  style="background-color: #ffffff;">

@stop

@section('body')
            <div class="col-lg-3">
                <div class="align_center">
                    <div class="margin_top_40"></div>
                        <a href="{{ URL::route('user.user.index') }}"><img src="/assets/frontend/img/custom/left_banner.png" height="48px"></a>
                        <img src="/assets/frontend/img/custom/left_banner_title.png" height="16px">

                        <form class="navbar-form" role="search" id="side_search">
                            <div class="input-group margin_top_20">
                                <input type="text" class="form-control radius_left_15" placeholder="Search ..." name="search_keyword" value="">
                                <div class="input-group-btn">
                                    <button class="btn btn-default radius_right_15" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </form>
                </div>
                <div class="blog-side-item margin_top_40">
                    <div class="left_side_mark_red"></div>
                    <div class="category">
                        <a href="{{ URL::route('user.user.index') }}"><h4 class="category_title">Home</h4></a>
                        <h4 class="category_title no_hover">Search Maid</h4>
                        <ul class="list-unstyled">
                            <li><a href="{{ URL::route('user.maidfilter.allGetMaid') }}"><i class="  fa fa-angle-right"></i> Show All Bio Data</a></li>
                            <li><a href="{{ URL::route('user.maidfilter.countryGetMaid', 'Filipin') }}"><i class="  fa fa-angle-right"></i> Filipino Maid</a></li>
                            <li><a href="{{ URL::route('user.maidfilter.countryGetMaid', 'Myanmarese') }}"><i class="  fa fa-angle-right"></i> Myanmarese Maid</a></li>
                            <li><a href="{{ URL::route('user.maidfilter.countryGetMaid', 'Indian') }}"><i class="  fa fa-angle-right"></i> Indian Maid</a></li>
                            <li><a href="{{ URL::route('user.maidfilter.countryGetMaid', 'Bangladeshi') }}"><i class="  fa fa-angle-right"></i> Bangladeshi Maid</a></li>
                            <li><a href="{{ URL::route('user.maidfilter.countryGetMaid', 'SriLankan') }}"><i class="  fa fa-angle-right"></i> Sri Lankan Maid</a></li>
                            <li><a href="{{ URL::route('user.maidfilter.agencyGetMaid', 'Fresh') }}"><i class="  fa fa-angle-right"></i> Fresh Maid</a></li>
                            <li><a href="{{ URL::route('user.maidfilter.agencyGetMaid', 'Transfer') }}"><i class="  fa fa-angle-right"></i> Transfer Maid</a></li>
                            <li><a href="{{ URL::route('user.maidfilter.agencyGetMaid', 'Ex-Singapore') }}"><i class="  fa fa-angle-right"></i> Ex-Singapore Maid</a></li>
                            <li><a href="{{ URL::route('user.maidfilter.agencyGetMaid', 'Experienced') }}"><i class="  fa fa-angle-right"></i> Experienced Maid</a></li>
                        </ul>
                        <a href="#"><h4 class="category_title">Maid Agency</h4></a>
                        <a href="#"><h4 class="category_title">F&Q</h4></a>
                        <a href="#"><h4 class="category_title">Useful Links</h4></a>
                        <a href="#"><h4 class="category_title">Request Maid</h4></a>
                        <a href="#"><h4 class="category_title">My Shortlisted(3)</h4></a>
                        <a href="#"><h4 class="category_title">My Compare List</h4></a>
                    </div>
                    <div class="left_side_mark_red margin_top_40 margin_bottom_40"></div>

                </div>

            </div>
            <!--//end side bar-->
    @yield('content')

@stop

@section('footer')
            </div>
        </div>
        <!--footer start-->
        <div class="row" style="height: 50px; background-color: #2b2b2b;">
            <div class="col-lg-3 col-md-3 col-sm-3">
            </div>
            <div class="col-lg-5 col-md-3 col-sm-5">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-lg-offset-1">
            </div>
        </div>
        <!--//footer-->
    </div>
    <!--container end-->

@stop

@section('scripts')

    <!-- js placed at the end of the document so the pages load faster -->
    {{ HTML::script('/assets/frontend/js/jquery.js') }}
    {{ HTML::script('/assets/frontend/js/bootstrap.min.js') }}

    {{ HTML::script('/assets/frontend/js/hover-dropdown.js') }}
    {{ HTML::script('/assets/frontend/js/jquery.flexslider.js') }}
    {{ HTML::script('/assets/frontend/bxslider/jquery.bxslider.js') }}
    {{ HTML::script('/assets/frontend/js/link-hover.js') }}

    {{ HTML::script('/assets/frontend/js/common-scripts.js') }}

    {{ HTML::script('/assets/frontend/js/bootstrap-dialog.min.js') }}

    <!--toastr-->
    {{ HTML::script('/assets/frontend/js/toastr.js') }}

    {{ HTML::script('/assets/frontend/js/jquery.min.js') }}
    {{ HTML::script('/assets/frontend/js/jquery.twbsPagination.js') }}

    {{ HTML::script('/assets/frontend/js/jquery.easing.min.js') }}


@stop