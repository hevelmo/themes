<?php require_once 'helpers/functions.php'; ?>
<?php require_once 'content.php'; ?>

<?php get_header($title = 'Blog Left Sidebar'); ?>

<div id="main-wrapper">
    <div id="main">
        <div id="main-inner">
            <div class="container">
                <div class="block-content block-content-small-padding">
                    <div class="block-content-inner">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="sidebar">
                                    <div class="sidebar-inner">
                                        <?php require 'helpers/widgets/links.php'; ?>
                                        <?php require 'helpers/widgets/recent-properties.php'; ?>
                                        <?php require 'helpers/widgets/contact.php'; ?>
                                    </div><!-- /.sidebar-inner -->
                                </div><!-- /.sidebar -->
                            </div>

                            <div class="col-sm-9">
                                <h2>Left Sidebar Blog Template</h2>

                                <div class="posts">
                                    <div class="post clearfix">
                                        <div class="row">
                                            <div class="post-date col-sm-1">
                                                <span><i class="fa fa-calendar"></i> Mar</span>
                                                <strong>26</strong>
                                            </div><!-- /.post-date -->

                                            <div class="post-picture col-sm-3">
                                                <div class="post-picture-inner">
                                                    <a href="" class="post-picture-target">
                                                        <img src="<?php echo get_image('medium'); ?>" alt="" class="img-responsive">
                                                    </a><!-- /.post-picture-target -->
                                                </div><!-- /.post-picture-inner -->
                                            </div><!-- /.post-picture -->

                                            <div class="post-content col-sm-8">
                                                <h3 class="post-title"><a href="#">Aliquam risus neque, egestas aliquet</a></h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer placerat condimentum nulla, sit amet porta lacus ultrices eget. Sed eu vehicula sapien. Donec et lorem sit amet sapien lacinia imperdiet sit amet sed lorem. Vestibulum non libero felis. Donec vulputate vel leo eu consequat. Ut in sodales sapien, nec malesuada nibh. Sed ullamcorper dui non sapien venenatis, at cursus sapien molestie.</p>
                                                <a href="#" class="btn btn-primary">Read</a>
                                            </div><!-- /.post-content-->
                                        </div><!-- /.row -->
                                    </div><!-- /.post -->

                                    <div class="post clearfix">
                                        <div class="row">
                                            <div class="post-date col-sm-1">
                                                <span><i class="fa fa-calendar"></i> Mar</span>
                                                <strong>26</strong>
                                            </div><!-- /.post-date -->

                                            <div class="post-picture col-sm-3">
                                                <div class="post-picture-inner">
                                                    <a href="" class="post-picture-target">
                                                        <img src="<?php echo get_image('medium'); ?>" alt="" class="img-responsive">
                                                    </a><!-- /.post-picture-target -->
                                                </div><!-- /.post-picture-inner -->
                                            </div><!-- /.post-picture -->

                                            <div class="post-content col-sm-8">
                                                <h3 class="post-title"><a href="#">Aliquam risus neque, egestas aliquet</a></h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer placerat condimentum nulla, sit amet porta lacus ultrices eget. Sed eu vehicula sapien. Donec et lorem sit amet sapien lacinia imperdiet sit amet sed lorem. Vestibulum non libero felis. Donec vulputate vel leo eu consequat. Ut in sodales sapien, nec malesuada nibh. Sed ullamcorper dui non sapien venenatis, at cursus sapien molestie.</p>
                                                <a href="#" class="btn btn-primary">Read</a>
                                            </div><!-- /.post-content-->
                                        </div><!-- /.row -->
                                    </div><!-- /.post -->

                                    <div class="post clearfix">
                                        <div class="row">
                                            <div class="post-date col-sm-1">
                                                <span><i class="fa fa-calendar"></i> Mar</span>
                                                <strong>26</strong>
                                            </div><!-- /.post-date -->

                                            <div class="post-picture col-sm-3">
                                                <div class="post-picture-inner">
                                                    <a href="" class="post-picture-target">
                                                        <img src="<?php echo get_image('medium'); ?>" alt="" class="img-responsive">
                                                    </a><!-- /.post-picture-target -->
                                                </div><!-- /.post-picture-inner -->
                                            </div><!-- /.post-picture -->

                                            <div class="post-content col-sm-8">
                                                <h3 class="post-title"><a href="#">Aliquam risus neque, egestas aliquet</a></h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer placerat condimentum nulla, sit amet porta lacus ultrices eget. Sed eu vehicula sapien. Donec et lorem sit amet sapien lacinia imperdiet sit amet sed lorem. Vestibulum non libero felis. Donec vulputate vel leo eu consequat. Ut in sodales sapien, nec malesuada nibh. Sed ullamcorper dui non sapien venenatis, at cursus sapien molestie.</p>
                                                <a href="#" class="btn btn-primary">Read</a>
                                            </div><!-- /.post-content-->
                                        </div><!-- /.row -->
                                    </div><!-- /.post -->
                                </div><!-- /.posts -->

                                <div class="center">
                                    <ul class="pagination">
                                        <li><a href="#">&laquo;</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li class="active"><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- /.row -->
                    </div><!-- /.block-content-inner -->
                </div><!-- /.block-content -->
            </div><!-- /.container -->
        </div><!-- /#main-inner -->
    </div><!-- /#main -->
</div><!-- /#main-wrapper -->

<?php get_footer($footer = 'recent-info'); ?>