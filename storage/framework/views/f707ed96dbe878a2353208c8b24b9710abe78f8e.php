<div class="panel panel-default">
    <div class="panel-heading "><i class="ti-plus"></i> <?php echo app('translator')->getFromJson('modules.timeLogs.startTimer'); ?>
        <div class="panel-action">
            <a href="javascript:;" class="close" data-dismiss="modal"><i class="ti-close"></i></a>
        </div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <?php echo Form::open(['id'=>'startTimer','class'=>'ajax-form','method'=>'POST', 'onSubmit' => 'return false']); ?>

            <?php if((isset($tasks) && count($tasks) > 0) || (isset($projects) && count($projects) > 0) ): ?>
            <div class="form-body">
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">
                                <?php if($logTimeFor->log_time_for == 'task'): ?>
                                    <?php echo app('translator')->getFromJson('modules.timeLogs.selectTask'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->getFromJson('modules.timeLogs.selectProject'); ?>
                                <?php endif; ?>
                                </label>
                            <?php if($logTimeFor->log_time_for == 'task'): ?>
                                <select class="select2 form-control" name="project_id" data-placeholder="<?php echo app('translator')->getFromJson('app.selectTask'); ?>" id="task_id">
                                    <option value=""></option>
                                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($task->id); ?>"><?php echo e(ucwords($task->heading)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            <?php else: ?>
                                <select class="form-control" name="project_id" id="project_id" >
                                    <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php if(!is_null($project->project)): ?>
                                        <option value="<?php echo e($project->project_id); ?>"><?php echo e(ucwords($project->project->project_name)); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <option value=""><?php echo app('translator')->getFromJson('messages.noProjectAssigned'); ?></option>
                                    <?php endif; ?>
                                </select>
                            <?php endif; ?>

                        </div>
                    </div>
                    <!--/span-->

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label"><?php echo app('translator')->getFromJson('modules.timeLogs.memo'); ?></label>
                            <input type="text" id="memo" name="memo" class="form-control">
                        </div>
                    </div>

                    <!--/span-->

                </div>
                <!--/row-->

            </div>
            <div class="form-actions">
                <button type="button" id="start-timer-btn" class="btn btn-success"><i class="fa fa-check"></i> <?php echo app('translator')->getFromJson('modules.timeLogs.startTimer'); ?></button>
            </div>
            <?php echo Form::close(); ?>

            <?php else: ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <p>
                                <?php if((isset($tasks) && count($tasks) == 0)): ?>
                                    <?php echo app('translator')->getFromJson('modules.timeLogs.noProjectFound'); ?>
                                <?php endif; ?>
                                <?php if(isset($projects) && count($projects) == 0): ?>
                                <?php echo app('translator')->getFromJson('modules.timeLogs.noTaskFound'); ?>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>

    function updateTimer() {
        var $worked = $("#active-timer");
        var myTime = $worked.html();
        var ss = myTime.split(":");
//            console.log(ss);

        var hours = ss[0];
        var mins = ss[1];
        var secs = ss[2];
        secs = parseInt(secs)+1;

        if(secs > 59){
            secs = '00';
            mins = parseInt(mins)+1;
        }

        if(mins > 59){
            secs = '00';
            mins = '00';
            hours = parseInt(hours)+1;
        }

        if(hours.toString().length < 2) {
            hours = '0'+hours;
        }
        if(mins.toString().length < 2) {
            mins = '0'+mins;
        }
        if(secs.toString().length < 2) {
            secs = '0'+secs;
        }
        var ts = hours+':'+mins+':'+secs;

//            var dt = new Date();
//            dt.setHours(ss[0]);
//            dt.setMinutes(ss[1]);
//            dt.setSeconds(ss[2]);
//            var dt2 = new Date(dt.valueOf() + 1000);
//            var ts = dt2.toTimeString().split(" ")[0];
        $worked.html(ts);
        setTimeout(updateTimer, 1000);
    }

    //    save new task
    $('#start-timer-btn').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('member.time-log.store')); ?>',
            container: '#startTimer',
            type: "POST",
            data: $('#startTimer').serialize(),
            success: function (data) {
                $('#timer-section').html(data.html);
                $('#projectTimerModal').modal('hide');
                $('#projectTimerModal .modal-body').html('Loading...');
                updateTimer();
                var activeTimerCountContent = $('#activeCurrentTimerCount');
                activeTimerCountContent.html(parseInt(activeTimerCountContent.html())+1);
            }
        })
    });

</script>
