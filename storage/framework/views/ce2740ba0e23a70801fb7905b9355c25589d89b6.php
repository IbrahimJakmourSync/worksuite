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
                <li><a href="<?php echo e(route('super-admin.dashboard')); ?>"><?php echo app('translator')->getFromJson('app.menu.home'); ?></a></li>
                <li class="active"><?php echo e($pageTitle); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <?php if(isset($lastVersion)): ?>
            <div class="alert alert-danger col-md-12">
                <p> <?php echo app('translator')->getFromJson('messages.updateAlert'); ?></p>
                <p><?php echo app('translator')->getFromJson('messages.updateBackupNotice'); ?></p>
            </div>

            <div class="alert alert-info col-md-12">
                <div class="col-md-10"><i class="ti-gift"></i> <?php echo app('translator')->getFromJson('modules.update.newUpdate'); ?> <label class="label label-success"><?php echo e($lastVersion); ?></label><br><br>
                    <h5 class="text-white font-bold"><label class="label label-danger">ALERT</label>You will get logged out after update. Login again to use the application.</h5>
                    <span class="font-12 text-warning"><?php echo app('translator')->getFromJson('modules.update.updateAlternate'); ?></span>
                </div>
                <div class="col-md-2"><a id="update-app" href="javascript:;" class="btn btn-success btn-small"><?php echo app('translator')->getFromJson('modules.update.updateNow'); ?> <i class="fa fa-download"></i></a></div>

                <div class="col-md-12">
                    <p><?php echo $updateInfo; ?></p>
                </div>
            </div>

            <div id="update-area" class="m-t-20 m-b-20 col-md-12 white-box hide">
                Loading...
            </div>
        <?php else: ?>
            <div class="alert alert-success col-md-12">
                <div class="col-md-12">You have latest version of this app.</div>
            </div>
        <?php endif; ?>

        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo e($pageTitle); ?></div>

                <div class="vtabs customvtab m-t-10">

                    <?php echo $__env->make('sections.super_admin_setting_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="table-responsive">

                                        <table class="table table-bordered">
                                            <thead>
                                            <th><?php echo app('translator')->getFromJson('modules.update.systemDetails'); ?></th>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Worksuite Version <span
                                                            class="pull-right"><?php echo e($worksuiteVersion); ?></span></td>
                                            </tr>
                                            <tr>
                                                <td>Laravel Version <span
                                                            class="pull-right"><?php echo e($laravelVersion); ?></span></td>
                                            </tr>
                                            <tr>
                                                <td>PHP Version <span class="pull-right"><?php echo e(phpversion()); ?></span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                
                                

                                
                                
                                
                                

                                
                            </div>

                            <hr>
                            <!--row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="box-title" id="structure">Update Log</h4>
                                    <pre>
    <p>
        <strong>Worksuite Updates Log</strong>
        ├──
        │
        │   └── <strong>Version 2.5.4</strong>
        │       └── Superadmin can change superadmin panel language in global settings.
        │       └── Superadmin can set default timezone for companies in global settings.
        │       └── Hide default and trial packages in admin panel package purchase section.
        │       └── Bug fixes
        │
        │   └── <strong>Version 2.5.3</strong>
        │       └── Paypal Bug fixes
        │
        │   └── <strong>Version 2.5.2</strong>
        │       └── Paypal Bug fixes
        │
        │   └── <strong>Version 2.5.1</strong>
        │       └── Bug fixes
        │
        │   └── <strong>Version 2.5.0</strong>
        │       └── Bug fixes
        │
        │   └── <strong>Version 2.4.9</strong>
        │       └── Enable free trial in the free trial settings.
        │       └── Paypal integration for the packages.
        │
        │   └── <strong>Version 2.4.8</strong>
        │       └── Bug fixes
        │
        │   └── <strong>Version 2.4.7</strong>
        │       └── Employee can create tasks for himself as default.
        │       └── Add notification setting for invoice.
        │       └── Setup GST number for client in edit client form and own company in invoice settings.
        │       └── Now add a project without a deadline.
        │       └── Bug fixes
        │
        │   └── <strong>Version 2.4.6</strong>
        │       └── Bug fixes       
        │
        │   └── <strong>Version 2.4.5</strong>
        │       └── Bug fixes
        │
        │   └── <strong>Version 2.4.4</strong>
        │       └── Added google recaptcha on the contact and signup form. 
        |           Add GOOGLE RECAPTCHA KEY value in global settings.
        │       └── Bug fixes
        │
        │   └── <strong>Version 2.4.2</strong>
        │       └── Frontend CMS in superadmin settings
        │       └── Stripe settings in superamdin settings
        │       └── Bug fixes
        │
        │   └── <strong>Version 2.4.1</strong>
        │       └── Set google map api key in company setting
        │       └── Set currency converter key in currency setting
        │       └── Bug fixes
        │
        │   └── <strong>Version 2.4</strong>
        │       └── Update UI of task detail window and taskboard.
        │       └── Added last date field in employee form.
        │       └── Added skills section for employees
        │       └── Show active timers on top of admin dashboard
        │       └── Added option to stop timer automatically in time log settings. (Requires cron setup) 
        │       └── You can restrict attendance with in radius or ip addresses. Check attendance settings.  
        │       └── Task status is now linked to board columns.  
        │           2 default columns [complete] & [incomplete] are added which cannot be deleted.  
        │       └── Bug fixes
        │
        │   └── <strong>Version 2.3.11</strong>
        │       └── Show employees who are not working on any project in employee module.
        │       └── Added a shortcut menu on top to add project, client, employee, task and ticket.
        │       └── Show earnings in time log table.
        │       └── Bug fixes
        │
        │   └── <strong>Version 2.3.7</strong>
        │       └── Added separate module settings for client, admin and member panels.
        │       └── Added web push notifications using Onesignal
        │       └── Moved email, slack and push notification under notification settings
        │       └── Added employee documents section in employee detail page
        │       └── Bug fixes
        │
        │   └── <strong>Version 2.3.6</strong>
        │       └── Added Date format settings in company settings.
        │       └── Several bug fixes
        │
        │   └── <strong>Version 2.3.3</strong>
        │       └── Added export and filter option in various modules
        │       └── Several bug fixes
        │
        │   └── <strong>Version 2.3.2</strong>
        │       └── Added holiday calendar in employee panel
        │       └── Added multiple clock-in/clock-out option. Manage from attendance settings.
        │       └── Added option to upload custom invoice once the invoice is paid.
        │       └── Added export to excel button for timelogs in admin.
        │       └── Custom fields data are now shown on detail pages also.
        │       └── Some bug fixes.
        │
        │   └── <strong>Version 2.3</strong>
        │       └── Upgraded laravel version to 5.6
        │       └── Added offline payment methods for invoice in payment credential settings.
        │       └── Now you can create products and add them in invoices.
        │       └── The invoices now supports partial payments.
        │       └── Now add holiday calendar which is linked with attendance module.
        │       └── Time can be now logged for tasks or projects. This can be set in timelog settings.
        │       └── Now you can upload documents for leads in leads section.
        │       └── Project templates can be created which can be used while creating similar projects.
        │       └── Bug fixes.
        │
        │   └── <strong>Version 2.2</strong>
        │       └── Added Lead Management Feature.
        │       └── Added project status and client filter on projects list page.
        │       └── Show day and leave tag on attendance page for an employee.
        │       └── Show active timers on timelogs list page.
        │       └── Show reason of leave before approve/reject leave.
        │       └── Fixed for submit bug on safari.
        │       └── Other small bug fixes.
        │
        │   └── <strong>Version 2.1</strong>
        │       └── Admin can Active/Deactive employees/clients.
        │       └── Added module settings to enable/disable modules.
        │       └── Added teams section under employees.
        │
        │   └── <strong>Version 2.0</strong>
        │       └── Member can add manual timelog. Admin need to enable permission in the project.
        │       └── New professional default theme. You can still change theme colors in custom theme option.
        │       └── More languages added. Check language settings.
        │       └── Admin can now add/update employee profile image.
        │       └── Client can now see the project tasks. Admin need to enable the permission in project.
        │       └── Track leaves count for each employee. Check leaves settings.
        │       └── Now in task board 2 columns are in default Complete & Incomplete related to task status.
        │       └── Now create default taxes in invoice settings. Add tax using dropdown when creating invoice.
        │       └── Added Gantt chart for projects.
        │       └── Now create multiple sub tasks for a task.
        │       └── Added google drive & amazon s3 integration for project file storage. Check storage settings.
        │       └── Now import payments via csv.
        │       └── Now you can add payments without selecting project & invoice.
        │
        │
        │   └── <strong>Version 1.9.14</strong>
        │       └── Fixed software auto-updater.
        │
        │   └── <strong>Version 1.9.12</strong>
        │       └── Added Dropbox integration for project file uploads. Dropbox settings are in file storage settings.
        │       └── Allow attendance record to be deleted by admin.
        │       └── Add comments to the task.
        │       └── Add payments without selecting project or invoice.
        │       └── View finance report month wise.
        │
        │   └── <strong>Version 1.9.8</strong>
        │       └── Added view attendance by date tab in attendance section.
        │       └── General bug fixes.
        │
        │   └── <strong>Version 1.9.7</strong>
        │       └── General bug fixes.
        │
        │   └── <strong>Version 1.9.6</strong>
        │       └── User role can be changed from admin employee section.
        │       └── New feature: Client can chat with admin and employees.
        │                        This can be enabled/disabled from message settings section.
        │
        │   └── <strong>Version 1.9</strong>
        │       └── New feature: Leave Management.
        │       └── New feature: Add your custom css in theme settings.
        │       └── Now install updates in just 1 click in update log section under settings.
        │
        │   └── <strong>Version 1.8</strong>
        │       └── Now manage roles and permissions for users.
        │       └── Create Custom fields for Client, Project and Employee Modules.
        │       └── Event calendar to add and invite users to Events.
        │       └── New template added for invoice.
        │       └── Now add cryptocurrencies in currency list.
        │       └── Emails translations to default language now available.
        │
        │   └── <strong>Version 1.7</strong>
        │       └── Kanban board for task management.
        │
        │   └── <strong>Version 1.6.1</strong>
        │       └── Removed Separate Project Admin Section and merged into employee panel.
        │       └── Admin can assign project admin for a project in projects section.
        │       └── Now Admin can create tasks to employees without assigning them to any project.
        │       └── Now Employees can also add the files in project section.
        │
        │   └── <strong>Version 1.6</strong>
        │       └── Employee Attendance
        │       └── Sticky notes redesigned
        │       └── Issue management module removed as ticket management module is added.
        │
        │   └── <strong>Version 1.5</strong>
        │       └── Ticket Management
        │       └── Admin chat with employees module
        │       └── Notification icon in sidebar
        │
        │   └── <strong>Version 1.4</strong>
        │       └── Expense Management
        │       └── Invoice templates
        │       └── Expense vs Income report
        │       └── Slack Integration
        │       └── Client Section Made Multi Language
        │       └── Payment Settings
        │           └── Allow PayPal to make recurring payments
        │           └── Added Stripe payment gateway
        │
        │   └── <strong>Version 1.3</strong>
        │       └── Added multiple taxes in invoices
        │       └── Send estimates/quotations to clients
        │       └── Added PayPal payment gateway to pay invoices
        │       └── Added new section payments in admin
        │
        │   └── <strong>Version 1.2</strong>
        │       └── Multi Language
        │       └── CSV Data Export
        │       └── Theme Settings
        │           └── Ability to change login background image
        │       └── Roles Management
        │           └── Added new role Project Admin
        └──
    </p>
                                        </pre>
                                </div>
                            </div>
                            <!--/row-->

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <!-- .row -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
    <script type="text/javascript">
        var updateAreaDiv = $('#update-area');
        var refreshPercent = 0;
        var checkInstall = true;

        $('#update-app').click(function () {
            if($('#update-frame').length){
                return false;
            }

            swal({
                title: "Are you sure?",
                text: "Take backup of files and database before updating!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, update it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function(isConfirm){
                updateAreaDiv.removeClass('hide');

                if (isConfirm) {

                    $.easyAjax({
                        type: 'GET',
                        url: '<?php echo route("super-admin.updateVersion.update"); ?>',
                        success: function (response) {
                            updateAreaDiv.html("<strong>What's New:-</strong><br> "+response.description);
                            downloadWorksuite();
                            downloadPercent();
                        }
                    });
                }
            });



        })

        function downloadWorksuite(){
            $.easyAjax({
                type: 'GET',
                url: '<?php echo route("super-admin.updateVersion.download"); ?>',
                success: function (response) {
                    clearInterval(refreshPercent);
                    $('#percent-complete').css('width', '100%');
                    $('#percent-complete').html('100%');
                    $('#download-progress').append("<i><span class='text-success'>Download complete.</span> Now Installing...Please wait (This may take few minutes.)</i>");

                    window.setInterval(function(){
                        /// call your function here
                        if(checkInstall == true){
                            checkIfFileExtracted();
                        }
                    }, 1500);

                    installWorksuite();

                }
            });
        }

        function getDownloadPercent(){
            $.easyAjax({
                type: 'GET',
                url: '<?php echo route("super-admin.updateVersion.downloadPercent"); ?>',
                success: function (response) {
                    response = response.toFixed(1);
                    $('#percent-complete').css('width', response+'%');
                    $('#percent-complete').html(response+'%');
                }
            });
        }

        function checkIfFileExtracted(){
            $.easyAjax({
                type: 'GET',
                url: '<?php echo route("super-admin.updateVersion.checkIfFileExtracted"); ?>',
                success: function (response) {
                    checkInstall = false;
                    $('#download-progress').append("<br><i><span class='text-success'>Installed successfully. Reload page to see the changes.</span>.</i>");
                    document.getElementById('logout-form').submit();
                }
            });
        }

        function downloadPercent(){
            updateAreaDiv.append('<hr><div id="download-progress">' +
                'Download Progress<br><div class="progress progress-lg">'+
                '<div class="progress-bar progress-bar-success active progress-bar-striped" role="progressbar" id="percent-complete" role="progressbar""></div>'+
                '</div>' +
                '</div>'
            );
            //getting data
            refreshPercent = window.setInterval(function(){
                getDownloadPercent();
                /// call your function here
            }, 1500);
        }

        function installWorksuite(){
            $.easyAjax({
                type: 'GET',
                url: '<?php echo route("super-admin.updateVersion.install"); ?>',
                success: function (response) {
                    $('#download-progress').append("<br><i><span class='text-success'>Installed successfully. Reload page to see the changes.</span>.</i>");
                    document.getElementById('logout-form').submit();
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.super-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>