<?php


session_start();

include '../includes/config.php';






 include 'session_check.php';










$Error='';



if(isset($_POST['Submit']))
{
	
	
	
	
	
$U_ID=mysqli_real_escape_string($dbConn,$_POST['U_ID']);
$Old_Password=mysqli_real_escape_string($dbConn,$_POST['Old_Password']);
$New_Password=mysqli_real_escape_string($dbConn,$_POST['New_Password']);
$Password=mysqli_real_escape_string($dbConn,$_POST['Password']);
$Confirm_Password=mysqli_real_escape_string($dbConn,$_POST['Confirm_Password']);


		
		
	if ($Old_Password==$Password){
		
		
		if ($New_Password==$Confirm_Password){
			
			
		
		$update = mysqli_query($dbConn,"update users set Password='$New_Password' where ID='$U_ID'");
		
	
		
		
	
	$Error = 'تم تغيير كلمة المرور بنجاح !';

	
		}else{
			
			
	$Error = 'نعتذر ... كلمة المرور الجديدة وتأكيدها غير متطابقين !';
		
			
			
		}
	

	
	}else{
		
	$Error = 'نعتذر ... كلمة المرور القديمة خاطئة !';
		
	
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
    <!-- Header Area-->
    <div class="header-area" id="headerArea" style='direction: ltr'>
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button" ><a href="myaccount.php">
           
			
			<svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg>
			
			</a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0"><center>تعديل كلمة المرور</center></h6>
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
			
              <div class="user-profile me-3"><img src="../img/user11.png" alt="">

               
              </div>
              <div class="user-info">
                <p class="mb-0 text-white" dir="ltr"><?php echo $Phone_Number; ?></p>

                <h5 class="mb-0"><?php echo $Name; ?></h5>
              </div>
            </div>
          </div>
          <!-- User Meta Data-->
          <div class="card user-data-card">
            <div class="card-body">
              <form action="change-password.php" method="post">
			  <input type="hidden" name="U_ID" value="<?php echo $U_ID; ?>"/>
											<input type="hidden" name="Password" value="<?php echo $Password; ?>"/>
			
				
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-key"></i><span>&nbsp; كلمة المرور القديمة</span></div>
                  <input class="form-control" type="password" name="Old_Password" placeholder="كلمة المرور القديمة" value="" placeholder="الاسم" required >
                </div>
               
               
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-key"></i><span>&nbsp;  كلمة المرور الجديدة</span></div>
                  <input class="form-control" type="password" name="New_Password" placeholder="كلمة المرور الجديدة" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required title="Must Contain At Least One Number And One Uppercase And Lowercase Letter, And At Least 8 Or More Characters">
                					<center><span style="font-size: 12px; color:red">ملاحظة: يجب استخدام حرف واحد كبير وحرف واحد صغير ورقم واحد على الأقل، ويجب ان تكون كلمة المرور من 8 خانات فأكثر</span></center>

				</div>
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-key"></i><span>&nbsp;  تأكيد كلمة المرور الجديدة</span></div>
                  <input class="form-control" type="password" name="Confirm_Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required title="Must Contain At Least One Number And One Uppercase And Lowercase Letter, And At Least 8 Or More Characters" placeholder="تأكيد كلمة المرور الجديدة">
                					<center><span style="font-size: 12px; color:red">ملاحظة: يجب استخدام حرف واحد كبير وحرف واحد صغير ورقم واحد على الأقل، ويجب ان تكون كلمة المرور من 8 خانات فأكثر</span></center>

				</div>
                <button class="btn btn-success w-100" name="Submit" type="submit">تعديل</button>
				<br><br>
				<center><font style='color:red'><?php echo $Error; ?></font></center>
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