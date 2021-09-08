<?php
session_start();

$R_ID=$_GET['R_ID'];

require_once('../includes/config.php');


mysqli_query($Conn,"update requests set Status='تم الموافقة على الطلب' where ID='$R_ID'");

	  
echo "<script language='JavaScript'>
			  alert ('This Request Has Been Accepted !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='Requests_Management.php';
        </script>";

?>