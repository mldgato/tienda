<?= $this->extend('templates/admin_template'); ?>
 
<?= $this->section('content-header'); ?>
<h1>Editar proveedor <i class="fas fa-people-carry"></i></h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card border-info mt-3">
    <div class="card-header">
        <h2 class="text-info">Datos del proveedor</h2>
    </div>
    <div class="card-body">
        <form id="formSupplierData" name="formSupplierData" action="<?php echo base_url('admin/suppliers/update/' . $supplier['id_supplier']); ?>" method="post" accept-charset="utf-8" autocomplete="off">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="taxnumber">NIT:<small class="text-danger">*</small></label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-info"><i class="fab fa-slack-hash"></i></div>
                            </div>
                            <input type="text" class="form-control" id="taxnumber" name="taxnumber" placeholder="Ingrese el NIT del proveedor" value="<?= old('taxnumber', $supplier['taxnumber']) ?>">
                        </div>
                        <?php if (session('errors.taxnumber')) : ?>
                            <small class="text-danger"><?= session('errors.taxnumber') ?></small>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="form-group">
                        <label for="company">Empresa:<small class="text-danger">*</small></label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-info"><i class="fas fa-building"></i></div>
                            </div>
                            <input type="text" class="form-control" id="company" name="company" placeholder="Ingrese el nombre de la empresa proveedora" value="<?= old('company', $supplier['company']) ?>">
                        </div>
                        <?php if (session('errors.company')) : ?>
                            <small class="text-danger"><?= session('errors.company') ?></small>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="address">Dirección:<small class="text-danger">*</small></label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-info"><i class="fas fa-map-marked-alt"></i></div>
                            </div>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Ingrese la dirección de la empresa" value="<?= old('address', $supplier['address']) ?>">
                        </div>
                        <?php if (session('errors.address')) : ?>
                            <small class="text-danger"><?= session('errors.address') ?></small>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="seller">Vendedor:<small class="text-danger">*</small></label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-info"><i class="fas fa-user-tie"></i></div>
                            </div>
                            <input type="text" class="form-control" id="seller" name="seller" placeholder="Ingrese el nombre del vendedor" value="<?= old('seller', $supplier['seller']) ?>">
                        </div>
                        <?php if (session('errors.seller')) : ?>
                            <small class="text-danger"><?= session('errors.seller') ?></small>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="email">Email:<small class="text-danger">*</small></label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-info"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese el correo electrónico" value="<?= old('email', $supplier['email']) ?>">
                        </div>
                        <?php if (session('errors.email')) : ?>
                            <small class="text-danger"><?= session('errors.email') ?></small>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="phone">Teléfono:<small class="text-danger">*</small></label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-info"><i class="fas fa-phone"></i></div>
                            </div>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Ingrese el correo electrónico" value="<?= old('phone', $supplier['phone']) ?>">
                        </div>
                        <?php if (session('errors.phone')) : ?>
                            <small class="text-danger"><?= session('errors.phone') ?></small>
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