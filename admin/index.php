<?php
require('../includes/db.php');
require('../includes/function.php');
if (!isset($_SESSION['isUserLoggedIn'])) {
  header('Location:login.php');
}
$admin = getAdminInfo($db, $_SESSION['email']);
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

  <title>Từ Tâm - Trang Quản Trị</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">

  <!-- custom css file link  -->
  <link rel="stylesheet" href="index.css">


  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
  <style>
   body{
     font-family: 'Courier New', Courier, monospace;
   }
   .modal-header h4.modal-title{
    font-family: 'Courier New', Courier, monospace !important;
   }
   .panel-heading{
     font-weight: bold;
   }
  </style>
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.php" class="logo">Nice <span class="lite">Admin</span></a>


      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">


          <!-- task notificatoin end -->
          <!-- inbox notificatoin start-->

          <!-- inbox notificatoin end -->
          <!-- alert notification start-->

          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <span class="profile-ava">

                <div class="profile">
                  <?php
                  $select = mysqli_query($db, "SELECT * FROM `profile`") or die('query failed');
                  if (mysqli_num_rows($select) > 0) {
                    $fetch = mysqli_fetch_assoc($select);
                  }
                  if ($fetch['image'] == '') {
                    echo '<img src="img/user.jpg">';
                  } else {
                    echo '<img src="uploaded_img/' . $fetch['image'] . '" height="35" width="35" >';
                  }
                  ?>
              </span>

              <span class="name"><?= $admin['email'] ?></span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="profile_admin.php"><i class="icon_profile"></i> Tài khoản của tôi</a>
              </li>
              <li>
                <a href="../includes/logout.php"><i class="icon_key_alt"></i> Đăng xuất</a>
              </li>

            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="index.php">
              <!-- <i class="icon_house_alt"></i> -->
              <span>Thêm bài đăng</span>
            </a>
          </li>
          <li class="active">
            <a class="" href="index.php?managepost">
              <!-- <i class="icon_house_alt"></i> -->
              <span>Quản lí bài đăng</span>
            </a>
          </li>
          <li class="active">
            <a class="" href="index.php?managecomment">
              <!-- <i class="icon_house_alt"></i> -->
              <span>Quản lí bình luận</span>
            </a>
          </li>
          <li class="active">
            <a class="" href="index.php?managecategory">
              <!-- <i class="icon_house_alt"></i> -->
              <span>Quản lí Danh mục</span>
            </a>
          </li>
          <li class="active">
            <a class="" href="index.php?managemenu">
              <!-- <i class="icon_house_alt"></i> -->
              <span>Quản lí Menu</span>
            </a>
          </li>
          <li class="active">
            <a class="" href="../index.php">
              <!-- <i class="icon_house_alt"></i> -->
              <span>Trở về Website</span>
            </a>
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->


        <!--/.row-->


        <div class="row">
          <div class="col-lg-12 col-md-12">
            <?php
            if (isset($_GET['managepost'])) {
            ?>
              <div class="row">
                <div class="col-lg-12">
                  <section class="panel">
                    <header class="panel-heading">
                      Bài đăng
                    </header>

                    <table class="table table-striped table-advance table-hover">
                      <tbody>
                        <tr>
                          <th>#</th>
                          <th>Tiêu đề bài đăng</th>
                          <th>Danh mục bài đăng</th>
                          <th>Thời gian đăng</th>
                          <th>Hành động</th>


                        </tr>

                        <?php
                        $posts = getAllPost($db);
                        $count = 1;
                        foreach ($posts as $post) {
                        ?>
                          <tr>
                            <td><?= $count ?></td>
                            <td><?= $post['title'] ?></td>
                            <td><?= getCategory($db, $post['category_id']) ?></td>

                            <td><?= date('F jS, Y', strtotime($post['created_at'])) ?></td>


                            <td>
                              <div class="btn-group">

                                <a class="btn btn-danger" href="../includes/removepost.php?id=<?= $post['id'] ?>">Xóa <i class="icon_close_alt2"></i></a>
                              </div>
                            </td>
                          </tr>
                        <?php
                          $count++;
                        }
                        ?>




                      </tbody>
                    </table>
                  </section>
                </div>
              </div>


              <!-- Phần quản lí comment -->


            <?php
            } else if (isset($_GET['managecomment'])) {
            ?>
              <div class="row">
                <div class="col-lg-12">
                  <section class="panel">
                    <header class="panel-heading">
                      Quản lí bình luận
                    </header>

                    <table class="table table-striped table-advance table-hover">
                      <tbody>
                        <tr>
                          <th>#</th>
                          <th>Nội dung bình luận</th>
                          <th>Tác giả</th>
                          <th>Thời gian đăng</th>
                          <th>Hành động</th>


                        </tr>

                        <?php
                        $posts = getCommentPost($db);
                        $count = 1;
                        foreach ($posts as $post) {
                        ?>
                          <tr>
                            <td><?= $count ?></td>
                            <td><?= $post['comment'] ?></td>
                            <td><?= $post['name'] ?></td>


                            <td><?= date('F jS, Y', strtotime($post['created_at'])) ?></td>


                            <td>
                              <div class="btn-group">

                                <a class="btn btn-danger" href="../includes/removepost.php?id=<?= $post['id'] ?>">Xóa <i class="icon_close_alt2"></i></a>
                              </div>
                            </td>
                          </tr>
                        <?php
                          $count++;
                        }
                        ?>




                      </tbody>
                    </table>
                  </section>
                </div>
              </div>



            <?php
            } else if (isset($_GET['managemenu'])) {
            ?>
              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                      <h4 class="modal-title">Thêm Menu mới</h4>
                    </div>
                    <div class="modal-body">

                      <form role="form" method="post" action="../includes/addmenu.php">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tiêu đề Menu</label>
                          <input type="text" name="menu-name" class="form-control" id="exampleInputEmail3" placeholder="Enter menu name..">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Đường dẫn Menu</label>
                          <input type="text" name="menu-link" class="form-control" id="exampleInputEmail3" value="#" placeholder="Enter menu link..">
                        </div>


                        <button type="submit" name="addmenu" class="btn btn-primary">Thêm</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <section class="panel">
                    <header class="panel-heading">
                      Menu - <a href="#myModal" data-toggle="modal" class="text-primary">
                        Thêm mới Menu</a>
                    </header>

                    <table class="table table-striped table-advance table-hover">
                      <tbody>
                        <tr>
                          <th>#</th>
                          <th>Menu</th>
                          <th>Đường link</th>
                          <th>Hành động</th>


                        </tr>

                        <?php
                        $menus = getMenu($db);
                        $count = 1;
                        foreach ($menus as $menu) {
                        ?>
                          <tr>
                            <td><?= $count ?></td>
                            <td><?= $menu['name'] ?></td>
                            <td><?= $menu['action'] ?></td>


                            <td>
                              <div class="btn-group">

                                <a class="btn btn-danger" href="../includes/removemenu.php?id=<?= $menu['id'] ?>">Xóa <i class="icon_close_alt2"></i></a>
                              </div>
                            </td>
                          </tr>
                        <?php
                          $count++;
                        }
                        ?>




                      </tbody>
                    </table>
                  </section>
                </div>
              </div>







              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal1" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                      <h4 class="modal-title">Thêm mới menu con</h4>
                    </div>
                    <div class="modal-body">

                      <form role="form" method="post" action="../includes/addmenu.php">
                        <div class="form-group">
                          <label for="exampleInputEmail1"> Tiêu đề menu con</label>
                          <input type="text" name="submenu-name" class="form-control" id="exampleInputEmail3" placeholder="Enter menu name..">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Chọn menu chứa menu con</label>
                          <select name="parent-id" class="form-control" id="exampleInputEmail3">
                            <?php
                            $mlist = getAllMenu($db);
                            foreach ($mlist as $m) {
                            ?>
                              <option value="<?= $m['id'] ?>"><?= $m['name'] ?></option>

                            <?php
                            }
                            ?>

                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Đường dẫn menu con</label>
                          <input type="text" name="submenu-link" class="form-control" id="exampleInputEmail3" value="#" placeholder="Enter menu link..">
                        </div>


                        <button type="submit" name="addsubmenu" class="btn btn-primary">Thêm</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <section class="panel">
                    <header class="panel-heading">
                      SubMenu - <a href="#myModal1" data-toggle="modal" class="text-primary">
                        Thêm mới menu con</a>
                    </header>

                    <table class="table table-striped table-advance table-hover">
                      <tbody>
                        <tr>
                          <th>#</th>
                          <th>Menu con</th>
                          <th>Menu chứa menu con</th>
                          <th>Đường link</th>
                          <th>Hành động</th>


                        </tr>

                        <?php
                        $submenus = getAllSubMenu($db);
                        $count = 1;
                        foreach ($submenus as $menu) {
                        ?>
                          <tr>
                            <td><?= $count ?></td>
                            <td><?= $menu['name'] ?></td>
                            <td><?= getMenuName($db, $menu['parent_menu_id']) ?></td>

                            <td><?= $menu['action'] ?></td>


                            <td>
                              <div class="btn-group">

                                <a class="btn btn-danger" href="../includes/removesubmenu.php?id=<?= $menu['id'] ?>">Xóa <i class="icon_close_alt2"></i></a>
                              </div>
                            </td>
                          </tr>
                        <?php
                          $count++;
                        }
                        ?>




                      </tbody>
                    </table>
                  </section>
                </div>
              </div>


            <?php
            } else if (isset($_GET['managecategory'])) {
            ?>
              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                      <h4 class="modal-title">Thêm mới danh mục</h4>
                    </div>
                    <div class="modal-body">

                      <form role="form" method="post" action="../includes/addct.php">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tên Danh mục</label>
                          <input type="text" name="category-name" class="form-control" id="exampleInputEmail3" placeholder="Nhập tên danh mục..">
                        </div>



                        <button type="submit" name="addct" class="btn btn-primary">Thêm</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <section class="panel">
                    <header class="panel-heading">
                      Category - <a href="#myModal" data-toggle="modal" class="text-primary">
                        Thêm mới danh mục
                      </a>
                    </header>

                    <table class="table table-striped table-advance table-hover">
                      <tbody>
                        <tr>
                          <th>#</th>
                          <th>Tên Danh mục</th>
                          <th>Hành động</th>

                        </tr>

                        <?php
                        $categories = getAllCategory($db);
                        $count = 1;
                        foreach ($categories as $ct) {
                        ?>
                          <tr>
                            <td><?= $count ?></td>
                            <td><?= $ct['name'] ?></td>

                            <td>
                              <div class="btn-group">

                                <a class="btn btn-danger" href="../includes/removect.php?id=<?= $ct['id'] ?>">Xóa <i class="icon_close_alt2"></i></a>
                              </div>
                            </td>
                          </tr>
                        <?php
                          $count++;
                        }
                        ?>




                      </tbody>
                    </table>
                  </section>
                </div>
              </div>
            <?php
            } else {
            ?>
              <div class="col-lg-12">
                <section class="panel">
                  <header class="panel-heading">
                    Thêm bài đăng
                  </header>
                  <div class="panel-body">
                    <div class="form">
                      <form action="../includes/addpost.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-group">
                          <div class="col-sm-12">
                            <label style="font-weight:bold">Tiêu đề bài đăng</label>
                            <input type="text" class="form-control" name="post_title">
                          </div>
                        </div>
                        <div class="form-group">

                          <div class="col-sm-12">
                            <label style="font-weight:bold">Nội dung bài đăng</label>
                            <textarea class="form-control ckeditor" name="post_content" rows="6"></textarea>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-sm-6">
                            <div class="col-sm-12">
                              <label style="font-weight:bold">Chọn danh mục cho bài đăng</label>

                              <select name="post_category" class="form-control">
                                <?php
                                $categories = getAllCategory($db);
                                foreach ($categories as $ct) {
                                ?>
                                  <option value="<?= $ct['id'] ?>"><?= $ct['name'] ?></option>
                                <?php
                                }
                                ?>

                              </select>
                            </div>
                          </div>
                          <div class="form-group col-sm-6">
                            <div class="col-sm-12">
                              <label style="font-weight:bold">Tải ảnh lên (tối đa 5 ảnh)</label>

                              <input type="file" class="form-control" name="post_image[]" accept="image/*" multiple />
                            </div>
                          </div>
                        </div>
                        <input type="submit" name="addpost" class="btn btn-primary" value=" Thêm Bài ">
                      </form>
                    </div>
                  </div>
                </section>
              </div>

          </div>

        </div>
      <?php
            }
      ?>



      <!-- Today status end -->





      <!-- statics end -->





      <!-- project team & activity end -->

      </section>

    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <<script src="js/fullcalendar.min.js">
    </script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
    <!-- custom form component script for this page-->
    <script src="js/form-component.js"></script>
    <script src="js/scripts.js"></script>

    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

</body>

</html>