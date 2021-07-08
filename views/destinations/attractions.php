<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/attractions_style.css');?>" />
<div class="attractions_head">
          <img  src="<?php echo base_url('assets/images/attractions/attractions.jpg');?>">
          <div class="dark_box">
              <h1>Tickets For Attractions </h1>
          </div>
      </div>
      <section>
          <div class="shop-items">
              <?php for ($i = 0; $i <= 5; $i++) : ?>
              
                <div id="shop-item-frame">
                  <div class="shop-item">
                      <h2 class="shop-item-title"><?php echo $Attractions[$i]->attractionName  ;?></h2>
                      <img class="shop-item-image" src="<?php echo base_url($Attractions[$i]->img_dir);?>">
                      <div class="shop-item-details">
                          <span class="shop-item-price"><?php echo '€'. $Attractions[$i]->price;?></span>
                           <button onclick="location.href='<?php echo site_url('Purchase')?>?attraction=<?php echo $Attractions[$i]->attractionName;?>&price=<?php echo $Attractions[$i]->price;?>&attId=<?php echo $Attractions[$i]->attId;?>'" type="button">Buy now</button>
                      </div>
                  </div>
                  <div class="item-description">
                      <?php echo $Attractions[$i]->description  ;?>
                  </div>
              </div>
              <?php endfor; ?>
      </section>

  </body>