<div class="col-md-12">
    <hr>
    <div class="form-group">
        <label class="control-label"><?php echo app('translator')->getFromJson("modules.tasks.columnName"); ?></label>
        <input type="text" name="column_name" class="form-control" value="<?php echo e($boardColumn->column_name); ?>">
    </div>
</div>
<!--/span-->

<div class="col-md-4">
    <div class="form-group">
        <label><?php echo app('translator')->getFromJson("modules.tasks.labelColor"); ?></label><br>
        <input type="text" class="colorpicker form-control"  name="label_color" value="<?php echo e($boardColumn->label_color); ?>" />
    </div>
</div>


<div class="col-md-3">
    <div class="form-group">
        <label><?php echo app('translator')->getFromJson("modules.tasks.position"); ?></label><br>
        <select class="form-control" name="priority" id="priority">
            <?php for($i=1; $i<= $maxPriority; $i++): ?>
                <option <?php if($i == $boardColumn->priority): ?> selected <?php endif; ?>><?php echo e($i); ?></option>
            <?php endfor; ?>
        </select>
    </div>
</div>



<div class="col-md-12">
    <div class="form-group">
        <button class="btn btn-success" id="update-form" data-column-id="<?php echo e($boardColumn->id); ?>" type="submit"><i class="fa fa-check"></i> <?php echo app('translator')->getFromJson('app.save'); ?></button>

        <button class="btn btn-danger" id="close-form" type="button"><i class="fa fa-times"></i> <?php echo app('translator')->getFromJson('app.close'); ?></button>
    </div>
</div>
<!--/span-->

<script>
    $('#close-form').click(function () {
        $('#edit-column-form').hide();
    })
</script>