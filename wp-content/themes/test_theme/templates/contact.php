<?php
/*
    Template name: Contact
*/    
?>

<?php get_header(); ?>

<div id="content">
    <div class="contact-info">
        <h4>Địa chỉ liên lạc</h4>
        <p>Ghi địa chỉ vào đây</p>
        <p>090 456 765</p>
    </div>
    <div class="contact-form">
        <?php echo do_shortcode('[CONTACT FORM]'); ?>
    </div>

    <div class="sidebar">
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>