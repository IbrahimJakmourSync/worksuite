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
                <li class="active"><?php echo e(__($pageTitle)); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/switchery/dist/switchery.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css')); ?>">

<style>
    .mytooltip{
        z-index: 999 !important;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title"><?php echo e(__($pageTitle)); ?></h3>
                <div class="row">
                    <div class="col-md-12">
                        <a href="javascript:;" id="addRole" class="btn btn-success btn-outline  waves-effect waves-light pull-right"><i class="fa fa-gear"></i> <?php echo app('translator')->getFromJson("modules.roles.addRole"); ?></a>

                    </div>

                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-12 b-all m-t-10">
                            <div class="row">
                                <div class="col-md-4 text-center p-10 bg-inverse ">
                                    <h5 class="text-white"><strong><?php echo e(ucwords($role->display_name)); ?></strong></h5>
                                </div>
                                <div class="col-md-4 text-center bg-inverse role-members">
                                    <button class="btn btn-xs btn-danger btn-rounded show-members" data-role-id="<?php echo e($role->id); ?>"><i class="fa fa-users"></i> <?php echo e(count($role->roleuser)); ?> Member(s)</button>
                                </div>
                                <div class="col-md-4 p-10 bg-inverse" style="padding-bottom: 11px !important;">
                                    <button class="btn btn-default btn-rounded pull-right toggle-permission" data-role-id="<?php echo e($role->id); ?>"><i class="fa fa-key"></i> Permissions</button>
                                </div>


                                <div class="col-md-12 b-t permission-section" style="display: none;" id="role-permission-<?php echo e($role->id); ?>" >
                                    <table class="table ">
                                        <thead>
                                        <tr class="bg-white">
                                            <th>
                                                <div class="form-group">
                                                    <div class="checkbox checkbox-info  col-md-10">
                                                        <input id="select_all_permission_<?php echo e($role->id); ?>"
                                                               <?php if(count($role->permissions) == $totalPermissions): ?> checked <?php endif; ?>
                                                               class="select_all_permission" value="<?php echo e($role->id); ?>" type="checkbox">
                                                        <label for="select_all_permission_<?php echo e($role->id); ?>"><?php echo app('translator')->getFromJson('modules.permission.selectAll'); ?></label>
                                                    </div>
                                                </div>
                                            </th>
                                            <th><?php echo app('translator')->getFromJson('app.add'); ?></th>
                                            <th><?php echo app('translator')->getFromJson('app.view'); ?></th>
                                            <th><?php echo app('translator')->getFromJson('app.update'); ?></th>
                                            <th><?php echo app('translator')->getFromJson('app.delete'); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $modulesData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $moduleData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($moduleData->module_name != 'messages'): ?>
                                                    <tr>
                                                        <td><?php echo app('translator')->getFromJson('modules.module.'.$moduleData->module_name); ?>

                                                        <?php if($moduleData->description != ''): ?>
                                                            <a class="mytooltip" href="javascript:void(0)"> <i class="fa fa-info-circle"></i><span class="tooltip-content5"><span class="tooltip-text3"><span class="tooltip-inner2"><?php echo e($moduleData->description); ?></span></span></span></a>
                                                        <?php endif; ?>
                                                        </td>

                                                        <?php $__currentLoopData = $moduleData->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <td>
                                                                <div class="switchery-demo">
                                                                      <input type="checkbox"
                                                                             <?php if($role->hasPermission([$permission->name])): ?>
                                                                                     checked
                                                                             <?php endif; ?>
                                                                             class="js-switch assign-role-permission permission_<?php echo e($role->id); ?>" data-size="small" data-color="#00c292" data-permission-id="<?php echo e($permission->id); ?>" data-role-id="<?php echo e($role->id); ?>" />
                                                                </div>
                                                            </td>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        <?php if(count($moduleData->permissions) < 4): ?>
                                                            <?php for($i=1; $i<=(4-count($moduleData->permissions)); $i++): ?>
                                                                <td>&nbsp;</td>
                                                            <?php endfor; ?>
                                                        <?php endif; ?>

                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    </div>
    <!-- .row -->

    
    <div class="modal fade bs-modal-md in" id="projectCategoryModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" id="modal-data-application">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading"></span>
                </div>
                <div class="modal-body">
                    Loading...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn blue">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->.
    </div>
    

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script src="<?php echo e(asset('plugins/bower_components/switchery/dist/switchery.min.js')); ?>"></script>
<script>
    $(function () {
        $('.assign-role-permission').on('change', assignRollPermission);
    });

    $('.toggle-permission').click(function () {
        var roleId = $(this).data('role-id');
        $('#role-permission-'+roleId).toggle();
    })


    // Switchery
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    $('.js-switch').each(function() {
        new Switchery($(this)[0], $(this).data());

    });

    // Initialize multiple switches
    var animating = false;
    var masteranimate = false;

//    if (Array.prototype.forEach) {
//        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
//        elems.forEach(function() {
//            var switcherys = new Switchery($(this)[0], $(this).data());
//        });
//    }
//    else {
//        var elems = document.querySelectorAll('.js-switch');
//        for (var i = 0; i < elems.length; i++) {
//            var switcherys = new Switchery(elems[i]);
//        }
//    }

    var assignRollPermission = function () {

        var roleId = $(this).data('role-id');
        var permissionId = $(this).data('permission-id');

        if($(this).is(':checked'))
            var assignPermission = 'yes';
        else
            var assignPermission = 'no';

        var url = '<?php echo e(route('admin.role-permission.store')); ?>';

        $.easyAjax({
            url: url,
            type: "POST",
            data: { 'roleId': roleId, 'permissionId': permissionId, 'assignPermission': assignPermission, '_token': '<?php echo e(csrf_token()); ?>' }
        })
    };

    $('.assign-role-permission').change(assignRollPermission());

    $('.select_all_permission').change(function () {
        if($(this).is(':checked')){
            var roleId = $(this).val();
            var url = '<?php echo e(route('admin.role-permission.assignAllPermission')); ?>';

            $.easyAjax({
                url: url,
                type: "POST",
                data: { 'roleId': roleId, '_token': '<?php echo e(csrf_token()); ?>' },
                success: function () {
                    masteranimate = true;
                    if (!animating){
                        var masterStatus = true;
                        $('.assign-role-permission').off('change');
                        $('input.permission_'+roleId).each(function(index){
                            var switchStatus = $('input.permission_'+roleId)[index].checked;
                            if(switchStatus != masterStatus){

                                $(this).trigger('click');


                            }
                            // $('.assign-role-permission').on('change');
                        });
                        $('.assign-role-permission').on('change', assignRollPermission);
                    }
                    masteranimate = false;
                }
            })
        }
        else{
            var roleId = $(this).val();
            var url = '<?php echo e(route('admin.role-permission.removeAllPermission')); ?>';

            $.easyAjax({
                url: url,
                type: "POST",
                data: { 'roleId': roleId, '_token': '<?php echo e(csrf_token()); ?>' },
                success: function () {
                    masteranimate = true;
                    if (!animating){
                        var masterStatus = false;
                        $('.assign-role-permission').off('change');
                        $('input.permission_'+roleId).each(function(index){
                            var switchStatus = $('input.permission_'+roleId)[index].checked;
                            if(switchStatus != masterStatus){
                                $(this).trigger('click');
                            }
                        });
                        $('.assign-role-permission').on('change', assignRollPermission);
                    }
                    masteranimate = false;
                }
            })
        }
    })

    $('.show-members').click(function () {
        var id = $(this).data('role-id');
        var url = '<?php echo e(route('admin.role-permission.showMembers', ':id')); ?>';
        url = url.replace(':id', id);

        $('#modelHeading').html('Role Members');
        $.ajaxModal('#projectCategoryModal', url);
    })

    $('#addRole').click(function () {
        var url = '<?php echo e(route('admin.role-permission.create')); ?>';

        $('#modelHeading').html('Role Members');
        $.ajaxModal('#projectCategoryModal', url);
    })

</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>