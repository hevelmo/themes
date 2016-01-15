<?php require_once 'helpers/functions.php'; ?>
<?php require_once 'content.php'; ?>

<?php get_header($title = 'Header Social Icons', $header = 'social-icons'); ?>

    <div id="main-wrapper">
        <div id="main">
            <div id="main-inner">

                <?php require_once 'helpers/blocks/map.php'; ?>

                <div class="container">
                    <?php require_once 'helpers/blocks/isotope-grid.php'; ?>
                    <?php require_once 'helpers/blocks/carousel.php'; ?>
                    <?php require_once 'helpers/blocks/hexs.php'; ?>
                </div><!-- /.container -->
            </div><!-- /#main-inner -->
        </div><!-- /#main -->
    </div><!-- /#main-wrapper -->

<?php get_footer(); ?>