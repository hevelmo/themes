<?php require_once 'helpers/functions.php'; ?>

<?php get_header($title = 'Submit Property'); ?>

    <div id="main-wrapper">
        <div id="main">
            <div id="main-inner">
                <div class="container">
                    <div class="block-content block-content-small-padding">
                        <div class="block-content-inner">
                            <h2 class="center">Submit Property</h2>

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
                                        <h3>Location</h3>

                                        <div class="box">
                                            <div class="form-group">
                                                <label>Country</label>

                                                <div class="select-wrapper">
                                                    <select id="select-country" class="form-control">
                                                        <option value="">Select Country</option>
                                                        <option value="czech-republic">Czech Republic</option>
                                                        <option value="germany">Germany</option>
                                                        <option value="france">France</option>
                                                        <option value="poland">Poland</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Location</label>

                                                <div class="select-wrapper">
                                                    <select id="select-location" class="form-control">
                                                        <option value="">Select Location</option>
                                                        <option value="location-czech-republic-1" class="czech-republic">Location 1</option>
                                                        <option value="location-czech-republic-2" class="czech-republic">Location 2</option>
                                                        <option value="location-czech-republic-3" class="czech-republic">Location 3</option>
                                                        <option value="location-czech-republic-4" class="czech-republic">Location 4</option>
                                                        <option value="location-germany-1" class="germany">Location 1</option>
                                                        <option value="location-germany-2" class="germany">Location 2</option>
                                                        <option value="location-germany-3" class="germany">Location 3</option>
                                                        <option value="location-germany-4" class="germany">Location 4</option>
                                                        <option value="location-france-1" class="france">Location 1</option>
                                                        <option value="location-france-2" class="france">Location 2</option>
                                                        <option value="location-france-3" class="france">Location 3</option>
                                                        <option value="location-france-4" class="france">Location 4</option>
                                                        <option value="location-poland-1" class="poland">Location 1</option>
                                                        <option value="location-poland-2" class="poland">Location 2</option>
                                                        <option value="location-poland-3" class="poland">Location 3</option>
                                                        <option value="location-poland-4" class="poland">Location 4</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Sublocation</label>

                                                <div class="select-wrapper">
                                                    <select id="select-sublocation" class="form-control">
                                                        <option value="">Select Sublocation</option>
                                                        <option value="location-czech-republic-1" class="location-czech-republic-1">Sublocation Czech 1</option>
                                                        <option value="location-czech-republic-2" class="location-czech-republic-2">Sublocation Czech 2</option>
                                                        <option value="location-czech-republic-3" class="location-czech-republic-3">Sublocation Czech 3</option>
                                                        <option value="location-czech-republic-4" class="location-czech-republic-4">Sublocation Czech 4</option>
                                                        <option value="location-germany-1" class="location-germany-1">Sublocation Germany 1</option>
                                                        <option value="location-germany-2" class="location-germany-2">Sublocation Germany 2</option>
                                                        <option value="location-germany-3" class="location-germany-3">Sublocation Germany 3</option>
                                                        <option value="location-germany-4" class="location-germany-4">Sublocation Germany 4</option>
                                                        <option value="location-france-1" class="location-france-1">Sublocation France 1</option>
                                                        <option value="location-france-2" class="location-france-2">Sublocation France 2</option>
                                                        <option value="location-france-3" class="location-france-3">Sublocation France 3</option>
                                                        <option value="location-france-4" class="location-france-4">Sublocation France 4</option>
                                                        <option value="location-poland-1" class="location-poland-1">Sublocation Poland 1</option>
                                                        <option value="location-poland-2" class="location-poland-2">Sublocation Poland 2</option>
                                                        <option value="location-poland-3" class="location-poland-3">Sublocation Poland 3</option>
                                                        <option value="location-poland-4" class="location-poland-4">Sublocation Poland 4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <h3>Photos</h3>

                                        <div class="box">
                                            <div class="form-group">
                                                <input type="file">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <input type="file">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <input type="file">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <input type="file">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <input type="file">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <input type="file">
                                            </div><!-- /.form-group -->
                                        </div><!-- /.box -->
                                    </div><!-- /.col-sm-3 -->
                                </div><!-- /.row -->

                                <h3>Amenities</h3>

                                <div class="box clearfix">
                                    <ul class="submit-property-list list-unstyled">
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Air conditioning</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Balcony</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Bedding</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Cable TV</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Cleaning after exit</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Cofee pot</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Computer</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Cot</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Dishwasher</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">DVD</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Fan</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Fridge</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Grill</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Hairdryer</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Heating</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Hi-fi</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Internet</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Iron</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Juicer</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Lift</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Microwave</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Oven</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Parking</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Parquet</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Radio</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Roof terrace</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Smoking allowed</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Terrace</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Toaster</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Towelwes</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Use of pool</label></li>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox">Video</label></li>
                                    </ul>
                                </div><!-- /.box -->

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