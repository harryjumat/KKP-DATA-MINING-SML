<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="Refresh" content="1800">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SML HRD - Main Menu</title>
    <link rel="icon" type="image/png" href="http://localhost/SML KARYAWAN/karyawan/img/favicon.ico">

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="vendor/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Chart JS -->
    <script type="text/javascript" src="chartjs/Chart.js"></script>
    <!-- JQUERY -->
    <script src="vendor/jquery/external/jquery/jquery.js"></script>
    <script src="vendor/jquery/jquery-ui.js"></script>
    <link rel="stylesheet" href="vendor/jquery/jquery-ui.css">


    <style type="text/css">
        .button_align {
            text-align: right;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img class="img-profile rounded-circle" src="img\header.png">
                </div>
                <div class="sidebar-brand-text mx-3">Sarana Maju Lestari<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Menu Utama</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Import File
            </div>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- TABEL CALON KARYAWAN-->
            <li class="nav-item">
                <a class="nav-link" href="form_upload.php">
                    <i class="fas fa-file-text"></i>
                    <span>Import File</span></a>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
                Tabel
            </div>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- TABEL CALON KARYAWAN-->
            <li class="nav-item">
                <a class="nav-link" href="tabelcalonkaryawan.php">
                    <i class="fas fa-table"></i>
                    <span>Tabel Calon Karyawan</span></a>
            </li>
            <!-- TABEL PREDIKSI-->
            <li class="nav-item">
                <a class="nav-link" href="tabelprediksi.php">
                    <i class="fas fa-table"></i>
                    <span>Tabel Prediksi</span></a>
            </li>
            <!-- Heading -->
            <div class="sidebar-heading">
                Grafik
            </div>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- GRAFIK KARYAWAN-->
            <li class="nav-item">
                <a class="nav-link" href="grafikcalonkaryawan.php">
                    <i class="fas fa-chart-pie"></i>
                    <span>Grafik Calon Karyawan</span></a>
            </li>
            <!-- GRAFIK PREDIKSI-->
            <li class="nav-item">
                <a class="nav-link" href="grafikprediksi.php">
                    <i class="fas fa-chart-pie"></i>
                    <span>Grafik Prediksi</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">

                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Sarana Maju Lestari</span>
                                <img class="img-profile rounded-circle" src="img\smllogo.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->