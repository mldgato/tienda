<?= $this->extend('templates/admin_template'); ?>

<?= $this->section('content-header'); ?>
<h1>Información de la venta <i class="fas fa-shopping-basket"></i></h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card border-info mt-3">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h2 class="text-info">Datos de la venta</h2>
            </div>
            <div class="col-sm-12 col-md-6 text-right">
                <!-- <a href="<?= base_url('admin/customers/show/' . $sale['id_customer']) ?>" class="btn btn-primary">Regresar <i class="fas fa-backward"></i></a> -->
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label>Cod.:</label>
                    <div class="form-control"><?= $sale['id_sale'] ?></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label>Fecha:</label>
                    <div class="form-control"><?= date('d-m-Y', strtotime($sale['date'])) ?></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label>Comprador:</label>
                    <div class="form-control"><?= $customer['customer'] ?></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <div class="form-group">
                    <label>Vendedor:</label>
                    <div class="form-control"><?= $user['name'] ?></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="form-group">
                    <label>Pago:</label>
                    <div class="form-control"><?= number_format($sale['pay'], 2, '.', ',') ?></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="form-group">
                    <label>Total:</label>
                    <div class="form-control"><?= number_format($sale['total'], 2, '.', ',') ?></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="form-group">
                    <label>Vuelto:</label>
                    <div class="form-control"><?= number_format($sale['pay'] - $sale['total'], 2, '.', ',') ?></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3 class="text-primary">Detalle de la compra</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>&nbsp;</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($saledetails as $detail) : ?>
                                <tr>
                                    <td>
                                        <?php
                                        if ($detail['image'] == null) {
                                            echo '<img src="https://cdn.pixabay.com/photo/2016/03/02/20/13/grocery-1232944_1280.jpg" class="product-image" alt="Imagen de producto">';
                                        } else {
                                            echo '<a href="' . base_url('dist/img/products/' . $detail['image']) . '" data-lightbox="img_' . $detail['id_product'] . '" data-title="' . $detail['product_name'] . '"><img src="' . base_url('dist/img/products/' . $detail['image']) . '" id="img_' . $detail['id_product'] . '" class="product-image" alt="Imagen de producto"></a>';
                                        }
                                        ?>
                                    </td>
                                    <td><?= $detail['product_name'] ?></td>
                                    <td><?= $detail['quantity'] ?></td>
                                    <td><?= $detail['price'] ?></td>
                                    <td><?= $detail['price'] * $detail['quantity'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
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
<?= $this->endSection(); ?>