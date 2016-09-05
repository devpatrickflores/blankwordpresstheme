<?php
/**
 * Main search result file for blank wordpress theme.
 * @package blankwordpresstheme
 */
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
  <label for="s" class="assistive-text"><?php _e( 'Search', 'blank_wordpress_theme' ); ?></label>
  <div class="input-group">
    <input type="text" class="field form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'blank_wordpress_theme' ); ?>" />
    <span class="input-group-btn">
      <input type="submit" class="submit btn btn-primary" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'blank_wordpress_theme' ); ?>" />
    </span>
  </div>
</form>
