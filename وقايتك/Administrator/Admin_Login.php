<?php

session_start();

include("includes/config.php"); 



if(isset($_POST['Submit']))
{
	
$Username=mysqli_real_escape_string($Conn,$_POST['Username']);
$Password=mysqli_real_escape_string($Conn,md5($_POST['Password']));



if ($Username=='admin' && $Password=='21232f297a57a5a743894a0e4a801fc3'){


$A_ID=1;
$_SESSION['A_Log'] = $A_ID;


echo '<script language="JavaScript">
            document.location="Administrator/";
        </script>';	
}
else
{

echo '<script language="JavaScript">
	  alert ("Error ... Please Check Administrator Username Or Password !")
      </script>';}
	  
}
	
?>

<!DOCTYPE html>
<html class="hide-sidebar ls-bottom-footer" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>وقايتك - Administrator Login</title>

  
  <link href="css/vendor/all.css" rel="stylesheet">


  <link href="css/app/app.css" rel="stylesheet">

 
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    <link rel="shortcut icon" href="images/logo.png"/>

</head>

<body class="login">

  <div id="content">
    <div class="container-fluid">

      <div class="lock-container">
        <div class="panel panel-default text-center paper-shadow" data-z="0.5">
          <a href="index.php"><img src="images/logo.png" class="width-200"></a>

		<h1 class="text-display-1 text-center margin-bottom-none">Administrator<br>Login</h1>
          <div class="panel-body">
            <div class="form-group">
              <div class="form-control-material">
			  <form action="Admin_Login.php" method="post"/>
                <input class="form-control" id="username" name="Username" type="text" placeholder="Username" required>
                <label for="username">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-control-material">
                <input class="form-control" id="password" name="Password" type="password" placeholder="Enter Password" required>
                <label for="password">Password</label>
              </div>
            </div>

            <button type="submit" name="Submit" class="btn btn-primary">Login<i class="fa fa-fw fa-unlock-alt"></i></button>
            <button type="reset" class="btn btn-primary">Cancel<i class="fa fa-fw fa-unlock-alt"></i></button>

          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <strong><font color="#000">وقايتك © 2021. All Rights Reserved.</font></strong>
  </footer>
  <!-- // Footer -->
  <!-- Inline Script for colors and config objects; used by various external scripts; -->
  <script>
    var colors = {
      "danger-color": "#e74c3c",
      "success-color": "#81b53e",
      "warning-color": "#f0ad4e",
      "inverse-color": "#2c3e50",
      "info-color": "#2d7cb5",
      "default-color": "#6e7882",
      "default-light-color": "#cfd9db",
      "purple-color": "#9D8AC7",
      "mustard-color": "#d4d171",
      "lightred-color": "#e15258",
      "body-bg": "#f6f6f6"
    };
    var config = {
      theme: "html",
      skins: {
        "default": {
          "primary-color": "#42a5f5"
        }
      }
    };
  </script>

 
  <script src="js/vendor/all.js"></script>


  <script src="js/app/app.js"></script>

  

</body>

</html>