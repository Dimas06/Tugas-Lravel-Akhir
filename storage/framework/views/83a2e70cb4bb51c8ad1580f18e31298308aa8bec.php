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

</div>
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">Laporan Buku</h4>

  <div class="col-md-2 pull-left">
    <a href="<?php echo e(url('laporan/buku/pdf')); ?>" class="btn btn-primary btn-rounded btn-fw"><b><i class="fa fa-download"></i> Export PDF</a></b>
  </div>
  <div class="col-md-2 pull-left">
     <a href="<?php echo e(url('laporan/buku/excel')); ?>" class="btn btn-success btn-rounded btn-fw">
     <b><i class="fa fa-download"></i> Export EXCEL</a></b>
  </div>
                </div>
              </div>
            </div>
          </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>