<?php
require('includes/db.php');
include('includes/function.php');
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Send Mail From Localhost | CodingNepal</title>
      <link rel="stylesheet" href="style.css">
      <!-- bootstrap cdn link -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
      
      <style>
body {
    background-color: #f2f7fb
}

.login-block {
    margin: 30px auto;
    min-height: 93.6vh
}

.login-block .auth-box {
    margin: 20px auto 0;
    max-width: 569px !important
}

.contact-us {
    font-size: 24px;
    font-weight: 300
}

.respond {
    font-size: 15px !important;
    font-weight: 200;
    margin-top: -6px
}
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 0 5px 0 rgba(43, 43, 43, .1), 0 11px 6px -7px rgba(43, 43, 43, .1);
    box-shadow: 0 0 5px 0 rgba(43, 43, 43, .1), 0 11px 6px -7px rgba(43, 43, 43, .1);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out
}

.card .card-block {
    padding: 1.25rem
}

.f-56 {
    font-size: 56px
}

.form-group {
    margin-bottom: 1.25em
}

.form-material .form-control {
    display: inline-block;
    height: 43px;
    width: 100%;
    border: none;
    border-radius: 0;
    font-size: 16px;
    font-weight: 400;
    padding: 0;
    background-color: transparent;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-bottom: 1px solid #ccc
}

.btn-md {
    padding: 10px 16px;
    font-size: 15px;
    line-height: 23px
}

.btn-primary {
    background-color: #4099ff;
    border-color: #4099ff;
    color: #fff;
    cursor: pointer;
    -webkit-transition: all ease-in .3s;
    transition: all ease-in .3s
}

.btn {
    border-radius: 2px;
    text-transform: capitalize;
    font-size: 15px;
    padding: 10px 19px;
    cursor: pointer
}

.m-b-20 {
    margin-bottom: 20px
}

.btn-md {
    padding: 10px 16px;
    font-size: 15px;
    line-height: 23px
}
      </style>
   </head>
   <body>
   <?php include_once('includes/navbar.php'); ?>
   <section class="login-block">
     <div class="container-fluid">
         <div class="row">
             <div class="col-sm-12">
                 <form class="md-float-material form-material">
                     <div class="auth-box card">
                         <div class="card-block">
                             <div class="row">
                                 <div class="col-md-12">
                                     <h3 class="text-center"><i class="fa fa-phone-square text-primary f-56"></i></h3>
                                     <h3 class="text-center contact-us">Contact Us</h3>
                                     <h6 class="text-center respond">(we generally respond in 24 hours)</h6>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="form-group form-primary"> <input type="text" name="email" class="form-control text-left" placeholder="Name" required=""> </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group form-primary"> <input type="text" name="email" class="form-control text-left" placeholder="Email" required=""> </div>
                                 </div>
                             </div>
                             <div class="form-group form-primary"> <input type="text" name="email" class="form-control text-left" placeholder="Message" required=""> </div>
                             <div class="row">
                                 <div class="col-md-12">
                                     <button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"><i class="fa fa-phone"></i> Contact Now </button>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </section>
      <?php include_once('includes/footer.html'); ?>
   </body>
</html>