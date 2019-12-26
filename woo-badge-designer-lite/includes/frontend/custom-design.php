<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
if ( isset( $wobd_option[ 'wobd_enable_custom_design' ] ) && $wobd_option[ 'wobd_enable_custom_design' ] == '1' ) {
    $title_color = $wobd_option[ 'wobd_text_color' ];
    $background_color = isset( $wobd_option[ 'wobd_background_color' ] ) ? esc_attr( $wobd_option[ 'wobd_background_color' ] ) : '#fff';
    $corner_bg_color = isset( $wobd_option[ 'wobd_corner_background_color' ] ) ? esc_attr( $wobd_option[ 'wobd_corner_background_color' ] ) : '#fff';
    $font_size = isset( $wobd_option[ 'wobd_font_size' ] ) ? esc_attr( $wobd_option[ 'wobd_font_size' ] ) : '15';
    $image_size = isset( $wobd_option[ 'wobd_image_size' ] ) ? esc_attr( $wobd_option[ 'wobd_image_size' ] ) : '90';
    ?>
    <style>
        .wobd-<?php echo $data_id; ?>.wobd-text-template-2.wobd-position-left_center:after, .wobd-<?php echo $data_id; ?>.wobd-text-template-2.wobd-position-left_top:after, .wobd-<?php echo $data_id; ?>.wobd-text-template-2.wobd-position-left_bottom:after {
            border-color: transparent transparent <?php echo $corner_bg_color; ?> transparent;
        }
        .wobd-<?php echo $data_id; ?>.wobd-text-template-2.wobd-position-right_center:after, .wobd-<?php echo $data_id; ?>.wobd-text-template-2.wobd-position-right_top:after, .wobd-<?php echo $data_id; ?>.wobd-text-template-2.wobd-position-right_bottom:after {
            border-color: transparent transparent transparent <?php echo $corner_bg_color; ?>;
        }
        .wobd-<?php echo $data_id; ?>.wobd-text-template-1 ,.wobd-<?php echo $data_id; ?>.wobd-text-template-2,
        .wobd-<?php echo $data_id; ?>.wobd-text-template-3,.wobd-<?php echo $data_id; ?>.wobd-text-template-4,.wobd-<?php echo $data_id; ?>.wobd-text-template-5

        {
            background: <?php echo $background_color; ?>;
            color: <?php echo $title_color; ?>;
        }

        .wobd-<?php echo $data_id; ?>.wobd-image-bg-wrap.wobd-image-1 .wobd-inner-text-container, .wobd-<?php echo $data_id; ?>.wobd-image-bg-wrap.wobd-image-2 .wobd-inner-text-container, .wobd-<?php echo $data_id; ?>.wobd-image-bg-wrap.wobd-image-3 .wobd-inner-text-container, .wobd-<?php echo $data_id; ?>.wobd-image-bg-wrap.wobd-image-4 .wobd-inner-text-container, .wobd-<?php echo $data_id; ?>.wobd-image-bg-wrap.wobd-image-5 .wobd-inner-text-container
        {
            color: <?php echo $title_color; ?>;
        }
        .wobd-<?php echo $data_id; ?>.wobd-text-template-2,
        .wobd-<?php echo $data_id; ?>.wobd-text-template-1 {
            font-size: <?php echo $font_size; ?>px;
        }
        .wobd-<?php echo $data_id; ?>.wobd-text-template-3,.wobd-<?php echo $data_id; ?>.wobd-text-template-4,.wobd-<?php echo $data_id; ?>.wobd-text-template-5{
            font-size: <?php echo $font_size; ?>px;
        }
        .wobd-<?php echo $data_id; ?>.wobd-image-bg-wrap.wobd-image-1 .wobd-inner-text-container, .wobd-<?php echo $data_id; ?>.wobd-image-bg-wrap.wobd-image-2 .wobd-inner-text-container, .wobd-<?php echo $data_id; ?>.wobd-image-bg-wrap.wobd-image-3 .wobd-inner-text-container,.wobd-<?php echo $data_id; ?>.wobd-image-bg-wrap.wobd-image-4 .wobd-inner-text-container, .wobd-<?php echo $data_id; ?>.wobd-image-bg-wrap.wobd-image-5 .wobd-inner-text-container{
            font-size: <?php echo $font_size; ?>px;
        }
        .wobd-<?php echo $data_id; ?>.wobd-icon i{
            font-size: <?php echo $font_size; ?>px;
        }
        .wobd-<?php echo $data_id; ?>.wobd-image-bg-wrap.wobd-image-1 .wobd-image-ribbon, .wobd-<?php echo $data_id; ?>.wobd-image-bg-wrap.wobd-image-2 .wobd-image-ribbon, .wobd-<?php echo $data_id; ?>.wobd-image-bg-wrap.wobd-image-3 .wobd-image-ribbon, .wobd-<?php echo $data_id; ?>.wobd-image-bg-wrap.wobd-image-4 .wobd-image-ribbon, .wobd-<?php echo $data_id; ?>.wobd-image-bg-wrap.wobd-image-5 .wobd-image-ribbon
        {
            width: <?php echo $image_size; ?>px;
            height: <?php echo $image_size; ?>px;
        }

        .wobd-<?php echo $data_id; ?>.wobd-image-bg-wrap.wobd-image-1 .wobd-inner-text-container, .wobd-<?php echo $data_id; ?>.wobd-image-bg-wrap.wobd-image-2 .wobd-inner-text-container, .wobd-<?php echo $data_id; ?>.wobd-image-bg-wrap.wobd-image-3 .wobd-inner-text-container, .wobd-<?php echo $data_id; ?>.wobd-image-bg-wrap.wobd-image-4 .wobd-inner-text-container, .wobd-<?php echo $data_id; ?>.wobd-image-bg-wrap.wobd-image-5 .wobd-inner-text-container
        {
            width: <?php echo $image_size; ?>px;
            height: <?php echo $image_size; ?>px;
            line-height:<?php echo $image_size; ?>px;
        }
    </style>
    <?php
}


