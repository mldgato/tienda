<?= $this->extend('templates/admin_template'); ?>

<?= $this->section('content-header'); ?>
<h1>Dashboard <i class="fas fa-tachometer-alt"></i></h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-chart-pie"></i> % de ventas de cada vendedor</h3>
            </div>
            <div class="card-body text-center">
                <canvas id="pieChart" class="chart-canvas"></canvas>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-chart-bar"></i> Los 10 productos más vendidos</h3>
            </div>
            <div class="card-body">
                <canvas id="barChart" class="chart-canvas"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-4">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>Perfil</h3>
                <p>Ver mis datos</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-cog fa-fw"></i>
            </div>
            <a href="<?php echo base_url('admin/users/show/' . session('id_user')); ?>" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <?php
    if (session('id_rol') == 1) {
    ?>
        <div class="col-sm-12 col-md-4">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>Usuarios</h3>
                    <p>Listado</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="<?php echo base_url('admin/users/index'); ?>" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>Roles</h3>
                    <p>Creación y administración</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-tag"></i>
                </div>
                <a href="<?php echo base_url('admin/roles/index'); ?>" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    <?php
    }
    ?>

    <?php
    if (session('id_rol') == 1 || session('id_rol') == 3) {
    ?>
        <div class="col-sm-12 col-md-4">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>Proveedores</h3>
                    <p>Creación y administración</p>
                </div>
                <div class="icon">
                    <i class="fas fa-people-carry"></i>
                </div>
                <a href="<?php echo base_url('admin/suppliers/index'); ?>" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>Productos</h3>
                    <p>Creación y administración</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cubes"></i>
                </div>
                <a href="<?php echo base_url('admin/products/index'); ?>" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    <?php
    }
    ?>
    <?php
    if (session('id_rol') == 1 || session('id_rol') == 2) {
    ?>
        <div class="col-sm-12 col-md-4">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>Clientes</h3>
                    <p>Listado</p>
                </div>
                <div class="icon">
                    <i class="fas fa-child"></i>
                </div>
                <a href="<?php echo base_url('admin/customers/index'); ?>" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="small-box bg-indigo">
                <div class="inner">
                    <h3>Tienda</h3>
                    <p>Venta de productos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-store"></i>
                </div>
                <a href="<?php echo base_url('admin/sales/products'); ?>" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    <?php
    }
    ?>
    <?php
    if (session('id_rol') == 2) {
    ?>
        <div class="col-sm-12 col-md-4">
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3>Reporte</h3>
                    <p>Mis ventas</p>
                </div>
                <div class="icon">
                    <i class="far fa-id-badge"></i>
                </div>
                <a href="<?php echo base_url('admin/sales/myReports'); ?>" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    <?php
    }
    ?>
    <?php
    if (session('id_rol') == 1) {
    ?>
        <div class="col-sm-12 col-md-4">
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3>Reporte</h3>
                    <p>Ventas por fecha</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <a href="<?php echo base_url('admin/sales/salesbydate'); ?>" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    <?php
    }
    ?>
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
<script>
    // Obtén los datos de PHP y conviértelos a JavaScript
    var topProducts = <?= json_encode($topProducts) ?>;
    var productNames = topProducts.map(product => product.product_name);
    var quantities = topProducts.map(product => product.total_quantity);
    var colors = generateRandomColors(topProducts.length);

    function generateRandomColors(count) {
        var colors = [];
        for (var i = 0; i < count; i++) {
            var r = Math.floor(Math.random() * 256);
            var g = Math.floor(Math.random() * 256);
            var b = Math.floor(Math.random() * 256);
            colors.push(`rgba(${r},${g},${b},0.2)`);
        }
        return colors;
    }

    // Configura el gráfico de barras
    var ctx = document.getElementById('barChart').getContext('2d');
    var barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: productNames,
            datasets: [{
                label: 'Cantidad Vendida',
                data: quantities,
                backgroundColor: colors,
                borderColor: colors.map(color => color.replace("0.2", "1")),
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                },
            }
        }
    });
</script>
<script>
    // Obtén los datos de PHP y conviértelos a JavaScript
    var userSalesData = <?= json_encode($userSalesData) ?>;
    var userNames = userSalesData.map(user => user.name);
    var salesTotals = userSalesData.map(user => user.total_sales);
    var pieChartColors = generateRandomColors(userSalesData.length);

    // Configura el gráfico de tipo pie
    var pieCtx = document.getElementById('pieChart').getContext('2d');
    var pieChart = new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: userNames,
            datasets: [{
                data: salesTotals,
                backgroundColor: pieChartColors,
            }]
        },
        options: {
            responsive: true,
        }
    });
</script>
<script>
    // Ajusta el tamaño de los gráficos después de que se haya cargado la página
    window.addEventListener('load', function() {
        var chartContainers = document.querySelectorAll('.chart-canvas');
        chartContainers.forEach(function(canvas) {
            var parent = canvas.parentElement;
            canvas.width = parent.offsetWidth;
            canvas.height = parent.offsetHeight;
        });
    });
</script>
<?= $this->endSection(); ?>