<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package fashionate
 */

get_header(); ?>
<?php $sidebar_position = get_theme_mod('tx_sidebar', 'right'); ?>
    <section id="primary" class="content-area">
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
                            if (have_posts()) : ?>

                                <header class="page-header">
                                    <h1 class="page-title"><?php printf(esc_html__('Search Results for: %s', 'fashionate'), '<span>' . get_search_query() . '</span>'); ?></h1>
                                </header><!-- .page-header -->

                                <?php
                                /* Start the Loop */
                                while (have_posts()) : the_post();

                                    /**
                                     * Run the loop for the search to output the results.
                                     * If you want to overload this in a child theme then include a file
                                     * called content-search.php and that will be used instead.
                                     */
                                    get_template_part('template-parts/content', 'search');

                                endwhile;

                                ?>

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
    </section><!-- #primary -->

<?php

get_footer();