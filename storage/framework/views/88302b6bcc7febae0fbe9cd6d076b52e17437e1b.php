<?php $__empty_1 = true; $__currentLoopData = $activeTimers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <tr>
        <td><?php echo e($key+1); ?></td>
        <td><?php echo e(ucwords($time->user->name)); ?></td>
        <td class="font-bold timer"><?php echo e($time->duration); ?></td>
        <td><a href="javascript:;" data-time-id="<?php echo e($time->id); ?>" class="label label-danger stop-timer">STOP</a></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <tr>
        <td colspan="3">No active timer for this project.</td>
    </tr>
<?php endif; ?>