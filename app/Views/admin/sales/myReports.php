<?= $this->extend('templates/admin_template'); ?>

<?= $this->section('content-header'); ?>
<h1>Mis ventas <i class="far fa-id-badge"></i></h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card border-info mt-3">
    <div class="card-header">
        <h2 class="text-info">Selección de fechas</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label for="del">Fecha del:<small class="text-danger">*</small></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-info"><i class="fas fa-calendar-alt"></i></div>
                        </div>
                        <input type="date" class="form-control" id="del" name="del">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label for="al">Fecha al:<small class="text-danger">*</small></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-info"><i class="fas fa-calendar-alt"></i></div>
                        </div>
                        <input type="date" class="form-control" id="al" name="al">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mt-4">
                <button class="btn btn-success" id="buscar">Buscar <i class="fas fa-handshake"></i></button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="table-responsive" id="tabla-ventas">
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
<script>
    $(document).ready(function() {
        // Agregar lógica AJAX para cargar la tabla
        $("#buscar").click(function() {
            var fechaDel = $("#del").val();
            var fechaAl = $("#al").val();

            $.ajax({
                url: "<?= base_url('admin/sales/buscarVentasAjax') ?>",
                method: "POST",
                data: {
                    del: fechaDel,
                    al: fechaAl
                },
                dataType: "html",
                success: function(response) {
                    $("#tabla-ventas").html(response);
                    $('#tableData').dataTable({
                        "order": [],
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
                        },
                    });
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>