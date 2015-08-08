<?php
/*
Template Name: Ministries Template
*/
?>

<?php get_header(); ?>
			
			<div class="content">
			
				<div id="inner-content" class="wrap clearfix">
			
				    <div id="main" class="first clearfix" role="main">
						
						    <header class="header-wrapper">
						    	<?php the_post_thumbnail('header-image', array('class' => 'header-image')); ?>
							    <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
						    </header> <!-- end header image -->
						    
						    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						    
						    <div class="team-info-wrapper">
							    <div class="group-image">
								    <?php
								    	if (get_field('group_image')) {
									    	$attachment_id = get_field('group_image');
									    	$size = "series_lg"; // (thumbnail, medium, large, full or custom size)
									    	echo wp_get_attachment_image( $attachment_id, $size );
								    	}
								    ?>
							    </div><!-- end group-image -->
							    <div class="team-info"><?php the_content(); ?></div>
							    
							    <div class="clear"></div>
						    </div><!-- end .team-info-wrapper -->
								
								<?php endwhile; endif; ?>
								
								<div class="ministry-boxes">
								
								<?php
									
									// If on the connect page set the category to connect, and ministries otherwise.
									if ( $pagename == 'connect' ) {
										$category = 'connect';
									} elseif ( $pagename == 'ministries' ) {
										$category = 'ministry';
									}
								
									$args = array(
										'post_type' => 'ministries',
										'pages' => $category,
										'posts_per_page' => -1
									);
								
									$my_secondary_loop = new WP_Query( $args );
									if( $my_secondary_loop->have_posts() ):
									    while( $my_secondary_loop->have_posts() ): $my_secondary_loop->the_post();
									    
								?>
															
						    	<a href="<?php the_field('ministry_link'); ?>" class="ministry-item">
							    	<?php if ( has_post_thumbnail() ) : ?>
							    		<div class="image-wrapper">
							    			<?php the_post_thumbnail('ministry-image'); ?>
							    		</div>
							    	<?php endif; ?>
						    		<h3 class="ministry-title"><?php the_title(); ?></h3>
						    		<?php the_content(); ?>
						    	</a><!-- end .ministry-item -->
								
								<?php
									    
									    endwhile;
									endif;
									wp_reset_postdata();
								?>
								
								</div><!-- end .ministry-boxes -->
								
								<div class="clear"></div>
			
    				</div> <!-- end #main -->
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
