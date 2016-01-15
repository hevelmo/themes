<?php require_once 'helpers/functions.php'; ?>
<?php require_once 'content.php'; ?>

<?php get_header(); ?>

    <div id="main-wrapper">
        <div id="main">
            <div id="main-inner">

                <div class="static-image">
                    <div class="static-image-inner">
                        <img src="assets/img/tmp/properties/large/5xxl.jpg" alt="">
                    </div><!-- /.static-image-inner -->

                    <div class="container">
                        <div class="static-image-description-wrapper">
                            <div class="static-image-description">
                                <div class="static-image-title"><?php echo get_title(); ?></div>
                                <div class="static-image-subtitle"><?php echo get_location(); ?></div>
                                <div class="static-image-price">$640 000</div>
                            </div><!-- /.static-image-description -->
                        </div><!-- /.container -->
                    </div><!-- /.static-image-description -->
                </div><!-- /.static-image -->


                <div class="container">
                    <?php require_once 'helpers/blocks/isotope-grid.php'; ?>
                    <?php require_once 'helpers/blocks/carousel.php'; ?>
                    <?php require_once 'helpers/blocks/hexs.php'; ?>
                </div><!-- /.container -->
            </div><!-- /#main-inner -->
        </div><!-- /#main -->
    </div><!-- /#main-wrapper -->

<?php get_footer(); ?>