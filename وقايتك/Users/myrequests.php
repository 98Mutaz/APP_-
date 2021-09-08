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
        <div class="back-button" ><a href="index.php?DID=<?php echo $DID; ?>">
           
			
			<svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg>
			
			</a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0"><center>طلباتي</center></h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler d-flex justify-content-between flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span></div>
      </div>
    </div>
    <!-- Sidenav Black Overlay-->
    <div class="sidenav-black-overlay"></div>
    <!-- Side Nav Wrapper-->




      <?php include 'menu.php'; ?>
    <div class="page-content-wrapper">
   
   
   
   
   
   
    <div class="top-products-area py-3" dir="ltr">
        <div class="container">
        
          <div class="row g-3">
            <!-- Single Weekly Product Card-->
			
			
			
			
			<?php
					$sql1 = mysqli_query($dbConn,"select * from requests where User_ID='$U_ID' order by ID DESC");

		

					while ($row1 = mysqli_fetch_array($sql1)){
						
						$R_ID = $row1['ID'];
						$Type = $row1['Type'];
						$Description = $row1['Description'];
						$Longitude = $row1['Longitude'];
						$Latitude = $row1['Latitude'];
						$Total_Rates = $row1['Total_Rates'];
						$Status = $row1['Status'];
						$Add_Date_Time = $row1['Add_Date_Time'];
																		

				




						?>
						
						
						
						
			
			
            <div class="col-12 col-md-6">
              <div class="card weekly-product-card">
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side"><br><br><span class="badge badge-primary" style="font-size:10px !important; color:#fff !important;"><?php echo $Status; ?></span><a class="wishlist-btn" href="request-details.php?R_ID=<?php echo $R_ID; ?>"></a><a class="product-thumbnail d-block" href="request-details.php?R_ID=<?php echo $R_ID; ?>"><img src="../img/icon.png" width="75%" alt=""></a></div>
                  
				  <div dir="rtl" class="product-description"><a class="product-title d-block" href="request-details.php?DID=<?php echo $DID; ?>&R_ID=<?php echo $R_ID; ?>"><?php echo $S_Name; ?></a>
                    <p class="sale-price"><i class="lni lni-list"></i>&nbsp; <?php echo $Type; ?></p>
                    <p class="sale-price"><i class="lni lni-list"></i>&nbsp; <?php echo $Description; ?></p>
                    <p class="sale-price"><i class="lni lni-star-filled"></i>&nbsp; 
					

					
					 <?php
				  
				  for ($i=1; $i<=$Total_Rates; $i++){
					  
					  
					  echo '<span class="lni lni-star-filled" style="color:#ffbe00"></span>';
					  
					  
					  
				  }
				  
				  ?>
					
					
					</p>
					
					
					
					                    

					
					
					
                  </div>
                </div>
              </div>
            </div>
			
			
			
			
			<?php
					}
					?>
			
			
			
			
		
		
		
		
          </div>
        </div>
      </div>
   
   
   
   
   
   
   
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
<?php include 'menu-footer.php'; ?>






    <!-- All JavaScript Files-->
  
<?php include 'scripts.php'; ?>
  </body>
</html>