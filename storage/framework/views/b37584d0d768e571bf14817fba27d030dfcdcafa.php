<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PERPUSKU - LOGIN</title>

  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('vendors/iconfonts/puse-icons-feather/feather.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('vendors/css/vendor.bundle.base.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('vendors/css/vendor.bundle.addons.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>" />
</head>

<body>
<form method="POST" action="<?php echo e(route('login')); ?>">
<?php echo e(csrf_field()); ?>

  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth theme-one">

        <div class="row w-100">
        <div class="col-md-12" style="margin-bottom: 20px;">
        <h2 style="text-align: center;">PERPUSKU - UNIVERSITAS YUDHARTA</h2>
        </div>
        <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">

                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>"">
                  <label class="label">Username</label>
                  <div class="input-group">
                    <input id="email" type="text" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                    <?php if($errors->has('email')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input id="password" type="password" class="form-control" name="password" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block" type="submit">Login</button>
                </div>
            </div>
            <p class="footer-text text-center" style="margin-top: 20px;color: #308ee0">Copyright © <?php echo e(date('Y')); ?> Team Abal-abal - All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends Herziwp@gmail.com -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  </form>
  <script src="<?php echo e(asset('vendors/js/vendor.bundle.base.js')); ?>"></script>
  <script src="<?php echo e(asset('vendors/js/vendor.bundle.addons.js')); ?>"></script>
</body>

</html>