<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fashionate
 */
	$sidebar_position = get_theme_mod('tx_sidebar');
	get_header();
?>

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
					<?php woocommerce_content();?>
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