<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fashionate
 */

?>
<div class="single-blog format-video">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="content-wrapper">
			<div class="entry-video">
				<?php the_content(); ?>
			</div>
                  <?php if(is_sticky()): ?>
                      <div class="triangle">
                          <span><i class="icon fa fa-heart"></i></span>
                      </div>
                <?php endif; ?>

		<div class="shadow-box">
			<div class="blog-content">
				
					<div class="entry-header pl-0">
						<?php
							the_title( '<h2 class="entry-title tx-title"><a class="tx-link" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

						if ( 'post' === get_post_type() ) : ?>
							<div class="entry-meta">
								<?php fashionate_posted_on(); ?>
							</div><!-- .entry-meta -->
							<?php
						endif; ?>	
						
					</div><!-- .entry-header -->
				<div class="post-link pull-left">
					<a class="tx-link read-more btn" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'fashionate');?></a>

				</div><!--end of post-link-->
			    	<div class="edit">  
                        <?php
                            edit_post_link(
                                sprintf(
                                    /* translators: %s: Name of current post */
                                    esc_html__( 'Edit %s', 'fashionate' ),
                                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                ),
                                '<span class="edit-link">',
                                '</span>'
                            );
                        ?>
                    </div>
				</div>
			</div><!-- .entry-content -->
		</div>
		
	</article><!-- #post-## -->

</div>
