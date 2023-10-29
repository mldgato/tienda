<?= $this->extend('templates/admin_template'); ?>

<?= $this->section('content-header'); ?>
<h1>Productos <i class="fas fa-cubes"></i></h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card border-info mt-3">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-12 col-md-6">
            <h2 class="text-info">Listado</h2>
            </div>
            <div class="col-sm-12 col-md-6 text-right">
                <a href="<?= base_url('admin/sales/create')?>" class="btn btn-danger">ver Carrito <i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-sm" id="tableData">
                <thead class="thead-dark">
                    <tr>
                        <th>&nbsp;</th>
                        <th>Cod.</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($products as $product) :
                    ?>
                        <tr class="<?= $product['classrow']; ?>">
                            <td>
                                <?php
                                if ($product['image'] == null) {
                                    echo '<img src="https://cdn.pixabay.com/photo/2016/03/02/20/13/grocery-1232944_1280.jpg" class="product-image" alt="Imagen de producto">';
                                } else {
                                    echo '<a href="' . base_url('dist/img/products/' . $product['image']) . '" data-lightbox="img_' . $product['id_product'] . '" data-title="' . $product['product_name'] . '"><img src="' . base_url('dist/img/products/' . $product['image']) . '" id="img_' . $product['id_product'] . '" class="product-image" alt="Imagen de producto"></a>';
                                }
                                ?>
                            </td>
                            <td><?= $product['cod'] ?></td>
                            <td><?= $product['product_name'] ?></td>
                            <td><?= $product['quantity'] ?></td>
                            <td><?= $product['price'] ?></td>
                            <td>
                                <?php
                                if ($product['quantity'] != 0) {
                                ?>
                                    <a href="<?= base_url('admin/sales/add-to-cart/' . $product['id_product']) ?>" class="btn btn-primary btn-sm mr-2" title="Agregar a la compra"><i class="fas fa-cart-plus"></i></a>
                                <?php
                                } else {
                                ?>
                                    <button class="btn btn-danger btn-sm mr-2" title="No se puede seleccionar" disabled><i class="fas fa-cart-plus"></i></a>
                                    <?php
                                }
                                    ?>
                            </td>
                        </tr>
                    <?php
                    endforeach
                    ?>
                </tbody>
                <tfoot class="thead-dark">
                    <th>&nbsp;</th>
                    <th>Cod.</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>&nbsp;</th>
                </tfoot>
            </table>
        </div>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#tableData').dataTable({
            "order": [],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
            },
        });
    });
</script>
<?= $this->endSection(); ?>