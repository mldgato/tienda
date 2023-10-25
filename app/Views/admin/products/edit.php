<?= $this->extend('templates/admin_template'); ?>
 
<?= $this->section('content-header'); ?>
<h1>Editar producto <i class="fas fa-cubes"></i></h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card border-info mt-3">
    <div class="card-header">
        <h2 class="text-info">Datos del producto</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-9">
                <form id="formData" name="formData" action="<?php echo base_url('admin/products/update/' . $product['id_product']); ?>" method="post" accept-charset="utf-8" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="cod">Código:<small class="text-danger">*</small></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-info"><i class="fas fa-barcode"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="cod" name="cod" placeholder="Ingrese el código del producto" value="<?= old('cod', $product['cod']) ?>">
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
                                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Ingrese la descripción del producto" value="<?= old('product_name', $product['product_name']) ?>">
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
                                    <input type="text" class="form-control" id="brand" name="brand" placeholder="Ingrese la marca del producto" value="<?= old('brand', $product['brand']) ?>">
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
                                    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Ingrese la cantidad" value="<?= old('quantity', $product['quantity']) ?>">
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
                                    <input type="text" class="form-control" id="cost" name="cost" placeholder="Ingrese el costo del producto" value="<?= old('cost', $product['cost']) ?>">
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
                                    <input type="text" class="form-control" id="price" name="price" placeholder="Ingrese el precio de venta" value="<?= old('price', $product['price']) ?>">
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
                                        <?php foreach ($suppliers as $supplier) : ?>
                                            <option value="<?= $supplier['id_supplier']; ?>" <?= (old('id_supplier', $product['id_supplier']) == $supplier['id_supplier']) ? 'selected' : ''; ?>>
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
                            <button type="submit" id="submit" name="submit" class="btn btn-success">Actualizar <i class="fas fa-save"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-3 text-center">
                <?php
                if ($product['image'] == null) {
                    echo '<img src="https://cdn.pixabay.com/photo/2016/03/02/20/13/grocery-1232944_1280.jpg" class="img-fluid" alt="User Image">';
                } else {
                ?>
                    <img src="<?= base_url('dist/img/products/' . $product['image']) ?>" class="img-fluid" alt="User Image">
                <?php
                }
                ?>
                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#uploadModal">Cambiar imagen <i class="fas fa-images"></i></button>
                <!-- Modal -->
                <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="uploadModalLabel">Cargar Imagen</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="uploadForm" action="<?= base_url('admin/products/upload_image_action/' . $product['id_product']) ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="image">Seleccionar Imagen</label>
                                        <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                                    </div>
                                    <div class="form-group">
                                        <img id="imagePreview" src="#" alt="Vista Previa" style="max-width: 100%; display: none;">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Subir Imagen <i class="fas fa-upload"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    // Código JavaScript para mostrar la vista previa de la imagen
    document.getElementById('image').addEventListener('change', function() {
        const file = this.files[0];
        const imagePreview = document.getElementById('imagePreview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.src = '#';
            imagePreview.style.display = 'none';
        }
    });
</script>
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