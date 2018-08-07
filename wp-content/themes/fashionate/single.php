<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fashionate
 */

get_header();

?>
<div class="pt-30"></div>

<?php $sidebar_position = get_theme_mod('tx_sidebar', 'right'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">

					<?php if ('left' == $sidebar_position): ?>
						<div class="col-md-4">
							<?php get_sidebar(); ?>
						</div>
					<?php endif; ?>
					<?php if ('no-sidebar' == $sidebar_position): ?>
					<div class="col-md-12">
						<?php else: ?>
						<div class="col-md-8">
							<?php endif; ?>
							<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content', 'single');
								?>
								<ul class="pager">
									<li class="pull-left prev-post">
										<?php previous_post_link('%link'); ?> 
									</li>
									<li class="pull-right next-post">
										<?php next_post_link('%link'); ?> 
									</li>
								</ul>
								
								<?php


							

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
							?>
						</div>

						<?php if ('right' == $sidebar_position): ?>
							<div class="col-md-4">
								<?php get_sidebar(); ?>
							</div>
						<?php endif; ?>

					</div>
				</div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();