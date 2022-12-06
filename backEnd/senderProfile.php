<?php
session_start() ;
session_regenerate_id();
if( $_SESSION['usernameEmail']==true){
	?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="../css/update.css"/>
<meta char="utp-8" >
<title>  Update page </title>
<link rel="shortcut icon" href="../image/update.webp" type="image/x-icon"/>
</head>
<body>
<?php 
require('db.php');
if(isset($_REQUEST['senderProfileId'])) {
	$senderProfileId = $_REQUEST['senderProfileId'] ;
	$select = "SELECT name , username , email , country , gender , profile , time FROM userchat WHERE id ='$senderProfileId'" ;
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

<br><br>
<div class="formHead"> Update Form </div>
<form method="post"  action="../backEnd/updateSender.php"  enctype="multipart/form-data" class="registerForm"/>

<div class="nameGroup hover">
<label for="name" > Name </label>
<input type="text" class="name" name="name" value="<?php echo $name ?>" placeholder="Enter your name" required/>
</div>

<div class="usernameGroup hover">
<label for="username" > Username </label>
<input type="text" class="username" value="<?php echo $username ?>" name="username" placeholder="Enter an username"  min="8" max="40" required/>
</div>

<div class="passwordGroup hover">
<label for="password" > Password </label>
<input type="password" class="password" value="<?php echo $password ?>" name="password" placeholder="Enter strong password" min="10" max="50" required/>
</div>

<div class="emailGroup hover">
<label for="email" > Email </label>
<input type="email" class="email" value="<?php echo $email ?>"  name="email" placeholder="Enter valid email" required/>
</div>

<div class="countryGroup hover">
<label for="country" > Country </label>
<select name="country" class="country"  value="<?php echo $country ?>" />
<option disabled> Select your country </option> 
<option > Bangladesh </option> 
<option > India </option> 
<option > Pakisthan </option> 
<option > Japan </option> 
<option > Vutan </option> 
<option > Srilanka </option> 
<option > England </option> 
<option > USA </option> 
<option > Other </option> 
</select>
</div>

<div class="genderGroup hover">
<label for="gender" > Gender </label>
<select name="gender" class="gender" value="<?php echo $gender ?>"/>
<option disabled> Select your Gender </option> 
<option > Male </option> 
<option > Female </option> 
<option > Eunuch </option> 
<option > Other </option> 
</select>
</div>


<div class="profileGroup hover">
<label for="Profile" > Profile </label>
<input type="file" class="profile" name="profile"  value="<?php echo $profile ?>" required/>
</div>
<input type="hidden" name="hidden_id" value="<?php echo $senderProfileId ?>" />
<div class="buttonGroup">
<button type="submit" class="register"  name="update">  Update </button>
</div>
<br>
&copy; Copy right by subrot chandra sarker 
</form>
<?php 
	}else{
		echo " User not found" ;
	}
}
?>

<br><br>
</body>
</html?
<?php
}else{
    header("location:logout.php") ;
}
?>