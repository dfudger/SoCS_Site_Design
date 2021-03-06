<?php
/*  SoCS Help Navigation System - An interactive way to navigate through posts in Wordpress
    Copyright (C) 2013  M. Cibulka, B. Doek, D. Fudger, C. Rose

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.*/


/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="http://www-staging.socs.uoguelph.ca/wp-content/themes/socs/help-style.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed">
	<div id="header">
		<div class="logo shadow left" style="position: relative; top: -10px; width: 100px; height: 150px;">
		<a href="http://www.uoguelph.ca" title="University of Guelph"><?php echo _image('assets/uofg_cornerstone_gray.png')?> ?></a>
		</div>
		<div class="middle left" style="width: auto; height: 131px; position: relative; top: 7px; left: 20px;">
		<a href="<?php bloginfo('url') ?>"><?php echo _image('assets/header_title.png')?></a>
		</div>
		<div class="address right" style="width: auto; font-size: 12px;">
			<div class="pad">
			<br />
			<i>Reynolds Building</i><br /> 
			University of Guelph <br />
			50 Stone Road East <br />
			Guelph, Ontario, Canada<br />
			N1G 2W1
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div style="position: relative; top: -10px">
		<div class="left" style="width: 900px; height: 45px;">
			<div id="nav" style="position: relative; left: -1%; width: 101%;">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?> <?php //get_search_form(); ?>
			</div>
		</div>
		<div id="nav-after" class="left">
		&nbsp;
		</div>
	</div>

	<div id="main">
	