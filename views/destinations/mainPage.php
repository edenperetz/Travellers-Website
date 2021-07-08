<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/dest_style.css');?> ">
<link href="https://fonts.googleapis.com/css2?family=Aladin&display=swap" rel="stylesheet">
<div class="dest_info">
      <img id = "dest_photo" src = "<?php echo base_url($destData ->img_dir);?>" />
      <div class="dark_box">
        <h1><?php echo $destData ->destName; ?></h1>
        <div class="api">
          <p id="weather"> 
              Weather <br> 
              <?php $temp = round($destDegrees['temp'] - 273.15,2);
              echo $temp .'°C';?> <br>
              <img width="70px"src="http://openweathermap.org/img/w/<?php echo $destWeather['icon'] ;?>.png" >
              <?php echo $destWeather['description'] ;?>
          </p>
            <p id="time">
              <span>
                  Time<br>
                  <?php echo substr(json_encode($destTime),12,-7)?>
              </span>
              <br><canvas id="analogClock" width="60" height="60">Clock</canvas>
          </p>

        </div>
        <div class="buttons">
            <?php $destName = $destData->destName; ?>
          <button onclick="location.href='<?php echo site_url('Attractions/getAttractionsPage')?>?destName=<?php echo $destName;?>'" type="button">Attractions tickets</button>
          <button onclick="location.href='<?php echo site_url('Tips')?>?destName=<?php echo $destName;?>'" type="button">Tips</button>
          <button onclick="location.href='<?php echo site_url('TripForm/planning_form')?>?destName=<?php echo $destName;?>'" type="button">Plan me a trip</button> 
          <button onclick="location.href='<?php echo site_url('Attractions/getAttStatistics')?>?destName=<?php echo $destName;?>'" type="button">Statistics</button>
        </div>
      </div>
    </div>

    <div class="dest_about">
      <h3>Best Time To Visit</h3>
      <?php echo $destData->bestSeason ;?>
      <br> <br>
      <h3> Transportation</h3>
      <?php echo $destData->Transportation ;?>
      <br> <br>
      <h3>Weather</h3>
      <?php echo $destData->weather ;?>
      <br> <br>
      <h3>Know Before Visiting</h3>
      <?php echo $destData->importantInfo ;?>
      <br> <br>
      <h3>Language</h3>
      <?php echo $destData->language ;?>
      <br> <br>
      <h3>Electric</h3>
      <?php echo $destData->Electric ;?>
      <br><br>
      <h3>Currency</h3>
      <?php echo $destData -> currency ;?> 
    </div>

    <script src="<?php echo base_url('assets/js/dest.js');?>"> </script>

