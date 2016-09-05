<?php
/**
 * Widget API: bwt_footer_description_widget class
 *
 *
 * Widget footer description function file for blank wordpress theme.
 *
 *
 * Core class used to implement the Blank Wordpress Theme Footer Description Widget.
 *
 *
 * @package blankwordpresstheme
 * @subpackage Widgets
 * @since 0.0.1
 */

 class bwt_footer_description_widget extends WP_Widget {
   function __construct() {
     parent::__construct('bwt_widget_description', __('BWT Footer Description Widget', 'bwt_widget_description'), array( 'description' => __( 'Blank Wordpress Theme Footer Description Widget', 'bwt_widget_description' ), ));
   }

 	public function widget( $args, $instance ) {
 		$bwt_container_column = apply_filters( 'bwt_container_column', $instance['bwt_container_column'] );
 		$bwt_footer_title = apply_filters( 'widget_textarea', $instance['bwt_footer_title'] );
    $bwt_footer_description = apply_filters( 'widget_textarea', $instance['bwt_footer_description'] );
 		if ($bwt_container_column == "onecolumn"):
 			echo '
      <div class="bwt-footer-column">
        <div class="col-xs-12">
          <div class="bwt-footer-title">
            <h4>'.$bwt_footer_title.'</h4>
          </div>
          <div class="bwt-footer-description">
            <p>'.$bwt_footer_description.'</p>
          </div>
        </div>
      </div>';
    elseif ($bwt_container_column == "twocolumns"):
      echo '
      <div class="bwt-footer-column">
        <div class="col-sm-6 col-xs-12">
          <div class="bwt-footer-title">
            <h4>'.$bwt_footer_title.'</h4>
          </div>
          <div class="bwt-footer-description">
            <p>'.$bwt_footer_description.'</p>
          </div>
        </div>
      </div>';
    elseif ($bwt_container_column == "threecolumns"):
      echo '
      <div class="bwt-footer-column">
        <div class="col-sm-4 col-xs-12">
          <div class="bwt-footer-title">
            <h4>'.$bwt_footer_title.'</h4>
          </div>
          <div class="bwt-footer-description">
            <p>'.$bwt_footer_description.'</p>
          </div>
        </div>
      </div>';
    elseif ($bwt_container_column == "fourcolumns"):
      echo '
      <div class="bwt-footer-column">
        <div class="col-sm-3 col-xs-12">
          <div class="bwt-footer-title">
            <h4>'.$bwt_footer_title.'</h4>
          </div>
          <div class="bwt-footer-description">
            <p>'.$bwt_footer_description.'</p>
          </div>
        </div>
      </div>';
    endif;
 	}

 	public function form( $instance ) {
 		if ($instance) {
    $bwt_container_column = $instance['bwt_container_column'];
 		$bwt_footer_title = $instance[ 'bwt_footer_title' ];
    $bwt_footer_description = $instance[ 'bwt_footer_description' ];
 		}
 		else {
 		$title = __( 'BWT Footer Description', 'bwt_footer_widget_content' );
 		}
 		?>
    <p>
      <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e( 'Footer Description Column:' ); ?></label>
      <select id="<?php echo $this->get_field_id('bwt_container_column'); ?>" name="<?php echo $this->get_field_name('bwt_container_column'); ?>" class="widefat" style="width:100%;">
        <option <?php if ( 'onecolumn' == $instance['bwt_container_column'] ) echo 'selected="selected"'; ?> value="onecolumn">1 Column</option>
        <option <?php if ( 'twocolumns' == $instance['bwt_container_column'] ) echo 'selected="selected"'; ?> value="twocolumns">2 Columns</option>
        <option <?php if ( 'threecolumns' == $instance['bwt_container_column'] ) echo 'selected="selected"'; ?> value="threecolumns">3 Columns</option>
        <option <?php if ( 'fourcolumns' == $instance['bwt_container_column'] ) echo 'selected="selected"'; ?> value="fourcolumns">4 Columns</option>
      </select>
    </p>
 		<p>
 		<label for="<?php echo $this->get_field_id('bwt_footer_title'); ?>"><?php _e('Footer Description Title:'); ?></label>
 		<input class="widefat" id="<?php echo $this->get_field_id('bwt_footer_title'); ?>" name="<?php echo $this->get_field_name('bwt_footer_title'); ?>" type="text" value="<?php echo esc_attr( $bwt_footer_title ); ?>" />
 		</p>
    <p>
    <label for="<?php echo $this->get_field_id('bwt_footer_title'); ?>"><?php _e( 'Footer Description:' ); ?></label>
		<textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('bwt_footer_description'); ?>" name="<?php echo $this->get_field_name('bwt_footer_description'); ?>"><?php echo esc_textarea( $instance['bwt_footer_description'] ); ?></textarea>
    </p>

 		<?php
 	}

 	public function update( $new_instance, $old_instance ) {
 		$instance = array();
 		$instance['bwt_container_column'] = ( ! empty( $new_instance['bwt_container_column'] ) ) ? strip_tags( $new_instance['bwt_container_column'] ) : '';
 		$instance['bwt_footer_title'] = ( ! empty( $new_instance['bwt_footer_title'] ) ) ? strip_tags( $new_instance['bwt_footer_title'] ) : '';
    $instance['bwt_footer_description'] = ( ! empty( $new_instance['bwt_footer_description'] ) ) ? strip_tags( $new_instance['bwt_footer_description'] ) : '';
 		return $instance;
 		}
 	}

  function bwt_load_footer_description_widget() {
  	register_widget('bwt_footer_description_widget');
  }
  add_action( 'widgets_init', 'bwt_load_footer_description_widget' );
