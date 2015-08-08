<?php
/*
	Template Name: Online Message Template
*/
?>

<?php get_header(); ?>
			
			<div class="content">
			
				<div id="inner-content" class="wrap clearfix">
			
				    <div id="main" class="first clearfix" role="main">

					    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					    
					    <!--<iframe src="http://new.livestream.com/accounts/<?php the_field('livestream_account'); ?>/events/<?php the_field('livestream_event'); ?>/player?width=960&height=540&autoPlay=true&mute=false" width="960" height="540" frameborder="0" scrolling="no"></iframe>-->
					    
					    <div class="livefeed-wrapper">		
					    	
					    	<img class="play-image" src="<?php echo get_template_directory_uri(); ?>/library/images/placeholder.jpg" />
					    			    	
					    	<iframe class="livestream-video" src="http://new.livestream.com/accounts/<?php the_field('livestream_account'); ?>/events/<?php the_field('livestream_event'); ?>/player?width=960&height=540&autoPlay=true&mute=false" width="960" height="540" frameborder="0" scrolling="no"> </iframe>
					    	
					    </div><!-- end .livefeed-wrapper -->
						    
						    <div class="left-col">
						     
							  	<div class="sharebar">

										<div class="share-icon">
											<a class="button" href="mailto:?subject=Check Out River Of Life Online Campus&body=Join%20me%20this%20weekend%20at%20the%20River%20Of%20Life%20Online%20campus%20http://rolcc.tv/live">Invite a Friend</a>
										</div>
										
										<div class="share-icon share-icon-twitter">
										<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://rolcc.tv/live" data-text="I'm attending River Of Life's' online campus!">Tweet</a>
										<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
										</div>
										
										<div class="share-icon share-icon-facebook">
											<div class="fb-like" data-width="450" data-height="The pixel height of the plugin" data-colorscheme="light" data-layout="button_count" data-action="like" data-show-faces="true" data-send="false"></div>
										</div>
										
									</div><!-- end .sharebar -->
							    	
							    <div class="copy-wrapper">
							    
								   	<?php the_content(); ?>
								   	
								  </div><!-- end .content -->
						    
						    </div><!-- end .left-col -->
						    
						    <?php include 'sidebar-live.php'; ?>
						    
						    <div class="clear"></div>
							     
						    </div><!-- /#box-wrapper -->
					
					    <?php endwhile; endif; ?>
			
    				</div> <!-- end #main -->
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
