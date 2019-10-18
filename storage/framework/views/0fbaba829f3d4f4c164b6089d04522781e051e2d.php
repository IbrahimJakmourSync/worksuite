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
                <li><a href="<?php echo e(route('client.dashboard.index')); ?>"><?php echo app('translator')->getFromJson('app.menu.home'); ?></a></li>
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

        .panel-wrapper{
            height: 500px;
            overflow-y: auto;
        }

    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row dashboard-stats">
        <?php if(in_array('projects',$modules)): ?>
        <div class="col-md-3 col-sm-6">
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-3">
                        <div>
                            <span class="bg-info-gradient"><i class="icon-layers"></i></span>
                        </div>
                    </div>
                    <div class="col-sm-9 text-right">
                        <span class="widget-title"> <?php echo app('translator')->getFromJson('modules.dashboard.totalProjects'); ?></span><br>
                        <span class="counter"><?php echo e($counts->totalProjects); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if(in_array('tickets',$modules)): ?>
        <div class="col-md-3 col-sm-6">
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-3">
                        <div>
                            <span class="bg-warning-gradient"><i class="ti-ticket"></i></span>
                        </div>
                    </div>
                    <div class="col-sm-9 text-right">
                        <span class="widget-title"> <?php echo app('translator')->getFromJson('modules.tickets.totalUnresolvedTickets'); ?></span><br>
                        <span class="counter"><?php echo e($counts->totalUnResolvedTickets); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if(in_array('invoices',$modules)): ?>
        <div class="col-md-3 col-sm-6">
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-3">
                        <div>
                            <span class="bg-success-gradient"><i class="ti-ticket"></i></span>
                        </div>
                    </div>
                    <div class="col-sm-9 text-right">
                        <span class="widget-title"> <?php echo app('translator')->getFromJson('modules.dashboard.totalPaidAmount'); ?></span><br>
                        <span class="counter"><?php echo e(floor($counts->totalPaidAmount)); ?></span>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-3">
                        <div>
                            <span class="bg-danger-gradient"><i class="ti-ticket"></i></span>
                        </div>
                    </div>
                    <div class="col-sm-9 text-right">
                        <span class="widget-title"> <?php echo app('translator')->getFromJson('modules.dashboard.totalOutstandingAmount'); ?></span><br>
                        <span class="counter"><?php echo e(floor($counts->totalUnpaidAmount)); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>
    <!-- .row -->

    <div class="row" >

        <?php if(in_array('projects',$modules)): ?>
        <div class="col-md-6" id="project-timeline">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo app('translator')->getFromJson("modules.dashboard.projectActivityTimeline"); ?></div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="steamline">
                            <?php $__currentLoopData = $projectActivities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="sl-item">
                                    <div class="sl-left"><i class="fa fa-circle text-info"></i>
                                    </div>
                                    <div class="sl-right">
                                        <div><h6><a href="<?php echo e(route('client.projects.show', $activity->project_id)); ?>" class="text-danger"><?php echo e(ucwords($activity->project_name)); ?>:</a> <?php echo e($activity->activity); ?></h6> <span class="sl-date"><?php echo e($activity->created_at->timezone($global->timezone)->diffForHumans()); ?></span></div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>