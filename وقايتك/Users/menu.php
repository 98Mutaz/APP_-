<?php

session_start();

include '../includes/config.php';


?>



  <div class="suha-sidenav-wrapper" id="sidenavWrapper" >
      <!-- Sidenav Profile-->
	  
	  
	  <div class="sidenav-profile">
        <div class="user-profile"><img src="../img/icon.png" alt=""></div>
        <div class="user-info">
          <h6 class="user-name mb-0" style="color:#fff"><?php echo $Name; ?></h6>
          <p class="available-balance" dir="ltr" style="color:#fff"><?php echo $Phone_Number; ?></p>
        </div>
      </div>
	  
	  
	  
	 
     




	 <ul class="sidenav-nav ps-0">
        <li><a href="index.php"><i class="lni lni-home"> </i>&nbsp;الرئيسية </a></li>
        <li><a href="myaccount.php"><i class="lni lni-user"> </i>&nbsp;حسابي </a></li>
        <li><a href="myrequests.php"><i class="lni lni-list"> </i>&nbsp;طلباتي </a></li>
        <li><a href="logout.php"><i class="lni lni-exit"> </i>&nbsp;خروج </a></li>
      </ul>
      <!-- Go Back Button-->
      <div class="go-home-btn" id="goHomeBtn"><i class="lni lni-arrow-right"></i></div>
    </div>
	