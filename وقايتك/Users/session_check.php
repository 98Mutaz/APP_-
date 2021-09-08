<?php

session_start();

include '../includes/config.php';

ini_set('session.gc_maxlifetime', 31536000);
session_set_cookie_params(31536000);




$U_ID = $_SESSION['U_Log'];



if ($_SESSION['U_Log']==''){
echo '<script language="JavaScript">
 document.location="../index.php";
</script>';
}









$sql3 = mysqli_query($dbConn,"select * from users where ID='$U_ID'");
					$row3 = mysqli_fetch_array($sql3);
$Name=$row3['Name'];
$DOB=$row3['DOB'];
$Password=$row3['Password'];
$Phone_Number=$row3['Phone_Number'];


$Lon=$row3['Longitude'];
$Lat=$row3['Latitude'];




?>