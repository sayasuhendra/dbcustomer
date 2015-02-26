<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js" ng-app>
<!--<![endif]-->
<head>
<meta charset="utf-8"/>
<title>@yield('meta-title', 'Aplikasi CRM PT. SBP')</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
    @include('layouts/assets')
    @yield('atas')
</head>

<body class="page-header-fixed page-quick-sidebar-over-content page-style-square">
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner">
        <div class="page-logo">
            <a href="index.html">
            <img src="{{ asset('assets/images/sbpputih.png') }}" alt="logo" class="logo-default"/>
            </a>
            <div class="menu-toggler sidebar-toggler hide">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                {{-- @include('layouts/admin/notif') --}}
                {{-- @include('layouts/admin/inbox') --}}
                {{-- @include('layouts/admin/todo') --}}
                @include('layouts/admin/user')
                {{-- @include('layouts/admin/right') --}}
            </ul>
        </div>
    </div>
</div>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="500">
                <li class="sidebar-toggler-wrapper">
                    <div class="sidebar-toggler">
                    </div>
                </li>
                {{-- @include('layouts/admin/search') --}}
                <br>
                @include('layouts/admin/menu')


            </ul>
        </div>
    </div>
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            {{-- @include('layouts/admin/content/config') --}}

            <!-- BEGIN PAGE HEADER-->
            {{--
            <h3 class="page-title">
                @yield('page-title', 'Customer Relationship Management')
            <small>@yield('subpage-title', 'we give you solutions')</small>
            </h3>
            <hr>
            <div class="page-bar">
                 
                <ul class="page-breadcrumb">
                    @yield('page-breadcrumb')
                </ul>
                --}}
                {{--
                <div class="page-toolbar">
                    <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height grey-salt" data-placement="top" data-original-title="Change dashboard date range">
                        <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
                    </div>
                </div>
                 
            </div>

            <!-- END PAGE HEADER-->
            @yield('dashboard')
            --}}
            <div class="row">
            <div class="col-md-12 blog-page">
                @yield('main')
            </div>
            </div>


            {{-- <div class="clearfix">
            </div> --}}
            {{-- @include('layouts/admin/content/graph') --}}
            {{-- @include('layouts/admin/content/recent') --}}
            {{-- @include('layouts/admin/content/stats') --}}
            {{-- @include('layouts/admin/content/graphsm') --}}
            {{-- <div class="row ">
                @include('layouts/admin/content/maps')
                @include('layouts/admin/content/feeds')
            </div>
            <div class="clearfix"> 
            </div> --}}

            {{-- <div class="row ">
                @include('layouts/admin/content/calendar')
                @include('layouts/admin/content/chats')

            </div> --}}
        </div>
    </div>
    <!-- END CONTENT -->
    {{-- @include('layouts/admin/quicksidebar') --}}

</div>
<!-- END CONTAINER -->
@include('layouts/footer')

@include('layouts/script')

@yield('script')

</body>
<!-- END BODY -->
</html>