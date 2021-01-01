<section class="content-header">
      <h1>
      Chart
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Analisis</li>
      </ol>
    </section>
    <!-- Main content -->
    <div class="invoice">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
   
 <!DOCTYPE HTML>
 <html>
 <head>
 <script>
 window.onload = function () {
  
 var chart = new CanvasJS.Chart("chartContainer", {
   title: {
     text: "Data Pemasukan CV Tita Jaya"
   },

   data: [{
     type: "line",
     dataPoints: <?php echo json_encode($sales_trend, JSON_NUMERIC_CHECK); ?>
   }]
 });
 chart.render();
  
 }
 </script>
 </head>
 <body>

 
 <div id="chartContainer" style="height: 600px; width: 100%;"></div>
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
 </body>
 </html>



















<section class="content-header">
      <h1>
      Chart
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Analisis</li>
      </ol>
    </section>
    <!-- Main content -->
    <div class="invoice">
<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Label Pelanggan', 'Jumlah'],
  ['Dormant Customer', 105],
  ['Typical Customer', 7],
  ['Superstar', 3],
  ['Everyday Shopper', 18],
  ['Golden Customer', 2],
  ['Occational Customer', 56]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Segmentasi Pelanggan', 'width':650, 'height':450};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

</body>
</html>
</div>














<section class="content-header">
      <h1>
      Hasil Segmentasi Pelanggan
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Analisis</li>
      </ol>
    </section>
    <!-- Main content -->
    <div class="invoice">
    <!-- <table class="table table-striped dataTable" id="analisaTable"> -->

    <?php

$filename = 'analisis/cluster.csv';

// The nested array to hold all the arrays
$the_big_array = []; 

// Open the file for reading
if (($h = fopen("{$filename}", "r")) !== FALSE) 
{
  // Each line in the file is converted into an individual array that we call $data
  // The items of the array are comma separated
  while (($data = fgetcsv($h, 1000, ",")) !== FALSE) 
  {
    // Each individual array is being pushed into the nested array
    $the_big_array[] = $data;		
  }
  // Close the file
  fclose($h);
}

// Display the code in a readable format
// echo "<pre>";  
?>
<table class="table table-striped dataTable" id="analisaTable">
  <thead>
<tr>
  <th> No </th>
  <th> ID Pelanggan </th>
  <th> Recency </th>
  <th> Frequency </th>
  <th> Monetary </th>
  <th> Cluster </th>
</tr>
  </thead>
  <tbody>
<?php foreach($the_big_array as $key=>$data){?>
<tr>
  <?php
if ($key === array_key_first($data))

?>
  <?php 
    foreach($data as $item){
      $try = (explode(",", $item))
      ?><th><?= $try[0] ?> </th><?php
      ?><th><?= $try[1] ?> </th><?php
      ?><th><?= $try[2] ?> </th><?php
      ?><th><?= $try[3] ?> </th><?php
      ?><th><?= $try[4] ?> </th><?php
      ?><th><?= $try[5] ?> </th><?php
?>
  <?php }?>
</tr>
<?php
// echo "</pre>";
}?>
</tbody>
</table>
</div>












<section class="content-header">
      <h1>
      Nilai Centroid Setiap Cluster 
      </h1>
    </section>
<div class="invoice">
<?php

$filename = 'analisis/centroid.csv';

// The nested array to hold all the arrays
$the_big_array = []; 

// Open the file for reading
if (($h = fopen("{$filename}", "r")) !== FALSE) 
{
  // Each line in the file is converted into an individual array that we call $data
  // The items of the array are comma separated
  while (($data = fgetcsv($h, 1000, ",")) !== FALSE) 
  {
    // Each individual array is being pushed into the nested array
    $the_big_array[] = $data;		
  }
  // Close the file
  fclose($h);
}

// Display the code in a readable format
// echo "<pre>";  
?>
<table class="table table-striped dataTable" id="analisaTable">
  <thead>
<tr>
  <th> Cluster </th>
  <th> Recency </th>
  <th> Frequency </th>
  <th> Monetary </th>
  <th> Label Pelanggan </th>
</tr>
  </thead>
  <tbody>
<?php foreach($the_big_array as $key=>$data){?>
<tr>
  <?php
if ($key === array_key_first($data))

?>
  <?php 
    foreach($data as $item){
      $try = (explode(",", $item))
      ?><th><?= $try[0] ?> </th><?php
      ?><th><?= $try[1] ?> </th><?php
      ?><th><?= $try[2] ?> </th><?php
      ?><th><?= $try[3] ?> </th><?php
      ?><th><?= $try[4] ?> </th><?php
?>
  <?php }?>
</tr>
<?php
// echo "</pre>";
}?>
</tbody>
</table>
</div>








    