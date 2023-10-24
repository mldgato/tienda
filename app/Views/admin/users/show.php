<?= $this->extend('templates/admin_template'); ?>

<?= $this->section('content-header'); ?>
<h1>Mi perfil <i class="fas fa-user-cog fa-fw"></i></h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card border-info mt-3">
    <div class="card-header">
        <h2 class="text-info">Mis datos</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-9">
                <?php
                if (session('id_rol') == 1) {
                ?>
                    <form id="formUserData" name="formUserData" action="<?php echo base_url('admin/users/update/' . $user['id_user']); ?>" method="post" accept-charset="utf-8" autocomplete="off">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="name">Nombre:<small class="text-danger">*</small></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-info"><i class="fas fa-user"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="<?= old('name', $user['name']) ?>">
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
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= old('email', $user['email']) ?>">
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
                                        <?php foreach ($roles as $rol) : ?>
                                            <option value="<?= $rol['id_rol']; ?>" <?= ($user['id_rol'] == $rol['id_rol']) ? 'selected' : ''; ?>>
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
                            <div class="col-sm-12 text-center mt-3">
                                <button type="submit" class="btn btn-success" id="submit" name="submit">Actualizar <i class="fas fa-save"></i></button>
                            </div>
                        </div>
                    </form>
                <?php
                } else {
                ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="name">Nombre:<small class="text-danger">*</small></label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-info"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control" id="name" value="<?= $user['name']; ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <label for="email">Email:<small class="text-danger">*</small></label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-info"><i class="fas fa-envelope"></i></div>
                                </div>
                                <input type="email" class="form-control" id="email" value="<?= $user['email']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="id_rol">Rol:<small class="text-danger">*</small></label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-info"><i class="fas fa-user-tag"></i></div>
                                </div>
                                <select id="id_rol" class="form-control" disabled>
                                    <?php foreach ($roles as $rol) : ?>
                                        <option value="<?= $rol['id_rol']; ?>" <?= ($user['id_rol'] == $rol['id_rol']) ? 'selected' : ''; ?>>
                                            <?= $rol['rolname']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="row mt-3">
                    <div class="col">
                        <hr>
                        <label>Actualizar contraseña:</label>
                    </div>
                </div>
                <form id="formPasswordData" name="formPasswordData" action="<?php echo base_url('admin/users/updatePass/' . $user['id_user']); ?>" method="post" accept-charset="utf-8" autocomplete="off">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <label for="password" class="sr-only">Contraseña:<small class="text-danger">*</small></label>
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
                        <div class="col-sm-12 col-md-4">
                            <label for="repeat" class="sr-only">Repetir:<small class="text-danger">*</small></label>
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
                        <div class="col-sm-12 col-md-4">
                            <button type="submit" class="btn btn-danger" id="submitPass" name="submitPass">Actualizar <i class="fas fa-save"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-3 text-center">
                <?php
                if ($user['image'] == null) {
                    echo '<img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="img-fluid" alt="User Image">';
                } else {
                ?>
                    <img src="<?= base_url('dist/img/users/' . $user['image']) ?>" class="img-fluid" alt="User Image">
                <?php
                }
                ?>
                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#uploadModal">Cambiar imagen <i class="fas fa-images"></i></button>
                <!-- Modal -->
                <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="uploadModalLabel">Cargar Imagen</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="uploadForm" action="<?= base_url('admin/users/upload_image_action/' . $user['id_user']) ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="image">Seleccionar Imagen</label>
                                        <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                                    </div>
                                    <div class="form-group">
                                        <img id="imagePreview" src="#" alt="Vista Previa" style="max-width: 100%; display: none;">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Subir Imagen <i class="fas fa-upload"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    // Código JavaScript para mostrar la vista previa de la imagen
    document.getElementById('image').addEventListener('change', function() {
        const file = this.files[0];
        const imagePreview = document.getElementById('imagePreview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.src = '#';
            imagePreview.style.display = 'none';
        }
    });
</script>
<?php
if (session('message')) {
?>
    <script type="text/javascript">
        Swal.fire('Información', '<?php echo session('message'); ?>', '<?php echo session('alert-class'); ?>');
    </script>
<?php
}
session()->remove('message');
session()->remove('alert-class');
?>
<?= $this->endSection(); ?>