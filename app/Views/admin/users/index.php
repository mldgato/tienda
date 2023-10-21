<?= $this->extend('templates/admin_template'); ?>

<?= $this->section('content-header'); ?>
<h1>Lista de usuarios <i class="fas fa-users"></i></h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card border-info mt-3">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h2 class="text-info">Usuarios registrados</h2>
            </div>
            <div class="col-sm-12 col-md-6 text-right">
                <a href="<?php echo base_url('admin/users/create'); ?>" class="btn btn-outline-warning">Crear nuevo usuario <i class="fas fa-user-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-hover" id="tableData">
                <thead class="table-dark">
                    <tr>
                        <th>&nbsp;</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $user) :
                    ?>
                        <tr>
                            <td>
                                <?php
                                if ($user['image'] == null) {
                                    echo '<img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="square-image" alt="User Image">';
                                } else {
                                    echo '<img src="' . base_url('dist/img/users/' . $user['image']) . '" class="square-image" alt="User Image">';
                                }
                                ?>
                            </td>
                            <td><?= $user['name']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td><?= $user['rolAsignado']; ?></td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <a href="<?php echo base_url('admin/users/show/' . $user['id_user']); ?>" class="btn btn-primary btn-sm me-1"><span class="d-none d-md-inline">Editar</span>
                                        <i class="fas fa-edit"></i></a>

                                    <button type="button" class="btn btn-danger btn-sm ms-1" onclick="confirmarEliminacion('<?php echo base_url('admin/users/delete/' . $user['id_user']); ?>')"><span class="d-none d-md-inline">Eliminar</span>
                                        <i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                    <?php
                    endforeach
                    ?>
                </tbody>
                <tfoot class="table-dark">
                    <tr>
                        <th>&nbsp;</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>&nbsp;</th>
                    </tr>
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
?>
<script type="text/javascript">
    function confirmarEliminacion(url) {
        Swal.fire({
            title: '¿Eliminar al usuario?',
            text: "¿Está seguro que quiere eliminar al usuario? Ya no podrá usar la información una vez la elimine",
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
        $('#tableData').DataTable();
    });
</script>
<?= $this->endSection(); ?>