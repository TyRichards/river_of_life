<?php
/*
Template Name: Left Sidebar Template
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
						    
						    <?php get_sidebar(); ?>
						    
						    <div class="right-col">
						    
							    	<?php 
								    	if (get_field('vimeo')) {
								    ?>
									  	<iframe class="video-wrapper" src="http://player.vimeo.com/video/<?php the_field('vimeo'); ?>" width="624" height="350" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
									  <?php
								    	} else if (get_field('youtube')) {
								    	?>
									    	<iframe class="video-wrapper" width="624" height="350" src="http://www.youtube.com/embed/<?php the_field('youtube'); ?>" frameborder="0" allowfullscreen></iframe>
									  <?php
								    	}			    	
							    	?>
							    
							    <div class="copy-wrapper">
								   	<?php the_content(); ?>
							    </div><!-- end .content -->
						    
						    </div><!-- end .left-col -->
						    
						    
							     
						    </div><!-- /#box-wrapper -->
					
					    <?php endwhile; endif; ?>
			
    				</div> <!-- end #main -->
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
