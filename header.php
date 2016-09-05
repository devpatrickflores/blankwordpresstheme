<?php
/**
 * Main header file for blank wordpress theme.
 * @package blankwordpresstheme
 */
?>
<!DOCTYPE html>
<html lang="en">
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
<meta name="format-detection" content="telephone=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='//fonts.googleapis.com/css?family=Lato:400,900,700,300' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>
</head>

<body <?php if( is_front_page() || is_home()) : echo 'id="bwt-homepage"'; else: echo 'id="bwt-singlepage"'; endif; ?>>
<?php get_template_part('content-templates/content', 'header'); ?>
