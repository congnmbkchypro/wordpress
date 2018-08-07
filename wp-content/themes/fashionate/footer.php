<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fashionate
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">




			<div class="container">
				<div class="row footer-bootom">
					<div class=" col-sm-6">

						<p class="gl-copy-right">
							<span class="copyright">
								<?php
								echo get_theme_mod('tx_footer_message');
								?>
							</span>
							<?php esc_html_e('Fashionate Fashion Blog WordPress Theme', 'fashionate');?>
							
							<?php esc_html_e('bought you by', 'fashionate');?> <a href="https://www.themexpert.com"><?php esc_html_e('ThemeXpert', 'fashionate');?></a>
						</p>
						
					</div>
					<div class="col-sm-6">
						<?php
						$tx_facebook_url = get_theme_mod('tx_facebook');
						$tx_twitter_url =  get_theme_mod('tx_twitter');
						$tx_google_url = get_theme_mod('tx_google');
						$tx_linked_url = get_theme_mod('tx_linkedin');;

						?>

						<ul class="text-right social-menu" >
							<?php if($tx_facebook_url): ?>
								<li><a target="_blank" href="<?php echo esc_url ( $tx_facebook_url);?>"><i class="fa fa-lg fa-facebook"></i></a></li>
							<?php endif; ?>
							<?php if($tx_twitter_url): ?>
								<li><a target="_blank" href="<?php echo esc_url ( $tx_twitter_url);?>"><i class="fa fa-lg fa-twitter"></i></a></li>
							<?php endif; ?>
							<?php if($tx_google_url): ?>
								<li><a target="_blank" href="<?php echo esc_url ( $tx_google_url);?>"><i class="fa fa-lg fa-google-plus"></i></a></li>
							<?php endif; ?>
							<?php if($tx_linked_url): ?>
								<li><a target="_blank" href="<?php echo esc_url ( $tx_linked_url);?>"><i class="fa fa-lg fa-linkedin"></i></a></li>
							<?php endif; ?>
						</ul>

					</div>

				</div>
			</div>


		</div><!-- .site-info -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
