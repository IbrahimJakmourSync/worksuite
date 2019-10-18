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
<link rel="stylesheet" href="<?php echo e(asset('image-picker/image-picker.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/switchery/dist/switchery.min.css')); ?>">

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo app('translator')->getFromJson('modules.invoiceSettings.updateTitle'); ?></div>

                <div class="vtabs customvtab m-t-10">
                    <?php echo $__env->make('sections.admin_setting_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="white-box">

                                        <?php echo Form::open(['id'=>'editSettings','class'=>'ajax-form','method'=>'PUT']); ?>

                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label for="invoice_prefix"><?php echo app('translator')->getFromJson('modules.invoiceSettings.invoicePrefix'); ?></label>
                                                    <input type="text" class="form-control" id="invoice_prefix" name="invoice_prefix"
                                                           value="<?php echo e($invoiceSetting->invoice_prefix); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="template"><?php echo app('translator')->getFromJson('modules.invoiceSettings.template'); ?></label>
                                                    <select name="template" class="image-picker show-labels show-html">
                                                        <option data-img-src="<?php echo e(asset('invoice-template/1.png')); ?>"
                                                                <?php if($invoiceSetting->template == 'invoice-1'): ?> selected <?php endif; ?>
                                                                value="invoice-1">Template
                                                            1
                                                        </option>
                                                        <option data-img-src="<?php echo e(asset('invoice-template/2.png')); ?>"
                                                                <?php if($invoiceSetting->template == 'invoice-2'): ?> selected <?php endif; ?>
                                                                value="invoice-2">Template
                                                            2
                                                        </option>
                                                        <option data-img-src="<?php echo e(asset('invoice-template/3.png')); ?>"
                                                                <?php if($invoiceSetting->template == 'invoice-3'): ?> selected <?php endif; ?>
                                                                value="invoice-3">Template
                                                            3
                                                        </option>
                                                        <option data-img-src="<?php echo e(asset('invoice-template/4.png')); ?>"
                                                                <?php if($invoiceSetting->template == 'invoice-4'): ?> selected <?php endif; ?>
                                                                value="invoice-4">Template
                                                            4
                                                        </option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="due_after"><?php echo app('translator')->getFromJson('modules.invoiceSettings.dueAfter'); ?></label>

                                                    <div class="input-group m-t-10">
                                                        <input type="number" id="due_after" name="due_after" class="form-control" value="<?php echo e($invoiceSetting->due_after); ?>">
                                                        <span class="input-group-addon"><?php echo app('translator')->getFromJson('app.days'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="gst_number"><?php echo app('translator')->getFromJson('app.gstNumber'); ?></label>
                                                    <input type="text" id="gst_number" name="gst_number" class="form-control" value="<?php echo e($invoiceSetting->gst_number); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label" ><?php echo app('translator')->getFromJson('app.showGst'); ?></label>
                                                    <div class="switchery-demo">
                                                        <input type="checkbox" name="show_gst" <?php if($invoiceSetting->show_gst == 'yes'): ?> checked <?php endif; ?> class="js-switch " data-color="#99d683"  />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="invoice_terms"><?php echo app('translator')->getFromJson('modules.invoiceSettings.invoiceTerms'); ?></label>
                            <textarea name="invoice_terms" id="invoice_terms" class="form-control"
                                      rows="4"><?php echo e($invoiceSetting->invoice_terms); ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <button type="submit" id="save-form" class="btn btn-success waves-effect waves-light m-r-10">
                                                    <?php echo app('translator')->getFromJson('app.update'); ?>
                                                </button>
                                                <button type="reset"
                                                        class="btn btn-inverse waves-effect waves-light"><?php echo app('translator')->getFromJson('app.reset'); ?></button>
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



    <!-- .row -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script src="<?php echo e(asset('image-picker/image-picker.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/switchery/dist/switchery.min.js')); ?>"></script>


<script>
    $(".image-picker").imagepicker();
    // Switchery
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    $('.js-switch').each(function () {
        new Switchery($(this)[0], $(this).data());

    });
    $('#save-form').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.invoice-settings.update', $invoiceSetting->id)); ?>',
            container: '#editSettings',
            type: "POST",
            redirect: true,
            data: $('#editSettings').serialize()
        })
    });
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>