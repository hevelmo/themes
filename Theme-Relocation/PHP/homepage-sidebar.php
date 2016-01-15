<?php require_once 'helpers/functions.php'; ?>
<?php require_once 'content.php'; ?>

<?php get_header(); ?>

    <div id="main-wrapper">
        <div id="main">
            <div id="main-inner">

                <?php require_once 'helpers/blocks/map.php'; ?>

                <div class="container">
                    <?php require 'helpers/blocks/slogan.php'?>
                    <div class="block-content block-content-small-padding">
                        <div class="row">
                            <div class="col-sm-9">
                                <h2>Recent Properties</h2>

                                <div class="row">
                                    <div class="property-item property-rent col-sm-4">
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

                                    <div class="property-item property-sale col-sm-4">
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

                                    <div class="property-item property-rent col-sm-4">
                                        <div class="property-box">
                                            <div class="property-box-inner">
                                                <h3 class="property-box-title"><a href="#"><?php echo get_title(); ?></a></h3>
                                                <h4 class="property-box-subtitle"><a href="#"><?php echo get_location(); ?></a></h4>

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

                                <div class="row">
                                    <div class="property-item property-rent col-sm-4">
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

                                    <div class="property-item property-sale col-sm-4">
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

                                    <div class="property-item property-rent col-sm-4">
                                        <div class="property-box">
                                            <div class="property-box-inner">
                                                <h3 class="property-box-title"><a href="#"><?php echo get_title(); ?></a></h3>
                                                <h4 class="property-box-subtitle"><a href="#"><?php echo get_location(); ?></a></h4>

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
                            </div>

                            <div class="col-sm-3">
                                <div class="sidebar">
                                    <div class="sidebar-inner">
                                        <?php require 'helpers/widgets/mortgage-calculator.php'?>
                                        <?php require 'helpers/widgets/contact-form.php'?>
                                    </div><!-- /.sidebar-inner -->
                                </div><!-- /.sidebar -->
                            </div>
                        </div><!-- /.row -->
                    </div><!-- /.block-content -->
                    <?php require 'helpers/blocks/social.php'?>

                    <?php require 'helpers/blocks/statistics.php'?>
                </div><!-- /.container -->
            </div><!-- /#main-inner -->
        </div><!-- /#main -->
    </div><!-- /#main-wrapper -->

<?php get_footer(); ?>