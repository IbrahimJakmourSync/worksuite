<?php $__env->startSection('title', trans('installer_messages.environment.title')); ?>
<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('installer/froiden-helper/helper.css')); ?>" rel="stylesheet"/>
    <style>
        .form-control{
            height: 14px;
            width: 100%;
        }
        .has-error{
            color: red;
        }
        .has-error input{
            color: black;
            border:1px solid red;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('container'); ?>
    <form method="post" action="<?php echo e(route('LaravelInstaller::environmentSave')); ?>" id="env-form">
        <div class="form-group">
            <label class="col-sm-2 control-label">Hostname</label>

            <div class="col-sm-10">
                <input type="text" name="hostname" class="form-control" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
                <input type="text" name="username" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Database</label>
            <div class="col-sm-10">
                <input type="text" name="database" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <div class="buttons">
                <button class="button" onclick="checkEnv();return false">
                    <?php echo e(trans('installer_messages.next')); ?>

                </button>
            </div>
        </div>
    </form>
    <script>
        function checkEnv() {
            $.easyAjax({
                url: "<?php echo route('LaravelInstaller::environmentSave'); ?>",
                type: "GET",
                data: $("#env-form").serialize(),
                container: "#env-form",
                messagePosition: "inline"
            });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('installer/js/jQuery-2.2.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('installer/froiden-helper/helper.js')); ?>"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor.installer.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>