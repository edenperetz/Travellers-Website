<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/statistics_style.css');?>" />
<!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

     
      function jsonEscape(str)  {
        return str.replace(/\n/g, "\\\\n").replace(/\r/g, "\\\\r").replace(/\t/g, "\\\\t");
        }

      function drawChart() {
          const AttOrders = JSON.parse(jsonEscape(`<?php echo ($AttractionsOrders);?>`));
          const MaritalStatus = JSON.parse(`<?php echo ($CustomersMaritalStatus);?>`);
          const Gender = JSON.parse(`<?php echo ($CustomersGender);?>`);
          const AgeGroup = JSON.parse(`<?php echo ($CustomersAgeGroup);?>`);
        // Create the data table.
        
        var Orders = new google.visualization.DataTable();
        Orders.addColumn('string', 'Attractions');
        Orders.addColumn('number', 'reservations');
        Orders.addRows(AttOrders.map(att => [att.attractionName,Number(att.numOfReservations)]));
        
        var customers_MS = new google.visualization.DataTable();
        customers_MS.addColumn('string', 'TypeOfUsers');
        customers_MS.addColumn('number', 'users');
        customers_MS.addRows(MaritalStatus.map(user => [user.maritalStatus,Number(user.numOfUsers)]));
        
        var customers_Gender = new google.visualization.DataTable();
        customers_Gender.addColumn('string', 'TypeOfUsers');
        customers_Gender.addColumn('number', 'users');
        customers_Gender.addRows(Gender.map(user => [user.gender,Number(user.numOfUsers)]));
        
        var customers_AG = new google.visualization.DataTable();
        customers_AG.addColumn('string', 'TypeOfUsers');
        customers_AG.addColumn('number', 'users');
        customers_AG.addRows(AgeGroup.map(user => [user.age_range,Number(user.numOfUsers)]));
        
        // Set chart options
        var options = {'title':'Attractions Orders',
                       'width':500,
                       'height':400,
                   'backgroundColor':'#f2f2f2'};
               
        var options1 = {'title':'Travellers Group By Marital Status',
                       'width':500,
                       'height':400,
                   'backgroundColor':'#f2f2f2'};
        
        var options2 = {'title':'Travellers Group By Gender',
                       'width':500,
                       'height':400,
                   'backgroundColor':'#f2f2f2'};
               
        var options3 = {'title':'Travellers Group By Age Group',
                       'width':500,
                       'height':400,
                   'backgroundColor':'#f2f2f2'};

        // Instantiate and draw our chart, passing in some options.
        var ordersChart = new google.visualization.PieChart(document.getElementById('AttOrders'));
        var msChart= new google.visualization.PieChart(document.getElementById('AttByMaritalStatus'));
        var genderChart = new google.visualization.PieChart(document.getElementById('AttByGender'));
        var ageChart = new google.visualization.PieChart(document.getElementById('AttByAgeGroup'));
        ordersChart.draw(Orders, options);
        msChart.draw(customers_MS, options1);
        genderChart.draw(customers_Gender, options2);
        ageChart.draw(customers_AG, options3);
      }
    </script>
    
<div id="statistics">
    <h3> Graphs </h3>
  <h4> As you can see, the 3 most popular attractions in <?php echo $destName;?> are: </h4>
    <?php 
    for($i=0; $i<=2; $i++){
        echo $i+1 .'. '. $MostPopularAtDest[$i]->attractionName
        ."<br>";
    };?>
  <div id="AttOrders"></div>
  <div id="AttByMaritalStatus"></div>
  <div id="AttByGender"></div>
  <div id="AttByAgeGroup"></div>
</div>
