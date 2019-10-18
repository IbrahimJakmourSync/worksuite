<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <!-- .User Profile -->
        <ul class="nav" id="side-menu">
            
                
                
                    
                        
                        
                        
                
                
            

            <li class="user-pro">
                <?php if(is_null($user->image)): ?>
                    <a href="#" class="waves-effect"><img src="<?php echo e(asset('default-profile-3.png')); ?>" alt="user-img" class="img-circle"> <span class="hide-menu"><?php echo e((strlen($user->name) > 24) ? substr(ucwords($user->name), 0, 20).'..' : ucwords($user->name)); ?>

                            <span class="fa arrow"></span></span>
                    </a>
                <?php else: ?>
                    <a href="#" class="waves-effect"><img src="<?php echo e(asset('user-uploads/avatar/'.$user->image)); ?>" alt="user-img" class="img-circle"> <span class="hide-menu"><?php echo e(ucwords($user->name)); ?>

                            <span class="fa arrow"></span></span>
                    </a>
                <?php endif; ?>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo e(route('member.profile.index')); ?>"><i class="ti-user"></i> <?php echo app('translator')->getFromJson("app.menu.profileSettings"); ?></a></li>
                    <?php if($user->hasRole('admin')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.dashboard')); ?>">
                                <i class="fa fa-sign-in"></i>  <?php echo app('translator')->getFromJson("app.loginAsAdmin"); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                        <li role="separator" class="divider"></li>
                    <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                        ><i class="fa fa-power-off"></i> <?php echo app('translator')->getFromJson('app.logout'); ?></a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>
                    </li>
                </ul>
            </li>

            <li><a href="<?php echo e(route('member.dashboard')); ?>" class="waves-effect"><i class="icon-speedometer"></i> <span class="hide-menu"><?php echo app('translator')->getFromJson("app.menu.dashboard"); ?> </span></a> </li>

            <?php if(in_array('clients',$modules)): ?>
            <?php if($user->can('view_clients')): ?>
            <li><a href="<?php echo e(route('member.clients.index')); ?>" class="waves-effect"><i class="icon-people"></i> <span class="hide-menu"><?php echo app('translator')->getFromJson('app.menu.clients'); ?> </span></a> </li>
            <?php endif; ?>
            <?php endif; ?>

            <?php if(in_array('employees',$modules)): ?>
            <?php if($user->can('view_employees')): ?>
                <li><a href="<?php echo e(route('member.employees.index')); ?>" class="waves-effect"><i class="icon-user"></i> <span class="hide-menu"><?php echo app('translator')->getFromJson('app.menu.employees'); ?> </span></a> </li>
            <?php endif; ?>
            <?php endif; ?>

            <?php if(in_array('projects',$modules)): ?>
            <li><a href="<?php echo e(route('member.projects.index')); ?>" class="waves-effect"><i class="icon-layers"></i> <span class="hide-menu"><?php echo app('translator')->getFromJson("app.menu.projects"); ?> </span> <?php if($unreadProjectCount > 0): ?> <div class="notify notification-color"><span class="heartbit"></span><span class="point"></span></div><?php endif; ?></a> </li>
            <?php endif; ?>

            <?php if(in_array('products',$modules) && $user->can('view_product')): ?>
                <li><a href="<?php echo e(route('member.products.index')); ?>" class="waves-effect"><i class="icon-basket"></i> <span class="hide-menu"><?php echo app('translator')->getFromJson('app.menu.products'); ?> </span></a> </li>
            <?php endif; ?>

            <?php if(in_array('tasks',$modules)): ?>
            <li><a href="<?php echo e(route('member.task.index')); ?>" class="waves-effect"><i class="ti-layout-list-thumb"></i> <span class="hide-menu"> <?php echo app('translator')->getFromJson('app.menu.tasks'); ?> <span class="fa arrow"></span> </span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo e(route('member.all-tasks.index')); ?>"><?php echo app('translator')->getFromJson('app.menu.tasks'); ?></a></li>
                    <li><a href="<?php echo e(route('member.taskboard.index')); ?>"><?php echo app('translator')->getFromJson('modules.tasks.taskBoard'); ?></a></li>
                    <li><a href="<?php echo e(route('member.task-calendar.index')); ?>"><?php echo app('translator')->getFromJson('app.menu.taskCalendar'); ?></a></li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if(in_array('leads',$modules) && $user->can('view_lead')): ?>
                <li><a href="<?php echo e(route('member.leads.index')); ?>" class="waves-effect"><i class="icon-doc"></i> <span class="hide-menu"><?php echo app('translator')->getFromJson('app.menu.lead'); ?> </span></a> </li>
            <?php endif; ?>

            <?php if(in_array('timelogs',$modules)): ?>
                <li><a href="<?php echo e(route('member.all-time-logs.index')); ?>" class="waves-effect"><i class="icon-clock"></i> <span class="hide-menu"><?php echo app('translator')->getFromJson('app.menu.timeLogs'); ?> </span></a> </li>
            <?php endif; ?>

            <?php if(in_array('attendance',$modules)): ?>
            <li><a href="<?php echo e(route('member.attendances.index')); ?>" class="waves-effect"><i class="icon-clock"></i> <span class="hide-menu"><?php echo app('translator')->getFromJson("app.menu.attendance"); ?> </span></a> </li>
            <?php endif; ?>

            <?php if(in_array('holidays',$modules)): ?>
            <li><a href="<?php echo e(route('member.holidays.index')); ?>" class="waves-effect"><i class="icon-calender"></i> <span class="hide-menu"><?php echo app('translator')->getFromJson("app.menu.holiday"); ?> </span></a> </li>
            <?php endif; ?>

            <?php if(in_array('tickets',$modules)): ?>
            <li><a href="<?php echo e(route('member.tickets.index')); ?>" class="waves-effect"><i class="ti-ticket"></i> <span class="hide-menu"><?php echo app('translator')->getFromJson("app.menu.tickets"); ?> </span></a> </li>
            <?php endif; ?>

            <?php if((in_array('estimates',$modules) && $user->can('view_estimates'))
            || (in_array('invoices',$modules)  && $user->can('view_invoices'))
            || (in_array('payments',$modules) && $user->can('view_payments'))
            || (in_array('expenses',$modules))): ?>
            <li><a href="<?php echo e(route('member.finance.index')); ?>" class="waves-effect"><i class="fa fa-money"></i> <span class="hide-menu"> <?php echo app('translator')->getFromJson('app.menu.finance'); ?> <?php if($unreadExpenseCount > 0): ?> <div class="notify notification-color"><span class="heartbit"></span><span class="point"></span></div><?php endif; ?> <span class="fa arrow"></span> </span></a>
                <ul class="nav nav-second-level">
                    <?php if(in_array('estimates',$modules)): ?>
                    <?php if($user->can('view_estimates')): ?>
                        <li><a href="<?php echo e(route('member.estimates.index')); ?>"><?php echo app('translator')->getFromJson('app.menu.estimates'); ?></a> </li>
                    <?php endif; ?>
                    <?php endif; ?>

                    <?php if(in_array('invoices',$modules)): ?>
                    <?php if($user->can('view_invoices')): ?>
                        <li><a href="<?php echo e(route('member.all-invoices.index')); ?>"><?php echo app('translator')->getFromJson('app.menu.invoices'); ?></a> </li>
                    <?php endif; ?>
                    <?php endif; ?>

                    <?php if(in_array('payments',$modules)): ?>
                    <?php if($user->can('view_payments')): ?>
                        <li><a href="<?php echo e(route('member.payments.index')); ?>"><?php echo app('translator')->getFromJson('app.menu.payments'); ?></a> </li>
                    <?php endif; ?>
                    <?php endif; ?>

                    <?php if(in_array('expenses',$modules)): ?>
                        <li><a href="<?php echo e(route('member.expenses.index')); ?>"><?php echo app('translator')->getFromJson('app.menu.expenses'); ?> <?php if($unreadExpenseCount > 0): ?> <div class="notify notification-color"><span class="heartbit"></span><span class="point"></span></div><?php endif; ?></a> </li>
                    <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>

            <?php if(in_array('messages',$modules)): ?>
            <li><a href="<?php echo e(route('member.user-chat.index')); ?>" class="waves-effect"><i class="icon-envelope"></i> <span class="hide-menu"><?php echo app('translator')->getFromJson("app.menu.messages"); ?> <?php if($unreadMessageCount > 0): ?><span class="label label-rouded label-custom pull-right"><?php echo e($unreadMessageCount); ?></span> <?php endif; ?>
                    </span>
                </a>
            </li>
            <?php endif; ?>

            <?php if(in_array('events',$modules)): ?>
            <li><a href="<?php echo e(route('member.events.index')); ?>" class="waves-effect"><i class="icon-calender"></i> <span class="hide-menu"><?php echo app('translator')->getFromJson('app.menu.Events'); ?></span></a> </li>
            <?php endif; ?>

            <?php if(in_array('leaves',$modules)): ?>
            <li><a href="<?php echo e(route('member.leaves.index')); ?>" class="waves-effect"><i class="icon-logout"></i> <span class="hide-menu"><?php echo app('translator')->getFromJson('app.menu.leaves'); ?></span></a> </li>
            <?php endif; ?>

            <?php if(in_array('notices',$modules)): ?>
            <?php if($user->can('view_notice')): ?>
                <li><a href="<?php echo e(route('member.notices.index')); ?>" class="waves-effect"><i class="ti-layout-media-overlay"></i> <span class="hide-menu"><?php echo app('translator')->getFromJson("app.menu.noticeBoard"); ?> </span></a> </li>
            <?php endif; ?>
            <?php endif; ?>
        </ul>
    </div>
</div>
