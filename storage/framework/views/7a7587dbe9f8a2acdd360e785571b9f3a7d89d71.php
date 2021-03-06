 
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
            <li><a href="<?php echo e(route('admin.employees.index')); ?>"><?php echo e($pageTitle); ?></a></li>
            <li class="active"><?php echo app('translator')->getFromJson('app.edit'); ?></li>
        </ol>
    </div>
    <!-- /.breadcrumb -->
</div>
<?php $__env->stopSection(); ?>
 <?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/tagify-master/dist/tagify.css')); ?>"> 
<?php $__env->stopPush(); ?> 
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-inverse">
            <div class="panel-heading"> <?php echo app('translator')->getFromJson('modules.employees.updateTitle'); ?></div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <?php echo Form::open(['id'=>'updateEmployee','class'=>'ajax-form','method'=>'PUT']); ?>

                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label><?php echo app('translator')->getFromJson('modules.employees.employeeName'); ?></label>
                                    <input type="text" name="name" id="name" class="form-control" value="<?php echo e($userDetail->name); ?>" autocomplete="nope">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo app('translator')->getFromJson('modules.employees.employeeEmail'); ?></label>
                                    <input type="email" name="email" id="email" class="form-control" value="<?php echo e($userDetail->email); ?>" autocomplete="nope">
                                    <span class="help-block">Employee will login using this email.</span>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo app('translator')->getFromJson('modules.employees.employeePassword'); ?></label>
                                    <input type="password" style="display: none">
                                    <input type="password" name="password" id="password" class="form-control" autocomplete="nope">
                                    <span class="help-block"> <?php echo app('translator')->getFromJson('modules.employees.updatePasswordNote'); ?></span>
                                </div>
                            </div>
                            <!--/span-->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo app('translator')->getFromJson('app.mobile'); ?></label>
                                    <input type="tel" name="mobile" id="mobile" class="form-control" value="<?php echo e($userDetail->mobile); ?>" autocomplete="nope">
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->

                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label"><i
                                                    class="fa fa-slack"></i> <?php echo app('translator')->getFromJson('modules.employees.slackUsername'); ?>
                                        </label>
                                    <div class="input-group"><span class="input-group-addon">@</span>
                                        <input type="text" id="slack_username" name="slack_username" class="form-control" autocomplete="nope" value="<?php echo e(isset($employeeDetail->slack_username) ? $employeeDetail->slack_username : ''); ?>">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><?php echo app('translator')->getFromJson('modules.employees.joiningDate'); ?></label>
                                    <input type="text" name="joining_date" id="joining_date" <?php if($employeeDetail): ?> value="<?php echo e($employeeDetail->joining_date->format('m/d/Y')); ?>"
                                        <?php endif; ?> class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><?php echo app('translator')->getFromJson('modules.employees.lastDate'); ?></label>
                                    <input type="text" autocomplete="off" name="last_date" id="end_date" <?php if($employeeDetail): ?> value="<?php if($employeeDetail->last_date): ?> <?php echo e($employeeDetail->last_date->format('m/d/Y')); ?> <?php endif; ?>"
                                        <?php endif; ?> class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><?php echo app('translator')->getFromJson('modules.employees.gender'); ?></label>
                                    <select name="gender" id="gender" class="form-control">
                                            <option <?php if($userDetail->gender == 'male'): ?> selected
                                                    <?php endif; ?> value="male"><?php echo app('translator')->getFromJson('app.male'); ?></option>
                                            <option <?php if($userDetail->gender == 'female'): ?> selected
                                                    <?php endif; ?> value="female"><?php echo app('translator')->getFromJson('app.female'); ?></option>
                                            <option <?php if($userDetail->gender == 'others'): ?> selected
                                                    <?php endif; ?> value="others"><?php echo app('translator')->getFromJson('app.others'); ?></option>
                                        </select>
                                </div>
                            </div>

                        </div>
                        <!--/row-->

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label class="control-label"><?php echo app('translator')->getFromJson('app.address'); ?></label>
                                    <textarea name="address" id="address" rows="5" class="form-control"><?php echo e(isset($employeeDetail->address) ? $employeeDetail->address : ''); ?></textarea>
                                </div>
                            </div>

                        </div>
                        <!--/span-->
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label><?php echo app('translator')->getFromJson('app.skills'); ?></label>
                                    <input name='tags' placeholder='<?php echo app('translator')->getFromJson(' app.skills '); ?>' value='<?php echo e(implode(' , ', $userDetail->skills())); ?>'>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo app('translator')->getFromJson('modules.employees.jobTitle'); ?></label>
                                    <input type="text" name="job_title" id="job_title" class="form-control" value="<?php echo e(isset($employeeDetail->job_title) ? $employeeDetail->job_title : ''); ?>">
                                </div>
                            </div>
                            <!--/span-->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo app('translator')->getFromJson('modules.employees.hourlyRate'); ?></label>
                                    <input type="text" name="hourly_rate" id="hourly_rate" class="form-control" value="<?php echo e(isset($employeeDetail->hourly_rate) ? $employeeDetail->hourly_rate : ''); ?>">
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

                        <div class="row">
                            <div class="col-md-6">
                                <label><?php echo app('translator')->getFromJson('modules.profile.profilePicture'); ?></label>
                                <div class="form-group">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                            <?php if(is_null($userDetail->image)): ?>
                                            <img src="https://placeholdit.imgix.net/~text?txtsize=25&txt=<?php echo app('translator')->getFromJson('modules.profile.uploadPicture'); ?>&w=200&h=150" alt="" />                                            <?php else: ?>
                                            <img src="<?php echo e(asset('user-uploads/avatar/'.$userDetail->image)); ?>" alt="" /> <?php endif; ?>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                        <div>
                                            <span class="btn btn-info btn-file">
                                    <span class="fileinput-new"> <?php echo app('translator')->getFromJson('app.selectImage'); ?> </span>
                                            <span class="fileinput-exists"> <?php echo app('translator')->getFromJson('app.change'); ?> </span>
                                            <input type="file" name="image" id="image"> </span>
                                            <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> <?php echo app('translator')->getFromJson('app.remove'); ?> </a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!--/span-->

                        <div class="row">
                            <?php if(isset($fields)): ?> <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6">
                                <label><?php echo e(ucfirst($field->label)); ?></label>
                                <div class="form-group">
                                    <?php if( $field->type == 'text'): ?>
                                    <input type="text" name="custom_fields_data[<?php echo e($field->name.'_'.$field->id); ?>]" class="form-control" placeholder="<?php echo e($field->label); ?>"
                                        value="<?php echo e(isset($employeeDetail->custom_fields_data['field_'.$field->id]) ? $employeeDetail->custom_fields_data['field_'.$field->id] : ''); ?>">                                    <?php elseif($field->type == 'password'): ?>
                                    <input type="password" name="custom_fields_data[<?php echo e($field->name.'_'.$field->id); ?>]" class="form-control" placeholder="<?php echo e($field->label); ?>"
                                        value="<?php echo e(isset($employeeDetail->custom_fields_data['field_'.$field->id]) ? $employeeDetail->custom_fields_data['field_'.$field->id] : ''); ?>">                                    <?php elseif($field->type == 'number'): ?>
                                    <input type="number" name="custom_fields_data[<?php echo e($field->name.'_'.$field->id); ?>]" class="form-control" placeholder="<?php echo e($field->label); ?>"
                                        value="<?php echo e(isset($employeeDetail->custom_fields_data['field_'.$field->id]) ? $employeeDetail->custom_fields_data['field_'.$field->id] : ''); ?>">                                    <?php elseif($field->type == 'textarea'): ?>
                                    <textarea name="custom_fields_data[<?php echo e($field->name.'_'.$field->id); ?>]" class="form-control" id="<?php echo e($field->name); ?>" cols="3"><?php echo e(isset($employeeDetail->custom_fields_data['field_'.$field->id]) ? $employeeDetail->custom_fields_data['field_'.$field->id] : ''); ?></textarea>                                    <?php elseif($field->type == 'radio'): ?>
                                    <div class="radio-list">
                                        <?php $__currentLoopData = $field->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label class="radio-inline <?php if($key == 0): ?> p-0 <?php endif; ?>">
                                                                <div class="radio radio-info">
                                                                    <input type="radio"
                                                                           name="custom_fields_data[<?php echo e($field->name.'_'.$field->id); ?>]"
                                                                           id="optionsRadios<?php echo e($key.$field->id); ?>"
                                                                           value="<?php echo e($value); ?>"
                                                                           <?php if(isset($employeeDetail) && $employeeDetail->custom_fields_data['field_'.$field->id] == $value): ?> checked
                                                                           <?php elseif($key==0): ?> checked <?php endif; ?>>>
                                                                    <label for="optionsRadios<?php echo e($key.$field->id); ?>"><?php echo e($value); ?></label>
                                    </div>
                                    </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php elseif($field->type == 'select'): ?> <?php echo Form::select('custom_fields_data['.$field->name.'_'.$field->id.']', $field->values,
                                isset($employeeDetail)?$employeeDetail->custom_fields_data['field_'.$field->id]:'',['class'
                                => 'form-control gender']); ?> <?php elseif($field->type == 'checkbox'): ?>
                                <div class="mt-checkbox-inline">
                                    <?php $__currentLoopData = $field->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="mt-checkbox mt-checkbox-outline">
                                                                <input name="custom_fields_data[<?php echo e($field->name.'_'.$field->id); ?>][]"
                                                                       type="checkbox" value="<?php echo e($key); ?>"> <?php echo e($value); ?>

                                                                <span></span>
                                                            </label> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php elseif($field->type == 'date'): ?>
                                <input type="text" class="form-control date-picker" size="16" name="custom_fields_data[<?php echo e($field->name.'_'.$field->id); ?>]"
                                    value="<?php echo e(($employeeDetail->custom_fields_data['field_'.$field->id] != '') ? \Carbon\Carbon::createFromFormat('m/d/Y', $employeeDetail->custom_fields_data['field_'.$field->id])->format('m/d/Y') : \Carbon\Carbon::now()->format('m/d/Y')); ?>">                                <?php endif; ?>
                                <div class="form-control-focus"></div>
                                <span class="help-block"></span>

                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>

                    </div>



                </div>
                <div class="form-actions">
                    <button type="submit" id="save-form" class="btn btn-success"><i
                                        class="fa fa-check"></i> <?php echo app('translator')->getFromJson('app.update'); ?></button>
                    <a href="<?php echo e(route('admin.employees.index')); ?>" class="btn btn-default"><?php echo app('translator')->getFromJson('app.back'); ?></a>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
