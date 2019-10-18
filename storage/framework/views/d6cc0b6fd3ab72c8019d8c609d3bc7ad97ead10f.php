<?php $__env->startSection('title', trans('installer_messages.requirements.title')); ?>
<?php $__env->startSection('container'); ?>
    <ul class="list">
        <li class="list__item <?php echo e($phpSupportInfo['supported'] ? 'success' : 'error'); ?>">PHP Version >= <?php echo e($phpSupportInfo['minimum']); ?></li>

        <?php $__currentLoopData = $requirements['requirements']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extention => $enabled): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="list__item <?php echo e($enabled ? 'success' : 'error'); ?>"><?php echo e($extention); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <?php if( ! isset($requirements['errors']) && $phpSupportInfo['supported'] == 'success'): ?>
        <div class="buttons">
            <a class="button" href="<?php echo e(route('LaravelInstaller::permissions')); ?>">
                <?php echo e(trans('installer_messages.next')); ?>

            </a>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendor.installer.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>