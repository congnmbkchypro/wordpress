<div class="content">
    <div class="main-content">
        <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
        <?php the_content(); ?>
        <p>Author's name: <?php the_author(); ?></p>
        <p>Tags: <?php the_tags(); ?></p>
        <p><?php the_date(); ?></p>
    </div>
</div>