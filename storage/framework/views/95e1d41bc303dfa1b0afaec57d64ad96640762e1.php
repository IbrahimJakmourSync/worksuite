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
                <li class="active"><?php echo app('translator')->getFromJson('app.details'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
<style>
    .counter{
        font-size: large;
    }
</style>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
        <!-- .row -->
<div class="row">
    <div class="col-md-5 col-xs-12">
        <div class="white-box">
            <div class="user-bg">
                <?php echo ($employee->image) ? '<img src="'.asset('user-uploads/avatar/'.$employee->image).'"
                                                            alt="user" width="100%">' : '<img src="'.asset('default-profile-2.png').'"
                                                            alt="user" width="100%">'; ?>

                <div class="overlay-box">
                    <div class="user-content"> <a href="javascript:void(0)">
                            <?php echo ($employee->image) ? '<img src="'.asset('user-uploads/avatar/'.$employee->image).'"
                                                            alt="user" class="thumb-lg img-circle">' : '<img src="'.asset('default-profile-2.png').'"
                                                            alt="user" class="thumb-lg img-circle">'; ?>

                            </a>
                        <h4 class="text-white"><?php echo e(ucwords($employee->name)); ?></h4>
                        <h5 class="text-white"><?php echo e($employee->email); ?></h5>
                    </div>
                </div>
            </div>
            <div class="user-btm-box">
                <div class="row row-in">
                    <div class="col-md-6 row-in-br">
                        <div class="col-in row">
                                <h3 class="box-title"><?php echo app('translator')->getFromJson('modules.employees.tasksDone'); ?></h3>
                                <div class="col-xs-4"><i class="ti-check-box text-success"></i></div>
                                <div class="col-xs-8 text-right counter"><?php echo e($taskCompleted); ?></div>
                        </div>
                    </div>
                    <div class="col-md-6 row-in-br  b-r-none">
                        <div class="col-in row">
                                <h3 class="box-title"><?php echo app('translator')->getFromJson('modules.employees.hoursLogged'); ?></h3>
                            <div class="col-xs-2"><i class="icon-clock text-info"></i></div>
                            <div class="col-xs-10 text-right counter" style="font-size: 13px"><?php echo e($hoursLogged); ?></div>
                        </div>
                    </div>
                </div>
                <div class="row row-in">
                    <div class="col-md-6 row-in-br">
                        <div class="col-in row">
                                <h3 class="box-title"><?php echo app('translator')->getFromJson('modules.leaves.leavesTaken'); ?></h3>
                                <div class="col-xs-4"><i class="icon-logout text-warning"></i></div>
                                <div class="col-xs-8 text-right counter"><?php echo e(count($leaves)); ?></div>
                        </div>
                    </div>
                    <div class="col-md-6 row-in-br  b-r-none">
                        <div class="col-in row">
                                <h3 class="box-title"><?php echo app('translator')->getFromJson('modules.leaves.remainingLeaves'); ?></h3>
                            <div class="col-xs-4"><i class="icon-logout text-danger"></i></div>
                            <div class="col-xs-8 text-right counter"><?php echo e(($allowedLeaves-count($leaves))); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7 col-xs-12">
        <div class="white-box">
            <ul class="nav nav-tabs tabs customtab">
                <li class="active tab"><a href="#home" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs"><?php echo app('translator')->getFromJson('modules.employees.activity'); ?></span> </a> </li>
                <li class="tab"><a href="#profile" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs"><?php echo app('translator')->getFromJson('modules.employees.profile'); ?></span> </a> </li>
                <li class="tab"><a href="#projects" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="icon-layers"></i></span> <span class="hidden-xs"><?php echo app('translator')->getFromJson('app.menu.projects'); ?></span> </a> </li>
                <li class="tab"><a href="#tasks" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="icon-list"></i></span> <span class="hidden-xs"><?php echo app('translator')->getFromJson('app.menu.tasks'); ?></span> </a> </li>
                <li class="tab"><a href="#leaves" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="icon-logout"></i></span> <span class="hidden-xs"><?php echo app('translator')->getFromJson('app.menu.leaves'); ?></span> </a> </li>
                <li class="tab"><a href="#time-logs" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="icon-clock"></i></span> <span class="hidden-xs"><?php echo app('translator')->getFromJson('app.menu.timeLogs'); ?></span> </a> </li>
                <li class="tab"><a href="#docs" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="icon-docs"></i></span> <span class="hidden-xs"><?php echo app('translator')->getFromJson('app.menu.documents'); ?></span> </a> </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="steamline">
                        <?php $__empty_1 = true; $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="sl-item">
                            <div class="sl-left">
                                <?php echo ($employee->image) ? '<img src="'.asset('user-uploads/avatar/'.$employee->image).'"
                                                            alt="user" class="img-circle">' : '<img src="'.asset('default-profile-2.png').'"
                                                            alt="user" class="img-circle">'; ?>

                            </div>
                            <div class="sl-right">
                                <div class="m-l-40"><a href="#" class="text-info"><?php echo e(ucwords($employee->name)); ?></a> <span  class="sl-date"><?php echo e($activity->created_at->diffForHumans()); ?></span>
                                    <p><?php echo ucfirst($activity->activity); ?></p>
                                </div>
                            </div>
                        </div>
                            <?php if(count($activities) > ($key+1)): ?>
                                <hr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div><?php echo app('translator')->getFromJson('messages.noActivityByThisUser'); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="tab-pane" id="profile">
                    <div class="row">
                        <div class="col-xs-6 b-r"> <strong><?php echo app('translator')->getFromJson('modules.employees.fullName'); ?></strong> <br>
                            <p class="text-muted"><?php echo e(ucwords($employee->name)); ?></p>
                        </div>
                        <div class="col-xs-6"> <strong><?php echo app('translator')->getFromJson('app.mobile'); ?></strong> <br>
                            <p class="text-muted"><?php echo e(isset($employee->mobile) ? $employee->mobile : 'NA'); ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 col-xs-6 b-r"> <strong><?php echo app('translator')->getFromJson('app.email'); ?></strong> <br>
                            <p class="text-muted"><?php echo e($employee->email); ?></p>
                        </div>
                        <div class="col-md-3 col-xs-6"> <strong><?php echo app('translator')->getFromJson('app.address'); ?></strong> <br>
                            <p class="text-muted"><?php echo e((count($employee->employee) > 0) ? $employee->employee[0]->address : 'NA'); ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 col-xs-6 b-r"> <strong><?php echo app('translator')->getFromJson('modules.employees.jobTitle'); ?></strong> <br>
                            <p class="text-muted"><?php echo e((count($employee->employee) > 0) ? ucwords($employee->employee[0]->job_title) : 'NA'); ?></p>
                        </div>
                        <div class="col-md-3 col-xs-6"> <strong><?php echo app('translator')->getFromJson('modules.employees.hourlyRate'); ?></strong> <br>
                            <p class="text-muted"><?php echo e((count($employee->employee) > 0) ? $employee->employee[0]->hourly_rate : 'NA'); ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 col-xs-6 b-r"> <strong><?php echo app('translator')->getFromJson('modules.employees.slackUsername'); ?></strong> <br>
                            <p class="text-muted"><?php echo e((count($employee->employee) > 0) ? '@'.$employee->employee[0]->slack_username : 'NA'); ?></p>
                        </div>
                        <div class="col-md-6 col-xs-6"> <strong><?php echo app('translator')->getFromJson('modules.employees.joiningDate'); ?></strong> <br>
                            <p class="text-muted"><?php echo e((count($employee->employee) > 0) ? $employee->employee[0]->joining_date->format($global->date_format) : 'NA'); ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 col-xs-6 b-r"> <strong><?php echo app('translator')->getFromJson('modules.employees.gender'); ?></strong> <br>
                            <p class="text-muted"><?php echo e($employee->gender); ?></p>
                        </div>
                        <div class="col-md-6 col-xs-6"> <strong><?php echo app('translator')->getFromJson('app.skills'); ?></strong> <br>
                            <?php echo e(implode(', ', $employee->skills())); ?>

                        
                        </div>
                    </div>

                    
                        <?php if(isset($fields)): ?>
                        <div class="row">
                            <hr>
                            <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6">
                                    <strong><?php echo e(ucfirst($field->label)); ?></strong> <br>
                                    <p class="text-muted">
                                        <?php if( $field->type == 'text'): ?>
                                            <?php echo e(isset($employeeDetail->custom_fields_data['field_'.$field->id]) ? $employeeDetail->custom_fields_data['field_'.$field->id] : ''); ?>

                                        <?php elseif($field->type == 'password'): ?>
                                            <?php echo e(isset($employeeDetail->custom_fields_data['field_'.$field->id]) ? $employeeDetail->custom_fields_data['field_'.$field->id] : ''); ?>

                                        <?php elseif($field->type == 'number'): ?>
                                            <?php echo e(isset($employeeDetail->custom_fields_data['field_'.$field->id]) ? $employeeDetail->custom_fields_data['field_'.$field->id] : ''); ?>


                                        <?php elseif($field->type == 'textarea'): ?>
                                        <?php echo e(isset($employeeDetail->custom_fields_data['field_'.$field->id]) ? $employeeDetail->custom_fields_data['field_'.$field->id] : ''); ?>


                                        <?php elseif($field->type == 'radio'): ?>
                                            <?php echo e($field->values[$employeeDetail->custom_fields_data['field_'.$field->id]]); ?>

                                        <?php elseif($field->type == 'select'): ?>
                                                <?php echo e($field->values[$employeeDetail->custom_fields_data['field_'.$field->id]]); ?>

                                        <?php elseif($field->type == 'checkbox'): ?>
                                            <?php echo e($field->values[$employeeDetail->custom_fields_data['field_'.$field->id]]); ?>

                                        <?php elseif($field->type == 'date'): ?>
                                            <?php echo e(isset($employeeDetail->dob)?Carbon\Carbon::parse($employeeDetail->dob)->format($global->date_format):Carbon\Carbon::now()->format($global->date_format)); ?>

                                        <?php endif; ?>
                                    </p>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php endif; ?>

                    

                </div>
                <div class="tab-pane" id="projects">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo app('translator')->getFromJson('app.project'); ?></th>
                                <th><?php echo app('translator')->getFromJson('app.deadline'); ?></th>
                                <th><?php echo app('translator')->getFromJson('app.completion'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><a href="<?php echo e(route('admin.projects.show', $project->id)); ?>"><?php echo e(ucwords($project->project_name)); ?></a></td>
                                    <td><?php echo e($project->deadline->format($global->date_format)); ?></td>
                                    <td>
                                        <?php

                                        if ($project->completion_percent < 50) {
                                        $statusColor = 'danger';
                                        }
                                        elseif ($project->completion_percent >= 50 && $project->completion_percent < 75) {
                                        $statusColor = 'warning';
                                        }
                                        else {
                                        $statusColor = 'success';
                                        }
                                        ?>

                                        <h5><?php echo app('translator')->getFromJson('app.completed'); ?><span class="pull-right"><?php echo e($project->completion_percent); ?>%</span></h5><div class="progress">
                                            <div class="progress-bar progress-bar-<?php echo e($statusColor); ?>" aria-valuenow="<?php echo e($project->completion_percent); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($project->completion_percent); ?>%" role="progressbar"> <span class="sr-only"><?php echo e($project->completion_percent); ?>% <?php echo app('translator')->getFromJson('app.completed'); ?></span> </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="3"><?php echo app('translator')->getFromJson('messages.noProjectFound'); ?></td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="tasks">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="checkbox checkbox-info">
                                <input type="checkbox" id="hide-completed-tasks">
                                <label for="hide-completed-tasks"><?php echo app('translator')->getFromJson('app.hideCompletedTasks'); ?></label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover toggle-circle default footable-loaded footable"
                               id="tasks-table">
                            <thead>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('app.id'); ?></th>
                                <th><?php echo app('translator')->getFromJson('app.project'); ?></th>
                                <th><?php echo app('translator')->getFromJson('app.task'); ?></th>
                                <th><?php echo app('translator')->getFromJson('app.dueDate'); ?></th>
                                <th><?php echo app('translator')->getFromJson('app.status'); ?></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
                <div class="tab-pane" id="leaves">
                    <div class="row">

                        <div class="col-md-6">
                            <ul class="basic-list">
                                <?php $__empty_1 = true; $__currentLoopData = $leaveTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leaveType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <li><?php echo e(ucfirst($leaveType->type_name)); ?>

                                        <span class="pull-right label-<?php echo e($leaveType->color); ?> label"><?php echo e((isset($leaveType->leavesCount[0])) ? $leaveType->leavesCount[0]->count : '0'); ?></span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <li><?php echo app('translator')->getFromJson('messages.noRecordFound'); ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table" id="leave-table">
                                <thead>
                                <tr>
                                    <th><?php echo app('translator')->getFromJson('modules.leaves.leaveType'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('app.date'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('modules.leaves.reason'); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <label class="label label-<?php echo e($leave->type->color); ?>"><?php echo e(ucwords($leave->type->type_name)); ?></label>
                                        </td>
                                        <td>
                                            <?php echo e($leave->leave_date->format($global->date_format)); ?>

                                        </td>
                                        <td>
                                            <?php echo e($leave->reason); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td><?php echo app('translator')->getFromJson('messages.noRecordFound'); ?></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="tab-pane" id="time-logs">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover toggle-circle default footable-loaded footable" id="timelog-table">
                            <thead>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('app.id'); ?></th>
                                <th><?php echo app('translator')->getFromJson('app.project'); ?></th>
                                <th><?php echo app('translator')->getFromJson('modules.employees.startTime'); ?></th>
                                <th><?php echo app('translator')->getFromJson('modules.employees.endTime'); ?></th>
                                <th><?php echo app('translator')->getFromJson('modules.employees.totalHours'); ?></th>
                                <th><?php echo app('translator')->getFromJson('modules.employees.memo'); ?></th>
                            </tr>
                            </thead>
                        </table>
                    </div>


                </div>
                <div class="tab-pane" id="docs">
                    <button class="btn btn-sm btn-info addDocs" onclick="showAdd()"><i
                                class="fa fa-plus"></i> <?php echo app('translator')->getFromJson('app.add'); ?></button>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th width="70%"><?php echo app('translator')->getFromJson('app.name'); ?></th>
                                <th><?php echo app('translator')->getFromJson('app.action'); ?></th>
                            </tr>
                            </thead>
                            <tbody id="employeeDocsList">
                            <?php $__empty_1 = true; $__currentLoopData = $employeeDocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$employeeDoc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td width="70%"><?php echo e(ucwords($employeeDoc->name)); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('admin.employee-docs.download', $employeeDoc->id)); ?>"
                                           data-toggle="tooltip" data-original-title="Download"
                                           class="btn btn-inverse btn-circle"><i
                                                    class="fa fa-download"></i></a>
                                        <a target="_blank" href="<?php echo e(asset('user-uploads/employee-docs/'.$employeeDoc->user_id.'/'.$employeeDoc->hashname)); ?>"
                                           data-toggle="tooltip" data-original-title="View"
                                           class="btn btn-info btn-circle"><i
                                                    class="fa fa-search"></i></a>
                                        <a href="javascript:;" data-toggle="tooltip" data-original-title="Delete" data-file-id="<?php echo e($employeeDoc->id); ?>"
                                                                                    data-pk="list" class="btn btn-danger btn-circle sa-params"><i class="fa fa-times"></i></a>
                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="3"><?php echo app('translator')->getFromJson('messages.noDocsFound'); ?></td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
        
        <div class="modal fade bs-modal-md in" id="edit-column-form" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
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
            <!-- /.modal-dialog -->
        </div>
        
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script src="<?php echo e(asset('plugins/bower_components/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
<script>
    // Show Create employeeDocs Modal
    function showAdd() {
        var url = "<?php echo e(route('admin.employees.docs-create', [$employee->id])); ?>";
        $.ajaxModal('#edit-column-form', url);
    }

    $('body').on('click', '.sa-params', function () {
        var id = $(this).data('file-id');
        var deleteView = $(this).data('pk');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover the deleted file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {

                var url = "<?php echo e(route('admin.employee-docs.destroy',':id')); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {'_token': token, '_method': 'DELETE', 'view': deleteView},
                    success: function (response) {
                        console.log(response);
                        if (response.status == "success") {
                            $.unblockUI();
                            $('#employeeDocsList').html(response.html);
                        }
                    }
                });
            }
        });
    });

    $('#leave-table').dataTable({
        responsive: true,
        "columnDefs": [
            { responsivePriority: 1, targets: 0, 'width': '20%' },
            { responsivePriority: 2, targets: 1, 'width': '20%' }
        ],
        "autoWidth" : false,
        searching: false,
        paging: false,
        info: false
    });

    var table;

    function showTable() {

        if ($('#hide-completed-tasks').is(':checked')) {
            var hideCompleted = '1';
        } else {
            var hideCompleted = '0';
        }

        var url = '<?php echo e(route('admin.employees.tasks', [$employee->id, ':hideCompleted'])); ?>';
        url = url.replace(':hideCompleted', hideCompleted);

        table = $('#tasks-table').dataTable({
            destroy: true,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: url,
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
                {data: 'id', name: 'id'},
                {data: 'project_name', name: 'projects.project_name', width: '20%'},
                {data: 'heading', name: 'heading', width: '20%'},
                {data: 'due_date', name: 'due_date'},
                {data: 'column_name', name: 'taskboard_columns.column_name'},
            ]
        });
    }

    $('#hide-completed-tasks').click(function () {
        showTable();
    });

    showTable();
</script>

<script>
    var table2;

    function showTable2(){

        var url = '<?php echo e(route('admin.employees.time-logs', [$employee->id])); ?>';

        table2 = $('#timelog-table').dataTable({
            destroy: true,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: url,
            deferRender: true,
            language: {
                "url": "<?php echo __("app.datatable") ?>"
            },
            "fnDrawCallback": function( oSettings ) {
                $("body").tooltip({
                    selector: '[data-toggle="tooltip"]'
                });
            },
            "order": [[ 0, "desc" ]],
            columns: [
                { data: 'id', name: 'id' },
                { data: 'project_name', name: 'projects.project_name' },
                { data: 'start_time', name: 'start_time' },
                { data: 'end_time', name: 'end_time' },
                { data: 'total_hours', name: 'total_hours' },
                { data: 'memo', name: 'memo' }
            ]
        });
    }

    showTable2();
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>