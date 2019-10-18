<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e(__($pageTitle)); ?> #<?php echo e($project->id); ?> - <span class="font-bold"><?php echo e(ucwords($project->project_name)); ?></span></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-6 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo app('translator')->getFromJson('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('admin.projects.index')); ?>"><?php echo e(__($pageTitle)); ?></a></li>
                <li class="active"><?php echo app('translator')->getFromJson('app.menu.tasks'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/icheck/skins/all.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/multiselect/css/multi-select.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/summernote/dist/summernote.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">

            <section>
                <div class="sttabs tabs-style-line">
                    <div class="white-box">

                        <nav>
                            <ul>
                                <li ><a href="<?php echo e(route('admin.projects.show', $project->id)); ?>"><span><?php echo app('translator')->getFromJson('modules.projects.overview'); ?></span></a>
                                </li>

                                <?php if(in_array('employees',$modules)): ?>
                                <li><a href="<?php echo e(route('admin.project-members.show', $project->id)); ?>"><span><?php echo app('translator')->getFromJson('modules.projects.members'); ?></span></a></li>
                                <?php endif; ?>

                                <li class="tab-current"><a href="<?php echo e(route('admin.tasks.show', $project->id)); ?>"><span><?php echo app('translator')->getFromJson('app.menu.tasks'); ?></span></a></li>
                                <li><a href="<?php echo e(route('admin.files.show', $project->id)); ?>"><span><?php echo app('translator')->getFromJson('modules.projects.files'); ?></span></a>
                                </li>

                                <?php if(in_array('invoices',$modules)): ?>
                                <li><a href="<?php echo e(route('admin.invoices.show', $project->id)); ?>"><span><?php echo app('translator')->getFromJson('app.menu.invoices'); ?></span></a></li>
                                <?php endif; ?>

                                <?php if(in_array('timelogs',$modules)): ?>
                                <li><a href="<?php echo e(route('admin.time-logs.show', $project->id)); ?>"><span><?php echo app('translator')->getFromJson('app.menu.timeLogs'); ?></span></a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="content-wrap">
                        <section id="section-line-3" class="show">
                            <div class="row">
                                <div class="col-md-12" id="task-list-panel">
                                    <div class="white-box">
                                        <h2><?php echo app('translator')->getFromJson('app.menu.tasks'); ?></h2>

                                        <div class="row m-b-10">
                                            <div class="col-md-5">
                                                <a href="javascript:;" id="show-new-task-panel"
                                                   class="btn btn-success btn-outline"><i class="fa fa-plus"></i> <?php echo app('translator')->getFromJson('modules.tasks.newTask'); ?></a>
                                            </div>
                                        </div>

                                        <div class="row m-b-10">
                                            <div class="col-md-5">
                                                <div class="checkbox checkbox-info">
                                                    <input type="checkbox" id="hide-completed-tasks">
                                                    <label for="hide-completed-tasks"><?php echo app('translator')->getFromJson('app.hideCompletedTasks'); ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row m-b-10">
                                            <div class="col-md-5">
                                                <select class="selectpicker sort-task-style" data-style="form-control" id="sort-task" data-project-id="<?php echo e($project->id); ?>">
                                                    <option value="id"><?php echo app('translator')->getFromJson('modules.tasks.lastCreated'); ?></option>
                                                    <option value="due_date"><?php echo app('translator')->getFromJson('modules.tasks.dueSoon'); ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <ul class="list-group">
                                            <?php $__currentLoopData = $project->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="list-group-item <?php if($task->board_column->slug == 'completed'): ?> task-completed <?php endif; ?>">
                                                    <div class="row">
                                                        <div class="checkbox checkbox-success checkbox-circle task-checkbox col-md-10">
                                                            <input class="task-check" data-task-id="<?php echo e($task->id); ?>" id="checkbox<?php echo e($task->id); ?>" type="checkbox"
                                                                   <?php if($task->board_column->slug == 'completed'): ?> checked <?php endif; ?>>
                                                            <label for="checkbox<?php echo e($task->id); ?>">&nbsp;</label>
                                                            <a href="javascript:;" class="text-muted edit-task"
                                                               data-task-id="<?php echo e($task->id); ?>"><?php echo e(ucfirst($task->heading)); ?></a>
                                                        </div>
                                                        <div class="col-md-2 text-right">
                                                            <span class="<?php if($task->due_date->isPast()): ?> text-danger <?php else: ?> text-success <?php endif; ?> m-r-10"><?php echo e($task->due_date->format('d M')); ?></span>
                                                            <?php echo ($task->user->image) ? '<img data-toggle="tooltip" data-original-title="' . ucwords($task->user->name) . '" src="' . asset('user-uploads/avatar/' . $task->user->image) . '"
                        alt="user" class="img-circle" height="35"> ' : '<img data-toggle="tooltip" data-original-title="' . ucwords($task->user->name) . '" src="' . asset('default-profile-2.png') . '"
                        alt="user" class="img-circle" height="35"> '; ?>

                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-6 hide" id="new-task-panel">
                                    <div class="panel panel-default">
                                        <div class="panel-heading "><i class="ti-plus"></i> New Task
                                            <div class="panel-action">
                                                <a href="javascript:;" id="hide-new-task-panel"><i class="ti-close"></i></a>
                                            </div>
                                        </div>
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body">
                                                <?php echo Form::open(['id'=>'createTask','class'=>'ajax-form','method'=>'POST']); ?>


                                                <?php echo Form::hidden('project_id', $project->id); ?>


                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label"><?php echo app('translator')->getFromJson('app.title'); ?></label>
                                                                <input type="text" id="heading" name="heading"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label"><?php echo app('translator')->getFromJson('app.description'); ?></label>
                                                                <textarea id="description" name="description"
                                                                          class="form-control summernote"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label"><?php echo app('translator')->getFromJson('modules.projects.startDate'); ?></label>
                                                                <input type="text" name="start_date" id="start_date" class="form-control" autocomplete="off" value="">
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label"><?php echo app('translator')->getFromJson('app.dueDate'); ?></label>
                                                                <input type="text" name="due_date" id="due_date"
                                                                       autocomplete="off" class="form-control">
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-12">
                                                            <label class="control-label"><?php echo app('translator')->getFromJson('modules.tasks.assignTo'); ?></label>
                                                            <div class="form-group">
                                                                <select class="selectpicker" name="user_id" id="user_id"
                                                                        data-style="form-control">
                                                                    <option value=""><?php echo app('translator')->getFromJson('modules.tasks.chooseAssignee'); ?></option>
                                                                    <?php $__empty_1 = true; $__currentLoopData = $project->members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                        <option value="<?php echo e($member->user->id); ?>"><?php echo e($member->user->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                        <option value="">Add project member</option>
                                                                    <?php endif; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label"><?php echo app('translator')->getFromJson('modules.tasks.taskCategory'); ?> <a href="javascript:;"
                                                                                                                                    id="createTaskCategory"
                                                                                                                                    class="btn btn-sm btn-outline btn-success"><i
                                                                                class="fa fa-plus"></i> <?php echo app('translator')->getFromJson('modules.taskCategory.addTaskCategory'); ?></a>
                                                                </label>
                                                                <select class="selectpicker form-control" name="category_id" id="category_id"
                                                                        data-style="form-control">
                                                                    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                        <option value="<?php echo e($category->id); ?>"><?php echo e(ucwords($category->category_name)); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                        <option value=""><?php echo app('translator')->getFromJson('messages.noTaskCategoryAdded'); ?></option>
                                                                    <?php endif; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label"><?php echo app('translator')->getFromJson('modules.tasks.priority'); ?></label>

                                                                <div class="radio radio-danger">
                                                                    <input type="radio" name="priority" id="radio13"
                                                                           value="high">
                                                                    <label for="radio13" class="text-danger">
                                                                        <?php echo app('translator')->getFromJson('modules.tasks.high'); ?> </label>
                                                                </div>
                                                                <div class="radio radio-warning">
                                                                    <input type="radio" name="priority" checked
                                                                           id="radio14" value="medium">
                                                                    <label for="radio14" class="text-warning">
                                                                        <?php echo app('translator')->getFromJson('modules.tasks.medium'); ?> </label>
                                                                </div>
                                                                <div class="radio radio-success">
                                                                    <input type="radio" name="priority" id="radio15"
                                                                           value="low">
                                                                    <label for="radio15" class="text-success">
                                                                        <?php echo app('translator')->getFromJson('modules.tasks.low'); ?> </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->

                                                </div>
                                                <div class="form-actions">
                                                    <button type="submit" id="save-task" class="btn btn-success"><i
                                                                class="fa fa-check"></i> <?php echo app('translator')->getFromJson('app.save'); ?>
                                                    </button>
                                                </div>
                                                <?php echo Form::close(); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 hide" id="edit-task-panel">
                                </div>
                            </div>
                        </section>

                    </div><!-- /content -->
                </div><!-- /tabs -->
            </section>
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
<script src="<?php echo e(asset('js/cbpFWTabs.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/summernote/dist/summernote.min.js')); ?>"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
<script type="text/javascript">
    var newTaskpanel = $('#new-task-panel');
    var taskListPanel = $('#task-list-panel');
    var editTaskPanel = $('#edit-task-panel');

    $(".select2").select2({
        formatNoMatches: function () {
            return "<?php echo e(__('messages.noRecordFound')); ?>";
        }
    });

   $('.summernote').summernote({
        height: 100,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false                 // set focus to editable area after initializing summernote
    });

    //    save new task
    $('#save-task').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.tasks.store')); ?>',
            container: '#section-line-3',
            type: "POST",
            data: $('#createTask').serialize(),
            success: function (data) {
                $('#createTask').trigger("reset");
                $('.summernote').summernote('code', '');
                $('#task-list-panel ul.list-group').html(data.html);
                $("body").tooltip({
                    selector: '[data-toggle="tooltip"]'
                });
            }
        })
    });

    //    save new task
    taskListPanel.on('click', '.edit-task', function () {
        var id = $(this).data('task-id');
        var url = "<?php echo e(route('admin.tasks.edit', ':id')); ?>";
        url = url.replace(':id', id);

        $.easyAjax({
            url: url,
            type: "GET",
            container: '#task-list-panel',
            data: {taskId: id},
            success: function (data) {
                editTaskPanel.html(data.html);
                taskListPanel.switchClass("col-md-12", "col-md-6", 1000, "easeInOutQuad");
                newTaskpanel.addClass('hide').removeClass('show');
                editTaskPanel.switchClass("hide", "show", 300, "easeInOutQuad");
                $("body").tooltip({
                    selector: '[data-toggle="tooltip"]'
                });
            }
        })
    });

    //    change task status
    taskListPanel.on('click', '.task-check', function () {
        if ($(this).is(':checked')) {
            var status = 'completed';
        }else{
            var status = 'incomplete';
        }

        var sortBy = $('#sort-task').val();

        var id = $(this).data('task-id');

        if(status == 'completed'){
            var checkUrl = '<?php echo e(route('admin.tasks.checkTask', ':id')); ?>';
            checkUrl = checkUrl.replace(':id', id);
            $.easyAjax({
                url: checkUrl,
                type: "GET",
                container: '#task-list-panel',
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
                                updateTask(id,status,sortBy)
                            }
                        });
                    }
                    else{
                        updateTask(id,status,sortBy)
                    }

                }
            });
        }
        else{
            updateTask(id,status,sortBy)
        }


    });

    // Update Task
    function updateTask(id,status,sortBy){
        var url = "<?php echo e(route('admin.tasks.changeStatus')); ?>";
        var token = "<?php echo e(csrf_token()); ?>";
        $.easyAjax({
            url: url,
            type: "POST",
            container: '#section-line-3',
            data: {'_token': token, taskId: id, status: status, sortBy: sortBy},
            success: function (data) {
                $('#task-list-panel ul.list-group').html(data.html);
                $("body").tooltip({
                    selector: '[data-toggle="tooltip"]'
                });
            }
        })
    }

    //    save new task
    $('#sort-task, #hide-completed-tasks').change(function() {
        var sortBy = $('#sort-task').val();
        var id = $('#sort-task').data('project-id');

        var url = "<?php echo e(route('admin.tasks.sort')); ?>";
        var token = "<?php echo e(csrf_token()); ?>";

        if ($('#hide-completed-tasks').is(':checked')) {
            var hideCompleted = '1';
        }else {
            var hideCompleted = '0';
        }

        $.easyAjax({
            url: url,
            type: "POST",
            container: '#task-list-panel',
            data: {'_token': token, projectId: id, sortBy: sortBy, hideCompleted: hideCompleted},
            success: function (data) {
                $('#task-list-panel ul.list-group').html(data.html);
                $("body").tooltip({
                    selector: '[data-toggle="tooltip"]'
                });
            }
        })
    });

    $('#show-new-task-panel').click(function () {
//    taskListPanel.switchClass('col-md-12', 'col-md-8', 1000, 'easeInOutQuad');
        taskListPanel.switchClass("col-md-12", "col-md-6", 1000, "easeInOutQuad");
        editTaskPanel.addClass('hide').removeClass('show');
        newTaskpanel.switchClass("hide", "show", 300, "easeInOutQuad");
    });

    $('#hide-new-task-panel').click(function () {
        newTaskpanel.addClass('hide').removeClass('show');
        taskListPanel.switchClass("col-md-6", "col-md-12", 1000, "easeInOutQuad");
    });

    editTaskPanel.on('click', '#hide-edit-task-panel', function () {
        editTaskPanel.addClass('hide').removeClass('show');
        taskListPanel.switchClass("col-md-6", "col-md-12", 1000, "easeInOutQuad");
    });

    jQuery('#due_date, #start_date').datepicker({
        autoclose: true,
        todayHighlight: true
    });



</script>
<script>
    $('body').on('click', '#createTaskCategory', function(){
        var url = '<?php echo e(route('admin.taskCategory.create-cat')); ?>';
        $('#modelHeading').html("<?php echo app('translator')->getFromJson('modules.taskCategory.manageTaskCategory'); ?>");
        $.ajaxModal('#taskCategoryModal', url);
    })
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>