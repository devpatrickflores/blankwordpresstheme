<?php
/**
 * Widgets function file for blank wordpress theme.
 * @package blankwordpresstheme
 *
 *
 * @since 0.0.1
 */

function bwt_widgets_init() {
		register_sidebar( array(
				'name'          => __( 'BWT Hero Banner', 'bwt hero banner' ),
				'id'            => 'bwt-herobanner',
				'description'   => 'Blank Wordpress Theme Hero Banner Widget Area.',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
		) );
		register_sidebar( array(
			'name'          => __( 'BWT Footer', 'bwt footer' ),
			'id'            => 'bwt-footer',
			'description'   => 'Blank Wordpress Theme Footer Widget Area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		) );

		register_sidebar( array(
			'name'          => __( 'BWT Sidebar', 'bwt sidebar' ),
			'id'            => 'bwt-sidebar',
			'description'   => 'Blank Wordpress Theme Sidebar Widget Area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		) );
}
add_action( 'widgets_init', 'bwt_widgets_init' );
