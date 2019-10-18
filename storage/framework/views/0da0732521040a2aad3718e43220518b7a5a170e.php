<footer class="site-footer">
    <div class="container">
        <div class="row gap-y align-items-center">
            <div class="col-12 col-lg-3">
                <p class="text-center text-lg-left">
                    <a href="<?php echo e(route('front.home')); ?>">
                        <?php if(is_null($setting->logo)): ?>
                            <img src="<?php echo e(asset('front/img/worksuite-logo.png')); ?>" alt="home" />
                        <?php else: ?>
                            <img src="<?php echo e(asset('user-uploads/app-logo/'.$setting->logo)); ?>" alt="home" />
                        <?php endif; ?>
                    </a>
                </p>
            </div>

            <div class="col-12 col-lg-6">
                <?php $routeName = request()->route()->getName(); ?>
                <ul class="nav nav-primary nav-hero">
                    <li class="nav-item">
                        <a class="nav-link" <?php if($routeName != 'front.home'): ?> href="<?php echo e(route('front.home').'#home'); ?>" <?php else: ?> data-scrollto="home" <?php endif; ?> >Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" <?php if($routeName != 'front.home'): ?> href="<?php echo e(route('front.home').'#section-features'); ?>" <?php else: ?>  data-scrollto="section-features" <?php endif; ?>>Features</a>
                    </li>
                    <li class="nav-item hidden-sm-down">
                        <a class="nav-link" <?php if($routeName != 'front.home'): ?> href="<?php echo e(route('front.home').'#section-pricing'); ?>" <?php else: ?>  data-scrollto="section-pricing" <?php endif; ?>>Pricing</a>
                    </li>
                    <li class="nav-item hidden-sm-down">
                        <a class="nav-link" <?php if($routeName != 'front.home'): ?> href="<?php echo e(route('front.home').'#section-contact'); ?>" <?php else: ?> data-scrollto="section-contact" <?php endif; ?>>Contact</a>
                    </li>
                </ul>
            </div>

            <div class="col-12 col-lg-3">
                <div class="social text-center text-lg-right">
                    <a class="social-facebook" href=""><i class="fa fa-facebook"></i></a>
                    <a class="social-twitter" href=""><i class="fa fa-twitter"></i></a>
                    <a class="social-instagram" href=""><i class="fa fa-instagram"></i></a>
                    <a class="social-dribbble" href=""><i class="fa fa-dribbble"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>