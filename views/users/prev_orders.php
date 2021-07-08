<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/prev_orders_style.css');?> "> 
      <div id="results">

          <p><u><b> Your previous orders in travelMES: </u></p></b>
          <?php if ($orders==null): ?>
          <p> You don't have orders yet.</p>
    <?php else: ?> 
      <table width="90%" id="t01">
          <tr>
          <th> Order number </th>
          <th> Date </th>
          <th> City </th>
          <th> Attraction </th>
          <th> Total price  </th>
          </tr>
	    <?php foreach ($orders as $obj):?>
          <tr>
              <td><?php echo $obj->resId;?></td>
              <td><?php echo $obj->resDate;?></td>
              <td><?php echo $obj->destName;?></td>
              <td><?php echo $obj->attractionName;?></td>
              <td><?php echo $obj->totalPrice;?></td>
          </tr>
           <?php endforeach; ?>
      </table>
    <?php endif;?>
    </div>


