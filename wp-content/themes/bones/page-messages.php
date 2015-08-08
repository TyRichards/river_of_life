<?php
/*
Template Name: Messages Template
*/
?>

<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
			
				    <div id="main" class="first clearfix" role="main">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					    
					    <header class="header-wrapper">
					    	<?php the_post_thumbnail('header-image', array('class' => 'header-image')); ?>
						    <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
						  </header> <!-- end header image -->

		    <?php
			    $args = array(
						'post_type' => 'series',
						'posts_per_page' => '1'
					);
					
	        query_posts($args);
	      ?>
				      
        <?php if (have_posts()) : while (have_posts()) : the_post(); 
        	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'series_lg' ); 
					if (empty($image)) { 
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->post_parent ), 'series_lg' ); 
					}
					$postimage = $image[0];
					if (empty($postimage)) { 
						$postimage = get_bloginfo("template_url").'/library/images/video-placeholder.png'; 
					}
					
					$messagedaterough = get_field('message_date');
					if (!empty($messagedaterough)) {
						$message_timestamp = strtotime($messagedaterough);
						$messagedate = date('M j, Y', $message_timestamp);
					}
					
				?>
				
            <div id="featured-story" style="background-image: url(<?php echo $postimage; ?>);">  
            	  
                <div class="overlay">
                	<a href="<?php the_permalink(); ?>" class="banner-link">
                    <h6>Latest Message</h6>
                    <h4><?php the_title(); ?></h4>
                    <h5><?php echo $messagedate; ?></h5>
                  </a>
                  <a href="<?php the_permalink(); ?>" class="play-button">Play</a>  
                  <div class="clear"></div>
                </div><!-- end .overlay -->
                
            </div><!-- end #featured-story -->
            
        <?php endwhile; endif; wp_reset_query(); ?>
							  
							  
							  
							  
			  <div id="sidebar">
				  <?php 
					  $args = array(
							'post_type' => 'series',
							'posts_per_page' => '1',
							'post_parent' => 0
					  );
					  query_posts($args);
					  $i = 0;
					  if (have_posts()) : while (have_posts()) : the_post(); 
					  ?>  
				        <h2 class="copy-title"><?php the_title(); ?></h2>
				        <p><?php echo $post->post_content ?></p>
				        <a href="<?php the_permalink(); ?>" class="button btn">View Current Series</a>
				    <?php endwhile; endif; wp_reset_query(); ?>
				    
				    <span class="share">Share</span><?php if (function_exists('sharethis_button')) { sharethis_button(); } ?>
				    
			  </div><!-- end #sidebar -->
			  
			  <div class="clear"></div>
						    
					    <h2 class="message-title">
					    	<span>Recent Messages</span>
					    </h2>
					    
					    <div class="boxes">
						    	
						    	
					  	<?php 
					    	$args = array(
					        'post_type' => 'series',
					        'posts_per_page' => '4',
					        'post_parent' => 0,
					        'order' => DESC
					      );
					      query_posts($args);
					      $i = 0;
							  if (have_posts()) : while (have_posts()) : the_post();
						
								// Reset Date for each series
								$startdate = '';
								$enddate = '';
								
								$startdaterough = get_field('series_start');
								if (!empty($startdaterough)) {
									$start_timestamp = strtotime($startdaterough);
									$startdate = date('M j, Y', $start_timestamp);
								}
								
								$enddaterough = get_field('series_end');
								if (!empty($enddaterough)) {
									$end_timestamp = strtotime($enddaterough);
									$enddate = date('M j, Y', $end_timestamp);
								}
								
								$link = get_permalink();
                $i++;
              ?>
                
            <div class="box<?php if($i == 4) { ?> last-box<?php } ?>">
                    <h4><a href="<?php echo $link; ?>"><?php if(has_post_thumbnail()) { the_post_thumbnail('series_sm'); } else { echo '<img src="'.get_bloginfo("template_url").'/library/images/220x220.png" />'; } ?><?php the_title(); ?></a></h4>
              <h5 class="series-date"><?php echo $startdate; if (!empty($enddate)) { echo ' - ' . $enddate; } ?></h5>
            </div><!-- end .box -->
            
            <?php endwhile; endif; wp_reset_query(); ?>
            
            <div class="clear"></div>
						    	
						</div><!-- end .boxes -->
						
						
						
						<h2 id="message-archive" class="closed">
							<span>Message Archive</span>
						</h2>
						    
						    <div class="boxes archive-boxes">
						    	
						    	
					  	<?php 
					    	$args = array(
					        'post_type' => 'series',
					        'offset' => '4',
                  'posts_per_page' => -1,
                  'post_parent' => 0,
                  'order' => DESC
					      );
					      query_posts($args);
					      $i = 0;
							  if (have_posts()) : while (have_posts()) : the_post();
								
								$startdaterough = get_field('series_start');
								if (!empty($startdaterough)) {
									$start_timestamp = strtotime($startdaterough);
									$startdate = date('M j, Y', $start_timestamp);
								}
								
								$enddaterough = get_field('series_end');
								if (!empty($enddaterough)) {
									$end_timestamp = strtotime($enddaterough);
									$enddate = date('M j, Y', $end_timestamp);
								}
								
								$link = get_permalink();
                $i++;
                ?>
                
                <div class="box<?php if($i == 4) { ?> last-box<?php } ?>">
                    <h4><a href="<?php echo $link; ?>"><?php if(has_post_thumbnail()) { the_post_thumbnail('series_sm'); } else { echo '<img src="'.get_bloginfo("template_url").'/library/images/220x220.png" />'; } ?><?php the_title(); ?></a></h4>
                    <h5 class="series-date"><?php echo $startdate; if (!empty($enddate)) { echo ' - ' . $enddate; } ?></h5>
                </div><!-- end .box -->
                
            <?php endwhile; endif; wp_reset_query(); ?>
						    	
						</div><!-- end .boxes -->
	
					  <?php endwhile; endif; ?>
					  
					  <div class="clear"></div>
			
    				</div> <!-- end #main -->
    
				    <?php // get_sidebar(); ?>
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
