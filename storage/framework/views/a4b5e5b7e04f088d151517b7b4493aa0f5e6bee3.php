<?php $__env->startSection('js'); ?>
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


var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('submit').disabled = false;
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('submit').disabled = true;
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
    </script>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

<form action="<?php echo e(route('user.update', $data->id)); ?>" method="post" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('put')); ?>

<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit user</h4>
                      
                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e($data->name); ?>" required autofocus>
                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                            <label for="username" class="col-md-4 control-label">Username</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="<?php echo e($data->username); ?>" required readonly="">
                                <?php if($errors->has('username')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('username')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e($data->email); ?>" required readonly="">
                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Gambar</label>
                            <div class="col-md-6">
                                <img class="product" width="200" height="200" <?php if($data->gambar): ?> src="<?php echo e(asset('images/user/'.$data->gambar)); ?>" <?php endif; ?> />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="gambar">
                            </div>
                        </div>
                        <?php if(Auth::user()->level == 'admin'): ?>
                         <div class="form-group<?php echo e($errors->has('level') ? ' has-error' : ''); ?>">
                            <label for="level" class="col-md-4 control-label">Level</label>
                            <div class="col-md-6">
                            <select class="form-control" name="level" required="">
                                <option value="admin" <?php if($data->level == 'admin'): ?> selected <?php endif; ?>>Admin</option>
                                <option value="user" <?php if($data->level == 'user'): ?> selected <?php endif; ?>>User</option>
                            </select>
                            </div>
                        </div>
                        <?php endif; ?>


                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" onkeyup='check();' name="password">
                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="confirm_password" type="password" onkeyup="check()" class="form-control" name="password_confirmation">
                                <span id='message'></span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <a href="<?php echo e(route('user.index')); ?>" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>