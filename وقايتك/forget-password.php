<?php

include 'includes/config.php';



session_start();








	$Error ='';



if(isset($_POST['Submit']))
{
	





	
$Phone_Number = mysqli_real_escape_string($dbConn,$_POST['Phone_Number']);



$sql = mysqli_query($dbConn,"select * from users where Phone_Number='$Phone_Number'");

if (mysqli_num_rows($sql)>0){

$row = mysqli_fetch_array($sql);
$U_ID = $row['ID'];
$Phone_Number = $row['Phone_Number'];

$Password = rand(1000,9999);
$New_Password = $Password;

$sql1 = mysqli_query($dbConn,"update users set Password='$New_Password' where ID='$P_ID'");




$PNN = substr($Phone_Number, 1,3);
if ($PNN=='962'){








}
else{
	
	
	
}



$Error = 'تم ارسال كلمة المرور بنجاح !';



	
	
}else{	  
	

$Error = 'عذرا ... ارجو التأكد من رقم الهاتف';
	


}
	

}



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
    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
      <!-- Background Shape-->
      <div class="background-shape"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5"><img class="big-logo" src="img/logo.png" width="50%" alt="">
            <!-- Register Form-->
            <div class="register-form mt-5 px-4">
              <form dir="ltr" action="forget-password.php" method="post" >
			  

			  
		
	 
	 
	 
               
                  <div class="form-group text-start mb-4"><span><center>رقم الهاتف</center></span>
                  <label for="username"><i class="lni lni-mobile"></i></label>
                  <input class="form-control" id="username" name="Phone_Number" type="tel" style="color:#fff" placeholder="رقم الهاتف" value="+962" required>
				  						<center><div style="color:#fff; font-size:11px; margin-top:5px "><font >رقم الهاتف لا يبدأ برقم 0</font></div></center>

                </div>
				
				
				
				
			
                <button class="btn btn-success btn-lg w-100" name="Submit" type="submit">تغيير كلمة المرور</button>
				<br><br>
                <a href="login.php" class="btn btn-danger btn-lg w-100" >رجوع</a>
							  														<br><br><center><span style="color:#000"><?php echo $Error; ?></span></center>


              </form>
            </div>
          
          </div>
        </div>
      </div>
    </div>
    <!-- All JavaScript Files-->



<?php include 'scripts.php'; ?>






	
	
  </body>
</html>