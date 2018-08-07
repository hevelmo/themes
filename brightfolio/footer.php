<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage brightfolio
 * @since brightfolio 0.1
 */
?>
	</div><!-- #main -->
</div><!-- #wrapper -->

<div id="wrapper_footer">
	<div id="footer">
		<div id="colophon">

<?php
	/* A sidebar in the footer.
	 */
	get_sidebar( 'footer' );
?>
		</div><!-- #colophon -->
	</div><!-- #footer -->

</div><!-- #wrappern footer -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
