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
                    <?php echo $__env->make('sections.notification_settings_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">
                            <div class="row">
                                <div class="col-md-12">

                                    <h3 class="box-title m-b-0"><?php echo app('translator')->getFromJson("modules.emailSettings.notificationTitle"); ?></h3>

                                    <p class="text-muted m-b-10 font-13">
                                        <?php echo app('translator')->getFromJson("modules.emailSettings.notificationSubtitle"); ?>
                                    </p>

                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12 b-t p-t-20">
                                            <?php echo Form::open(['id'=>'editSettings','class'=>'ajax-form form-horizontal','method'=>'PUT']); ?>


                                                <div class="form-group">
                                                    <label class="control-label col-sm-8"><?php echo app('translator')->getFromJson("modules.emailSettings.userRegistration"); ?></label>

                                                    <div class="col-sm-4">
                                                        <div class="switchery-demo">
                                                            <input type="checkbox"
                                                                   <?php if($emailSettings[4]->send_email == 'yes'): ?> checked
                                                                   <?php endif; ?> class="js-switch change-email-setting"
                                                                   data-color="#99d683"
                                                                   data-setting-id="<?php echo e($emailSettings[4]->id); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-8"><?php echo app('translator')->getFromJson("modules.emailSettings.employeeAssign"); ?></label>

                                                    <div class="col-sm-4">
                                                        <div class="switchery-demo">
                                                            <input type="checkbox"
                                                                   <?php if($emailSettings[5]->send_email == 'yes'): ?> checked
                                                                   <?php endif; ?> class="js-switch change-email-setting"
                                                                   data-color="#99d683"
                                                                   data-setting-id="<?php echo e($emailSettings[5]->id); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-8"><?php echo app('translator')->getFromJson("modules.emailSettings.newNotice"); ?></label>

                                                    <div class="col-sm-4">
                                                        <div class="switchery-demo">
                                                            <input type="checkbox"
                                                                   <?php if($emailSettings[6]->send_email == 'yes'): ?> checked
                                                                   <?php endif; ?> class="js-switch change-email-setting"
                                                                   data-color="#99d683"
                                                                   data-setting-id="<?php echo e($emailSettings[6]->id); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-8"><?php echo app('translator')->getFromJson("modules.emailSettings.taskAssign"); ?></label>

                                                    <div class="col-sm-4">
                                                        <div class="switchery-demo">
                                                            <input type="checkbox"
                                                                   <?php if($emailSettings[7]->send_email == 'yes'): ?> checked
                                                                   <?php endif; ?> class="js-switch change-email-setting"
                                                                   data-color="#99d683"
                                                                   data-setting-id="<?php echo e($emailSettings[7]->id); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-8"><?php echo app('translator')->getFromJson("modules.emailSettings.expenseAdded"); ?></label>

                                                    <div class="col-sm-4">
                                                        <div class="switchery-demo">
                                                            <input type="checkbox"
                                                                   <?php if($emailSettings[0]->send_email == 'yes'): ?> checked
                                                                   <?php endif; ?> class="js-switch change-email-setting"
                                                                   data-color="#99d683"
                                                                   data-setting-id="<?php echo e($emailSettings[0]->id); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-8"><?php echo app('translator')->getFromJson("modules.emailSettings.expenseMember"); ?></label>

                                                    <div class="col-sm-4">
                                                        <div class="switchery-demo">
                                                            <input type="checkbox"
                                                                   <?php if($emailSettings[1]->send_email == 'yes'): ?> checked
                                                                   <?php endif; ?> class="js-switch change-email-setting"
                                                                   data-color="#99d683"
                                                                   data-setting-id="<?php echo e($emailSettings[1]->id); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-8"><?php echo app('translator')->getFromJson("modules.emailSettings.expenseStatus"); ?></label>

                                                    <div class="col-sm-4">
                                                        <div class="switchery-demo">
                                                            <input type="checkbox"
                                                                   <?php if($emailSettings[2]->send_email == 'yes'): ?> checked
                                                                   <?php endif; ?> class="js-switch change-email-setting"
                                                                   data-color="#99d683"
                                                                   data-setting-id="<?php echo e($emailSettings[2]->id); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-8"><?php echo app('translator')->getFromJson("modules.emailSettings.ticketRequest"); ?></label>

                                                    <div class="col-sm-4">
                                                        <div class="switchery-demo">
                                                            <input type="checkbox"
                                                                   <?php if($emailSettings[3]->send_email == 'yes'): ?> checked
                                                                   <?php endif; ?> class="js-switch change-email-setting"
                                                                   data-color="#99d683"
                                                                   data-setting-id="<?php echo e($emailSettings[3]->id); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-sm-8"><?php echo app('translator')->getFromJson("modules.emailSettings.leaveRequest"); ?></label>

                                                    <div class="col-sm-4">
                                                        <div class="switchery-demo">
                                                            <input type="checkbox"
                                                                   <?php if($emailSettings[8]->send_email == 'yes'): ?> checked
                                                                   <?php endif; ?> class="js-switch change-email-setting"
                                                                   data-color="#99d683"
                                                                   data-setting-id="<?php echo e($emailSettings[8]->id); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-8"><?php echo app('translator')->getFromJson("modules.emailSettings.taskComplete"); ?></label>

                                                    <div class="col-sm-4">
                                                        <div class="switchery-demo">
                                                            <input type="checkbox"
                                                                   <?php if($emailSettings[9]->send_email == 'yes'): ?> checked
                                                                   <?php endif; ?> class="js-switch change-email-setting"
                                                                   data-color="#99d683"
                                                                   data-setting-id="<?php echo e($emailSettings[9]->id); ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="control-label col-sm-8"><?php echo app('translator')->getFromJson("modules.emailSettings.invoiceNotification"); ?></label>

                                                        <div class="col-sm-4">
                                                            <div class="switchery-demo">
                                                                <input type="checkbox"
                                                                       <?php if($emailSettings[10]->send_email == 'yes'): ?> checked
                                                                       <?php endif; ?> class="js-switch change-email-setting"
                                                                       data-color="#99d683"
                                                                       data-setting-id="<?php echo e($emailSettings[10]->id); ?>"/>
                                                            </div>
                                                        </div>
                                                    </div>

                                            <?php echo Form::close(); ?>

                                        </div>
                                    </div>
                                </div>

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
            $('.js-switch').each(function () {
                new Switchery($(this)[0], $(this).data());

            });

            $('.change-email-setting').change(function () {
                var id = $(this).data('setting-id');

                if ($(this).is(':checked'))
                    var sendEmail = 'yes';
                else
                    var sendEmail = 'no';

                var url = '<?php echo e(route('admin.email-settings.update', ':id')); ?>';
                url = url.replace(':id', id);
                $.easyAjax({
                    url: url,
                    type: "POST",
                    data: {'id': id, 'send_email': sendEmail, '_method': 'PUT', '_token': '<?php echo e(csrf_token()); ?>'}
                })
            });

            $('#save-form').click(function () {

                var url = '<?php echo e(route('admin.email-settings.updateMailConfig')); ?>';

                $.easyAjax({
                    url: url,
                    type: "POST",
                    container: '#updateSettings',
                    data: $('#updateSettings').serialize()
                })
            });

            $('#send-test-email').click(function () {

                var url = '<?php echo e(route('admin.email-settings.sendTestEmail')); ?>';

                $.easyAjax({
                    url: url,
                    type: "GET",
                    success: function (response) {

                    }
                })
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>