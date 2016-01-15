<div class="footer-top">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php require 'helpers/widgets/links.php'; ?>
            </div>

            <div class="col-sm-3">
                <?php require 'helpers/widgets/recent-posts.php'; ?>
            </div>

            <div class="col-sm-3">
                <?php require 'helpers/widgets/contact.php'; ?>
            </div>

            <div class="col-sm-3">
                <?php require 'helpers/widgets/recent-properties.php'; ?>
            </div>

        </div><!-- /.row -->

        <hr>

        <div class="row">
            <div class="col-sm-9">
                <?php require_once 'helpers/navigation-footer.php'; ?>
            </div>

            <div class="col-sm-3">
                <form method="post" action="?" class="form-horizontal form-search">
                    <div class="form-group has-feedback no-margin">
                        <input type="text" class="form-control" placeholder="Search">

                        <span class="form-control-feedback">
                            <i class="fa fa-search"></i>
                        </span><!-- /.form-control-feedback -->
                    </div><!-- /.form-group -->
                </form>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.footer-top -->