<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e(__($pageTitle)); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo app('translator')->getFromJson('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('admin.expenses.index')); ?>"><?php echo e(__($pageTitle)); ?></a></li>
                <li class="active"><?php echo app('translator')->getFromJson('app.addNew'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">

            <div class="panel ">
                <div class="panel-heading"> <?php echo app('translator')->getFromJson('modules.expenses.addExpense'); ?></div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <?php echo Form::open(['id'=>'createExpense','class'=>'ajax-form','method'=>'POST']); ?>

                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->getFromJson('modules.messages.chooseMember'); ?></label>
                                        <select class="select2 form-control" data-placeholder="<?php echo app('translator')->getFromJson('modules.messages.chooseMember'); ?>" name="user_id">
                                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($employee->user->id); ?>"><?php echo e(ucwords($employee->user->name)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="company_phone"><?php echo app('translator')->getFromJson('modules.invoices.currency'); ?></label>
                                        <select class="form-control" id="currency_id" name="currency_id">
                                            <?php $__empty_1 = true; $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <option <?php if($currency->id == $global->currency_id): ?> selected <?php endif; ?> value="<?php echo e($currency->id); ?>">
                                                    <?php echo e($currency->currency_name); ?> - (<?php echo e($currency->currency_symbol); ?>)
                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->getFromJson('modules.expenses.itemName'); ?>*</label>
                                        <input type="text" name="item_name" id="item_name" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->getFromJson('app.price'); ?>*</label>
                                        <input type="text" name="price" id="price" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->getFromJson('modules.expenses.purchaseFrom'); ?></label>
                                        <input type="text" name="purchase_from" id="purchase_from" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->getFromJson('modules.expenses.purchaseDate'); ?>*</label>
                                        <input type="text" class="form-control" name="purchase_date" id="purchase_date" value="<?php echo e(Carbon\Carbon::today()->format('m/d/Y')); ?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->getFromJson('app.invoice'); ?></label>
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                    <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new"><?php echo app('translator')->getFromJson('app.selectFile'); ?></span> <span class="fileinput-exists"><?php echo app('translator')->getFromJson('app.change'); ?></span>
                    <input type="file" name="bill" id="bill">
                    </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><?php echo app('translator')->getFromJson('app.remove'); ?></a> </div>
                                    </div>
                                </div>

                            </div>


                            <!--/span-->


                        </div>
                        <div class="form-actions">
                            <button type="submit" id="save-form-2" class="btn btn-success"><i class="fa fa-check"></i>
                                <?php echo app('translator')->getFromJson('app.save'); ?>
                            </button>
                            <button type="reset" class="btn btn-default"><?php echo app('translator')->getFromJson('app.reset'); ?></button>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- .row -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
<script>


    $(".select2").select2({
        formatNoMatches: function () {
            return "<?php echo e(__('messages.noRecordFound')); ?>";
        }
    });

    jQuery('#purchase_date').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    $('#save-form-2').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.expenses.store')); ?>',
            container: '#createExpense',
            type: "POST",
            redirect: true,
            file: (document.getElementById("bill").files.length == 0) ? false : true,
            data: $('#createExpense').serialize()
        })
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>