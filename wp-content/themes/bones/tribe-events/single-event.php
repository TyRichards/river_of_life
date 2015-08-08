<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 * 
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @since  2.1
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); }

$event_id = get_the_ID();

?>

<div id="tribe-events-content" class="tribe-events-single">

	<p class="tribe-events-back"><a href="<?php echo tribe_get_events_link() ?>"> <?php _e( '&laquo; All Events', 'tribe-events-calendar' ) ?></a></p>

	<!-- Notices -->
	<?php tribe_events_the_notices() ?>

	<!-- Event header -->
	<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php _e( 'Event Navigation', 'tribe-events-calendar' ) ?></h3>
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '&laquo; %title%' ) ?></li>
			<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% &raquo;' ) ?></li>
		</ul><!-- .tribe-events-sub-nav -->
	</div><!-- #tribe-events-header -->

	<?php while ( have_posts() ) :  the_post(); ?>
	
		<div id="post-<?php the_ID(); ?>" <?php post_class('vevent'); ?>>
			<!-- Event featured image -->
			<?php echo tribe_event_featured_image(); ?>

			<!-- Event content -->
			<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>

				<a class="tribe-events-directions tribe-events-button" href="<?php tribe_the_map_link() ?>">Directions</a>
						
			<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
			
			<div class="social-wrapper">
				<span class="share">Share</span><?php if (function_exists('sharethis_button')) { sharethis_button(); } ?>
			</div><!-- end .social-wrapper -->
			
			<div class="tribe-events-schedule updated published tribe-clearfix">
				<?php echo tribe_events_event_recurring_info_tooltip(); ?>
			</div>
			
			<!-- Google Map -->
			
			<?php if( tribe_embed_google_map( get_the_ID() ) ) : ?>
				<?php if( tribe_address_exists( get_the_ID() ) ) { ?>
					<div class="map-wrapper"><?php tribe_the_embedded_map(); ?></div>
					<?php } ?>
			<?php endif; ?>
			
			<!-- Event Meta -->
			
			<div class="tribe-event-meta">
			
			<?php the_title( '<h2 class="tribe-events-single-event-title summary">', '</h2>' ); ?>
			
				<div class="row"><dt>Start:</dt> <dd><meta itemprop="startDate" content="<?php echo tribe_get_start_date( null, false, 'Y-m-d-h:i:s' ); ?>"/><?php echo tribe_get_start_date(); ?></dd>
				</div><!-- end .row -->
				

					<?php if (tribe_get_start_date() !== tribe_get_end_date() ) { ?>
					<div class="row">
			<dt><?php _e('End:', 'tribe-events-calendar') ?></dt>
			<dd><meta itemprop="endDate" content="<?php echo tribe_get_end_date( null, false, 'Y-m-d-h:i:s' ); ?>"/><?php echo tribe_get_end_date();  ?></dd>	
			</div><!-- end .row -->
		<?php } ?>
				
					<?php  if ( tribe_get_cost() ) :  ?>
					<div class="row">
						<dt>Cost:</dt> <dd>$<?php echo tribe_get_cost(); ?></dd>
						</div><!-- end .row -->
				  <?php endif; ?>
				
					<?php
						$terms = wp_get_post_terms(get_the_ID(), 'tribe_events_cat');
						$count = count($terms);
						
						if ( $count > 0 ) {
							
					?>
						<div class="row">
						<dt>Category:</dt>
						
					<?php
						foreach ( $terms as $term ) {
							echo '<dd>' . $term->name . '</dd>';
						}
					?>
								
						</div><!-- end .row -->	
					<?php		 
						}
					?>
				
				<?php if ( tribe_get_organizer() ) : ?>
				<div class="row">
						<dt>Organizer:</dt>
						<dd class="vcard author"><span class="fn url"><?php echo tribe_get_organizer(); ?></span></dd>
				</div><!-- end .row -->
					<?php endif; ?>
				
				<?php if( tribe_get_venue() ) : ?>
					<div class="row">
						<dt>Location:</dt>
						<dd><?php echo tribe_get_venue(get_the_ID(), true); ?></dd>
					</div>
				<?php endif; ?>
				
				<?php if ( tribe_get_organizer_phone() ) : ?>
				<div class="row">
					<dt>Phone:</dt>
					<dd><?php echo tribe_get_organizer_phone(); ?></dd>
				</div>
				<?php endif; ?>
				
				<div class="row">
					<dt>Address:</dt>
					<dd><?php echo tribe_get_address( get_the_ID() ) ?>,  <?php echo tribe_get_state( get_the_ID() ) ?>, <?php echo tribe_get_zip( get_the_ID() ); ?></dd>
				</div>
				
					<?php
						if ( tribe_get_event_website_link() ) {
					?>
						<div class="row">
							<dt>Website:</dt>
							<dd><?php echo tribe_get_event_website_link(); ?></dd>
						</div>
					<?php
						}
					?>
				
				<?php
					if ( tribe_get_custom_field('Registration URL') ) :
				?>
				
				<div class="row">
					<dd><a class="tribe-events-button" href="<?php tribe_custom_field('Registration URL'); ?>" target="_blank">Register Here</a></dd>
				</div>
				
				<?php
					endif;
				?>
				
			</div><!-- end tribe-event-meta -->

		</div><!-- .hentry .vevent -->

	<?php endwhile; ?>
	
	<div class="clear"></div>
	
	<div class="tribe-events-single-event-description tribe-events-content entry-content description">
		<?php the_content(); ?>
	</div><!-- .tribe-events-single-event-description -->

	<!-- Event footer -->
    <div id="tribe-events-footer">
		<!-- Navigation -->
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php _e( 'Event Navigation', 'tribe-events-calendar' ) ?></h3>
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '&laquo; %title%' ) ?></li>
			<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% &raquo;' ) ?></li>
		</ul><!-- .tribe-events-sub-nav -->
	</div><!-- #tribe-events-footer -->

</div><!-- #tribe-events-content -->
