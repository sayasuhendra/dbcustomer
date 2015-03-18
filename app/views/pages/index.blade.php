@extends('layouts/scaffold')

@section('atas')

	<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1.1','packages':['corechart']}]}"></script>
	
@stop

@section('page-breadcrumb')

	<li>
	    <i class="fa fa-home"></i>
	    <a href="index.html">Home</a>
	    <i class="fa fa-angle-right"></i>
	</li>
	<li>
	    <a href="#">Dashboard</a>
	</li>

@stop

@section('main')
@if (Auth::user()->hasRole('admin'))
    @include('layouts/admin/content/statistics')
@endif
@stop

@section('script')
	<script src="{{ asset('global/plugins/flot/jquery.flot.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('global/plugins/flot/jquery.flot.resize.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('global/plugins/flot/jquery.flot.categories.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('pages/scripts/index.js') }}" type="text/javascript"></script>
	<script type="text/javascript">
		console.log('test');
		google.setOnLoadCallback(drawVisualization);

		function drawVisualization() {
		  // Some raw data (not necessarily accurate)
		  var data = google.visualization.arrayToDataTable([
		    ['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
		    ['2004/05',  165,      938,         522,             998,           450,      614.6],
		    ['2005/06',  135,      1120,        599,             1268,          288,      682],
		    ['2006/07',  157,      1167,        587,             807,           397,      623],
		    ['2007/08',  139,      1110,        615,             968,           215,      609.4],
		    ['2008/09',  136,      691,         629,             1026,          366,      569.6]
		  ]);

		  var options = {
		    title : 'Monthly Coffee Production by Country',
		    vAxis: {title: "Cups"},
		    hAxis: {title: "Month"},
		    seriesType: "bars",
		    series: {5: {type: "line"}}
		  };

		  var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
		  chart.draw(data, options);
		}
	</script>

@stop