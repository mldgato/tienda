<?= $this->extend('templates/admin_template'); ?>

<?= $this->section('content-header'); ?>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card border-info mt-3">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h2 class="text-info">Productos a adqurir</h2>
            </div>
            <div class="col-sm-12 col-md-6 text-right">
                <a href="<?= base_url('admin/sales/products') ?>" class="btn btn-primary">ver productos <i class="fas fa-cubes"></i></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form id="formData" name="formData" action="<?php echo base_url('admin/sales/store'); ?>" method="post" accept-charset="utf-8" autocomplete="off">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-sm table-bordered" id="tableData">
                    <thead class="thead-dark">
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre del Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        <?php foreach ($cart as $productId => $cartItem) : ?>
                            <?php $subtotal = $cartItem['quantity'] * $cartItem['product']['price']; ?>
                            <?php $total += $subtotal; ?>
                            <tr>
                                <td>
                                    <a href="<?= base_url('dist/img/products/' . $cartItem['product']['image']) ?>" data-lightbox="img_<?= $productId ?>" data-title="<?= $cartItem['product']['product_name'] ?>"><img src="<?= base_url('dist/img/products/' . $cartItem['product']['image']) ?>" id="img_<?= $productId ?>" class="product-image_grid" alt="Imagen de producto"></a>
                                </td>
                                <td>
                                    <?= $cartItem['product']['product_name'] ?>
                                    <input type="hidden" name="id_product[]" value="<?= $productId ?>">
                                </td>
                                <td>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <a href="<?= base_url('admin/sales/reduce-quantity/' . $productId) ?>" class="btn btn-outline-danger"><i class="fas fa-minus-circle"></i></a>
                                        </div>
                                        <div class="form-control text-center">
                                            <?= $cartItem['quantity'] ?>
                                            <input type="hidden" name="quantity[]" value="<?= $cartItem['quantity'] ?>">
                                        </div>
                                        <div class="input-group-append">
                                            <a href="<?= base_url('admin/sales/add-to-cart/' . $productId) ?>" class="btn btn-outline-success"><i class="fas fa-plus-circle"></i></a>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <?= number_format($cartItem['product']['price'], 2) ?>
                                    <input type="hidden" name="price[]" value="<?= $cartItem['product']['price'] ?>">
                                </td>
                                <td class="text-center"><?= number_format($subtotal, 2) ?></td>
                                <td>
                                    <!-- <a href="<?= base_url('remove-product/' . $productId) ?>" class="btn btn-sm btn-danger">Eliminar <i class="fas fa-trash-alt"></i></a> -->

                                    <button type="button" class="btn btn-danger btn-sm ms-1" onclick="confirmarEliminacion('<?php echo base_url('admin/sales/remove-product/' .  $productId); ?>')"><span class="d-none d-md-inline">Eliminar</span>
                                        <i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <td class="text-right"><strong>Total:</strong></td>
                            <td class="text-center"><strong><?= number_format($total, 2) ?></strong></td>
                            <th>&nbsp;</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <hr>
                </div>
            </div>
            <?php
            if (isset($productId)) {
            ?>
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="text-primary">Datos del cliente</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label>NIT:</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-info"><i class="fab fa-slack-hash"></i></div>
                                </div>
                                <input type="text" class="form-control" id="taxnumber" name="taxnumber" placeholder="Escriba el NIT o C/F" list="consumidor">
                                <datalist id="consumidor">
                                    <option value="C/F">
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-8">
                        <div class="form-group">
                            <label>Nombre:</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-info"><i class="fas fa-user-circle"></i></div>
                                </div>
                                <input type="text" class="form-control" id="customer" name="customer">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label>Email:</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-info"><i class="fas fa-envelope"></i></div>
                                </div>
                                <input type="text" class="form-control" id="customer_email" name="customer_email">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5">
                        <div class="form-group">
                            <label>Dirección:</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-info"><i class="fas fa-map-marked-alt"></i></div>
                                </div>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="form-group">
                            <label>Teléfono:</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-info"><i class="fas fa-phone-alt"></i></div>
                                </div>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label>Total:</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-info"><i class="fas fa-wallet"></i></div>
                                </div>
                                <div class="form-control"><strong><?= number_format($total, 2) ?></strong></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="form-group">
                            <label>Pago:</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-info"><i class="fas fa-hand-holding-usd"></i></div>
                                </div>
                                <input type="text" class="form-control" id="pay" name="pay">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col text-center">
                        <button type="button" class="btn btn-danger" onclick="cancelarCarrito('<?php echo base_url('admin/sales/cancelCart'); ?>')"><span class="d-none d-md-inline">Cancelar compra</span>
                            <i class="fas fa-window-close"></i></button>
                    </div>
                    <div class="col text-center">
                        <button type="submit" id="submit" name="submit" class="btn btn-success"><span class="d-none d-md-inline">Guardar</span> <i class="fas fa-save"></i></button>
                    </div>
                </div>
            <?php
            }
            ?>
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
<script type="text/javascript">
    function confirmarEliminacion(url) {
        Swal.fire({
            title: '¿Eliminar al producto?',
            text: "¿Está seguro que quiere eliminar al producto? Ya no podrá usar la información una vez la elimine.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        })
    }

    function cancelarCarrito(url) {
        Swal.fire({
            title: '¿Quiere cancelar la compra?',
            text: "¿Está seguro que quiere cancelar la compra? Ya no podrá usar la información una vez la cancele, deberá iniciar nuevamente.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, cancelar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        })
    }
    $(document).ready(function() {
        $('#tableData').dataTable({
            "order": [],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
            },
        });

        $("#taxnumber").on("blur", function() {
            var taxnumber = $(this).val(); // Obtén el valor del campo taxnumber

            // Realiza una solicitud AJAX para buscar el cliente por taxnumber
            $.ajax({
                url: "/admin/sales/search-customer/" + taxnumber, // Ruta ajustada a la definición de la ruta en Routes.php
                type: "GET",
                success: function(data) {
                    if (data.customer) {
                        // Si se encuentra el cliente, establece los campos como de solo lectura
                        $("#customer").prop('readonly', true);
                        $("#customer_email").prop('readonly', true);
                        $("#address").prop('readonly', true);
                        $("#phone").prop('readonly', true);
                    } else {
                        // Si no se encuentra el cliente, quita el readonly de los campos si ya lo tenían
                        $("#customer").prop('readonly', false);
                        $("#customer_email").prop('readonly', false);
                        $("#address").prop('readonly', false);
                        $("#phone").prop('readonly', false);
                    }

                    // Rellena los campos de formulario con los datos del cliente
                    $("#customer").val(data.customer);
                    $("#customer_email").val(data.customer_email);
                    $("#address").val(data.address);
                    $("#phone").val(data.phone);
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>