<?php get_header(); ?>
			
			<?php get_header(); ?>
			
			<div class="content">
			
				<div id="inner-content" class="wrap clearfix">
			
				    <div id="main" class="first clearfix" role="main">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					    
					    <header class="header-wrapper">
						    	<?php echo get_the_post_thumbnail(29, 'header-image', array('class' => 'header-image')); ?>
							    <h1 class="page-title" itemprop="headline"><?php echo get_the_title(29); ?></h1>
						    </header> <!-- end header image -->
						    
						    <div class="staff-sidebar">
							    <div class="staff-image">
								    <?php
									    if ( has_post_thumbnail() ) {
										    the_post_thumbnail('staff-single');
										  }
								    ?>
							    </div>
							    <?php
								    if (get_field('phone')) {
									?>
										<div class="staff-phone btn"><?php the_field('phone'); ?></div>
									<?php
								    }
							    ?>
							    <?php
								    if (get_field('email')) {
									?>
										<a href="mailto:<?php the_field('email'); ?>" class="staff-contact btn"><?php the_field('email'); ?></a>
									<?php 
								    }
							    ?>
							    <a href="/team" class="staff-directory btn">Team Directory</a>
							    
						    </div><!-- end staff-sidebar -->
						    
							    <div class="staff-description">
							    	<h2><?php the_title(); ?></h2>
								    <h3><?php the_field( 'title' ); ?></h3>
								    <?php the_content(); ?>
							    </div><!-- end staff-description -->
							    
							    <div class="clear"></div>
						    
						    <?php // get_sidebar(); ?>
					
					    <?php endwhile; endif; ?>
			
    				</div> <!-- end #main -->
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>