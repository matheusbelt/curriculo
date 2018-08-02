<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till #main div
 *
 * @package Odin
 * @since 2.2.0
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( ! get_option( 'site_icon' ) ) : ?>
		<link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon" />
	<?php endif; ?>
	<link href="http://allfont.net/allfont.css?fonts=montserrat-black" rel="stylesheet" type="text/css" />
	<?php wp_head(); ?>
</head>

<?php $title = get_the_title(get_the_ID()); ?>
<body <?php body_class(); ?>>

	<header id="header" class="true-header" role="banner">
		<div class="container">
		<div class="header">
			<div class="page-header hidden-xs">

				<?php if ( is_home() ) : ?>
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<?php echo $title; ?>
						</a>
					</h1>
				<?php else : ?>
					<div class="h1">
						<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<h1 class="site-title"><?php echo $title; ?></h1>
						</a>
					</div>
				<?php endif ?>

			</div><!-- .page-header-->

			<div></div>

			<div id="main-navigation" class="navbar navbar-default">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-navigation">
					<span class="sr-only"><?php _e( 'Toggle navigation', 'odin' ); ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand visible-xs-block" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
				</div>
				<nav class="collapse navbar-collapse navbar-main-navigation" role="navigation">
					<ul class="nav-menu">
						<a href="#sobre"><li class="nav-menu__li">sobre</li></a>
						<a href="#habilidades"><li class="nav-menu__li">habilidades</li></a>
						<a href="#experiencias"><li class="nav-menu__li">experiencias</li></a>
						<a href="#contato"><li class="nav-menu__li">contato</li></a>
					</ul>
				</nav><!-- .navbar-collapse -->
			</div><!-- #main-navigation-->

		</div> <!-- .header -->
		</div><!-- .container-->
	</header><!-- #header -->
