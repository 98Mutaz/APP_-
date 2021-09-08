<?php


session_start();

include '../includes/config.php';


include 'session_check.php';




$Error='';






$U_ID = $_SESSION['U_Log'];



if ($_SESSION['U_Log']==''){
echo '<script language="JavaScript">
 document.location="../index.php";
</script>';
}









$sql3 = mysqli_query($dbConn,"select * from users where ID='$U_ID'");
					$row3 = mysqli_fetch_array($sql3);
$Name=$row3['Name'];
$DOB=$row3['DOB'];
$Password=$row3['Password'];
$Phone_Number=$row3['Phone_Number'];


$Longitude=$row3['Longitude'];
$Latitude=$row3['Latitude'];






$url="https://maps.google.com/maps/api/geocode/json?latlng=".$Latitude.",".$Longitude."&key=AIzaSyBCC3rHaqjNvzdrImcm7vllRtDgbAT-AaY";
$curl_return=curl_get($url);

$obj=json_decode($curl_return);

$Address_2 = $obj->results[0]->formatted_address;

function curl_get($url,  array $options = array())
{
    $defaults = array(
        CURLOPT_URL => $url,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_TIMEOUT => 4
    );

    $ch = curl_init();
    curl_setopt_array($ch, ($options + $defaults));
    if( ! $result = curl_exec($ch))
    {
        trigger_error(curl_error($ch));
    }
    curl_close($ch);
    return $result;
}
	 
	 
	 





if(isset($_POST['Submit']))
{
$U_ID = mysqli_real_escape_string($dbConn,$_POST['U_ID']);
$Type = mysqli_real_escape_string($dbConn,$_POST['Type']);

$Latitude = mysqli_real_escape_string($dbConn,$_POST['Latitude']);
$Longitude = mysqli_real_escape_string($dbConn,$_POST['Longitude']);

$Description = mysqli_real_escape_string($dbConn,$_POST['Description']);



	
	
	
	
	
	


$insert = mysqli_query($dbConn,"insert into requests (User_ID,Type,Description,Longitude,Latitude,Total_Rates,Status) values ('$U_ID','$Type','$Description','$Longitude','$Latitude','0','قيد الانتظار')");

$Error = 'تم استلام معلوماتك بنجاح وسنقوم بالتواصل معك !';



echo '<script language="JavaScript">
            document.location="myrequests.php";
        </script>';
		
		
		
		
}
?>
<html lang="ar" dir="rtl">
  <head>
   
   
    <?php include 'style.php'; ?>





<style>
	



 #searchInput {
      background-color: #fff;
	  color: black;
      font-size: 15px;
      font-weight: 300;
      margin-left: 12px;
      padding: 0px 11px 0 13px;
      text-overflow: ellipsis;
      width: 70%;
	  margin-top: 12px;
   font-family: myFirstFont;
    }
    #searchInput:focus {
      border-color: #4d90fe;
	  	  color: black;

    }



</style>



<script src="https://code.jquery.com/jquery-2.1.1.min.js"
    type="text/javascript"></script>


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
          <h6 class="mb-0"><center><?php echo $Category_Name; ?></center></h6>
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
      <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3">
          <!-- User Information-->
          <div class="card user-info-card">
            <div class="card-body p-4 d-flex align-items-center">
			
              
              <div class="user-info">

                <h5 class="mb-0 text-white">ادخل معلومات طلبك</h5>
              </div>
            </div>
          </div>
          <!-- User Meta Data-->
          <div class="card user-data-card">
            <div class="card-body">
              <form action="new-order.php" method="post" enctype="multipart/form-data">
			  <input type="hidden" name="U_ID" value="<?php echo $U_ID; ?>"/>
				
																                        <center><p style="color:red"><?php echo $Error; ?></p></center>


				
				
				
				
				
				   <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-text-align-justify"></i><span>&nbsp;  النوع</span></div>
                  <input type="text" class="form-control" name="Type" value="" required>
                </div>
				
				
				
				
				
				
				
              
               
             
				
				
				
				
				
				
				
				
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-map-marker"></i><span>&nbsp;  العنوان</span></div>
                 
				 	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCC3rHaqjNvzdrImcm7vllRtDgbAT-AaY&callback=initMap&libraries=places"></script>

 							
											
											
				 <input id="searchInput" class="input-controls" type="text" value="" style="color:balck" placeholder="ابحث عن العنوان">
 <div class="map" id="map" style="border: 1px solid #ccc; border-radius: 4px;
     color:#000; width: 100%; height: 200px;"></div>
 <div class="form_area">
     <input type="hidden" name="Address" value="" id="location">
     <input type="hidden" name="Latitude" value="<?php echo $Latitude; ?>" id="lat">
     <input type="hidden" name="Longitude" value="<?php echo $Longitude; ?>" id="lng">
 </div>
<script>
/* script */
function initialize() {
   var latlng = new google.maps.LatLng(<?php echo $Latitude; ?>,<?php echo $Longitude; ?>);
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 13,
  zoomControl: true,
  mapTypeControl: false,
  scaleControl: false,
  streetViewControl: false,
  rotateControl: true,
  fullscreenControl: true
    });
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: true,
      anchorPoint: new google.maps.Point(0, -29)
   });
    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    var geocoder = new google.maps.Geocoder();
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
    var infowindow = new google.maps.InfoWindow();   
    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
  
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
       
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);          
    
        bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
        infowindow.setContent(place.formatted_address);
        infowindow.open(map, marker);
       
    });
    // this function will work on marker move event into map 
    google.maps.event.addListener(marker, 'dragend', function() {
        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {        
              bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
          }
        }
        });
    });
}
function bindDataToForm(address,lat,lng){
   document.getElementById('location').value = address;
   document.getElementById('lat').value = lat;
   document.getElementById('lng').value = lng;
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
				 
				 
				 
                </div>
				
				
				
				
				
				
				
				
				
				   <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-text-align-justify"></i><span>&nbsp;  التفاصيل</span></div>
                  <textarea class="form-control" name="Description" value="" required></textarea>
                </div>
				
				
				
				
				
				
				
				
                <button class="btn btn-success w-100" name="Submit" id="btnFetch" type="submit">ارسال</button>




 <script type="text/javascript">$(document).ready(function() {
$("#btnFetch").click(function() {
// disable button
$(this).prop("", true);
// add spinner to button
$(this).html(
'<i style="background-color:black !important; color:white !important" class="fa fa-circle-o-notch fa-spin"></i> <font style="color:white !important"> جاري الارسال ... الرجاء الانتظار</font>'
);
});
}); </script>




              </form>
			  



            </div>
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