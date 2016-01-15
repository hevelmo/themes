<?php include 'inc/config.php'; $template['header_link'] = 'PAGES'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
    <!-- Timeline Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Timeline</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Extra Pages</li>
                        <li><a href="">Timeline</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Timeline Header -->

    <!-- Timeline Block -->
    <div class="block">
        <!-- Timeline Title -->
        <div class="block-title">
            <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
            </div>
            <h2>Latest Updates</h2>
        </div>
        <!-- END Timeline Title -->

        <!-- Timeline Content -->
        <div class="timeline block-content-full">
            <ul class="timeline-list">
                <li>
                    <div class="timeline-time">10 min ago</div>
                    <div class="timeline-icon themed-background text-light-op"><i class="fa fa-twitter"></i></div>
                    <div class="timeline-content">
                        <p class="push-bit"><strong>+ 4 New Followers</strong></p>
                        <p class="push-bit">Congrats, you've got 4 new followers today!</p>
                        <a href="javascript:void(0)"><img src="img/placeholders/avatars/avatar13.jpg" alt="Avatar" class="img-circle push-bit"></a>
                        <a href="javascript:void(0)"><img src="img/placeholders/avatars/avatar11.jpg" alt="Avatar" class="img-circle push-bit"></a>
                        <a href="javascript:void(0)"><img src="img/placeholders/avatars/avatar12.jpg" alt="Avatar" class="img-circle push-bit"></a>
                        <a href="javascript:void(0)"><img src="img/placeholders/avatars/avatar8.jpg" alt="Avatar" class="img-circle push-bit"></a>
                    </div>
                </li>
                <li>
                    <div class="timeline-time">45 min ago</div>
                    <div class="timeline-icon themed-background-amethyst text-light-op"><i class="fa fa-file-pdf-o"></i></div>
                    <div class="timeline-content">
                        <p class="push-bit"><strong><a href="javascript:void(0)">John Doe</a> uploaded <a href="javascript:void(0)">AppDocs.pdf</a></strong></p>
                        Please have a look at the new Docs and let me know what you think!
                    </div>
                </li>
                <li>
                    <div class="timeline-time">3 hrs ago</div>
                    <div class="timeline-icon themed-background-info text-light-op"><i class="fa fa-facebook"></i></div>
                    <div class="timeline-content">
                        <p class="push-bit"><strong>+ 320 Facebook Likes</strong></p>
                        This is great, keep it up!
                    </div>
                </li>
                <li>
                    <div class="timeline-time">5 hrs ago</div>
                    <div class="timeline-icon themed-background-danger text-light-op"><i class="fa fa-cutlery"></i></div>
                    <div class="timeline-content">
                        <p class="push-bit"><strong>Time to eat</strong></p>
                        <p class="push-bit">The food is just delicious!</p>
                        <div class="row">
                            <div class="col-sm-6 col-md-4 block-section">
                                <a href="img/placeholders/photos/photo11.jpg" data-toggle="lightbox-image">
                                    <img src="img/placeholders/photos/photo11.jpg" alt="image">
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-4 block-section">
                                <a href="img/placeholders/photos/photo12.jpg" data-toggle="lightbox-image">
                                    <img src="img/placeholders/photos/photo12.jpg" alt="image">
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-time">6 hrs ago</div>
                    <div class="timeline-icon themed-background-warning text-light-op"><i class="fa fa-coffee"></i></div>
                    <div class="timeline-content">
                        <p class="push-bit"><strong>Coffee Time</strong></p>
                        Join us at the Lobby for free coffee!
                    </div>
                </li>
                <li>
                    <div class="timeline-time">9 hrs ago</div>
                    <div class="timeline-icon themed-background-passion text-light-op"><i class="gi gi-drink"></i></div>
                    <div class="timeline-content">
                        <p class="push-bit"><strong><a href="javascript:void(0)">Anna Wigren</a> check in at <a href="javascript:void(0)">Cafe-Bar</a></strong></p>
                        <p class="push-bit">We are having an awesome time!</p>
                        <div id="gmap-timeline" style="height: 350px;"></div>
                    </div>
                </li>
                <li>
                    <div class="timeline-time">2 days ago</div>
                    <div class="timeline-icon themed-background-creme text-light-op"><i class="gi gi-cogwheel"></i></div>
                    <div class="timeline-content">
                        <p class="push-bit"><strong>App Update</strong></p>
                        Updated to <a href="javascript:void(0)">version 1.1</a>
                    </div>
                </li>
                <li>
                    <div class="timeline-time">3 days ago</div>
                    <div class="timeline-icon themed-background-success text-light-op"><i class="fa fa-smile-o"></i></div>
                    <div class="timeline-content">
                        <p class="push-bit"><strong>Thank you and Welcome!</strong></p>
                        <p class="push-bit">It's great to have you on board! Feel free to have a look at our <a href="page_ready_faq.php">FAQ</a> if you have any further questions.</p>
                    </div>
                </li>
            </ul>
        </div>
        <!-- END Timeline Content -->
    </div>
    <!-- END Timeline Block -->
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- Google Maps API + Gmaps Plugin, must be loaded in the page you would like to use maps (Remove 'http:' if you have SSL) -->
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="js/plugins/gmaps.min.js"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/readyTimeline.js"></script>
<script>$(function(){ ReadyTimeline.init(); });</script>

<?php include 'inc/template_end.php'; ?>