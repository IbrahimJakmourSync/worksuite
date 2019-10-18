<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title"><?php echo app('translator')->getFromJson('modules.roles.addRole'); ?></h4>
</div>
<div class="modal-body">
    <div class="portlet-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Role</th>
                    <th><?php echo app('translator')->getFromJson('app.action'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr id="role-<?php echo e($role->id); ?>">
                        <td><?php echo e($key+1); ?></td>
                        <td>
                            <?php if(!in_array($role->name, ['admin','employee' ,'client'])): ?>
                                <a href="#"  data-name="name"  data-url="<?php echo e(route('admin.role-permission.update', $role->id)); ?>" class="roleEditable" data-type="text" data-pk="<?php echo e($role->id); ?>" data-value="<?php echo e(ucfirst($role->name)); ?>" ></a>
                            <?php else: ?>
                                <?php echo e(__('app.'.$role->name)); ?>

                            <?php endif; ?>
                        </td>
                          <td>
                              <?php if($role->id > 3): ?>
                                  <a href="javascript:;"  data-role-id="<?php echo e($role->id); ?>" class="btn btn-sm btn-danger btn-rounded delete-category"><?php echo app('translator')->getFromJson("app.remove"); ?></a>
                              <?php else: ?>
                                  <span class="text-danger"><?php echo app('translator')->getFromJson('messages.defaultRoleCantDelete'); ?></span>
                              <?php endif; ?>
                          </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="3"><?php echo app('translator')->getFromJson('messages.noRoleFound'); ?></td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        <hr>
        <?php echo Form::open(['id'=>'createProjectCategory','class'=>'ajax-form','method'=>'POST', 'onSubmit'=>'return false']); ?>

        <div class="form-body">
            <div class="row">
                <div class="col-xs-12 ">
                    <div class="form-group">
                        <label><?php echo app('translator')->getFromJson('modules.permission.roleName'); ?></label>
                        <input type="text" name="name" id="name" class="form-control">
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
<script src="<?php echo e(asset('plugins/bower_components/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js')); ?>"></script>

<script>
    $(function() {
        $('.roleEditable').editable({
            send: 'always',
            type: 'text',
            emptytext: 'Enter Role',
            params: {
                '_method': 'PUT',
                '_token':  '<?php echo e(csrf_token()); ?>'
            },
            success: function(response) {
                if(response.status == 'success'){
                    $.showToastr(response.message, 'success','')
                }
            },
            validate: function(value) {
                if ($.trim(value) == '') return 'This field is required';
            }
        });
    });
    $('.delete-category').click(function () {
        var roleId = $(this).data('role-id');
        var url = "<?php echo e(route('admin.role-permission.deleteRole')); ?>";

        var token = "<?php echo e(csrf_token()); ?>";

        $.easyAjax({
            type: 'POST',
            url: url,
            data: {'_token': token, 'roleId': roleId},
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
            url: '<?php echo e(route('admin.role-permission.storeRole')); ?>',
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