<?= $this->extend('templates/admin_template'); ?>

<?= $this->section('content-header'); ?>
<h1>Editar rol <i class="fas fa-user-tag"></i></h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card border-info mt-3">
    <div class="card-header">
        <h2 class="text-info">Datos del proveedor</h2>
    </div>
    <div class="card-body">
        <form id="formSupplierData" name="formSupplierData" action="<?php echo base_url('admin/roles/update/' . $rol['id_rol']); ?>" method="post" accept-charset="utf-8" autocomplete="off">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="rolname">Rol:<small class="text-danger">*</small></label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-info"><i class="fas fa-user-tag"></i></div>
                            </div>
                            <input type="text" class="form-control" id="rolname" name="rolname" placeholder="Ingrese el nombre del nuevo rol" value="<?= old('rolname', $rol['rolname']) ?>">
                        </div>
                        <?php if (session('errors.rolname')) : ?>
                            <small class="text-danger"><?= session('errors.rolname') ?></small>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col text-center">
                    <button type="submit" id="submit" name="submit" class="btn btn-success">Actualizar <i class="fas fa-save"></i></button>
                </div>
            </div>
        </form>
    </div>
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