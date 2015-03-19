@extends('layouts/scaffold')

@section('atas')

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawVisualization);

function drawVisualization() {
  // Some raw data (not necessarily accurate)
  var data = google.visualization.arrayToDataTable([
    ['Month', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
    ['2010 - {{{$cirt[2010]}}}', {{{$cirb[2010][1]}}}, {{{$cirb[2010][2]}}}, {{{$cirb[2010][3]}}}, {{{$cirb[2010][4]}}}, {{{$cirb[2010][5]}}}, {{{$cirb[2010][6]}}}, {{{$cirb[2010][7]}}}, {{{$cirb[2010][8]}}}, {{{$cirb[2010][9]}}}, {{{$cirb[2010][10]}}}, {{{$cirb[2010][11]}}}, {{{$cirb[2010][12]}}}],
    ['2011 - {{{$cirt[2011]}}}', {{{$cirb[2011][1]}}}, {{{$cirb[2011][2]}}}, {{{$cirb[2011][3]}}}, {{{$cirb[2011][4]}}}, {{{$cirb[2011][5]}}}, {{{$cirb[2011][6]}}}, {{{$cirb[2011][7]}}}, {{{$cirb[2011][8]}}}, {{{$cirb[2011][9]}}}, {{{$cirb[2011][10]}}}, {{{$cirb[2011][11]}}}, {{{$cirb[2011][12]}}}],
    ['2012 - {{{$cirt[2012]}}}', {{{$cirb[2012][1]}}}, {{{$cirb[2012][2]}}}, {{{$cirb[2012][3]}}}, {{{$cirb[2012][4]}}}, {{{$cirb[2012][5]}}}, {{{$cirb[2012][6]}}}, {{{$cirb[2012][7]}}}, {{{$cirb[2012][8]}}}, {{{$cirb[2012][9]}}}, {{{$cirb[2012][10]}}}, {{{$cirb[2012][11]}}}, {{{$cirb[2012][12]}}}],
    ['2013 - {{{$cirt[2013]}}}', {{{$cirb[2013][1]}}}, {{{$cirb[2013][2]}}}, {{{$cirb[2013][3]}}}, {{{$cirb[2013][4]}}}, {{{$cirb[2013][5]}}}, {{{$cirb[2013][6]}}}, {{{$cirb[2013][7]}}}, {{{$cirb[2013][8]}}}, {{{$cirb[2013][9]}}}, {{{$cirb[2013][10]}}}, {{{$cirb[2013][11]}}}, {{{$cirb[2013][12]}}}],
    ['2014 - {{{$cirt[2014]}}}', {{{$cirb[2014][1]}}}, {{{$cirb[2014][2]}}}, {{{$cirb[2014][3]}}}, {{{$cirb[2014][4]}}}, {{{$cirb[2014][5]}}}, {{{$cirb[2014][6]}}}, {{{$cirb[2014][7]}}}, {{{$cirb[2014][8]}}}, {{{$cirb[2014][9]}}}, {{{$cirb[2014][10]}}}, {{{$cirb[2014][11]}}}, {{{$cirb[2014][12]}}}],
    ['2015 - {{{$cirt[2015]}}}', {{{$cirb[2015][1]}}}, {{{$cirb[2015][2]}}}, {{{$cirb[2015][3]}}}, {{{$cirb[2015][4]}}}, {{{$cirb[2015][5]}}}, {{{$cirb[2015][6]}}}, {{{$cirb[2015][7]}}}, {{{$cirb[2015][8]}}}, {{{$cirb[2015][9]}}}, {{{$cirb[2015][10]}}}, {{{$cirb[2015][11]}}}, {{{$cirb[2015][12]}}}]
  ]);

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
@if (Auth::user()->hasRole('admin'))
    @include('layouts/admin/content/statistics')
@endif
@stop