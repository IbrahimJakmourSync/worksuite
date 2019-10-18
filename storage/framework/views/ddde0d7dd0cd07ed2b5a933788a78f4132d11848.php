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
                    <li><a href="<?php echo e(route('client.profile.index')); ?>"><i class="ti-user"></i> <?php echo app('translator')->getFromJson("app.menu.profileSettings"); ?></a></li>
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


            <li><a href="<?php echo e(route('client.dashboard.index')); ?>" class="waves-effect"><i class="icon-speedometer"></i> <span class="hide-menu"><?php echo app('translator')->getFromJson('app.menu.dashboard'); ?> </span></a> </li>

            <?php if(in_array('projects',$modules)): ?>
                <li><a href="<?php echo e(route('client.projects.index')); ?>" class="waves-effect"><i class="icon-layers"></i> <span class="hide-menu"><?php echo app('translator')->getFromJson('app.menu.projects'); ?> </span> <?php if($unreadProjectCount > 0): ?> <div class="notify notification-color"><span class="heartbit"></span><span class="point"></span></div><?php endif; ?></a> </li>
            <?php endif; ?>

            <?php if(in_array('tickets',$modules)): ?>
                <li><a href="<?php echo e(route('client.tickets.index')); ?>" class="waves-effect"><i class="ti-ticket"></i> <span class="hide-menu"><?php echo app('translator')->getFromJson("app.menu.tickets"); ?> </span></a> </li>
            <?php endif; ?>

            <?php if(in_array('invoices',$modules)): ?>
                <li><a href="<?php echo e(route('client.invoices.index')); ?>" class="waves-effect"><i class="ti-receipt"></i> <span class="hide-menu"><?php echo app('translator')->getFromJson('app.menu.invoices'); ?> </span> <?php if($unreadInvoiceCount > 0): ?> <div class="notify notification-color"><span class="heartbit"></span><span class="point"></span></div><?php endif; ?></a> </li>
            <?php endif; ?>

            <?php if(in_array('estimates',$modules)): ?>
                <li><a href="<?php echo e(route('client.estimates.index')); ?>" class="waves-effect"><i class="icon-doc"></i> <span class="hide-menu"><?php echo app('translator')->getFromJson('app.menu.estimates'); ?> </span> <?php if($unreadEstimateCount > 0): ?> <div class="notify notification-color"><span class="heartbit"></span><span class="point"></span></div><?php endif; ?></a> </li>
            <?php endif; ?>

            <?php if(in_array('events',$modules)): ?>
                <li><a href="<?php echo e(route('client.events.index')); ?>" class="waves-effect"><i class="icon-calender"></i> <span class="hide-menu"><?php echo app('translator')->getFromJson('app.menu.Events'); ?></span></a> </li>
            <?php endif; ?>

            <?php if(in_array('messages',$modules)): ?>
            <?php if($messageSetting->allow_client_admin == 'yes' || $messageSetting->allow_client_employee == 'yes'): ?>
            <li><a href="<?php echo e(route('client.user-chat.index')); ?>" class="waves-effect"><i class="icon-envelope"></i> <span class="hide-menu"><?php echo app('translator')->getFromJson('app.menu.messages'); ?> <?php if($unreadMessageCount > 0): ?><span class="label label-rouded label-custom pull-right"><?php echo e($unreadMessageCount); ?></span> <?php endif; ?></span></a> </li>
            <?php endif; ?>
            <?php endif; ?>

        </ul>
    </div>
</div>
