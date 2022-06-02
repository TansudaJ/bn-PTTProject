<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url();?>/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    PTT
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url();?>/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url();?>/assets/demo/demo.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
  <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  
</head>

<body class="">
  <div class="wrapper ">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="sidebar" data-color="green" data-background-color="white" data-image="<?php echo base_url();?>/assets/img/sidebar-1.jpg">
      <div class="logo"><a href="#" class="simple-text logo-normal">
          PTTEP
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
          <a class="nav-link" href="<?php echo site_url("Dashboards/dashboard"); ?>">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>

          <?php if($_SESSION['authority_authorityID'] == '1'){?>
          <li class="nav-item <?php if ($activebar == "user"){echo "active";} ?>">
            <a class="nav-link" href="<?php echo site_url("Users/user"); ?>">
            <i class="material-icons">people</i>
              <p>จัดการข้อมูลพื้นฐาน</p>
            </a>
          </li>
          <?php } ?>

          <?php if($_SESSION['authority_authorityID'] == '1' || $_SESSION['authority_authorityID'] == '2'){?>
          <li class="nav-item dropdown <?php if ($activebar == "vegetation"){echo "active";} ?>">
            <a class="nav-link dropdown-toggle" href="#vege" role="button" data-toggle="collapse" style="font-size: 14px;" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">park</i>จัดการข้อมูลพันธุ์ไม้
            </a>
            <div class="collapse in" id="vege">
              <a class="dropdown-item <?php if ($activebar == "vegetation"){echo "active";} ?>" href="<?php echo site_url("Vegetations/vegetation");?>" style="margin: 0 0 0 62px;">ข้อมูลพันธุ์ไม้</a>
              <a class="dropdown-item <?php if ($activebar == "pathmain"){echo "active";} ?>" href="<?php echo site_url("Pathmains/pathmain");?>" style="margin: 0 0 0 62px;">ข้อมูลส่วนประกอบ</a>
            </div>
          </li>
          <?php } ?>

          <li class="nav-item <?php if ($activebar == "plant"){echo "active";} ?>">
            <a class="nav-link" href="<?php echo site_url("Plants/plant"); ?>">
              <i class="material-icons">forest</i>
              <p>จัดการข้อมูลต้นไม้</p>
            </a>
          </li>

          <li class="nav-item dropdown <?php if ($activebar == "ecosystem"){echo "active";} ?>">
            <a class="nav-link dropdown-toggle" href="#eco" role="button" data-toggle="collapse" style="font-size: 14px;" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">emoji_nature</i>ระบบนิเวศภายในสวน
            </a>
            <div class="collapse in" id="eco">
              <a class="dropdown-item <?php if ($activebar == "ecosystem"){echo "active";} ?>" href="<?php echo site_url("Ecosytems/ecosytem");?>" style="margin: 0 0 0 62px;">พืช</a>
              <a class="dropdown-item <?php if ($activebar == "animals"){echo "active";} ?>" href="<?php echo site_url("Animals/animal");?>" style="margin: 0 0 0 62px;">สัตว์</a>
            </div>
          </li>

          <?php if($_SESSION['authority_authorityID'] == '1' || $_SESSION['authority_authorityID'] == '2'){?>
          <li class="nav-item <?php if ($activebar == "zone"){echo "active";} ?>">
            <a class="nav-link" href="<?php echo site_url("Zones/zone"); ?>">
              <i class="material-icons">bubble_chart</i>
              <p>จัดการโซน</p>
            </a>
          </li>
          <?php } ?>

          <?php if($_SESSION['authority_authorityID'] == '1' || $_SESSION['authority_authorityID'] == '2'){?>
          <li class="nav-item <?php if ($activebar == "imagemap"){echo "active";} ?>">
            <a class="nav-link" href="<?php echo site_url("Imagemaps/imagemap"); ?>">
            <i class="material-icons">location_ons</i>
              <p>จัดการแผนที่รูปภาพ</p>
            </a>
          </li>
          <?php } ?>
          
          <?php if($_SESSION['authority_authorityID'] == '1' || $_SESSION['authority_authorityID'] == '2'){?>
          <li class="nav-item <?php if ($activebar == "mainmethod"){echo "active";} ?>">
            <a class="nav-link" href="<?php echo site_url("Mainmethods/mainmethod"); ?>">
              <i class="material-icons">content_paste</i>
              <p>จัดการวิธีการดูแลรักษา</p>
            </a>
          </li>
          <?php } ?>

          <?php if($_SESSION['authority_authorityID'] == '1' || $_SESSION['authority_authorityID'] == '2'){?>
          <li class="nav-item <?php if ($activebar == "plantpath"){echo "active";} ?> ">
            <a class="nav-link" href="<?php echo site_url("Plantpaths/plantpath"); ?>">
              <i class="material-icons">local_florist</i>
              <p>จัดการส่วนประกอบต้นไม้</p>
            </a>
          </li>
          <?php } ?>

          <!-- ของพนักงานทั่วไป -->
          <li class="nav-item <?php if ($activebar == "maintenance"){echo "active";} ?> ">
            <a class="nav-link" href="<?php echo site_url("Maintenances/maintenance"); ?>">
              <i class="material-icons">assignment</i>
              <p>การดูแลรักษา</p>
            </a>
          </li>
          <!-- ออกรายงาน -->
          <li class="nav-item dropdown <?php if ($activebar == "vegereport"){echo "active";} ?>">
            <a class="nav-link dropdown-toggle" href="#report" role="button" data-toggle="collapse" style="font-size: 14px;" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">library_books</i>การออกรายงาน
            </a>
            <div  class="collapse" id="report">
              <a class="dropdown-item <?php if ($activebar == "vegereport"){echo "active";} ?>" href="<?php echo site_url("Reports/vegereport");?>" style="margin: 0 0 0 62px;">ออกรายงานพันธุ์ไม้</a>
              <a class="dropdown-item <?php if ($activebar == "zonereport"){echo "active";} ?>" href="<?php echo site_url("Reports/zonereport");?>" style="margin: 0 0 0 62px;">ออกรายงานโซน</a>
              <a class="dropdown-item <?php if ($activebar == "maintenancereport"){echo "active";} ?>" href="<?php echo site_url("Reports/maintenancereport");?>" style="margin: 0 0 0 62px;">ออกรายงานการดูแลรักาษา</a>
            </div>
          </li>

        </ul>
      </div>
    </div>
    <div class="main-panel">