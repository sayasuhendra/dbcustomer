<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('meta-title', 'PT SBP')</title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
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

        div.DTTT { margin-bottom: 0.5em; float: right; margin-left: 5px; }
        div.dataTables_wrapper { clear: both; }
    </style>
    @yield('style-atas')

    <script src="{{asset('assets/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('assets/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/datatables/TableTools/js/dataTables.tableTools.min.js')}}"></script>
    <script src="{{asset('assets/datatables/dataTables.bootstrap.js')}}"></script>
    
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/notify.min.js')}}"></script>

    <!--[if lt IE 9]>
        <script src="/assets/plugins/html5shiv.js"></script>
    <![endif]-->
    @yield('script-atas')
</head>

<body>
    @include('layouts/partials/navbar')

    <div class="container"> {{-- -fluid --}}
        <div class="row">
                @yield('main')
        </div>
        </div>
    </div>
    @yield('script-bawah')

    <script type="text/javascript" src="{{asset('assets/js/utils.js')}}"></script>
    <!-- // <script type="text/javascript" src="{{asset('assets/js/ripples.min.js')}}"></script> -->
    <!-- // <script type="text/javascript" src="{{asset('assets/js/material.min.js')}}"></script> -->

</body>
</html>
