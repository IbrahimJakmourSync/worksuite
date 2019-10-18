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
                <li><a href="<?php echo e(route('admin.invoices.index')); ?>"><?php echo e(__($pageTitle)); ?></a></li>
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    .dropdown-content {
        width: 250px;
        max-height: 250px;
        overflow-y: scroll;
        overflow-x: hidden;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-heading"> <?php echo app('translator')->getFromJson('modules.invoices.addInvoice'); ?></div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <?php echo Form::open(['id'=>'storePayments','class'=>'ajax-form','method'=>'POST']); ?>

                        <div class="form-body">

                            <div class="row">
                                <div class="col-md-4">

                                    <div class="form-group" >
                                        <label class="control-label"><?php echo app('translator')->getFromJson('app.invoice'); ?> #</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-icon">
                                                    <input type="text" readonly class="form-control" name="invoice_number" id="invoice_number" value="<?php if(is_null($lastInvoice)): ?> <?php echo e($invoiceSetting->invoice_prefix.'#1'); ?> <?php else: ?> <?php echo e(($invoiceSetting->invoice_prefix.'#'.($lastInvoice->id+1))); ?> <?php endif; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="form-group" >
                                        <label class="control-label"><?php echo app('translator')->getFromJson('app.project'); ?></label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <select class="select2 form-control" data-placeholder="Choose Project" name="project_id">
                                                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option
                                                        value="<?php echo e($project->id); ?>"><?php echo e(ucwords($project->project_name)); ?></option>
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

                            </div>

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group" >
                                        <label class="control-label"><?php echo app('translator')->getFromJson('modules.invoices.invoiceDate'); ?></label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="input-icon">
                                                    <input type="text" class="form-control" name="issue_date" id="invoice_date" value="<?php echo e(Carbon\Carbon::today()->format('m/d/Y')); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->getFromJson('app.dueDate'); ?></label>
                                        <div class="input-icon">
                                            <input type="text" class="form-control" name="due_date" id="due_date" value="<?php echo e(Carbon\Carbon::today()->addDays($invoiceSetting->due_after)->format('m/d/Y')); ?>">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-3">

                                    <div class="form-group" >
                                        <label class="control-label"><?php echo app('translator')->getFromJson('modules.invoices.isRecurringPayment'); ?> </label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <select class="form-control" name="recurring_payment" id="recurring_payment" onchange="recurringPayment()">
                                                    <option value="no"><?php echo app('translator')->getFromJson('app.no'); ?></option>
                                                    <option value="yes"><?php echo app('translator')->getFromJson('app.yes'); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 recurringPayment" style="display: none;">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->getFromJson('modules.invoices.billingFrequency'); ?></label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <select class="form-control" name="billing_frequency" id="billing_frequency">
                                                    <option value="day"><?php echo app('translator')->getFromJson('app.day'); ?></option>
                                                    <option value="week"><?php echo app('translator')->getFromJson('app.week'); ?></option>
                                                    <option value="month"><?php echo app('translator')->getFromJson('app.month'); ?></option>
                                                    <option value="year"><?php echo app('translator')->getFromJson('app.year'); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 recurringPayment" style="display: none;">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->getFromJson('modules.invoices.billingInterval'); ?></label>
                                        <div class="input-icon">
                                            <input type="text" class="form-control" name="billing_interval" id="billing_interval" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 recurringPayment" style="display: none;">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->getFromJson('modules.invoices.billingCycle'); ?></label>
                                        <div class="input-icon">
                                            <input type="text" class="form-control" name="billing_cycle" id="billing_cycle" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group m-b-10">
                                        <button aria-expanded="false" data-toggle="dropdown" class="btn btn-info dropdown-toggle waves-effect waves-light" type="button">Products <span class="caret"></span></button>
                                        <ul role="menu" class="dropdown-menu dropdown-content">
                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="m-b-10">
                                                    <div class="row m-t-10">
                                                        <div class="col-md-6" style="padding-left: 30px">
                                                            <?php echo e($product->name); ?>

                                                        </div>
                                                        <div class="col-md-6" style="text-align: right;padding-right: 30px;">
                                                            <a href="javascript:;" data-pk="<?php echo e($product->id); ?>" class="btn btn-success btn btn-outline btn-xs waves-effect add-product">Add <i class="fa fa-plus" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-xs-12  visible-md visible-lg">

                                    <div class="col-md-4 font-bold" style="padding: 8px 15px">
                                        <?php echo app('translator')->getFromJson('modules.invoices.item'); ?>
                                    </div>

                                    <div class="col-md-1 font-bold" style="padding: 8px 15px">
                                        <?php echo app('translator')->getFromJson('modules.invoices.qty'); ?>
                                    </div>

                                    <div class="col-md-2 font-bold" style="padding: 8px 15px">
                                        <?php echo app('translator')->getFromJson('modules.invoices.unitPrice'); ?>
                                    </div>

                                    <div class="col-md-2 font-bold" style="padding: 8px 15px">
                                        <?php echo app('translator')->getFromJson('modules.invoices.tax'); ?> <a href="javascript:;" id="tax-settings" ><i class="ti-settings text-info"></i></a>
                                    </div>

                                    <div class="col-md-2 text-center font-bold" style="padding: 8px 15px">
                                        <?php echo app('translator')->getFromJson('modules.invoices.amount'); ?>
                                    </div>

                                    <div class="col-md-1" style="padding: 8px 15px">
                                        &nbsp;
                                    </div>

                                </div>


                                <div id="sortable">
                                    <div class="col-xs-12 item-row margin-top-5">

                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="control-label hidden-md hidden-lg"><?php echo app('translator')->getFromJson('modules.invoices.item'); ?></label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span></div>
                                                        <input type="text" class="form-control item_name" name="item_name[]">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-1">

                                            <div class="form-group">
                                                <label class="control-label hidden-md hidden-lg"><?php echo app('translator')->getFromJson('modules.invoices.qty'); ?></label>
                                                <input type="number" min="1" class="form-control quantity" value="1" name="quantity[]" >
                                            </div>


                                        </div>

                                        <div class="col-md-2">
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="control-label hidden-md hidden-lg"><?php echo app('translator')->getFromJson('modules.invoices.unitPrice'); ?></label>
                                                    <input type="text"  class="form-control cost_per_item" name="cost_per_item[]" value="0" >
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-2">

                                            <div class="form-group">
                                                <label class="control-label hidden-md hidden-lg"><?php echo app('translator')->getFromJson('modules.invoices.type'); ?></label>
                                                <select name="taxes[]" class="form-control type">
                                                    <option value="">--</option>
                                                    <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option data-rate="<?php echo e($tax->rate_percent); ?>" value="<?php echo e($tax->id); ?>"><?php echo e($tax->tax_name); ?>: <?php echo e($tax->rate_percent); ?>%</option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>


                                        </div>

                                        <div class="col-md-2 border-dark  text-center">
                                            <label class="control-label hidden-md hidden-lg"><?php echo app('translator')->getFromJson('modules.invoices.amount'); ?></label>

                                            <p class="form-control-static"><span class="amount-html">0.00</span></p>
                                            <input type="hidden" class="amount" name="amount[]" value="0">
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
                                        <div class="form-group col-xs-6 col-md-1" >
                                            <input type="number" min="0" value="0" name="discount_value" class="form-control discount_value">
                                        </div>
                                        <div class="form-group col-xs-6 col-md-1" >
                                            <select class="form-control" name="discount_type" id="discount_type">
                                                <option value="percent">%</option>
                                                <option value="fixed"><?php echo app('translator')->getFromJson('modules.invoices.amount'); ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row m-t-5" id="invoice-taxes">
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


                            <div class="col-md-12">

                                <div class="form-group" >
                                    <label class="control-label"><?php echo app('translator')->getFromJson('app.note'); ?></label>
                                    <textarea class="form-control" name="note" id="note" rows="5"></textarea>
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


    
    <div class="modal fade bs-modal-md in" id="taxModal" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-md" id="modal-data-application">
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
<script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>

<script>
    $(function () {
        $( "#sortable" ).sortable();
    });

    $(".select2").select2({
        formatNoMatches: function () {
            return "<?php echo e(__('messages.noRecordFound')); ?>";
        }
    });

    jQuery('#invoice_date, #due_date').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    $('#save-form').click(function(){
        calculateTotal();

        var discount = $('.discount-amount').html();
        var total = $('.total-field').val();

        if(parseFloat(discount) > parseFloat(total)){
            $.toast({
                heading: 'Error',
                text: 'Discount cannot be more than total amount.',
                position: 'top-right',
                loaderBg:'#ff6849',
                icon: 'error',
                hideAfter: 3500
            });
            return false;
        }

        $.easyAjax({
            url:'<?php echo e(route('admin.all-invoices.store')); ?>',
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
            +'<div class="input-group">'
            +'<div class="input-group-addon"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span></div>'
            +'<input type="text" class="form-control item_name" name="item_name[]" >'
            +'</div>'

            +'</div>'
            +'</div>'

            +'</div>'

            +'<div class="col-md-1">'

            +'<div class="form-group">'
            +'<label class="control-label hidden-md hidden-lg"><?php echo app('translator')->getFromJson('modules.invoices.qty'); ?></label>'
            +'<input type="number" min="1" class="form-control quantity" value="1" name="quantity[]" >'
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


            +'<div class="col-md-2">'

            +'<div class="form-group">'
            +'<label class="control-label hidden-md hidden-lg"><?php echo app('translator')->getFromJson('modules.invoices.tax'); ?></label>'
            +'<select name="taxes[]" class="form-control type">'
            +'<option value="">--</option>'
                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            +'<option data-rate="<?php echo e($tax->rate_percent); ?>" value="<?php echo e($tax->id); ?>"><?php echo e($tax->tax_name.': '.$tax->rate_percent); ?>%</option>'
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            +'</select>'
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

        $(item).hide().appendTo("#sortable").fadeIn(500);

    });

    $('#storePayments').on('click','.remove-item', function () {
        $(this).closest('.item-row').fadeOut(300, function() {
            $(this).remove();
            calculateTotal();
        });
    });

    $('#storePayments').on('keyup','.quantity,.cost_per_item,.item_name, .discount_value', function () {
        var quantity = $(this).closest('.item-row').find('.quantity').val();

        var perItemCost = $(this).closest('.item-row').find('.cost_per_item').val();

        var amount = (quantity*perItemCost);

        $(this).closest('.item-row').find('.amount').val(decimalupto2(amount));
        $(this).closest('.item-row').find('.amount-html').html(decimalupto2(amount));

        calculateTotal();


    });

    $('#storePayments').on('change','.type, #discount_type', function () {
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
        var tax = '';
        var taxList = new Object();
        var taxTotal = 0;
        $(".quantity").each(function (index, element) {

            var itemTax = $(this).closest('.item-row').find('.type option:selected').data('rate');
            var itemTaxName = $(this).closest('.item-row').find('.type option:selected').text();
            var itemTaxId = $(this).closest('.item-row').find('.type').val();
            var amount = $(this).closest('.item-row').find('.amount').val();
            subtotal = parseFloat(subtotal)+parseFloat(amount);

            if(itemTaxId != ''){
                if(typeof (taxList[itemTaxName]) === 'undefined'){
                    taxList[itemTaxName] = ((parseFloat(itemTax)/100)*parseFloat(amount));
                }
                else{
                    taxList[itemTaxName] = parseFloat(taxList[itemTaxName]) + ((parseFloat(itemTax)/100)*parseFloat(amount));
                }

            }

//
//            console.log(taxList);
//            console.log(taxTotal);

        });
//        console.log(taxList);

        $.each( taxList, function( key, value ) {
            if(!isNaN(value)){
//                console.log( key + ": " + value );

                tax = tax+'<div class="col-md-offset-9 col-md-1 text-right p-t-10">'
                    +key
                    +'</div>'
                    +'<p class="form-control-static col-xs-6 col-md-2" >'
                    +'<span class="tax-percent">'+decimalupto2(value)+'</span>'
                    +'</p>';

                taxTotal = taxTotal+decimalupto2(value);
            }

        });

        $('.sub-total').html(decimalupto2(subtotal));
        $('.sub-total-field').val(decimalupto2(subtotal));

        var discountType = $('#discount_type').val();
        var discountValue = $('.discount_value').val();

        if(discountValue != ''){
            if(discountType == 'percent'){
                discount = ((parseFloat(subtotal)/100)*parseFloat(discountValue));
            }
            else{
                discount = parseFloat(discountValue);
            }

        }

//       show tax
        $('#invoice-taxes').html(tax);

//            calculate total
        var totalAfterDiscount = decimalupto2(subtotal-discount);

        totalAfterDiscount = (totalAfterDiscount < 0) ? 0 : totalAfterDiscount;

        var total = decimalupto2(totalAfterDiscount+taxTotal);
//console.log(total);

        $('.total').html(total);
        $('.total-field').val(total);

    }

    function recurringPayment() {
        var recurring = $('#recurring_payment').val();

        if(recurring == 'yes')
        {
            $('.recurringPayment').show().fadeIn(300);
        } else {
            $('.recurringPayment').hide().fadeOut(300);
        }
    }

</script>

<script>
    $('#tax-settings').click(function () {
        var url = '<?php echo e(route('admin.taxes.create')); ?>';
        $('#modelHeading').html('Manage Project Category');
        $.ajaxModal('#taxModal', url);
    })

    function decimalupto2(num) {
        var amt =  Math.round(num * 100) / 100;
        return parseFloat(amt.toFixed(2));
    }

    $('.add-product').on('click', function(event) {
        event.preventDefault();
        var id = $(this).data('pk');
        $.easyAjax({
            url:'<?php echo e(route('admin.all-invoices.update-item')); ?>',
            type: "GET",
            data: { id: id },
            success: function(response) {
                $(response.view).hide().appendTo("#sortable").fadeIn(500);
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>