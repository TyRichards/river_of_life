<?php
/**
 * Month View Template
 * The wrapper template for month view. 
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month.php
 *
 * @package TribeEventsCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); } ?>

<?php do_action( 'tribe_events_before_template' ) ?>

<!-- Tribe Bar -->
<?php // tribe_get_template_part( 'modules/bar' ); ?>

<?php
	
	$args = array('pagename' => 'events'); // Query the Events Page

	$my_secondary_loop = new WP_Query( $args );
	if( $my_secondary_loop->have_posts() ):
	    while( $my_secondary_loop->have_posts() ): $my_secondary_loop->the_post();
	    
?>

<header class="header-wrapper">
	<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail('header-image', array('class' => 'header-image'));
		} else {
	?>
			<img class="header-image wp-post-image" width="944" height="244" src="<?php echo get_template_directory_uri(); ?>/library/images/header-placeholder.jpg" alt="<?php the_title(); ?>" />
	<?php
		}
	 ?>
	 
	<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
</header> <!-- end header image -->

<?php
	    
	    endwhile;
	endif;
	wp_reset_postdata();
	/* End WP Query */
?>

<!-- Main Events Content -->
<?php tribe_get_template_part('month/content'); ?>

<?php do_action( 'tribe_events_after_template' ) ?>
