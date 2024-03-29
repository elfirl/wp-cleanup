<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/elfirl/
 * @since      1.0.0
 *
 * @package    Rr_Wp_Cbf
 * @subpackage Rr_Wp_Cbf/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h2 class="nav-tab-wrapper">Clean Up</h2>

    <form method="post" name="cleanup_options" action="options.php">

    <?php 
        // Grab all options
        $options = get_option( $this->plugin_name );

        // Cleanup
        $cleanup = $options['cleanup'];
        $comments_css_cleanup = $options['comments_css_cleanup'];
        $gallery_css_cleanup = $options['gallery_css_cleanup'];
        $body_class_slug = $options['body_class_slug'];
        $jquery_cdn = $options['jquery_cdn'];
        $cdn_provider = $options['cdn_provider'];
        $login_logo = wp_get_attachment_image_src( $login_logo_id, 'thumbnail' );
        $login_logo_url = $login_logo[0];
    ?>

    <?php
        settings_fields( $this->plugin_name );
        do_settings_sections( $this->plugin_name );
    ?>

        <!-- Remove some meta and generators from the <head> -->
        <fieldset>
            <legend class="screen-reader-text"><span>Clean WordPress head section</span></legend>
            <label for="<?php echo $this->plugin_name; ?>-cleanup">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-cleanup" name="<?php echo $this->plugin_name; ?>[cleanup]" value="1" <?php checked($cleanup, 1); ?> />
                <span><?php esc_attr_e('Clean up the head section', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <!-- Remove injected CSS from comments widgets -->
        <fieldset>
            <legend class="screen-reader-text"><span>Remove Injected CSS for comment widget</span></legend>
            <label for="<?php echo $this->plugin_name; ?>-comments_css_cleanup">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-comments_css_cleanup" name="<?php echo $this->plugin_name; ?>[comments_css_cleanup]" value="1"  <?php checked($comments_css_cleanup, 1); ?> />
                <span><?php esc_attr_e('Remove Injected CSS for comment widget', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <!-- Remove injected CSS from gallery -->
        <fieldset>
            <legend class="screen-reader-text"><span>Remove Injected CSS for galleries</span></legend>
            <label for="<?php echo $this->plugin_name; ?>-gallery_css_cleanup">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-gallery_css_cleanup" name="<?php echo $this->plugin_name; ?>[gallery_css_cleanup]" value="1"  <?php checked($gallery_css_cleanup, 1); ?> />
                <span><?php esc_attr_e('Remove Injected CSS for galleries', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <!-- Add post, page, or product slug class to body class -->
        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Add Post, page, or product slug to body class', $this->plugin_name); ?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-body_class_slug">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-body_class_slug" name="<?php echo $this->plugin_name; ?>[body_class_slug]" value="1"  <?php checked($body_class_slug, 1); ?> />
                <span><?php esc_attr_e('Add Post slug to body class', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <!-- Load jQuery from CDN -->
        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Load jQuery from CDN instead of the basic WordPress script', $this->plugin_name); ?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-jquery_cdn">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-jquery_cdn" name="<?php echo $this->plugin_name; ?>[jquery_cdn]" value="1"  <?php checked($jquery_cdn, 1); ?> />
                <span><?php esc_attr_e('Load jQuery from CDN', $this->plugin_name); ?></span>
            </label>
            <fieldset>
                <p>You can choose your own CDN provider and jQuery version (default will be Google CDN and version 1.11.1) - Recommended CDNs are <a href="https://cdnjs.com/libraries/jquery">CDNjs</a>, <a href="https://code.jquery.com/">jQuery Official CDN</a>, <a href="https://developers.google.com/speed/libraries/#jquery">Google CDN</a> and <a href="http://www.asp.net/ajax/cdn#jQuery_Releases_on_the_CDN_0">Microsoft CDN</a></p>
                <legend class="screen-reader-text"><span><?php _e('Choose your preferred CDN provider', $this->plugin_name); ?></span></legend>
                <input type="url" class="regular-text" id="<?php echo $this->plugin_name; ?>-cdn_provider" name="<?php echo $this->plugin_name; ?>[cdn_provider]" value="<?php if(!empty($cdn_provider)) echo $cdn_provider; ?>" />
            </fieldset>
        </fieldset>

        <!-- Login page customizations -->
        <h2 class="nav-tab-wrapper"><?php _e('Login customization', $this->plugin_name); ?></h2>

        <p><?php _e('Add logo to login form change buttons and background color', $this->plugin_name); ?></p>

        <!-- Add your logo to the login -->
        <fieldset>
            <legend class="screen-reader-text"><span><?php esc_attr_e('Login Logo', $this->plugin_name); ?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-login_logo">
                <input type="hidden" id="login_logo_id" name="<?php echo $this->plugin_name; ?>[login_logo_id]" value="<?php echo $login_logo_id; ?>" />
                <input id="upload_login_logo_button" type="button" class="button" value="<?php _e( 'Upload Logo', $this->plugin_name ); ?>" />
                <span><?php esc_attr_e( 'Login Logo', $this->plugin_name ); ?></span>
            </label>
            <div id="upload_logo_preview" class="wp_cbf-upload-preivew <?php if(empty($login_logo_id)) ?>">
                <img src="<?php echo $login_logo_url; ?>" />
                <button id="wp_cbf-delete_logo_button" class="wp_cbf-delete-image">X</button>
            </div>
        </fieldset>

        <!-- Login background color -->
        <fieldset class="wp_cbf-admin-colors">
            <legend class="screen-reader-text"><span><?php _e("Login Background Color', $this->plugin_name"); ?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-login_background_color">
                <input type="text" class="<?php echo $this->plugin_name; ?>-color-picker" id="<?php echo $this->plugin_name; ?>-login_background_color" name="<?php echo $this->plugin_name; ?>[login_background_color]" value="<?php echo $login_background_color; ?>" />
                <span><?php esc_attr_e( 'Login Background Color', $this->plugin_name ); ?></span>
            </label>
        </fieldset>

        <!-- Login buttons and links primary color -->
        <fieldset class="wp_cbf-admin-colors">
            <legend class="scree-reader-text"><span><?php _e('Login Button and Links Color', $this->plugin_name); ?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-login_button_primary_color">
                <input type="text" class="<?php echo $this->plugin_name; ?>-color-picker" id="<?php echo $this->plugin_name; ?>-login_button_primary_color" name="<?php echo $this->plugin_name; ?>[login_button_primary_color]" value="<?php echo $login_button_primary_color; ?>" />
                <span><?php esc_attr_e('Login Button and Links Color', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <?php submit_button('Save all changes', 'primary', 'submit', TRUE); ?>

    </form>

</div>