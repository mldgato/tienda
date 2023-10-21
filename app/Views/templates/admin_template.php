<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de tienda</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css') ?>">
    <style>
        .square-image {
            width: 100px !important;
            /* Ancho deseado */
            height: 100px !important;
            /* Alto deseado */
            overflow: hidden;
            border-radius: 50%;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);
        }

        /* Media query para pantallas de celular */
        @media (max-width: 576px) {
            .square-image {
                width: 45px !important;
                /* Ancho deseado para celulares */
                height: 45px !important;
                /* Alto deseado para celulares */
            }
        }

        /* Media query para pantallas de tablet */
        @media (min-width: 577px) and (max-width: 991px) {
            .square-image {
                width: 40px !important;
                /* Ancho deseado para tablets */
                height: 40px !important;
                /* Alto deseado para tablets */
            }
        }

        /* Media query para pantallas de PC */
        @media (min-width: 992px) {
            .square-image {
                width: 40px !important;
                /* Ancho deseado para tablets */
                height: 40px !important;
                /* Alto deseado para tablets */
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="<?php echo base_url('logout'); ?>" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <span>
                            <?php echo session('name'); ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <li class="user-footer">
                            <a class="btn btn-default btn-flat float-right  btn-block " href="<?php echo base_url('logout'); ?>">
                                <i class="fa fa-fw fa-power-off text-red"></i>
                                Salir
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('admin') ?>" class="brand-link">
                <img src="<?= base_url('dist/img/ChinosLogo@0.5x.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Tienda Express</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <?php
                        if (session('image') == null) {
                            echo '<img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="img-circle elevation-2" alt="User Image">';
                        } else {
                        ?>
                            <!-- <img src="<?= base_url('dist/img/users/' . session('image')) ?>" class="img-circle square-image elevation-2" alt="User Image"> -->
                            <img src="<?= base_url('dist/img/users/' . session('image')) ?>" alt="Imagen cuadrada" class="square-image">
                        <?php
                        }
                        ?>

                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo session('name'); ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../../index.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../index2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../index3.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">EXAMPLES</li> -->
                        <li class="nav-item">
                            <a href="<?php echo base_url('admin/users/show/' . session('id_user')); ?>" class="nav-link text-info">
                                <i class="fas fa-user-cog fa-fw"></i>
                                <p>Perfil</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <?= $this->renderSection('content-header'); ?>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <?= $this->renderSection('content'); ?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('dist/js/adminlte.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?= $this->renderSection('script'); ?>
</body>

</html>