<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="css/login.css"/>
<meta char="utp-8" >
<title>  Log in  </title>
<link rel="shortcut icon" href="/image/loginLogo.gif" type="image/x-icon">

</head>
<body id="body">
<br><br>
<div class="form">
<div class="formHead">  <p style="font-weight:bolder;"> Login Form  </p> </div>
<form method="post" action="backEnd/login.php" class="loginForm">
<div class="usernameGroup hover">
<label for="username" > Username </label>
<input type="text" class="username" name="username" placeholder="Enter username or email "  min="8" max="40" required/>
</div>

<div class="passwordGroup hover">
<label for="password" > Password </label>
<input type="password" class="password" name="password" placeholder="Enter strong password" min="10" max="50" required/>
</div>
<br>
<div class="buttonGroup">
<button type="submit" class="login" name="Login"> Log in </button>
</div>
<br>
<center>
    <div class="form-group" style="display: flex ; text-align: center;">
        <input type="checkbox" name="check" id="check"    required/>
        &nbsp;      &nbsp;      &nbsp;      &nbsp;
        <p for="check" style="margin-top: 1px; color:white;"   >Check the box </p> 
    </div>
</center>
<br>
<h3> Create an account ? <a href="frontEnd/register.html" target="blank"> Register <a> </h3>
<br>
<br>
<h3> Change your password ? <a href="backEnd/repa/email.html" target="blank">  Forgot password <a> </h3>
<br>
&copy; Copy right by subrot chandra sarker 
</form>
</div>

<br/><br/>
</body>
</html>
