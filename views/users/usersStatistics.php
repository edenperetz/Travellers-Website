<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
          const ageDistribution = JSON.parse(`<?php echo ($AgeDistribution);?>`);
          const msDistribution = JSON.parse(`<?php echo ($msDistribution);?>`);
          const ttDistribution = JSON.parse(`<?php echo ($ttDistribution);?>`);
          const gender_distribution= JSON.parse(`<?php echo ($genderDistribution);?>`);
        // Create the data table.
        
        var ageGroupDistribution = new google.visualization.DataTable();
        ageGroupDistribution.addColumn('string', 'Ages');
        ageGroupDistribution.addColumn('number', 'Number Of Users');
        ageGroupDistribution.addRows(ageDistribution.map(user => [user.age_range,Number(user.numOfUsers)]));
        
         var maritalStatusDistribution = new google.visualization.DataTable();
        maritalStatusDistribution.addColumn('string', 'Marital Status');
        maritalStatusDistribution.addColumn('number', 'Number Of Users');
        maritalStatusDistribution.addRows(msDistribution.map(user => [user.maritalStatus,Number(user.numOfUsers)]));
        
        var travelTypeDistribution = new google.visualization.DataTable();
        travelTypeDistribution.addColumn('string', 'Travel Type');
        travelTypeDistribution.addColumn('number', 'Number Of Users');
        travelTypeDistribution.addRows(ttDistribution.map(user => [user.travelType,Number(user.numOfUsers)]));
        
        var genderDistribution = new google.visualization.DataTable();
        genderDistribution.addColumn('string', 'Gender');
        genderDistribution.addColumn('number', 'Number Of Users');
        genderDistribution.addRows(gender_distribution.map(user => [user.gender,Number(user.numOfUsers)]));
        
        // Set chart options
        var options = {'title':'Age Distribution',
                       'width':500,
                       'height':400,
                   'backgroundColor':'#f2f2f2'};
        
        var options1 = {'title':'Marital Status Distribution',
                       'width':500,
                       'height':400,
                   'backgroundColor':'#f2f2f2'};
               
        var options2 = {'title':'Travel Type Distribution',
                       'width':500,
                       'height':400,
                   'backgroundColor':'#f2f2f2'};
        
        var options3 = {'title':'Gender Distribution',
                       'width':500,
                       'height':400,
                   'backgroundColor':'#f2f2f2'};
               
        // Instantiate and draw our chart, passing in some options.
        var ageChart = new google.visualization.PieChart(document.getElementById('ages'));
        ageChart.draw(ageGroupDistribution, options);
        var msChart = new google.visualization.PieChart(document.getElementById('maritalStatus'));
        msChart.draw(maritalStatusDistribution, options1);
        var ttChart = new google.visualization.PieChart(document.getElementById('travelType'));
        ttChart.draw(travelTypeDistribution, options2);
        var genderChart = new google.visualization.PieChart(document.getElementById('gender'));
        genderChart.draw(genderDistribution, options3);
      }
    </script>
<div id="userStat" style="margin:auto; text-align: center; margin-left: 25%;">
     <?php echo 'This is the age distribution in our website! '.'<br>'.' The average is: '.$averageAge.', and you 
    are younger than '. intval($userYoungerThan).'% of our users'?>
    <div id="ages">
    </div>
    <?php echo 'This is the Marital Status distribution in our website! '.'<br>'.' as you can see, the marital status of '.intval($sameMaritalStatus).'% of the users
    (including you) is '.$this->session->all_userdata()["user"]->maritalStatus?>
     <div id="maritalStatus">
    </div>
    <?php echo 'This is the Travel Type distribution in our website! '.'<br>'.' as you can see, the preferred travel type of '.intval($sameTravelType).'% of the users
    (including you) is '.$this->session->all_userdata()["user"]->travelType?>
    <div id="travelType" >
    </div>
    <?php echo 'This is the Gender distribution in our website! '.'<br>'.' as you can see, the gender of '.intval($sameGender).'% of the users
    (including you) is '.$this->session->all_userdata()["user"]->gender?>
    <div id="gender" >
    </div>

</div>
