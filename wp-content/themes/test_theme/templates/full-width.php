<?php
/*
    Template name: Full Width
*/
?>

<?php get_header(); ?>

<div id="content">
    <section id = "main-content" class = 'full-width'>
    
    </section>
    <div class="contact-info">
        <h4>Địa chỉ liên lạc</h4>
        <p>Ghi địa chỉ vào đây</p>
        <p>090 456 765</p>
    </div>
    <div class="contact-form">
        <?php echo do_shortcode('[CONTACT FORM]'); ?>
    </div>

</div>

<?php get_footer(); ?>