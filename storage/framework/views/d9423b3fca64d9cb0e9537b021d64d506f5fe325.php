<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e($pageTitle); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo app('translator')->getFromJson('app.menu.home'); ?></a></li>
                <li class="active"><?php echo e($pageTitle); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/switchery/dist/switchery.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo app('translator')->getFromJson('modules.accountSettings.updateTitle'); ?></div>

                <div class="vtabs customvtab m-t-10">
                    <?php echo $__env->make('sections.module_setting_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="white-box">
                                        <h3 class="box-title m-b-0"><?php echo e(ucfirst($type)); ?> <?php echo app('translator')->getFromJson("modules.moduleSettings.moduleSetting"); ?></h3>

                                        <p class="text-muted m-b-10 font-13">
                                            <?php echo app('translator')->getFromJson("modules.moduleSettings.employeeSubTitle"); ?> <?php echo e(ucfirst($type)); ?> <?php echo app('translator')->getFromJson("modules.moduleSettings.section"); ?>
                                        </p>

                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12 b-t p-t-20">
                                                <?php echo Form::open(['id'=>'editSettings','class'=>'ajax-form form-horizontal','method'=>'PUT']); ?>


                                                <?php $__currentLoopData = $modulesData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-xs-6" ><?php echo app('translator')->getFromJson('modules.module.'.$setting->module_name); ?></label>
                                                        <div class="col-xs-6">
                                                            <div class="switchery-demo">
                                                                <input type="checkbox" <?php if($setting->status == 'active'): ?> checked <?php endif; ?> class="js-switch change-module-setting" data-setting-id="<?php echo e($setting->id); ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <?php echo Form::close(); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- .row -->
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <!-- .row -->



<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script src="<?php echo e(asset('plugins/bower_components/switchery/dist/switchery.min.js')); ?>"></script>
<script>

    // Switchery
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    $('.js-switch').each(function() {
        new Switchery($(this)[0], $(this).data());

    });

    $('.change-module-setting').change(function () {
        var id = $(this).data('setting-id');

        if($(this).is(':checked'))
            var moduleStatus = 'active';
        else
            var moduleStatus = 'deactive';

        var url = '<?php echo e(route('admin.module-settings.update', ':id')); ?>';
        url = url.replace(':id', id);
        $.easyAjax({
            url: url,
            type: "POST",
            data: { 'id': id, 'status': moduleStatus, '_method': 'PUT', '_token': '<?php echo e(csrf_token()); ?>' }
        })
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>