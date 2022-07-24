<html>
  <head>
  <link rel="stylesheet" href="{{asset('css/admin/chart.css')}}">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Name', 'Balance'],
         <?php echo $riderData ?>
        ]);

        var options = {
          title: 'Rider Balance According to Name',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }



      
    </script>
    
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 600px; margin-top:100px;"></div>
  </body>
</html>


<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Address', 'Total_address'],
          <?php echo $cusData ?>
        ]);

        var options = {
          title: 'Number of Users according to Address',
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 900px; height: 600px;  margin-top:100px; margin-left:60px"></div>
  </body>
</html>