<?php $__env->startSection('js'); ?>

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

<form action="<?php echo e(route('anggota.update', $data->id)); ?>" method="post" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('put')); ?>

<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Anggota</h4>
                      
                        <div class="form-group<?php echo e($errors->has('nama') ? ' has-error' : ''); ?>">
                            <label for="nama" class="col-md-4 control-label">Nama</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="<?php echo e($data->nama); ?>" required>
                                <?php if($errors->has('nama')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nama')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('npm') ? ' has-error' : ''); ?>">
                            <label for="npm" class="col-md-4 control-label">NPM</label>
                            <div class="col-md-6">
                                <input id="npm" type="number" class="form-control" name="npm" value="<?php echo e($data->npm); ?>" maxlength="8" required>
                                <?php if($errors->has('npm')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('npm')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('tempat_lahir') ? ' has-error' : ''); ?>">
                            <label for="tempat_lahir" class="col-md-4 control-label">Tempat Lahir</label>
                            <div class="col-md-6">
                                <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" value="<?php echo e($data->tempat_lahir); ?>" required>
                                <?php if($errors->has('tempat_lahir')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('tempat_lahir')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('tgl_lahir') ? ' has-error' : ''); ?>">
                            <label for="tgl_lahir" class="col-md-4 control-label">Tanggal Lahir</label>
                            <div class="col-md-6">
                                <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" value="<?php echo e($data->tgl_lahir); ?>" required>
                                <?php if($errors->has('tgl_lahir')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('tgl_lahir')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('level') ? ' has-error' : ''); ?>">
                            <label for="level" class="col-md-4 control-label">Jenis Kelamin</label>
                            <div class="col-md-6">
                            <select class="form-control" name="jk" required="">
                                <option value=""></option>
                                <option value="L" <?php echo e($data->jk === "L" ? "selected" : ""); ?>>Laki - Laki</option>
                                <option value="P" <?php echo e($data->jk === "P" ? "selected" : ""); ?>>Perempuan</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('prodi') ? ' has-error' : ''); ?>">
                            <label for="prodi" class="col-md-4 control-label">Prodi</label>
                            <div class="col-md-6">
                            <select class="form-control" name="prodi" required="">
                                <option value=""></option>
                                <option value="TI" <?php echo e($data->prodi === "TI" ? "selected" : ""); ?> >Teknik Informatika</option>
                                <option value="SI" <?php echo e($data->prodi === "SI" ? "selected" : ""); ?> >Sistem Informasi</option>
                                <option value="KM" <?php echo e($data->prodi === "KM" ? "selected" : ""); ?> >Kesehatan Masyarakat</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('user_id') ? ' has-error' : ''); ?> " style="margin-bottom: 20px;">
                            <label for="user_id" class="col-md-4 control-label">User Login</label>
                            <div class="col-md-6">
                            <select class="form-control" name="user_id" required="">
                                <option value="">(Cari User)</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>" <?php echo e($data->user_id === $user->id ? "selected" : ""); ?>><?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Ubah
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="<?php echo e(route('anggota.index')); ?>" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>