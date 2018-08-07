<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage brightfolio
 * @since brightfolio 0.1
 */
?>

		<div id="primary" class="widget-area" role="complementary">
			<ul class="xoxo">

<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
	
			<li class="widget-container widget_text"><h3 class="widget-title">Text/Video Widget</h3>
<div class="textwidget"><img src="<?php bloginfo("template_directory"); ?>/images/icon/graphic-design.png" alt="" width="32" height="32" border="0"> Top choice for entrepreneurs, designers and businesses. 
You could edit this to put information about yourself or your site.</div>
			</li>
			
			<li class="widget-container widget_text"><h3 class="widget-title">Text/Video Widget</h3>
<div class="textwidget"><iframe src="http://player.vimeo.com/video/10811990?title=0&amp;byline=0&amp;portrait=0" width="300" height="169" frameborder="0"></iframe></div>
			</li>			
					
	
			<li id="search" class="widget-container widget_search">
							<h3 class="widget-title">Search</h3>
				<?php get_search_form(); ?>
			</li>


		<?php endif; // end primary widget area ?>
			</ul>
		</div><!-- #primary .widget-area -->

<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

		<div id="secondary" class="widget-area" role="complementary">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</ul>
		</div><!-- #secondary .widget-area -->

<?php endif; ?>
