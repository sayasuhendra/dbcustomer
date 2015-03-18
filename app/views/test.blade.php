<?php
	echo "Data Pertahun : <br>";
	foreach (range(2005, 2015) as $tahun) {

		echo "Data Tahun " . $tahun . " = " . $datapertahun[$tahun]['0']->jumlah . "<br>";
	}


	echo "<br>Data Perbulan : <br>";

	foreach (range(2005, 2015) as $tahun) {

		foreach (range(1,12) as $bln) {
			echo "Data Tahun " . $tahun . ". Bulan " . $bln . " = " . $dataperbulan[$tahun][$bln]['0']->jumlah . "<br>";

		}

	}

?>

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
    ['2004',  	6,      	3,         	2,		2,		2,		2,		2,		2,			2,		9,        4,      6.6],
    ['2005',  	3,      	12,        	9,		9,		9,		9,		9,		9,			9,		16,       2,      8],
    ['2006',  	5,      	16,        	8,		8,		7,		8,		8,		8,			8,		8,        3,      2],
    ['2007',  	3,      	11,        	1,		1,		5,		1,		1,		1,			1,		9,        2,      6.4],
    ['2008',  	3,      	9,         	2,		2,		9,		2,		2,		2,			2,		12,       3,      5.6]
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
  </body>
</html>