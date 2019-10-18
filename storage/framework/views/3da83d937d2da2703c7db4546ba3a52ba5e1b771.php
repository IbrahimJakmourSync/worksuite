<div id="event-detail">

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><?php echo app('translator')->getFromJson('app.menu.leaves'); ?> <?php echo app('translator')->getFromJson('app.reject'); ?> <?php echo app('translator')->getFromJson('app.reason'); ?></h4>
    </div>
    <div class="modal-body">
        <?php echo Form::open(['id'=>'updateMessage','class'=>'ajax-form','method'=>'GET']); ?>

        <div class="form-body">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="form-group">
                        <label><?php echo app('translator')->getFromJson('app.reject'); ?> <?php echo app('translator')->getFromJson('app.reason'); ?>? (<?php echo app('translator')->getFromJson('app.optional'); ?>)</label>
                        <textarea name="reason"  id="reason"  rows="5" class="form-control"></textarea>
                    </div>
                </div>

            </div>
        </div>
        <?php echo Form::close(); ?>


    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white waves-effect" data-dismiss="modal"><?php echo app('translator')->getFromJson('app.close'); ?></button>
        <button type="button" class="btn btn-danger save-event waves-effect waves-light"> <?php echo app('translator')->getFromJson('app.reject'); ?>
        </button>
    </div>

</div>

<script>

    $('.save-event').click(function () {
        var url = '<?php echo e(route("admin.leaves.leaveAction")); ?>';
        var action = '<?php echo e($leaveAction); ?>';
        var leaveId = '<?php echo e($leaveID); ?>';
        var reason = $('#reason').val();

        $.easyAjax({
            type: 'POST',
            url: url,
            data: { 'action': action, 'leaveId': leaveId, '_token': '<?php echo e(csrf_token()); ?>', 'reason': reason },
            success: function (response) {
                if(response.status == 'success') {
                    window.location.reload();
                }
            }
        });
    });

</script>