<table class="table table-striped table-hover table-sm" id="tableData">
    <thead class="thead-dark">
        <tr>
            <th>Cod.</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Vendedor</th>
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
                <td><?= $sale['customer'] ?></td>
                <td><?= $sale['name'] ?></td>
                <td class="text-right"><?= number_format($sale['pay'], 2, '.', ',') ?></td>
                <td class="text-right"><?= number_format($sale['total'], 2, '.', ',') ?></td>
                <td class="text-right"><?= number_format($sale['pay'] - $sale['total'], 2, '.', ',') ?></td>
                <td class="text-center">
                    <a href="<?php echo base_url('admin/sales/show/' . $sale['id_sale']); ?>" class="btn btn-primary btn-sm me-1" target="_blank"><span class="d-none d-md-inline">Ver venta</span>
                        <i class="fas fa-eye"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>