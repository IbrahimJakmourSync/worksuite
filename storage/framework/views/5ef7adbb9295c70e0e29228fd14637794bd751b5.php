<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e($pageTitle); ?> #<?php echo e($lead->id); ?> - <span
                        class="font-bold"><?php echo e(ucwords($lead->company_name)); ?></span></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-6 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo app('translator')->getFromJson('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('admin.leads.index')); ?>"><?php echo e($pageTitle); ?></a></li>
                <li class="active"><?php echo app('translator')->getFromJson('modules.projects.files'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>

<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/dropzone-master/dist/dropzone.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">

            <section>
                <div class="sttabs tabs-style-line">
                    <div class="white-box">
                        <nav>
                            <ul>
                                <li class="tab-current"><a href="<?php echo e(route('admin.leads.show', $lead->id)); ?>"><span><?php echo app('translator')->getFromJson('modules.lead.profile'); ?></span></a>
                                </li>
                                <li><a href="<?php echo e(route('admin.proposals.show', $lead->id)); ?>"><span><?php echo app('translator')->getFromJson('modules.lead.proposal'); ?></span></a></li>
                                <li ><a href="<?php echo e(route('admin.lead-files.show', $lead->id)); ?>"><span><?php echo app('translator')->getFromJson('modules.lead.file'); ?></span></a></li>
                                <li><a href="<?php echo e(route('admin.leads.followup', $lead->id)); ?>"><span><?php echo app('translator')->getFromJson('modules.lead.followUp'); ?></span></a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="content-wrap">
                        <section id="section-line-3" class="show">
                            <div class="row">
                                <div class="col-md-12" id="files-list-panel">
                                    <div class="white-box">
                                        <h2><?php echo app('translator')->getFromJson('modules.lead.leadDetail'); ?></h2>

                                        <div class="white-box">
                                            <div class="row">
                                                <div class="col-xs-6 b-r"> <strong><?php echo app('translator')->getFromJson('modules.lead.companyName'); ?></strong> <br>
                                                    <p class="text-muted"><?php echo e(ucwords($lead->company_name)); ?></p>
                                                </div>
                                                <div class="col-xs-6"> <strong><?php echo app('translator')->getFromJson('modules.lead.website'); ?></strong> <br>
                                                    <p class="text-muted"><?php echo e(isset($lead->website) ? $lead->website : 'NA'); ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-xs-6 b-r"> <strong><?php echo app('translator')->getFromJson('modules.lead.mobile'); ?></strong> <br>
                                                    <p class="text-muted"><?php echo e(isset($lead->mobile) ? $lead->mobile : 'NA'); ?></p>
                                                </div>
                                                <div class="col-xs-6"> <strong><?php echo app('translator')->getFromJson('modules.lead.address'); ?></strong> <br>
                                                    <p class="text-muted"><?php echo e(isset($lead->address) ? $lead->address : 'NA'); ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-xs-6 b-r" > <strong><?php echo app('translator')->getFromJson('modules.lead.clientName'); ?></strong> <br>
                                                    <p class="text-muted"><?php echo e(isset($lead->client_name) ? $lead->client_name : 'NA'); ?></p>
                                                </div>
                                                <div class="col-xs-6"> <strong><?php echo app('translator')->getFromJson('modules.lead.clientEmail'); ?></strong> <br>
                                                    <p class="text-muted"><?php echo e(isset($lead->client_email) ? $lead->client_email : 'NA'); ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <?php if($lead->source_id != null): ?>
                                                <div class="col-xs-6 b-r"> <strong><?php echo app('translator')->getFromJson('modules.lead.source'); ?></strong> <br>
                                                    <p class="text-muted"><?php echo e(isset($lead->lead_source->type) ? $lead->lead_source->type : 'NA'); ?></p>
                                                </div>
                                                <?php endif; ?>
                                                <?php if($lead->status_id != null): ?>
                                                <div class="col-xs-6"> <strong><?php echo app('translator')->getFromJson('modules.lead.status'); ?></strong> <br>
                                                    <p class="text-muted"><?php echo e(isset($lead->lead_status->type) ? $lead->lead_status->type : 'NA'); ?></p>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-xs-12"> <strong><?php echo app('translator')->getFromJson('app.note'); ?></strong> <br>
                                                    <p class="text-muted"><?php echo e(isset($lead->note) ? $lead->note : 'NA'); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>

                    </div><!-- /content -->
                </div><!-- /tabs -->
            </section>
        </div>


    </div>
    <!-- .row -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script src="<?php echo e(asset('plugins/bower_components/dropzone-master/dist/dropzone.js')); ?>"></script>
<script>
    $('#show-dropzone').click(function () {
        $('#file-dropzone').toggleClass('hide show');
    });

    $("body").tooltip({
        selector: '[data-toggle="tooltip"]'
    });

    // "myAwesomeDropzone" is the camelized version of the HTML element's ID
    Dropzone.options.fileUploadDropzone = {
        paramName: "file", // The name that will be used to transfer the file
//        maxFilesize: 2, // MB,
        dictDefaultMessage: "<?php echo app('translator')->getFromJson('modules.projects.dropFile'); ?>",
        accept: function (file, done) {
            done();
        },
        init: function () {
            this.on("success", function (file, response) {
                console.log(response);
                $('#files-list-panel ul.list-group').html(response.html);
            })
        }
    };

    $('body').on('click', '.sa-params', function () {
        var id = $(this).data('file-id');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover the deleted file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {

                var url = "<?php echo e(route('admin.files.destroy',':id')); ?>";
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
                            $('#files-list-panel ul.list-group').html(response.html);

                        }
                    }
                });
            }
        });
    });

</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>