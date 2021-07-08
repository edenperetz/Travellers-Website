<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/register.css');?> ">
<?php echo form_open('Auth/save_register'); ?>
<div class="container" id="block1" style="background-color:white">

    <h1>Registration Form</h1>
    <?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
    
    <!-- username should be unique, throw a message if the user entered username that already exists-->
    <?php if($userExist){
        echo '<div class="alert alert-danger">This user name is already exist</div>';
    }?>
    <label>username</label>
        <div class="textrow">
    <input type="text" name="username" id="username" value="<?php echo set_value('username');?>" />
        </div>
    <label>password</label>
    <div class="textrow">
    <input type="password" name="password" value="<?php echo set_value('password');?>"  />
    </div>
    <label>fullName</label>
    <div class="textrow">
    <input type="text" name="fullName" value="<?php echo set_value('fullName');?>" />
    </div>
    <label>gender</label> 
    <div class="textrow"id="multiple">
        <input type="radio" name="gender" value="Male" value="<?php echo set_value('Male');?>"/>Male <br><br>
     <input type="radio" name="gender" value="Female" value="<?php echo set_value('Female');?>"/>Female <br>
    </div>
    <br>
    <lable> maritalStatus: </label> <br>
    <br>
    <div class="textrow" id="multiple">
        <input type="radio" name="maritalStatus" value="single"/>Single <br><br>
        <input type="radio" name="maritalStatus" value="Married with kids"/>Married with kids <br><br>
    <input type="radio" name="maritalStatus" value="Married without kids"/>Married without kids
    </div>
    <label>age</label>
    <div class="textrow">
    <input type="text" name="age" value="<?php echo set_value('age');?>"/>
    </div>
    <label>travelType</label>
    <div class="textrow" id="multiple">
        <input type="radio" name="travelType" value="Nature"/>Nature <br><br>
        <input type="radio" name="travelType" value="Urban"/>Urban <br><br>
    <input type="radio" name="travelType" value="Both"/>Both
    <br>   </div> <br> 

    
    <input class="createForm" type="submit" name="submit" value="Register"/>
    <input id="cancel" class="createForm" type="submit" name="submit" value="Cancel" />
<?php echo form_close(); ?>
 </div>
<script>
            document.getElementById("cancel").onclick=function()
            {
                window.location.href="<?php echo site_url('Auth/register');?>";   
            };
 </script>


