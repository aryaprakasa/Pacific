<?php
/**
 * Displays the footer
 * - Displays widget areas
 * - Displays optional bottom menu bar
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer el-row" role="contentinfo">
		<div class="site-info el-row inner small-padding-top-bottom-medium">
			<?php
			//get sidebars if applicable
			if(is_active_sidebar('widget-footer-1')){
				echo '<section class="el-col-small-12 el-col-medium-4 widget-area">';
					dynamic_sidebar('widget-footer-1');
				echo '</section>';
			}
			if(is_active_sidebar('widget-footer-2')){
				echo '<section class="el-col-small-12 el-col-medium-4 widget-area">';
					dynamic_sidebar('widget-footer-2');
				echo '</section>';
			}
			if(is_active_sidebar('widget-footer-3')){
				echo '<section class="el-col-small-12 el-col-medium-4 widget-area">';
					dynamic_sidebar('widget-footer-3');
				echo '</section>';
			}
			?>
			<div class="menu-inner el-col-small-12 medium-margin-top-large">
				<?php
				
				
				?>
				<?php 
					//display menu if set
					if(has_nav_menu('footer')){
						
						$menu_args = array(
							'theme_location' 	=> 'secondary', 
							'menu_id' 			=> 'footer-menu', 
							'container_class'	=> 'nav-menu'
							
						);
						
						wp_nav_menu( $menu_args );
					}
				
				 ?>
			</div>
			
			<div class="attribution el-col-small-12">
				<p>
					<a href="//elevate360.com.au/">Proudly powered by WordPress | Pacific by Elevate</a>
				</p>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>