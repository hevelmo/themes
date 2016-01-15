<?php require_once 'helpers/functions.php'; ?>

<?php get_header($title = 'Create Agency'); ?>

    <div id="main-wrapper">
        <div id="main">
            <div id="main-inner">
                <div class="container">
                    <div class="block-content block-content-small-padding">
                        <div class="block-content-inner">
                            <h2 class="center">Create Agency</h2>

                            <form method="post">
                                <div class="box">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control">
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="6"></textarea>
                                    </div><!-- /.form-group -->
                                </div><!-- /.box -->

                                <div class="row">
                                    <div class="col-sm-4">
                                        <h3>Contact</h3>

                                        <div class="box">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input type="text" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Website</label>
                                                <input type="text" class="form-control">
                                            </div><!-- /.form-group -->
                                        </div><!-- /.box -->
                                    </div>

                                    <div class="col-sm-4">
                                        <h3>Payment</h3>

                                        <div class="box">
                                            <div class="form-group">
                                                <label>Package</label>

                                                <div class="select-wrapper">
                                                    <select class="form-control">
                                                        <option value="">Bronze + $10</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Payment Method</label>

                                                <div class="select-wrapper">
                                                    <select class="form-control">
                                                        <option value="">Paypal</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Duration</label>

                                                <div class="select-wrapper">
                                                    <select class="form-control">
                                                        <option value="">1 Year (Save 10%)</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <h3>Additional Perks</h3>

                                        <div class="box">
                                            <div class="form-group checkbox">
                                                <label>
                                                    <input type="checkbox"> Featured agents (+ $5)
                                                </label>
                                            </div><!-- /.form-group -->

                                            <div class="form-group checkbox">
                                                <label>
                                                    <input type="checkbox"> Statistics (+ $10)
                                                </label>
                                            </div><!-- /.form-group -->

                                            <div class="form-group checkbox">
                                                <label>
                                                    <input type="checkbox"> Weekly reports (+ $7)
                                                </label>
                                            </div><!-- /.form-group -->

                                            <div class="form-group checkbox">
                                                <label>
                                                    <input type="checkbox"> Homepage featured (+ $50)
                                                </label>
                                            </div><!-- /.form-group -->

                                            <div class="form-group checkbox">
                                                <label>
                                                    <input type="checkbox"> Include in newsletter (+ $50)
                                                </label>
                                            </div><!-- /.form-group -->

                                            <div class="form-group checkbox">
                                                <label>
                                                    <input type="checkbox"> Own Subdomain (+ $200)
                                                </label>
                                            </div><!-- /.form-group -->

                                            <div class="form-group checkbox">
                                                <label>
                                                    <input type="checkbox"> SSL protocol (+ $40)
                                                </label>
                                            </div><!-- /.form-group -->

                                            <div class="form-group checkbox">
                                                <label>
                                                    <input type="checkbox">  (+ $5)
                                                </label>
                                            </div><!-- /.form-group -->
                                        </div><!-- /.box -->
                                    </div>
                                </div><!-- /.row -->


                                <div class="box">
                                    <div class="form-group checkbox">
                                        <label><input type="checkbox"> Send me newsletter</label>
                                    </div><!-- /.form-group -->

                                    <div class="form-group checkbox">
                                        <label><input type="checkbox"> I agree with <a href="#">terms and conditions</a></label>
                                    </div><!-- /.form-group -->
                                </div><!-- /.form-group -->

                                <div class="form-group center">
                                    <input type="submit" value="Submit Property" class="btn btn-inversed btn-primary">
                                </div><!-- /.form-group -->
                            </form>
                        </div><!-- /.block-content-inner -->
                    </div><!-- /.block-content -->
                </div><!-- /.container -->
            </div><!-- /#main-inner -->
        </div><!-- /#main -->
    </div><!-- /#main-wrapper -->

<?php get_footer($footer = 'blank'); ?>