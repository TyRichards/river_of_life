<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta name="robots" content="noindex">
		<meta charset="utf-8">
		
		<title>
		<?php
			/*if( tribe_is_month() && !is_tax() ) { // The Main Calendar Page
				echo 'Events Calendar';
			} elseif( tribe_is_month() && is_tax() ) { // Calendar Category Pages
				echo 'Events Calendar' . ' &raquo; ' . single_term_title('', false);
			} elseif( tribe_is_event() && !tribe_is_day() && !is_single() ) { // The Main Events List
				echo 'Events List';
			} elseif( tribe_is_event() && is_single() ) { // Single Events
				echo get_the_title();
			} elseif( tribe_is_day() ) { // Single Event Days
				echo 'Events on: ' . date('F j, Y', strtotime($wp_query->query_vars['eventDate']));
			} elseif( tribe_is_venue() ) { // Single Venues
				echo get_the_title();
			} else {*/
				wp_title('-', true, 'right') . ' ' . bloginfo('name');
		?>
		</title>
		
		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<!-- mobile meta (hooray!) -->
		<!--<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">-->

		<!-- icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) -->
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<!-- or, set /favicon.ico for IE10 win -->
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

  	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  	<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
  	
		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

		<!-- drop Google Analytics Here -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-44600179-1', 'rolcc.tv');
  ga('send', 'pageview');

</script>
		<!-- end analytics -->
		
		<!--[if lt IE 9]>
    	<meta http-equiv="refresh" content="0;url=https://browser-update.org/update.html" />
    <![endif]-->

	</head>

	<body <?php body_class(); ?>>


		
		<div class="bg-wrap">

		<div id="wrapper" class="container">
		
		 <!--<a href="/live"><?php dynamic_sidebar( 'Header Section' ); ?></a>-->
		 
		 <div class="watch-live"></div>
		 
		  <?php
		  	$walker = new my_nav_walker;
		  	
		  	wp_nav_menu( array(
					'menu' => 'Watch Live Menu',
					'menu_class' => 'live-menu',
					'walker' => $walker
				));
		  ?> 

			<header class="header" role="banner">

				<div id="inner-header" class="wrap clearfix">

					<!-- to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> -->
					<a class="logo" href="<?php echo home_url(); ?>">
						<?php if ( function_exists( 'ot_get_option' ) ) : ?>
						<?php $logo = ot_get_option( 'theme_logo' ); ?>
							<img src="<?php echo $logo; ?>" />
						<?php endif; ?>
					</a>

					<!-- if you'd like to use the site description you can un-comment it below -->
					<?php // bloginfo('description'); ?>


					<nav id="top-nav" role="navigation">
						<?php bones_main_nav(); ?>
					</nav>
					
					<div class="clear"></div>

				</div> <!-- end #inner-header -->

			</header> <!-- end header -->

			