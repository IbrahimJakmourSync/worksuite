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
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo app('translator')->getFromJson('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('admin.estimates.index')); ?>"><?php echo e(__($pageTitle)); ?></a></li>
                <li class="active"><?php echo app('translator')->getFromJson('app.addNew'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-heading"> <?php echo app('translator')->getFromJson('modules.estimates.createEstimate'); ?></div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <?php echo Form::open(['id'=>'storePayments','class'=>'ajax-form','method'=>'POST']); ?>

                        <div class="form-body">

                            <div class="row">

                                <div class="col-md-4">

                                    <div class="form-group" >
                                        <label class="control-label"><?php echo app('translator')->getFromJson('app.client'); ?></label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <select class="select2 form-control" data-placeholder="Choose Client" name="client_id">
                                                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option
                                                        value="<?php echo e($client->user->id); ?>"><?php echo e(ucwords($client->user->name)); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->getFromJson('modules.invoices.currency'); ?></label>
                                        <select class="form-control" name="currency_id" id="currency_id">
                                            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($currency->id); ?>"><?php echo e($currency->currency_symbol.' ('.$currency->currency_code.')'); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->getFromJson('modules.estimates.validTill'); ?></label>
                                        <div class="input-icon">
                                            <input type="text" class="form-control" name="valid_till" id="valid_till" value="<?php echo e(Carbon\Carbon::today()->addDays(30)->format('m/d/Y')); ?>">
                                        </div>
                                    </div>

                                </div>


                            </div>


                            <hr>

                            <div class="row">

                                <div class="col-xs-12  visible-md visible-lg">

                                    <div class="col-md-4 font-bold" style="padding: 8px 15px">
                                        <?php echo app('translator')->getFromJson('modules.invoices.item'); ?>
                                    </div>

                                    <div class="col-md-2 font-bold" style="padding: 8px 15px">
                                        <?php echo app('translator')->getFromJson('modules.invoices.type'); ?>
                                    </div>

                                    <div class="col-md-1 font-bold" style="padding: 8px 15px">
                                        <?php echo app('translator')->getFromJson('modules.invoices.qty'); ?>
                                    </div>

                                    <div class="col-md-2 font-bold" style="padding: 8px 15px">
                                        <?php echo app('translator')->getFromJson('modules.invoices.unitPrice'); ?>
                                    </div>

                                    <div class="col-md-2 text-center font-bold" style="padding: 8px 15px">
                                        <?php echo app('translator')->getFromJson('modules.invoices.amount'); ?>
                                    </div>

                                    <div class="col-md-1" style="padding: 8px 15px">
                                        &nbsp;
                                    </div>

                                </div>

                                <div class="col-xs-12 item-row margin-top-5">

                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="control-label hidden-md hidden-lg"><?php echo app('translator')->getFromJson('modules.invoices.item'); ?></label>
                                                <input type="text" class="form-control item_name" name="item_name[]">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-2">

                                        <div class="form-group">
                                            <label class="control-label hidden-md hidden-lg"><?php echo app('translator')->getFromJson('modules.invoices.type'); ?></label>
                                            <select name="type[]" class="form-control type">
                                                <option value="item"><?php echo app('translator')->getFromJson('modules.invoices.item'); ?></option>
                                                <option value="discount"><?php echo app('translator')->getFromJson('modules.invoices.discount'); ?></option>
                                                <option value="tax"><?php echo app('translator')->getFromJson('modules.invoices.tax'); ?></option>
                                            </select>
                                        </div>


                                    </div>

                                    <div class="col-md-1">

                                        <div class="form-group">
                                            <label class="control-label hidden-md hidden-lg"><?php echo app('translator')->getFromJson('modules.invoices.qty'); ?></label>
                                            <input type="text" min="0" class="form-control quantity" value="0" name="quantity[]" >
                                        </div>


                                    </div>

                                    <div class="col-md-2">
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="control-label hidden-md hidden-lg"><?php echo app('translator')->getFromJson('modules.invoices.unitPrice'); ?></label>
                                                <input type="text" min="" class="form-control cost_per_item" name="cost_per_item[]" value="0" >
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-2 border-dark  text-center">
                                        <label class="control-label hidden-md hidden-lg"><?php echo app('translator')->getFromJson('modules.invoices.amount'); ?></label>

                                        <p class="form-control-static"><span class="amount-html">0.00</span></p>
                                        <input type="hidden" class="amount" name="amount[]">
                                    </div>

                                    <div class="col-md-1 text-right visible-md visible-lg">
                                        <button type="button" class="btn remove-item btn-circle btn-danger"><i class="fa fa-remove"></i></button>
                                    </div>
                                    <div class="col-md-1 hidden-md hidden-lg">
                                        <div class="row">
                                            <button type="button" class="btn btn-circle remove-item btn-danger"><i class="fa fa-remove"></i> <?php echo app('translator')->getFromJson('app.remove'); ?></button>
                                        </div>
                                    </div>

                                </div>

                                <div id="item-list">

                                </div>

                                <div class="col-xs-12 m-t-5">
                                    <button type="button" class="btn btn-info" id="add-item"><i class="fa fa-plus"></i> <?php echo app('translator')->getFromJson('modules.invoices.addItem'); ?></button>
                                </div>

                                <div class="col-xs-12 ">


                                    <div class="row">
                                        <div class="col-md-offset-9 col-xs-6 col-md-1 text-right p-t-10" ><?php echo app('translator')->getFromJson('modules.invoices.subTotal'); ?></div>

                                        <p class="form-control-static col-xs-6 col-md-2" >
                                            <span class="sub-total">0.00</span>
                                        </p>


                                        <input type="hidden" class="sub-total-field" name="sub_total" value="0">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-offset-9 col-md-1 text-right p-t-10">
                                            <?php echo app('translator')->getFromJson('modules.invoices.discount'); ?>
                                        </div>
                                        <p class="form-control-static col-xs-6 col-md-2" >
                                            <span class="discount-amount">0.00</span>
                                        </p>
                                    </div>

                                    <div class="row m-t-5">
                                        <div class="col-md-offset-9 col-md-1 text-right p-t-10">
                                            <?php echo app('translator')->getFromJson('modules.invoices.tax'); ?>
                                        </div>

                                        <p class="form-control-static col-xs-6 col-md-2" >
                                            <span class="tax-percent">0.00</span>
                                        </p>
                                    </div>

                                    <div class="row m-t-5 font-bold">
                                        <div class="col-md-offset-9 col-md-1 col-xs-6 text-right p-t-10" ><?php echo app('translator')->getFromJson('modules.invoices.total'); ?></div>

                                        <p class="form-control-static col-xs-6 col-md-2" >
                                            <span class="total">0.00</span>
                                        </p>


                                        <input type="hidden" class="total-field" name="total" value="0">
                                    </div>

                                </div>

                            </div>


                            <div class="row">

                                <div class="col-sm-12">

                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->getFromJson('app.note'); ?></label>

                                        <textarea name="note" class="form-control" rows="5"></textarea>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="form-actions" style="margin-top: 70px">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" id="save-form" class="btn btn-success"> <i class="fa fa-check"></i> <?php echo app('translator')->getFromJson('app.save'); ?></button>
                                </div>
                            </div>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- .row -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>

<script>
    $(".select2").select2({
        formatNoMatches: function () {
            return "<?php echo e(__('messages.noRecordFound')); ?>";
        }
    });

    jQuery('#valid_till').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    $('#save-form').click(function(){
        calculateTotal();

        $.easyAjax({
            url:'<?php echo e(route('admin.estimates.store')); ?>',
            container:'#storePayments',
            type: "POST",
            redirect: true,
            data:$('#storePayments').serialize()
        })
    });

    $('#add-item').click(function () {
        var item = '<div class="col-xs-12 item-row margin-top-5">'

                +'<div class="col-md-4">'
                +'<div class="row">'
                +'<div class="form-group">'
                +'<label class="control-label hidden-md hidden-lg"><?php echo app('translator')->getFromJson('modules.invoices.item'); ?></label>'
                +'<input type="text" class="form-control item_name" name="item_name[]" >'
                +'</div>'
                +'</div>'

                +'</div>'

                +'<div class="col-md-2">'

                +'<div class="form-group">'
                +'<label class="control-label hidden-md hidden-lg"><?php echo app('translator')->getFromJson('modules.invoices.type'); ?></label>'
                +'<select name="type[]" class="form-control type">'
                +'<option value="item"><?php echo app('translator')->getFromJson('modules.invoices.item'); ?></option>'
                +'<option value="discount"><?php echo app('translator')->getFromJson('modules.invoices.discount'); ?></option>'
                +'<option value="tax"><?php echo app('translator')->getFromJson('modules.invoices.tax'); ?></option>'
                +'</select>'
                +'</div>'


                +'</div>'

                +'<div class="col-md-1">'

                +'<div class="form-group">'
                +'<label class="control-label hidden-md hidden-lg"><?php echo app('translator')->getFromJson('modules.invoices.qty'); ?></label>'
                +'<input type="text" min="0" class="form-control quantity" value="0" name="quantity[]" >'
                +'</div>'


                +'</div>'

                +'<div class="col-md-2">'
                +'<div class="row">'
                +'<div class="form-group">'
                +'<label class="control-label hidden-md hidden-lg"><?php echo app('translator')->getFromJson('modules.invoices.unitPrice'); ?></label>'
                +'<input type="text" min="0" class="form-control cost_per_item" value="0" name="cost_per_item[]">'
                +'</div>'
                +'</div>'

                +'</div>'

                +'<div class="col-md-2 text-center">'
                +'<label class="control-label hidden-md hidden-lg"><?php echo app('translator')->getFromJson('modules.invoices.amount'); ?></label>'
                +'<p class="form-control-static"><span class="amount-html">0.00</span></p>'
                +'<input type="hidden" class="amount" name="amount[]">'
                +'</div>'

                +'<div class="col-md-1 text-right visible-md visible-lg">'
                +'<button type="button" class="btn remove-item btn-circle btn-danger"><i class="fa fa-remove"></i></button>'
                +'</div>'

                +'<div class="col-md-1 hidden-md hidden-lg">'
                +'<div class="row">'
                +'<button type="button" class="btn remove-item btn-danger"><i class="fa fa-remove"></i> <?php echo app('translator')->getFromJson('app.remove'); ?></button>'
                +'</div>'
                +'</div>'

                +'</div>';

        $(item).hide().appendTo("#item-list").fadeIn(500);

    });

    $('#storePayments').on('click','.remove-item', function () {
        $(this).closest('.item-row').fadeOut(300, function() {
            $(this).remove();
            calculateTotal();
        });
    });

    $('#storePayments').on('keyup','.quantity,.cost_per_item,.item_name', function () {
        var quantity = $(this).closest('.item-row').find('.quantity').val();

        var perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();

        var amount = (quantity*perItemCost);

        $(this).closest('.item-row').find('.amount').val(decimalupto2(amount));
        $(this).closest('.item-row').find('.amount-html').html(decimalupto2(amount));

        calculateTotal();


    });

    $('#storePayments').on('change','.type', function () {
        var quantity = $(this).closest('.item-row').find('.quantity').val();

        var perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();

        var amount = (quantity*perItemCost);

        $(this).closest('.item-row').find('.amount').val(decimalupto2(amount));
        $(this).closest('.item-row').find('.amount-html').html(decimalupto2(amount));

        calculateTotal();


    });

    function calculateTotal()
    {

//            calculate subtotal

        var subtotal = 0;
        var discount = 0;
        var tax = 0;
        $(".quantity").each(function (index, element) {

            var itemType = $(this).closest('.item-row').find('.type').val();
            var amount = $(this).closest('.item-row').find('.amount').val();
            if(itemType == 'item'){
                subtotal = parseFloat(subtotal)+parseFloat(amount);
            }

            if(itemType == 'discount'){
                discount = parseFloat(discount)+parseFloat(amount);
            }

            if(itemType == 'tax'){
                tax = parseFloat(tax)+parseFloat(amount);
            }

        });
        $('.sub-total').html(decimalupto2(subtotal));
        $('.sub-total-field').val(decimalupto2(subtotal));
        $('.discount-amount').html(decimalupto2(discount));


//            check service tax
        $('.tax-percent').html(tax);
        tax = parseFloat(tax);

//            calculate total
        var totalAfterDiscount = (subtotal-discount);
        var total = totalAfterDiscount+tax;

        $('.total').html(decimalupto2(total));
        $('.total-field').val(decimalupto2(total));

    }

    function decimalupto2(num) {
        var amt =  Math.round(num * 100, 2) / 100;
        return amt.toFixed(2);
    }

</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>