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
                <li><a href="<?php echo e(route('member.dashboard')); ?>"><?php echo app('translator')->getFromJson('app.menu.home'); ?></a></li>
                <li class="active"><?php echo e(__($pageTitle)); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


    <h2><?php echo app('translator')->getFromJson('app.filterResults'); ?></h2>

    <div class="white-box">
        <div class="row m-b-10">
            <?php echo Form::open(['id'=>'storePayments','class'=>'ajax-form','method'=>'POST']); ?>

            <div class="col-md-5">
                <div class="example">
                    <h5 class="box-title m-t-30"><?php echo app('translator')->getFromJson('app.selectDateRange'); ?></h5>

                    <div class="input-daterange input-group" id="date-range">
                        <input type="text" class="form-control" id="start-date" placeholder="<?php echo app('translator')->getFromJson('app.startDate'); ?>"
                               value="<?php echo e(\Carbon\Carbon::today()->subDays(15)->format('Y-m-d')); ?>"/>
                        <span class="input-group-addon bg-info b-0 text-white"><?php echo app('translator')->getFromJson('app.to'); ?></span>
                        <input type="text" class="form-control" id="end-date" placeholder="<?php echo app('translator')->getFromJson('app.endDate'); ?>"
                               value="<?php echo e(\Carbon\Carbon::today()->addDays(15)->format('Y-m-d')); ?>"/>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <h5 class="box-title m-t-30"><?php echo app('translator')->getFromJson('app.selectProject'); ?></h5>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <select class="select2 form-control" data-placeholder="<?php echo app('translator')->getFromJson('app.selectProject'); ?>" id="project_id">
                                <option value="all"><?php echo app('translator')->getFromJson('app.all'); ?></option>
                                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                            value="<?php echo e($project->id); ?>"><?php echo e(ucwords($project->project_name)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h5 class="box-title m-t-30"><?php echo app('translator')->getFromJson('app.select'); ?> <?php echo app('translator')->getFromJson('app.client'); ?></h5>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <select class="select2 form-control" data-placeholder="<?php echo app('translator')->getFromJson('app.client'); ?>" id="clientID">
                                <option value="all"><?php echo app('translator')->getFromJson('app.all'); ?></option>
                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                            value="<?php echo e($client->id); ?>"><?php echo e(ucwords($client->name)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h5 class="box-title m-t-30"><?php echo app('translator')->getFromJson('app.select'); ?> <?php echo app('translator')->getFromJson('modules.tasks.assignTo'); ?></h5>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <select class="select2 form-control" data-placeholder="<?php echo app('translator')->getFromJson('modules.tasks.assignTo'); ?>" id="assignedTo">
                                <option value="all"><?php echo app('translator')->getFromJson('app.all'); ?></option>
                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                            value="<?php echo e($employee->id); ?>"><?php echo e(ucwords($employee->name)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h5 class="box-title m-t-30"><?php echo app('translator')->getFromJson('app.select'); ?> <?php echo app('translator')->getFromJson('modules.tasks.assignBy'); ?></h5>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <select class="select2 form-control" data-placeholder="<?php echo app('translator')->getFromJson('modules.tasks.assignBy'); ?>" id="assignedBY">
                                <option value="all"><?php echo app('translator')->getFromJson('app.all'); ?></option>
                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                            value="<?php echo e($employee->id); ?>"><?php echo e(ucwords($employee->name)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h5 class="box-title m-t-30"><?php echo app('translator')->getFromJson('app.select'); ?> <?php echo app('translator')->getFromJson('app.status'); ?></h5>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <select class="select2 form-control" data-placeholder="<?php echo app('translator')->getFromJson('status'); ?>" id="status">
                                <option value="all"><?php echo app('translator')->getFromJson('app.all'); ?></option>
                                <?php $__currentLoopData = $taskBoardStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($status->id); ?>"><?php echo e(ucwords($status->column_name)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <h5 class="box-title m-t-30">&nbsp;</h5>

                <div class="checkbox checkbox-info">
                    <input type="checkbox" id="hide-completed-tasks">
                    <label for="hide-completed-tasks"><?php echo app('translator')->getFromJson('app.hideCompletedTasks'); ?></label>
                </div>
            </div>

            <div class="col-md-12">
                <button type="button" class="btn btn-success" id="filter-results"><i class="fa fa-check"></i> <?php echo app('translator')->getFromJson('app.apply'); ?>
                </button>
            </div>
            <?php echo Form::close(); ?>


        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="white-box">

                <h2><?php echo app('translator')->getFromJson('app.menu.tasks'); ?></h2>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?php if($user->can('add_tasks') || $global->task_self == 'yes'): ?>
                                <a href="<?php echo e(route('member.all-tasks.create')); ?>" class="btn btn-outline btn-success btn-sm"><?php echo app('translator')->getFromJson('modules.tasks.newTask'); ?> <i class="fa fa-plus" aria-hidden="true"></i></a>
                            <?php endif; ?>
                            <a href="<?php echo e(route('member.taskboard.index')); ?>" class="btn btn-inverse btn-sm"><i class="ti-layout-column3" aria-hidden="true"></i> <?php echo app('translator')->getFromJson('modules.tasks.taskBoard'); ?></a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover toggle-circle default footable-loaded footable"
                           id="tasks-table">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('app.id'); ?></th>
                            <th><?php echo app('translator')->getFromJson('app.task'); ?></th>
                            <th><?php echo app('translator')->getFromJson('app.project'); ?></th>
                            <th><?php echo app('translator')->getFromJson('app.client'); ?></th>
                            <th><?php echo app('translator')->getFromJson('modules.tasks.assignTo'); ?></th>
                            <th><?php echo app('translator')->getFromJson('modules.tasks.assignBy'); ?></th>
                            <th><?php echo app('translator')->getFromJson('app.dueDate'); ?></th>
                            <th><?php echo app('translator')->getFromJson('app.status'); ?></th>
                            <th><?php echo app('translator')->getFromJson('app.action'); ?></th>
                        </tr>
                        </thead>
                    </table>
                </div>

            </div>
        </div>

    </div>
    <!-- .row -->

    
    <div class="modal fade bs-modal-md in" id="editTimeLogModal" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modal-data-application">
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
        <!-- /.modal-dialog -->
    </div>
    
    
    <div class="modal fade bs-modal-md in"  id="subTaskModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" id="modal-data-application">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <span class="caption-subject font-red-sunglo bold uppercase" id="subTaskModelHeading">Sub Task e</span>
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

<script src="<?php echo e(asset('plugins/bower_components/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>

<script src="<?php echo e(asset('plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>

<script>

    $(".select2").select2({
        formatNoMatches: function () {
            return "<?php echo e(__('messages.noRecordFound')); ?>";
        }
    });

    jQuery('#date-range').datepicker({
        toggleActive: true,
        format: 'yyyy-mm-dd',
        language: '<?php echo e($global->locale); ?>',
        autoclose: true
    });

    table = '';

    function showTable() {

        var startDate = $('#start-date').val();

        if (startDate == '') {
            startDate = null;
        }

        var endDate = $('#end-date').val();

        if (endDate == '') {
            endDate = null;
        }

        var projectID = $('#project_id').val();
        var clientID = $('#clientID').val();
        var assignedBY = $('#assignedBY').val();
        var assignedTo = $('#assignedTo').val();
        var status = $('#status').val();

        if ($('#hide-completed-tasks').is(':checked')) {
            var hideCompleted = '1';
        } else {
            var hideCompleted = '0';
        }

        var url = '<?php echo route('member.all-tasks.data', [':startDate', ':endDate', ':hideCompleted', ':projectId']); ?>?clientID='+clientID +'&assignedBY='+ assignedBY+'&assignedTo='+ assignedTo+'&status='+ status+'&_token=<?php echo e(csrf_token()); ?>';

        url = url.replace(':startDate', startDate);
        url = url.replace(':endDate', endDate);
        url = url.replace(':hideCompleted', hideCompleted);
        url = url.replace(':projectId', projectID);

        table = $('#tasks-table').dataTable({
            destroy: true,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                "url": url,
                "type": "POST"
            },
            deferRender: true,
            language: {
                "url": "<?php echo __("app.datatable") ?>"
            },
            "fnDrawCallback": function (oSettings) {
                $("body").tooltip({
                    selector: '[data-toggle="tooltip"]'
                });
            },
            "order": [[0, "desc"]],
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                {data: 'heading', name: 'heading', width: '13%'},
                {data: 'project_name', name: 'projects.project_name', width: '13%'},
                {data: 'clientName', name: 'clientName', width: '10%', bSort: false},
                {data: 'name', name: 'users.name', width: '10%'},
                {data: 'created_by', name: 'creator_user.name', width: '15%'},
                {data: 'due_date', name: 'due_date'},
                {data: 'column_name', name: 'taskboard_columns.column_name'},
                {data: 'action', name: 'action', "searchable": false}
            ]
        });
    }

    $('#filter-results').click(function () {
        showTable();
    });


    $('body').on('click', '.sa-params', function () {
        var id = $(this).data('task-id');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover the deleted task!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {

                var url = "<?php echo e(route('member.all-tasks.destroy',':id')); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                            url: url,
                            data: {'_token': token, '_method': 'DELETE'},
                    success: function (response) {
                        if (response.status == "success") {
                            $.unblockUI();
//                                    swal("Deleted!", response.message, "success");
                            table._fnDraw();
                        }
                    }
                });
            }
        });
    });

    $('#tasks-table').on('click', '.show-task-detail', function () {
        $(".right-sidebar").slideDown(50).addClass("shw-rside");

        var id = $(this).data('task-id');
        var url = "<?php echo e(route('member.all-tasks.show',':id')); ?>";
        url = url.replace(':id', id);

        $.easyAjax({
            type: 'GET',
            url: url,
            success: function (response) {
                if (response.status == "success") {
                    $('#right-sidebar-content').html(response.view);
                }
            }
        });
    })

    showTable();


</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.member-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>