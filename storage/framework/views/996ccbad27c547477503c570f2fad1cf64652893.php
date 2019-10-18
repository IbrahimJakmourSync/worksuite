<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e($pageTitle); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo app('translator')->getFromJson('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('admin.clients.index')); ?>"><?php echo e($pageTitle); ?></a></li>
                <li class="active"><?php echo app('translator')->getFromJson('app.menu.projects'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="row">


        <div class="col-md-12">
            <div class="white-box">

                <div class="row">
                    <div class="col-xs-6 b-r"> <strong><?php echo app('translator')->getFromJson('modules.employees.fullName'); ?></strong> <br>
                        <p class="text-muted"><?php echo e(ucwords($client->name)); ?></p>
                    </div>
                    <div class="col-xs-6"> <strong><?php echo app('translator')->getFromJson('app.mobile'); ?></strong> <br>
                        <p class="text-muted"><?php echo e(isset($client->mobile) ? $client->mobile : 'NA'); ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 col-xs-6 b-r"> <strong><?php echo app('translator')->getFromJson('app.email'); ?></strong> <br>
                        <p class="text-muted"><?php echo e($client->email); ?></p>
                    </div>
                    <div class="col-md-3 col-xs-6"> <strong><?php echo app('translator')->getFromJson('modules.client.companyName'); ?></strong> <br>
                        <p class="text-muted"><?php echo e((count($client->client) > 0) ? ucwords($client->client[0]->company_name) : 'NA'); ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 col-xs-6 b-r"> <strong><?php echo app('translator')->getFromJson('modules.client.website'); ?></strong> <br>
                        <p class="text-muted"><?php echo e(isset($clientDetail->website) ? $clientDetail->website : 'NA'); ?></p>
                    </div>
                    <div class="col-md-3 col-xs-6"> <strong><?php echo app('translator')->getFromJson('app.address'); ?></strong> <br>
                        <p class="text-muted"><?php echo (count($client->client) > 0) ? ucwords($client->client[0]->address) : 'NA'; ?></p>
                    </div>
                </div>

                
                <?php if(isset($fields)): ?>
                    <div class="row">
                        <hr>
                        <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4">
                                <strong><?php echo e(ucfirst($field->label)); ?></strong> <br>
                                <p class="text-muted">
                                    <?php if( $field->type == 'text'): ?>
                                        <?php echo e(isset($clientDetail->custom_fields_data['field_'.$field->id]) ? $clientDetail->custom_fields_data['field_'.$field->id] : '-'); ?>

                                    <?php elseif($field->type == 'password'): ?>
                                        <?php echo e(isset($clientDetail->custom_fields_data['field_'.$field->id]) ? $clientDetail->custom_fields_data['field_'.$field->id] : '-'); ?>

                                    <?php elseif($field->type == 'number'): ?>
                                        <?php echo e(isset($clientDetail->custom_fields_data['field_'.$field->id]) ? $clientDetail->custom_fields_data['field_'.$field->id] : '-'); ?>


                                    <?php elseif($field->type == 'textarea'): ?>
                                        <?php echo e(isset($clientDetail->custom_fields_data['field_'.$field->id]) ? $clientDetail->custom_fields_data['field_'.$field->id] : '-'); ?>


                                    <?php elseif($field->type == 'radio'): ?>
                                        <?php echo e(!is_null($clientDetail->custom_fields_data['field_'.$field->id]) ? $clientDetail->custom_fields_data['field_'.$field->id] : '-'); ?>

                                    <?php elseif($field->type == 'select'): ?>
                                        <?php echo e((!is_null($clientDetail->custom_fields_data['field_'.$field->id]) && $clientDetail->custom_fields_data['field_'.$field->id] != '') ? $field->values[$clientDetail->custom_fields_data['field_'.$field->id]] : '-'); ?>

                                    <?php elseif($field->type == 'checkbox'): ?>
                                        <?php echo e(!is_null($clientDetail->custom_fields_data['field_'.$field->id]) ? $field->values[$clientDetail->custom_fields_data['field_'.$field->id]] : '-'); ?>

                                    <?php elseif($field->type == 'date'): ?>
                                        <?php echo e(isset($clientDetail->dob)?Carbon\Carbon::parse($clientDetail->dob)->format($global->date_format):Carbon\Carbon::now()->format($global->date_format)); ?>

                                    <?php endif; ?>
                                </p>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>

                

            </div>
        </div>

        <div class="col-md-12">

            <section>
                <div class="sttabs tabs-style-line">
                    <div class="white-box">
                        <nav>
                            <ul>
                                <li class="tab-current"><a href="<?php echo e(route('admin.clients.projects', $client->id)); ?>"><span><?php echo app('translator')->getFromJson('app.menu.projects'); ?></span></a>
                                <li><a href="<?php echo e(route('admin.clients.invoices', $client->id)); ?>"><span><?php echo app('translator')->getFromJson('app.menu.invoices'); ?></span></a>
                                </li>
                                <li><a href="<?php echo e(route('admin.contacts.show', $client->id)); ?>"><span><?php echo app('translator')->getFromJson('app.menu.contacts'); ?></span></a>
                            </ul>
                        </nav>
                    </div>
                    <div class="content-wrap">
                        <section id="section-line-1" class="show">
                            <div class="row">


                                <div class="col-md-12">
                                    <div class="white-box">
                                        <h3 class="box-title b-b"><i class="fa fa-layers"></i> <?php echo app('translator')->getFromJson('app.menu.projects'); ?></h3>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th><?php echo app('translator')->getFromJson('modules.client.projectName'); ?></th>
                                                    <th><?php echo app('translator')->getFromJson('modules.client.startedOn'); ?></th>
                                                    <th><?php echo app('translator')->getFromJson('modules.client.deadline'); ?></th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                                </thead>
                                                <tbody id="timer-list">
                                                <?php $__empty_1 = true; $__currentLoopData = $client->projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <tr>
                                                        <td><?php echo e($key+1); ?></td>
                                                        <td><?php echo e(ucwords($project->project_name)); ?></td>
                                                        <td><?php echo e($project->start_date->format($global->date_format)); ?></td>
                                                        <td><?php echo e($project->deadline->format($global->date_format)); ?></td>
                                                        <td><a href="<?php echo e(route('admin.projects.show', $project->id)); ?>" class="label label-info"><?php echo app('translator')->getFromJson('modules.client.viewDetails'); ?></a></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <tr>
                                                        <td colspan="4"><?php echo app('translator')->getFromJson('messages.noProjectFound'); ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                                </tbody>
                                            </table>
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
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>