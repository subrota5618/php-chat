<?php
session_start() ;
session_regenerate_id();
if( $_SESSION['usernameEmail']==true){
	?>
<!DOCTYPE html>
<html lang="en">
<style>
.table{
	margin:auto;
	color:white;
	border:0.2rem solid blue;
}
.table > tr > td {
	border:0.2rem solid blue;
}
.body{
	background-color:lime;
}
tr:nth-child(odd){
background-color:rgba(45,85,65,0.4);
}
</style>
<head>
<!-- Bootstrap cdn -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>user profile </title>
	<link rel="shortcut icon" href="../image/info.png" type="image/x-icon"/>
</head>
<body class="body">
<?php 
require('db.php');
if(isset($_REQUEST['reciverProfileId'])) {
	$reciverProfileId = $_REQUEST['reciverProfileId'] ;
	$select = "SELECT name , username , email , country , gender , profile , time FROM userchat WHERE id ='$reciverProfileId'" ;
	$query = mysqli_query($con , $select);
	$rowCount = mysqli_num_rows($query);
	if($rowCount==true) {
	$data = mysqli_fetch_assoc($query);
	// data get from userchat //
	$name = $data['name'];
	$username = $data['username'];
	$email = $data['email'];
	$country = $data['country'];
	$gender = $data['gender'];
	$profile = $data['profile'];
	$time = $data['time'];
?>
<br><br><br>
<center>  <h1 style="color:white"> About <?php echo   $name ?> </h1> </center>
<br><br>
<table class="table table-hover" > 
<tbody>
<tr>
<td colspan="3"> Name : </td>
<td colspan="3"> <?php echo 	$name  ?> </td>
</tr>
<tr>
<td colspan="3"> Username : </td>
<td colspan="3"> <?php echo 	$username  ?> </td>
</tr>
<tr>
<td colspan="3"> Email : </td>
<td colspan="3"> <?php echo 	$email ?> </td>
</tr>
<tr>
<td colspan="3"> Country : </td>
<td colspan="3"> <?php echo 	$country  ?> </td>
</tr>
<tr>
<td colspan="3"> Gender : </td>
<td colspan="3"> <?php echo 	$gender  ?> </td>
</tr>
<tr>
<td colspan="3"> Profile : </td>
<td colspan="3"> <img src="../upload/<?php echo $profile ?>" alt="image" height="120" width="130" class="rounded-circle" /> </td>
</tr>
<tr>
<td colspan="3"> Date Time : </td>
<td colspan="3"> <?php echo 	$time  ?> </td>
</tr>
	</tbody>
</table>
<?php 
	}else{
		echo " User not found" ;
	}
}
?>
<br><br>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
</body>
</html>
<?php
}else{
    header("location:logout.php") ;
}
?>