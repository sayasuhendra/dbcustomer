<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="{{asset('global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="{{asset('global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('global/plugins/jqvmap/jqvmap/jqvmap.css')}}" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="{{asset('pages/css/tasks.css')}}" rel="stylesheet" type="text/css"/>

<link rel="stylesheet" type="text/css" href="{{asset('global/plugins/select2/select2.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>

<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
<link href="{{asset('global/css/components.css')}}" id="style_components" rel="stylesheet" type="text/css"/>
<link href="{{asset('global/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('layout/css/layout.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('layout/css/themes/darkblue.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
<link href="{{asset('layout/css/custom.css')}}" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->

<!-- BEGIN OLD ASSETS -->

<!-- <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet"> -->
<link href="{{asset('assets/datatables/dataTables.bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('assets/datatables/TableTools/css/dataTables.tableTools.min.css')}}" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="{{asset('assets/css/navbar-fixed-top.css')}}" rel="stylesheet">
<!-- <link href="{{asset('assets/css/material.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/ripples.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/material-wfont.min.css')}}" rel="stylesheet"> -->
<link href="{{asset('assets/fontawesome/css/font-awesome.min.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('assets/select2/select2.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('assets/select2/select2-bootstrap.css')}}"/>

<style type="text/css">
    .page-header.navbar .page-logo .logo-default {
        margin-top: 0;
    }
    body {
        min-height: 200px;

    }
    dl dd {
              border-bottom: 1px dashed #eeeeee;
              padding-bottom: 10px;
              margin-bottom: 10px;
            }
    .ac {
      text-align: center;
    }
    .ac a:hover {
      text-decoration: none;
    }

    .navbar-brand {
      padding: 5px;
    }

    .flash {
        display: inline-block;
        position: fixed;
        top: 15px;
        right: 15px;
        z-index: 10000;
    }

    .panel-body {
      padding: 15px 15px 0px 15px;
    }

    .btn-fab {
    margin: 0;
    margin-left: 3px;

    padding: 2px;
    font-size: 16px;
    width: 20px;
    height: 20px;
    }
    .btn-fab, .btn-fab .ripple-wrapper {
    border-radius: 10%;
    }
    .popover-title {
      background-color: #418bca;
    }

    .dashboard-stat .sbpstat {
        height: 80px;
        display: block;
        float: left;
        padding-top: 10px;
        padding-left: 15px;
        margin-bottom: 15px;
        color: #FFFFFF;
        text-align: right;
        font-size: 16px;
        letter-spacing: 0px;
        font-weight: 300;
        line-height: 26px;

    }

    .dashboard-stat .details .sbpdesc {
        text-align: right;
        padding-top: 10px;
        font-size: 16px;
        letter-spacing: 0px;
        font-weight: 300;
        line-height: 26px;
        color: #FFFFFF;
        
    }

    div.DTTT { margin-bottom: 0.5em; float: right; margin-left: 5px; }
    div.dataTables_wrapper { clear: both; }
</style>
@yield('style-atas')

<!-- <script src="{{asset('assets/js/jquery-1.11.1.min.js')}}"></script> -->
<!-- <script src="{{asset('assets/datatables/jquery.dataTables.js')}}"></script> -->
<!-- <script src="{{asset('assets/datatables/TableTools/js/dataTables.tableTools.min.js')}}"></script> -->
<!-- <script src="{{asset('assets/datatables/dataTables.bootstrap.js')}}"></script> -->

<!-- <script src="{{asset('assets/js/bootstrap.min.js')}}"></script> -->
<!-- <script type="text/javascript" src="{{asset('assets/select2/select2.min.js')}}"></script> -->
<!-- <script type="text/javascript" src="{{asset('assets/js/notify.min.js')}}"></script> -->

<!--[if lt IE 9]>
    <script src="/assets/plugins/html5shiv.js"></script>
<![endif]-->
@yield('script-atas')

<!-- END OLD ASSETS -->
