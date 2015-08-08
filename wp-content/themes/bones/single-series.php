<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post();

$postparent = $post->post_parent;

if($postparent == 0) {
?>
<div id="copy" class="series-wrapper">
		<div class="series-image">
        <?php if(has_post_thumbnail()) { the_post_thumbnail('series_lg'); } else { echo '<img src="'.get_bloginfo("template_url").'/images/300x300.png" class="attachment-series_md" />'; } ?>
		</div><!-- end series-image -->
        
    <div id="sidebar">                    
        <h2 class="copy-title"><?php the_title(); ?></h2>
        <?php the_content(); ?>
        
        <span class="share">Share</span><?php if (function_exists('sharethis_button')) { sharethis_button(); } ?>
        
    </div><!-- end #sidebar -->
</div> <!-- end copy -->

<div class="clear"></div>

<?php } else { ?>

<div id="copy" class="messages">
<?php 
        $vimeo = get_field('vimeo_video_id');
        $youtube = get_field('youtube_video_id');
        $livestream_event_id = get_field('livestream_event_id');
        $livestream_video_id = get_field('livestream_video_id');
        
        // If the event ID wasn't provided lets set a default
        if ( empty($livestream_event_id) ) {
	        $livestream_event_id = 2540484;
        }
        
        if( !empty($livestream_event_id) && !empty($livestream_video_id) ) { ?>
        
        <iframe class="livestream-player video-wrapper" src="http://new.livestream.com/accounts/5945224/events/<?php echo $livestream_event_id; ?>/videos/<?php echo $livestream_video_id; ?>/player?autoPlay=false&height=350&mute=false&width=620" width="620" height="350" frameborder="0" scrolling="no"></iframe>
        
        <?php } else if ( !empty($youtube) ) { ?>
        
        <iframe class="youtube-player video-wrapper" type="text/html" width="620" height="350" src="http://www.youtube.com/embed/<?php echo $youtube; ?>" frameborder="0"></iframe>
        
        <?php } else if ( !empty($vimeo) ) { ?>
        
        <iframe class="video-wrapper" src="http://player.vimeo.com/video/<?php echo $vimeo; ?>" width="620" height="350" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
        
        <?php } ?>
</div> <!-- end copy -->

<div id="sidebar">
	<h2 class="copy-title"><?php the_title(); ?></h2>
	<?php the_content(); ?>
	
	<span class="share">Share</span><?php if (function_exists('sharethis_button')) { sharethis_button(); } ?>
	
</div>

<div class="clear"></div>

<?php }
endwhile; endif; wp_reset_query(); ?>

<?php 
if($postparent == 0) {
$args = array(
	'post_type' => 'series',
	'post_parent' => $post->ID,
	'order' => ASC
	);
} else { 
$args = array(
	'post_type' => 'series',
	'post_parent' => $postparent,
	'order' => 'ASC', 
	'post__not_in' => array( $post->ID )
	);
}
query_posts($args);
if (have_posts()) : ?>
<div class="boxy">
    <div class="boxes boxes-quad">
        <h2 class="message-title">
        	<span>Messages</span>
        </h2>
			<?php
        $i = 0;
        while (have_posts()) : the_post(); 
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'series_sm' ); 
				if (empty($image)) { 
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->post_parent ), 'series_sm' ); 					
				}		
				$postimage = $image[0];
				if (empty($postimage)) { 
					$postimage = get_bloginfo("template_url").'/images/220x125.png'; 
					}
                $i++; 
				$messagedate = '';
				$messagedaterough = get_field('message_date');
					if (!empty($messagedaterough)) {
						$message_timestamp = strtotime($messagedaterough);
						$messagedate = date('M j, Y', $message_timestamp);
					}
				?> 
                <div class="box<?php if($i == 4) { ?> last-box<?php } ?>" >
                    <h4><a href="<?php the_permalink(); ?>"><img src="<?php echo $postimage; ?>" class="wp-post-image" /><?php the_title(); ?></a></h4>
                    <h5 class="series-date"><?php echo $messagedate; ?></h5>
                </div>
            <?php endwhile; ?>   
    </div> <!-- /boxes -->    
</div> <!-- /boxy -->
<?php endif; wp_reset_query(); ?>

<div class="clear"></div>

<?php
	
	if ( $postparent == 0 ) {
	// If series page go to messages
?>
	<a class="button back" href="/messages">< Back</a>
<?php
	} else {
	// If series single go back to series main
?>
	<a class="button back" href="../">< Back</a>
<?php
	}
?>

<?php get_footer(); ?>