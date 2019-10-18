<?php $__empty_1 = true; $__currentLoopData = $lead->follow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <a href="javascript:;" data-follow-id="<?php echo e($follow->id); ?>" class="list-group-item edit-task">
        <h4 class="list-group-item-heading sbold"><?php echo app('translator')->getFromJson('app.createdOn'); ?>: <?php echo e($follow->created_at->toFormattedDateString()); ?></h4>
        <p class="list-group-item-text">
        <div class="row margin-top-5">
            <div class="col-md-12">
                <?php echo app('translator')->getFromJson('app.remark'); ?>: <br>
                <?php echo ($follow->remark != '') ? ucfirst($follow->remark) : "<span class='font-red'>Empty</span>"; ?>

            </div>
        </div>
        <div class="row margin-top-5">
            <div class="col-md-6">
            </div>
            <div class="col-md-6">
                <?php echo app('translator')->getFromJson('app.next_follow_up'); ?>: <?php echo e($follow->next_follow_up_date->toFormattedDateString()); ?>

            </div>
        </div>
        </p>
    </a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <a href="javascript:;" class="list-group-item">
        <h4 class="list-group-item-heading sbold"><?php echo app('translator')->getFromJson('modules.followup.followUpNotFound'); ?></h4>
    </a>
<?php endif; ?>