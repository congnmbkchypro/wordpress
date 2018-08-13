<?php get_header(); ?>
 
<div class="container">
    <div id="content">
        <section id="main-content">
            <?php
                _e('<h1>Oops! That page can’t be found.</h1>');
                _e('<p>It looks like nothing was found at this location. Maybe try a search?</p>');

                get_search_form();
            ?>
        </section>

        <?php get_sidebar(); ?>
    </div>
</div>
 
<?php get_footer(); ?>