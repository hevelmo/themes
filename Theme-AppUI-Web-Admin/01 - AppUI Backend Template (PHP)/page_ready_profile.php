<?php include 'inc/config.php'; $template['header_link'] = 'PAGES'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
    <!-- User Profile Row -->
    <div class="row">
        <div class="col-md-4 col-lg-3">
            <div class="widget">
                <div class="widget-image widget-image-sm">
                    <img src="img/placeholders/photos/photo1@2x.jpg" alt="image">
                    <div class="widget-image-content text-center">
                        <img src="img/placeholders/avatars/avatar13@2x.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-transparent img-thumbnail-avatar-2x push">
                        <h2 class="widget-heading text-light"><strong>Anna Wigren</strong></h2>
                        <h4 class="widget-heading text-light-op"><em>Logo Designer</em></h4>
                    </div>
                </div>
                <div class="widget-content widget-content-border">
                    <div class="row text-center">
                        <div class="col-xs-6">
                            <h3 class="widget-heading"><i class="gi gi-heart text-danger push"></i> <br><small><strong>1.5k</strong> Favorites</small></h3>
                        </div>
                        <div class="col-xs-6">
                            <h3 class="widget-heading"><i class="gi gi-group themed-color-social push"></i> <br><small><strong>58.6k</strong> Followers</small></h3>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-border">
                    <h4>About</h4>
                    <p>Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti.</p>
                    <p>Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum.</p>
                </div>
                <div class="widget-content">
                    <h4>Social</h4>
                    <div class="btn-group">
                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Facebook"><i class="fa fa-facebook fa-fw"></i></a>
                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter fa-fw"></i></a>
                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Google Plus"><i class="fa fa-google-plus fa-fw"></i></a>
                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Pinterest"><i class="fa fa-pinterest fa-fw"></i></a>
                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Dribbble"><i class="fa fa-dribbble fa-fw"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="block full">
                <!-- Block Tabs Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                    </div>
                    <ul class="nav nav-tabs" data-toggle="tabs">
                        <li class="active"><a href="#profile-activity">Activity</a></li>
                        <li><a href="#profile-gallery">Photos</a></li>
                        <li><a href="#profile-followers">Followers</a></li>
                    </ul>
                </div>
                <!-- END Block Tabs Title -->

                <!-- Tabs Content -->
                <div class="tab-content">
                    <!-- Activity -->
                    <div class="tab-pane active" id="profile-activity">
                        <div class="timeline block-content-full">
                            <ul class="timeline-list">
                                <li>
                                    <div class="timeline-time">just now</div>
                                    <div class="timeline-icon themed-background-danger text-light-op"><i class="fa fa-cutlery"></i></div>
                                    <div class="timeline-content">
                                        <p class="push-bit"><strong>Time to eat</strong></p>
                                        <p class="push-bit">Delicious fresh italian pizzas!</p>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-4 block-section">
                                                <a href="img/placeholders/photos/photo11.jpg" data-toggle="lightbox-image">
                                                    <img src="img/placeholders/photos/photo11.jpg" alt="image">
                                                </a>
                                            </div>
                                            <div class="col-sm-6 col-md-4 block-section">
                                                <a href="img/placeholders/photos/photo2.jpg" data-toggle="lightbox-image">
                                                    <img src="img/placeholders/photos/photo2.jpg" alt="image">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-time">10 min ago</div>
                                    <div class="timeline-icon themed-background text-light-op"><i class="fa fa-twitter"></i></div>
                                    <div class="timeline-content">
                                        <p class="push-bit"><strong>+ 4 New Followers</strong></p>
                                        <p class="push-bit">Congrats, you've got 4 new followers today!</p>
                                        <a href="javascript:void(0)"><img src="img/placeholders/avatars/avatar12.jpg" alt="Avatar" class="img-circle push-bit"></a>
                                        <a href="javascript:void(0)"><img src="img/placeholders/avatars/avatar8.jpg" alt="Avatar" class="img-circle push-bit"></a>
                                        <a href="javascript:void(0)"><img src="img/placeholders/avatars/avatar2.jpg" alt="Avatar" class="img-circle push-bit"></a>
                                        <a href="javascript:void(0)"><img src="img/placeholders/avatars/avatar6.jpg" alt="Avatar" class="img-circle push-bit"></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-time">30 min ago</div>
                                    <div class="timeline-icon themed-background-info text-light-op"><i class="fa fa-facebook"></i></div>
                                    <div class="timeline-content">
                                        <p class="push-bit"><strong>+ 500 Facebook Likes</strong></p>
                                        This is great, keep it up!
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-time">1 hour ago</div>
                                    <div class="timeline-icon themed-background-amethyst text-light-op"><i class="fa fa-file-pdf-o"></i></div>
                                    <div class="timeline-content">
                                        <p class="push-bit"><strong>New file uploaded <a href="javascript:void(0)">AppDocs.pdf</a></strong></p>
                                        The new documenation for 1.2 update is live!
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-time">2 days ago</div>
                                    <div class="timeline-icon themed-background-warning text-light-op"><i class="fa fa-coffee"></i></div>
                                    <div class="timeline-content">
                                        <p class="push-bit"><strong>Coffee Time</strong></p>
                                        <p class="push-bit">With some awesome fresh baked croissants!</p>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-4 block-section">
                                                <a href="img/placeholders/photos/photo14.jpg" data-toggle="lightbox-image">
                                                    <img src="img/placeholders/photos/photo14.jpg" alt="image">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-time">5 days ago</div>
                                    <div class="timeline-icon themed-background-creme text-light-op"><i class="gi gi-cogwheel"></i></div>
                                    <div class="timeline-content">
                                        <p class="push-bit"><strong>App Update</strong></p>
                                        Updated to <a href="javascript:void(0)">version 1.2</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-time">1 week ago</div>
                                    <div class="timeline-icon themed-background-success text-light-op"><i class="fa fa-smile-o"></i></div>
                                    <div class="timeline-content">
                                        <p class="push-bit"><strong>Thank you and Welcome!</strong></p>
                                        <p class="push-bit">It's great to have you on board! Feel free to have a look at our <a href="page_ready_faq.php">FAQ</a> if you have any further questions.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END Activity -->

                    <!-- Gallery -->
                    <div class="tab-pane" id="profile-gallery">
                        <h3 class="sub-header"><i class="fa fa-picture-o"></i> <strong>2014</strong></h3>
                        <div class="row gallery" data-toggle="lightbox-gallery">
                            <div class="col-lg-4">
                                <div class="gallery-image-container animation-fadeInQuick2Inv">
                                    <img src="img/placeholders/photos/photo5.jpg" alt="Image">
                                    <a href="img/placeholders/photos/photo5.jpg" class="gallery-image-options" title="Image Info">
                                        <i class="fa fa-search-plus fa-3x text-light"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="gallery-image-container animation-fadeInQuick2Inv">
                                    <img src="img/placeholders/photos/photo6.jpg" alt="Image">
                                    <a href="img/placeholders/photos/photo6.jpg" class="gallery-image-options" title="Image Info">
                                        <i class="fa fa-search-plus fa-3x text-light"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="gallery-image-container animation-fadeInQuick2Inv">
                                    <img src="img/placeholders/photos/photo7.jpg" alt="Image">
                                    <a href="img/placeholders/photos/photo7.jpg" class="gallery-image-options" title="Image Info">
                                        <i class="fa fa-search-plus fa-3x text-light"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery-image-container animation-fadeInQuick2">
                                    <img src="img/placeholders/photos/photo8.jpg" alt="Image">
                                    <a href="img/placeholders/photos/photo8.jpg" class="gallery-image-options" title="Image Info">
                                        <i class="fa fa-search-plus fa-3x text-light"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery-image-container animation-fadeInQuick2">
                                    <img src="img/placeholders/photos/photo9.jpg" alt="Image">
                                    <a href="img/placeholders/photos/photo9.jpg" class="gallery-image-options" title="Image Info">
                                        <i class="fa fa-search-plus fa-3x text-light"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery-image-container animation-fadeInQuick2">
                                    <img src="img/placeholders/photos/photo10.jpg" alt="Image">
                                    <a href="img/placeholders/photos/photo10.jpg" class="gallery-image-options" title="Image Info">
                                        <i class="fa fa-search-plus fa-3x text-light"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery-image-container animation-fadeInQuick2">
                                    <img src="img/placeholders/photos/photo11.jpg" alt="Image">
                                    <a href="img/placeholders/photos/photo11.jpg" class="gallery-image-options" title="Image Info">
                                        <i class="fa fa-search-plus fa-3x text-light"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <h3 class="sub-header"><i class="fa fa-picture-o"></i> <strong>2013</strong></h3>
                        <div class="row gallery" data-toggle="lightbox-gallery">
                            <div class="col-lg-4">
                                <div class="gallery-image-container animation-fadeInQuick2Inv">
                                    <img src="img/placeholders/photos/photo12.jpg" alt="Image">
                                    <a href="img/placeholders/photos/photo12.jpg" class="gallery-image-options" title="Image Info">
                                        <i class="fa fa-search-plus fa-3x text-light"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="gallery-image-container animation-fadeInQuick2Inv">
                                    <img src="img/placeholders/photos/photo13.jpg" alt="Image">
                                    <a href="img/placeholders/photos/photo13.jpg" class="gallery-image-options" title="Image Info">
                                        <i class="fa fa-search-plus fa-3x text-light"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="gallery-image-container animation-fadeInQuick2Inv">
                                    <img src="img/placeholders/photos/photo14.jpg" alt="Image">
                                    <a href="img/placeholders/photos/photo14.jpg" class="gallery-image-options" title="Image Info">
                                        <i class="fa fa-search-plus fa-3x text-light"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery-image-container animation-fadeInQuick2">
                                    <img src="img/placeholders/photos/photo15.jpg" alt="Image">
                                    <a href="img/placeholders/photos/photo15.jpg" class="gallery-image-options" title="Image Info">
                                        <i class="fa fa-search-plus fa-3x text-light"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery-image-container animation-fadeInQuick2">
                                    <img src="img/placeholders/photos/photo16.jpg" alt="Image">
                                    <a href="img/placeholders/photos/photo16.jpg" class="gallery-image-options" title="Image Info">
                                        <i class="fa fa-search-plus fa-3x text-light"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery-image-container animation-fadeInQuick2">
                                    <img src="img/placeholders/photos/photo17.jpg" alt="Image">
                                    <a href="img/placeholders/photos/photo17.jpg" class="gallery-image-options" title="Image Info">
                                        <i class="fa fa-search-plus fa-3x text-light"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="gallery-image-container animation-fadeInQuick2">
                                    <img src="img/placeholders/photos/photo18.jpg" alt="Image">
                                    <a href="img/placeholders/photos/photo18.jpg" class="gallery-image-options" title="Image Info">
                                        <i class="fa fa-search-plus fa-3x text-light"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center push-bit-top-bottom">
                            <a href="javascript:void(0)" class="btn btn-sm btn-primary">Show More</a>
                        </div>
                    </div>
                    <!-- END Gallery -->

                    <!-- Followers -->
                    <div class="tab-pane" id="profile-followers">
                        <div class="block-content-full">
                            <table class="table table-striped table-borderless table-vcenter remove-margin-bottom">
                                <tbody>
                                    <tr class="animation-fadeInQuick2">
                                        <td class="text-center" style="width: 100px;"><img src="img/placeholders/avatars/avatar1.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar"></td>
                                        <td>
                                            <h4><strong>Eric Stone</strong></h4>
                                            <i class="fa fa-fw fa-user text-danger"></i> Web Designer<br>
                                            <i class="fa fa-fw fa-map-marker text-info"></i> New York, USA
                                        </td>
                                        <td class="text-right" style="width: 20%;">
                                            <a href="javascript:void(0)" class="btn btn-sm btn-info" data-toggle="tooltip" title="Send Message"><i class="fa fa-envelope"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Follow"><i class="fa fa-share"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="animation-fadeInQuick2">
                                        <td class="text-center" style="width: 100px;"><img src="img/placeholders/avatars/avatar2.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar"></td>
                                        <td>
                                            <h4><strong>Roy Wong</strong></h4>
                                            <i class="fa fa-fw fa-user text-danger"></i> Logo Designer<br>
                                            <i class="fa fa-fw fa-map-marker text-info"></i> Sydney, Australia
                                        </td>
                                        <td class="text-right">
                                            <a href="javascript:void(0)" class="btn btn-sm btn-info" data-toggle="tooltip" title="Send Message"><i class="fa fa-envelope"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Follow"><i class="fa fa-share"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="animation-fadeInQuick2">
                                        <td class="text-center" style="width: 100px;"><img src="img/placeholders/avatars/avatar3.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar"></td>
                                        <td>
                                            <h4><strong>Willie Walsh</strong></h4>
                                            <i class="fa fa-fw fa-user text-danger"></i> Web Developer<br>
                                            <i class="fa fa-fw fa-map-marker text-info"></i> Los Angeles, USA
                                        </td>
                                        <td class="text-right">
                                            <a href="javascript:void(0)" class="btn btn-sm btn-info" data-toggle="tooltip" title="Send Message"><i class="fa fa-envelope"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Follow"><i class="fa fa-share"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="animation-fadeInQuick2">
                                        <td class="text-center" style="width: 100px;"><img src="img/placeholders/avatars/avatar4.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar"></td>
                                        <td>
                                            <h4><strong>Alan George</strong></h4>
                                            <i class="fa fa-fw fa-user text-danger"></i> Photographer<br>
                                            <i class="fa fa-fw fa-map-marker text-info"></i> Tokyo, Japan
                                        </td>
                                        <td class="text-right">
                                            <a href="javascript:void(0)" class="btn btn-sm btn-info" data-toggle="tooltip" title="Send Message"><i class="fa fa-envelope"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Follow"><i class="fa fa-share"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="animation-fadeInQuick2">
                                        <td class="text-center" style="width: 100px;"><img src="img/placeholders/avatars/avatar5.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar"></td>
                                        <td>
                                            <h4><strong>Zachary Rios</strong></h4>
                                            <i class="fa fa-fw fa-user text-danger"></i> Copywriter<br>
                                            <i class="fa fa-fw fa-map-marker text-info"></i> New Delhi, India
                                        </td>
                                        <td class="text-right">
                                            <a href="javascript:void(0)" class="btn btn-sm btn-info" data-toggle="tooltip" title="Send Message"><i class="fa fa-envelope"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Follow"><i class="fa fa-share"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="animation-fadeInQuick2">
                                        <td class="text-center" style="width: 100px;"><img src="img/placeholders/avatars/avatar6.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar"></td>
                                        <td>
                                            <h4><strong>Janet Bell</strong></h4>
                                            <i class="fa fa-fw fa-user text-danger"></i> Graphic Designer<br>
                                            <i class="fa fa-fw fa-map-marker text-info"></i> New York, USA
                                        </td>
                                        <td class="text-right">
                                            <a href="javascript:void(0)" class="btn btn-sm btn-info" data-toggle="tooltip" title="Send Message"><i class="fa fa-envelope"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Follow"><i class="fa fa-share"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="animation-fadeInQuick2">
                                        <td class="text-center" style="width: 100px;"><img src="img/placeholders/avatars/avatar7.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar"></td>
                                        <td>
                                            <h4><strong>David Dixon</strong></h4>
                                            <i class="fa fa-fw fa-user text-danger"></i> Web Developer<br>
                                            <i class="fa fa-fw fa-map-marker text-info"></i> Rio de Janeiro, Brazil
                                        </td>
                                        <td class="text-right">
                                            <a href="javascript:void(0)" class="btn btn-sm btn-info" data-toggle="tooltip" title="Send Message"><i class="fa fa-envelope"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Follow"><i class="fa fa-share"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="animation-fadeInQuick2">
                                        <td class="text-center" style="width: 100px;"><img src="img/placeholders/avatars/avatar8.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar"></td>
                                        <td>
                                            <h4><strong>Jose Pena</strong></h4>
                                            <i class="fa fa-fw fa-user text-danger"></i>  Manager<br>
                                            <i class="fa fa-fw fa-map-marker text-info"></i> London, UK
                                        </td>
                                        <td class="text-right">
                                            <a href="javascript:void(0)" class="btn btn-sm btn-info" data-toggle="tooltip" title="Send Message"><i class="fa fa-envelope"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Follow"><i class="fa fa-share"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="animation-fadeInQuick2">
                                        <td class="text-center" style="width: 100px;"><img src="img/placeholders/avatars/avatar10.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar"></td>
                                        <td>
                                            <h4><strong>Sara Payne</strong></h4>
                                            <i class="fa fa-fw fa-user text-danger"></i> Photographer<br>
                                            <i class="fa fa-fw fa-map-marker text-info"></i> Paris, France
                                        </td>
                                        <td class="text-right">
                                            <a href="javascript:void(0)" class="btn btn-sm btn-info" data-toggle="tooltip" title="Send Message"><i class="fa fa-envelope"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Follow"><i class="fa fa-share"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-center push-bit-top-bottom">
                                <a href="javascript:void(0)" class="btn btn-sm btn-primary">Show More</a>
                            </div>
                        </div>
                    </div>
                    <!-- END Followers -->
                </div>
                <!-- END Tabs Content -->
            </div>
        </div>
    </div>
    <!-- END User Profile Row -->
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>
<?php include 'inc/template_end.php'; ?>