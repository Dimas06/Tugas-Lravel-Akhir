<?php $__env->startSection('js'); ?>
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">

  <div class="col-lg-2">
    <a href="<?php echo e(route('buku.create')); ?>" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Buku</a>
  </div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <form action="<?php echo e(url('import_buku')); ?>" method="post" class="form-inline" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="input-group <?php echo e($errors->has('importBuku') ? 'has-error' : ''); ?>">
              <input type="file" class="form-control" name="importBuku" required="">

              <span class="input-group-btn">
                              <button type="submit" class="btn btn-success" style="height: 38px;margin-left: -2px;">Import</button>
                            </span>
            </div>
          </form>

        </div>
    <div class="col-lg-12">
                  <?php if(Session::has('message')): ?>
                  <div class="alert alert-<?php echo e(Session::get('message_type')); ?>" id="waktu2" style="margin-top:10px;"><?php echo e(Session::get('message')); ?></div>
                  <?php endif; ?>
                  </div>
</div>
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title pull-left">Data Buku</h4>
                  <a href="<?php echo e(url('format_buku')); ?>" class="btn btn-xs btn-info pull-right">Format Buku</a>
                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                          <th>
                            Judul
                          </th>
                          <th>
                            ISBN
                          </th>
                          <th>
                            Pengarang
                          </th>
                          <th>
                            Tahun
                          </th>
                          <th>
                            Stok
                          </th>
                          <th>
                            Rak
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td class="py-1">
                          <?php if($data->cover): ?>
                            <img src="<?php echo e(url('images/buku/'. $data->cover)); ?>" alt="image" style="margin-right: 10px;" />
                          <?php else: ?>
                            <img src="<?php echo e(url('images/buku/default.png')); ?>" alt="image" style="margin-right: 10px;" />
                          <?php endif; ?>
                          <a href="<?php echo e(route('buku.show', $data->id)); ?>"> 
                            <?php echo e($data->judul); ?>

                          </a>
                          </td>
                          <td>
                          
                            <?php echo e($data->isbn); ?>

                          
                          </td>

                          <td>
                            <?php echo e($data->pengarang); ?>

                          </td>
                          <td>
                            <?php echo e($data->tahun_terbit); ?>

                          </td>
                          <td>
                            <?php echo e($data->jumlah_buku); ?>

                          </td>
                          <td>
                            <?php echo e($data->lokasi); ?>

                          </td>
                          <td>
                          <div class="btn-group dropdown">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="<?php echo e(route('buku.edit', $data->id)); ?>"> Edit </a>
                            <form action="<?php echo e(route('buku.destroy', $data->id)); ?>" class="pull-left"  method="post">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('delete')); ?>

                            <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                            </button>
                          </form>
                           
                          </div>
                        </div>
                          </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                  </div>
               
                </div>
              </div>
            </div>
          </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>