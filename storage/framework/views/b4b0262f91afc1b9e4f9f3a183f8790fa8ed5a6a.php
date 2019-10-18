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
                <li><a href="<?php echo e(route('admin.clients.index')); ?>"><?php echo e($pageTitle); ?></a></li>
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
                <div class="panel-heading"> <?php echo app('translator')->getFromJson('modules.client.updateTitle'); ?></div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <?php echo Form::open(['id'=>'updateClient','class'=>'ajax-form','method'=>'PUT']); ?>

                        <div class="form-body">
                            <h3 class="box-title"><?php echo app('translator')->getFromJson('modules.client.companyDetails'); ?></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->getFromJson('modules.client.companyName'); ?></label>
                                        <input type="text" id="company_name" name="company_name" class="form-control"  value="<?php echo e(isset($clientDetail->company_name) ? $clientDetail->company_name : ''); ?>">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->getFromJson('modules.client.website'); ?></label>
                                        <input type="text" id="website" name="website" class="form-control" value="<?php echo e(isset($clientDetail->website) ? $clientDetail->website : ''); ?>" >
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->getFromJson('app.address'); ?></label>
                                        <textarea name="address"  id="address"  rows="5" class="form-control"><?php echo e(isset($clientDetail->address) ? $clientDetail->address : ''); ?></textarea>
                                    </div>
                                </div>
                                <!--/span-->

                            </div>
                            <!--/row-->

                            <h3 class="box-title m-t-40"><?php echo app('translator')->getFromJson('modules.client.clientDetails'); ?></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->getFromJson('modules.client.clientName'); ?></label>
                                        <input type="text" name="name" id="name" class="form-control" value="<?php echo e($userDetail->name); ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->getFromJson('modules.client.clientEmail'); ?></label>
                                        <input type="email" name="email" id="email" class="form-control" value="<?php echo e($userDetail->email); ?>">
                                        <span class="help-block"><?php echo app('translator')->getFromJson('modules.client.emailNote'); ?></span>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->getFromJson('modules.client.password'); ?></label>
                                        <input type="password" style="display: none">
                                        <input type="password" name="password" id="password" class="form-control">
                                        <span class="help-block"> <?php echo app('translator')->getFromJson('modules.client.passwordUpdateNote'); ?> </span>
                                    </div>
                                </div>
                                <!--/span-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->getFromJson('modules.client.mobile'); ?></label>
                                        <input type="tel" name="mobile" id="mobile" class="form-control" value="<?php echo e($userDetail->mobile); ?>">
                                    </div>
                                </div>
                                <!--/span-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->getFromJson('app.status'); ?></label>
                                        <select name="status" id="status" class="form-control">
                                            <option <?php if($userDetail->status == 'active'): ?> selected
                                                    <?php endif; ?> value="active"><?php echo app('translator')->getFromJson('app.active'); ?></option>
                                            <option <?php if($userDetail->status == 'deactive'): ?> selected
                                                    <?php endif; ?> value="deactive"><?php echo app('translator')->getFromJson('app.deactive'); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->

                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Skype</label>
                                        <input type="text" name="skype" id="skype" class="form-control" value="<?php echo e(isset($clientDetail->skype) ? $clientDetail->skype : ''); ?>">
                                    </div>
                                </div>
                                <!--/span-->

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Linkedin</label>
                                        <input type="text" name="linkedin" id="linkedin" class="form-control" value="<?php echo e(isset($clientDetail->linkedin) ? $clientDetail->linkedin : ''); ?>">
                                    </div>
                                </div>
                                <!--/span-->

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Twitter</label>
                                        <input type="text" name="twitter" id="twitter" class="form-control" value="<?php echo e(isset($clientDetail->twitter) ? $clientDetail->twitter : ''); ?>">
                                    </div>
                                </div>
                                <!--/span-->

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input type="text" name="facebook" id="facebook" class="form-control" value="<?php echo e(isset($clientDetail->facebook) ? $clientDetail->facebook : ''); ?>">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <!--row gst number-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gst_number"><?php echo app('translator')->getFromJson('app.gstNumber'); ?></label>
                                        <input type="text" id="gst_number" name="gst_number" class="form-control" value="<?php echo e(isset($clientDetail->gst_number) ? $clientDetail->gst_number : ''); ?>">
                                    </div>
                                </div>
                            </div>
                            <!--/row-->

                            <div class="row">
                                <?php if(isset($fields)): ?>
                                    <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-6">
                                            <label><?php echo e(ucfirst($field->label)); ?></label>
                                            <div class="form-group">
                                                <?php if( $field->type == 'text'): ?>
                                                    <input type="text" name="custom_fields_data[<?php echo e($field->name.'_'.$field->id); ?>]" class="form-control" placeholder="<?php echo e($field->label); ?>" value="<?php echo e(isset($clientDetail->custom_fields_data['field_'.$field->id]) ? $clientDetail->custom_fields_data['field_'.$field->id] : ''); ?>">
                                                <?php elseif($field->type == 'password'): ?>
                                                    <input type="password" name="custom_fields_data[<?php echo e($field->name.'_'.$field->id); ?>]" class="form-control" placeholder="<?php echo e($field->label); ?>" value="<?php echo e(isset($clientDetail->custom_fields_data['field_'.$field->id]) ? $clientDetail->custom_fields_data['field_'.$field->id] : ''); ?>">
                                                <?php elseif($field->type == 'number'): ?>
                                                    <input type="number" name="custom_fields_data[<?php echo e($field->name.'_'.$field->id); ?>]" class="form-control" placeholder="<?php echo e($field->label); ?>" value="<?php echo e(isset($clientDetail->custom_fields_data['field_'.$field->id]) ? $clientDetail->custom_fields_data['field_'.$field->id] : ''); ?>">

                                                <?php elseif($field->type == 'textarea'): ?>
                                                    <textarea name="custom_fields_data[<?php echo e($field->name.'_'.$field->id); ?>]" class="form-control" id="<?php echo e($field->name); ?>" cols="3"><?php echo e(isset($clientDetail->custom_fields_data['field_'.$field->id]) ? $clientDetail->custom_fields_data['field_'.$field->id] : ''); ?></textarea>

                                                <?php elseif($field->type == 'radio'): ?>
                                                    <div class="radio-list">
                                                        <?php $__currentLoopData = $field->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <label class="radio-inline <?php if($key == 0): ?> p-0 <?php endif; ?>">
                                                                <div class="radio radio-info">
                                                                    <input type="radio" name="custom_fields_data[<?php echo e($field->name.'_'.$field->id); ?>]" id="optionsRadios<?php echo e($key.$field->id); ?>" value="<?php echo e($value); ?>" <?php if(isset($clientDetail) && $clientDetail->custom_fields_data['field_'.$field->id] == $value): ?> checked <?php elseif($key==0): ?> checked <?php endif; ?>>>
                                                                    <label for="optionsRadios<?php echo e($key.$field->id); ?>"><?php echo e($value); ?></label>
                                                                </div>
                                                            </label>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                <?php elseif($field->type == 'select'): ?>
                                                    <?php echo Form::select('custom_fields_data['.$field->name.'_'.$field->id.']',
                                                            $field->values,
                                                             isset($clientDetail)?$clientDetail->custom_fields_data['field_'.$field->id]:'',['class' => 'form-control gender']); ?>


                                                <?php elseif($field->type == 'checkbox'): ?>
                                                    <div class="mt-checkbox-inline">
                                                        <?php $__currentLoopData = $field->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <label class="mt-checkbox mt-checkbox-outline">
                                                                <input name="custom_fields_data[<?php echo e($field->name.'_'.$field->id); ?>][]" type="checkbox" value="<?php echo e($key); ?>"> <?php echo e($value); ?>

                                                                <span></span>
                                                            </label>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                <?php elseif($field->type == 'date'): ?>
                                                    <input type="text" class="form-control date-picker" size="16" name="custom_fields_data[<?php echo e($field->name.'_'.$field->id); ?>]"
                                                           value="<?php echo e(isset($employeeDetail->custom_fields_data['field_'.$field->id])?Carbon\Carbon::createFromFormat('m/d/Y', $employeeDetail->custom_fields_data['field_'.$field->id])->format('m/d/Y'):Carbon\Carbon::now()->format('m/d/Y')); ?>">
                                                <?php endif; ?>
                                                <div class="form-control-focus"> </div>
                                                <span class="help-block"></span>

                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label><?php echo app('translator')->getFromJson('app.note'); ?></label>
                                    <div class="form-group">
                                        <textarea name="note" id="note" class="form-control" rows="5"><?php echo e(isset($clientDetail->note) ? $clientDetail->note : ''); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->getFromJson('app.login'); ?></label>
                                        <select name="login" id="login" class="form-control">
                                            <option <?php if($userDetail->login == 'enable'): ?> selected <?php endif; ?> value="enable"><?php echo app('translator')->getFromJson('app.enable'); ?></option>
                                            <option <?php if($userDetail->login == 'disable'): ?> selected <?php endif; ?> value="disable"><?php echo app('translator')->getFromJson('app.disable'); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-actions">
                            <button type="submit" id="save-form" class="btn btn-success"> <i class="fa fa-check"></i> <?php echo app('translator')->getFromJson('app.update'); ?></button>
                            <a href="<?php echo e(route('admin.clients.index')); ?>" class="btn btn-default"><?php echo app('translator')->getFromJson('app.back'); ?></a>
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
            url: '<?php echo e(route('admin.clients.update', [$userDetail->id])); ?>',
            container: '#updateClient',
            type: "POST",
            redirect: true,
            data: $('#updateClient').serialize()
        })
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>