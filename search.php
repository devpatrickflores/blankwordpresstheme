<?php
/**
 * Main search file for blank wordpress theme.
 * @package blankwordpresstheme
 */
?>

<div class="wrapper bwt-search-wrapper">
    <div class="container">
        <div class="row">
            <div id="bwt-search-primary" class="bwt-search">
                <?php if ( have_posts() ) : ?>
                  <?php if ( have_posts() ) : ?>

              <header class="bwt-page-header">
                  <h1 class="bwt-page-title"><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
              </header>
              <?php shape_content_nav( 'nav-above' ); ?>
              <?php while ( have_posts() ) : the_post(); ?>
                  <?php get_template_part( 'content', 'bwt-search' ); ?>
              <?php endwhile; ?>
              <?php shape_content_nav( 'nav-below' ); ?>
              <?php else : ?>
                  <?php get_template_part( 'no-results', 'bwt-search' ); ?>
              <?php endif; ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
