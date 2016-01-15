<?php require_once 'helpers/functions.php'; ?>
<?php require_once 'content.php'; ?>

<?php get_header($title = 'Properties Grid'); ?>
    <div id="main-wrapper">
        <div id="main">
            <div id="main-inner">
                <div class="container">
                    <div class="block-content block-content-small-padding">
                        <div class="block-content-inner">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2 class="center">Properties Grid</h2>

                                    <div class="row">
                                        <div class="property-item property-featured col-sm-6 col-md-3">
                                            <div class="property-box">
                                                <div class="property-box-inner">
                                                    <h3 class="property-box-title"><a href="#"><?php echo get_title(); ?></a></h3>
                                                    <h4 class="property-box-subtitle"><a href="#"><?php echo get_location(); ?></a></h4>
                                                    <div class="property-box-label property-box-label-primary">Rent</div><!-- /.property-box-label -->

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
                                                            <strong><?php print get_number(); ?></strong>
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

                                        <div class="property-item property-rent col-sm-6 col-md-3">
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

                                        <div class="property-item property-sale col-sm-6 col-md-3">
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

                                        <div class="property-item property-rent col-sm-6 col-md-3">
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
                                        <div class="property-item property-featured col-sm-6 col-md-3">
                                            <div class="property-box">
                                                <div class="property-box-inner">
                                                    <h3 class="property-box-title"><a href="#"><?php echo get_title(); ?></a></h3>
                                                    <h4 class="property-box-subtitle"><a href="#"><?php echo get_location(); ?></a></h4>
                                                    <div class="property-box-label property-box-label-primary">Rent</div><!-- /.property-box-label -->

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

                                        <div class="property-item property-rent col-sm-6 col-md-3">
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

                                        <div class="property-item property-sale col-sm-6 col-md-3">
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

                                        <div class="property-item property-rent col-sm-6 col-md-3">
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
                                        <div class="property-item property-featured col-sm-6 col-md-3">
                                            <div class="property-box">
                                                <div class="property-box-inner">
                                                    <h3 class="property-box-title"><a href="#"><?php echo get_title(); ?></a></h3>
                                                    <h4 class="property-box-subtitle"><a href="#"><?php echo get_location(); ?></a></h4>
                                                    <div class="property-box-label property-box-label-primary">Rent</div><!-- /.property-box-label -->

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

                                        <div class="property-item property-rent col-sm-6 col-md-3">
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

                                        <div class="property-item property-sale col-sm-6 col-md-3">
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

                                        <div class="property-item property-rent col-sm-6 col-md-3">
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
                                    </div><!-- /.row -->

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