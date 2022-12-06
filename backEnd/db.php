<?php
defined("HOST_NAME") ? NULL : define("HOST_NAME"  , "localhost") ;
defined("USER_NAME") ? NULL : define("USER_NAME"  , "root") ;
defined("DB_PASSWORD") ? NULL : define("DB_PASSWORD"  , "") ;
defined("DB_NAME") ? NULL : define("DB_NAME"  , "chat") ;
$con = mysqli_connect( HOST_NAME ,  USER_NAME , DB_PASSWORD ,DB_NAME );
if(!$con) {
	echo " Database connection failed " ;
}
?>