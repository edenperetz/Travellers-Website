<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/home_page_style.css');?> "> 
<div
      id="carouselExampleControls"
      class="carousel slide"
      data-ride="carousel"
      style="background: rgba(82, 82, 82, 0.5)"
    >
      <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="<?php echo site_url('Home/getDestPage')?>?destName=Amsterdam">
                <img
                class="d-block mx-auto"
                src="<?php echo base_url('assets/images/destinations/amsterdam_img.png');?>"
                alt="Amsterdam" >
                <p> Amsterdam </p>
            </a>
        </div>
        <div class="carousel-item">
            <a href="<?php echo site_url('Home/getDestPage')?>?destName=Berlin">
                <img
                  class="d-block mx-auto"
                  src="<?php echo base_url('assets/images/destinations/berlin_img.png');?>"
                  alt="Berlin"
                />
                 <p> Berlin </p>
            </a>
   
        </div> 
        <div class="carousel-item">
            <a href="<?php echo site_url('Home/getDestPage')?>?destName=Paris">
                <img 
                    class="d-block mx-auto"
                    src="<?php echo base_url('assets/images/destinations/paris_img.png');?>"
                    alt="Paris" />
                 <p> Paris </p>
            </a>
        </div>
        <div class="carousel-item">
            <a href="<?php echo site_url('Home/getDestPage')?>?destName=Rome">
             <img class="d-block mx-auto"
                  src="<?php echo base_url('assets/images/destinations/rome_img.png');?>" 
                  alt="Rome" />
             <p> Rome </p>
            </a>
            
        </div>
      </div>
      <a
        class="carousel-control-prev"
        href="#carouselExampleControls"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="carousel-control-next"
        href="#carouselExampleControls"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
</div>
<br>

<div id="about">
      <h2>About us</h2>
      <img id="us" src="<?php echo base_url('assets/images/us.png');?>" alt="us" />
      <p>
        We are travelMES, Mor Eden and Shaked, the planners of your next trip!
        we have 10 years of experience in customize trip planning around the
        world. we are looking forward to give you the best service for your
        glorious trip! In our website you can find information about a lot of
        amazing destinations, tips from travelers, tickets for attractions and
        of course Customized trip planning. So.. if you are a foodie who likes
        the good life, or a nature addict, or even just can't wait to explore
        the world, you are in the right place! <br /><br /><br />
      </p>
      <a href="mailto:travel_mes@walla.com">
        <button class="btn btn-secondary">
          <img width="20px" src="<?php echo base_url('assets/images/contact.png');?>" alt="contact" />
          CONTACT US
        </button>
      </a>
</div>
