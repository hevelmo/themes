<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage brightfolio
 * @since brightfolio 0.1
 */

get_header(); ?>

		<div id="container">
<div class="line">
<div class="post col0">
<div class="entry">

<!-- first portfolio post -->

  <?php query_posts($query_string . "category_name=Portfolio&showposts=1"); ?>
    <?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php if ( has_post_thumbnail() )the_post_thumbnail(array( 480,999 ),  array( 'alt' => get_the_title(), 'title' => get_the_title(), 'class' => '' )); ?></a>
<div class="first"><h2 class="entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<a href="<?php the_permalink() ?>" ><?php the_excerpt() ?></a></div>     
	<?php endwhile; ?>
	<?php else : ?>
	<?php endif; ?>

<!-- end first portfolio post -->


</div></div>

	<?php $col = 1; ?>
    <?php query_posts($query_string . "category_name=Portfolio&showposts=2&offset=1"); ?>
    <?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post col<?php echo $col;?>" id="post-<?php the_ID(); ?>">
				<div class="entry">
<a href="<?php the_permalink() ?>" ><?php the_post_thumbnail(); ?></a>
<h2 class="entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

<a href="<?php the_permalink() ?>" ><?php the_excerpt() ?></a>

</div></div>    
<?php
if($col == 1) {$col = 2;} else {
if($col != 1) {
if($col == 3) {$col = 1;}
if($col == 2) {$col = 3;}
}
}
endwhile; ?>

	<?php else : ?>

		
		<p class="center">You don't have any posts yet in Portfolio.</p>
		

	<?php endif; ?>	
	  
	</div>
			</div>
			




			<!-- #containerindex -->
<div id="containerwide">	
<div id="containerindex3">	
<?php query_posts($query_string . "category_name=Portfolio&showposts=4&offset=3"); ?>
<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>

<div class="post col1" id="post-<?php the_ID(); ?>">
<div class="entry">
<a href="<?php the_permalink() ?>" ><?php the_post_thumbnail(); ?>
<h2 class="entry-title" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a></h2>
<a href="<?php the_permalink() ?>" ><?php the_excerpt() ?></a>
</div></div>          
<?php endwhile; ?>	
<?php endif; ?>	
</div></div><!-- #containerindex3 -->




			
			<!-- #containerindex -->
			
			<div id="containerindex2">
			
	
	
<div class="post col00">
<b><small>NEWS / BLOG</small></b>
</div>
	
	<?php $col = 11; ?>
    <?php query_posts($query_string . "category_name=Blog,News&showposts=3"); ?>
    <?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post col<?php echo $col;?>" id="post-<?php the_ID(); ?>">
				<div class="entry">
<h2 class="entry-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

<div class="entry-meta"><?php brightfolio_posted_on(); ?></div>
			
<a href="<?php the_permalink() ?>" ><?php the_excerpt() ?></a>
</div></div>          
<?php
if($col == 11) {$col = 22;} else {
if($col != 11) {
if($col == 33) {$col = 11;}
if($col == 22) {$col = 33;}
}
}
endwhile; ?>	
	<?php else : ?>

		
		<p class="center">You don't have any posts yet in Nes/Blog.</p>
		

	<?php endif; ?>	
	
	</div></div>	
	
	
		</div><!-- #containerindex2 -->

<?php get_footer(); ?>
