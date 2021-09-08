<?php 


session_start();

include '../includes/config.php';





include 'session_check.php';










$Error='';



if(isset($_POST['Submit']))
{
	
	
	
	
	
$U_ID=mysqli_real_escape_string($dbConn,$_POST['U_ID']);
$Name=mysqli_real_escape_string($dbConn,$_POST['Name']);
$DOB=mysqli_real_escape_string($dbConn,$_POST['DOB']);
$Phone_Number=mysqli_real_escape_string($dbConn,$_POST['Phone_Number']);



$query = mysqli_query($dbConn,"SELECT * FROM users WHERE Phone_Number='$Phone_Number' AND ID!='$U_ID'"); 

		

if (mysqli_num_rows($query)>0)
{



echo "<script language='JavaScript'>
			  alert ('Sorry ... This Phone Number Is Already Used !');
      </script>";
	  
	  
	
}else
{





$birthday_timestamp = strtotime($DOB);  


$Age = date('md', $birthday_timestamp) > date('md') ? date('Y') - date('Y', $birthday_timestamp) - 1 : date('Y') - date('Y', $birthday_timestamp);


if ($Age<18){
	
	$Error = 'نعتذر ... العمر اقل من 18 عام !';

	
	
}else{
	



	$insert = mysqli_query($dbConn,"update users set Name='$Name', DOB='$DOB' where ID='$U_ID'");

	
	
	

	





$Error = 'تم تعديل معلومات الحساب !';



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
    <!-- Header Area-->
    <div class="header-area" id="headerArea" style='direction: ltr'>
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button" ><a href="myaccount.php?DID=<?php echo $DID; ?>">
           
			
			<svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg>
			
			</a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0"><center>تعديل حسابي</center></h6>
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

                <h5 style="color:#fff" class="mb-0"><?php echo $Name; ?></h5>
              </div>
            </div>
          </div>
          <!-- User Meta Data-->
          <div class="card user-data-card">
            <div class="card-body">
              <form action="edit-account.php" method="post">
			  <input type="hidden" name="U_ID" value="<?php echo $U_ID; ?>"/>
				
				
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-user"></i><span>&nbsp; الاسم</span></div>
                  <input class="form-control" type="text" name="Name" value="<?php echo $Name; ?>" placeholder="الاسم">
                </div>
               
			   
			    <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-phone"></i><span>&nbsp; رقم الهاتف</span></div>
                  <input class="form-control" type="tel" name="Phone_Number" value="<?php echo $Phone_Number; ?>" placeholder="رقم الهاتف">
                </div>
				
				
               
                
                <div class="mb-3">
                  <div class="title mb-2"><i class="lni lni-calendar"></i><span>&nbsp;  تاريخ الميلاد</span></div>
                  <input class="form-control" type="date" name="DOB" value="<?php echo $DOB; ?>">
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