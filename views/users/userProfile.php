 <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/userProfilePage.css');?> "> 

   <div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-black">
                                <div class="m-b-25"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> </div>
                                <h6 class="h6"><?php echo $user['username']?></h6>
                                <center><a id="prev_orders" href="<?php echo site_url('Attractions/show_prev_orders');?>">See your previous orders</a></center> <br>
                                <center><a id="prev_orders" href="<?php echo site_url('Attractions/recommendations');?>">Suggested destinations</a></center><br>
                                
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Full Name</p>
                                        <h6 class="text-muted f-w-400"><?php echo $user['user']->fullName ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Age</p>
                                        <h6 class="text-muted f-w-400"><?php echo $user['user']->age ?></h6>
                                    </div>
                                </div>
                               
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Gender</p>
                                        <h6 class="text-muted f-w-400"><?php echo $user['user']->gender ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Martial Status</p>
                                        <h6 class="text-muted f-w-400"><?php echo $user['user']->maritalStatus ?></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Preferred Travel Type</p>
                                        <h6 class="text-muted f-w-400"><?php echo $user['user']->travelType ?></h6>
                                    </div>
                                </div>
                            </div>
                            <center><a id="prev_orders" href="<?php echo site_url('Home/usersStatistics');?>">Watch details of other users</a></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>



