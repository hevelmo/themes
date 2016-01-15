<?php require_once 'helpers/functions.php'; ?>
<?php require_once 'content.php'; ?>

<?php get_header($title = 'Agent Detail'); ?>

    <div id="main-wrapper">
        <div id="main">
            <div id="main-inner">
                <div class="container">
                    <div class="block-content block-content-small-padding">
                        <div class="block-content-inner">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h2>John Doe Agent Template</h2>

                                    <div class="agent-detail">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="agent-detail-picture">
                                                    <img src="<?php echo get_agent_image(); ?>" alt="" class="img-responsive">
                                                </div><!-- /.agent-detail-picture -->
                                            </div>

                                            <div class="col-sm-8">
                                                <p>
                                                    Donec faucibus metus sed eros euismod, eu viverra augue viverra. Sed auctor vel ligula nec molestie. Aenean a gravida metus, non sagittis nisl. Nunc quis sem sit amet leo tincidunt laoreet. Praesent a tempor nisl, id suscipit elit. Cras dolor turpis, posuere ut mollis id, rutrum eget augue. Aenean ut ligula quis neque ullamcorper tristique ut a ante. Vivamus enim erat, sollicitudin non facilisis accumsan, dictum nec libero.
                                                </p>

                                                <ul class="social social-boxed">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                </ul><!-- /.social-->
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.agent-detail -->

                                    <h2>Assigned Properties</h2>

                                    <div class="row">
                                        <div class="property-item property-featured col-sm-6 col-md-4">
                                            <div class="property-box">
                                                <div class="property-box-inner">
                                                    <h3 class="property-box-title"><a href="#"><?php echo get_title(); ?></a></h3>
                                                    <h4 class="property-box-subtitle"><a href="#"><?php echo get_location(); ?></a></h4>
                                                    <div class="property-box-label property-box-label-primary">Rent</div><!-- /.property-box-label -->

                                                    <div class="property-box-picture">
                                                        <div class="property-box-price"><?php echo get_price(); ?></div><!-- /.property-box-price -->
                                                        <div class="property-box-picture-inner">
                                                            <a href="#" class="property-box-picture-target">
                                                                <img src="<?php echo get_image('medium'); ?>" alt="">
                                                            </a><!-- /.property-box-picture-target -->
                                                        </div><!-- /.property-picture-inner -->
                                                    </div><!-- /.property-picture -->

                                                    <div class="property-box-meta">
                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_number(); ?></strong>
                                                            <span>Baths</span>
                                                        </div><!-- /.col-sm-3 -->

                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_number(); ?></strong>
                                                            <span>Beds</span>
                                                        </div><!-- /.col-sm-3 -->

                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_area(); ?></strong>
                                                            <span>Area</span>
                                                        </div><!-- /.col-sm-3 -->

                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_number(); ?></strong>
                                                            <span>Garages</span>
                                                        </div><!-- /.col-sm-3 -->
                                                    </div><!-- /.property-box-meta -->
                                                </div><!-- /.property-box-inner -->
                                            </div><!-- /.property-box -->
                                        </div><!-- /.property-item -->

                                        <div class="property-item property-rent col-sm-6 col-md-4">
                                            <div class="property-box">
                                                <div class="property-box-inner">
                                                    <h3 class="property-box-title"><a href="#"><?php echo get_title(); ?></a></h3>
                                                    <h4 class="property-box-subtitle"><a href="#"><?php echo get_location(); ?></a></h4>

                                                    <div class="property-box-picture">
                                                        <div class="property-box-price"><?php echo get_price('rent'); ?></div><!-- /.property-box-price -->
                                                        <div class="property-box-picture-inner">
                                                            <a href="#" class="property-box-picture-target">
                                                                <img src="<?php echo get_image('medium'); ?>" alt="">
                                                            </a><!-- /.property-box-picture-target -->
                                                        </div><!-- /.property-picture-inner -->
                                                    </div><!-- /.property-picture -->

                                                    <div class="property-box-meta">
                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_number(); ?></strong>
                                                            <span>Baths</span>
                                                        </div><!-- /.col-sm-3 -->

                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_number(); ?></strong>
                                                            <span>Beds</span>
                                                        </div><!-- /.col-sm-3 -->

                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_area(); ?></strong>
                                                            <span>Area</span>
                                                        </div><!-- /.col-sm-3 -->

                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_number(); ?></strong>
                                                            <span>Garages</span>
                                                        </div><!-- /.col-sm-3 -->
                                                    </div><!-- /.property-box-meta -->
                                                </div><!-- /.property-box-inner -->
                                            </div><!-- /.property-box -->
                                        </div><!-- /.property-item -->

                                        <div class="property-item property-sale col-sm-6 col-md-4">
                                            <div class="property-box">
                                                <div class="property-box-inner">
                                                    <h3 class="property-box-title"><a href="#"><?php echo get_title(); ?></a></h3>
                                                    <h4 class="property-box-subtitle"><a href="#"><?php echo get_location(); ?></a></h4>
                                                    <div class="property-box-label">Sale</div><!-- /.property-box-label -->

                                                    <div class="property-box-picture">
                                                        <div class="property-box-price"><?php echo get_price(); ?></div><!-- /.property-box-price -->
                                                        <div class="property-box-picture-inner">
                                                            <a href="#" class="property-box-picture-target">
                                                                <img src="<?php echo get_image('medium'); ?>" alt="">
                                                            </a><!-- /.property-box-picture-target -->
                                                        </div><!-- /.property-picture-inner -->
                                                    </div><!-- /.property-picture -->

                                                    <div class="property-box-meta">
                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_number(); ?></strong>
                                                            <span>Baths</span>
                                                        </div><!-- /.col-sm-3 -->

                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_number(); ?></strong>
                                                            <span>Beds</span>
                                                        </div><!-- /.col-sm-3 -->

                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_area(); ?></strong>
                                                            <span>Area</span>
                                                        </div><!-- /.col-sm-3 -->

                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_number(); ?></strong>
                                                            <span>Garages</span>
                                                        </div><!-- /.col-sm-3 -->
                                                    </div><!-- /.property-box-meta -->
                                                </div><!-- /.property-box-inner -->
                                            </div><!-- /.property-box -->
                                        </div><!-- /.property-item -->

                                        <div class="property-item property-featured col-sm-6 col-md-4">
                                            <div class="property-box">
                                                <div class="property-box-inner">
                                                    <h3 class="property-box-title"><a href="#"><?php echo get_title(); ?></a></h3>
                                                    <h4 class="property-box-subtitle"><a href="#"><?php echo get_location(); ?></a></h4>
                                                    <div class="property-box-label property-box-label-primary">Rent</div><!-- /.property-box-label -->

                                                    <div class="property-box-picture">
                                                        <div class="property-box-price"><?php echo get_price(); ?></div><!-- /.property-box-price -->
                                                        <div class="property-box-picture-inner">
                                                            <a href="#" class="property-box-picture-target">
                                                                <img src="<?php echo get_image('medium'); ?>" alt="">
                                                            </a><!-- /.property-box-picture-target -->
                                                        </div><!-- /.property-picture-inner -->
                                                    </div><!-- /.property-picture -->

                                                    <div class="property-box-meta">
                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_number(); ?></strong>
                                                            <span>Baths</span>
                                                        </div><!-- /.col-sm-3 -->

                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_number(); ?></strong>
                                                            <span>Beds</span>
                                                        </div><!-- /.col-sm-3 -->

                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_area(); ?></strong>
                                                            <span>Area</span>
                                                        </div><!-- /.col-sm-3 -->

                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_number(); ?></strong>
                                                            <span>Garages</span>
                                                        </div><!-- /.col-sm-3 -->
                                                    </div><!-- /.property-box-meta -->
                                                </div><!-- /.property-box-inner -->
                                            </div><!-- /.property-box -->
                                        </div><!-- /.property-item -->

                                        <div class="property-item property-rent col-sm-6 col-md-4">
                                            <div class="property-box">
                                                <div class="property-box-inner">
                                                    <h3 class="property-box-title"><a href="#"><?php echo get_title(); ?></a></h3>
                                                    <h4 class="property-box-subtitle"><a href="#"><?php echo get_location(); ?></a></h4>

                                                    <div class="property-box-picture">
                                                        <div class="property-box-price"><?php echo get_price('rent'); ?></div><!-- /.property-box-price -->
                                                        <div class="property-box-picture-inner">
                                                            <a href="#" class="property-box-picture-target">
                                                                <img src="<?php echo get_image('medium'); ?>" alt="">
                                                            </a><!-- /.property-box-picture-target -->
                                                        </div><!-- /.property-picture-inner -->
                                                    </div><!-- /.property-picture -->

                                                    <div class="property-box-meta">
                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_number(); ?></strong>
                                                            <span>Baths</span>
                                                        </div><!-- /.col-sm-3 -->

                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_number(); ?></strong>
                                                            <span>Beds</span>
                                                        </div><!-- /.col-sm-3 -->

                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_area(); ?></strong>
                                                            <span>Area</span>
                                                        </div><!-- /.col-sm-3 -->

                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_number(); ?></strong>
                                                            <span>Garages</span>
                                                        </div><!-- /.col-sm-3 -->
                                                    </div><!-- /.property-box-meta -->
                                                </div><!-- /.property-box-inner -->
                                            </div><!-- /.property-box -->
                                        </div><!-- /.property-item -->

                                        <div class="property-item property-sale col-sm-6 col-md-4">
                                            <div class="property-box">
                                                <div class="property-box-inner">
                                                    <h3 class="property-box-title"><a href="#"><?php echo get_title(); ?></a></h3>
                                                    <h4 class="property-box-subtitle"><a href="#"><?php echo get_location(); ?></a></h4>
                                                    <div class="property-box-label">Sale</div><!-- /.property-box-label -->

                                                    <div class="property-box-picture">
                                                        <div class="property-box-price"><?php echo get_price(); ?></div><!-- /.property-box-price -->
                                                        <div class="property-box-picture-inner">
                                                            <a href="#" class="property-box-picture-target">
                                                                <img src="<?php echo get_image('medium'); ?>" alt="">
                                                            </a><!-- /.property-box-picture-target -->
                                                        </div><!-- /.property-picture-inner -->
                                                    </div><!-- /.property-picture -->

                                                    <div class="property-box-meta">
                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_number(); ?></strong>
                                                            <span>Baths</span>
                                                        </div><!-- /.col-sm-3 -->

                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_number(); ?></strong>
                                                            <span>Beds</span>
                                                        </div><!-- /.col-sm-3 -->

                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_area(); ?></strong>
                                                            <span>Area</span>
                                                        </div><!-- /.col-sm-3 -->

                                                        <div class="property-box-meta-item col-sm-3">
                                                            <strong><?php echo get_number(); ?></strong>
                                                            <span>Garages</span>
                                                        </div><!-- /.col-sm-3 -->
                                                    </div><!-- /.property-box-meta -->
                                                </div><!-- /.property-box-inner -->
                                            </div><!-- /.property-box -->
                                        </div><!-- /.property-item -->
                                    </div><!-- /.row -->

                                    <h2>Contact Agent Directly</h2>

                                    <form method="post" action="?" class="box">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control">
                                                </div><!-- /.form-group -->
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Subject</label>
                                                    <input type="text" class="form-control">
                                                </div><!-- /.form-group -->
                                            </div>
                                        </div><!-- /.row -->

                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea rows="8" class="form-control"></textarea>
                                        </div><!-- /.form-group -->

                                        <div class="form-group">
                                            <input type="submit" value="Contact Agent" class="btn btn-primary btn-inversed">
                                        </div><!-- /.form-group -->
                                    </form>
                                </div>

                                <div class="col-sm-3">
                                    <div class="sidebar">
                                        <div class="sidebar-inner">
                                            <?php require 'helpers/widgets/contact-form.php'; ?>
                                            <?php require 'helpers/widgets/recent-properties.php'; ?>
                                        </div><!-- /.sidebar-inner -->
                                    </div><!-- /.sidebar -->
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.block-content-inner -->
                    </div><!-- /.block-content -->
                </div><!-- /.container -->
            </div><!-- /#main-inner -->
        </div><!-- /#main -->
    </div><!-- /#main-wrapper -->
<?php get_footer($footer = 'recent-info'); ?>