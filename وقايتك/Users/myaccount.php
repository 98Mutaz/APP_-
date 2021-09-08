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
          <h6 class="mb-0"><center>حسابي</center></h6>
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
              <div class="user-profile me-3"><img src="../img/user11.png" alt=""></div>
              <div class="user-info">
                <p class="mb-0 text-white" dir="ltr"><?php echo $Phone_Number; ?></p>

                <h5 style="color:#fff" class="mb-0"><?php echo $Name; ?></h5>


              </div>
            </div>
          </div>
          <!-- User Meta Data-->
          <div class="card user-data-card">
            <div class="card-body">
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-user"></i><span>&nbsp; الاسم</span></div>
                <div class="data-content"><?php echo $Name; ?></div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-mobile"></i><span>&nbsp; رقم الهاتف</span></div>
                <div class="data-content" dir="ltr"><?php echo $Phone_Number; ?></div>
              </div>
            
             
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-calendar"></i><span>&nbsp; تاريخ الميلاد</span></div>
                <div class="data-content"><?php echo $DOB; ?></div>
              </div>
             
              <!-- Edit Profile-->
              <div class="edit-profile-btn mt-3"><a class="btn btn-danger w-100" href="edit-account.php">تعديل حسابي</a></div>
              <div class="edit-profile-btn mt-3"><a class="btn btn-danger w-100" href="change-password.php">تعديل كلمة المرور</a></div>
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