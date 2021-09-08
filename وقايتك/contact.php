<?php

session_start();
include 'includes/config.php';






if(isset($_POST['Submit']))
{
$Full_Name = $_POST['Full_Name'];
$Email_Address = $_POST['Email_Address'];
$Subject = $_POST['Subject'];
$Message = $_POST['Message'];



$Email = 'info@test.com';

$Header = "From: وقايتك - Contact Us Form | ".$Full_Name." - ".$Email_Address;
	
mail ($Email,$Subject,$Message,$Header);




echo "<script language='JavaScript'>
			  alert ('تم ارسال رسالتك بنجاح !');
      </script>";




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
        <div class="back-button" ><a href="index.php">
           
			
<svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg>			
			</a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">اتصل بنا</h6>
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
      <!-- Google Maps-->
    <br><br>
      <div class="container">
        <div class="section-heading mt-3">
          <p class="mb-4" ><center><font style="color:#000 !important">تواصل معنا وسيتم الرد عليك في أقرب وقت ممكن</center></font></p>
        </div>
        <!-- Contact Form-->
        <div class="contact-form mt-3 pb-3">
          <form action="contact.php" method="post">
            <input class="form-control mb-3" id="username" type="text" placeholder="الاسم الكامل">
            <input class="form-control mb-3" id="email" type="email" placeholder="البريد الإلكتروني">
            <input class="form-control mb-3" type="text" placeholder="العنوان">
           
            <textarea class="form-control mb-3" id="message" name="Message" cols="30" rows="7" placeholder="رسالتك ..."></textarea>
            <button class="btn btn-success btn-lg w-100" name="Submit">ارسل</button>
          </form>
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