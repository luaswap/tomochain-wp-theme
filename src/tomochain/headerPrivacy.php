<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tomochain
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,400i,600,700,800,900&display=swap" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/libs/set-cookie/cookie.js'); ?>"></script>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo esc_url(TOMOCHAIN_THEME_URI . '/assets/libs/scroll-fullpage/fullpage.css'); ?>">
</head>

<body <?php body_class(); ?> id="privacy-wrapper">
