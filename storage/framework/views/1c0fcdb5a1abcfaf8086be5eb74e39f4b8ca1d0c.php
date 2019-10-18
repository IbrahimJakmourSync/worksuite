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
    <style>
        .col-in {
            padding: 0 20px !important;

        }

        .fc-event{
            font-size: 10px !important;
        }

        #wrapper .panel-wrapper{
            height: 500px;
            overflow-y: auto;
        }

    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row dashboard-stats">
        <?php if(in_array('projects',$modules)): ?>
        <div class="col-md-3 col-sm-6">
            <a href="<?php echo e(route('member.projects.index')); ?>">
                <div class="white-box">
                    <div class="row">
                        <div class="col-sm-3">
                            <div>
                                <span class="bg-info-gradient"><i class="icon-layers"></i></span>
                            </div>
                        </div>
                        <div class="col-sm-9 text-right">
                            <span class="widget-title"> <?php echo app('translator')->getFromJson('modules.dashboard.totalProjects'); ?></span><br>
                            <span class="counter"><?php echo e($totalProjects); ?></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php endif; ?>

        <?php if(in_array('timelogs',$modules)): ?>
        <div class="col-md-3 col-sm-6">
            <a href="<?php echo e(route('member.all-time-logs.index')); ?>">
                <div class="white-box">
                    <div class="row">
                        <div class="col-sm-3">
                            <div>
                                <span class="bg-warning-gradient"><i class="icon-clock"></i></span>
                            </div>
                        </div>
                        <div class="col-sm-9 text-right">
                            <span class="widget-title"> <?php echo app('translator')->getFromJson('modules.dashboard.totalHoursLogged'); ?></span><br>
                            <span class="counter"><?php echo e($counts->totalHoursLogged); ?></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php endif; ?>

        <?php if(in_array('tasks',$modules)): ?>
        <div class="col-md-3 col-sm-6">
            <a href="<?php echo e(route('member.all-tasks.index')); ?>">
                <div class="white-box">
                    <div class="row">
                        <div class="col-sm-3">
                            <div>
                                <span class="bg-danger-gradient"><i class="ti-alert"></i></span>
                            </div>
                        </div>
                        <div class="col-sm-9 text-right">
                            <span class="widget-title"> <?php echo app('translator')->getFromJson('modules.dashboard.totalPendingTasks'); ?></span><br>
                            <span class="counter"><?php echo e($counts->totalPendingTasks); ?></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3 col-sm-6">
            <a href="<?php echo e(route('member.all-tasks.index')); ?>">
                <div class="white-box">
                    <div class="row">
                        <div class="col-sm-3">
                            <div>
                                <span class="bg-success-gradient"><i class="ti-check-box"></i></span>
                            </div>
                        </div>
                        <div class="col-sm-9 text-right">
                            <span class="widget-title"> <?php echo app('translator')->getFromJson('modules.dashboard.totalCompletedTasks'); ?></span><br>
                            <span class="counter"><?php echo e($counts->totalCompletedTasks); ?></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php endif; ?>

    </div>
    <!-- .row -->

    <div class="row">

        <?php if(in_array('attendance',$modules)): ?>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo app('translator')->getFromJson('app.menu.attendance'); ?></div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <?php if(!$checkTodayHoliday): ?>
                            <?php if($todayTotalClockin < $maxAttandenceInDay): ?>
                                <div class="col-xs-6">
                                    <h3><?php echo app('translator')->getFromJson('modules.attendance.clock_in'); ?></h3>
                                </div>
                                <div class="col-xs-6">
                                    <h3><?php echo app('translator')->getFromJson('modules.attendance.clock_in'); ?> IP</h3>
                                </div>
                                <div class="col-xs-6">
                                    <?php if(is_null($currenntClockIn)): ?>
                                        <?php echo e(\Carbon\Carbon::now()->timezone($global->timezone)->format($global->time_format)); ?>

                                    <?php else: ?>
                                        <?php echo e($currenntClockIn->clock_in_time->timezone($global->timezone)->format($global->time_format)); ?>

                                    <?php endif; ?>
                                </div>
                                <div class="col-xs-6">
                                    <?php echo e(isset($currenntClockIn->clock_in_ip) ? $currenntClockIn->clock_in_ip : request()->ip()); ?>

                                </div>

                                <?php if(!is_null($currenntClockIn) && !is_null($currenntClockIn->clock_out_time)): ?>
                                    <div class="col-xs-6 m-t-20">
                                        <label for=""><?php echo app('translator')->getFromJson('modules.attendance.clock_out'); ?></label>
                                        <br><?php echo e($currenntClockIn->clock_out_time->timezone($global->timezone)->format($global->time_format)); ?>

                                    </div>
                                    <div class="col-xs-6 m-t-20">
                                        <label for=""><?php echo app('translator')->getFromJson('modules.attendance.clock_out'); ?> IP</label>
                                        <br><?php echo e($currenntClockIn->clock_out_ip); ?>

                                    </div>
                                <?php endif; ?>

                                <div class="col-xs-8 m-t-20">
                                    <label for=""><?php echo app('translator')->getFromJson('modules.attendance.working_from'); ?></label>
                                    <?php if(is_null($currenntClockIn)): ?>
                                        <input type="text" class="form-control" id="working_from" name="working_from">
                                    <?php else: ?>
                                        <br> <?php echo e($currenntClockIn->working_from); ?>

                                    <?php endif; ?>
                                </div>

                                <div class="col-xs-4 m-t-20">
                                    <label class="m-t-30">&nbsp;</label>
                                    <?php if(is_null($currenntClockIn)): ?>
                                        <button class="btn btn-success btn-sm" id="clock-in"><?php echo app('translator')->getFromJson('modules.attendance.clock_in'); ?></button>
                                    <?php endif; ?>
                                    <?php if(!is_null($currenntClockIn) && is_null($currenntClockIn->clock_out_time)): ?>
                                        <button class="btn btn-danger btn-sm" id="clock-out"><?php echo app('translator')->getFromJson('modules.attendance.clock_out'); ?></button>
                                    <?php endif; ?>
                                </div>
                            <?php else: ?>
                                <div class="col-xs-12">
                                    <div class="alert alert-info"><?php echo app('translator')->getFromJson('modules.attendance.maxColckIn'); ?></div>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="col-xs-12">
                                <div class="alert alert-info alert-dismissable">
                                    <b><?php echo app('translator')->getFromJson('modules.dashboard.holidayCheck'); ?> <?php echo e(ucwords($checkTodayHoliday->occassion)); ?>.</b> </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if(in_array('tasks',$modules)): ?>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo app('translator')->getFromJson('modules.dashboard.overdueTasks'); ?></div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <ul class="list-task list-group" data-role="tasklist">
                            <li class="list-group-item" data-role="task">
                                <strong><?php echo app('translator')->getFromJson('app.title'); ?></strong> <span
                                        class="pull-right"><strong><?php echo app('translator')->getFromJson('app.dueDate'); ?></strong></span>
                            </li>
                            <?php $__empty_1 = true; $__currentLoopData = $pendingTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <li class="list-group-item row" data-role="task">
                                    <div class="col-xs-8">
                                        <?php echo e(($key+1).'. '.ucfirst($task->heading)); ?>

                                    </div>
                                    <label class="label label-danger pull-right col-xs-4"><?php echo e($task->due_date->format($global->date_format)); ?></label>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <li class="list-group-item" data-role="task">
                                    <?php echo app('translator')->getFromJson('messages.noOpenTasks'); ?>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>

    <div class="row" >

        <?php if(in_array('projects',$modules)): ?>
        <div class="col-md-6" id="project-timeline">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo app('translator')->getFromJson('modules.dashboard.projectActivityTimeline'); ?></div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="steamline">
                            <?php $__currentLoopData = $projectActivities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="sl-item">
                                    <div class="sl-left"><i class="fa fa-circle text-info"></i>
                                    </div>
                                    <div class="sl-right">
                                        <div><h6><a href="<?php echo e(route('member.projects.show', $activity->project_id)); ?>" class="text-danger"><?php echo e(ucwords($activity->project_name)); ?>:</a> <?php echo e($activity->activity); ?></h6> <span class="sl-date"><?php echo e($activity->created_at->timezone($global->timezone)->diffForHumans()); ?></span></div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if(in_array('employees',$modules)): ?>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo app('translator')->getFromJson('modules.dashboard.userActivityTimeline'); ?></div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="steamline">
                            <?php $__empty_1 = true; $__currentLoopData = $userActivities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="sl-item">
                                    <div class="sl-left">
                                        <?php echo ($activity->user->image) ? '<img src="'.asset('user-uploads/avatar/'.$activity->user->image).'"
                                                                    alt="user" class="img-circle">' : '<img src="'.asset('default-profile-2.png').'"
                                                                    alt="user" class="img-circle">'; ?>

                                    </div>
                                    <div class="sl-right">
                                        <div class="m-l-40"><a href="<?php echo e(route('member.employees.show', $activity->user_id)); ?>" class="text-success"><?php echo e(ucwords($activity->user->name)); ?></a> <span  class="sl-date"><?php echo e($activity->created_at->timezone($global->timezone)->diffForHumans()); ?></span>
                                            <p><?php echo ucfirst($activity->activity); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php if(count($userActivities) > ($key+1)): ?>
                                    <hr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div><?php echo app('translator')->getFromJson('messages.noActivityByThisUser'); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>



    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script>
    $('#clock-in').click(function () {
        var workingFrom = $('#working_from').val();

        var token = "<?php echo e(csrf_token()); ?>";

        $.easyAjax({
            url: '<?php echo e(route('member.attendances.store')); ?>',
            type: "POST",
            data: {
                working_from: workingFrom,
                _token: token
            },
            success: function (response) {
                if(response.status == 'success'){
                    window.location.reload();
                }
            }
        })
    })

    <?php if(!is_null($currenntClockIn)): ?>
    $('#clock-out').click(function () {

        var token = "<?php echo e(csrf_token()); ?>";

        $.easyAjax({
            url: '<?php echo e(route('member.attendances.update', $currenntClockIn->id)); ?>',
            type: "PUT",
            data: {
                _token: token
            },
            success: function (response) {
                if(response.status == 'success'){
                    window.location.reload();
                }
            }
        })
    })
    <?php endif; ?>

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.member-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>