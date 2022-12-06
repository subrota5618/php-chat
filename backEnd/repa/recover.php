<?php
session_start() ;
session_regenerate_id() ;
require("../db.php") ;
if(isset($_POST['updatepa'])) {
    $newPassword = htmlentities(mysqli_real_escape_string($con , $_POST['password']));
    $checkLength = strlen($newPassword) ;
 if($checkLength >=10 || $checkLength <=25 ) {
    $scurePassword = md5($newPassword);
    $confirmPassword = htmlentities(mysqli_real_escape_string($con , $_POST['cpassword']));
if($newPassword==$confirmPassword) {
$updatePassword  = "UPDATE `userchat` SET `password` = '$scurePassword' WHERE `email` ='{$_SESSION['updateEmail']}'" ;
$query = mysqli_query($con , $updatePassword) ;
if($query==true) {
    header("location:../../frontEnd/login.html") ;
}else{
    echo "<h2 style='color:red;'> Failed to update password tray again . </h2>" ; 
}
   }else{
        echo "<h2 style='color:red;'> Password mismatched tray again. </h2>" ;
    }
}else{
    echo "<h2 style='color:red;'> Enter your password between 10 to 25 character . </h2>" ;
}
}

?>