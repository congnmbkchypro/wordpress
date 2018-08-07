<?php $sidebar_position = get_theme_mod('tx_sidebar', 'right'); ?>


<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fashionate
 */

get_header(); ?>
    <div class="pt-50"></div>


    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 archive-title">
                        <header class="entry-header shadow-box">
                            <?php
                            the_archive_title( '<h1 class="entry-title tx-title">', '</h1>' );
                            ?>
                    </div>
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
                            if (have_posts()) : ?>


                                <?php
                                /* Start the Loop */
                                while (have_posts()) : the_post();

                                    /*
                                     * Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
                                    get_template_part('template-parts/content', get_post_format());

                                endwhile;
                                ?>

                                <div class="col-sm-offset-4 col-sm-8">
                                     <?php the_posts_pagination(); ?>
                                </div>


                                <?php

                            else :

                                get_template_part('template-parts/content', 'none');


                            endif; ?>
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