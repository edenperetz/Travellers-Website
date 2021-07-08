<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/tips_style.css');?> ">

	<div class="tips_head">
		<h1> <?php echo $destName ?>, Tips From Travellers</h1>
		<img id="background" src="<?php echo base_url();?>assets/images/tips/tips_img.png" alt="tips"/>
	</div>
      <br>

	    <?php
	foreach ($tips as $obj):?>
	<div class="tip" style="width: 80%; margin:auto">
		<div class="user_info">
                    <img src="<?php echo base_url();?>assets/images/tips/tips_icon.png" alt="tips" width="50" height="50"/>
                    <p><?php echo $obj->username;?></p>
                    <p id="date_write"> written on:<br>
                        <?php 
                        $dt = new DateTime($obj->tipDate);
                        $date = $dt->format('d/m/Y');
                        echo $date?>
                    </p>
                </div>
            <div class="user_tip">
                <?php echo $obj->description;?>
		</div>
   
	</div>
        <br>
	<?php endforeach; ?>
      <br>
      
    <div class="addTip" style = "margin:auto">
        <center><h5> Add your tip to <?php echo $destName ?>:</h5></u<br>
            <!--<i> (open for members only)</i><br>-->
            
        <?php if(!array_key_exists('username', $user)): ?>
               <p id="must_login">You must log in to write a tip</p>
               </div>
        <?php else : ?>
      
                <?php echo form_open('Tips/save_tip'); ?>
                <!--<label>Username:</label>-->
                <input type="hidden" name="username"  value="<?php print($user['username']);?>">
                 <input type="hidden" name="destName"  value="<?php print($destName);?>">
                <textarea class="form-control" id="textarea" placeholder="Leave a comment here" id="floatingTextarea" name="description" required></textarea>
                <p id="tipInfo"> The tip will upload by your username:<b> <?php print($user['username']);?></b></p>
                <input class="createForm" type="submit" name="submit" value="Send"/>
        </center>
    </div>
    <?php echo form_close(); ?>


    <?php endif; 
    


