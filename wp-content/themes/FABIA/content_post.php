<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
<!-- <?php the_content(); ?> -->
<?php
    if (is_category() || is_archive()) {
        the_excerpt();
    } else {
        the_content();
    }
?>
