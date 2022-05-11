<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar</title>
  <!-- CSS only -->
  <link href="./fontawesome-free-6.0.0-web/fontawesome-free-6.0.0-web/css/all.min.css" rel="stylesheet" />
  <!-- link boostrap icon -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="../style.css" rel="stylesheet" />
  <style>
 
.button-57 {
  position: relative;
  overflow: hidden;
  border: 1px solid #18181a;
  color: #18181a;
  display: inline-block;
  font-size: 15px;
  line-height: 15px;
  width: 200px;
  padding: 10px 18px 10px;
  text-decoration: none;
  cursor: pointer;
  background: #fff;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-57 span:first-child {
  position: relative;
  transition: color 600ms cubic-bezier(0.48, 0, 0.12, 1);
  z-index: 10;
}

.button-57 span:last-child {
  color: white;
  display: block;
  position: absolute;
  bottom: 0;
  transition: all 500ms cubic-bezier(0.48, 0, 0.12, 1);
  z-index: 100;
  opacity: 0;
  top: 50%;
  left: 50%;
  transform: translateY(225%) translateX(-50%);
  height: 14px;
  line-height: 13px;
}

.button-57:after {
  content: "";
  position: absolute;
  bottom: -50%;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: blue;
  transform-origin: bottom center;
  transition: transform 600ms cubic-bezier(0.48, 0, 0.12, 1);
  transform: skewY(9.3deg) scaleY(0);
  z-index: 50;
}

.button-57:hover:after {
  transform-origin: bottom center;
  transform: skewY(9.3deg) scaleY(2);
}

.button-57:hover span:last-child {
  transform: translateX(-50%) translateY(-100%);
  opacity: 1;
  transition: all 900ms cubic-bezier(0.48, 0, 0.12, 1);
}
.navbar-light .navbar-nav .nav-link:focus, .navbar-light .navbar-nav .nav-link:hover{
  font-weight: 700;
}
.navbar-light .navbar-nav .nav-link:focus, .navbar-light .navbar-nav .nav-link{
  color: black !important;
}
/* 
.btn_search_nav{
    width: 150px;
     background-color: #8DEEEE;
     color: white;
 }

   .navbar-dark .navbar-nav .nav-link:hover{
    border-bottom: 3px solid #fff;
    animation:navbar .3s linear;
    
}
@keyframes navbar {
    from{
        opacity: 0;
    }
    to{
        opacity: 1;
    }
} */
  </style>

<body>

  <nav class="navbar sticky-top navbar-expand-lg navbar-light " style="background-color: #7DB5FF;">
    <div class="container">
      <img style="width: 30px; margin-right: 5px;" src="./img/logoTam.png" />

      <a style="font-weight: bold" class="navbar-brand" href="#">
        <!-- <img src="../fontawesome-free-6.0.0-web/fontawesome-free-6.0.0-web/svgs/solid/scale-balanced.svg" /> -->

        <!-- <i style="background-color:#f70037 ; padding:5px;"  class="fa-solid fa-scale-balanced"></i> -->

        Văn Phòng Từ Tâm
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <?php
          $navQuery = "SELECT * FROM menu";
          $runNav = mysqli_query($db, $navQuery);
          while ($menu = mysqli_fetch_assoc($runNav)) {
            $no = getSubMenuNo($db, $menu['id']);
            if (!$no) {
          ?>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?= $menu['action'] ?>"><?= $menu['name'] ?></a>
              </li>
            <?php
            } else {
            ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="<?= $menu['action'] ?>" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?= $menu['name'] ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                  <?php
                  $submenus = getSubMenu($db, $menu['id']);
                  foreach ($submenus as $sm) {
                  ?>
                    <li><a class="dropdown-item" href="<?= $sm['action'] ?>"><?= $sm['name'] ?></a></li>

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
          <button class="button-57  btn_search_nav" type="submit"><span class="text">Tìm Kiếm</span><span>Tìm Kiếm</span></button>
           <!-- HTML !-->

        </form>
      </div>
    </div>
  </nav>
</body>

</html>