<?php
/*
Template Name: Team Template
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
						    </div>
						    
						    <?php
						    	 // Get Taxonomy Terms
						    	 $terms = get_terms('Team Categories');
									 $count = count($terms);
									 
									 // Loop through the names
									 if ( $count > 0 ){
									     foreach ( $terms as $term ) {
									       echo "<h1 class='category-title'><span>" . $term->name . "</span></h1>";
									       
									       // Get all team members under this category
									       $args = array(
									       	'post_type' => 'team',
									       	'Team Categories' => $term->slug
									       );
									       
									       query_posts($args);
									       $i = 0;
									       if (have_posts()) : while (have_posts()) : the_post();
									       ?>
									       
									       <?php
									       	if ( $i%4 == 0 ) {
														echo $i > 0 ? "</div>" : ""; // close div if it's not the first
														echo "<div class='team-row'>";
													}
									       ?>
									       
									       	<a href="<?php the_permalink(); ?>" <?php rol_post_class(); ?> id="member-<?php echo $i; ?>">
											      <?php the_post_thumbnail('rol-thumb-225', array('class' => 'member-image')); ?>
										       	<div class="member-title"><?php the_title(); ?></div>
										       	<?php
											       	if ( get_field('title') ) {
												    ?>
												    	<div class="member-position"><?php the_field('title'); ?></div>
												    <?php
											       	}
										       	?>
									       	</a>
									       	
									       	<?php
										      $i++;
									        endwhile; endif; wp_reset_query();
									       ?>
									       	<div class="clear"></div>
												 	</div>
									       <?php
									     }
									 }							
								?>
								
								<?php endwhile; endif; ?>
			
    				</div> <!-- end #main -->
    
				    <?php // get_sidebar(); ?>
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
