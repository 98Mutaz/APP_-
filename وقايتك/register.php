<?php

include 'includes/config.php';



session_start();







if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPad')) 
{
$nav_show="visible";


}else{ 

$nav_show="hidden";

	
	
}





	$Error ='';





$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));



$loc = $details->loc;

$string=explode(",", $loc);

$new_string_1=$string[0];
$new_string_2=$string[1];




if(isset($_POST['Submit']))
{
	

$Name=mysqli_real_escape_string($dbConn,$_POST['Name']);
$Phone_Number=mysqli_real_escape_string($dbConn,$_POST['Phone_Number']);
$DOB=mysqli_real_escape_string($dbConn,$_POST['DOB']);
$Password=mysqli_real_escape_string($dbConn,$_POST['Password']);


$Longitude=mysqli_real_escape_string($dbConn,$_POST['Longitude']);
$Latitude=mysqli_real_escape_string($dbConn,$_POST['Latitude']);





$birthday_timestamp = strtotime($DOB);  


$Age = date('md', $birthday_timestamp) > date('md') ? date('Y') - date('Y', $birthday_timestamp) - 1 : date('Y') - date('Y', $birthday_timestamp);


if ($Age<18){
	
	$Error = 'نعتذر ... العمر اقل من 18 عام !';

	
	
}else{



$query = mysqli_query($dbConn,"SELECT * FROM users WHERE Phone_Number='$Phone_Number'"); 


		


if (mysqli_num_rows($query)>0)
{

$Error = 'نعتذر ... رقم الهاتف مسجل مسبقا !';




	

}else{


$insert = mysqli_query($dbConn,"insert into users (Name,Phone_Number,DOB,Password,Latitude,Longitude,Status) values ('$Name','$Phone_Number','$DOB','$Password','$Latitude','$Longitude','Active')");




$Error = '<a style="color:red !important" href="login.php">تم التسجيل بنجاح ... انقر هنا لتسجيل الدخول</a>';

}
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
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5"><img class="big-logo" src="img/logo.png" width="30%" alt="">
            <!-- Register Form-->
            <div class="register-form mt-5 px-4">
              <form action="register.php" method="post" style='direction: rtl'>
			  
			  														<center><span style="color:red"><?php echo $Error; ?></span></center>

		
	 

  <INPUT TYPE="hidden" NAME="Longitude" ID="long" VALUE="<?php echo $new_string_2; ?>">
					<INPUT TYPE="hidden" NAME="Latitude" ID="lat" VALUE="<?php echo $new_string_1; ?>">
	 
	 
	 
	 
	 
	 
			  <div class="form-group text-start mb-4"><span><center>الاسم الكامل</center></span>
                  <label for="username"><i class="lni lni-user"></i></label>
                  <input class="form-control" id="username" type="Name" name="Name" style="color:#fff;" value="<?php echo isset($_POST['Name']) ? $_POST['Name'] : '' ?>"  required>
                </div>
                <div class="form-group text-start mb-4"><span><center>رقم الهاتف</center></span>
                  <label for="username"><i class="lni lni-mobile"></i></label>
                  <input class="form-control"  id="username" type="tel" style='color:#fff; direction: ltr' name="Phone_Number" value="+962" required>
				  					<center><div style="color:#fff; font-size:11px; margin-top:5px "><font >رقم الهاتف لا يبدأ برقم 0</font></div></center>

                </div>
             
				
				
				  <div class="form-group text-start mb-4"><span><center>تاريخ الميلاد</center></span>
                  <label for="email"><i class="lni lni-envelope"></i></label>
                  <input class="form-control" id="email" style="color:#fff;" type="date" name="DOB" value="<?php echo isset($_POST['DOB']) ? $_POST['DOB'] : '' ?>" required>
                </div>
				
				
				
                <div class="form-group text-start mb-4"><span><center>كلمة المرور</center></span>
                  <label for="password"><i class="lni lni-lock"></i></label>
                  <input class="input-psswd form-control" style="color:#FFFFFF" id="registerPassword" type="text" minlength="6" name="Password" value="<?php echo isset($_POST['Password']) ? $_POST['Password'] : '' ?>"  required>
					<center><div style="color:#fff; font-size:11px; margin-top:5px "><font >كلمة المرور يجب ان تتكون من 6 خانات على الأقل</font></div></center>
               
			   </div>
                <button class="btn btn-success btn-lg w-100" name="Submit" type="submit">تسجيل جديد</button>

              </form>
            </div>
            <!-- Login Meta-->
            <div class="login-meta-data">
              <p class="mt-3 mb-0" style="color:#fff">لديك حساب مسبقاً؟<a class="ms-1" href="login.php?user_ID=<?php echo $user_ID; ?>&DID=<?php echo $DID; ?>"> دخول الان</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- All JavaScript Files-->



<?php include 'scripts.php'; ?>




  </body>
</html>