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
          <li class="nav-item <?php if ($activebar == "user"){echo "active";} ?>">
            <a class="nav-link" href="<?php echo site_url("Users/user"); ?>">
            <i class="material-icons">people</i>
              <p>จัดการข้อมูลพื้นฐาน</p>
            </a>
          </li>
          <!-- <li class="nav-item dropdown <?php if ($activebar == "simple"){echo "active";} ?>">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" style="font-size: 14px;" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">people</i>จัดการข้อมูลพื้นฐาน
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item <?php if ($activebar == "user"){echo "active";} ?>" href="<?php echo site_url("Users/user"); ?>">จัดการข้อมูลผู้ใช้งาน</a>
              <a class="dropdown-item <?php if ($activebar == "simple"){echo "active";} ?>" href="<?php echo site_url("Simples/simple"); ?>">จัดการข้อมูลตำแหน่งงาน</a>
            </div>
          </li> -->
          <li class="nav-item <?php if ($activebar == "vegetation"){echo "active";} ?>">
            <a class="nav-link" href="<?php echo site_url("Vegetations/vegetation"); ?>">
            <i class="material-icons">park</i>
              <p>จัดการข้อมูลพรรณไม้</p>
            </a>
          </li>
          <li class="nav-item <?php if ($activebar == "plant"){echo "active";} ?>">
            <a class="nav-link" href="<?php echo site_url("Plants/plant"); ?>">
              <i class="material-icons">forest</i>
              <p>จัดการข้อมูลต้นไม้</p>
            </a>
          </li>
          <li class="nav-item <?php if ($activebar == "zone"){echo "active";} ?>">
            <a class="nav-link" href="<?php echo site_url("Zones/zone"); ?>">
              <i class="material-icons">bubble_chart</i>
              <p>จัดการโซน</p>
            </a>
          </li>
          <li class="nav-item <?php if ($activebar == "mainmethod"){echo "active";} ?>">
            <a class="nav-link" href="<?php echo site_url("Mainmethods/mainmethod"); ?>">
              <i class="material-icons">content_paste</i>
              <p>จัดการวิธีการดูแลรักษา</p>
            </a>
          </li>
          <li class="nav-item <?php if ($activebar == "plantpath"){echo "active";} ?> ">
            <a class="nav-link" href="<?php echo site_url("Plantpaths/plantpath"); ?>">
              <i class="material-icons">location_ons</i>
              <p>จัดการส่วนประกอบต้นไม้</p>
            </a>
          </li>
          <!-- ของพนักงานทั่วไป -->
          <li class="nav-item <?php if ($activebar == "maintenance"){echo "active";} ?> ">
            <a class="nav-link" href="<?php echo site_url("Maintenances/maintenance"); ?>">
              <i class="material-icons">library_books</i>
              <p>การดูแลรักษา</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel">