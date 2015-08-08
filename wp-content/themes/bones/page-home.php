<?php
/*
Template Name: Homepage Template
*/
?>

<?php get_header(); ?>
			
			<div class="content">
			
				<div id="inner-content" class="wrap clearfix">
			
				    <div id="main" class="first clearfix" role="main">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						    <header class="article-header">
							    <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
						    </header> <!-- end article header -->
						    
						    <?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow(); } ?>
						    
						    <div class="home-separator"></div>
						    
						    <div id="box-wrapper">
						    
						    <?php
					        $args = array(
						        'post_type' => 'boxes',
						        'box-pages' => 'homepage',
						        'orderby' => 'menu_order',
						        'order' => 'ASC'
					        );
					        
					        query_posts($args);
					        if (have_posts()) : 
					      ?>
									<?php while (have_posts()) : the_post(); ?>
										
										<?php
											$attachment_id = get_field('image');
											$size = "boxes-thumb-225";
										?>
										 
							        <a href="<?php the_field('link'); ?>" <?php rol_post_class(); ?>>
							        	<?php echo wp_get_attachment_image($attachment_id, $size); ?>
					              <h2 class="box-title"><?php the_title(); ?></h2>
							        </a>
							            
							     <?php endwhile;  ?>
							     <?php endif; wp_reset_query(); ?>
							     
						    </div><!-- /#box-wrapper -->
					
					    </article> <!-- end article -->
					
					    <?php endwhile; endif; ?>
			
    				</div> <!-- end #main -->
    
				    <?php // get_sidebar(); ?>
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
