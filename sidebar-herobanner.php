<?php
/**
 * Main template file for blank wordpress theme.
 * @package blankwordpresstheme
 */
 ?>

<?php if ( is_active_sidebar( 'bwt-herobanner' ) ): ?>
    <div class="wrapper" id="wrapper-hero-banner">
        <?php dynamic_sidebar( 'bwt-herobanner' ); ?>
    </div><!-- #wrapper-hero-banner -->
<?php endif; ?>
