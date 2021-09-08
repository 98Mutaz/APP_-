<?php
session_start();

include '../includes/config.php';


include 'session_check.php';

?>
<html lang="ar" dir="rtl">
  <head>
   
   
    <?php include 'style.php'; ?>


  </head>
  <body>
 
    <!-- Preloader-->
	<div class="preloader" id="preloader">
      <div class="spinner-grow text-secondary" role="status">
        <div class="sr-only">جاري التحميل ...</div>
      </div>
    </div>
    <!-- Header Area-->
    <div class="header-area" id="headerArea" style='direction: ltr'>
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button" ><a href="">
           
		
			<svg class="bi bi-arrow-right" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"></svg>
			
			</a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0"><center><img src="../img/icon.png" width="15%"/></center></h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler d-flex justify-content-between flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span></div>
      </div>
    </div>
    <!-- Sidenav Black Overlay-->
    <div class="sidenav-black-overlay"></div>
    <!-- Side Nav Wrapper-->




      <?php 

include "menu.php";

 ?>

	

	












<br>







    <!-- PWA Install Alert-->

    <div class="page-content-wrapper" dir="ltr">
      <div class="container">
        <div class="pt-3">
          <!-- Hero Slides-->
          <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide-->
            <div class="single-hero-slide" style="background-image: url('../img/1.png')">
             
            </div>
            <!-- Single Hero Slide-->
            <div class="single-hero-slide" style="background-image: url('../img/1.png')">
             
            </div>
            <!-- Single Hero Slide-->
            <div class="single-hero-slide" style="background-image: url('../img/1.png')">
             
            </div>
          </div>
        </div>
      </div>
	  
	  
	  
	  <br>

<br>




      <!-- Product Catagories-->
      <div class="product-catagories-wrapper py-3">
        <div class="container">
         
          <div class="product-catagory-wrap">
            <div class="row g-3">
             
			  
			  
			
			  
			  
			  
			   <div class="col-12">
                <div class="card catagory-card" style="box-shadow: 0px 0px 6px #747794;">
                  <div class="card-body"><a class="text-danger" href="new-order.php">
				  <center><img src="../img/kit.png" width="50%" />
				  </center>
				  <br>
				  <span><strong>طلباتي الطبية</strong></span></a></div>
                </div>
              </div>
              
			  
			  
			  
			  
			  
			  
			  

			  
          

            </div>
          </div>
        </div>
      </div>
   





<br>


 
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
<?php include 'menu-footer.php'; ?>






    <!-- All JavaScript Files-->
  
<?php include 'scripts.php'; ?>
  </body>
</html>