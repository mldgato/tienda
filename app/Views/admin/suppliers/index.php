<?= $this->extend('templates/admin_template'); ?>

<?= $this->section('content-header'); ?>
<h1>Proveedores <i class="fas fa-people-carry"></i></h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card border-info mt-3">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h2 class="text-info">Proveedores registrados</h2>
            </div>
            <div class="col-sm-12 col-md-6 text-right">
                <a href="<?php echo base_url('admin/suppliers/create'); ?>" class="btn btn-outline-warning">Crear nuevo proveedor <i class="fas fa-user-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="tableData">
                <thead class="thead-dark">
                    <tr>
                        <th>NIT</th>
                        <th>Proveedor</th>
                        <th>Teléfono</th>
                        <th>Vendedor</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($supliers as $suplier) :
                    ?>
                        <tr>
                            <td><?= $suplier['taxnumber']; ?></td>
                            <td><?= $suplier['company']; ?></td>
                            <td><a href="tel:<?= $suplier['phone']; ?>"><?= $suplier['phone']; ?></a></td>
                            <td><?= $suplier['seller']; ?></td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <a href="<?php echo base_url('admin/suppliers/edit/' . $suplier['id_supplier']); ?>" class="btn btn-primary btn-sm me-1"><span class="d-none d-md-inline">Editar</span>
                                        <i class="fas fa-edit"></i></a>

                                    <button type="button" class="btn btn-danger btn-sm ms-1" onclick="confirmarEliminacion('<?php echo base_url('admin/suppliers/delete/' . $suplier['id_supplier']); ?>')"><span class="d-none d-md-inline">Eliminar</span>
                                        <i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                    <?php
                    endforeach
                    ?>
                </tbody>
                <tfoot class="thead-dark">
                    <th>NIT</th>
                    <th>Proveedor</th>
                    <th>Teléfono</th>
                    <th>Vendedor</th>
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
            title: '¿Eliminar al proveedor?',
            text: "¿Está seguro que quiere eliminar al proveedor? Ya no podrá usar la información una vez la elimine",
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