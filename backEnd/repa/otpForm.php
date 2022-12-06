
<?php
session_start() ;
session_regenerate_id() ;
?>
<!DOCTYPE html>
<html lang="en">
    <style>
        .head-group{
            background-color:rgba(31, 228, 24, 0.4);
            text-align: center;
            font-size: large;
            height:60px;
            color: wheat;
            padding-top: 12px;
        }
        .form{
            background-color: rgba(16, 10, 18, 0.4);
            padding: 10%;
            color: white;
        }
        .body{
            background-color: rgba(0, 0, 19, 0.6);
            background-attachment: fixed;
        }
    </style>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body class="body">
    <br>  <br>  <br>
    <div class="head-group w-50 m-auto">
        Now click on next button 
    </div>
<form action="checkOtp.php" method="post" class="was-validated w-50 m-auto form">
    <div class="form-group">
        <label for="email">Email</label>
   <input type="number" name="otpCode"  placeholder="Enter your valid otp" class="form-control"  value="<?php echo    $_SESSION['otpCode'] ; ?>" required/>
  <div class="invalid-feedback">  Enter your valid otp as soon as possiable   </div>
  <div class="valid-feedback">This will be valid if you entered valid .</div>
    </div>
    <div class="form-group" style="display: flex-end;">
        <input type="checkbox" name="check" id="check"  class="p-2 m-3 form-check-input"   required/>
        &nbsp;      &nbsp;      &nbsp;      &nbsp;
        <label for="check" style="margin-top: 8px;" class="form-check-label"  >Check the box </label> 
    </div>

    <br><br>
    <div class="form-group">
        <input type="submit" name="otpSubmit"  value="next" class="btn btn-info btn-block"/>
    </div>
</form>  
    <br><br>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  

</body>
</html>