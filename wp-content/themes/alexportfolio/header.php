<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage alexportfolio
 * @since alexportfolio 1.0
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<title><?php wp_title('|', true, 'right'); ?></title>

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="57x57" href="/wp-content/themes/alexportfolio/images/favicons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/wp-content/themes/alexportfolio/images/favicons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/wp-content/themes/alexportfolio/images/favicons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/wp-content/themes/alexportfolio/images/favicons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/wp-content/themes/alexportfolio/images/favicons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/wp-content/themes/alexportfolio/images/favicons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/wp-content/themes/alexportfolio/images/favicons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/wp-content/themes/alexportfolio/images/favicons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/wp-content/themes/alexportfolio/images/favicons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/wp-content/themes/alexportfolio/images/favicons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/wp-content/themes/alexportfolio/images/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/wp-content/themes/alexportfolio/images/favicons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/wp-content/themes/alexportfolio/images/favicons/favicon-16x16.png">
	<link rel="manifest" href="/wp-content/themes/alexportfolio/images/favicons/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/wp-content/themes/alexportfolio/images/favicons/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!-- End Favicon -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<nav class="navbar navbar-default">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	    	<label>MENU</label>
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Tjok.ro</a>
	    </div><!-- .navbar-header -->

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="main-menu">
	      <?php
	      	$nav_args = array(
	      		'theme_location' => 'main_menu',
		    		'container' => 'div',
		    		'container_class' => 'navbar-nav-container',
		    		'menu_class' => 'nav navbar-nav'
	      	);
	      	wp_nav_menu($nav_args);
	      ?>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container -->
	</nav>
	