<div class="moove-donation-box-wrapper">
    <div class="moove-donation-box">
        <div class="notice-dismiss">Dismiss</div>
        <h3>Donations</h3>

        <p>
            If you enjoy using this plugin and find it useful, feel free to donate a small amount to show appreciation and help us continue improving and supporting this plugin for free. It will make our development team very happy! :)
        </p>

        <p>
            Click the 'Donate' button and you will be redirected to Paypal where you can make your donation. You don't need to have a Paypal account, you can make donation using your credit card.
        </p>

        <p>
            Many thanks.
        </p>

        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="84Z843VMHAFTE">
            <input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
        </form>
        <script>
            jQuery(document).ready(function ($) {
                $('.moove-donation-box .notice-dismiss').on('click', function () {
                    $(this).closest('.moove-donation-box-wrapper').slideUp();
                });
            });
        </script>
    </div>
</div>

<div class="wrap moove-taxonomy-settings-plugin-wrap">
	<h1><?php _e('Taxonomy Buttons - Plugin Settings','moove'); ?></h1>
    <?php
        $current_tab = isset( $_GET['tab'] ) ? sanitize_text_field( wp_unslash( $_GET['tab'] ) ) : '';
        if( isset( $current_tab ) &&  $current_tab !== '' ) {
            $active_tab = $current_tab;
        } else {
            $active_tab = "post_type_radioselect";
        } // end if
    ?>
    <h2 class="nav-tab-wrapper">
        <a href="?page=moove-taxonomy-settings&tab=post_type_radioselect" class="nav-tab <?php echo $active_tab == 'post_type_radioselect' ? 'nav-tab-active' : ''; ?>">
            <?php _e('Plugin Settings','moove'); ?>
        </a>

        <a href="?page=moove-taxonomy-settings&tab=plugin_documentation" class="nav-tab <?php echo $active_tab == 'plugin_documentation' ? 'nav-tab-active' : ''; ?>">
            <?php _e('Documentation','moove'); ?>
        </a>
    </h2>
    <div class="moove-form-container <?php echo $active_tab; ?>">
        <a href="http://mooveagency.com" target="blank" title="WordPress agency"><span class="moove-logo"></span></a>
        <?php
        if( $active_tab == 'post_type_radioselect' ) : ?>
            <form action="options.php" method="post" class="moove-taxonomy-settings-form">
                <?php
                settings_fields( 'moove_radio_select' );
                do_settings_sections( 'moove-taxonomy-settings' );
                echo "<hr>";
                submit_button();
                ?>
            </form>
        <?php elseif( $active_tab == 'plugin_documentation' ): ?>
            <?php echo Moove_Radioselect_View::load( 'moove.admin.settings.documentation' , true ); ?>
        <?php endif; ?>
    </div>
    <!-- moove-form-container -->
</div>
<!-- wrap -->