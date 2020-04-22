<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Table Data Keluar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/web_admin/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <link href="<?php echo base_url() ?>assets/webcam/css/style.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/web_admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/web_admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/web_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/web_admin/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="<?php echo base_url() ?>assets/sweetalert/dist/sweetalert.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/web_admin/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo base_url('admin') ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php foreach ($avatar as $a) { ?>
                  <img src="<?php echo base_url('assets/upload/user/img/' . $a->nama_file) ?>" class="user-image" alt="User Image">
                <?php } ?>
                <span class="hidden-xs"><?= $this->session->userdata('name') ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <?php foreach ($avatar as $a) { ?>
                    <img src="<?php echo base_url('assets/upload/user/img/' . $a->nama_file) ?>" class="img-circle" alt="User Image">
                  <?php } ?>

                  <p>
                    <?= $this->session->userdata('name') ?> - Web Developer
                    <small>Last Login : <?= $this->session->userdata('last_login') ?></small>
                  </p>
                </li>
                <!-- Menu Body -->

                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?= base_url('admin/profile') ?>" class="btn btn-default btn-flat"><i class="fa fa-cogs" aria-hidden="true"></i> Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= base_url('admin/sigout') ?>" class="btn btn-default btn-flat"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <?php foreach ($avatar as $a) { ?>
              <img src="<?php echo base_url('assets/upload/user/img/' . $a->nama_file) ?>" class="img-circle" alt="User Image">
            <?php } ?>
          </div>
          <div class="pull-left info">
            <p><?= $this->session->userdata('name') ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li>
            <a href="<?= base_url('admin') ?>">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              <span class="pull-right-container">
                <!-- <i class="fa fa-angle-left pull-right"></i> -->
              </span>
            </a>
            <!-- <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>assets/web_admin/index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="<?php echo base_url('admin') ?>"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul> -->
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i> <span>Forms</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?= base_url('admin/form_barangmasuk') ?>"><i class="fa fa-circle-o"></i> Tambah Data Barang Masuk</a></li>
              <li><a href="<?= base_url('admin/form_satuan') ?>"><i class="fa fa-circle-o"></i> Tambah Satuan Barang</a></li>
            </ul>
          </li>
          <li class="treeview active">
            <a href="#">
              <i class="fa fa-table"></i> <span>Tables</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?= base_url('admin/tabel_barangmasuk') ?>"><i class="fa fa-circle-o"></i> Tabel Barang Masuk</a></li>
              <li class="active"><a href="<?= base_url('admin/tabel_barangkeluar') ?>"><i class="fa fa-circle-o"></i>Tabel Barang Keluar</a></li>
              <li><a href="<?= base_url('admin/tabel_satuan') ?>"><i class="fa fa-circle-o"></i> Tabel Satuan</a></li>
            </ul>
          </li>
          <!-- Source code Laporan -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-flag-o"></i> <span>Report</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?= base_url('admin/laporan_masuk') ?>"><i class="fa fa-circle-o"></i> Report Barang </a></li>
            </ul>
            <!-- Source code Laporan -->
          </li>
          <li class="header">LABELS</li>
          <li>
            <a href="<?php echo base_url('admin/profile') ?>">
              <i class="fa fa-cogs" aria-hidden="true"></i> <span>Profile</span></a>
          </li>
          <li>
            <a href="<?php echo base_url('admin/users') ?>">
              <i class="fa fa-fw fa-users" aria-hidden="true"></i> <span>Users</span></a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Scan QR Code
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>Tables</li>
          <li class="active"><a href="<?= base_url('admin/scan_qrcode') ?>">Scan QR Code</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">

            <!-- /.box -->
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body">

                <div class="container" id="QR-Code">
                  <div class="panel panel-info">
                    <div class="panel-heading">
                      <div class="navbar-form navbar-left">
                        <h4>Scan QR Code</h4>
                      </div>
                      <div class="navbar-form navbar-right">
                        <select class="form-control" id="camera-select"></select>
                        <div class="form-group">
                          <input id="image-url" type="text" class="form-control" placeholder="Image url">
                          <button title="Decode Image" class="btn btn-default btn-sm" id="decode-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-upload"></span></button>
                          <button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-picture"></span></button>
                          <button title="Play" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-play"></span></button>
                          <button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-pause"></span></button>
                          <button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-stop"></span></button>
                        </div>
                      </div>
                    </div>
                    <div class="panel-body text-center">
                      <div class="col-md-6">
                        <div class="well" style="position: relative;display: inline-block;">
                          <canvas width="320" height="240" id="webcodecam-canvas"></canvas>
                          <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                          <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                          <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                          <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                        </div>
                        <div class="well" style="width: 100%;">
                          <label id="zoom-value" width="100">Zoom: 2</label>
                          <input id="zoom" onchange="Page.changeZoom();" type="range" min="10" max="30" value="20">
                          <label id="brightness-value" width="100">Brightness: 0</label>
                          <input id="brightness" onchange="Page.changeBrightness();" type="range" min="0" max="128" value="0">
                          <label id="contrast-value" width="100">Contrast: 0</label>
                          <input id="contrast" onchange="Page.changeContrast();" type="range" min="0" max="64" value="0">
                          <label id="threshold-value" width="100">Threshold: 0</label>
                          <input id="threshold" onchange="Page.changeThreshold();" type="range" min="0" max="512" value="0">
                          <label id="sharpness-value" width="100">Sharpness: off</label>
                          <input id="sharpness" onchange="Page.changeSharpness();" type="checkbox">
                          <label id="grayscale-value" width="100">grayscale: off</label>
                          <input id="grayscale" onchange="Page.changeGrayscale();" type="checkbox">
                          <br>
                          <label id="flipVertical-value" width="100">Flip Vertical: off</label>
                          <input id="flipVertical" onchange="Page.changeVertical();" type="checkbox">
                          <label id="flipHorizontal-value" width="100">Flip Horizontal: off</label>
                          <input id="flipHorizontal" onchange="Page.changeHorizontal();" type="checkbox">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="thumbnail" id="result">
                          <div class="well" style="overflow: hidden;">
                            <img width="320" height="240" id="scanned-img" src="">
                          </div>
                          <div class="caption">
                            <h3>Scanned result</h3>
                            <p id="scanned-QR"></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="panel-footer">

                    </div>
                  </div>
                </div>




              </div>
              <!-- /.box-body -->
            </div>


            <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; <?= date('Y') ?></strong>

    </footer>

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->

  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url() ?>assets/web_admin/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url() ?>assets/web_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="<?php echo base_url() ?>assets/webcam/js/filereader.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/webcam/js/qrcodelib.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/webcam/js/webcodecamjs.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/webcam/js/main.js"></script>

  <!-- DataTables -->
  <script src="<?php echo base_url() ?>assets/web_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/web_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?php echo base_url() ?>assets/web_admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url() ?>assets/web_admin/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>assets/web_admin/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url() ?>assets/web_admin/dist/js/demo.js"></script>
  <!-- page script -->

</body>

</html>