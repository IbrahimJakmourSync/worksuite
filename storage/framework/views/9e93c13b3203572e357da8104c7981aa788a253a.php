<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title><?php echo e($invoice->invoice_number); ?></title>
    <style>

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
            position: relative;
            width: 100%;
            height: auto;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-size: 14px;
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }

        h2 {
            font-weight:normal;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
        }

        #logo {
            float: left;
            margin-top: 11px;
        }

        #logo img {
            height: 55px;
            margin-bottom: 15px;
        }

        #company {

        }

        #details {
            margin-bottom: 50px;
        }

        #client {
            padding-left: 6px;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        h2.name {
            font-size: 1.2em;
            font-weight: normal;
            margin: 0;
        }

        #invoice {

        }

        #invoice h1 {
            color: #0087C3;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0 0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 5px 10px 7px 10px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: right;
        }

        table td.desc h3, table td.qty h3 {
            color: #57B223;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0 0;
        }

        table .no {
            color: #FFFFFF;
            font-size: 1.6em;
            background: #57B223;
            width: 10%;
        }

        table .desc {
            text-align: left;
        }

        table .unit {
            background: #DDDDDD;
        }


        table .total {
            background: #57B223;
            color: #FFFFFF;
        }

        table td.unit,
        table td.qty,
        table td.total
        {
            font-size: 1.2em;
            text-align: center;
        }

        table td.unit{
            width: 35%;
        }

        table td.desc{
            width: 45%;
        }

        table td.qty{
            width: 5%;
        }

        .status {
            margin-top: 15px;
            padding: 1px 8px 5px;
            font-size: 1.3em;
            width: 80px;
            color: #fff;
            float: right;
            text-align: center;
            display: inline-block;
        }

        .status.unpaid {
            background-color: #E7505A;
        }
        .status.paid {
            background-color: #26C281;
        }
        .status.cancelled {
            background-color: #95A5A6;
        }
        .status.error {
            background-color: #F4D03F;
        }

        table tr.tax .desc {
            text-align: right;
            color: #1BA39C;
        }
        table tr.discount .desc {
            text-align: right;
            color: #E43A45;
        }
        table tr.subtotal .desc {
            text-align: right;
            color: #1d0707;
        }
        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px 10px 20px 10px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-bottom: 1px solid #AAAAAA;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks {
            font-size: 2em;
            margin-bottom: 50px;
        }

        #notices {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
        }

        table.billing td {
            background-color: #fff;
        }

        table td div#invoiced_to {
            text-align: left;
        }

        #notes{
            color: #767676;
            font-size: 11px;
        }

    </style>
</head>
<body>
<header class="clearfix">

    <table cellpadding="0" cellspacing="0" class="billing">
        <tr>
            <td>
                <div id="invoiced_to">
                    <?php if(!is_null($invoice->project->client)): ?>
                    <small><?php echo app('translator')->getFromJson("modules.invoices.billedTo"); ?>:</small>
                    <h3 class="name"><?php echo e(ucwords($invoice->project->client->client[0]->company_name)); ?></h3>
                    <div><?php echo nl2br($invoice->project->client->client[0]->address); ?></div>
                    <?php if($invoiceSetting->show_gst == 'yes' && !is_null($invoice->project->client->client[0]->gst_number)): ?>
                        <div> <?php echo app('translator')->getFromJson('app.gstIn'); ?>: <?php echo e($invoice->project->client->client[0]->gst_number); ?> </div>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
            </td>
            <td>
                <div id="company">
                    <small><?php echo app('translator')->getFromJson("modules.invoices.generatedBy"); ?>:</small>
                    <h3 class="name"><?php echo e(ucwords($global->company_name)); ?></h3>
                    <?php if(!is_null($settings)): ?>
                        <div><?php echo nl2br($global->address); ?></div>
                        <div><?php echo e($global->company_phone); ?></div>
                    <?php endif; ?>
                    <?php if($invoiceSetting->show_gst == 'yes' && !is_null($invoiceSetting->gst_number)): ?>
                        <div><?php echo app('translator')->getFromJson('app.gstIn'); ?>: <?php echo e($invoiceSetting->gst_number); ?></div>
                    <?php endif; ?>
                </div>
            </td>
        </tr>
    </table>
