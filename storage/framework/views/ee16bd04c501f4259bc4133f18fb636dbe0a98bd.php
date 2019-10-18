<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e($pageTitle); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-6 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo app('translator')->getFromJson('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('admin.leads.index')); ?>"><?php echo e($pageTitle); ?></a></li>
                <li class="active"><?php echo app('translator')->getFromJson('app.edit'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-heading"> <?php echo app('translator')->getFromJson('modules.lead.updateTitle'); ?></div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <?php echo Form::open(['id'=>'updateLead','class'=>'ajax-form','method'=>'PUT']); ?>

                        <div class="form-body">
                            <h3 class="box-title"><?php echo app('translator')->getFromJson('modules.lead.companyDetails'); ?></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->getFromJson('modules.lead.companyName'); ?></label>
                                        <input type="text" id="company_name" name="company_name" class="form-control"  value="<?php echo e(isset($lead->company_name) ? $lead->company_name : ''); ?>">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->getFromJson('modules.lead.website'); ?></label>
                                        <input type="text" id="website" name="website" class="form-control" value="<?php echo e(isset($lead->website) ? $lead->website : ''); ?>" >
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->getFromJson('app.address'); ?></label>
                                        <textarea name="address"  id="address"  rows="5" class="form-control"><?php echo e(isset($lead->address) ? $lead->address : ''); ?></textarea>
                                    </div>
                                </div>
                                <!--/span-->

                            </div>
                            <!--/row-->

                            <h3 class="box-title m-t-40"><?php echo app('translator')->getFromJson('modules.lead.leadDetails'); ?></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->getFromJson('modules.lead.clientName'); ?></label>
                                        <input type="text" name="client_name" id="client_name" class="form-control" value="<?php echo e($lead->client_name); ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->getFromJson('modules.lead.clientEmail'); ?></label>
                                        <input type="email" name="client_email" id="client_email" class="form-control" value="<?php echo e($lead->client_email); ?>">
                                        <span class="help-block"><?php echo app('translator')->getFromJson('modules.lead.emailNote'); ?></span>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <!--/span-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->getFromJson('modules.lead.mobile'); ?></label>
                                        <input type="tel" name="mobile" id="mobile" value="<?php echo e($lead->mobile); ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->getFromJson('app.next_follow_up'); ?></label>
                                        <select name="next_follow_up" id="next_follow_up" class="form-control">
                                            <option <?php if($lead->next_follow_up == 'yes'): ?> selected
                                                    <?php endif; ?> value="yes"> <?php echo app('translator')->getFromJson('app.yes'); ?></option>
                                           <option <?php if($lead->next_follow_up == 'no'): ?> selected
                                                    <?php endif; ?> value="no"> <?php echo app('translator')->getFromJson('app.no'); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->getFromJson('app.status'); ?></label>
                                        <select name="status" id="status" class="form-control">
                                            <?php $__empty_1 = true; $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <option <?php if($lead->status_id == $sts->id): ?> selected
                                                    <?php endif; ?> value="<?php echo e($sts->id); ?>"> <?php echo e($sts->type); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->getFromJson('app.source'); ?></label>
                                        <select name="source" id="source" class="form-control">
                                            <?php $__empty_1 = true; $__currentLoopData = $sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <option <?php if($lead->source_id == $source->id): ?> selected
                                                        <?php endif; ?> value="<?php echo e($source->id); ?>"> <?php echo e($source->type); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->

                            <div class="row">
                                <div class="col-md-12">
                                    <label><?php echo app('translator')->getFromJson('app.note'); ?></label>
                                    <div class="form-group">
                                        <textarea name="note" id="note" class="form-control" rows="5"><?php echo e(isset($lead->note) ? $lead->note : ''); ?></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-actions">
                            <button type="submit" id="save-form" class="btn btn-success"> <i class="fa fa-check"></i> <?php echo app('translator')->getFromJson('app.update'); ?></button>
                            <a href="<?php echo e(route('admin.leads.index')); ?>" class="btn btn-default"><?php echo app('translator')->getFromJson('app.back'); ?></a>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- .row -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
<script>
    $(".date-picker").datepicker({
        todayHighlight: true,
        autoclose: true
    });
    
    $('#save-form').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.leads.update', [$lead->id])); ?>',
            container: '#updateLead',
            type: "POST",
            redirect: true,
            data: $('#updateLead').serialize()
        })
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>