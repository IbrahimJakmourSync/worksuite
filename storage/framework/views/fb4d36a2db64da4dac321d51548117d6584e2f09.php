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
                <li class="active"><?php echo e($pageTitle); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/calendar/dist/fullcalendar.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/morrisjs/morris.css')); ?>"><!--Owl carousel CSS -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/owl.carousel/owl.carousel.min.css')); ?>"><!--Owl carousel CSS -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/owl.carousel/owl.theme.default.css')); ?>"><!--Owl carousel CSS -->

<style>
    .col-in {
        padding: 0 20px !important;

    }

    .fc-event{
        font-size: 10px !important;
    }

</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="white-box">
            <div class="col-in row">
                <h3 class="box-title">Total Companies</h3>
                <ul class="list-inline two-part">
                    <li><i class="icon-layers text-success"></i></li>
                    <li class="text-right"><span class="counter"><?php echo e($totalCompanies); ?></span></li>
                </ul>
            </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="white-box">
            <div class="col-in row">
                <h3 class="box-title">Active Companies</h3>
                <ul class="list-inline two-part">
                    <li><i class="icon-layers text-success"></i></li>
                    <li class="text-right"><span class="counter"><?php echo e($activeCompanies); ?></span></li>
                </ul>
            </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="white-box">
            <div class="col-in row">
                <h3 class="box-title">Licence Expired</h3>
                <ul class="list-inline two-part">
                    <li><i class="icon-layers text-success"></i></li>
                    <li class="text-right"><span class="counter"><?php echo e($expiredCompanies); ?></span></li>
                </ul>
            </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="white-box">
            <div class="col-in row">
                <h3 class="box-title">Inactive Companies</h3>
                <ul class="list-inline two-part">
                    <li><i class="icon-layers text-success"></i></li>
                    <li class="text-right"><span class="counter"><?php echo e($inactiveCompanies); ?></span></li>
                </ul>
            </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-3 col-sm-6">
            <div class="white-box">
                <div class="col-in row">
                    <h3 class="box-title">Total Packages</h3>
                    <ul class="list-inline two-part">
                        <li><i class="icon-layers text-success"></i></li>
                        <li class="text-right"><span class="counter"><?php echo e($totalPackages); ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <ul class="list-inline text-center m-t-40">
                    <li>
                        <h5><i class="fa fa-circle m-r-5" style="color:rgb(13, 219, 228);"></i>Earning's</h5>
                    </li>
                </ul>
                <div id="morris-area-chart" style="height: 340px;"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Recent Registered Companies</h3>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Package</th>
                            <th class="text-center">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $recentRegisteredCompanies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="text-center"><?php echo e($key + 1); ?> </td>
                                <td class="text-center"><?php echo e($recent->company_name); ?> </td>
                                <td class="text-center"><?php echo e($recent->company_email); ?> </td>
                                <td class="text-center"><?php echo e(ucwords($recent->package->name)); ?> (<?php echo e(ucwords($recent->package_type)); ?>) </td>
                                <td class="text-center"><?php echo e($recent->created_at->format('M j, Y')); ?> </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr class="text-center">
                                <td colspan="4">No data found</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Recent Subscriptions</h3>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Company</th>
                            <th class="text-center">Package</th>
                            <th class="text-center">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $recentSubscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="text-center"><?php echo e($key + 1); ?> </td>
                                <td class="text-center"><?php echo e($recent->company->company_name); ?> </td>
                                <td class="text-center"><?php echo e(ucwords($recent->company->package->name)); ?> (<?php echo e(ucwords($recent->company->package_type)); ?>) </td>
                                <td class="text-center"><?php echo e($recent->created_at->format('M j, Y')); ?> </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr class="text-center">
                                <td colspan="4">No data found</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Recent Licence Expired Companies</h3>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Company</th>
                            <th class="text-center">Package</th>
                            <th class="text-center">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $recentExpired; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="text-center"><?php echo e($key + 1); ?> </td>
                                <td class="text-center"><?php echo e($recent->company_name); ?> </td>
                                <td class="text-center"><?php echo e(ucwords($recent->package->name)); ?> (<?php echo e(ucwords($recent->package_type)); ?>) </td>
                                <td class="text-center"><?php echo e($recent->updated_at->format('M j, Y')); ?> </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr class="text-center">
                                <td colspan="4">No data found</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('footer-script'); ?>

<script src="<?php echo e(asset('plugins/bower_components/raphael/raphael-min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/morrisjs/morris.js')); ?>"></script>

<script src="<?php echo e(asset('plugins/bower_components/waypoints/lib/jquery.waypoints.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/counterup/jquery.counterup.min.js')); ?>"></script>

<!-- jQuery for carousel -->
<script src="<?php echo e(asset('plugins/bower_components/owl.carousel/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/owl.carousel/owl.custom.js')); ?>"></script>

<!--weather icon -->
<script src="<?php echo e(asset('plugins/bower_components/skycons/skycons.js')); ?>"></script>

<script src="<?php echo e(asset('plugins/bower_components/calendar/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/moment/moment.js')); ?>"></script>

<script>
    $(document).ready(function () {
        var chartData = <?php echo $chartData; ?>;

        Morris.Area({
            element: 'morris-area-chart',
            data: chartData,
            lineColors: ['#01c0c8'],
            xkey: ['month'],
            ykeys: ['amount'],
            labels: ['Earning'],
            pointSize: 0,
            lineWidth: 0,
            resize:true,
            fillOpacity: 0.8,
            behaveLikeLine: true,
            gridLineColor: '#e0e0e0',
            hideHover: 'auto',
            parseTime: false
        });

        $('.vcarousel').carousel({
            interval: 3000
        })
    });

    $(".counter").counterUp({
        delay: 100,
        time: 1200
    });

</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.super-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>