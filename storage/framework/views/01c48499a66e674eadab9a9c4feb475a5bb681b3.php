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
                <div class="panel-heading"><?php echo e($pageTitle); ?></div>

                <div class="vtabs customvtab m-t-10">
                    <?php echo $__env->make('sections.super_admin_setting_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">
                            <div class="row">
                                <div class="col-md-12">

                                    <h3 class="box-title m-b-0"><?php echo app('translator')->getFromJson("modules.emailSettings.notificationTitle"); ?></h3>

                                    <p class="text-muted m-b-10 font-13">
                                        <?php echo app('translator')->getFromJson("modules.emailSettings.notificationSubtitle"); ?>
                                    </p>


                                            <?php echo Form::open(['id'=>'updateSettings','class'=>'ajax-form','method'=>'put']); ?>

                                            <?php echo Form::hidden('_token', csrf_token()); ?>

                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-12 ">
                                                        <div class="form-group">
                                                            <label><?php echo app('translator')->getFromJson("modules.emailSettings.mailDriver"); ?></label>
                                                            <select class="form-control" name="mail_driver"
                                                                    id="mail_driver">
                                                                <option <?php if($smtpSetting->mail_driver == 'smtp'): ?> selected <?php endif; ?>>
                                                                    smtp
                                                                </option>
                                                                <option <?php if($smtpSetting->mail_driver == 'mail'): ?> selected <?php endif; ?>>
                                                                    mail
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label><?php echo app('translator')->getFromJson("modules.emailSettings.mailHost"); ?></label>
                                                            <input type="text" name="mail_host" id="mail_host"
                                                                   class="form-control"
                                                                   value="<?php echo e($smtpSetting->mail_host); ?>">
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label><?php echo app('translator')->getFromJson("modules.emailSettings.mailPort"); ?></label>
                                                            <input type="text" name="mail_port" id="mail_port"
                                                                   class="form-control"
                                                                   value="<?php echo e($smtpSetting->mail_port); ?>">
                                                        </div>
                                                    </div>
                                                    <!--/span-->

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label><?php echo app('translator')->getFromJson("modules.emailSettings.mailUsername"); ?></label>
                                                            <input type="text" name="mail_username" id="mail_username"
                                                                   class="form-control"
                                                                   value="<?php echo e($smtpSetting->mail_username); ?>">
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label"><?php echo app('translator')->getFromJson("modules.emailSettings.mailPassword"); ?></label>
                                                            <input type="password" name="mail_password"
                                                                   id="mail_password"
                                                                   class="form-control"
                                                                   value="<?php echo e($smtpSetting->mail_password); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label"><?php echo app('translator')->getFromJson("modules.emailSettings.mailFrom"); ?></label>
                                                            <input type="text" name="mail_from_name" id="mail_from_name"
                                                                   class="form-control"
                                                                   value="<?php echo e($smtpSetting->mail_from_name); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label"><?php echo app('translator')->getFromJson("modules.emailSettings.mailFromEmail"); ?></label>
                                                            <input type="text" name="mail_from_email" id="mail_from_email"
                                                                   class="form-control"
                                                                   value="<?php echo e($smtpSetting->mail_from_email); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label"><?php echo app('translator')->getFromJson("modules.emailSettings.mailEncryption"); ?></label>
                                                            <select class="form-control" name="mail_encryption"
                                                                    id="mail_encryption">
                                                                <option <?php if($smtpSetting->mail_encryption == 'tls'): ?> selected <?php endif; ?>>
                                                                    tls
                                                                </option>
                                                                <option <?php if($smtpSetting->mail_encryption == 'ssl'): ?> selected <?php endif; ?>>
                                                                    ssl
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->


                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" id="save-form" class="btn btn-success"><i
                                                            class="fa fa-check"></i>
                                                    <?php echo app('translator')->getFromJson('app.update'); ?>
                                                </button>
                                                <button type="button" id="send-test-email" class="btn btn-primary"><?php echo app('translator')->getFromJson('modules.emailSettings.sendTestEmail'); ?></button>
                                                <button type="reset" class="btn btn-default"><?php echo app('translator')->getFromJson('app.reset'); ?></button>
                                            </div>
                                            <?php echo Form::close(); ?>


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
            $('#save-form').click(function () {

                var url = '<?php echo e(route('super-admin.email-settings.update', $smtpSetting->id)); ?>';

                $.easyAjax({
                    url: url,
                    type: "POST",
                    container: '#updateSettings',
                    data: $('#updateSettings').serialize()
                })
            });

            $('#send-test-email').click(function () {

                var url = '<?php echo e(route('super-admin.email-settings.sendTestEmail')); ?>';

                $.easyAjax({
                    url: url,
                    type: "GET",
                    success: function (response) {

                    }
                })
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.super-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>