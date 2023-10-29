<?= $this->extend('templates/admin_template'); ?>

<?= $this->section('content-header'); ?>
<h1>Clientes <i class="fas fa-child"></i></h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card border-info mt-3">
    <div class="card-header">
        <h2 class="text-info">Datos</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label>NIT:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-info"><i class="fab fa-slack-hash"></i></div>
                        </div>
                        <div class="form-control"><?= $customer['taxnumber'] ?></div>
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
                        <div class="form-control"><?= $customer['customer'] ?></div>
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
                        <div class="form-control"><?= $customer['customer_email'] ?></div>
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
                        <div class="form-control"><?= $customer['address'] ?></div>
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
                        <div class="form-control"><?= $customer['phone'] ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Cod.</th>
                                <th>Fecha</th>
                                <th>vendedor</th>
                                <th>Pago</th>
                                <th>Total</th>
                                <th>Vuelto</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sales as $sale) : ?>
                                <tr>
                                    <td class="text-center"><?= $sale['id_sale'] ?></td>
                                    <td class="text-right"><?= date('d-m-Y', strtotime($sale['date'])) ?></td>
                                    <td><?= $sale['user_name'] ?></td>
                                    <td class="text-right"><?= number_format($sale['pay'], 2, '.', ',') ?></td>
                                    <td class="text-right"><?= number_format($sale['total'], 2, '.', ',') ?></td>
                                    <td class="text-right"><?= number_format($sale['pay'] - $sale['total'], 2, '.', ',') ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url('admin/sales/show/' . $sale['id_sale']); ?>" class="btn btn-primary btn-sm me-1"><span class="d-none d-md-inline">Ver venta</span>
                                            <i class="fas fa-eye"></i></a>
                                    </td>
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