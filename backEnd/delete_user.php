<?php
require("db.php") ;
if(isset($_REQUEST['delete_id'])) {
$deletedId = $_REQUEST['delete_id'] ;
$pictureId = $_REQUEST['pictureId'] ;
$deleteSelect = "DELETE FROM `userchat` WHERE `userchat`.`id` = '$deletedId'" ;
$query = mysqli_query($con , $deleteSelect) ;
if($query==true) {
    unlink("../upload/".$pictureId) ;
    header("location:info.php?deleted");
}else{
    echo " <h2 style='color:red; text-align:center'>  Faild to delete </h2>" ;
}
}
?>