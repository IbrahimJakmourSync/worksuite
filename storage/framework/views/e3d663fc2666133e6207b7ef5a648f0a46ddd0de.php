 
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
            <li><a href="<?php echo e(route('admin.all-tasks.index')); ?>"><?php echo e($pageTitle); ?></a></li>
            <li class="active"><?php echo app('translator')->getFromJson('app.edit'); ?></li>
        </ol>
    </div>
    <!-- /.breadcrumb -->
</div>
<?php $__env->stopSection(); ?>
 <?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/summernote/dist/summernote.css')); ?>">
<style>
    .panel-black .panel-heading a,
    .panel-inverse .panel-heading a {
        color: unset!important;
    }
</style>

<?php $__env->stopPush(); ?> 
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-8">

        <div class="panel panel-inverse">
            <div class="panel-heading"> <?php echo app('translator')->getFromJson('modules.tasks.updateTask'); ?></div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <?php echo Form::open(['id'=>'updateTask','class'=>'ajax-form','method'=>'PUT']); ?>


                    <div class="form-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"><?php echo app('translator')->getFromJson('app.project'); ?></label>
                                    <select class="select2 form-control" data-placeholder="<?php echo app('translator')->getFromJson(" app.selectProject "); ?>" id="project_id" name="project_id">
                                            <option value=""></option>
                                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                        <?php if($project->id == $task->project_id): ?> selected <?php endif; ?>
                                                        value="<?php echo e($project->id); ?>"><?php echo e(ucwords($project->project_name)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label class="control-label"><?php echo app('translator')->getFromJson('modules.tasks.taskCategory'); ?> <a
                                                        href="javascript:;" id="createTaskCategory"
                                                        class="btn btn-sm btn-outline btn-success"><i
                                                            class="fa fa-plus"></i> <?php echo app('translator')->getFromJson('modules.taskCategory.addTaskCategory'); ?></a>
                                            </label>
                                    <select class="selectpicker form-control" name="category_id" id="category_id" data-style="form-control">
                                                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <option value="<?php echo e($category->id); ?>"
                                                            <?php if($task->task_category_id == $category->id): ?>
                                                            selected
                                                            <?php endif; ?>
                                                    ><?php echo e(ucwords($category->category_name)); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <option value=""><?php echo app('translator')->getFromJson('messages.noTaskCategoryAdded'); ?></option>
                                                <?php endif; ?>
                                            </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"><?php echo app('translator')->getFromJson('app.title'); ?></label>
                                    <input type="text" id="heading" name="heading" class="form-control" value="<?php echo e($task->heading); ?>">
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"><?php echo app('translator')->getFromJson('app.description'); ?></label>
                                    <textarea id="description" name="description" class="form-control summernote"><?php echo e($task->description); ?></textarea>
                                </div>
                            </div>
                            <!--/span-->

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"><?php echo app('translator')->getFromJson('app.startDate'); ?></label>
                                    <input type="text" name="start_date" id="start_date2" class="form-control" autocomplete="off" value="<?php if($task->start_date != '-0001-11-30 00:00:00' && $task->start_date != null): ?> <?php echo e($task->start_date->format('m/d/Y')); ?> <?php endif; ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"><?php echo app('translator')->getFromJson('app.dueDate'); ?></label>
                                    <input type="text" name="due_date" id="due_date2" class="form-control" autocomplete="off" value="<?php if($task->due_date != '-0001-11-30 00:00:00'): ?> <?php echo e($task->due_date->format('m/d/Y')); ?> <?php endif; ?>">
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"><?php echo app('translator')->getFromJson('modules.tasks.assignTo'); ?></label>
                                    <select class="select2 form-control" data-placeholder="<?php echo app('translator')->getFromJson('modules.tasks.chooseAssignee'); ?>" name="user_id" id="user_id">
                                            <?php if(is_null($task->project_id)): ?>
                                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if($task->user_id == $employee->id): ?> selected <?php endif; ?>
                                                    value="<?php echo e($employee->id); ?>"><?php echo e(ucwords($employee->name)); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <?php $__currentLoopData = $task->project->members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if($task->user_id == $member->user->id): ?> selected <?php endif; ?>
                                                    value="<?php echo e($member->user->id); ?>"><?php echo e($member->user->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?php echo app('translator')->getFromJson('app.status'); ?></label>
                                    <select name="status" id="status" class="form-control">
                                        <?php $__currentLoopData = $taskBoardColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taskBoardColumn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($task->board_column_id == $taskBoardColumn->id): ?> selected <?php endif; ?> value="<?php echo e($taskBoardColumn->id); ?>"><?php echo e($taskBoardColumn->column_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                            <!--/span-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"><?php echo app('translator')->getFromJson('modules.tasks.priority'); ?></label>

                                    <div class="radio radio-danger">
                                        <input type="radio" name="priority" id="radio13" <?php if($task->priority == 'high'): ?> checked
                                        <?php endif; ?> value="high">
                                        <label for="radio13" class="text-danger">
                                                <?php echo app('translator')->getFromJson('modules.tasks.high'); ?> </label>
                                    </div>
                                    <div class="radio radio-warning">
                                        <input type="radio" name="priority" <?php if($task->priority == 'medium'): ?> checked <?php endif; ?>
                                        id="radio14" value="medium">
                                        <label for="radio14" class="text-warning">
                                                <?php echo app('translator')->getFromJson('modules.tasks.medium'); ?> </label>
                                    </div>
                                    <div class="radio radio-success">
                                        <input type="radio" name="priority" id="radio15" <?php if($task->priority == 'low'): ?> checked
                                        <?php endif; ?> value="low">
                                        <label for="radio15" class="text-success">
                                                <?php echo app('translator')->getFromJson('modules.tasks.low'); ?> </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--/row-->

                    </div>
                    <div class="form-actions">
                        <button type="button" id="update-task" class="btn btn-success"><i class="fa fa-check"></i> <?php echo app('translator')->getFromJson('app.save'); ?></button>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- .row -->


<div class="modal fade bs-modal-md in" id="taskCategoryModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
<script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/summernote/dist/summernote.min.js')); ?>"></script>

<script>
    //    update task
    $('#update-task').click(function () {

        var status = '<?php echo e($task->board_column->slug); ?>';
        var currentStatus =  $('#status').val();

        if(status == 'incomplete' && currentStatus == 'completed'){

            $.easyAjax({
                url: '<?php echo e(route('admin.tasks.checkTask', [$task->id])); ?>',
                type: "GET",
                data: {},
                success: function (data) {
                    console.log(data.taskCount);
                    if(data.taskCount > 0){
                        swal({
                            title: "Are you sure?",
                            text: "There is a incomplete sub-task in this task do you want to mark complete!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, complete it!",
                            cancelButtonText: "No, cancel please!",
                            closeOnConfirm: true,
                            closeOnCancel: true
                        }, function (isConfirm) {
                            if (isConfirm) {
                                updateTask();
                            }
                        });
                    }
                    else{
                        updateTask();
                    }

                }
            });
        }
        else{
            updateTask();
        }

    });

    function updateTask(){
        $.easyAjax({
            url: '<?php echo e(route('admin.all-tasks.update', [$task->id])); ?>',
            container: '#updateTask',
            type: "POST",
            data: $('#updateTask').serialize()
        })
    }

    jQuery('#due_date2, #start_date2').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    $(".select2").select2({
        formatNoMatches: function () {
            return "<?php echo e(__('messages.noRecordFound')); ?>";
        }
    });

    $('.summernote').summernote({
        height: 200,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false                 // set focus to editable area after initializing summernote
    });

</script>
<script>
    $('#createTaskCategory').click(function(){
        var url = '<?php echo e(route('admin.taskCategory.create-cat')); ?>';
        $('#modelHeading').html("<?php echo app('translator')->getFromJson('modules.taskCategory.manageTaskCategory'); ?>");
        $.ajaxModal('#taskCategoryModal', url);
    })

</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>