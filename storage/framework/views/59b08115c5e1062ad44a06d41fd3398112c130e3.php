<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">

<!--/span-->

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title"><i class="ti-plus"></i> <?php echo app('translator')->getFromJson("modules.lead.leadFollowUp"); ?></h4>
</div>
<div class="modal-body">
    <div class="portlet-body">
        <?php echo Form::open(['id'=>'followUpForm','class'=>'ajax-form','method'=>'POST']); ?>


            <div class="form-body">
                <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label"><?php echo app('translator')->getFromJson("modules.lead.leadFollowUp"); ?></label>
                        <input type="text" autocomplete="off" name="next_follow_up_date" id="next_follow_up_date" class="form-control datepicker" value="">
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?php echo app('translator')->getFromJson("modules.lead.remark"); ?></label>
                        <textarea id="followRemark" name="remark" class="form-control"></textarea>
                    </div>
                </div>
                <!--/span-->
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-success" id="postFollowUpForm"  type="button"><i class="fa fa-check"></i> <?php echo app('translator')->getFromJson('app.save'); ?></button>

                        <button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fa fa-times"></i> <?php echo app('translator')->getFromJson('app.close'); ?></button>
                    </div>
                </div>
            </div>
            </div>
    <?php echo Form::hidden('lead_id', $leadID); ?>

        <?php echo Form::close(); ?>

        <!--/row-->
    </div>
</div>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
<script>
    jQuery('#next_follow_up_date').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    //    update task
    $('#postFollowUpForm').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.leads.follow-up-store')); ?>',
            container: '#followUpForm',
            type: "POST",
            data: $('#followUpForm').serialize(),
            success: function (response) {
                $('#followUpModal').modal('hide');
                window.location.reload();
            }
        });

        return false;
    });
</script>