<?php require_once 'helpers/functions.php'; ?>

<?php get_header($title = 'Invoice'); ?>

<div id="main-wrapper">
    <div id="main">
        <div id="main-inner">
            <div class="container">
                <?php require_once 'helpers/blocks/invoice.php'; ?>
            </div><!-- /.container -->
        </div><!-- /#main-inner -->
    </div><!-- /#main -->
</div><!-- /#main-wrapper -->

<?php get_footer(); ?>