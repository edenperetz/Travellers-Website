<div class = "container">
    <?php echo form_open('Auth/do_login'); ?>
    <?php if($error): echo $error?>
    <?php endif?>
  <div class="form-group">
    <label for="username">username</label>
    <input type="text" class="form-control" id="username" placeholder="Enter username" name = "username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  
 <?php echo form_close(); ?>
</div>

