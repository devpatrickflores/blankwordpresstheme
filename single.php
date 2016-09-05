<?php
/**
 * Main single page file for blank wordpress theme.
 * @package blankwordpresstheme
 *
 *
 * @since 0.0.1
 */

<?php get_header(); ?>

<div class="single-wrapper" id="wrapper">
    <div class="container">
        <div class="row">
            <div id="primary" class="<?php if ( is_active_sidebar( 'bwt-sidebar' ) ) : ?>col-sm-8<?php else : ?>col-xs-12<?php endif; ?> bwt-single-content">
				    <?php while ( have_posts() ) : the_post(); ?>
						<?php the_post_navigation(); ?>
							<?php
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							?>
                <?php endwhile;?>
            </div>
        <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
