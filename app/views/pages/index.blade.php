@extends('layouts/scaffold')

@section('atas')

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawVisualization);

function drawVisualization() {
  // Some raw data (not necessarily accurate)
  var data = google.visualization.arrayToDataTable({{$datagraph}});

  var options = {
    title : 'Circuit Activation Per Month Over Years',
    vAxis: {title: "Circuits"},
    hAxis: {title: "Year/Month"},
    seriesType: "bars",
    series: {12: {type: "line"}}
  };

  var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}
    </script>
	
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
@if (Auth::user()->hasRole('bod'))
    @include('layouts/admin/content/statistics')
@endif
@stop