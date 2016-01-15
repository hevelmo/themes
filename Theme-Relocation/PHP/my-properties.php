<?php require_once 'helpers/functions.php'; ?>
<?php require_once 'content.php'; ?>

<?php get_header($title = 'My Properties'); ?>

    <div id="main-wrapper">
        <div id="main">
            <div id="main-inner">
                <div class="container">
                    <div class="block-content block-content-small-padding">
                        <div class="block-content-inner">
                            <h2 class="center">My Properties</h2>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Address</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2342</td>
                                        <td>
                                            <img src="<?php echo get_image('small'); ?>" alt="" width="100">
                                            6th Avenue and West 15th Street New York, NY
                                        </td>
                                        <td>Sale</td>
                                        <td>$4,600,000</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="#" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-eur"></i> Buy</a>
                                            <a href="#" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-ban"></i> Remove</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>4234</td>
                                        <td>
                                            <img src="<?php echo get_image('small'); ?>" alt="" width="100">
                                            23 W 116th St #4F
                                        </td>
                                        <td>Sale</td>
                                        <td>$3,995,000+</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="#" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-eur"></i> Buy</a>
                                            <a href="#" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-ban"></i> Remove</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>5342</td>
                                        <td>
                                            <img src="<?php echo get_image('small'); ?>" alt="" width="100">
                                            250 W 15th St #3D
                                        </td>
                                        <td>Sale</td>
                                        <td>$769,000</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="#" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-eur"></i> Buy</a>
                                            <a href="#" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-ban"></i> Remove</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>2341</td>
                                        <td>
                                            <img src="<?php echo get_image('small'); ?>" alt="" width="100">
                                            160 E 38th St #15E New York, NY
                                        </td>
                                        <td>Sale</td>
                                        <td>$1,595,000</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="#" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-eur"></i> Buy</a>
                                            <a href="#" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-ban"></i> Remove</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>8678</td>
                                        <td>
                                            <img src="<?php echo get_image('small'); ?>" alt="" width="100">
                                            East 54th Street and Sutton Pl S
                                        </td>
                                        <td>Sale</td>
                                        <td>$995,000</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="#" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-eur"></i> Buy</a>
                                            <a href="#" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-ban"></i> Remove</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>6576</td>
                                        <td>
                                            <img src="<?php echo get_image('small'); ?>" alt="" width="100">
                                            829 Park Ave #5A New York, NY
                                        </td>
                                        <td>Sale</td>
                                        <td>$2,750,000</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="#" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-eur"></i> Buy</a>
                                            <a href="#" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-ban"></i> Remove</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>9789</td>
                                        <td>
                                            <img src="<?php echo get_image('small'); ?>" alt="" width="100">
                                            Spring Street and West Broadway New York, NY
                                        </td>
                                        <td>Sale</td>
                                        <td>$1,900,000</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="#" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-eur"></i> Buy</a>
                                            <a href="#" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-ban"></i> Remove</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

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
                        </div><!-- /.block-content-inner -->
                    </div><!-- /.block-content -->
                </div><!-- /.container -->
            </div><!-- /#main-inner -->
        </div><!-- /#main -->
    </div><!-- /#main-wrapper -->

<?php get_footer($footer = 'blank'); ?>