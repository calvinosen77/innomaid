<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keyword" content="innomaid, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/favicon.png">

    <title>
        @section('title')
            {{ SITE_NAME . $title }}
        @show
    </title>


    @yield('styles')


    @yield('custom-styles')
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    {{ HTML::script('/assets/js/html5shiv.js') }}
    {{ HTML::script('/assets/js/respond.min.js') }}
    <![endif]-->

</head>
<body>    
    @yield('header')
    
    @yield('body')
    
    @yield('footer')
</body>


    @yield('header-scripts')

    @yield('scripts')

    @yield('custom-scripts')

</html>
