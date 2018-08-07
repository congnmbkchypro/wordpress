<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package fashionate
 */

get_header(); ?>

	<div id="primary" class="content-area page-404">

		<div id="main" class="site-main" role="main">
			<div class="container">
				<section class="error-404">
					<h1 class="page-title"><?php esc_html_e( '404', 'fashionate' ); ?></h1>
					<p class="error-meesage"><?php esc_html_e('Something Went Wrong :(', 'fashionate');?></p>

					<div class="page-content">
						<h5><?php esc_html_e( 'Sorry, the page could not be found', 'fashionate' ); ?></h5>
						<p><?php esc_html_e( 'Can\'t find what you need? Take a moment and do a search below or start from our homepage.', 'fashionate' ); ?></p>

						<?php
						get_search_form();

						?>
						<a class="read-more tx-link" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Go Home', 'fashionate');?></a>

					</div><!-- .page-content -->
				</section><!-- .error-404 -->
			</div>


		</div><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();