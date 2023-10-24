<?= $this->extend('templates/admin_template'); ?>

<?= $this->section('content-header'); ?>
<h1>Crear un nuevo producto <i class="fas fa-cubes"></i></h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card border-info mt-3">
    <div class="card-header">
        <h2 class="text-info">Datos del nuevo producto</h2>
    </div>
    <div class="card-body">
        <form id="formData" name="formData" action="<?php echo base_url('admin/products/store'); ?>" method="post" accept-charset="utf-8" autocomplete="off">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="cod">Código:<small class="text-danger">*</small></label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-info"><i class="fas fa-barcode"></i></div>
                            </div>
                            <input type="text" class="form-control" id="cod" name="cod" placeholder="Ingrese el código del producto" value="<?= old('cod') ?>">
                        </div>
                        <?php if (session('errors.cod')) : ?>
                            <small class="text-danger"><?= session('errors.cod') ?></small>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="form-group">
                        <label for="product_name">Producto:<small class="text-danger">*</small></label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-info"><i class="fas fa-cube"></i></div>
                            </div>
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Ingrese la descripción del producto" value="<?= old('product_name') ?>">
                        </div>
                        <?php if (session('errors.product_name')) : ?>
                            <small class="text-danger"><?= session('errors.product_name') ?></small>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="brand">Marca:<small class="text-danger">*</small></label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-info"><i class="fas fa-copyright"></i></div>
                            </div>
                            <input type="text" class="form-control" id="brand" name="brand" placeholder="Ingrese la marca del producto" value="<?= old('brand') ?>">
                        </div>
                        <?php if (session('errors.brand')) : ?>
                            <small class="text-danger"><?= session('errors.brand') ?></small>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="quantity">Cantidad:<small class="text-danger">*</small></label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-info"><i class="fas fa-layer-group"></i></div>
                            </div>
                            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Ingrese la cantidad" value="<?= old('quantity') ?>">
                        </div>
                        <?php if (session('errors.quantity')) : ?>
                            <small class="text-danger"><?= session('errors.quantity') ?></small>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="cost">Costo:<small class="text-danger">*</small></label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-info"><i class="far fa-money-bill-alt"></i></div>
                            </div>
                            <input type="text" class="form-control" id="cost" name="cost" placeholder="Ingrese el costo del producto" value="<?= old('cost') ?>">
                        </div>
                        <?php if (session('errors.cost')) : ?>
                            <small class="text-danger"><?= session('errors.cost') ?></small>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="price">Precio:<small class="text-danger">*</small></label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-info"><i class="fas fa-money-bill-alt"></i></div>
                            </div>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Ingrese el precio de venta" value="<?= old('price') ?>">
                        </div>
                        <?php if (session('errors.price')) : ?>
                            <small class="text-danger"><?= session('errors.price') ?></small>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="id_supplier">Proveedor:<small class="text-danger">*</small></label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-info"><i class="fas fa-people-carry"></i></div>
                            </div>
                            <select name="id_supplier" id="id_supplier" class="form-control">
                                <option value="" selected>- Seleccione -</option>
                                <?php foreach ($suppliers as $supplier) : ?>
                                    <option value="<?= $supplier['id_supplier']; ?>" <?= (old('id_supplier') == $supplier['id_supplier']) ? 'selected' : ''; ?>>
                                        <?= $supplier['company']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?php if (session('errors.id_supplier')) : ?>
                            <small class="text-danger"><?= session('errors.id_supplier') ?></small>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col text-center">
                    <button type="submit" id="submit" name="submit" class="btn btn-success">Guardar <i class="fas fa-save"></i></button>
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