<?php

	include 'includes/config.php';



	session_start();









$Error ='';




	if(isset($_POST['Submit']))
	{
	



		
	$Phone_Number=mysqli_real_escape_string($dbConn,$_POST['Phone_Number']);
	$Password=mysqli_real_escape_string($dbConn,$_POST['Password']);



	$Longitude=$_POST['Longitude'];
	$Latitude=$_POST['Latitude'];



	$query = mysqli_query($dbConn,"SELECT * FROM users WHERE Phone_Number='$Phone_Number' AND (Status='Active' AND Password='$Password')"); 
			

	if (mysqli_num_rows($query)>0)
	{

	$row=mysqli_fetch_array($query);
	$U_ID=$row['ID'];
	$_SESSION['U_Log'] = $U_ID;


	$query = mysqli_query($dbConn,"update users set Longitude='$Longitude', Latitude='$Latitude' where ID='$U_ID'"); 






	
	
	
	
	
	
	
	
	
	
	
	
	

		
		
		echo '<script language="JavaScript">
				document.location="Users/index.php";
			</script>';
		
		
	}
	else
	{

	$Error = 'نعتذر ... ارجو التأكد من معلومات وحالة الدخول من قبل مدير التطبيق !';


	}
	}


	?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
     <?php include 'style.php'; ?>



<style>

.field-icon {
	  float: right;
	  margin-right: 10px;
	  margin-top: -25px;
	  position: relative;
	  z-index: 2;
	}


</style>


  </head>
  <body onLoad="getLocation();">
			
			
			<script>
	var x = document.getElementById("demo");

	function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		} else { 
			x.innerHTML = "Geolocation is not supported by this browser.";
		}
	}

	function showPosition(position) {
	  
		
		 document.getElementById('long').value = position.coords.longitude;
			 document.getElementById('lat').value = position.coords.latitude
			 
			 
			 
			 
	}
	</script>  
    <!-- Preloader-->
    <div class="preloader" id="preloader">
      <div class="spinner-grow text-secondary" role="status">
        <div class="sr-only">جاري التحميل ...</div>
      </div>
    </div>
    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
      <!-- Background Shape-->
      <div class="background-shape"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5"><img class="big-logo" src="img/logo.png" width="60%" alt="">
            <!-- Register Form-->
            <div class="register-form mt-5 px-4">
              <form action="login.php" method="post" dir="ltr">
			  
			  
		
		   
		   
	  <INPUT TYPE="hidden" NAME="Longitude" ID="long" VALUE="">
						<INPUT TYPE="hidden" NAME="Latitude" ID="lat" VALUE="">
		 
		 
		 
		 
                <div class="form-group text-start mb-4"><span><center>رقم الهاتف</center></span>
                  <label for="username"><i class="lni lni-mobile"></i></label>
                  <input class="form-control" id="username" name="Phone_Number" type="tel" style="color:#fff" placeholder="رقم الهاتف" value="+962" required>
				  						<center><div style="color:#fff; font-size:11px; margin-top:5px "><font >رقم الهاتف لا يبدأ برقم 0</font></div></center>

                </div>
                <div class="form-group text-start mb-4"><span><center>كلمة المرور</center></span>
                  <label for="password"><i class="lni lni-lock"></i></label>
                  <input class="form-control" id="password" name="Password" style="color:#FFFFFF" type="password" placeholder="" required>
				  						<span toggle="#password" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>

                </div>
                <button class="btn btn-success btn-lg w-100" name="Submit" type="submit">دخول</button>
															<center><span style="color:#fff"><?php echo $Error; ?></span></center>

              </form>
            </div>
            <!-- Login Meta-->
            <div class="login-meta-data"><a class="forgot-password d-block mt-3 mb-1" href="forget-password.php">هل فقدت كلمة المرور؟</a>
              <p class="mb-0" style="color:#fff">ليس لديك حساب؟<a class="ms-1" href="register.php"> سجل الان</a></p>
            </div>
            <div class="view-as-guest mt-3"><a class="btn" style="color:#FFFFFF" href="index.php">رجوع</a></div>

          </div>
        </div>
      </div>
    </div>
    <!-- All JavaScript Files-->

<?php include 'scripts.php'; ?>






	<script>
	$(".toggle-password").click(function() {

	  $(this).toggleClass("fa-eye fa-eye-slash");
	  var input = $($(this).attr("toggle"));
	  if (input.attr("type") == "password") {
		input.attr("type", "text");
	  } else {
		input.attr("type", "password");
	  }
	});
	</script>
	
	

  </body>
</html>