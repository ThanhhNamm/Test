<?php
require('../includes/db.php');
require('../includes/function.php');
if(!isset($_SESSION['isUserLoggedIn'])){
  header('Location:login.php');
}
$admin=getAdminInfo($db,$_SESSION['email']);

if(isset($_POST['update_profile'])){

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($db, ($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($db, ($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($db, ($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($db, "UPDATE `profile` SET password = '$confirm_pass' ") or die('query failed');
         $message[] = 'password updated successfully!';
      } 
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="profile.css">

</head>
<body>
<div class="update-profile">

<?php
   $select = mysqli_query($db, "SELECT * FROM `profile`") or die('query failed');
   if(mysqli_num_rows($select) > 0){
      $fetch = mysqli_fetch_assoc($select);
   }
?>

<form action="" method="post" enctype="multipart/form-data">
   <?php
      if($fetch['image'] == ''){
         echo '<img src="img/default-avatar.png">';
      }else{
         echo '<img src="uploaded_img/'.$fetch['image'].'">';
      }
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
   ?>
   <div class="flex">
     
      <div class="inputBox input_pass">
         <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
         <span>old password :</span>
         <input type="password" name="update_pass" placeholder="enter previous password" class="box" autofocus required>
         <span>new password :</span>
         <input type="password" name="new_pass" placeholder="enter new password" class="box" autofocus required >
         <span>confirm password :</span>
         <input type="password" name="confirm_pass" placeholder="confirm new password" class="box" autofocus required>
      </div>
   </div>
   <div class="button_profile">
   <input type="submit" value="Đổi Mật Khẩu" name="update_profile" class="btn">
   <a href="profile_admin.php" class="delete-btn">Trở về</a>
    </div>
</form>

</div>

</body>
</html>