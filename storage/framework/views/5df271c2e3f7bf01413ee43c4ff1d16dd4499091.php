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
                <li><a href="<?php echo e(route('admin.projects.index')); ?>"><?php echo e(__($pageTitle)); ?></a></li>
                <li class="active"><?php echo app('translator')->getFromJson('app.addNew'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css')); ?>">
    <link href="//cdn.dhtmlx.com/gantt/edge/skins/dhtmlxgantt_broadway.css" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <h2><?php echo app('translator')->getFromJson('modules.projects.viewGanttChart'); ?></h2>
            <div id="gantt_here" style='width:100%; height:100vh;'></div>
        </div>
    </div>    <!-- .row -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
    <script src="//cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>
    <script src="//cdn.dhtmlx.com/gantt/edge/locale/locale_<?php echo e($global->locale); ?>.js"></script>
    <script type="text/javascript">

        gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";

        gantt.templates.task_class = function (st, end, item) {
            return item.$level == 0 ? "gantt_project" : ""
        };

        gantt.config.scale_unit = "month";
        gantt.config.date_scale = "%F, %Y";

        gantt.config.scale_height = 50;

        gantt.config.subscales = [
            {unit: "day", step: 1, date: "%j, %D"}
        ];

        //defines the text inside the tak bars
        gantt.templates.task_text = function (start, end, task) {
            if ( task.$level > 0 ){
                return task.text + ", <b> <?php echo app('translator')->getFromJson('modules.tasks.assignTo'); ?>:</b> " + task.users;
            }
            return task.text;

        };

        gantt.attachEvent("onTaskCreated", function(task){
            //any custom logic here
            return false;
        });

        gantt.attachEvent("onBeforeLightbox", function(id) {
            var task = gantt.getTask(id);
            if ( task.$level > 0 ){
                $(".right-sidebar").slideDown(50).addClass("shw-rside");

                var taskId = task.id;
                var url = "<?php echo e(route('admin.all-tasks.show',':id')); ?>";
                url = url.replace(':id', taskId);

                $.easyAjax({
                    type: 'GET',
                    url: url,
                    success: function (response) {
                        if (response.status == "success") {
                            $('#right-sidebar-content').html(response.view);
                        }
                    }
                });
            }
            return false;
        });

        gantt.attachEvent("onBeforeTaskDrag", function(id, mode, e){
            //any custom logic here
            return false;
        });

        gantt.init("gantt_here");

        gantt.load('<?php echo e(route("admin.projects.ganttData")); ?>');
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>