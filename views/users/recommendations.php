<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/recommendations_style.css');?> "> 
<div id="recommendations">
    <h1 style="font-family: Aladin; font-size: 70px;"> Welcome to your recommendations page! </h1>
    <?php if ($order=="ordered before"): ?>
    <h4> since we want you to have the perfect trip, we tailor your next destination based on your past trips! </h4>
    <h5> after looking at your past orders we found out that you like the following categories: </h5>
        <?php for ($i=0; $i<sizeof($categoriesOfPrevOrders); $i++){
            echo' - '.$categoriesOfPrevOrders[$i]->category.'<br>';
        }
        ?>
    <p>Before we introduce you all the attractions in this category(that you haven't ordered yet),<br>
        We want to help you to choose you'r next destination according to your preferences. <br>
        Here you can see all the destinations in our website that offers attractions that belongs to
        your most favorite category: <?php echo $categoryOrderedTheMost?>,<br> and the quantity of those attractions in each one:
    </p>
    <?php for($i=0; $i<sizeof($destsForFavCategory); $i++){
        echo 'destination: '.$destsForFavCategory[$i]->destName.', number Of attractions: '.$destsForFavCategory[$i]->numOfAtt .'<br>';    
    }?>
    <br>
    <p> and this is a list of all the attractions you haven't ordered before and match to your preferred categories:</p>
        <?php for ($i=0; $i< sizeof($recommendByPastOrders); $i++){
         for($j=0; $j< sizeof($recommendByPastOrders[$i]); $j++){
             echo ' - '.$recommendByPastOrders[$i][$j]->attractionName." ".$recommendByPastOrders[$i][$j]->destName.'<br>';
         }
    }           
    ?>
    <?php else: ?>
    <h4> since we want you to have the perfect trip, we matched characteristic's of users that ordered from us before, in order to suggest you the ideal next destination </h4>
    <br>
    <button onclick="showText1()"> 
        Recommend me by users with identical personal information!
    </button><br>
    <div id='perfectMatch'></div> <br>
    <button onclick="showText2()">
        Recommend me by my marital status!
    </button><br>
    <div id='maritalStatus'></div> <br>
    <button onclick="showText3()">
        Recommend me by my preferred Travel Type!
    </button><br>
    <div id='travelType'></div> <br>
    <button onclick="showText4()">
        Recommend me by my Age Group!
    </button><br>
    <div id='ageGroup'></div> <br>
    <button onclick="showText5()">
        Recommend me by my Gender!
    </button>
    <div id='gender'></div> 
</div>

<script>
 function showText1(){
              var x = document.getElementById("perfectMatch");
                  x.innerHTML = ` <?php if($perfectMatch != null): echo 'The most popular destination among users like you is: '.$perfectMatch?>
                     <?php else: echo "We couldn't find orders of users that fully similar to you "?>
                    <?php endif;?>`;
        }
        
        function showText2(){
              var x = document.getElementById("maritalStatus");
                  x.innerHTML =`<?php if($byMaritalStatus != null):
                          echo 'We see that you are '.$this->session->all_userdata()["user"]->maritalStatus.', the most popular destination among
                          users with this marital status is: '.$byMaritalStatus?>
                          <?php else: echo "We ouldn't find orders of users with the same marital status"?>
                          <?php endif;?>`;
        }
        
          function showText3(){
              var x = document.getElementById("travelType");
              <?php if ($byTravelType != null):
                      if($this->session->all_userdata()["user"]->travelType == 'Both'):?>
                       x.innerHTML = `<?php echo 'We see that you like urban and nature, the most popular destination among
                          users with this prferred travel type is: '.$byTravelType;?>`;
                      <?php else:?>
                          x.innerHTML = `<?php echo 'We see that you like '.$this->session->all_userdata()["user"]->travelType.', the most popular destination among
                          users with this preferred travel type is: '.$byTravelType;?>`;
                      <?php endif;?>
               <?php else:?> x.innerHTML = `<?php echo "We couldn't find orders of users with the same travel Type"?>`;
               <?php endif;?>
              }
                  
          function showText4(){
              var x = document.getElementById("ageGroup");
                  x.innerHTML = ` <?php if($byAgeGroup != null): echo 'We see that you are '.$this->session->all_userdata()["user"]->age.' years old, 
                      the most popular destination among people at your age group is: '.$byAgeGroup?>
                     <?php else: echo "We couldn't find orders of users at your age group"?>
                    <?php endif;?>`;
                }
           function showText5(){
              var x = document.getElementById("gender"); 
                  x.innerHTML = `<?php if($byGender !=null): echo 'We see that you are a '.$this->session->all_userdata()["user"]->gender.', the most popular destination among
                          users with this gender is: '.$byGender?>
                          <?php else: echo "We couldn't find orders of users from your gender"?>
                          <?php endif;?>`;
                                  
                }
</script>
<?php endif ?>

