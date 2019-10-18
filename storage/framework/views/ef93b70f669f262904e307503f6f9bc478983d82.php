<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/icheck/skins/all.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/multiselect/css/multi-select.css')); ?>">
<link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title"><?php echo app('translator')->getFromJson('modules.permission.addRoleMember'); ?></h4>
</div>
<div class="modal-body">
    <div class="portlet-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo app('translator')->getFromJson('app.name'); ?></th>
                    <th>Role</th>
                    <th><?php echo app('translator')->getFromJson('app.action'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $role->roleuser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$ruser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr id="ruser-<?php echo e($ruser->user->id); ?>">
                        <td><?php echo e($key+1); ?></td>
                        <td><?php echo e(ucwords($ruser->user->name)); ?></td>
                        <td><?php echo e(ucwords($role->name)); ?></td>
                        <td><a href="javascript:;" data-ruser-id="<?php echo e($ruser->user->id); ?>" class="btn btn-sm btn-danger btn-rounded delete-category"><?php echo app('translator')->getFromJson("app.remove"); ?></a></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="3"><?php echo app('translator')->getFromJson('messages.noRoleMemberFound'); ?></td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        <hr>
        <?php echo Form::open(['id'=>'createProjectCategory','class'=>'ajax-form','method'=>'POST']); ?>

        <?php echo Form::hidden('role_id', $role->id); ?>

        <div class="form-body">
            <div class="row">
                <div class="col-xs-12 ">
                    <div class="form-group">
                        <label><?php echo app('translator')->getFromJson('modules.permission.addMembers'); ?></label>
                        <select class="select2 m-b-10 select2-multiple " multiple="multiple"
                                data-placeholder="Choose Members" name="user_id[]">
                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($emp->id); ?>"><?php echo e(ucwords($emp->name). ' ['.$emp->email.']'); ?> <?php if($emp->id == $user->id): ?>
                                        (YOU) <?php endif; ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <button type="button" id="save-category" class="btn btn-success"> <i class="fa fa-check"></i> <?php echo app('translator')->getFromJson('app.save'); ?></button>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>

<script src="<?php echo e(asset('js/cbpFWTabs.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/multiselect/js/jquery.multi-select.js')); ?>"></script>

<script>
    $(".select2").select2({
        formatNoMatches: function () {
            return "<?php echo e(__('messages.noRecordFound')); ?>";
        }
    });

    $('.delete-category').click(function () {
        var userId = $(this).data('ruser-id');
        var roleId = '<?php echo e($role->id); ?>';
        var url = "<?php echo e(route('admin.role-permission.detachRole')); ?>";

        var token = "<?php echo e(csrf_token()); ?>";

        $.easyAjax({
            type: 'POST',
            url: url,
            data: {'_token': token, 'userId': userId, 'roleId': roleId},
            success: function (response) {
                if (response.status == "success") {
                    $.unblockUI();
//                                    swal("Deleted!", response.message, "success");
                    window.location.reload();
                }
            }
        });
    });

    $('#save-category').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.role-permission.assignRole')); ?>',
            container: '#createProjectCategory',
            type: "POST",
            data: $('#createProjectCategory').serialize(),
            success: function (response) {
                if(response.status == 'success'){
                    window.location.reload();
                }
            }
        })
    });
</script>