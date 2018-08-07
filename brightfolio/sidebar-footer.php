<?php
/**
 * The Footer widget areas.
 *
 * @package WordPress
 * @subpackage brightfolio
 * @since brightfolio 0.1
 */
?>

<div id="footer-widget-area" role="complementary">


<div id="first" class="widget-area">
<ul class="xoxo">
<?php if ( ! dynamic_sidebar( 'first-footer-widget-area' ) ) : ?>
<li class="widget-container widget_text"><h3 class="widget-title">Text/Video Widget 1</h3>
<div class="textwidget"><img src="<?php bloginfo("template_directory"); ?>/images/icon/heart.png" alt="" width="32" height="32" border="0"> Top choice for entrepreneurs, designers and businesses. 
You could edit this to put information about yourself or your site.</div>
</li>
<?php endif; ?>
</ul>
</div>


<div id="second" class="widget-area">
<ul class="xoxo">
<?php if ( ! dynamic_sidebar( 'second-footer-widget-area' ) ) : ?>
<li class="widget-container widget_text"><h3 class="widget-title">Text/Video Widget 1</h3>
<div class="textwidget"><img src="<?php bloginfo("template_directory"); ?>/images/icon/world.png" alt="" width="32" height="32" border="0"> Top choice for entrepreneurs, designers and businesses. 
You could edit this to put information about yourself or your site.</div>
</li>
<?php endif; ?>
</ul>
</div>

<div id="third" class="widget-area">
<ul class="xoxo">
<?php if ( ! dynamic_sidebar( 'third-footer-widget-area' ) ) : ?>
<li class="widget-container widget_text"><h3 class="widget-title">Text/Video Widget 1</h3>
<div class="textwidget"><img src="<?php bloginfo("template_directory"); ?>/images/icon/comment.png" alt="" width="32" height="32" border="0"> Top choice for entrepreneurs, designers and businesses. 
You could edit this to put information about yourself or your site.</div>
</li>
<?php endif; ?>
</ul>
</div>

<div id="fourth" class="widget-area">
<ul class="xoxo">
<li class="widget-container widget_text"><h3 class="widget-title">&nbsp;</h3>
<div class="textwidget"><div id="site-info">
				&copy; <a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			
			</div><!-- #site-info -->

			<div id="site-generator">
				<?php do_action( 'brightfolio_credits' ); ?>
				<a href="<?php echo esc_url( __('http://wordpress.org/', 'brightfolio') ); ?>"
						title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'brightfolio'); ?>" rel="generator">
					<?php printf( __('Proudly powered by %s.', 'brightfolio'), 'WordPress' ); ?>
				</a>
				
				<?php do_action( 'brightfolio_credits' ); ?>
				<a href="<?php echo esc_url( __('http://codedesign.elkind.net/', 'brightfolio') ); ?>"
						title="<?php esc_attr_e('codedesign.elkind.net', 'brightfolio'); ?>" rel="generator">
					<?php printf( __('BrightFolio Theme by %s.', 'brightfolio'), 'Jeny Elkind' ); ?>
				</a>
			</div><!-- #site-generator --></div>
</li></ul>
</div>

			</div><!-- #footer-widget-area -->
