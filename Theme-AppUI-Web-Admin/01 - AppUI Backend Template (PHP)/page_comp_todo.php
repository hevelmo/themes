<?php include 'inc/config.php'; $template['header_link'] = 'COMPONENTS'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<!--
    Available classes when #page-content-sidebar is used:

    'inner-sidebar-left'      for a left inner sidebar
    'inner-sidebar-right'     for a right inner sidebar
-->
<div id="page-content" class="inner-sidebar-left">
    <!-- Inner Sidebar -->
    <div id="page-content-sidebar">
        <!-- Collapsible Options -->
        <a href="javascript:void(0)" class="btn btn-block btn-default visible-xs" data-toggle="collapse" data-target="#todo-options">Options</a>
        <div id="todo-options" class="collapse navbar-collapse remove-padding">
            <!-- Lists -->
            <h4 class="inner-sidebar-header">
                <a href="javascript:void(0)" class="btn btn-xs btn-default pull-right"><i class="fa fa-plus"></i></a>
                Lists
            </h4>
            <div class="block-section">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active">
                        <a href="javascript:void(0)">
                            <span class="badge pull-right">16</span>
                            <i class="fa fa-briefcase fa-fw icon-push"></i> <strong>Projects</strong>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <span class="badge pull-right">14</span>
                            <i class="fa fa-gamepad fa-fw icon-push"></i> <strong>Video Games</strong>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <span class="badge pull-right">19</span>
                            <i class="fa fa-user fa-fw icon-push"></i> <strong>Personal</strong>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <span class="badge pull-right">15</span>
                            <i class="fa fa-share-alt fa-fw icon-push"></i> <strong>Social</strong>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <span class="badge pull-right">25</span>
                            <i class="fa fa-video-camera fa-fw icon-push"></i> <strong>Movies</strong>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <span class="badge pull-right">23</span>
                            <i class="fa fa-book fa-fw icon-push"></i> <strong>Books</strong>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Lists -->

            <!-- Account -->
            <h4 class="inner-sidebar-header">
                <a href="javascript:void(0)" class="btn btn-xs btn-default pull-right"><i class="fa fa-cog"></i></a>
                Account
            </h4>
            <div class="text-center">
                <div class="pie-chart block-section" data-percent="60" data-line-width="2" data-bar-color="#deb25c" data-track-color="#ffffff">
                    <img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="pie-avatar img-circle">
                </div>
            </div>
            <table class="table table-striped table-vcenter">
                <tbody>
                    <tr>
                        <td class="text-right"><strong>Storage</strong></td>
                        <td><strong>60</strong> of <strong>100</strong> MB</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>Plan Valid</strong></td>
                        <td><strong>6</strong> months left</td>
                    </tr>
                    <tr>
                        <td class="text-right" style="width: 50%;"><strong>Active Plan</strong></td>
                        <td>Tiny <a href="page_ready_pricing_tables.php" data-toggle="tooltip" title="Upgrade to Pro"><i class="fa fa-chevron-up"></i></a></td>
                    </tr>
                </tbody>
            </table>
            <!-- END Account -->
        </div>
        <!-- END Collapsible Options -->
    </div>
    <!-- END Inner Sidebar -->

    <!-- Tasks List -->
    <!-- Add new task functionality (initialized in js/pages/readyTasks.js) -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-lg-6 col-lg-offset-3">
            <form id="add-task-form" class="push">
                <input type="text" id="add-task" name="add-task" class="form-control input-lg" placeholder="Enter a task and press enter..">
            </form>
            <ul class="task-list">
                <li>
                    <a href="javascript:void(0)" class="task-close text-danger"><i class="fa fa-times"></i></a>
                    <label class="checkbox-inline">
                        <input type="checkbox"> Update plugins
                    </label>
                </li>
                <li class="task-done">
                    <a href="javascript:void(0)" class="task-close text-danger"><i class="fa fa-times"></i></a>
                    <label class="checkbox-inline">
                        <input type="checkbox"> To do list page
                    </label>
                </li>
                <li>
                    <a href="javascript:void(0)" class="task-close text-danger"><i class="fa fa-times"></i></a>
                    <label class="checkbox-inline">
                        <input type="checkbox"> PSDs Freebies
                    </label>
                </li>
                <li class="in-2x">
                    <a href="javascript:void(0)" class="task-close text-danger"><i class="fa fa-times"></i></a>
                    <label class="checkbox-inline">
                        <input type="checkbox"> Icon pack
                    </label>
                </li>
                <li class="in-2x">
                    <a href="javascript:void(0)" class="task-close text-danger"><i class="fa fa-times"></i></a>
                    <label class="checkbox-inline">
                        <input type="checkbox"> Widget Pack
                    </label>
                </li>
                <li>
                    <a href="javascript:void(0)" class="task-close text-danger"><i class="fa fa-times"></i></a>
                    <label class="checkbox-inline">
                        <input type="checkbox"> Design UI Elements
                    </label>
                </li>
                <li>
                    <a href="javascript:void(0)" class="task-close text-danger"><i class="fa fa-times"></i></a>
                    <label class="checkbox-inline">
                        <input type="checkbox"> New Features
                    </label>
                </li>
                <li class="in-1x task-done">
                    <a href="javascript:void(0)" class="task-close text-danger"><i class="fa fa-times"></i></a>
                    <label class="checkbox-inline">
                        <input type="checkbox"> User Profile page
                    </label>
                </li>
                <li class="in-1x">
                    <a href="javascript:void(0)" class="task-close text-danger"><i class="fa fa-times"></i></a>
                    <label class="checkbox-inline">
                        <input type="checkbox"> Create new pages
                    </label>
                </li>
                <li>
                    <a href="javascript:void(0)" class="task-close text-danger"><i class="fa fa-times"></i></a>
                    <label class="checkbox-inline">
                        <input type="checkbox"> Fix some CSS bugs
                    </label>
                </li>
                <li>
                    <a href="javascript:void(0)" class="task-close text-danger"><i class="fa fa-times"></i></a>
                    <label class="checkbox-inline">
                        <input type="checkbox"> Add new components
                    </label>
                </li>
            </ul>
        </div>
    </div>
    <!-- END Task List -->
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/compTodo.js"></script>
<script>$(function(){ CompTodo.init(); });</script>

<?php include 'inc/template_end.php'; ?>