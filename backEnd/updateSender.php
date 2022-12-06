<?php 
session_start();
session_regenerate_id();
require("db.php");
if(isset($_REQUEST['hidden_id'])) {
	$updateId = $_REQUEST['hidden_id'] ;
	$name = htmlentities(mysqli_real_escape_string($con , $_REQUEST['name'])) ;
	$username = htmlentities(mysqli_real_escape_string($con , $_REQUEST['username'])) ;
	$password = htmlentities(mysqli_real_escape_string($con , $_REQUEST['password'])) ;
	$password_scure = md5($password);
	//------------------- password check ------------------- //
	$check_password = strlen($password);
if($check_password >= 10 || $check_password <=  400) {
	$email = htmlentities(mysqli_real_escape_string($con , $_REQUEST['email'])) ;
    $country = htmlentities(mysqli_real_escape_string($con , $_REQUEST['country'])) ;
	$gender = htmlentities(mysqli_real_escape_string($con , $_REQUEST['gender'])) ;
//------------------- profile check ------------------- //
	$profile = $_FILES['profile'] ;
	$profileName  = $profile['name'];
	$profileTmp = $profile['tmp_name'];
	$profileSize = $profile['size'];
	$profileType = $profile['type'];
	$profileError = $profile['error'];
	
if($profileSize > 1048576) {
echo "Your file size too big select 1 MB or lower " ;
exit();
	}
	$extention = pathinfo($profileName , PATHINFO_EXTENSION);
	$allowed = array("jpg"  , "png " , "jpeg");
	$allowedExt = in_array($extention , $allowed);
	if(!$allowedExt) {
		echo " This type of file are not allowed select jpg or png type of file " ;
		exit();
	}
	$newName = time() . "." . $extention ;
	$location = "../upload/".$newName ;
	move_uploaded_file($profileTmp , $location);
	//time
	date_default_timezone_set("asia/dhaka");
	$time = date("d-m-y h:i:s");
}else{
echo "Please enter your password between 10 to 400 character ";
exit();
}
// ----------------------------------- insert data ----------------------------------- //
$update = "UPDATE userchat SET name='$name' , username ='$username' , password='$password_scure'  , email = '$email'  , country ='$country' , gender='$gender' , profile='$newName' , time='$time' WHERE id='	$updateId ' ";
$query = mysqli_query($con  , $update );
if($query==true) {
	header("location:chat.php?updateSender");
}else{
	echo "Failed to update data" ;
	die();
}
mysqli_close($con );
}

?>