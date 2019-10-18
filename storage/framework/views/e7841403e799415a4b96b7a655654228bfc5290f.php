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
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/timepicker/bootstrap-timepicker.min.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/multiselect/css/multi-select.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bootstrap-colorselector/bootstrap-colorselector.min.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/morrisjs/morris.css')); ?>">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">

        <?php if($user->can('view_leave')): ?>
        <div class="sttabs tabs-style-line col-md-12">
            <div class="white-box">
                <nav>
                    <ul>
                        <li  class="tab-current"><a href="<?php echo e(route('member.leaves.index')); ?>"><span><?php echo app('translator')->getFromJson('modules.leaves.myLeaves'); ?></span></a>
                        </li>
                        <li><a href="<?php echo e(route('member.leaves-dashboard.index')); ?>"><span><?php echo app('translator')->getFromJson('app.menu.dashboard'); ?></span></a>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
        <?php endif; ?>

        <div class="col-md-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-4">
                        <ul class="basic-list">
                            <?php $__empty_1 = true; $__currentLoopData = $leaveTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leaveType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <li><?php echo e(ucfirst($leaveType->type_name)); ?>

                                    <span class="pull-right label-<?php echo e($leaveType->color); ?> label"><?php echo e((isset($leaveType->leavesCount[0])) ? $leaveType->leavesCount[0]->count : '0'); ?></span>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <li><?php echo app('translator')->getFromJson('messages.noRecordFound'); ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <div class="col-md-3 col-md-offset-1 text-center"><span class="donut" data-peity='{ "fill": ["red", "#eeeeee"],    "innerRadius": 40, "radius": 60 }'><?php echo e(count($leaves)); ?>/<?php echo e($allowedLeaves); ?></span><br>
                        <div class="btn btn-inverse btn-rounded"><?php echo app('translator')->getFromJson('modules.leaves.leavesTaken'); ?> : <?php echo e(count($leaves)); ?>/<?php echo e($allowedLeaves); ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo app('translator')->getFromJson('modules.leaves.pendingLeaves'); ?></div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <ul class="list-task list-group" data-role="tasklist">
                            <?php $__empty_1 = true; $__currentLoopData = $pendingLeaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$pendingLeave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <li class="list-group-item" data-role="task">
                                    <?php echo e(($key+1)); ?>. <strong><?php echo e(ucwords($pendingLeave->user->name)); ?></strong> for <?php echo e($pendingLeave->leave_date->format($global->date_format)); ?>

                                    <br>
                                    <div class="m-t-10"></div>

                                    <a href="javascript:;" data-leave-id="<?php echo e($pendingLeave->id); ?>" data-leave-action="rejected" class="btn btn-xs btn-danger btn-rounded leave-action"><i class="fa fa-times"></i> <?php echo app('translator')->getFromJson('app.cancel'); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php echo app('translator')->getFromJson('messages.noPendingLeaves'); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="white-box">
                <div class="row">
                    <h3 class="box-title col-md-3"><?php echo app('translator')->getFromJson('app.menu.leaves'); ?></h3>

                    <div class="col-md-9 text-right">
                        <div class="form-group">
                            <a href="<?php echo e(route('member.leaves.create')); ?>" class="btn btn-sm btn-success waves-effect waves-light">
                                <i class="ti-plus"></i> <?php echo app('translator')->getFromJson('modules.leaves.applyLeave'); ?>
                            </a>

                        </div>

                    </div>

                </div>


                <div class="table-responsive">
                    <table class="table table-bordered table-hover toggle-circle default footable-loaded footable" id="leaves-table">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('app.id'); ?></th>
                            <th><?php echo app('translator')->getFromJson('modules.leaves.leaveType'); ?></th>
                            <th><?php echo app('translator')->getFromJson('app.date'); ?></th>
                            <th><?php echo app('translator')->getFromJson('app.status'); ?></th>
                            <th><?php echo app('translator')->getFromJson('app.action'); ?></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- .row -->

    
    <div class="modal fade bs-modal-md in" id="eventDetailModal" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modal-data-application">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading"></span>
                </div>
                <div class="modal-body">
                    Loading...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn blue">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>

<script>

    function getEventDetail(id) {
        var url = '<?php echo e(route('member.leaves.show', ':id')); ?>';
        url = url.replace(':id', id);

        $('#modelHeading').html('Event');
        $.ajaxModal('#eventDetailModal', url);
    }

    $('.leave-action').click(function () {
        var action = $(this).data('leave-action');
        var leaveId = $(this).data('leave-id');
        var url = '<?php echo e(route("member.leaves.leaveAction")); ?>';

        $.easyAjax({
            type: 'POST',
            url: url,
            data: { 'action': action, 'leaveId': leaveId, '_token': '<?php echo e(csrf_token()); ?>' },
            success: function (response) {
                if(response.status == 'success'){
                    window.location.reload();
                }
            }
        });
    });

    $(function() {
        var table = $('#leaves-table').dataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            stateSave: true,
            ajax: '<?php echo route('member.leaves.data'); ?>',
            language: {
                "url": "<?php echo __("app.datatable") ?>"
            },
            "fnDrawCallback": function( oSettings ) {
                $("body").tooltip({
                    selector: '[data-toggle="tooltip"]'
                });
            },
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'type', name: 'type' },
                { data: 'leave_date', name: 'leave_date' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', width: '15%' }
            ]
        });
    });

    $('body').on('click', '.sa-params', function(){
        var id = $(this).data('user-id');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover the deleted leave application!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function(isConfirm){
            if (isConfirm) {
                var url = "<?php echo e(route('member.leaves.destroy',':id')); ?>";
                url = url.replace(':id', id);
                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {'_token': token, '_method': 'DELETE'},
                    success: function (response) {
                        if (response.status == "success") {
                            window.location.reload();
                        }
                    }
                });
            }
        });
    });

</script>

<script src="<?php echo e(asset('plugins/bower_components/moment/moment.js')); ?>"></script>

<script src="<?php echo e(asset('plugins/bower_components/peity/jquery.peity.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/peity/jquery.peity.init.js')); ?>"></script>

<script src="<?php echo e(asset('plugins/bower_components/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.member-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>