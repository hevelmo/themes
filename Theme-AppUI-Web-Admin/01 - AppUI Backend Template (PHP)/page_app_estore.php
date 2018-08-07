<?php include 'inc/config.php'; $template['header_link'] = 'eSTORE'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<!--
    Available classes when #page-content-sidebar is used:

    'inner-sidebar-left'      for a left inner sidebar
    'inner-sidebar-right'     for a right inner sidebar
-->
<div id="page-content" class="inner-sidebar-right">
    <!-- Inner Sidebar -->
    <div id="page-content-sidebar">
        <!-- Collapsible Shopping Cart -->
        <a href="javascript:void(0)" class="btn btn-block btn-default visible-xs" data-toggle="collapse" data-target="#shopping-cart"><i class="fa fa-shopping-cart"></i> View Cart (4)</a>
        <div id="shopping-cart" class="collapse navbar-collapse remove-padding">
            <h4 class="inner-sidebar-header">
                <a href="javascript:void(0)" class="btn btn-effect-ripple btn-xs btn-warning pull-right"><i class="fa fa-trash"></i></a>
                Shopping Cart (4)
            </h4>
            <table class="table table-striped table-borderless table-vcenter">
                <tbody>
                    <tr>
                        <td class="text-center">
                            <a href="javascript:void(0)" class="btn btn-effect-ripple btn-xs btn-danger pull-right"><i class="fa fa-times"></i></a>
                        </td>
                        <td style="width: 80px;">
                            <a href="img/placeholders/photos/photo12.jpg" data-toggle="lightbox-image" title="Wine Testing (2 People)">
                                <img src="img/placeholders/photos/photo12.jpg" alt="Image" class="img-responsive center-block" style="max-width: 50px;">
                            </a>
                        </td>
                        <td style="width: 60px;" class="text-center">
                            <input type="text" class="form-control text-center" value="1">
                        </td>
                        <td class="text-right">
                            <strong>$59</strong>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <a href="javascript:void(0)" class="btn btn-effect-ripple btn-xs btn-danger pull-right"><i class="fa fa-times"></i></a>
                        </td>
                        <td>
                            <a href="img/placeholders/photos/photo16.jpg" data-toggle="lightbox-image" title="Personal Flight (2 People)">
                                <img src="img/placeholders/photos/photo16.jpg" alt="Image" class="img-responsive center-block" style="max-width: 50px;">
                            </a>
                        </td>
                        <td class="text-center">
                            <input type="text" class="form-control text-center" value="1">
                        </td>
                        <td class="text-right">
                            <strong>$399</strong>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <a href="javascript:void(0)" class="btn btn-effect-ripple btn-xs btn-danger pull-right"><i class="fa fa-times"></i></a>
                        </td>
                        <td>
                            <a href="img/placeholders/photos/photo19.jpg" data-toggle="lightbox-image" title="True Nature Experience (4 People)">
                                <img src="img/placeholders/photos/photo19.jpg" alt="Image" class="img-responsive center-block" style="max-width: 50px;">
                            </a>
                        </td>
                        <td class="text-center">
                            <input type="text" class="form-control text-center" value="1">
                        </td>
                        <td class="text-right">
                            <strong>$199</strong>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <a href="javascript:void(0)" class="btn btn-effect-ripple btn-xs btn-danger pull-right"><i class="fa fa-times"></i></a>
                        </td>
                        <td>
                            <a href="img/placeholders/photos/photo11.jpg" data-toggle="lightbox-image" title="Italian Pizza Night (2 People)">
                                <img src="img/placeholders/photos/photo11.jpg" alt="Image" class="img-responsive center-block" style="max-width: 50px;">
                            </a>
                        </td>
                        <td class="text-center">
                            <input type="text" class="form-control text-center" value="1">
                        </td>
                        <td class="text-right">
                            <strong>$49</strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">Subtotal</td>
                        <td class="text-right text-warning">
                            <strong>$706</strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">Discount</td>
                        <td class="text-right text-info">
                            <strong>- $17</strong>
                        </td>
                    </tr>
                    <tr class="success">
                        <td colspan="3">Total</td>
                        <td class="text-right">
                            <strong>$689</strong>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a href="javascript:void(0)" class="btn btn-effect-ripple btn-block btn-success push-bit-top-bottom"><i class="fa fa-check"></i> Checkout</a>
        </div>
        <!-- END Collapsible Shopping Cart -->
    </div>
    <!-- END Inner Sidebar -->

    <!-- eStore Header -->
    <div class="content-header">
        <div class="header-section">
            <form action="page_app_estore.php" method="post" class="form-horizontal" onsubmit="return false;">
                <div class="form-group">
                    <div class="col-sm-6 push-bit">
                        <input type="text" id="estore-search-term" name="estore-search-term" class="form-control" placeholder="Search Packages..">
                    </div>
                    <div class="col-sm-6">
                        <label class="csscheckbox csscheckbox-primary">
                            <input type="checkbox" id="estore-new" name="estore-new" checked><span></span>
                        </label>
                        <label for="estore-new" class="push-right">New Arrivals</label>
                        <label class="csscheckbox csscheckbox-primary">
                            <input type="checkbox" id="estore-offers" name="estore-offers" checked><span></span>
                        </label>
                        <label for="estore-offers">Offers</label>
                    </div>
                </div>
                <div class="form-group remove-margin-bottom">
                    <div class="col-sm-6 push-bit">
                        <select id="estore-categories" name="estore-categories" class="select-chosen" data-placeholder="Choose Packages.." style="width: 250px;" multiple>
                            <option value="travel" selected>Travel</option>
                            <option value="experiences" selected>Experiences</option>
                            <option value="gifts">Gifts</option>
                            <option value="tech">Technology</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-effect-ripple btn-effect-ripple btn-primary"><i class="fa fa-search"></i> Find something great for me</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END eStore Header -->

    <!-- eStore Content -->
    <div class="row">
        <div class="col-lg-6">
            <a href="#modal-package" class="widget animation-fadeInQuick" data-toggle="modal">
                <div class="widget-image widget-image-xs">
                    <img src="img/placeholders/photos/photo1.jpg" alt="image">
                    <div class="widget-image-content">
                        <div class="pull-right text-light-op"><strong>OFFER!</strong></div>
                        <h2 class="widget-heading text-light"><strong>Mountain Experience</strong></h2>
                        <h3 class="widget-heading text-light-op">1-5 People</h3>
                    </div>
                </div>
                <div class="widget-content">
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="text-muted"><em>ITEM #1556452</em></div>
                            <div class="text-dark push-bit">10 Packages Available</div>
                            <div class="text-warning">
                                <i class="fa fa-2x fa-star"></i>
                                <i class="fa fa-2x fa-star"></i>
                                <i class="fa fa-2x fa-star"></i>
                                <i class="fa fa-2x fa-star"></i>
                                <i class="fa fa-2x fa-star-half-o"></i>
                            </div>
                        </div>
                        <div class="col-xs-4 text-right">
                            <h2><span class="text-muted">$</span> <strong>299</strong></h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6">
            <a href="#modal-package" class="widget animation-fadeInQuick" data-toggle="modal">
                <div class="widget-image widget-image-xs">
                    <img src="img/placeholders/photos/photo19.jpg" alt="image">
                    <div class="widget-image-content">
                        <h2 class="widget-heading text-light"><strong>Nature Package</strong></h2>
                        <h3 class="widget-heading text-light-op">1-3 People</h3>
                    </div>
                </div>
                <div class="widget-content">
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="text-muted"><em>ITEM #8541236</em></div>
                            <div class="text-danger push-bit">Only 3 Packages Available!</div>
                            <div class="text-warning">
                                <i class="fa fa-2x fa-star"></i>
                                <i class="fa fa-2x fa-star"></i>
                                <i class="fa fa-2x fa-star"></i>
                                <i class="fa fa-2x fa-star"></i>
                                <i class="fa fa-2x fa-star"></i>
                            </div>
                        </div>
                        <div class="col-xs-4 text-right">
                            <h2><span class="text-muted">$</span> <strong>199</strong></h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6">
            <a href="#modal-package" class="widget animation-fadeInQuick" data-toggle="modal">
                <div class="widget-image widget-image-xs">
                    <img src="img/placeholders/photos/photo22.jpg" alt="image">
                    <div class="widget-image-content">
                        <h2 class="widget-heading text-light"><strong>City Tour</strong></h2>
                        <h3 class="widget-heading text-light-op">1-5 People</h3>
                    </div>
                </div>
                <div class="widget-content">
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="text-muted"><em>ITEM #9585412</em></div>
                            <div class="text-danger push-bit">Only 1 Package Available!</div>
                            <div class="text-warning">
                                <i class="fa fa-2x fa-star"></i>
                                <i class="fa fa-2x fa-star"></i>
                                <i class="fa fa-2x fa-star"></i>
                                <i class="fa fa-2x fa-star-half-o"></i>
                                <i class="fa fa-2x fa-star-o"></i>
                            </div>
                        </div>
                        <div class="col-xs-4 text-right">
                            <h2><span class="text-muted">$</span> <strong>69</strong></h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6">
            <a href="#modal-package" class="widget animation-fadeInQuick" data-toggle="modal">
                <div class="widget-image widget-image-xs">
                    <img src="img/placeholders/photos/photo11.jpg" alt="image">
                    <div class="widget-image-content">
                        <div class="pull-right text-light-op"><strong>NEW!</strong></div>
                        <h2 class="widget-heading text-light"><strong>Italian Pizza Night</strong></h2>
                        <h3 class="widget-heading text-light-op">2 People</h3>
                    </div>
                </div>
                <div class="widget-content">
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="text-muted"><em>ITEM #1238741</em></div>
                            <div class="text-dark push-bit">30 Packages Available</div>
                            <div class="text-warning">
                                <i class="fa fa-2x fa-star"></i>
                                <i class="fa fa-2x fa-star"></i>
                                <i class="fa fa-2x fa-star"></i>
                                <i class="fa fa-2x fa-star"></i>
                                <i class="fa fa-2x fa-star"></i>
                            </div>
                        </div>
                        <div class="col-xs-4 text-right">
                            <h2><span class="text-muted">$</span> <strong>49</strong></h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6">
            <a href="#modal-package" class="widget animation-fadeInQuick" data-toggle="modal">
                <div class="widget-image widget-image-bottom widget-image-xs">
                    <img src="img/placeholders/photos/photo14.jpg" alt="image">
                    <div class="widget-image-content">
                        <div class="pull-right text-light-op"><strong>OFFER!</strong></div>
                        <h2 class="widget-heading text-light"><strong>Cooking Class</strong></h2>
                        <h3 class="widget-heading text-light-op">1-2 People</h3>
                    </div>
                </div>
                <div class="widget-content">
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="text-muted"><em>ITEM #6517841</em></div>
                            <div class="text-dark push-bit">100+ Packages Available</div>
                            <div class="text-warning">
                                <i class="fa fa-2x fa-star"></i>
                                <i class="fa fa-2x fa-star"></i>
                                <i class="fa fa-2x fa-star"></i>
                                <i class="fa fa-2x fa-star"></i>
                                <i class="fa fa-2x fa-star-o"></i>
                            </div>
                        </div>
                        <div class="col-xs-4 text-right">
                            <h2><span class="text-muted">$</span> <strong>29</strong></h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6">
            <a href="#modal-package" class="widget animation-fadeInQuick" data-toggle="modal">
                <div class="widget-image widget-image-xs">
                    <img src="img/placeholders/photos/photo12.jpg" alt="image">
                    <div class="widget-image-content">
                        <h2 class="widget-heading text-light"><strong>Wine Testing</strong></h2>
                        <h3 class="widget-heading text-light-op">2 People</h3>
                    </div>
                </div>
                <div class="widget-content">
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="text-muted"><em>ITEM #6985213</em></div>
                            <div class="text-dark push-bit">50 Packages Available</div>
                            <div class="text-warning">
                                <i class="fa fa-2x fa-star"></i>
                                <i class="fa fa-2x fa-star"></i>
                                <i class="fa fa-2x fa-star"></i>
                                <i class="fa fa-2x fa-star"></i>
                                <i class="fa fa-2x fa-star-half-o"></i>
                            </div>
                        </div>
                        <div class="col-xs-4 text-right">
                            <h2><span class="text-muted">$</span> <strong>59</strong></h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- END eStore Content -->
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>

