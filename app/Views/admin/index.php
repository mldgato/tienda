<?= $this->extend('templates/admin_template'); ?>

<?= $this->section('content-header'); ?>
<h1>Dashboard <i class="fas fa-tachometer-alt"></i></h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-sm-12 col-md-4">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>Perfil</h3>
                <p>Ver mis datos</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-cog fa-fw"></i>
            </div>
            <a href="<?php echo base_url('admin/users/show/' . session('id_user')); ?>" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <?php
    if (session('id_rol') == 1) {
    ?>
        <div class="col-sm-12 col-md-4">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>Usuarios</h3>
                    <p>Listado</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="<?php echo base_url('admin/users/index'); ?>" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>Roles</h3>
                    <p>Creación y administración</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-tag"></i>
                </div>
                <a href="<?php echo base_url('admin/roles/index'); ?>" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    <?php
    }
    ?>

    <?php
    if (session('id_rol') == 1 || session('id_rol') == 3) {
    ?>
        <div class="col-sm-12 col-md-4">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>Proveedores</h3>
                    <p>Creación y administración</p>
                </div>
                <div class="icon">
                    <i class="fas fa-people-carry"></i>
                </div>
                <a href="<?php echo base_url('admin/suppliers/index'); ?>" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>Productos</h3>
                    <p>Creación y administración</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cubes"></i>
                </div>
                <a href="<?php echo base_url('admin/products/index'); ?>" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    <?php
    }
    ?>
    <?php
    if (session('id_rol') == 1 || session('id_rol') == 2) {
    ?>
        <div class="col-sm-12 col-md-4">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>Clientes</h3>
                    <p>Listado</p>
                </div>
                <div class="icon">
                    <i class="fas fa-child"></i>
                </div>
                <a href="<?php echo base_url('admin/customers/index'); ?>" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="small-box bg-indigo">
                <div class="inner">
                    <h3>Tienda</h3>
                    <p>Venta de productos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-store"></i>
                </div>
                <a href="<?php echo base_url('admin/sales/products'); ?>" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    <?php
    }
    ?>
    <?php
    if (session('id_rol') == 2) {
    ?>
        <div class="col-sm-12 col-md-4">
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3>Reporte</h3>
                    <p>Mis ventas</p>
                </div>
                <div class="icon">
                    <i class="far fa-id-badge"></i>
                </div>
                <a href="<?php echo base_url('admin/sales/myReports'); ?>" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    <?php
    }
    ?>
    <?php
    if (session('id_rol') == 1) {
    ?>
        <div class="col-sm-12 col-md-4">
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3>Reporte</h3>
                    <p>Ventas por fecha</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <a href="<?php echo base_url('admin/sales/salesbydate'); ?>" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<?php
if (isset($_SESSION['message'])) {
?>
    <script type="text/javascript">
        Swal.fire('Información', '<?php echo $_SESSION['message']; ?>', '<?php echo $_SESSION['alert-class']; ?>');
    </script>
<?php
}
session()->remove('message');
session()->remove('alert-class');
?>
<?= $this->endSection(); ?>