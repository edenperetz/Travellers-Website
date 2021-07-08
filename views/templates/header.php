<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Aladin&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,600,700&amp;display=swap" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?> ">
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link rel="favicon" href="<?php echo base_url('assets/images/title_logo.png');?>" type="image/x-icon" />
        <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"
    ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"
    ></script>
    <title>travelMES</title>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
      <a class="navbar-brand" href="<?php echo site_url('Home')?>">
        <img width="35px" src="<?php echo base_url('assets/images/title_logo.png');?>" alt="logo" />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Home')?>">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Home')?>#about">About</a></li>
          <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Destinations
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?php echo site_url('Home/getDestPage')?>?destName=Amsterdam">Amsterdam</a>
                  <a class="dropdown-item" href="<?php echo site_url('Home/getDestPage')?>?destName=Paris">Paris</a>
                  <a class="dropdown-item" href="<?php echo site_url('Home/getDestPage')?>?destName=Berlin">Berlin</a>
                  <a class="dropdown-item" href="<?php echo site_url('Home/getDestPage')?>?destName=Rome">Rome</a>
                </div>
         </li>
          
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('TripForm/planning_form')?>">Trip Planning</a>
          </li>
        </ul>
    
             <?php if(!array_key_exists('username', $user)){
                   $loginUrl = site_url('Auth/login');
                   echo '  <a class = "nav-link" href="'.$loginUrl.'">  Login </a> ';
                    $registerUrl = site_url('Auth/register');
                   echo '  <a class = "nav-link" href="'.$registerUrl.'">  Register </a> ';
               }
               else{
                   $url = site_url('Auth/logout');
                   echo '  <a class = "nav-link" href="'.$url.'">  Logout, <span id="userName"></span> </a>';
               }
               ?> 
              <?php if(array_key_exists('username', $user)){
                   $url = site_url('Auth/get_user_info');
                   echo '  <a class = "nav-link" href="'.$url.'">  Profile </a> ';
               }?>
      </div> 
    </nav>
      
      <script defer>
          window.addEventListener('load',function(){
               $.ajax(
                          {
                              url: '<?php echo site_url('Auth/get_user_name');?>',
                              dataType: 'json'
                          }).done(function(data){
                              $('#userName').text(data.userName)
                          })
          });
                 
      </script>
