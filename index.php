<?php
require('includes/db.php');
include('includes/function.php');

if(isset($_GET['page'])){
  $page=$_GET['page'];
}else{
  $page=1;
}
$post_per_page=5;
$result=($page-1)*$post_per_page;

// $result = 0
// $result = 5;
// $result = 10

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Trang chủ - Từ Tâm Official</title>
    <!-- Start Quick Buttons By share123bloggertemplates.com -->
   <div class='quick-call-button'></div>
   <div class='call-now-button'>
    <div>
    <p class='call-text'><a href='tel:0859016956' title='Liên Hệ Chúng Tôi' > Liên Hệ Chúng Tôi </a></p>
     <a href='tel:0859016956' title='Liên Hệ Chúng Tôi' >
     <div class='quick-alo-ph-circle'></div>
                    <div class='quick-alo-ph-circle-fill'></div>
                    <div class='quick-alo-ph-btn-icon quick-alo-phone-img-circle'></div>
     </a>
    </div>
   </div>
     <style>
    @media screen and (max-width: 1920px) {
    .call-now-button { display: flex !important; background: #d818db; }
    .quick-call-button { display: block !important; }
    }
                @media screen and (min-width: px) {
    .call-now-button .call-text { display: none !important; }
    }
    @media screen and (max-width: 1024px) {
    .call-now-button .call-text { display: none !important; }
    }
    .call-now-button { top: 78%; }
    .call-now-button { left: 86%; }
    .call-now-button { background: #d818db; }
    .quick-alo-ph-btn-icon { background-color: #ffffff !important; }
    .call-now-button .call-text { color: #fff; }
    .call-now-button div{
      padding: 0px 25px 0px 6px;
    }
    .call-now-button div p{
      margin: 8px 47px 8px 0px !important;
    }
    .quick-alo-ph-circle{
      top: -25px !important;
      left: unset !important;
      right: -15px !important;
    }
    .quick-alo-ph-circle-fill{
      top: -15px !important;
      left: unset !important;
      right: -6px !important;
    }
    .quick-alo-ph-btn-icon{
      top: 0 !important;
      left: unset !important;
      right: 10px !important;
    }
   </style>
   <!-- /End Quick Buttons By Share123bloggertemplates.com -->
<link rel='stylesheet' id='lv_css-css'  href='https://cdn.jsdelivr.net/gh/hongblogger/2019@master/quick-call-button-hong.css' type='text/css' media='all' />
<!--nut goi share123bloggertemplates.com-->

</head>
<body>
      <?php include_once('includes/navbar.php'); ?>
<div>
    <div class="container m-auto mt-3 row">
        <div class="col-8">

       <?php
       if(isset($_GET['search'])){
         $keyword = $_GET['search'];
         $postQuery="SELECT * FROM posts WHERE title LIKE '%$keyword%' ORDER BY id DESC LIMIT $result,$post_per_page";
       }else{
        $postQuery="SELECT * FROM posts ORDER BY id DESC LIMIT $result,$post_per_page";
       }
      
       $runPQ=mysqli_query($db,$postQuery);
       while($post=mysqli_fetch_assoc($runPQ)){
         ?>
<div class="card mb-3" style="max-width: 800px;">
<a href="post.php?id=<?=$post['id']?>" style="text-decoration:none;color:black">
            <div class="row g-0">
              <div class="col-md-5" style="background-image: url('images/<?=getPostThumb($db,$post['id'])?>');background-size: cover">
               
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <h5 class="card-title"><?=$post['title']?></h5>
                 
                  <p class="card-text text-truncate"><?echo substr($post['content'], 0, 2000);?></p>
                  <p class="card-text"><small class="text-muted">Đăng vào lúc <?=date('F jS, Y',strtotime($post['created_at']))?></small></p>
                </div>
              </div>
            </div>
</a>
          </div>
         <?php
       }
       ?>
        
         
    </div>

    <?php include_once('includes/sidebar.php'); ?>
    
    </div>
<?php
if(isset($_GET['search'])){
  $keyword=$_GET['search'];
$q="SELECT * FROM posts WHERE title LIKE '%$keyword%'";

}else{
  $q="SELECT * FROM posts";
  
}
$r=mysqli_query($db,$q);
$total_posts=mysqli_num_rows($r);
$total_pages=ceil($total_posts/$post_per_page);

?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
        <?php
if($page>1){
  $switch="";
}else{
  $switch="disabled";
}
if($page<$total_pages){
  $nswitch="";
}else{
  $nswitch="disabled";
}
        ?>
          <li class="page-item <?=$switch?>">
            <a class="page-link" href="?<?php if(isset($_GET['search'])){echo "search=$keyword&";}?>page=<?=$page-1?>" tabindex="-1" aria-disabled="true">Trước</a>
          </li>
          <?php
for($opage=1;$opage<=$total_pages;$opage++){
  ?>
          <li class="page-item"><a class="page-link" href="?<?php if(isset($_GET['search'])){echo "search=$keyword&";}?>page=<?=$opage?>"><?=$opage?></a></li>

  <?php
}
          ?>
          
          <li class="page-item <?=$nswitch?>">
            <a class="page-link" href="?<?php if(isset($_GET['search'])){echo "search=$keyword&";}?>page=<?=$page+1?>">Tiếp</a>
          </li>
        </ul>
      </nav>
      
      <?php include_once('includes/footer.html'); ?>
        
      <!-- để mở menu khi ở chế độ điện thoại -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>    
</body>
</html>