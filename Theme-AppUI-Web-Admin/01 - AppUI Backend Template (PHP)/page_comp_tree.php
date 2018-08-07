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
                    <h1>Tree View Lists</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Components</li>
                        <li><a href="">Tree View Lists</a></li>
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
            <h2>Example Lists</h2>
        </div>
        <!-- END Example Lists Title -->

        <!-- Example Lists Content -->
        <div class="row">
            <div class="col-md-6">
                <h4 class="sub-header">A default tree view</h4>
                <div id="easy-tree1">
                    <ul>
                        <li class="isFolder isExpanded">
                            Links
                            <ul>
                               <li><a href="http://www.google.com" target="_blank">Google Search</a></li>
                               <li><a href="http://themeforest.net" target="_blank">Themeforest</a></li>
                               <li><img src="img/placeholders/avatars/avatar.jpg" alt="Twitter"><a href="https://twitter.com/pixelcave" target="_blank">Follow me on Twitter</a></li>
                            </ul>
                        </li>
                        <li class="isFolder isExpanded">
                            Images
                            <ul>
                                <li><img src="img/placeholders/photos/photo1.jpg" alt="Mountain"> <a href="javascript:void(0)">The mountain.jpg</a></li>
                                <li><img src="img/placeholders/photos/photo2.jpg" alt="Mountain"> <a href="javascript:void(0)">Pizza.jpg</a></li>
                                <li><img src="img/placeholders/photos/photo3.jpg" alt="Mountain"> <a href="javascript:void(0)">Nature1.jpg</a></li>
                                <li><img src="img/placeholders/photos/photo6.jpg" alt="Mountain"> <a href="javascript:void(0)">Rain.jpg</a></li>
                                <li><img src="img/placeholders/photos/photo5.jpg" alt="Mountain"> <a href="javascript:void(0)">Car.jpg</a></li>
                            </ul>
                        </li>
                        <li class="isFolder isExpanded">
                            Extra folder
                            <ul>
                                <li>File1</li>
                                <li>File2</li>
                                <li>File3</li>
                            </ul>
                        </li>
                        <li><img src="img/icon57.png" alt="Favicon"><a href="index.php">Dashboard</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <h4 class="sub-header">A drag & drop tree view without icons</h4>
                <div id="easy-tree2">
                    <ul>
                        <li class="isFolder isExpanded">
                            Links
                            <ul>
                               <li><a href="http://www.google.com" target="_blank">Google Search</a></li>
                               <li><a href="http://themeforest.net" target="_blank">Themeforest</a></li>
                               <li><img src="img/placeholders/avatars/avatar.jpg" alt="Twitter"><a href="https://twitter.com/pixelcave" target="_blank">Follow me on Twitter</a></li>
                            </ul>
                        </li>
                        <li class="isFolder isExpanded">
                            Images
                            <ul>
                                <li><img src="img/placeholders/photos/photo1.jpg" alt="Mountain"> <a href="javascript:void(0)">The mountain.jpg</a></li>
                                <li><img src="img/placeholders/photos/photo2.jpg" alt="Mountain"> <a href="javascript:void(0)">Pizza.jpg</a></li>
                                <li><img src="img/placeholders/photos/photo3.jpg" alt="Mountain"> <a href="javascript:void(0)">Nature1.jpg</a></li>
                                <li><img src="img/placeholders/photos/photo6.jpg" alt="Mountain"> <a href="javascript:void(0)">Rain.jpg</a></li>
                                <li><img src="img/placeholders/photos/photo5.jpg" alt="Mountain"> <a href="javascript:void(0)">Car.jpg</a></li>
                            </ul>
                        </li>
                        <li class="isFolder isExpanded">
                            Extra folder
                            <ul>
                                <li>File1</li>
                                <li>File2</li>
                                <li>File3</li>
                            </ul>
                        </li>
                        <li><img src="img/icon57.png" alt="Favicon"><a href="index.php">Dashboard</a></li>
                    </ul>
                </div>
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
<script src="js/pages/compTree.js"></script>
<script>$(function(){ CompTree.init(); });</script>

<?php include 'inc/template_end.php'; ?>