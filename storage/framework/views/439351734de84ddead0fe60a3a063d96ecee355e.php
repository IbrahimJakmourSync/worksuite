<div id="event-detail">

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><i class="ti-eye"></i> <?php echo app('translator')->getFromJson('app.menu.leaves'); ?> <?php echo app('translator')->getFromJson('app.details'); ?></h4>
    </div>
    <div class="modal-body">
        <?php echo Form::open(['id'=>'updateEvent','class'=>'ajax-form','method'=>'GET']); ?>

        <div class="form-body">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="form-group">
                        <label><?php echo app('translator')->getFromJson('modules.leaves.applicantName'); ?></label>
                        <p>
                            <?php echo e(ucwords($leave->user->name)); ?>

                        </p>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-12 ">
                    <div class="form-group">
                        <label><?php echo app('translator')->getFromJson('app.date'); ?></label>
                        <p><?php echo e($leave->leave_date->format($global->date_format)); ?> <label class="label label-<?php echo e($leave->type->color); ?>"><?php echo e(ucwords($leave->type->type_name)); ?></label>
                            <?php if($leave->duration == 'half day'): ?>
                                <label class="label label-info"><?php echo e(ucwords($leave->duration)); ?></label>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="form-group">
                        <label><?php echo app('translator')->getFromJson('modules.leaves.reason'); ?></label>
                        <p><?php echo $leave->reason; ?></p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label><?php echo app('translator')->getFromJson('app.status'); ?></label>
                        <p>
                            <?php if($leave->status == 'approved'): ?>
                                <strong class="text-success">Approved</strong>
                            <?php elseif($leave->status == 'pending'): ?>
                                <strong class="text-warning">Pending</strong>
                            <?php else: ?>
                                <strong class="text-danger">Rejected</strong>
                            <?php endif; ?>

                        </p>
                    </div>
                </div>

                <?php if(!is_null($leave->reject_reason)): ?>
                    <div class="col-md-12 ">
                        <div class="form-group">
                            <label><?php echo app('translator')->getFromJson('app.reject'); ?> <?php echo app('translator')->getFromJson('app.reason'); ?></label>
                            <p><?php echo $leave->reject_reason; ?></p>
                        </div>
                    </div>
                <?php endif; ?>
    

            </div>
        </div>
        <?php echo Form::close(); ?>


    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
        <?php if($leave->status == 'pending'): ?>
            <button type="button" class="btn btn-danger btn-outline delete-event waves-effect waves-light"><i class="fa fa-times"></i> <?php echo app('translator')->getFromJson('app.delete'); ?></button>
            <button type="button" class="btn btn-info save-event waves-effect waves-light"><i class="fa fa-edit"></i> <?php echo app('translator')->getFromJson('app.edit'); ?></button>
        <?php endif; ?>
    </div>

</div>

<script>

    $('.save-event').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('member.leaves.edit', $leave->id)); ?>',
            container: '#updateEvent',
            type: "GET",
            data: $('#updateEvent').serialize(),
            success: function (response) {
                if(response.status == 'success'){
                    $('#event-detail').html(response.view);
                }
            }
        })
    })

    $('.delete-event').click(function(){
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

                var url = "<?php echo e(route('member.leaves.destroy', $leave->id)); ?>";

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