<!-- Example Package Modal -->
<div id="modal-package" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <ul class="nav nav-tabs" data-toggle="tabs">
                    <li class="active"><a href="#modal-tabs-package"><i class="gi gi-package"></i> Package</a></li>
                    <li><a href="#modal-tabs-reviews"><i class="fa fa-pencil"></i> Reviews</a></li>
                </ul>
            </div>
            <div class="modal-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="modal-tabs-package">
                        <h1 class="h2"><strong>Italian Pizza Night</strong> <small>(2 People)</small></h1>
                        <div class="row push">
                            <div class="col-xs-6">
                                <img src="img/placeholders/photos/photo11.jpg" alt="Image" class="img-responsive">
                            </div>
                            <div class="col-xs-6">
                                <img src="img/placeholders/photos/photo2.jpg" alt="Image" class="img-responsive">
                            </div>
                        </div>
                        Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget! Nulla quis ligula ipsum
                    </div>
                    <div class="tab-pane" id="modal-tabs-reviews">
                        <div class="text-center text-warning push">
                            <i class="fa fa-2x fa-star"></i>
                            <i class="fa fa-2x fa-star"></i>
                            <i class="fa fa-2x fa-star"></i>
                            <i class="fa fa-2x fa-star"></i>
                            <i class="fa fa-2x fa-star"></i>
                        </div>
                        <div class="text-center">
                            <strong>5.0</strong> /5.0 (3 Ratings)
                        </div>
                        <hr>
                        <ul class="media-list">
                            <li class="media">
                                <a href="javascript:void(0)" class="pull-left">
                                    <img src="img/placeholders/avatars/avatar12.jpg" alt="Avatar" class="img-circle">
                                </a>
                                <div class="media-body">
                                    <span class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                    <a href="javascript:void(0)"><strong>Nicoline Andersen</strong></a>
                                    <p class="push-bit"><span class="label label-success">Positive</span> Authentic Italian Experience, Friendly People, Delicious Pizzas</p>
                                    <p><span class="label label-danger">Negative</span> None!</p>
                                </div>
                            </li>
                            <li class="media">
                                <a href="javascript:void(0)" class="pull-left">
                                    <img src="img/placeholders/avatars/avatar13.jpg" alt="Avatar" class="img-circle">
                                </a>
                                <div class="media-body">
                                    <span class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                    <a href="javascript:void(0)"><strong>Josefina Orozco</strong></a>
                                    <p class="push-bit"><span class="label label-success">Positive</span> Friendly People, Delicious Pizzas</p>
                                    <p><span class="label label-danger">Negative</span> None!</p>
                                </div>
                            </li>
                            <li class="media">
                                <a href="javascript:void(0)" class="pull-left">
                                    <img src="img/placeholders/avatars/avatar7.jpg" alt="Avatar" class="img-circle">
                                </a>
                                <div class="media-body">
                                    <span class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                    <a href="javascript:void(0)"><strong>Donald Pierce</strong></a>
                                    <p class="push-bit"><span class="label label-success">Positive</span> Delicious Pizzas, Great Price</p>
                                    <p><span class="label label-danger">Negative</span> None!</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <h4 class="pull-left"><span class="text-muted">$</span> <strong class="text-primary">49</strong></h4>
                <button type="button" class="btn btn-effect-ripple btn-success"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- END Example Package Modal -->

<?php include 'inc/template_scripts.php'; ?>
<?php include 'inc/template_end.php'; ?>