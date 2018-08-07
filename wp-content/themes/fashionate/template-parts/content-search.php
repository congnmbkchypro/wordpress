<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fashionate
 */

?>
<div class="single-blog">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="entry-content">
			<?php

			if (is_single()) {
				?>

				<?php if (has_post_thumbnail()): ?>
					<div class="post-image">
						<?php


						the_post_thumbnail();

						?>
					</div>
				<?php endif; ?>
				<div class="shadow-box">
					<div class="entry-header">
						<?php

						the_title('<h1 class="entry-title tx-title">', '</h1>');

						if ('post' === get_post_type()) : ?>
							<div class="entry-meta">
								<?php fashionate_posted_on(); ?>
							</div><!-- .entry-meta -->
							<?php
						endif; ?>
					</div><!-- .entry-header -->

					<div class="blog-content">
						<?php
						the_content();
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fashionate' ),
							'after'  => '</div>',
						) );
						?>
					</div>
				</div>
				<?php
			} else {
				// check if the post has a Post Thumbnail assigned to it.
				?>
				<?php if (has_post_thumbnail()): ?>
					<a href="<?php echo get_the_permalink(); ?>">
						<div class="post-image">
							<?php

							the_post_thumbnail();

							?>
						</div>
					</a>
				<?php endif; ?>

				<div class="shadow-box">
					<div class="entry-header">
						<?php

						the_title('<h2 class="entry-title tx-title"><a class="tx-link" href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');

						if ('post' === get_post_type()) : ?>
							<div class="entry-meta">
								<?php fashionate_posted_on(); ?>
							</div><!-- .entry-meta -->
							<?php
						endif; ?>
					</div><!-- .entry-header -->
					<div class="blog-content">
						<?php
						the_excerpt();
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fashionate' ),
							'after'  => '</div>',
						) );
						?>

						<div class="post-link">
							<a class="tx-link read-more btn" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'fashionate');?></a>

						</div><!--end of post-link-->
					</div>
				</div>


				<?php

			}
			?>


		</div><!-- .entry-content -->


	</article><!-- #post-## -->

</div>
