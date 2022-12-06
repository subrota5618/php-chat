<?php
session_start() ;
session_regenerate_id();
if( $_SESSION['usernameEmail']==true){
if( $_SESSION['usernameEmail'] && $_SESSION['usernameEmail']== 'subrota' ||  ($_SESSION['usernameEmail'] &&  $_SESSION['usernameEmail']== "itinfo@gmail.com" ) ) {	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/info.css"/>
    <!-- Bootstrap cdn -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  	<!-- Fontawsome cdn ----->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> info page </title>
	<link rel="shortcut icon" href="../image/info.png" type="image/x-icon"/>
</head>
<body class="body"> 
<br><br>
<?php
if(isset($_REQUEST['updateUser'])){
echo '<h2 style="color:white; text-align:center;">Data Updated Successfully</h2>';
}
?>
<br>
<?php
if(isset($_REQUEST['deleted'])){
echo '<h2 style="color:red; text-align:center;">Data deleted Successfully</h2>';
}
?>
<br>
<table class="table text-white table-hover table-responsive-col-sm-12 table-responsive-col-md-12 table-striped">
<?php
require("db.php") ;
$limit = 4;
if(isset($_REQUEST['page_number'])) {
$pageNumber =  $_REQUEST['page_number'] ;
}else{
$pageNumber = 1 ;
}
$offset = ($pageNumber-1) * $limit ;
$select = "SELECT * FROM userchat LIMIT $offset , $limit";
$query = mysqli_query($con , $select);
$rowCount = mysqli_num_rows($query) ;
if($rowCount==true) {
    ?>
    <thead class="bg-dark text-white">
        <tr>
            <th> Serial number </th>
            <th> Id</th>
             <td>Name</td>
             <th>Username</th>
             <th>Email</th>
             <th>Country</th>
             <th>Gender</th>
             <th>Profile</th>
             <th>Date Time </th>
             <th>Update</th>
             <th>Delete</th>
        </tr>
    </thead>
<?php
$serial = 0 ;
while($row = mysqli_fetch_assoc($query)) {
    $serial++;
    $db_id = $row['id'] ;
    $name = $row['name'] ;
    $username = $row['username'] ;
    $email = $row['email'] ;
    $country = $row['country'] ;
    $gender = $row['gender'] ;
    $profile = $row['profile'] ;
    $time = $row['time'] ;
    ?>
<tbody>
        <tr>
            <td> <?php echo $serial ?> </td>
            <td> <?php echo $db_id  ?> </td>
            <td> <?php echo  $name  ?> </td>
            <td> <?php echo  $username ?> </td>
            <td> <?php echo  $email  ?> </td>
            <td> <?php echo  $country  ?> </td>
            <td> <?php echo  $gender   ?> </td>
            <td> <img src="../upload/<?php echo  $profile ?>" alt="user" class="userImage"/>  </td>
            <td> <?php echo  $time ?> </td>
            <td> <a href="update_user.php?update_id=<?php echo $db_id ?> " target="blank" onclick="return confirm('Are you want to update this data ?')">  <i class="fas fa-edit fa-2x text-info"></i>  </a></td>
            <td> <a href="delete_user.php?delete_id=<?php echo $db_id ?> && pictureId=<?php echo $profile  ?>" target="blank"  onclick="return confirm('Are you want to delete this data ?')"> <i class="fas fa-trash fa-2x text-danger"></i>  </a></td>
        </tr>
    </tbody>
    <?php
    }
}else{
echo " <h2 style='color:red;'> User not found ! </h2>" ;
}?>
</table>
<br><br>
<center>
<?php
require("db.php") ;
$select_table = "SELECT * FROM userchat";
$query_pagination = mysqli_query($con , $select_table);
$totalRecords= mysqli_num_rows($query_pagination) ;
$totalPage = ceil($totalRecords/$limit) ;
?>
<?php
if($pageNumber > 1  ) {

echo ' <a href="info.php?page_number='.($pageNumber-1).'" class="btn btn-info p-2 m-2" style="font-size:1.5rem;"> prev </a> ' ;

}
?>
<?php
for($i=1 ; $i<$totalPage ; $i++)  {
echo '<a href="info.php?page_number='.$i.'" class="btn btn-info text-white p-2  m-2 " style="font-size:1.5rem; width:4.7rem;"> '. $i .' </a> ';
}
if($totalPage > $pageNumber ) {
    echo ' <a href="info.php?page_number='.($pageNumber+1).'" class="btn btn-info p-2 m-2" style="font-size:1.5rem;"> Next </a> ' ;
}
?>
</center>
<br><br>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
</body>
</html>
<?php
}else{
    header("location:chat.php") ;
}}else{
    header("location:logout.php") ;
}
?>