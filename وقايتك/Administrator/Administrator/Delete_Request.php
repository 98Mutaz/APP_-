<?php
session_start();

$R_ID=$_GET['R_ID'];

require_once('../includes/config.php');


mysqli_query($Conn,"delete from requests where ID='$R_ID'");

	  
echo "<script language='JavaScript'>
			  alert ('This Request Has Been Deleted !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='Requests_Management.php';
        </script>";

?>