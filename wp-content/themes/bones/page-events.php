<?php
/*
Template Name: Events Template
*/
?>

<?php get_header(); ?>
			
			<div class="content">
			
				<div id="inner-content" class="wrap clearfix">
			
				    <div id="main" class="first clearfix" role="main">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					    					
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
					
						    <section class="entry-content clearfix" itemprop="articleBody">
							    <?php the_content(); ?>
							  </section> <!-- end article section -->
										
					    <?php endwhile; endif; ?>
			
    				</div> <!-- end #main -->
    				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
