<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="./fontawesome-free-6.0.0-web/fontawesome-free-6.0.0-web/css/all.min.css" rel="stylesheet"/>
    <!-- link boostrap icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../style.css" rel="stylesheet"/>
<body>
  
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="#">MyBlog</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
<?php
$navQuery = "SELECT * FROM menu";
$runNav=mysqli_query($db,$navQuery);
while($menu=mysqli_fetch_assoc($runNav)){
  $no = getSubMenuNo($db,$menu['id']);
  if(!$no){
    ?>
<li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?=$menu['action']?>"><?=$menu['name']?></a>
              </li>
    <?php
  }else{
    ?>
<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="<?=$menu['action']?>" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?=$menu['name']?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
<?php
$submenus = getSubMenu($db,$menu['id']);
foreach($submenus as $sm){
  ?>
                  <li><a class="dropdown-item" href="<?=$sm['action']?>"><?=$sm['name']?></a></li>

  <?php
}
?>
                  

                </ul>
              </li>
    <?php
  }
  ?>

  <?php
}
?>
              
            
              
              
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" name="search" type="search" placeholder="Nhập ở đây..." aria-label="Search">
              <button class="btn btn_search_nav" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>  
</body>
</html>

