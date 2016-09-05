<?php
/**
 * Main function file for blank wordpress theme.
 * @package blankwordpresstheme
 */
?>

<?php
function bwt_menu() {
  register_nav_menus(array(
      'header-menu' => __( 'Header Menu' )
    )
  );
}
add_action('init', 'bwt_menu');

function bwt_styles() {
    wp_enqueue_style('bwt-bootstrap-style', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    wp_enqueue_style('bwt-styles', get_template_directory_uri() . '/assets/app/css/main.css');
    wp_enqueue_script('bwt-bootstrap-script', '//code.jquery.com/jquery-3.1.0.min.js');
    wp_enqueue_script('bwt-bootstrap-script', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
    wp_enqueue_script('bwt-scripts', get_template_directory_uri() . '/assets/app/js/main.js', array(), '0.0.1', true );
}
add_action('wp_enqueue_scripts', 'bwt_styles');

/*** Theme Customizer area. ***/
require get_template_directory() . '/functions/customizer.php';
/*** Register widget area.***/
require get_template_directory() . '/functions/widgets.php';
require get_template_directory() . '/widgets/widget-footer-menu.php';
require get_template_directory() . '/widgets/widget-footer-description.php';
require get_template_directory() . '/widgets/widget-footer-taxonomy.php';