</header>
<main>
    <div id="details" class="clearfix">

        <div id="invoice">
            <h1><?php echo e($invoiceSetting->invoice_prefix); ?> #<?php echo e(($invoice->id < 10) ? "0".$invoice->id : $invoice->id); ?></h1>
            <div class="date">Issue Date: <?php echo e($invoice->issue_date->format("dS M Y")); ?></div>
            <?php if($invoice->status == 'unpaid'): ?>
                <div class="date">Due Date: <?php echo e($invoice->due_date->format("dS M Y")); ?></div>
            <?php endif; ?>
        </div>

    </div>
    <table border="0" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th class="no">#</th>
            <th class="desc"><?php echo app('translator')->getFromJson("modules.invoices.item"); ?></th>
            <th class="qty"><?php echo app('translator')->getFromJson("modules.invoices.qty"); ?></th>
            <th class="qty"><?php echo app('translator')->getFromJson("modules.invoices.unitPrice"); ?></th>
            <th class="unit"><?php echo app('translator')->getFromJson("modules.invoices.price"); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php $count = 0; ?>
        <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($item->type == 'item'): ?>
            <tr style="page-break-inside: avoid;">
                <td class="no"><?php echo e(++$count); ?></td>
                <td class="desc"><h3><?php echo e(ucfirst($item->item_name)); ?></h3></td>
                <td class="qty"><h3><?php echo e($item->quantity); ?></h3></td>
                <td class="qty"><h3><?php echo htmlentities($invoice->currency->currency_symbol); ?><?php echo e(number_format((float)$item->unit_price, 2, '.', '')); ?></h3></td>
                <td class="unit"><?php echo htmlentities($invoice->currency->currency_symbol); ?><?php echo e(number_format((float)$item->amount, 2, '.', '')); ?></td>
            </tr>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr style="page-break-inside: avoid;" class="subtotal">
            <td class="no">&nbsp;</td>
            <td class="qty">&nbsp;</td>
            <td class="qty">&nbsp;</td>
            <td class="desc"><?php echo app('translator')->getFromJson("modules.invoices.subTotal"); ?></td>
            <td class="unit"><?php echo htmlentities($invoice->currency->currency_symbol); ?><?php echo e(number_format((float)$invoice->sub_total, 2, '.', '')); ?></td>
        </tr>
        <?php if($discount != 0 && $discount != ''): ?>
        <tr style="page-break-inside: avoid;" class="discount">
            <td class="no">&nbsp;</td>
            <td class="qty">&nbsp;</td>
            <td class="qty">&nbsp;</td>
            <td class="desc"><?php echo app('translator')->getFromJson("modules.invoices.discount"); ?></td>
            <td class="unit">-<?php echo htmlentities($invoice->currency->currency_symbol); ?><?php echo e(number_format((float)$discount, 2, '.', '')); ?></td>
        </tr>
        <?php endif; ?>
        <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr style="page-break-inside: avoid;" class="tax">
                <td class="no">&nbsp;</td>
                <td class="qty">&nbsp;</td>
                <td class="qty">&nbsp;</td>
                <td class="desc"><?php echo e(strtoupper($key)); ?></td>
                <td class="unit"><?php echo htmlentities($invoice->currency->currency_symbol); ?><?php echo e(number_format((float)$tax, 2, '.', '')); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
        <tr dontbreak="true">
            <td colspan="4"><?php echo app('translator')->getFromJson("modules.invoices.total"); ?></td>
            <td style="text-align: center"><?php echo htmlentities($invoice->currency->currency_symbol); ?><?php echo e(number_format((float)$invoice->total, 2, '.', '')); ?></td>
        </tr>
        </tfoot>
    </table>
    <p>&nbsp;</p>
    <hr>
    <p id="notes">
        <?php echo app('translator')->getFromJson("app.note"); ?>: Here <?php echo htmlentities($invoice->currency->currency_symbol); ?> refers to <?php echo $invoice->currency->currency_code; ?><br>
        <?php if(!is_null($invoice->note)): ?>
            <?php echo nl2br($invoice->note); ?><br>
        <?php endif; ?>
        <?php if($invoice->status == 'unpaid'): ?>
        <?php echo nl2br($invoiceSetting->invoice_terms); ?>

        <?php endif; ?>

    </p>

</main>
</body>
</html>