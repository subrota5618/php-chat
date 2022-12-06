<?php 
session_start();
session_regenerate_id();
require("db.php");
if(isset($_REQUEST['Login'])) {
	$emailOrUsername = htmlentities(mysqli_real_escape_string($con  , $_REQUEST['username']));
	//online check start 
	$update = "UPDATE userchat  SET login_status ='Online' WHERE username ='$emailOrUsername' ||  email ='$emailOrUsername'";
	$queryUpdate = mysqli_query($con  , $update);//update row 
     //online check end 
	$_SESSION['usernameEmail'] = $emailOrUsername ;
	$password = htmlentities(mysqli_real_escape_string($con  , $_REQUEST['password']));
	$password_scure = md5($password);
	$select = "SELECT `email` , `username` , `password` FROM `userchat` WHERE  (`username` = '$emailOrUsername' AND `password` = '$password_scure') OR (`email`='$emailOrUsername' AND `password` = '$password_scure')" ;	
	$query = mysqli_query($con  , $select);
	$row_count = mysqli_num_rows($query);
	if($row_count==true){
     header("location:chat.php");
	}else{
 echo "Invalid log in information " ; } } ?>