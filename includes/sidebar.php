<style>
   
 .btn_sidebar{
     background-color:#557A95;
 }
  </style>

<div class="col-4">

        <div class="card mb-3">
        <h5 class="card-header" style="background-color: #CCCCCC; text-align: center;">Thành viên trong văn phòng</h5>
            <div class="card-body" style="text-align: center;">
              
              <p class="card-text">Những người giữ chức vụ và trách nhiệm quan trọng trong Văn phòng Từ Tâm</p>
              <a href="./members.php" class="btn btn_sidebar"style="font-weight:bold; background-color:#8DEEEE;" >Xem thêm</a>
            </div>
          </div> 


        <div class="card mb-3">
        <h5 class="card-header" style="background-color: #CCCCCC; text-align: center;">Hoạt động của công ty</h5>
            <div class="card-body" style="text-align: center;">
              
              <p class="card-text">Nơi lưu trữ những kỉ niệm của tất cả thành viên trong công ty về những hoạt động ngoại khóa, kỳ nghỉ.</p>
              <a href="ActivityCompany.php" class="btn btn_sidebar" style="font-weight:bold; background-color:#8DEEEE;">Khám phá</a>
            </div>
          </div>




              
          <div>
                  <h4>Tin Nổi Bật</h4>
                
 <?php
 $pquery="SELECT * FROM featured_post ";
 $runPQ=mysqli_query($db,$pquery);
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




          

          <?php
          if(isset($_GET['id'])){
            ?>
<div class="card mb-3">
            <h5 class="card-header">Bình luận</h5>
            <?php
$comments = getComments($db,$post_id);
if(count($comments)<1){
  echo '<div class="card-body"><p class="text-center card-text">Không có bình luận nào..</p></div>';
}
foreach($comments as $comment){
  ?>
<div class="card-body">
              <h5 class="" style="margin-bottom: 0;"><?=$comment['name']?></h5>
             <span class="text-secondary"> <small><?=date('F jS, Y',strtotime($comment['created_at']))?></small></span>
              <p class="card-text"><?=$comment['comment']?></p>
              
            </div>
  <?php
}
            ?>
            
          </div>
            <?php
          }
          ?>
          
          
    </div>