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
                <form id="formUserData" name="formUserData" action="" method="post">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="inlineFormInputGroup">Nombre:<small class="text-danger">*</small></label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-info"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="<?= $user['name']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <label for="inlineFormInputGroup">Email:<small class="text-danger">*</small></label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-info"><i class="fas fa-envelope"></i></div>
                                </div>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $user['email']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="inlineFormInputGroup">Rol:<small class="text-danger">*</small></label>
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-center mt-3">
                            <button type="submit" class="btn btn-success" id="buttonUserData" name="buttonUserData">Guardar <i class="fas fa-save"></i></button>
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