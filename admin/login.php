<?php
require('../includes/db.php');
if(isset($_SESSION['isUserLoggedIn']) && $_SESSION['isUserLoggedIn']){
  header('Location:index.php');

}
if(isset($_POST['login'])){
$email = mysqli_real_escape_string($db,$_POST['email']);
$password = mysqli_real_escape_string($db,$_POST['password']);

$query="SELECT * FROM profile WHERE email='$email' AND password='$password'";
$runQuery = mysqli_query($db,$query);
if(mysqli_num_rows($runQuery)){
  $_SESSION['isUserLoggedIn']=true;
  $_SESSION['email']=$email;
  header('Location:index.php');
}else{
  echo "<script>alert('Incorrect email or password !');</script>";
}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>MyBlog - Admin Panel</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
    <style>
      @import url('https://fonts.googleapis.com/css?family=Montserrat:600&display=swap');
body{
  margin: 0;
  padding: 0;
  display: flex;
  height: 150vh;
  background: #fff;
}
input, button, select, textarea{
  font-family: 'Courier New', Courier, monospace !important;
}
span{
  position: relative;
  display: inline-flex;
  width: 200px;
  height: 40px;
  margin: 100px 150px;
  perspective: 1000px;
}
span a{
  font-size: 19px;
  letter-spacing: 1px;
  transform-style: preserve-3d;
  transform: translateZ(-25px);
  transition: transform .25s;
  font-family: 'Montserrat', sans-serif;
  
}
span a:before,
span a:after{
  position: absolute;
  content: "Trở lại Website";
  height: 55px;
  width: 180px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 5px solid black;
  box-sizing: border-box;
  border-radius: 5px;
}
span a:before{
  color: #fff;
  background: #000;
  transform: rotateY(0deg) translateZ(25px);
}
span a:after{
  color: #000;
  transform: rotateX(90deg) translateZ(25px);
}
span a:hover{
  transform: translateZ(-25px) rotateX(-90deg);
}

    </style>
</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" method="post">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="email" class="form-control" name="email" placeholder="Email" autofocus required>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        
        <button class="btn btn-primary btn-lg btn-block" name="login" type="submit">Đăng Nhập</button>
       
      </div>
    </form>
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          <span><a href="../index.php" style="font-size:large; font-weight:bold;"></a></span>
        </div>
    </div>
  </div>


</body>

</html>
