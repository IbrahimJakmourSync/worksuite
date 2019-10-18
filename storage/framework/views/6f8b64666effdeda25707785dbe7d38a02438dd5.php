<?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($member->user_id); ?>"><?php echo e(ucwords($member->user->name)); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>