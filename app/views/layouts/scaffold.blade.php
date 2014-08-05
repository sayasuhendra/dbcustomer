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
    <link href="{{asset('assets/fontawesome/css/font-awesome.min.css')}}" rel="stylesheet">
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

        div.DTTT { margin-bottom: 0.5em; float: right; margin-left: 5px; }
        div.dataTables_wrapper { clear: both; }
    </style>
    @yield('style-atas')

    <script src="{{asset('assets/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('assets/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/datatables/TableTools/js/dataTables.tableTools.min.js')}}"></script>
    <script src="{{asset('assets/datatables/dataTables.bootstrap.js')}}"></script>
    
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <!--[if lt IE 9]>
        <script src="/assets/plugins/html5shiv.js"></script>
    <![endif]-->
    @yield('script-atas')
</head>

<body>
    @include('layouts/partials/navbar')

    <div class="container">
        <div class="row">
                @yield('main')
        </div>
        </div>
    </div>
    @yield('script-bawah')

    



</body>
</html>
