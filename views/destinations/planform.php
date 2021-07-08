    <title>Trip planning</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/trip_planning_style.css');?> ">


<body>
    <!-- girls img on head -->
    <div class="page-header"></div>

    <div class="card-block">
        <h1 class="ml3" >We make every trip to a perfect trip.</h1> 
        <p>Leave us a message, and we will make sure to build you the vacation that suits you best.</p><br>
    
<?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
<?php echo form_open('TripForm/save_form'); ?>
     <div class="textrow">
    <label>Full Name</label>
    <input type="text" name="FullName" required value="<?php echo set_value('FullName');?>"/>
     </div>
    <div class="textrow">
    <label>Email Address</label>
    <input type="text" name="email"  id="email" value="<?php echo set_value('email');?>">
      </div>
     <div class="textrow">
    <label>Mobile Number</label>
     <input type="text" name="mobile" id="mobile" maxlength="10"  value="<?php echo set_value('mobile');?>">
      </div>
         <div class="textrow">           
                <label> Destination city </label>
                <select id="select" name="city">
                     <option>Select</option>
                    <option value="Amsterdam">Amsterdam</option>
                    <option value="Rome">Rome</option>
                    <option value="Paris">Paris</option>
                    <option value="Berlin">Berlin</option>
                </select> 
                   
            </div>
            <div class="textrow">
                <label>Observe Shabbat?</label>
                <div class="form-inline">
                  <input type="radio" name="observeShabbat" value="Yes"/> Yes
                  <input type="radio" name="observeShabbat" value="No"/> No 
     
                </div>
            </div>
             <div class="textrow">
             <label>Vacation's purpose <i>(Optional)</i></label>
             <input type="text" name="hobbies" placeholder="shopping,nature,food and etc" value="<?php echo set_value('hobbies');?>"/>
             </div>
             <div class="textrow">
             <label>Dietary restrictions <i>(Optional)</i></label>
             <input type="text" name="Dietary" placeholder="vegeterian, gluten free, kosher and etc" value="<?php echo set_value('Dietary');?>"/>
             </div>
            <div class="textrow">
                <label>Adults</label>
               <input type="number" name="adults" id="adults" min=1 value=2 value="<?php echo set_value('adults');?>">
            </div>
            <div class="textrow">
                <label>kids <i>(Optional)</i></label>
                <input type="number" name="kids" id="kids" min=0 value=0  value="<?php echo set_value('kids');?>">
            </div>
            <div class="textrow">
                <label>Budget for day (€) </label>
               <input type="text" name="budget" id="budget" min=1 value="<?php echo set_value('budget');?>">
            </div>
            <div class="textrow">
                <label>From:</label>
               <input type="date" name="from_day" id="from_day" min="<?php date('y-m-d');?>" value="<?php echo set_value('from_day');?>">
            </div>
            <div class="textrow">
                <label>To:</label>
                <input type="date" name="to_day" id="to_day" value="<?php echo set_value('to_day');?>">
            </div>
            <div class="textrow">
                <label>Comments that we should know: <i>(Optional)</i></label>
               <textarea class="form-control" id="textarea" placeholder="Leave a comment here" id="floatingTextarea" name="comments"value="<?php echo set_value('comments');?>" ></textarea>
            </div>
            <div class="textrow">
                   <input class="createForm"  type="submit" name="submit" value="Sumbit">
                <?php echo form_close(); ?>
            </div>
        </form>
    </div>

    </div>
    
    

    <!-- Text animation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="<?php echo base_url('assets/js/text_animation.js');?>"> </script>

    <!-- if the user came to the page from a destination page it will choose it a the destination in the form-->
    <script defer >
        const params=new URLSearchParams(window.location.search);
        const destName=params.get('destName');
        if (destName){
             $('select').val(destName).change() ;
        }        
    </script>
        
   
</body>
</html>


