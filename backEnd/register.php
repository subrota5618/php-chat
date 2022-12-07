<?php 
session_start();
session_regenerate_id();
require("db.php");
if(isset($_POST['register'])) {
	
	$name = htmlentities(mysqli_real_escape_string($con , $_POST['name'])) ;
	$username = htmlentities(mysqli_real_escape_string($con , $_POST['username'])) ;
	//------------------- username check ------------------- //
	$selectUsername = "SELECT `username` FROM userchat WHERE `username`='$username'";
	$queryUsername = mysqli_query($con , $selectUsername);
	$rowCountForUsername = mysqli_num_rows($queryUsername);
	if($rowCountForUsername ==true){
		?>
		 <script type="text/javascript">
			 alert("This username alreday existed") ;
			 window.location = "../frontEnd/register.html" ;
		 </script>
		 <?php
			exit();
	}
	$password = htmlentities(mysqli_real_escape_string($con , $_POST['password'])) ;
	$password_scure = md5($password);
	//------------------- password check ------------------- //
	$check_password = strlen($password);
if($check_password >= 10 || $check_password <= 20) {

	$email = htmlentities(mysqli_real_escape_string($con , $_POST['email'])) ;
	//------------------- email check ------------------- //
	$selectEmail = "SELECT `email` FROM userchat WHERE `email`='$email'";
	$queryEmail = mysqli_query($con , $selectEmail);
	$rowCountForEmail = mysqli_num_rows($queryEmail);
	if($rowCountForEmail ==true){
		?>
		<script type="text/javascript">
			alert("This email alreday existed ") ;
			window.location = "../frontEnd/register.html" ;
		</script>
		<?php
			exit();
	}
	
	$country = htmlentities(mysqli_real_escape_string($con , $_POST['country'])) ;
	$gender = htmlentities(mysqli_real_escape_string($con , $_POST['gender'])) ;
//------------------- profile check ------------------- //
	$profile = $_FILES['profile'] ;
	$profileName  = $profile['name'];
	$profileTmp = $profile['tmp_name'];
	$profileSize = $profile['size'];
	$profileType = $profile['type'];
	$profileError = $profile['error'];
	
if($profileSize > 1048576) {
	?>
	<script type="text/javascript">
		alert(" Your file size too big select 1 MB or lower ") ;
		window.location = "../frontEnd/register.html" ;
	</script>
	<?php
exit();
	}
	$extention = pathinfo($profileName , PATHINFO_EXTENSION);
	$allowed = array("jpg"  , "png" , "jpeg"); 
	$allowedExt = in_array($extention , $allowed);
	if(!$allowedExt) {
		?>
		<script type="text/javascript">
			alert(" This type of file are not allowed select jpg or png type of file  ") ;
			window.location = "../frontEnd/register.html" ;
		</script>
		<?php
		// exit();
	}
	$newName = time() . "." . $extention ;
	$location = "../upload/".$newName ;
	move_uploaded_file($profileTmp , $location);
	//time
	date_default_timezone_set("asia/dhaka");
	$time = date("d-m-y h:i:s");
}else{
echo "Please enter your password between 10 to 20 character ";
exit();
}
// ----------------------------------- insert data ----------------------------------- //
$insert = "INSERT INTO `userchat`(`name` ,`username` ,`password` , `email` , `country` , `gender` , `profile` , `time` ) 
VALUES ( '$name' ,  '$username' ,   '$password_scure' ,  '$email' ,  '$country' ,  '$gender' ,  '$newName' ,  '$time' )";
$query = mysqli_query($con  , $insert );
if($query==true) {
	?>
	
	<script type="text/javascript">
		alert(" Account created successfully ") ;
	</script>
	<?php

	header("location:chat.php") ;
}else{
	?>
	<script type="text/javascript">
		alert(" Failed to insert data ") ;
		window.location = "../frontEnd/register.html" ;
	</script>
	<?php
	die();
}
mysqli_close($con );
}

?>