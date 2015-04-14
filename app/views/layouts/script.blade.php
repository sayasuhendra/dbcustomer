<!--[if lt IE 9]>
<script src="{{asset('global/plugins/respond.min.js')}}"></script>
<script src="{{asset('global/plugins/excanvas.min.js')}}"></script> 
<![endif]-->
<script src="{{asset('global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('global/plugins/jquery.cokie.min.js')}}" type="text/javascript"></script>

<script src="{{asset('global/scripts/metronic.js')}}" type="text/javascript"></script>
<script src="{{asset('layout/scripts/layout.js')}}" type="text/javascript"></script>
<script src="{{asset('layout/scripts/quick-sidebar.js')}}" type="text/javascript"></script>

<script>
	jQuery(document).ready(function() {    
	   Metronic.init();
	   Layout.init();
	   QuickSidebar.init();
	});
</script>

@yield('script-bawah')

<script type="text/javascript" src="{{asset('global/scripts/utils.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datasbp').dataTable();
    } );
</script>
