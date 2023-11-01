<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Factura</title>
    <style>
        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
        }

        .tabladatos {
            border-collapse: collapse;
        }

        .tabladatos tr:nth-child(1) {
            border: none;
        }

        .tabladatos tr:nth-child(2) {
            border: 1px solid #000;
            /* Puedes personalizar el color y grosor del borde */
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Datos de la venta código: <?= $sale['id_sale'] ?></h2>
    <table class="tabladatos">
        <tr>
            <td>Fecha:</td>
            <td>Comprador:</td>
            <td>Vendedor:</td>
        </tr>
        <tr>
            <td><?= date('d-m-Y', strtotime($sale['date'])) ?></td>
            <td><?= $customer['customer'] ?></td>
            <td><?= $user['name'] ?></td>
        </tr>
        <tr>
            <td>Pago:</td>
            <td>Total:</td>
            <td>Vuelto:</td>
        </tr>
        <tr>
            <td><?= number_format($sale['pay'], 2, '.', ',') ?></td>
            <td><?= number_format($sale['total'], 2, '.', ',') ?></td>
            <td><?= number_format($sale['pay'] - $sale['total'], 2, '.', ',') ?></td>
        </tr>
    </table>
</body>

</html>