<?php
session_start();

include("../includes/config.php"); 


$A_ID = $_SESSION['A_Log'];


if (!$_SESSION['A_Log'])
echo '<script language="JavaScript">
 document.location="../Admin_Login.php";
</script>';

?>
<!DOCTYPE html>
<html class="transition-navbar-scroll top-navbar-xlarge bottom-footer" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>وقايتك - Administrator Portal</title>

  <!-- Vendor CSS BUNDLE -->
  <link href="../css/vendor/all.css" rel="stylesheet">

  <!-- Vendor CSS Standalone Libraries-->

  <link href="../css/app/app.css" rel="stylesheet">

 
    <link rel="shortcut icon" href="../images/logo.png"/>

</head>

<body>

  <!-- Fixed navbar -->
  <div class="navbar navbar-default navbar-fixed-top navbar-size-large navbar-size-xlarge paper-shadow" data-z="0" data-animated role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="navbar-brand navbar-brand-logo">
         <a href="index.php">
		 <font color="#1CADE2"><img src="../images/logo.png" width="70px" height="70px"/> </font>

          </a>
        </div>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="main-nav">
        <ul class="nav navbar-nav navbar-nav-margin-left">
         
		 
		 
		 <li class="dropdown active">
            <a href="index.php" class="">Home</a>
           
          </li>
		 
		 
		 
	
		 
		  
		 
		  
		 
        </ul>
        <div class="navbar-right">
          <ul class="nav navbar-nav navbar-nav-bordered navbar-nav-margin-right">
            <!-- user -->
            <li class="dropdown user active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../images/logo.png" alt="" class="img-circle" /> Admin<span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">

                <li><a href="Logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
              </ul>
            </li>
            <!-- // END user -->
          </ul>
        </div>
      </div>
      <!-- /.navbar-collapse -->

    </div>
  </div>

  <div class="parallax overflow-hidden bg-blue-400 page-section third">
    <div class="container parallax-layer" data-opacity="true">
      <div class="media v-middle">
        <div class="media-left text-center">
         
        </div>
        <div class="media-body">
          <h1 class="text-white text-display-1 margin-v-0">Requests</h1>
        </div>
       
      </div>
    </div>
  </div>

  <div class="container">

    <div class="page-section">
      <div class="row">
 <div class="col-md-3">

          <div class="panel panel-default" data-toggle="panel-collapse" data-open="true">
            <div class="panel-heading panel-collapse-trigger">
              <h4 class="panel-title">Main Menu</h4>
            </div>
            <div class="panel-body list-group">
              <ul class="list-group list-group-menu">
             <li class="list-group-item active"><a class="link-text-color" href="Requests_Management.php">Requests Management</a></li>

              </ul>
            </div>
          </div>
          

        </div>
        <div class="col-md-9">

         

          <div class="row" data-toggle="isotope">
            <div class="item col-xs-12 col-lg-12">
              <div class="panel panel-default paper-shadow" data-z="0.5">
                <div class="panel-heading">
                  <h4 class="text-headline margin-none">Requests Management</h4>
                </div>
                <ul class="list-group">
                  <li class="list-group-item media v-middle">
                    <div class="media-body">

				
				
          <div class="panel panel-default">
            <!-- Data table -->
            <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>User Name</th>
                  <th>User Phone Number</th>
                  <th>Type</th>
                  <th>Description</th>
                  <th>Total Rates</th>
                  <th>Status</th>
                  <th>Add Date / Time</th>
              
                  <th>Actions</th>
                </tr>
              </thead>
			  
			
						
						
            
			  
			  
					
              <tbody>
			  
			  
			     <?php
					$sql1 = mysqli_query($Conn,"select * from requests");
					while ($row1 = mysqli_fetch_array($sql1)){
						
						$R_ID = $row1['ID'];
						$User_ID = $row1['User_ID'];
						$Type = $row1['Type'];
						$Description = $row1['Description'];
						$Total_Rates = $row1['Total_Rates'];
						$Status = $row1['Status'];
						$Add_Date_Time = $row1['Add_Date_Time'];
						
						
						
						$sql3 = mysqli_query($Conn,"select * from users where ID='$User_ID'");
					$row3 = mysqli_fetch_array($sql3);
					$U_Name = $row3['Name'];
					$U_Phone_Number = $row3['Phone_Number'];
			
						
						
						?>
						
						
                <tr>
                  <td><?php echo $U_Name; ?></td>
                  <td><?php echo $U_Phone_Number; ?></td>
                  <td><?php echo $Type; ?></td>
                  <td><?php echo $Description; ?></td>
                  <td>
						
						
						<?php
				  
				  for ($i=1; $i<=$Total_Rates; $i++){
					  
					  
					  echo '<i style="color:#fad00e" class="fa fa-star"></i>';
					  
					  
					  
				  }
				  
				  ?>
						
						
						
						
						</td>
                  <td><?php echo $Status; ?></td>
                  <td><?php echo $Add_Date_Time; ?></td>
                  <td>
				  <center>
				  
				  
				  
				 <a href="Accept_Request.php?R_ID=<?php echo $R_ID; ?>" class="btn btn-primary btn-sm">Accept Request</a>

<br><br>


				  <a href="JavaScript:if(confirm('Are You Sure To Delete This Request ?')==true)
{window.location='Delete_Request.php?R_ID=<?php echo $R_ID; ?>';}" class="btn btn-danger btn-sm" role="button">Delete</a> 
<br><br>
				 <a href="View_Location.php?R_ID=<?php echo $R_ID; ?>" class="btn btn-warning btn-sm">View Location</a>

				  </center>
				  
				  
				  </td>
                 
                </tr>
				
				
				<?php
					}
					?>
					
					
               
              </tbody>
            </table>
            <!-- // Data table -->
          </div>
				
				
				
				
				
				
				
				
				
				
				
				
				


                    </div>
                  </li>
                 
                </ul>
                
              </div>
            </div>
           
           
           
          </div>

          <br/>
          <br/>

        </div>
       

      </div>
    </div>

  </div>

  <!-- Footer -->
  <footer class="footer">
    <strong><font color="#000">وقايتك © 2021. All Rights Reserved.</font></strong>
  </footer>
<!-- // Footer -->

 <script src="../js/vendor/all.js"></script>


  <!-- App Scripts Bundle -->
  <script src="../js/app/app.js"></script>


</body>

</html>