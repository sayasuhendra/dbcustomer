<html>
  <head>
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
  </head>
  <body>
    <div id="chart_div" style="width: 1200px; height: 500px;"></div>

    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="portlet box purple">
      <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-comments"></i>Striped Table
        </div>
        <div class="tools">
          <a href="javascript:;" class="collapse">
          </a>
          <a href="#portlet-config" data-toggle="modal" class="config">
          </a>
          <a href="javascript:;" class="reload">
          </a>
          <a href="javascript:;" class="remove">
          </a>
        </div>
      </div>
      <div class="portlet-body">
        <div class="table-scrollable">
          <table class="table table-striped table-hover">
          <thead>
          <tr>
            <th>
               #
            </th>
            <th>
               First Name
            </th>
            <th>
               Last Name
            </th>
            <th>
               Username
            </th>
            <th>
               Status
            </th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>
               1
            </td>
            <td>
               Mark
            </td>
            <td>
               Otto
            </td>
            <td>
               makr124
            </td>
            <td>
              <span class="label label-sm label-success">
              Approved </span>
            </td>
          </tr>
          <tr>
            <td>
               2
            </td>
            <td>
               Jacob
            </td>
            <td>
               Nilson
            </td>
            <td>
               jac123
            </td>
            <td>
              <span class="label label-sm label-info">
              Pending </span>
            </td>
          </tr>
          <tr>
            <td>
               3
            </td>
            <td>
               Larry
            </td>
            <td>
               Cooper
            </td>
            <td>
               lar
            </td>
            <td>
              <span class="label label-sm label-warning">
              Suspended </span>
            </td>
          </tr>
          <tr>
            <td>
               4
            </td>
            <td>
               Sandy
            </td>
            <td>
               Lim
            </td>
            <td>
               sanlim
            </td>
            <td>
              <span class="label label-sm label-danger">
              Blocked </span>
            </td>
          </tr>
          </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->
  </body>
</html>


{{-- 
<?php
  echo "Data Pertahun : <br><br>";
  foreach (range(2005, 2015) as $tahun) {

    echo "Data Tahun " . $tahun . " = " . $cirt[$tahun] . "<br>";
  }


  echo "<br>Data Perbulan : <br><br>";

  foreach (range(2005, 2015) as $tahun) {

    foreach (range(1,12) as $bln) {
      echo "Data Tahun " . $tahun . ". Bulan " . $bln . " = " . $cirb[$tahun][$bln] . "<br>";
      if ($bln == "12") {
        echo "<hr><BR>";
      }

    }

  }

?>
--}}