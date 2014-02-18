<?php

/**
 * Header
 *
 * Displays the header
 *
 * @package WordPress
 * @subpackage reporter
 * @since reporter 1.0
 */

?>

<?php global $reporter_data; ?>

<?php

/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage reporter
 * @since reporter 1.0
 */

?>

<!DOCTYPE html>
<!--[if IE 6]> <html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]> <html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]> <html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]> <html class="ie ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8) | !(IE 9) ]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<?php // Respnsive settings ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">

	<title>
	<?php
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

	?>

	</title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php
if (is_author()) {
	$twelvewbt_author = get_queried_object();
	$google_plus = get_user_meta($twelvewbt_author, 'googleplus');
	if (!empty($google_plus)) {
		$google_plus = current($google_plus);
?>
<link rel="author" href="<?php echo(esc_attr($google_plus)); ?>" />
<?php
	}
}
unset($twelvewbt_author);
?>

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


<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.cookie.js" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/12wbt.js" type="text/javascript"></script>
<!-- Geolocation -->
<script src="//j.maxmind.com/js/apis/geoip2/v2.0/geoip2.js" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/geolocation.js" type="text/javascript"></script>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-2SPDJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-2SPDJ');</script>

</head>
<body <?php body_class(); ?>>
	
	<div class="header">
		<div class="primary-menu ">
			<div class="container">											
			<div class="top-bar-container">
				<nav class="top-bar">
					<ul class="title-area" >
						<li class="name">
						<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
						</li>          
						<li class="toggle-topbar menu-icon"><a href="#"><span><?php _e('Menu','engine'); ?></span></a></li>
					</ul>
					<section class="top-bar-section">
					<ul id="menu-main-12wbt" class="left" style="">
					<li id="" class="menu-item menu-item-type-post_type menu-item-object-page home"><a  href="https://www.12wbt.com/">Home</a></li>
					<li id="" class="menu-item menu-item-type-post_type menu-item-object-page"><a  href="https://www.12wbt.com/tour/">How it Works?</a>
					<li id="" class="menu-item menu-item-type-post_type menu-item-object-page"><a  href="https://www.12wbt.com/nutrition/">Food &amp; Nutrition</a>
					<li id="" class="menu-item menu-item-type-post_type menu-item-object-page"><a  href="https://www.12wbt.com/programs/">Fitness</a>
					<li id="" class="menu-item menu-item-type-post_type menu-item-object-page"><a  href="https://www.12wbt.com/mindset/">Mindset</a>
					<li id="" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children has-dropdown active-lock"><a  href="/tour/">Community<i class="icon-white icon-chevron-down"></i></a>
						<ul class="dropdown">
						<li id="" class="menu-item menu-item-type-post_type menu-item-object-page"><a  href="https://www.12wbt.com/success-stories/">Success Stories</a></li>
						<li id="" class="menu-item menu-item-type-post_type menu-item-object-page"><a  href="https://www.12wbt.com/blog/">Blog</a></li>
						</ul>
					</li>
					<li><a href="https://shop.12wbt.com/">Shop</a></li>
					<li><a href="https://www.12wbt.com/faq">Help</a></li>
					</ul>
					</section>
					<section >
					<ul id="nav-member">
						<li><a href="https://go.12wbt.com/login/" class="login"> Login</a></li>
						<?php if (get_option('twelvewbt_public_signups') == 'closed') { ?>
						<li><a href="https://www.12wbt.com/reserve-your-spot/" class="signup mb-btn" id="register-interest">Register Interest</a></li>
						<?php } else { ?>
						<li><a href="https://go.12wbt.com/sign-up/" class="signup mb-btn">Join Now</a></li>
						<?php } ?>
					</ul>
					</section>
				</nav>
			</div>
		</div>
		</div>		
		<!-- /.primary-menu container -->
		<div class="primary-breadcrumbs">
			<div class="container">
				<ul id="nav-breadcrumbs">
				<li class="home"><a href="https://www.12wbt.com/blog">Home</a></li>
				<li>Blog</li>
				</ul>
			</div>
		</div>
	
		<div class="header-main">
			
			<div class="container">
					
				<!-- .logo -->
				<div class="logo">						
				<h1 class="logo-text"><a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>					
				</div>
				<!-- /.logo -->


				<h2 class="tagline">Join my team and train with me online!</h2>	
				<div class="row header-main-row">				
					<?php if( is_active_sidebar('header_main_l') ) : ?>
					<div class="large-4 small-6 column header-main-menu">						
						<?php if( !isset($reporter_data['header_menu_left_title']) ) $reporter_data['header_menu_left_title'] = 'Left Title';  ?>
						<a href="#" data-dropdown="drop1" class="trigger"><?php echo $reporter_data['header_menu_left_title']; ?> <i class="icon-chevron-down"></i></a>
						<div id="drop1" class="f-dropdown content" data-dropdown-content>
							
							<ul class="large-block-grid-2 small-block-grid-1">
								<?php dynamic_sidebar('header_main_l'); ?>
							</ul>
							<!-- /.small-block-grid-1 large-block-grid-2 -->			
			
						</div>						
					</div>
					<!-- /.large-6 column -->
					<?php endif; ?>
					
					<?php if( is_active_sidebar('header_main_r') ) : ?>
					<div class="large-4 small-6 column header-main-menu">
						
						<?php if( !isset($reporter_data['header_menu_right_title']) ) $reporter_data['header_menu_right_title'] = 'Right Title';  ?>
						<a href="#" data-dropdown="drop2" class="trigger"><?php echo $reporter_data['header_menu_right_title']; ?> <i class="icon-chevron-down"></i></a>
						
						<div id="drop2" class="f-dropdown content" data-dropdown-content>
							
							<ul class="large-block-grid-2 small-block-grid-1">
								<?php dynamic_sidebar('header_main_r'); ?>
							</ul>
							<!-- /.small-block-grid-1 large-block-grid-2 -->	
						
						</div>
					
					</div>
					<!-- /.large-6 column -->
					<?php endif; ?>
					
					<div class="header-search large-4 column right" style="display:none;">
						<?php get_search_form(); ?>
					</div>
					<!-- /.header-search -->
					
				</div>
				<!-- /.row -->
				
			</div>
			<!-- /.container -->

		</div>
		<!-- /.header-main -->
		
	</div>
	<!-- /.header -->
	
	<div id="main-container" class="">
	<div class="container main">