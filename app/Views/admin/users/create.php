<?= $this->extend('templates/admin_template'); ?>

<?= $this->section('content-header'); ?>
<h1>Nuevo usuario <i class="fas fa-user-plus"></i></h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card border-info mt-3">
    <div class="card-header">
        <h2 class="text-info">Crear nuevo usuario</h2>
    </div>
    <div class="card-body">
        <form id="formUserData" name="formUserData" action="<?php echo base_url('admin/users/store'); ?>" method="post" accept-charset="utf-8" autocomplete="off">
            <div class="row">
                <div class="col-sm-12">
                    <label for="name">Nombre:<small class="text-danger">*</small></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-info"><i class="fas fa-user"></i></div>
                        </div>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="<?= old('name') ?>">
                    </div>
                    <?php if (session('errors.name')) : ?>
                        <small class="text-danger"><?= session('errors.name') ?></small>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <label for="email">Email:<small class="text-danger">*</small></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-info"><i class="fas fa-envelope"></i></div>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= old('email') ?>">
                    </div>
                    <?php if (session('errors.email')) : ?>
                        <small class="text-danger"><?= session('errors.email') ?></small>
                    <?php endif; ?>
                </div>
                <div class="col-sm-12 col-md-6">
                    <label for="id_rol">Rol:<small class="text-danger">*</small></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-info"><i class="fas fa-user-tag"></i></div>
                        </div>
                        <select name="id_rol" id="id_rol" class="form-control">
                            <option value="" selected>- Seleccione -</option>
                            <?php foreach ($roles as $rol) : ?>
                                <option value="<?= $rol['id_rol']; ?>" <?= (old('id_rol') == $rol['id_rol']) ? 'selected' : ''; ?>>
                                    <?= $rol['rolname']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?php if (session('errors.id_rol')) : ?>
                        <small class="text-danger"><?= session('errors.id_rol') ?></small>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <label for="password">Contraseña:<small class="text-danger">*</small></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-info"><i class="fas fa-lock"></i></div>
                        </div>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Nueva contraseña">
                    </div>
                    <?php if (session('errors.password')) : ?>
                        <small class="text-danger"><?= session('errors.password') ?></small>
                    <?php endif; ?>
                </div>
                <div class="col-sm-12 col-md-6">
                    <label for="repeat">Repetir:<small class="text-danger">*</small></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-info"><i class="fas fa-redo-alt"></i></div>
                        </div>
                        <input type="password" class="form-control" id="repeat" name="repeat" placeholder="Repita la contraseña">
                    </div>
                    <?php if (session('errors.repeat')) : ?>
                        <small class="text-danger"><?= session('errors.repeat') ?></small>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center mt-3">
                    <button type="submit" class="btn btn-success" id="submit" name="submit">Guardar <i class="fas fa-save"></i></button>
                </div>
            </div>
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
?>
<?= $this->endSection(); ?>