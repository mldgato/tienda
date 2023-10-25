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
                <a href="<?php echo base_url('admin/products/create'); ?>" class="btn btn-outline-warning">Crear nuevo producto <i class="fas fa-user-plus"></i></a>
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
                        <th>Costo</th>
                        <th>Precio</th>
                        <th>Proveedor</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($products as $product) :
                    ?>
                        <tr>
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
                            <td><?= $product['cost'] ?></td>
                            <td><?= $product['price'] ?></td>
                            <td><?= $product['proveedor'] ?></td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <a href="<?php echo base_url('admin/products/edit/' . $product['id_product']); ?>" class="btn btn-primary btn-sm me-1"><span class="d-none d-md-inline">Editar</span>
                                        <i class="fas fa-edit"></i></a>

                                    <button type="button" class="btn btn-danger btn-sm ms-1" onclick="confirmarEliminacion('<?php echo base_url('admin/products/delete/' . $product['id_product']); ?>')"><span class="d-none d-md-inline">Eliminar</span>
                                        <i class="fas fa-trash-alt"></i></button>
                                </div>
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
                    <th>Costo</th>
                    <th>Precio</th>
                    <th>Proveedor</th>
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
    function confirmarEliminacion(url) {
        Swal.fire({
            title: '¿Eliminar al producto?',
            text: "¿Está seguro que quiere eliminar al producto? Ya no podrá usar la información una vez la elimine",
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