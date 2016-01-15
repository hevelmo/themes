<!-- MAP -->
<div class="block-content no-padding">
    <div class="block-content-inner">
        <div class="map-wrapper">
            <div id="map" data-style="<?php echo !empty($_GET['style']) ? $_GET['style'] : 1; ?>"></div><!-- /#map -->

            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8 col-md-3 col-md-offset-9 map-navigation-positioning">
                        <div class="map-navigation-wrapper">
                            <div class="map-navigation">
                                <form method="post" action="?" class="clearfix">
                                    <div class="form-group col-sm-12">
                                        <label>Country</label>

                                        <div class="select-wrapper">
                                            <select id="select-country" class="form-control">
                                                <option value="">Select Country</option>
                                                <option value="czech-republic">Czech Republic</option>
                                                <option value="germany">Germany</option>
                                                <option value="france">France</option>
                                                <option value="poland">Poland</option>
                                            </select>
                                        </div><!-- /.select-wrapper -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-12">
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
                                        </div><!-- /.select-wrapper -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-12">
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
                                        </div><!-- /.select-wrapper -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-12">
                                        <label>Property Type</label>

                                        <div class="select-wrapper">
                                            <select class="form-control">
                                                <option value="apartment">Apartment</option>
                                                <option value="building-arae">Building Area</option>
                                                <option value="condo">Condo</option>
                                                <option value="house">House</option>
                                                <option value="villa">Villa</option>
                                            </select>
                                        </div><!-- /.select-wrapper -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-6">
                                        <label>Price From</label>
                                        <input type="text"  class="form-control" placeholder="e.g. 1000">
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-6">
                                        <label>Price To</label>
                                        <input type="text"  class="form-control" placeholder="e.g. 5000">
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-12">
                                        <input type="submit" class="btn btn-primary btn-inversed btn-block" value="Filter Properties">
                                    </div><!-- /.form-group -->
                                </form>
                            </div><!-- /.map-navigation -->
                        </div><!-- /.map-navigation-wrapper -->
                    </div><!-- /.col-sm-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->

        </div><!-- /.map-wrapper -->
    </div><!-- /.block-content-inner -->
</div><!-- /.block-content -->