<?php $__env->startSection('js'); ?>

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>

<script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })
        </script>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

<form method="POST" action="<?php echo e(route('buku.store')); ?>" enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>

<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Buku baru</h4>
                      
                        <div class="form-group<?php echo e($errors->has('judul') ? ' has-error' : ''); ?>">
                            <label for="judul" class="col-md-4 control-label">Judul</label>
                            <div class="col-md-6">
                                <input id="judul" type="text" class="form-control" name="judul" value="<?php echo e(old('judul')); ?>" required>
                                <?php if($errors->has('judul')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('judul')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('npm') ? ' has-error' : ''); ?>">
                            <label for="isbn" class="col-md-4 control-label">ISBN</label>
                            <div class="col-md-6">
                                <input id="isbn" type="text" class="form-control" name="isbn" value="<?php echo e(old('isbn')); ?>" required>
                                <?php if($errors->has('isbn')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('isbn')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('pengarang') ? ' has-error' : ''); ?>">
                            <label for="pengarang" class="col-md-4 control-label">Pengarang</label>
                            <div class="col-md-6">
                                <input id="pengarang" type="text" class="form-control" name="pengarang" value="<?php echo e(old('pengarang')); ?>" required>
                                <?php if($errors->has('pengarang')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('pengarang')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('penerbit') ? ' has-error' : ''); ?>">
                            <label for="penerbit" class="col-md-4 control-label">Penerbit</label>
                            <div class="col-md-6">
                                <input id="penerbit" type="text" class="form-control" name="penerbit" value="<?php echo e(old('penerbit')); ?>" required>
                                <?php if($errors->has('penerbit')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('penerbit')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('tahun_terbit') ? ' has-error' : ''); ?>">
                            <label for="tahun_terbit" class="col-md-4 control-label">Tahun Terbit</label>
                            <div class="col-md-6">
                                <input id="tahun_terbit" type="number" maxlength="4" class="form-control" name="tahun_terbit" value="<?php echo e(old('tahun_terbit')); ?>" required>
                                <?php if($errors->has('tahun_terbit')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('tahun_terbit')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('jumlah_buku') ? ' has-error' : ''); ?>">
                            <label for="jumlah_buku" class="col-md-4 control-label">Jumlah Buku</label>
                            <div class="col-md-6">
                                <input id="jumlah_buku" type="number" maxlength="4" class="form-control" name="jumlah_buku" value="<?php echo e(old('jumlah_buku')); ?>" required>
                                <?php if($errors->has('jumlah_buku')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('jumlah_buku')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('deskripsi') ? ' has-error' : ''); ?>">
                            <label for="deskripsi" class="col-md-4 control-label">Deskripsi</label>
                            <div class="col-md-12">
                                <input id="deskripsi" type="text" class="form-control" name="deskripsi" value="<?php echo e(old('deskripsi')); ?>" >
                                <?php if($errors->has('deskripsi')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('deskripsi')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('lokasi') ? ' has-error' : ''); ?>">
                            <label for="lokasi" class="col-md-4 control-label">Lokasi</label>
                            <div class="col-md-6">
                            <select class="form-control" name="lokasi" required="">
                                <option value=""></option>
                                <option value="rak1">Rak 1</option>
                                <option value="rak2">Rak 2</option>
                                <option value="rak3">Rak 3</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Cover</label>
                            <div class="col-md-6">
                                <img width="200" height="200" />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="cover">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="<?php echo e(route('buku.index')); ?>" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>