<?= $this->extend('templates/admin_template'); ?>

<?= $this->section('content-header'); ?>
<h1>Clientes <i class="fas fa-child"></i></h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card border-info mt-3">
    <div class="card-header">
        <h2 class="text-info">Listado de clientes</h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-sm" id="tableData">
                <thead class="thead-dark">
                    <tr>
                        <th>NIT</th>
                        <th>Cliente</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($customers as $customer) :
                    ?>
                        <tr>
                            <td><?= $customer['taxnumber']; ?></td>
                            <td><?= $customer['customer']; ?></td>
                            <td><a href="mailto:<?= $customer['customer_email']; ?>"><?= $customer['customer_email']; ?></a></td>
                            <td><a href="tel:<?= $customer['phone']; ?>"><?= $customer['phone']; ?></a></td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <a href="<?php echo base_url('admin/customers/show/' . $customer['id_customer']); ?>" class="btn btn-primary btn-sm me-1"><span class="d-none d-md-inline">Ver</span>
                                        <i class="fas fa-eye"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php
                    endforeach
                    ?>
                </tbody>
                <tfoot class="thead-dark">
                    <th>NIT</th>
                    <th>Cliente</th>
                    <th>Email</th>
                    <th>Teléfono</th>
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