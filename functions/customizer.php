<?php
/**
 * Widgets function file for blank wordpress theme.
 *
 *
 * @package blankwordpresstheme
 */
 function bwt_theme_customizer( $wp_customize ) {
     class Custom_Text_Control extends WP_Customize_Control {
         public $type = 'customtext';
         public $extra = ''; // we add this for the extra description
         public function render_content() {
         ?>
         <label>
             <span><?php echo esc_html( $this->extra ); ?></span>
             <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
             <input type="text" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
         </label>
         <?php
         }
     }
     $wp_customize->add_section('bwt_theme_section', array(
             'title'=>__('BWT Theme Settings','bwt_theme_settings'),
         )
     );
     $wp_customize->add_setting('bwt_logo');
     $wp_customize->add_control( new WP_Customize_Image_Control(
     $wp_customize, 'bwt_logo', array(
       'label'    => __( 'Site Logo', 'Blank Wordpress Theme Logo' ),
       'section'  => 'bwt_theme_section',
       'settings' => 'bwt_logo',
       'capability' => 'edit_theme_options',
     )));

     $wp_customize->add_setting('bwt_footer_text', array(
             'default' => '',
             'type' => 'bwt_footer_control',
             'capability' => 'edit_theme_options',
             'settings' => 'bwt_footer_text',
         )
     );
     $wp_customize->add_control( new Custom_Text_Control( $wp_customize, 'bwt_footer_control', array(
         'label' => 'Footer Copyright Text',
         'section' => 'bwt_theme_section',
         'settings' => 'bwt_footer_text',
         ))
     );
 }
 add_action('customize_register', 'bwt_theme_customizer', 10, 1);



 function bwt_customize_preview_js() {
 	wp_enqueue_script('bwt_customizer', get_template_directory_uri() . 'assets/app/js/customizer.js', array('customize-preview'), '20160208', true );
 }
 add_action('customize_preview_init', 'bwt_customize_preview_js' );
