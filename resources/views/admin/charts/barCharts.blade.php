<?php
$conn = new mysqli("localhost","root","","rideshare")

?>

<html>
  <head>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['pickupPoint', 'Destination', 'CustomerStatus', 'RiderStatus'],
         <?php
$query = "select pickupPoint, destination, customerStatus, riderStatus from rides";
$res = mysqli_query($conn,$query);
while ($data = mysqli_fetch_array($res)){
      $pickupPoint = $data['pickupPoint'];
      $Destination = $data['destination'];
      $CustomerStatus = $data['customerStatus'];
      $RiderStatus = $data['riderStatus'];
      ?>
      ['<?php echo $pickupPoint;?>','<?php echo $Destination;?>','<?php echo $CustomerStatus;?>','<?php echo $RiderStatus;?>'],
      <?php
      }
     ?>

        ]);

        var options = {
          chart: {
            title: 'Rides Statistics',
            subtitle: 'Pick up points, Destination, Customer Ride Status and Rider Ride Status',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 96%; height: 800px; margin:40px;"></div>
  </body>
</html>
