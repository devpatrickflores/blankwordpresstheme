<?php
/**
 * Widget API: bwt_footer_menu_widget class
 *
 *
 * Widget footer menu function file for blank wordpress theme.
 *
 *
 * Core class used to implement the Blank Wordpress Theme Footer Menu Widget.
 *
 *
 * @package blankwordpresstheme
 * @subpackage Widgets
 * @since 0.0.1
 */

 class bwt_footer_menu_widget extends WP_Widget {
   function __construct() {
     parent::__construct('bwt_widget_menu', __('BWT Footer Menu Widget', 'bwt_widget_menu'), array( 'description' => __( 'Blank Wordpress Theme Footer Menu Widget', 'bwt_widget_menu' ), ));
   }

 	public function widget( $args, $instance ) {
 		$bwt_container_column = apply_filters( 'bwt_container_column', $instance['bwt_container_column'] );
 		$bwt_footer_title = apply_filters( 'widget_textarea', $instance['bwt_footer_title'] );
    $nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;
 		if ($bwt_container_column == "onecolumn"):
 			echo '
      <div class="bwt-footer-column">
        <div class="col-xs-12">
          <div class="bwt-footer-title">
            <h4>'.$bwt_footer_title.'</h4>
          </div>';
          echo '<div class="bwt-footer-menu">';
            $nav_menu_args = array(
              'fallback_cb' => '',
              'menu'        => $nav_menu
            );
            wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $nav_menu, $args, $instance ) );
          echo'</div>
        </div>
      </div>';
    elseif ($bwt_container_column == "twocolumns"):
      echo '
      <div class="bwt-footer-column">
        <div class="col-sm-6 col-xs-12">
          <div class="bwt-footer-title">
            <h4>'.$bwt_footer_title.'</h4>
          </div>';
          echo '<div class="bwt-footer-menu">';
            $nav_menu_args = array(
              'fallback_cb' => '',
              'menu'        => $nav_menu
            );
            wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $nav_menu, $args, $instance ) );
          echo'</div>
        </div>
      </div>';
    elseif ($bwt_container_column == "threecolumns"):
      echo '
      <div class="bwt-footer-column">
        <div class="col-sm-4 col-xs-12">
          <div class="bwt-footer-title">
            <h4>'.$bwt_footer_title.'</h4>
          </div>';
          echo '<div class="bwt-footer-menu">';
            $nav_menu_args = array(
              'fallback_cb' => '',
              'menu'        => $nav_menu
            );
            wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $nav_menu, $args, $instance ) );
          echo'</div>
        </div>
      </div>';
    elseif ($bwt_container_column == "fourcolumns"):
      echo '
      <div class="bwt-footer-column">
        <div class="col-sm-3 col-xs-12">
          <div class="bwt-footer-title">
            <h4>'.$bwt_footer_title.'</h4>
          </div>';
          echo '<div class="bwt-footer-menu">';
            $nav_menu_args = array(
              'fallback_cb' => '',
              'menu'        => $nav_menu
            );
            wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $nav_menu, $args, $instance ) );
          echo'</div>
        </div>
      </div>';
    endif;
 	}

 	public function form( $instance ) {
    $nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';
    $menus = wp_get_nav_menus();
 		if ($instance) {
    $bwt_container_column = $instance['bwt_container_column'];
 		$bwt_footer_title = $instance[ 'bwt_footer_title' ];
 		}
 		else {
 		$title = __( 'BWT Footer Menu', 'bwt_footer_widget_content' );
 		}
 		?>
    <p>
      <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e( 'Footer Menu Column:' ); ?></label>
      <select id="<?php echo $this->get_field_id('bwt_container_column'); ?>" name="<?php echo $this->get_field_name('bwt_container_column'); ?>" class="widefat" style="width:100%;">
        <option <?php if ( 'onecolumn' == $instance['bwt_container_column'] ) echo 'selected="selected"'; ?> value="onecolumn">1 Column</option>
        <option <?php if ( 'twocolumns' == $instance['bwt_container_column'] ) echo 'selected="selected"'; ?> value="twocolumns">2 Columns</option>
        <option <?php if ( 'threecolumns' == $instance['bwt_container_column'] ) echo 'selected="selected"'; ?> value="threecolumns">3 Columns</option>
        <option <?php if ( 'fourcolumns' == $instance['bwt_container_column'] ) echo 'selected="selected"'; ?> value="fourcolumns">4 Columns</option>
      </select>
    </p>
 		<p>
 		<label for="<?php echo $this->get_field_id('bwt_footer_title'); ?>"><?php _e('Footer Menu Title:'); ?></label>
 		<input class="widefat" id="<?php echo $this->get_field_id('bwt_footer_title'); ?>" name="<?php echo $this->get_field_name('bwt_footer_title'); ?>" type="text" value="<?php echo esc_attr( $bwt_footer_title ); ?>" />
 		</p>
    <p class="nav-menu-widget-no-menus-message" <?php if ( ! empty( $menus ) ) { echo ' style="display:none" '; } ?>>
			<?php
			if ( isset( $GLOBALS['wp_customize'] ) && $GLOBALS['wp_customize'] instanceof WP_Customize_Manager ) {
				$url = 'javascript: wp.customize.panel( "nav_menus" ).focus();';
			} else {
				$url = admin_url( 'nav-menus.php' );
			}
			?>
			<?php echo sprintf( __( 'No menus have been created yet. <a href="%s">Create some</a>.' ), esc_attr( $url ) ); ?>
		</p>
		<div class="nav-menu-widget-form-controls" <?php if ( empty( $menus ) ) { echo ' style="display:none" '; } ?>>
			<p>
				<label for="<?php echo $this->get_field_id( 'nav_menu' ); ?>"><?php _e( 'Footer Menu:' ); ?></label>
				<select id="<?php echo $this->get_field_id( 'nav_menu' ); ?>" name="<?php echo $this->get_field_name( 'nav_menu' ); ?>">
					<option value="0"><?php _e( '&mdash; Select &mdash;' ); ?></option>
					<?php foreach ( $menus as $menu ) : ?>
						<option value="<?php echo esc_attr( $menu->term_id ); ?>" <?php selected( $nav_menu, $menu->term_id ); ?>>
							<?php echo esc_html( $menu->name ); ?>
						</option>
					<?php endforeach; ?>
				</select>
			</p>
    </div>
 		<?php
 	}

 	public function update( $new_instance, $old_instance ) {
 		$instance = array();
 		$instance['bwt_container_column'] = ( ! empty( $new_instance['bwt_container_column'] ) ) ? strip_tags( $new_instance['bwt_container_column'] ) : '';
 		$instance['bwt_footer_title'] = ( ! empty( $new_instance['bwt_footer_title'] ) ) ? strip_tags( $new_instance['bwt_footer_title'] ) : '';
    if ( ! empty( $new_instance['nav_menu'] ) ) { $instance['nav_menu'] = (int) $new_instance['nav_menu']; }
 		return $instance;
 		}
 	}

  function bwt_load_footer_menu_widget() {
  	register_widget('bwt_footer_menu_widget');
  }
  add_action( 'widgets_init', 'bwt_load_footer_menu_widget' );
