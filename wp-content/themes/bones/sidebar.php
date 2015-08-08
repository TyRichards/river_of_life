<div id="sidebar" class="sidebar fourcol last clearfix" role="complementary">

	<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>
	
	<?php if ( $pagename == 'live' ) {
	?>
		
			<span class="share">Share</span><?php if (function_exists('sharethis_button')) { sharethis_button(); } ?>
		
			<h1><?php the_title(); ?></h1>
						
	<?php
		} else {
	?>
		<span class="share">Share</span><?php if (function_exists('sharethis_button')) { sharethis_button(); } ?>
	<?php
		}
	?>
			
		<?php dynamic_sidebar( 'sidebar1' ); ?>
	
	<?php endif; ?>

</div>