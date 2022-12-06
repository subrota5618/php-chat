<?php 
session_start();
session_regenerate_id();
require("db.php");
if( $_SESSION['usernameEmail']==true) {	
?>
<!DOCTYPE HTML>
<html>
<head> 
	<!-- Fontawsome cdn ----->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- CSS LINK ----->
<link rel="stylesheet" href="../css/chat.css"/>
<title> chat </title>
<link rel="shortcut icon" href="../image/chatLogo.jpg" type="image/x-icon">
</head>
<body>
<div class="chatbody">
<div class="searchBody">
<form action="#" method="post" class="sForm" autocomplete="off">
<div class="searchGroup">
<input type="search" name="searchUser" class="sInput" placeholder="search by username"/>
<button type="submit" class="sBtn" name="searchButton"> <i class="fa-solid fa-magnifying-glass" style="color:blue; font-size:3rem;"></i> </button>
</div>
</form>
<br><br><br><br><br><br><br><br><br><br><br>
<?php 
if(isset($_REQUEST['searchButton'])) {
$search =  htmlentities(mysqli_real_escape_string($con , $_REQUEST['searchUser']));
$selectUserForSearch  = "SELECT `name` , `id` , `login_status` ,  `username` , `profile` FROM userchat WHERE `username` LIKE '%$search%' ";
$queryForSearch  = mysqli_query($con , $selectUserForSearch);
$rowSearchCount = mysqli_num_rows($queryForSearch);
if($rowSearchCount==true) {
	while($rowSearch = mysqli_fetch_assoc($queryForSearch)) {
		$Searchprofile = $rowSearch['profile'];
		$name = $rowSearch['name'];
		$reId = $rowSearch['id']; 
		$login_status  = $rowSearch['login_status'];?>
<a href="chat.php?reciverIdNumber=<?php echo $reId ?> " >
<div class="sUser">
<?php 
if($login_status == 'Online') {
	?>
	<div class="onlineBody">
	<div class="online"> </div> <span class="onlineText" > Online </span>
     </div>
	<?php 
}else{ ?>
<div class="offLineBody">
<div class="offLine"> </div> <span class="offLineText" > Offline </span>
</div>
	<?php 
}?>
<img src="../upload/<?php echo $Searchprofile ?>" alt="<?php  echo $name ?>"  class="searchProfile" />
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<p class="searchName">  <?php  echo $name ?> </p> 
</div>
</a>
<?php }
}else {
	echo "<p style='color:red; text-align:center; font-size:2rem;'> Search not found here ! </p> " ;
?>
<br><br>
<img src="../image/search.jpg" alt="search" width="100%" height="656px"/>
<br>
	<?php
}}?>
</div>
<div class="chatBox">
<!-------------- Chat Head -------------------->
<div class="chatHead">
<!-------------- reciver Profile -------------------->
<?php 
//update ================ check ==================
if(isset($_REQUEST['updateSender'])) {echo "<h2 style='color:lime;'> Your data updated successfully . </h2>" ; } 
if(	$_SESSION['usernameEmail'] && 	$_SESSION['usernameEmail'] =='subrota' || $_SESSION['usernameEmail'] && 	$_SESSION['usernameEmail'] =='itinfo@gmail.com'  ) {
	?> <a href="info.php"  style="font-size:2rem; color:white; margin-left:1rem;" target="_blank">user information </a> <?php
}?>
<?php
require("db.php");
if(isset($_REQUEST['reciverIdNumber'])){
$reciverIdTake = $_REQUEST['reciverIdNumber'];
$select = "SELECT `name` , `id` , `login_status` , `profile` FROM userchat WHERE `id` = '$reciverIdTake' ";
$query = mysqli_query($con , $select);
$reciverData  = mysqli_fetch_assoc($query) ;
$reName = $reciverData['name'];
$reProfile  = $reciverData['profile'];
$reciverProfileId  = $reciverData['id'];
$login_status  = $reciverData['login_status'];
?>
<a href="reciverProfile.php?reciverProfileId=<?php echo $reciverProfileId  ?>" target="blank"> 
<div class="reciverProfile">
<div class="rePro">
<?php 
if( $login_status  == 'Online' ) {?>
	<div class="onlineBody">
	<div class="online"> </div> <span class="onlineText" > Online </span>
     </div>
<?php 
}else {?>
<div class="offLineBody">
<div class="offLine"> </div> <span class="offLineText" > Offline </span>
</div>
<?php }?>
</div>
<img src="../upload/<?php echo $reProfile ?>" alt="<?php echo $reName  ?>" class="reciverproLogo"/>
<br>
<p class="reName"><?php echo $reName ?>  </p>
</div>
</a>
<?php }?>
<div class="Yline"> </div>
<!-------------- sender Profile -------------------->
<div class="senderProfile">
<?php 
$userData = $_SESSION['usernameEmail'] ;
$selectSenderProfile = "SELECT name  , profile , id FROM userchat WHERE username = '$userData' OR email='$userData' ";
$queryForSender = mysqli_query( $con , $selectSenderProfile);
$senderData = mysqli_fetch_assoc($queryForSender);
$name = $senderData['name'];
$profile = $senderData['profile'];
$logoutId = $senderData['id'];
?>
<a href="logout.php?logoutId=<?php echo $logoutId ?>" > 
<button class="logOut" onclick="return confirm('Are you want to log out ?')"> Log Out </button>
<p class="CurrentTime"> 00:00:00 </p>
<div class="onlineBody">
<div class="online"> </div> <span class="onlineText" > Online </span>
</div>
<?php 
$userData = $_SESSION['usernameEmail'] ;
$selectSenderProfile = "SELECT id , name  , profile  FROM userchat WHERE username = '$userData' OR email='$userData' ";
$queryForSender = mysqli_query( $con , $selectSenderProfile);
$senderData = mysqli_fetch_assoc($queryForSender);
$name = $senderData['name'];
$profile = $senderData['profile'];
$senderId = $senderData['id'];
?>
<a href="senderProfile.php?senderProfileId=<?php echo $senderId ?>" target="blank" style="color:white;"> 
<img src="../upload/<?php echo $profile ?>" alt="<?php echo $name  ?>" class="senderproLogo"/>
<br>
<p class="reName"> <?php echo $name  ?> </p>
</div>
</a>
</div>
<?php 
//----------- reciver username   ----------//
require("db.php");
if(isset($_REQUEST['reciverIdNumber'])){
$reciverIdTake2 = $_REQUEST['reciverIdNumber'];
$selectReId = "SELECT username FROM userchat WHERE id = '$reciverIdTake2' ";
$ReQuery = mysqli_query($con , $selectReId);
$FetchReData = mysqli_fetch_assoc($ReQuery);
$reciver_username = $FetchReData['username'];
}
//------ sender username-----------//
$senderUserNameGet = "SELECT username , email FROM userchat WHERE username = '{$_SESSION['usernameEmail']}' OR email = '{$_SESSION['usernameEmail']}' " ;
$querySender = mysqli_query($con  , $senderUserNameGet);
$getSenderUsername= mysqli_fetch_assoc($querySender);
$sender_username = $getSenderUsername['username'];
?>
<br><br><br><br><br><br><br><br><br><br>
<!-------------- chat Text -------------------->
<div class="chatText">
<?php 
//---------------- get reciver and sender name -----------------//
require("db.php");
if(isset($_REQUEST['reciverIdNumber'])){
$selectChatTable  = "SELECT * FROM `chat` WHERE (sender_username='$sender_username' AND reciver_username='$reciver_username' )
OR (reciver_username='$sender_username' AND sender_username ='$reciver_username')   ORDER BY id DESC " ;
$chatQuery = mysqli_query($con , $selectChatTable);
$row_count_for_chat = mysqli_num_rows($chatQuery);
if($row_count_for_chat==true) {
while($chat_row = mysqli_fetch_assoc($chatQuery)){
			$senderUsername = $chat_row['sender_username'];
			$reciverUsername = $chat_row['reciver_username'];
			$Chatingtext = $chat_row['text'];
			$chatTime = $chat_row['time'];
			?> 
			<?php 
//------------------- get message ------------------//
        if( $sender_username == $reciverUsername  || $reciver_username==$senderUsername   ) {
														?>
							<div class="leftchat">
							<p class="chatTime"> <?php echo $chatTime  ?> </p> &nbsp;&nbsp;
							<p class="chatTime">  <?php echo $senderUsername ?></p> 
							<p> <?php echo $Chatingtext  ?> </p>
							</div>
							<?php
			}    
 else if ( $sender_username==$senderUsername || $reciver_username==$reciverUsername  ){
				             ?>
						<div class="rightchat">
						<p class="chatTime">  <?php echo $chatTime  ?></p> &nbsp;&nbsp;
						<p class="chatTime">  <?php echo $senderUsername ?></p>
						<p>   <?php echo $Chatingtext  ?></p>
						</div>
				
 <?php }?>	<?php 	   //------------------- get message end ------------------//  }
} }else{
	echo "<p style='color:red; text-align:center;  font-size:2rem;'> Start chat then you can see text ! </p> " ;
	?>
<br><br>
<img src="../image/pageError.jpg" alt="error" width="100%" height="656px"/>
<br>
	<?php
} }?> 
</div>
<div>
</div>
</div>
<br>
<!--------------send message  -------------------->
<div class="sendBody">
<form action="#" method="post" autocomplete="off">
<div class="searchGroup">
<input type="search" name="sendMessage" class="sendInput" placeholder="enter text here"/>
<button type="submit"  name="sendText" class="sendBtn">  <i class="fa-solid fa-paper-plane fa-2x" style="color:blue;"></i>  </button>
</div>
</form>
</div>
<?php 
//----------- send message ----------//
require("db.php");
if(isset($_REQUEST['reciverIdNumber'])){
$reciverIdTake2 = $_REQUEST['reciverIdNumber'];
$selectReId = "SELECT username , email FROM userchat WHERE id = '$reciverIdTake2' ";
$ReQuery = mysqli_query($con , $selectReId);
$FetchReData = mysqli_fetch_assoc($ReQuery);
$reciver_username = $FetchReData['username'];
$reciver_email = $FetchReData['email'];
if(isset($_REQUEST['sendText'])){
$getMessage = htmlentities(mysqli_real_escape_string($con , $_POST['sendMessage'])) ;
if($getMessage=="") {
	?>
	<script>
	alert('Type some text first to submit') ;
</script>
<?php
exit() ;
}
date_default_timezone_set("asia/dhaka");
$time = date("h:i:s");
//------------------
if( ($_SESSION['usernameEmail'] && $_SESSION['usernameEmail']== $reciver_username ) || ($_SESSION['usernameEmail'] && $_SESSION['usernameEmail']== $reciver_email) ) {
?>
<script>
	alert(' You can not chat with won ') ;
</script>
<?php
	exit() ;
}else{
//-------------------
$insertChat = "INSERT INTO `chat` (`sender_username` , `reciver_username` , `text` , `time`)
VALUES('$sender_username ' , '$reciver_username' , '$getMessage' , '$time')";
$messageQuery = mysqli_query($con , $insertChat);}} } 
}else {
	header("location:../backEnd/logout.php");
}?>
<script type="text/javascript">
	//------------set time ---------------
setInterval(()=>{
var time = document.querySelector('.CurrentTime');
var timeNow = new Date().toLocaleTimeString();
time.innerHTML = timeNow ;
})
</script>
<!-- ----------------------------- Ok good by ------------------------->