<section class="section" id="section-pricing">
    <div class="container">

        <header class="section-header">
            <h2>Affordable Pricing</h2>
            <hr>
            <p class="lead">Slack for Teams is a single workspace for your small- to medium-sized company or team.</p>
        </header>


        <div class="text-center mb-70">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-round btn-outline btn-dark w-150 active">
                    <input type="radio" onchange="planShow('monthly')" name="pricing" value="monthly" autocomplete="off" checked> Monthly
                </label>
                <label class="btn btn-round btn-outline btn-dark w-150">
                    <input type="radio" onchange="planShow('yearly')" name="pricing" value="yearly" autocomplete="off"> Yearly
                </label>
            </div>
        </div>


        <div id="monthlyPlan" class="row gap-y text-center">
            <?php $color = ''; ?> <?php $btn = 'btn-primary'; ?>
            <?php $__empty_1 = true; $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <div class="col-12 col-md-4">
                    <div class="pricing-1">
                        <p class="plan-name"><?php echo e($package->name); ?></p>
                        <br>
                        <h2 class="price <?php echo e($color); ?>">
                            <?php if($package->monthly_price != 0): ?> <span class="price-unit">$</span> <?php endif; ?>
                            <?php if($package->monthly_price == 0): ?> free <?php else: ?> <?php echo e($package->monthly_price); ?> <?php endif; ?>
                        </h2>

                        <p><small class="opacity-50"><?php echo e($package->description); ?></small></p>

                        <small>Max storage size <?php echo e($package->formatSizeUnits($package->max_storage_size)); ?></small><br>
                        <small>Max file size <?php echo e($package->max_file_size); ?></small><br>
                        <small>Billing cycle <?php echo e($package->billing_cycle); ?></small><br>
                        <small>Max employees <?php echo e($package->max_employees); ?></small><br>
                        <br>
                        <p class="text-center py-3"><a class="btn <?php echo e($btn); ?>" href="<?php echo e(route('front.signup.index')); ?>">Register</a></p>
                    </div>
                </div>
                <?php if($color == ''): ?>
                    <?php $color = 'text-success';$btn = 'btn-success'; ?>
                <?php else: ?>
                    <?php $color = ''; $btn = 'btn-primary'; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <?php endif; ?>
        </div>
        <div class="row gap-y text-center" style="display: none" id="annualPlan">

            <?php $__empty_1 = true; $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-12 col-md-4">
                    <div class="pricing-1">
                        <p class="plan-name"><?php echo e($package->name); ?></p>
                        <br>
                        <h2 class="price <?php echo e($color); ?>">
                            <?php if($package->annual_price != 0): ?> <span class="price-unit">$</span> <?php endif; ?>
                            <?php if($package->annual_price == 0): ?> free <?php else: ?> <?php echo e($package->annual_price); ?> <?php endif; ?>
                        </h2>

                        <p><small class="opacity-50"><?php echo e($package->description); ?></small></p>

                        <small>Max storage size <?php echo e($package->formatSizeUnits($package->max_storage_size)); ?></small><br>
                        <small>Max file size <?php echo e($package->max_file_size); ?></small><br>
                        <small>Billing cycle <?php echo e($package->billing_cycle); ?></small><br>
                        <small>Max employees <?php echo e($package->max_employees); ?></small><br>
                        <br>
                        <p class="text-center py-3"><a class="btn <?php echo e($btn); ?>" href="<?php echo e(route('front.signup.index')); ?>">Register</a></p>
                    </div>
                </div>
                <?php if($color == ''): ?>
                    <?php $color = 'text-success';$btn = 'btn-success'; ?>
                <?php else: ?>
                    <?php $color = ''; $btn = 'btn-primary'; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <?php endif; ?>


        </div>


    </div>
</section>