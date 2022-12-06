<?php
session_start() ;
session_regenerate_id() ;
require("../db.php") ;
if(isset($_POST['submit'])) {
    $email = htmlentities(mysqli_real_escape_string($con , $_POST['email']));
    $_SESSION['updateEmail'] = $email ;
    $select = "SELECT email FROM userchat WHERE email='$email'" ;
    $query = mysqli_query($con , $select) ;
    $rowCount  = mysqli_num_rows($query) ;
    if($rowCount == true) {
    $otpCode = rand(124445 , 124578) ;
    $_SESSION['otpCode']  = $otpCode ;
    header("location:otpForm.php");
    }else{
        echo "<h2 style='color:red;'>Invalid email enter valid email to proceed . </h2>" ;
    }
}

?>