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
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
<style>
    select.bs-select-hidden, select.selectpicker {
        display: block!important;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="white-box">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?php if($user->can('add_payments')): ?>
                                <a href="<?php echo e(route('member.payments.create')); ?>" class="btn btn-outline btn-success btn-sm"><?php echo app('translator')->getFromJson('modules.payments.addPayment'); ?> <i class="fa fa-plus" aria-hidden="true"></i></a>
                            <?php endif; ?>
                            <?php if($user->can('view_payments')): ?>
                                <a href="javascript:;" id="toggle-filter" class="btn btn-outline btn-danger btn-sm toggle-filter"><i
                                        class="fa fa-sliders"></i> <?php echo app('translator')->getFromJson('app.filterResults'); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php if($user->can('view_payments')): ?>
                    <div class="row b-b b-t" style="display: none; background: #fbfbfb;" id="ticket-filters">
                        <div class="col-md-12">
                            <h4><?php echo app('translator')->getFromJson('app.filterBy'); ?> <a href="javascript:;" class="pull-right toggle-filter"><i class="fa fa-times-circle-o"></i></a></h4>
                        </div>
                        <form action="" id="filter-form">
                            <div class="col-md-4">
                                <h5 ><?php echo app('translator')->getFromJson('app.selectDateRange'); ?></h5>
                                <div class="input-daterange input-group" id="date-range">
                                    <input type="text" class="form-control" id="start-date" placeholder="<?php echo app('translator')->getFromJson('app.startDate'); ?>"
                                           value=""/>
                                    <span class="input-group-addon bg-info b-0 text-white"><?php echo app('translator')->getFromJson('app.to'); ?></span>
                                    <input type="text" class="form-control" id="end-date" placeholder="<?php echo app('translator')->getFromJson('app.endDate'); ?>"
                                           value=""/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <h5 ><?php echo app('translator')->getFromJson('app.status'); ?></h5>
                                <div class="form-group">
                                    
                                    <select class="form-control selectpicker" name="status" id="status" data-style="form-control">
                                        <option value="all"><?php echo app('translator')->getFromJson('app.all'); ?></option>
                                        <option value="complete"><?php echo app('translator')->getFromJson('app.completed'); ?></option>
                                        <option value="pending"><?php echo app('translator')->getFromJson('app.pending'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h5 ><?php echo app('translator')->getFromJson('app.project'); ?></h5>
                                <div class="form-group">
                                    <select class="form-control select2" name="project" id="project" data-style="form-control">
                                        <option value="all"><?php echo app('translator')->getFromJson('modules.client.all'); ?></option>
                                        <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <option value="<?php echo e($project->id); ?>"><?php echo e($project->project_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group m-t-10">
                                    <label class="control-label col-xs-12">&nbsp;</label>
                                    <button type="button" id="apply-filters" class="btn btn-success col-md-6"><i class="fa fa-check"></i> <?php echo app('translator')->getFromJson('app.apply'); ?></button>
                                    <button type="button" id="reset-filters" class="btn btn-inverse col-md-5 col-md-offset-1"><i class="fa fa-refresh"></i> <?php echo app('translator')->getFromJson('app.reset'); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover toggle-circle default footable-loaded footable" id="invoice-table">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('app.id'); ?></th>
                            <th><?php echo app('translator')->getFromJson('app.project'); ?></th>
                            <th><?php echo app('translator')->getFromJson('modules.invoices.amount'); ?></th>
                            <th><?php echo app('translator')->getFromJson('modules.payments.paidOn'); ?></th>
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

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script src="<?php echo e(asset('plugins/bower_components/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>

<script>
    $(".select2").select2({
        formatNoMatches: function () {
            return "<?php echo e(__('messages.noRecordFound')); ?>";
        }
    });
    var table;
    $(function() {

        jQuery('#date-range').datepicker({
            toggleActive: true,
            format: 'yyyy-mm-dd',
            language: '<?php echo e($global->locale); ?>',
            autoclose: true
        });
        loadTable();


        $('body').on('click', '.sa-params', function(){
            var id = $(this).data('payment-id');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover the deleted payment record!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function(isConfirm){
                if (isConfirm) {

                    var url = "<?php echo e(route('member.payments.destroy',':id')); ?>";
                    url = url.replace(':id', id);

                    var token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'POST',
                            url: url,
                            data: {'_token': token, '_method': 'DELETE'},
                        success: function (response) {
                            if (response.status == "success") {
                                $.unblockUI();
//                                    swal("Deleted!", response.message, "success");
                                table._fnDraw();
                            }
                        }
                    });
                }
            });
        });

    });
    function loadTable(){
        var startDate = $('#start-date').val();

        if (startDate == '') {
            startDate = null;
        }

        var endDate = $('#end-date').val();

        if (endDate == '') {
            endDate = null;
        }

        var status = $('#status').val();

        var project = $('#project').val();

        table = $('#invoice-table').dataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            destroy: true,
            ajax: '<?php echo route('member.payments.data'); ?>?startDate=' + startDate + '&endDate=' + endDate + '&status=' + status + '&project=' + project,
            "order": [[ 0, "desc" ]],
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
                { data: 'project_id', name: 'project_id' },
                { data: 'amount', name: 'amount' },
                { data: 'paid_on', name: 'paid_on' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', width: '10%' }
            ]
        });
    }

    $('.toggle-filter').click(function () {
        $('#ticket-filters').toggle('slide');
    })

    $('#apply-filters').click(function () {
        loadTable();
    });

    $('#reset-filters').click(function () {
        $('#filter-form')[0].reset();
        $('#filter-form').find('select').val('all');
        $('#filter-form').find('select').select2();
        loadTable();
    })

</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.member-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>