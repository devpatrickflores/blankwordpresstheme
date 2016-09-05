<?php
/**
 * Widget API: bwt_footer_taxonomy_widget class
 *
 *
 * Widget footer taxonomy function file for blank wordpress theme.
 *
 *
 * Core class used to implement the Blank Wordpress Theme Footer Taxonomy Widget.
 *
 *
 * @package blankwordpresstheme
 * @subpackage Widgets
 * @since 0.0.1
 */

 class bwt_footer_taxonomy_widget extends WP_Widget {
   function __construct() {
     parent::__construct('bwt_widget_taxonomy', __('BWT Footer Taxonomy Widget', 'bwt_widget_taxonomy'), array( 'description' => __( 'Blank Wordpress Theme Footer Taxonomy Widget', 'bwt_widget_taxonomy' ), ));
   }

 	public function widget( $args, $instance ) {
    global $post;
		extract($args);

		if ( array_key_exists( 'taxonomy', $instance ) ) {
			$bwt_taxonomy = $instance['taxonomy'];
		} else {
			$bwt_taxonomy = '';
		}
		$hierarchical = !empty( $instance['hierarchical'] ) ? '1' : '0';
		$inv_empty = !empty( $instance['empty'] ) ? '0' : '1';
		$showcount = !empty( $instance['count'] ) ? '1' : '0';
		if( array_key_exists('orderby',$instance) ){
			$orderby = $instance['orderby'];
		}
		else{
			$orderby = 'count';
		}
		if( array_key_exists('ascdsc',$instance) ){
			$ascdsc = $instance['ascdsc'];
		}
		else{
			$ascdsc = 'desc';
		}
		if( array_key_exists('exclude',$instance) ){
			$exclude = $instance['exclude'];
		}
		else {
			$exclude = '';
		}
		if( array_key_exists('childof',$instance) ){
			$childof = $instance['childof'];
		}
		else {
			$childof = '';
		}
		if( array_key_exists('dropdown',$instance) ){
			$dropdown = $instance['dropdown'];
		}
		else {
			$dropdown = false;
		}

		$builtin = array( 'post_tag', 'post_format', 'category' );
		if ( $dropdown && in_array( $bwt_taxonomy, $builtin ) ) {
			$dropdown = false;
		}
 		$bwt_container_column = apply_filters( 'bwt_container_column', $instance['bwt_container_column'] );
 		$bwt_footer_title = apply_filters( 'widget_textarea', $instance['bwt_footer_title'] );
 		if ($bwt_container_column == "onecolumn"):
 			echo '
      <div class="bwt-footer-column">
        <div class="col-xs-12">
          <div class="bwt-footer-title">
            <h4>'.$bwt_footer_title.'</h4>
          </div>
          <div class="bwt-footer-taxonomy">';
          $tax = $bwt_taxonomy;
      		echo '<div class="bwt-taxonomy-holder">';
      		if($dropdown){
      			$taxonomy_object = get_taxonomy( $tax );
      			if( in_array( $tax, array( 'category', 'post_tag', 'post_format' ) ) )
      				$walker = '';
      			else
      				$walker = new BWT_Taxonomy_Dropdown_Walker();
      			$args = array(
      				'show_option_all'    => false,
      				'show_option_none'   => '',
      				'orderby'            => 'RANDOM()',
      				'order'              => $ascdsc,
      				'show_count'         => $showcount,
      				'hide_empty'         => $inv_empty,
      				'child_of'           => $childof,
      				'exclude'            => $exclude,
      				'echo'               => 1,
      				'hierarchical'       => $hierarchical,
      				'name'               => $taxonomy_object->query_var,
      				'class'                 =>'bwt-taxonomy',
      				'depth'              => 0,
      				'taxonomy'           => $tax,
      				'hide_if_empty'      => true,
      				'walker'			=> $walker,
      			);
      			echo '<form action="'. get_bloginfo('url'). '" method="get">';
      			wp_dropdown_categories($args);
      			echo '<input type="submit" value="go &raquo;" /></form>';
      		}
      		else {
      			$args = array(
      					'show_option_all'    => false,
      					'orderby'            => $orderby,
      					'order'              => $ascdsc,
      					'style'              => 'list',
      					'show_count'         => $showcount,
      					'hide_empty'         => $inv_empty,
      					'use_desc_for_title' => 1,
      					'child_of'           => $childof,
      					'exclude'            => $exclude,
      					'hierarchical'       => $hierarchical,
      					'title_li'           => '',
      					'show_option_none'   => 'No Categories',
      					'number'             => null,
      					'echo'               => 1,
      					'depth'              => 0,
      					'taxonomy'           => $tax,
      					'walker'             => null
      				);
      			echo '<ul class="bwt-taxonomy">';
      			wp_list_categories($args);
      			echo '</ul>';
      		}
      		echo '</div>';
          echo'</div>
        </div>
      </div>';
    elseif ($bwt_container_column == "twocolumns"):
      echo '
      <div class="bwt-footer-column">
        <div class="col-sm-6 col-xs-12">
          <div class="bwt-footer-title">
            <h4>'.$bwt_footer_title.'</h4>
          </div>
          <div class="bwt-footer-taxonomy">';
          $tax = $bwt_taxonomy;
          echo '<div class="bwt-taxonomy-holder">';
          if($dropdown){
            $taxonomy_object = get_taxonomy( $tax );
            if( in_array( $tax, array( 'category', 'post_tag', 'post_format' ) ) )
              $walker = '';
            else
              $walker = new BWT_Taxonomy_Dropdown_Walker();
            $args = array(
              'show_option_all'    => false,
              'show_option_none'   => '',
              'orderby'            => 'RANDOM()',
              'order'              => $ascdsc,
              'show_count'         => $showcount,
              'hide_empty'         => $inv_empty,
              'child_of'           => $childof,
              'exclude'            => $exclude,
              'echo'               => 1,
              'hierarchical'       => $hierarchical,
              'name'               => $taxonomy_object->query_var,
              'class'                 =>'bwt-taxonomy',
              'depth'              => 0,
              'taxonomy'           => $tax,
              'hide_if_empty'      => true,
              'walker'			=> $walker,
            );
            echo '<form action="'. get_bloginfo('url'). '" method="get">';
            wp_dropdown_categories($args);
            echo '<input type="submit" value="go &raquo;" /></form>';
          }
          else {
            $args = array(
                'show_option_all'    => false,
                'orderby'            => $orderby,
                'order'              => $ascdsc,
                'style'              => 'list',
                'show_count'         => $showcount,
                'hide_empty'         => $inv_empty,
                'use_desc_for_title' => 1,
                'child_of'           => $childof,
                'exclude'            => $exclude,
                'hierarchical'       => $hierarchical,
                'title_li'           => '',
                'show_option_none'   => 'No Categories',
                'number'             => null,
                'echo'               => 1,
                'depth'              => 0,
                'taxonomy'           => $tax,
                'walker'             => null
              );
            echo '<ul class="bwt-taxonomy">';
            wp_list_categories($args);
            echo '</ul>';
          }
          echo '</div>';
          echo'</div>
        </div>
      </div>';
    elseif ($bwt_container_column == "threecolumns"):
      echo '
      <div class="bwt-footer-column">
        <div class="col-sm-4 col-xs-12">
          <div class="bwt-footer-title">
            <h4>'.$bwt_footer_title.'</h4>
          </div>
          <div class="bwt-footer-taxonomy">';
          $tax = $bwt_taxonomy;
          echo '<div class="bwt-taxonomy-holder">';
          if($dropdown){
            $taxonomy_object = get_taxonomy( $tax );
            if( in_array( $tax, array( 'category', 'post_tag', 'post_format' ) ) )
              $walker = '';
            else
              $walker = new BWT_Taxonomy_Dropdown_Walker();
            $args = array(
              'show_option_all'    => false,
              'show_option_none'   => '',
              'orderby'            => 'RANDOM()',
              'order'              => $ascdsc,
              'show_count'         => $showcount,
              'hide_empty'         => $inv_empty,
              'child_of'           => $childof,
              'exclude'            => $exclude,
              'echo'               => 1,
              'hierarchical'       => $hierarchical,
              'name'               => $taxonomy_object->query_var,
              'class'                 =>'bwt-taxonomy',
              'depth'              => 0,
              'taxonomy'           => $tax,
              'hide_if_empty'      => true,
              'walker'			=> $walker,
            );
            echo '<form action="'. get_bloginfo('url'). '" method="get">';
            wp_dropdown_categories($args);
            echo '<input type="submit" value="go &raquo;" /></form>';
          }
          else {
            $args = array(
                'show_option_all'    => false,
                'orderby'            => $orderby,
                'order'              => $ascdsc,
                'style'              => 'list',
                'show_count'         => $showcount,
                'hide_empty'         => $inv_empty,
                'use_desc_for_title' => 1,
                'child_of'           => $childof,
                'exclude'            => $exclude,
                'hierarchical'       => $hierarchical,
                'title_li'           => '',
                'show_option_none'   => 'No Categories',
                'number'             => null,
                'echo'               => 1,
                'depth'              => 0,
                'taxonomy'           => $tax,
                'walker'             => null
              );
            echo '<ul class="bwt-taxonomy">';
            wp_list_categories($args);
            echo '</ul>';
          }
          echo '</div>';
          echo'</div>
        </div>
      </div>';
    elseif ($bwt_container_column == "fourcolumns"):
      echo '
      <div class="bwt-footer-column">
        <div class="col-sm-3 col-xs-12">
          <div class="bwt-footer-title">
            <h4>'.$bwt_footer_title.'</h4>
          </div>
          <div class="bwt-footer-taxonomy">';
          $tax = $bwt_taxonomy;
          echo '<div class="bwt-taxonomy-holder">';
          if($dropdown){
            $taxonomy_object = get_taxonomy( $tax );
            if( in_array( $tax, array( 'category', 'post_tag', 'post_format' ) ) )
              $walker = '';
            else
              $walker = new BWT_Taxonomy_Dropdown_Walker();
            $args = array(
              'show_option_all'    => false,
              'show_option_none'   => '',
              'orderby'            => 'RANDOM()',
              'order'              => $ascdsc,
              'show_count'         => $showcount,
              'hide_empty'         => $inv_empty,
              'child_of'           => $childof,
              'exclude'            => $exclude,
              'echo'               => 1,
              'hierarchical'       => $hierarchical,
              'name'               => $taxonomy_object->query_var,
              'class'                 =>'bwt-taxonomy',
              'depth'              => 0,
              'taxonomy'           => $tax,
              'hide_if_empty'      => true,
              'walker'			=> $walker,
            );
            echo '<form action="'. get_bloginfo('url'). '" method="get">';
            wp_dropdown_categories($args);
            echo '<input type="submit" value="go &raquo;" /></form>';
          }
          else {
            $args = array(
                'show_option_all'    => false,
                'orderby'            => $orderby,
                'order'              => $ascdsc,
                'style'              => 'list',
                'show_count'         => $showcount,
                'hide_empty'         => $inv_empty,
                'use_desc_for_title' => 1,
                'child_of'           => $childof,
                'exclude'            => $exclude,
                'hierarchical'       => $hierarchical,
                'title_li'           => '',
                'show_option_none'   => 'No Categories',
                'number'             => null,
                'echo'               => 1,
                'depth'              => 0,
                'taxonomy'           => $tax,
                'walker'             => null
              );
            echo '<ul class="bwt-taxonomy">';
            wp_list_categories($args);
            echo '</ul>';
          }
          echo '</div>';
          echo'</div>
        </div>
      </div>';
    endif;
 	}

 	public function form( $instance ) {
    if ( $instance ) {
    $bwt_taxonomy = $instance['taxonomy'];
    $orderby = $instance['orderby'];
    $ascdsc = $instance['ascdsc'];
    $exclude = $instance['exclude'];
    $childof = $instance['childof'];
            $showcount = isset($instance['count']) ? (bool) $instance['count'] :false;
            $hierarchical = isset( $instance['hierarchical'] ) ? (bool) $instance['hierarchical'] : false;
            $empty = isset( $instance['empty'] ) ? (bool) $instance['empty'] : false;
            $dropdown = isset( $instance['dropdown'] ) ? (bool) $instance['dropdown'] : false;
    } else {
    $orderby  = 'count';
    $ascdsc  = 'desc';
    $exclude  = '';
    $childof  = '';
    $bwt_taxonomy = 'category';
    $hierarchical = true;
    $showcount = true;
    $empty = false;
    $dropdown = false;
    }

 		if ($instance) {
    $bwt_container_column = $instance['bwt_container_column'];
 		$bwt_footer_title = $instance[ 'bwt_footer_title' ];

 		}
 		else {
 		$title = __( 'BWT Footer Taxonomy', 'bwt_footer_widget_content' );
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
    <label for="<?php echo $this->get_field_id('taxonomy'); ?>"><?php echo __( 'Footer Taxonomy:' ); ?></label>
    <select name="<?php echo $this->get_field_name('taxonomy'); ?>" id="<?php echo $this->get_field_id('taxonomy'); ?>" class="widefat" style="height: auto;" size="4">
    <?php
    $args=array(
    'public'   => true,
    '_builtin' => false
    );
    $output = 'names';
    $operator = 'and';
    $taxonomies=get_taxonomies($args,$output,$operator);
    $taxonomies[] = 'category';
    $taxonomies[] = 'post_tag';
    $taxonomies[] = 'post_format';
    foreach ($taxonomies as $taxonomy ) {
    $taxonomy_text = str_replace('_', ' ', $taxonomy);?>
    <option value="<?php echo $taxonomy; ?>" <?php if( $taxonomy == $bwt_taxonomy ) { echo 'selected="selected"'; } ?>><?php echo ucfirst($taxonomy_text);?></option>
    <?php }	?>
    </select>
    </p>

    <p>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>"<?php checked( $showcount ); ?> />
    <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e( 'Show Post Counts' ); ?></label><br />
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('hierarchical'); ?>" name="<?php echo $this->get_field_name('hierarchical'); ?>"<?php checked( $hierarchical ); ?> />
    <label for="<?php echo $this->get_field_id('hierarchical'); ?>"><?php _e( 'Show Hierarchy' ); ?></label><br/>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('empty'); ?>" name="<?php echo $this->get_field_name('empty'); ?>"<?php checked( $empty ); ?> />
    <label for="<?php echo $this->get_field_id('empty'); ?>"><?php _e( 'Show Empty Terms' ); ?></label></p>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('orderby'); ?>"><?php echo __( 'Order By:' ); ?></label>
      <select name="<?php echo $this->get_field_name('orderby'); ?>" id="<?php echo $this->get_field_id('orderby'); ?>" class="widefat" >
        <option value="ID" <?php if( $orderby == 'ID' ) { echo 'selected="selected"'; } ?>>ID</option>
        <option value="name" <?php if( $orderby == 'name' ) { echo 'selected="selected"'; } ?>>Name</option>
        <option value="slug" <?php if( $orderby == 'slug' ) { echo 'selected="selected"'; } ?>>Slug</option>
        <option value="count" <?php if( $orderby == 'count' ) { echo 'selected="selected"'; } ?>>Count</option>
        <option value="term_group" <?php if( $orderby == 'term_group' ) { echo 'selected="selected"'; } ?>>Term Group</option>
      </select>
    </p>
    <p>
      <label><input type="radio" name="<?php echo $this->get_field_name('ascdsc'); ?>" value="asc" <?php if( $ascdsc == 'asc' ) { echo 'checked'; } ?>/> Ascending</label><br/>
      <label><input type="radio" name="<?php echo $this->get_field_name('ascdsc'); ?>" value="desc" <?php if( $ascdsc == 'desc' ) { echo 'checked'; } ?>/> Descending</label>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('exclude'); ?>">Exclude (comma-separated list of ids to exclude)</label><br/>
      <input type="text" class="widefat" name="<?php echo $this->get_field_name('exclude'); ?>" value="<?php echo $exclude; ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('exclude'); ?>">Only Show Children of (category id)</label><br/>
      <input type="text" class="widefat" name="<?php echo $this->get_field_name('childof'); ?>" value="<?php echo $childof; ?>" />
    </p>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('dropdown'); ?>" name="<?php echo $this->get_field_name('dropdown'); ?>"<?php checked( $dropdown ); ?> />
    <label for="<?php echo $this->get_field_id('dropdown'); ?>"><?php _e( 'Display as Dropdown' ); ?></label></p>
 		<?php
 	}

 	public function update( $new_instance, $old_instance ) {
 		$instance = array();
 		$instance['bwt_container_column'] = ( ! empty( $new_instance['bwt_container_column'] ) ) ? strip_tags( $new_instance['bwt_container_column'] ) : '';
 		$instance['bwt_footer_title'] = ( ! empty( $new_instance['bwt_footer_title'] ) ) ? strip_tags( $new_instance['bwt_footer_title'] ) : '';

    $instance['title']  = strip_tags( $new_instance['title'] );
		$instance['taxonomy'] = strip_tags( $new_instance['taxonomy'] );
		$instance['orderby'] = $new_instance['orderby'];
		$instance['ascdsc'] = $new_instance['ascdsc'];
		$instance['exclude'] = $new_instance['exclude'];
		$instance['expandoptions'] = $new_instance['expandoptions'];
		$instance['childof'] = $new_instance['childof'];
		$instance['hierarchical'] = !empty($new_instance['hierarchical']) ? 1 : 0;
		$instance['empty'] = !empty($new_instance['empty']) ? 1 : 0;
        $instance['count'] = !empty($new_instance['count']) ? 1 : 0;
        $instance['dropdown'] = !empty($new_instance['dropdown']) ? 1 : 0;

 		return $instance;
 		}
 	}

  class BWT_Taxonomy_Dropdown_Walker extends Walker {
  	var $tree_type = 'category';
  	var $db_fields = array ( 'id' => 'term_id', 'parent' => 'parent' );

  	function start_el( &$output, $term, $depth = 0, $args = array(), $current_object_id = 0 ) {
  		$term = get_term( $term, $term->taxonomy );
  		$term_slug = $term->slug;

  		$text = str_repeat( '&nbsp;', $depth * 3 ) . $term->name;
  		if ( $args['show_count'] ) {
  			$text .= '&nbsp;('. $term->count .')';
  		}

  		$class_name = 'level-' . $depth;

  		$output.= "\t" . '<option' . ' class="' . esc_attr( $class_name ) . '" value="' . esc_attr( $term_slug ) . '">' . esc_html( $text ) . '</option>' . "\n";
  	}
  }

  function bwt_load_footer_taxonomy_widget() {
  	register_widget('bwt_footer_taxonomy_widget');
  }
  add_action( 'widgets_init', 'bwt_load_footer_taxonomy_widget' );
