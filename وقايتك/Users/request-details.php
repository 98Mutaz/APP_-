<?php


session_start();

include '../includes/config.php';






 include 'session_check.php';





$R_ID = $_GET['R_ID'];




$sql4 = mysqli_query($dbConn,"select * from requests where ID='$R_ID'");
$row4 = mysqli_fetch_array($sql4);
		$R_ID = $row4['ID'];
						$User_ID = $row4['User_ID'];
						$Type = $row4['Type'];
						$Description = $row4['Description'];
						
						$Total_Rates = $row4['Total_Rates'];
						$Longitude = $row4['Longitude'];
						$Latitude = $row4['Latitude'];
						$Status = $row4['Status'];
						$Add_Date_Time = $row4['Add_Date_Time'];
						
						
						
	
						



if ($Total_Rates!='0'){


$Visibility = "hidden";

}else{
	
$Visibility = "visible";
	
	
}








if(isset($_POST['Submit']))
{
	
	
	
	
	$R_ID = $_POST['R_ID'];

	
$sql45 = mysqli_query($dbConn,"select * from requests where ID='$R_ID'");
$row45 = mysqli_fetch_array($sql45);
$Total_Rates=$row45['Total_Rates'];

if ($Total_Rates!='0'){
	
	
echo "<script language='JavaScript'>
			  alert ('تم تقييم الطلب مسبقاً !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='request-details.php?R_ID=".$R_ID."';
        </script>";
	
}else{







	
	
	
	
	
	
$R_ID = mysqli_real_escape_string($dbConn,$_POST['R_ID']);


$Total_Rates = mysqli_real_escape_string($dbConn,$_POST['Total_Rates']);




	

	
	

	
	
	


$insert = mysqli_query($dbConn,"update requests set Total_Rates='$Total_Rates' where ID='$R_ID'");


	
	
	
	

	
	
	
	
	
	
	
	
	
	echo "<script language='JavaScript'>
			  alert ('تم استلام تقييمك بنجاح !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='myrequests.php';
        </script>";
	
	
	
	
	
	
	
	
	
}
}

?>
<html lang="ar" dir="rtl">
  <head>
   
   
    <?php include 'style.php'; ?>



<style>
#map {
        height: 350px;
		width: 100%;
      }
</style>



  </head>
  <body style="background-color:#1d1d1b">
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
        <div class="back-button" ><a href="myrequests.php?DID=<?php echo $DID; ?>">
           
			
			<svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg>
			
			</a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0"><center><?php echo $Type; ?></center></h6>
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
      <!-- Product Slides-->
      <div class="product-slides owl-carousel">
        <!-- Single Hero Slide-->
       
        <div class="single-product-slide" style="background-image: url('../img/logo.png')"></div>
      </div>
      <div class="product-description pb-3">
        <!-- Product Title & Meta Data-->
        <div class="product-title-meta-data bg-white mb-3 py-3">
          <div class="container d-flex justify-content-between">
            <div class="p-title-price">
              <h4 class="mb-1"><?php echo $Type; ?></h4>
            </div>
          <!-- Ratings-->
          <div class="product-ratings">
		  
            <div class="container d-flex align-items-center justify-content-between">
              <div class="total-result-of-ratings"><span class="badge badge-primary" style="color:#fff !important"><?php echo $Status; ?></span>
			  
			  <br><br>
			  <span class="badge badge-primary" style="color:#fff !important"><?php echo $Add_Date_Time; ?></span>
			  </div>      

			  </div>

            </div>
          </div>
        </div>
       
		
		
		
		
		
		
		
       
  
        <!-- Product Specification-->
        <div class="p-specification bg-white mb-3 py-3">
          <div class="container">
		  
		 
           
		   
		   
		   
		    <h6>التفاصيل</h6>
            <p><?php echo $Description; ?></p>
			
			 
		  <br>
			
			
			
			
            <h6>العنوان</h6>
            			
 <div id="map"></div>
   	   
	       <script>

      function initMap() {
        var myLatLng = {lat: <?php echo $Latitude; ?>, lng: <?php echo $Longitude; ?>};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: myLatLng,
		    mapTypeId: 'satellite'

        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: '<?php echo $Order_Number; ?>'
        });
      }
    </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCC3rHaqjNvzdrImcm7vllRtDgbAT-AaY&callback=initMap">
    </script>


			
			
			
          </div>
        </div>
        <!-- Rating & Review Wrapper-->
        <div class="rating-and-review-wrapper bg-white py-3 mb-3" style="visibility:<?php echo $Visibility; ?>">

        <!-- Ratings Submit Form-->
        <div class="ratings-submit-form bg-white py-3">
          <div class="container">
            <h6>تقييم الطلب</h6>
            <form action="request-details.php?R_ID=<?php echo $R_ID; ?>" method="post">
			<input type="hidden" name="R_ID" value="<?php echo $R_ID; ?>"/>			


              <div class="stars mb-3" dir="rtl">
                <input class="star-1" type="radio" name="Total_Rates" value="1" id="star1">
                <label class="star-1" for="star1"></label>
                <input class="star-2" type="radio" name="Total_Rates" value="2" id="star2">
                <label class="star-2" for="star2"></label>
                <input class="star-3" type="radio" name="Total_Rates" value="3" id="star3">
                <label class="star-3" for="star3"></label>
                <input class="star-4" type="radio" name="Total_Rates" value="4" id="star4">
                <label class="star-4" for="star4"></label>
                <input class="star-5" type="radio" name="Total_Rates" value="5" id="star5">
                <label class="star-5" for="star5"></label><span></span>
              </div>
              <button class="btn btn-primary" name="Submit" type="submit">ارسال</button>
            </form>
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