</div>
<!-- .row -->
<?php $__env->stopSection(); ?>
 <?php $__env->startPush('footer-script'); ?>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/tagify-master/dist/tagify.js')); ?>"></script>
<script data-name="basic">
    (function(){

            var input = document.querySelector('input[name=tags]'),
                // init Tagify script on the above inputs
                tagify = new Tagify(input, {
                    whitelist : <?php echo json_encode($skills); ?>,
                    //  blacklist : [".NET", "PHP"] // <-- passed as an attribute in this demo
                });

// Chainable event listeners
            tagify.on('add', onAddTag)
                .on('remove', onRemoveTag)
                .on('input', onInput)
                .on('invalid', onInvalidTag)
                .on('click', onTagClick);

// tag added callback
            function onAddTag(e){
                tagify.off('add', onAddTag) // exmaple of removing a custom Tagify event
            }

// tag remvoed callback
            function onRemoveTag(e){
            }

// on character(s) added/removed (user is typing/deleting)
            function onInput(e){
            }

// invalid tag added callback
            function onInvalidTag(e){
            }

// invalid tag added callback
            function onTagClick(e){
            }

        })()
</script>
<script>
    $("#joining_date, .date-picker,  #end_date").datepicker({
            todayHighlight: true,
            autoclose: true
        });

        $('#save-form').click(function () {
            $.easyAjax({
                url: '<?php echo e(route('admin.employees.update', [$userDetail->id])); ?>',
                container: '#updateEmployee',
                type: "POST",
                redirect: true,
                file: (document.getElementById("image").files.length == 0) ? false : true,
                data: $('#updateEmployee').serialize()
            })
        });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>