<?php
$name = "subrota";
$roll = 125 ;
$gpa = 4.50 ;
setcookie( "name" , $name , time() + 10 )  ;
setcookie( "roll" , $roll , time() + 10 )  ;
setcookie( "gpa" , $roll ,time() + 10 )  ;
//note : first setcookie name 
//second give cookie variabe 
//third set cookie time 
$nameTime =   $_COOKIE['name'] ;
$rollTime  =  $_COOKIE['roll'] ;
$gpaTime  = $_COOKIE['gpa'] ;
echo  " Name : "  . $nameTime . "\n\n" ,  " Roll: " .  $rollTime . " \n\n " , " GPA  : " . $gpaTime ;
//--------------------  cookie -----------------//
if( time() >  10  ) {
    echo " <br> <br> Your cookie will be delete after 10 second  " ;
}

?>