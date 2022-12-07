<?php
require("backEnd/db.php") ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <!--Google font cdn link -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=La+Belle+Aurore&family=Nerko+One&family=Raleway:wght@300&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <!--Bootstrap css cdn link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <style>
    .chatImage{
      height:515px;
      width:100%;
      font-family: 'Roboto', sans-serif;
    }
.body{
  font-family: 'Roboto', sans-serif; 
}
.footer{
  font-family: 'Nerko One', cursive;
}
   </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Home page </title>
    <link rel="shortcut icon" href="https://i.ibb.co/c6bGfd1/logo.webp" type="image/x-icon">
</head>
<body class="bg-dark body">
<section>
  <!-- Header start -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-info py-4">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">
          <img src="https://i.ibb.co/c6bGfd1/logo.webp" alt="logo"  
          class="rounded-circle" style="height:55px; width:56px;"/>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active text-white fw-bolder" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white fw-bolder" target="_blank" href="frontEnd/register.html">Register </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white fw-bolder"target="_blank" href="frontEnd/login.html">Login</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle d-block d-md-none" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown Links 
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li> <a class="dropdown-item active" aria-current="page" href="/">Home</a></li>
                <li>  <a class="dropdown-item" target="_blank" href="frontEnd/register.html">Register </a></li>
                <a class="dropdown-item" target="_blank" href="frontEnd/login.html">Login</a>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
<!-- Header end -->

<!-- Main start -->
  <main>

  <!-- Carousel start -->
  <div id="topImages" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#topImages" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#topImages" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#topImages" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#topImages" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://i.ibb.co/V9GNWrD/user1.jpg" class="d-block chatImage" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://i.ibb.co/wJSG95w/user2.jpg" class="d-block chatImage" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://i.ibb.co/6s2zqSm/user3.jpg" class="d-block chatImage" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://i.ibb.co/9rJkm4S/user4.jpg" class="d-block chatImage" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#topImages" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#topImages" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Carousel end -->
    <div class="container my-5">
    <div class="row">
    <h2 class="text-center fs-2 fw-bolder text-success my-2">Our all happy users </h2>
    <?php
     $select = "SELECT * FROM userchat" ;
     $query = mysqli_query($con , $select) ;
     $row_count = mysqli_num_rows($query) ;
     if($row_count > 0 ) {
      while($user = mysqli_fetch_assoc($query)){
        ?>
      <div class="col col-sm-12 col-md-6 col-lg-4">
        <div class="card rounded w-100 h-75">
          <img src="upload/<?php echo $user['profile'] ?>" class="card-img-top h-50" alt="user image">
          <div class="card-body">
            <h5 class="card-title"> Name : <?php echo $user['name'] ?></h5>
            <h5 class="card-title"> Email : <?php echo $user['email'] ?></h5>
            <h5 class="card-title"> Country : <?php echo $user['country'] ?></h5>
            <h5 class="card-title"> Joining date : <?php echo $user['time'] ?></h5>
          </div>
        </div>
      </div>
        <?php
      }
     } else{
    ?>
    <h2 class="text-center fs-1 fw-bolder text-danger my-5">No users found here !! </h2>
    <?php
     }
    ?>

    </div>
  </div>
  </main>
<!-- Main end -->

<!-- Footer start -->
  <footer>
  <div class="bg-info w-100 py-5 footer">
   <p class="text-center text-white fw-bolder fs-1 "> Copy right by Subrota Chandra Sarker (2022) </p>
  </div>
  </footer>
  <!-- Footer end -->

</section>

  <!--Bootstrap js cdn link -->   
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>