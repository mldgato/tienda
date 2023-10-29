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