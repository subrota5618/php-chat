<?php 
session_start();
session_regenerate_id();
require("db.php");
//offline check 
if(isset($_REQUEST['logoutId'])){
	$logoutID = $_REQUEST['logoutId'];
	$update = "UPDATE userchat SET login_status = 'Offline' WHERE id='$logoutID'";
	$query= mysqli_query($con , $update);
}
//destroy 
session_destroy();
header("location:../frontEnd/login.html");
?>