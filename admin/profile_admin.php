<?php
require('../includes/db.php');
require('../includes/function.php');
if(!isset($_SESSION['isUserLoggedIn'])){
  header('Location:login.php');
}
$admin=getAdminInfo($db,$_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Profile</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="profile.css">

</head>
<body>
   
<div class="container">

   <div class="profile">
      <?php
         $select = mysqli_query($db, "SELECT * FROM `profile`") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="img/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      
      <h3><?php echo $fetch['email']; ?></h3>
      <a href="update_profile.php" class="btn_pro">Cập nhật thông tin</a>
      <a href="changepassword.php" class="btn_pro">Đổi mật khẩu</a>
      <a href="index.php" class="btn_pro">Trở về trang chính</a>
      
   </div>

</div>

</body>
</html>