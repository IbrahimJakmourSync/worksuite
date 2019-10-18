<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title"><?php echo app('translator')->getFromJson('modules.invoices.tax'); ?></h4>
</div>
<div class="modal-body">
    <div class="portlet-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo app('translator')->getFromJson('modules.invoices.taxName'); ?></th>
                    <th><?php echo app('translator')->getFromJson('modules.invoices.rate'); ?> %</th>
                </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr id="tax-<?php echo e($tax->id); ?>">
                        <td><?php echo e($key+1); ?></td>
                        <td><?php echo e(ucwords($tax->tax_name)); ?></td>
                        <td><?php echo e($tax->rate_percent); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="3"><?php echo app('translator')->getFromJson('messages.noRecordFound'); ?></td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        <hr>
        <?php echo Form::open(['id'=>'createTax','class'=>'ajax-form','method'=>'POST']); ?>

        <div class="form-body">
            <div class="row">
                <div class="col-xs-6 ">
                    <div class="form-group">
                        <label><?php echo app('translator')->getFromJson('modules.invoices.taxName'); ?></label>
                        <input type="text" name="tax_name" id="tax_name" class="form-control">
                    </div>
                </div>
                <div class="col-xs-6 ">
                    <div class="form-group">
                        <label><?php echo app('translator')->getFromJson('modules.invoices.rate'); ?> %</label>
                        <input type="text" name="rate_percent" id="rate_percent" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <button type="button" id="save-tax" class="btn btn-success"> <i class="fa fa-check"></i> <?php echo app('translator')->getFromJson('app.save'); ?></button>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>

<script>
    $('#createTax').submit(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.taxes.store')); ?>',
            container: '#createProjectCategory',
            type: "POST",
            data: $('#createTax').serialize(),
            success: function (response) {
                if(response.status == 'success'){
                    window.location.reload();
                }
            }
        })
        return false;
    })

    $('.delete-tax').click(function () {
        var id = $(this).data('tax-id');
        var url = "<?php echo e(route('admin.taxes.destroy',':id')); ?>";
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
                    $('#tax-'+id).fadeOut();
                }
            }
        });
    });

    $('#save-tax').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.taxes.store')); ?>',
            container: '#createTax',
            type: "POST",
            data: $('#createTax').serialize(),
            success: function (response) {
                if(response.status == 'success'){
                    window.location.reload();
                }
            }
        })
    });
</script>