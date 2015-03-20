<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawVisualization);

function drawVisualization() {
  // Some raw data (not necessarily accurate)
  var data = google.visualization.arrayToDataTable( {{$datagraph}});

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