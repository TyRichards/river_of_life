<div class="clear"></div>
</div> <!-- end .container -->

</div><!-- end .bg-wrap -->

<?php
	// Show footer gradient on all pages but the homepage (because of image)
	if ( !is_page('home') ) {
?>
	<div class="footer-gradient"></div>
<?php
	}
?>

	<footer class="sub-footer">
	
	<div class="container">
		
		<div class="col-4 first">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Our Service Times') ) : ?>
			<?php endif; ?>
		</div><!-- end .col-4 -->
		
		<div class="col-4">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Menu 1') ) : ?>
			<?php endif; ?>
		</div><!-- end .col-4 -->
		
		<div class="col-4 last">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Menu 2') ) : ?>
			<?php endif; ?>
		</div><!-- end .col-4 -->
		
		<div class="clear"></div>
		
		<div class="morefoot">
			
			<div class="footer-logo"></div>
			<div class="divider"></div>
			
			<div id="social">
				<ul>
					<li><a href="<?php echo ot_get_option( 'facebook_url' ); ?>" class="facebook-icon" target="_blank"></a></li>
					<li><a href="http://www.twitter.com/<?php echo ot_get_option( 'twitter_username' ); ?>" class="twitter-icon" target="_blank"></a></li>
					<li><a href="http://www.instagram.com/<?php echo ot_get_option( 'instagram_username' ); ?>" class="instagram-icon" target="_blank"></a></li>
					<li><a href="<?php echo ot_get_option( 'vimeo_url' ); ?>" class="vimeo-icon" target="_blank"></a></li>
					<li><a href="mailto:<?php echo ot_get_option( 'email_address' ); ?>" class="email-icon"></a></li>
				</ul>
			</div><!-- end #social -->
		
		</div><!-- end .morefoot -->
		
		<div class="clear"></div>
		
		<div class="footer-info">
			<!--<div class="source-org copyright">&copy; 2013 <?php bloginfo('name'); ?></div>-->
			
			<?php wp_nav_menu( array('menu' => 'Footer Menu' )); ?>
		
			<!--<a class="paradox-logo" href="http://www.paradoxsites.com"></a>-->
		</div><!-- end .footer-info -->
		
		<div class="clear"></div>
		
	</div><!-- end container -->
	
	</footer><!-- end .sub-footer -->
	
	
	
	
			
			<div id="subnavigation">
			
				<div id="nav-im-new" class="subnav-menu">
					<div class="content">
						<h4>I'm New</h4>
						<p>
						<?php if ( function_exists( 'ot_get_option' ) ) {
							echo ot_get_option( 'im_new_menu_text' );
						} ?>
						</p>
						
						<?php wp_nav_menu( array('menu' => 'I\'m New Menu' )); ?>
					</div>
				</div><!-- end #nav-im-new -->
				
				<div id="nav-mission" class="subnav-menu">
					<div class="content">
						<h4>About Us</h4>
						<p>
						<?php if ( function_exists( 'ot_get_option' ) ) {
							echo ot_get_option( 'mission_menu_text' );
						} ?>
						</p>
						
						<?php wp_nav_menu( array('menu' => 'About Us Menu' )); ?>
					</div>
				</div><!-- end #nav-mission -->
				
				<div id="nav-connect" class="subnav-menu">
					<div class="content">
						<h4>Connect</h4>
						<p>
						<?php if ( function_exists( 'ot_get_option' ) ) {
							echo ot_get_option( 'connect_menu_text' );
						} ?>
						</p>
						
						<?php wp_nav_menu( array('menu' => 'Connect Menu' )); ?>
					</div>
				</div><!-- end #nav-connect -->
				
				<div id="nav-messages" class="subnav-menu">
					<div class="content">
						<h4>Messages</h4>
						<p>
						<?php if ( function_exists( 'ot_get_option' ) ) {
							echo ot_get_option( 'messages_menu_text' );
						} ?>
						</p>
						
						<?php wp_nav_menu( array('menu' => 'Messages Menu' )); ?>
					</div>
				</div><!-- end #nav-messages -->
				
				<div id="nav-give" class="subnav-menu">
					<div class="content">
						<h4>Give</h4>
						<p>
						<?php if ( function_exists( 'ot_get_option' ) ) {
							echo ot_get_option( 'give_menu_text' );
						} ?>
						</p>
						
						<?php wp_nav_menu( array('menu' => 'Give Menu' )); ?>
					</div>
				</div><!-- end #nav-give -->
				
			</div><!-- end #subnavigation -->
		
		<!-- all js scripts are loaded in library/bones.php -->
		<?php wp_footer(); ?>
		
		<!-- Facebook JS -->
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=520260274690038";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>

	</body>

</html> <!-- end page. what a ride! -->
