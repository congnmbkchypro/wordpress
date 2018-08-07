<article id = 'post-<?php echo the_ID(); ?>'>
  <div class="entry-thumbnail">
    <?php thumbnail('thumbnail'); ?>
  </div>

  <div class="entry-header">
    <?php entry_header(); ?>
    <?php entry_meta(); ?>
  </div>

  <div class="entry-content">
    <?php entry_content(); ?>
    <?php is_single() ? entry_tag() : ''; ?>
  </div>
</article>
