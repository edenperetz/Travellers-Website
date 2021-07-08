
<main>
    <?php echo form_open('Purchase/save_res'); ?>
    <input type="hidden" name="attId" value="<?php print_r($attId) ?>"/>
     <input type="hidden" name="username" value="<?php echo $user['user']->username;?>"/>

    <center>
        <h3>Buy a tickets for: <b> <?php echo $attractionName ?> </b> </h3>
          <div class="textrow">
          <label>Quantity: </label>
          <input type="number" id="Quantity" name="Quantity" min="1" value="1" onchange="myFunction()""/>
          </div>
          <div class="textrow">
        <label> Total price: </label>
        <b><input type="text" name="totalPrice" id="totalPrice" value="<?php echo $price.'€' ?>" readonly style="background: transparent; border:0px; font-weight: bold"> </input></b>
          </div>
        
                <input class="createForm" type="submit" name="submit" value="Send"/>
      </div>
      
      <script>
          
function myFunction() {
document.getElementById("totalPrice").setAttribute('value',document.getElementById("Quantity").value *  <?php round(print_r($price));?>+'€' );
 <?php echo print_r($price) ?> +'€'; 
}
</script>

    <?php echo form_close(); ?>
    
    </center>
    
</main>
