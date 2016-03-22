@extends('main')

@section('styles')

    <!-- Bootstrap core CSS -->
	{{ HTML::style('/assets/backend/css/bootstrap.min.css') }}
	{{ HTML::style('/assets/backend/css/bootstrap-reset.css') }}

	<!--external css-->
	{{ HTML::style('/assets/backend/font-awesome/css/font-awesome.css') }}
    {{ HTML::style('/assets/backend/data-tables/DT_bootstrap.css') }}

    <!--right slidebar-->
    {{ HTML::style('/assets/backend/css/slidebars.css') }}

    <!--Form Wizard-->
    {{ HTML::style('/assets/backend/css/jquery.steps.css') }}

    {{ HTML::style('/assets/backend/advanced-datatable/media/css/demo_page.css') }}
    {{ HTML::style('/assets/backend/advanced-datatable/media/css/demo_table.css') }}

    {{ HTML::style('/assets/backend/toastr-master/toastr.css') }}
    {{ HTML::style('/assets/backend/css/table-responsive.css') }}

    <!-- Custom styles for this template -->
    {{ HTML::style('/assets/backend/css/style.css') }}
    {{ HTML::style('/assets/backend/css/custom.css') }}

    {{ HTML::style('/assets/backend/css/style-responsive.css') }}

    {{ HTML::style('/assets/backend/css/datepicker.css') }}

@stop


@section('header')

    <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
            <div data-original-title="Toggle Navigation" data-placement="right" class="fa fa-bars tooltips"></div>
          </div>
          <!--logo start-->
          <a href="{{ URL::route('admin.admin.index') }}" class="logo" ><img alt="" src="/assets/backend/img/custom/left_banner.png" height="30"></a>
          <!--logo end-->
          <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
{{--
                          <img alt="" src="/assets/backend/img/avatar1_small.jpg">
--}}
                          <span class="username">{{ Session::get('user_name') }}</span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout">
                          <div class="log-arrow-up"></div>
                          <li><a href="{{ URL::route('admin.users.profile') }}"><i class=" fa fa-suitcase"></i>Profile</a></li>
{{--
                          <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                          <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
--}}
                          <li><a href="{{ URL::route('admin.admin.logout') }}"><i class="fa fa-key"></i>Log Out</a></li>
                      </ul>
                  </li>
                  <!-- user login dropdown end -->
              </ul>
          </div>
      </header>
      <!--header end-->
@stop

@section('body')
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                  <li>
                      <a href="{{ URL::route('admin.admin.index') }}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                @if(Session::get('user_group') == 1)
                  <li>
                      <a href="{{ URL::route('admin.agency.index') }}">
                          <i class="fa fa-users"></i>
                          <span>Agency Management</span>
                      </a>
                  </li>
                @endif
                  <li>
                      <a href="{{ URL::route('admin.maidapplication.application') }}">
                          <i class="fa fa-desktop"></i>
                          <span>Maid Application</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="{{ URL::route('admin.maids.editMaid') }}">
                          <i class="fa fa-briefcase"></i>
                          <span>Maids</span>
                      </a>
{{--
                      <ul class="sub">
                          <li><a  href="">Add Maid</a></li>
                      </ul>
--}}
                  </li>

                  <li class="sub-menu">
                      <a href="{{ URL::route('admin.employers.employer') }}" >
                          <i class="fa fa-suitcase"></i>
                          <span>Employers</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Suppliers</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{ URL::route('admin.suppliers.addSupplier') }}">Add Supplier</a></li>
                          <li><a  href="{{ URL::route('admin.suppliers.editSupplier') }}">Edit Supplier</a></li>
                      </ul>
                  </li>

                  <li>
                      <a href="{{ URL::route('admin.payment.payment') }}">
                          <i class="fa fa-usd"></i>
                          <span>Payment</span>
                      </a>
                  </li>

                  <li>
                      <a href="{{ URL::route('admin.refund.refund') }}">
                          <i class="fa fa-share-square-o"></i>
                          <span>Refund</span>
                      </a>
                  </li>

                  <li>
                      <a href="{{ URL::route('admin.reports.reports') }}">
                          <i class="fa fa-clipboard"></i>
                          <span>Reports</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Users</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{ URL::route('admin.users.addUser') }}">Add User</a></li>
                          <li><a  href="{{ URL::route('admin.users.editUser') }}">Edit User</a></li>
                          <li><a  href="{{ URL::route('admin.users.settingUser') }}">Setting</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-list"></i>
                          <span>Company Profile</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{ URL::route('admin.companyprofile.profileCompany') }}">Profile</a></li>
                          <li><a  href="{{ URL::route('admin.companyprofile.editCompany') }}">Edit Profile</a></li>
                      </ul>
                  </li>

                  <li>
                      <a href="{{ URL::route('admin.settings.settings') }}">
                          <i class="fa fa-cogs"></i>
                          <span>Settings</span>
                      </a>
                  </li>



              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

    @yield('content')

@stop

@section('footer')
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2015 &copy; InnoMaid Portal Site by Company.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
    </section>

@stop

@section('scripts')

    <!-- js placed at the end of the document so the pages load faster -->
    {{ HTML::script('/assets/backend/js/jquery.js') }}
    {{ HTML::script('/assets/backend/js/jquery-ui-1.9.2.custom.min.js') }}
    {{ HTML::script('/assets/backend/js/jquery-migrate-1.2.1.min.js') }}

    {{ HTML::script('/assets/backend/js/bootstrap.min.js') }}

    {{ HTML::script('/assets/backend/js/jquery.dcjqaccordion.2.7.js') }}

    {{ HTML::script('/assets/backend/js/jquery.scrollTo.min.js') }}
    {{ HTML::script('/assets/backend/js/jquery.nicescroll.js') }}

    {{ HTML::script('/assets/backend/data-tables/jquery.dataTables.js') }}
    {{ HTML::script('/assets/backend/data-tables/DT_bootstrap.js') }}

    {{ HTML::script('/assets/backend/js/respond.min.js') }}
    {{ HTML::script('/assets/backend/js/slidebars.min.js') }}
    {{ HTML::script('/assets/backend/js/common-scripts.js') }}

    {{ HTML::script('/assets/backend/js/editable-table.js') }}

    <!--Form Validation-->
    {{ HTML::script('/assets/backend/js/bootstrap-validator.min.js') }}

    <!--Form Wizard-->
    {{ HTML::script('/assets/backend/js/jquery.steps.min.js') }}
    {{ HTML::script('/assets/backend/js/jquery.validate.min.js') }}
    <!--script for this page-->
    {{ HTML::script('/assets/backend/js/jquery.stepy.js') }}

    {{ HTML::script('/assets/backend/advanced-datatable/media/js/jquery.dataTables.js') }}

    {{ HTML::script('/assets/backend/js/dynamic_table_init.js') }}

    {{ HTML::script('/assets/backend/toastr-master/toastr.js') }}

    {{ HTML::script('/assets/backend/jquery-knob/js/jquery.knob.js') }}

    {{ HTML::script('/assets/backend/js/bootstrap-switch.js') }}

    {{ HTML::script('/assets/backend/js/bootstrap-datepicker.js') }}

@stop