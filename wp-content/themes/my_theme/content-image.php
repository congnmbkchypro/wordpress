<div class="content">
    <div class="main-content">
        <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
        <?php the_content(); ?>
        <span class="author">Author's name: <?php the_author(); ?></span>
        <span class="date-published"><p><?php the_date(); ?></p></span>
        <span class="category">Category: <?php echo get_the_category_list(); ?></span>
        <?php
        printf( __('<span class="author">Posted by %1$s</span>'),
        get_the_author() );

        printf( __('<span class="date-published"> at %1$s</span>'),
        get_the_date() );

        printf( __('<span class="category"> in %1$s</span>'),
        get_the_category_list( ', ' ) );        
        ?>        
    </div>
</div>