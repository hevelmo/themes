<?php include 'inc/config.php'; $template['header_link'] = 'PAGES'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
    <!-- Nestable Lists Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Nestable &amp; Sortable Lists</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Components</li>
                        <li><a href="">Nestable &amp; Sortable Lists</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Nestable Lists Header -->

    <!-- Example Lists Block -->
    <div class="block full">
        <!-- Example Lists Title -->
        <div class="block-title">
            <div id="nestable-actions" class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" data-action="collapse">Collapse All</a>
                <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" data-action="expand">Expand All</a>
            </div>
            <h2>Example Lists</h2>
        </div>
        <!-- END Example Lists Title -->

        <!-- Example Lists Content -->
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div id="nestable1" class="dd">
                    <ol class="dd-list">
                        <li class="dd-item" data-id="1">
                            <div class="dd-handle">Item 1</div>
                        </li>
                        <li class="dd-item" data-id="2">
                            <div class="dd-handle">Item 2</div>
                            <ol class="dd-list">
                                <li class="dd-item" data-id="3"><div class="dd-handle">Item 3</div></li>
                                <li class="dd-item" data-id="4"><div class="dd-handle">Item 4</div></li>
                                <li class="dd-item" data-id="5">
                                    <div class="dd-handle">Item 5</div>
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="6"><div class="dd-handle">Item 6</div></li>
                                        <li class="dd-item" data-id="7"><div class="dd-handle">Item 7</div></li>
                                        <li class="dd-item" data-id="8"><div class="dd-handle">Item 8</div></li>
                                    </ol>
                                </li>
                                <li class="dd-item" data-id="9"><div class="dd-handle">Item 9</div></li>
                                <li class="dd-item" data-id="10"><div class="dd-handle">Item 10</div></li>
                            </ol>
                        </li>
                        <li class="dd-item" data-id="11">
                            <div class="dd-handle">Item 11</div>
                        </li>
                        <li class="dd-item" data-id="12">
                            <div class="dd-handle">Item 12</div>
                        </li>
                    </ol>
                </div>
                <h4 class="sub-header"><i class="fa fa-arrow-circle-o-right"></i> Serialised List Output</h4>
                <code id="nestable1-output"></code>
            </div>
            <div class="col-sm-4 col-sm-offset-1">
                <div id="nestable2" class="dd dd-inverse">
                    <ol class="dd-list">
                        <li class="dd-item" data-id="1">
                            <div class="dd-handle">Item 1</div>
                        </li>
                        <li class="dd-item" data-id="2">
                            <div class="dd-handle">Item 2</div>
                            <ol class="dd-list">
                                <li class="dd-item" data-id="3"><div class="dd-handle">Item 3</div></li>
                                <li class="dd-item" data-id="4"><div class="dd-handle">Item 4</div></li>
                                <li class="dd-item" data-id="5">
                                    <div class="dd-handle">Item 5</div>
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="6"><div class="dd-handle">Item 6</div></li>
                                        <li class="dd-item" data-id="7"><div class="dd-handle">Item 7</div></li>
                                        <li class="dd-item" data-id="8"><div class="dd-handle">Item 8</div></li>
                                    </ol>
                                </li>
                                <li class="dd-item" data-id="9"><div class="dd-handle">Item 9</div></li>
                                <li class="dd-item" data-id="10"><div class="dd-handle">Item 10</div></li>
                            </ol>
                        </li>
                        <li class="dd-item" data-id="11">
                            <div class="dd-handle">Item 11</div>
                        </li>
                        <li class="dd-item" data-id="12">
                            <div class="dd-handle">Item 12</div>
                        </li>
                    </ol>
                </div>
                <h4 class="sub-header"><i class="fa fa-arrow-circle-o-right"></i> Serialised List Output</h4>
                <code id="nestable2-output"></code>
            </div>
        </div>
        <!-- END Example Lists Content -->
    </div>
    <!-- END Example Lists Block -->
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/compNestable.js"></script>
<script>$(function(){ CompNestable.init(); });</script>

<?php include 'inc/template_end.php'; ?>