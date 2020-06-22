<?php $__env->startSection('js'); ?>
 <script type="text/javascript">
   $(document).on('click', '.pilih', function (e) {
                document.getElementById("buku_judul").value = $(this).attr('data-buku_judul');
                document.getElementById("buku_id").value = $(this).attr('data-buku_id');
                $('#myModal').modal('hide');
            });

            $(document).on('click', '.pilih_anggota', function (e) {
                document.getElementById("anggota_id").value = $(this).attr('data-anggota_id');
                document.getElementById("anggota_nama").value = $(this).attr('data-anggota_nama');
                $('#myModal2').modal('hide');
            });
          
             $(function () {
                $("#lookup, #lookup2").dataTable();
            });

        </script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<form method="POST" action="<?php echo e(route('transaksi.store')); ?>" enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>

<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Transaksi baru</h4>
                    
                        <div class="form-group<?php echo e($errors->has('kode_transaksi') ? ' has-error' : ''); ?>">
                            <label for="kode_transaksi" class="col-md-4 control-label">Kode Transaksi</label>
                            <div class="col-md-6">
                                <input id="kode_transaksi" type="text" class="form-control" name="kode_transaksi" value="<?php echo e($kode); ?>" required readonly="">
                                <?php if($errors->has('kode_transaksi')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_transaksi')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                         <div class="form-group<?php echo e($errors->has('tgl_pinjam') ? ' has-error' : ''); ?>">
                            <label for="tgl_pinjam" class="col-md-4 control-label">Tanggal Pinjam</label>
                            <div class="col-md-3">
                                <input id="tgl_pinjam" type="date" class="form-control" name="tgl_pinjam" value="<?php echo e(date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString()))); ?>" required <?php if(Auth::user()->level == 'user'): ?> readonly <?php endif; ?>>
                                <?php if($errors->has('tgl_pinjam')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('tgl_pinjam')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                         <div class="form-group<?php echo e($errors->has('tgl_kembali') ? ' has-error' : ''); ?>">
                            <label for="tgl_kembali" class="col-md-4 control-label">Tanggal Kembali</label>
                            <div class="col-md-3">
                                <input id="tgl_kembali" type="date"  class="form-control" name="tgl_kembali" value="<?php echo e(date('Y-m-d', strtotime(Carbon\Carbon::today()->addDays(5)->toDateString()))); ?>" required="" <?php if(Auth::user()->level == 'user'): ?> readonly <?php endif; ?>>
                                <?php if($errors->has('tgl_kembali')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('tgl_kembali')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('buku_id') ? ' has-error' : ''); ?>">
                            <label for="buku_id" class="col-md-4 control-label">Buku</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="buku_judul" type="text" class="form-control" readonly="" required>
                                <input id="buku_id" type="hidden" name="buku_id" value="<?php echo e(old('buku_id')); ?>" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari Buku</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                <?php if($errors->has('buku_id')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('buku_id')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                 
                            </div>
                        </div>
                        

                        <?php if(Auth::user()->level == 'admin'): ?>
                        <div class="form-group<?php echo e($errors->has('anggota_id') ? ' has-error' : ''); ?>">
                            <label for="anggota_id" class="col-md-4 control-label">Anggota</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="anggota_nama" type="text" class="form-control" readonly="" required>
                                <input id="anggota_id" type="hidden" name="anggota_id" value="<?php echo e(old('anggota_id')); ?>" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-warning btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari Anggota</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                <?php if($errors->has('anggota_id')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('anggota_id')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                 
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="form-group<?php echo e($errors->has('anggota_id') ? ' has-error' : ''); ?>">
                            <label for="anggota_id" class="col-md-4 control-label">Anggota</label>
                            <div class="col-md-6">
                                <input id="anggota_nama" type="text" class="form-control" readonly="" value="<?php echo e(Auth::user()->anggota->nama); ?>" required>
                                <input id="anggota_id" type="hidden" name="anggota_id" value="<?php echo e(Auth::user()->anggota->id); ?>" required readonly="">
                              
                                <?php if($errors->has('anggota_id')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('anggota_id')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                 
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="form-group<?php echo e($errors->has('ket') ? ' has-error' : ''); ?>">
                            <label for="ket" class="col-md-4 control-label">Keterangan</label>
                            <div class="col-md-6">
                                <input id="ket" type="text" class="form-control" name="ket" value="<?php echo e(old('ket')); ?>">
                                <?php if($errors->has('ket')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('ket')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="<?php echo e(route('transaksi.index')); ?>" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>


  <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>ISBN</th>
                                    <th>Pengarang</th>
                                    <th>Tahun</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $bukus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="pilih" data-buku_id="<?php echo $data->id; ?>" data-buku_judul="<?php echo $data->judul; ?>" >
                                    <td><?php if($data->cover): ?>
                            <img src="<?php echo e(url('images/buku/'. $data->cover)); ?>" alt="image" style="margin-right: 10px;" />
                          <?php else: ?>
                            <img src="<?php echo e(url('images/buku/default.png')); ?>" alt="image" style="margin-right: 10px;" />
                          <?php endif; ?>
                          <?php echo e($data->judul); ?></td>
                                    <td><?php echo e($data->isbn); ?></td>
                                    <td><?php echo e($data->pengarang); ?></td>
                                    <td><?php echo e($data->tahun_terbit); ?></td>
                                    <td><?php echo e($data->jumlah_buku); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>


  <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Anggota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                        <tr>
                          <th>
                            Nama
                          </th>
                          <th>
                            NPM
                          </th>
                          <th>
                            Prodi
                          </th>
                          <th>
                            Jenis Kelamin
                          </th>
                        </tr>
                      </thead>
                            <tbody>
                                <?php $__currentLoopData = $anggotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="pilih_anggota" data-anggota_id="<?php echo $data->id; ?>" data-anggota_nama="<?php echo $data->nama; ?>" >
                                    <td class="py-1">
                          <?php if($data->user->gambar): ?>
                            <img src="<?php echo e(url('images/user', $data->user->gambar)); ?>" alt="image" style="margin-right: 10px;" />
                          <?php else: ?>
                            <img src="<?php echo e(url('images/user/default.png')); ?>" alt="image" style="margin-right: 10px;" />
                          <?php endif; ?>

                            <?php echo e($data->nama); ?>

                          </td>
                          <td>
                            <?php echo e($data->npm); ?>

                          </td>

                          <td>
                          <?php if($data->prodi == 'TI'): ?>
                            Teknik Informatika
                          <?php elseif($data->prodi == 'SI'): ?>
                            Sistem Informasi
                          <?php else: ?>
                            Kesehatan Masyarakat
                          <?php endif; ?>
                          </td>
                          <td>
                            <?php echo e($data->jk === "L" ? "Laki - Laki" : "Perempuan"); ?>

                          </td>
                        </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>