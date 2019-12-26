<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$wobd_common_settings = get_option( 'wobd_common_settings' );
?>  <div class='wobd-message-display-area'>
<?php if ( isset( $_GET[ 'message' ] ) && $_GET[ 'message' ] == '1' ) { ?>
        <div class="notice notice-success is-dismissible">
            <p><strong><?php esc_html_e( 'Settings saved successfully.', WOBD_TD ); ?></strong></p>
            <button type="button" class="notice-dismiss">
                <span class="screen-reader-text"><?php esc_html_e( 'Dismiss this notice.', WOBD_TD ); ?></span>
            </button>
        </div>
    <?php } ?>
</div>
<?php include(WOBD_PATH . 'includes/admin/view/page/header.php'); ?>
<div class="wobd-settings-container">
    <div class="wobd-common-setting">
        <form method="post" id="wobd-save-form" action="<?php echo admin_url( 'admin-post.php' ); ?>"  >
            <input type="hidden" name="action" value="wobd_settings_save"/>
            <div class="wobd-heading">
                <?php esc_html_e( 'Woocommece Badges', WOBD_TD ) ?>
            </div>
            <div class="wobd-badge-option-wrap">
                <label><?php esc_html_e( 'Sale', WOBD_TD ); ?></label>
                <div class="wobd-badge-field-wrap">
                    <select name = "wobd_common_settings[wobd_default_sale_badge]" class = "wobd-sale-badge">
                        <option value="disable" <?php if ( ! empty( $wobd_common_settings[ 'wobd_default_sale_badge' ] ) ) selected( $wobd_common_settings[ 'wobd_default_sale_badge' ], 'disable' ); ?>><?php esc_html_e( 'Disable', WOBD_TD ); ?></option>
                        <option value="default" <?php if ( ! empty( $wobd_common_settings[ 'wobd_default_sale_badge' ] ) ) selected( $wobd_common_settings[ 'wobd_default_sale_badge' ], 'default' ); ?>><?php esc_html_e( 'Default', WOBD_TD ); ?></option>
                        <?php
                        $args = array(
                            'post_type' => 'wobd-badge-designer',
                            'posts_per_page' => -1,
                            'post_status' => 'publish',
                        );
                        $query = new WP_Query( $args );
                        if ( $query -> have_posts() ) {
                            while ( $query -> have_posts() ) {

                                $query -> the_post();
                                $badge_post_id = get_the_ID();
                                $wobd_option = get_post_meta( $badge_post_id, 'wobd_option', true );
                                ?>
                                <option value="<?php echo $badge_post_id; ?>" <?php if ( ! empty( $wobd_common_settings[ 'wobd_default_sale_badge' ] ) ) selected( $wobd_common_settings[ 'wobd_default_sale_badge' ], $badge_post_id ); ?>><?php the_title(); ?></option>
                                <?php
                            }
                        }
                        wp_reset_postdata();
                        ?>
                    </select>
                </div>
            </div>
            <div class="wobd-badge-option-wrap">
                <label><?php esc_html_e( 'Out of Stock', WOBD_TD ); ?></label>
                <div class="wobd-badge-field-wrap">
                    <select name = "wobd_common_settings[wobd_stock_badge]" class = "wobd-sale-badge">
                        <option value="default" <?php if ( ! empty( $wobd_common_settings[ 'wobd_stock_badge' ] ) ) selected( $wobd_common_settings[ 'wobd_stock_badge' ], 'default' ); ?>><?php esc_html_e( 'Default', WOBD_TD ); ?></option>
                        <?php
                        $args = array(
                            'post_type' => 'wobd-badge-designer',
                            'posts_per_page' => -1,
                            'post_status' => 'publish',
                        );
                        $query = new WP_Query( $args );
                        if ( $query -> have_posts() ) {
                            while ( $query -> have_posts() ) {
                                $query -> the_post();
                                $badge_post_id = get_the_ID();
                                $wobd_option = get_post_meta( $badge_post_id, 'wobd_option', true );
                                ?>
                                <option value="<?php echo $badge_post_id; ?>" <?php if ( ! empty( $wobd_common_settings[ 'wobd_stock_badge' ] ) ) selected( $wobd_common_settings[ 'wobd_stock_badge' ], $badge_post_id ); ?>><?php the_title(); ?></option>
                                <?php
                            }
                        }
                        wp_reset_postdata();
                        ?>
                    </select>
                </div>
            </div>
            <div class ="wobd-badge-option-wrap">
                <label for="wobd-show-badges-single-page" class="wobd-show-badges">
                    <?php esc_html_e( 'Enable Custom Badges on Single Page', WOBD_TD ); ?>
                </label>
                <div class="wobd-badge-field-wrap">
                    <label class="wobd-switch">
                        <input type="checkbox" class="wobd-display-badges-single wobd-checkbox" value="<?php
                        if ( isset( $wobd_common_settings[ 'wobd_enable_single_page_badge' ] ) ) {
                            echo esc_attr( $wobd_common_settings[ 'wobd_enable_single_page_badge' ] );
                        } else {
                            echo '0';
                        }
                        ?>" name="wobd_common_settings[wobd_enable_single_page_badge]" <?php if ( isset( $wobd_common_settings[ 'wobd_enable_single_page_badge' ] ) && $wobd_common_settings[ 'wobd_enable_single_page_badge' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                        <div class="wobd-slider round"></div>
                    </label>
                    <p class="description"> <?php esc_html_e( 'Enable badges to show on single product page.', WOBD_TD ) ?></p>
                </div>
            </div>

            <div class="wobd-save-buton">
                <?php wp_nonce_field( 'wobd_form_nonce', 'wobd_form_nonce_field' ); ?>
                <a class="button button-primary button-large" href="javascript:;" onclick="document.getElementById('wobd-save-form').submit();"><span><?php esc_html_e( 'Save', WOBD_TD ); ?></span></a>
            </div>
        </form>
    </div>
    <div class="wobd-right-sidebar">
        <a href="https://1.envato.market/LyK3o" target="_blank"><img src="<?php echo WOBD_IMG_DIR; ?>upgrade-to-pro.png" alt="<?php _e( 'Upgrade Woo Badge Designer', WOBD_TD ); ?>"></a>
        <div class="wobd-button-wrap-backend">
            <a href="http://demo.accesspressthemes.com/wordpress-plugins/woo-badge-designer/" class="smls-demo-btn" target="_blank">Demo</a>
            <a href="https://1.envato.market/LyK3o" target="_blank" class="smls-upgrade-btn">Upgrade</a>
            <a href="https://accesspressthemes.com/wordpress-plugins/woo-badge-designer/" target="_blank" class="smls-upgrade-btn">Plugin Information</a>
        </div>
        <a href="https://1.envato.market/LyK3o" target="_blank"><img src="<?php echo WOBD_IMG_DIR; ?>upgrade-to-pro-feature.png" alt="<?php _e( 'Woo Badge Designer Features', WOBD_TD ); ?>"></a>
    </div>
</div>