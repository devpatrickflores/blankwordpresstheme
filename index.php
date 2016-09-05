<?php
/**
 * Main template file for blank wordpress theme.
 * @package blankwordpresstheme
 */

get_header(); ?>
    <?php
    if ( is_front_page() && is_home() ) {
        get_sidebar('bwt-herobanner');

    } else {
    // Do anything else or do nothing.
    }
    ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
    <?php endwhile;?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
