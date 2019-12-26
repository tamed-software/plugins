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
        .wobd-text-template-2.wobd-position-left_center:after, .wobd-text-template-2.wobd-position-left_top:after, .wobd-text-template-2.wobd-position-left_bottom:after {
            border-color: transparent transparent <?php echo $corner_bg_color; ?> transparent;
        }
        .wobd-text-template-2.wobd-position-right_center:after, .wobd-text-template-2.wobd-position-right_top:after, .wobd-text-template-2.wobd-position-right_bottom:after {

            border-color: transparent transparent transparent <?php echo $corner_bg_color; ?>;
        }


        .wobd-text-template-1 ,.wobd-text-template-2,
        .wobd-text-template-3,.wobd-text-template-4,.wobd-text-template-5

        {
            background: <?php echo $background_color; ?>;
            color: <?php echo $title_color; ?>;
        }



        .wobd-image-bg-wrap.wobd-image-1 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-2 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-3 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-4 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-5 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-6 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-7 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-8 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-9 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-10 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-11 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-12 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-21 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-22 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-23 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-24 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-25 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-26 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-27 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-28 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-29 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-31 .wobd-inner-text-container
        {
            color: <?php echo $title_color; ?>;
        }
        .wobd-text-template-2,
        .wobd-text-template-1 {
            font-size: <?php echo $font_size; ?>px;
        }
        .wobd-text-template-3,.wobd-text-template-4,.wobd-text-template-5,.wobd-text-template-6{
            font-size: <?php echo $font_size; ?>px;
        }

        .wobd-image-bg-wrap.wobd-image-1 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-2 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-3 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-4 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-5 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-6 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-7 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-8 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-9 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-10 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-11 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-12 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-21 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-22 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-23 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-24 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-25 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-26 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-27 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-28 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-29 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-31 .wobd-inner-text-container{
            font-size: <?php echo $font_size; ?>px;
        }
        .wobd-icon i{
            font-size: <?php echo $font_size; ?>px;
        }
        .wobd-image-bg-wrap.wobd-image-1 .wobd-image-ribbon, .wobd-image-bg-wrap.wobd-image-2 .wobd-image-ribbon, .wobd-image-bg-wrap.wobd-image-3 .wobd-image-ribbon, .wobd-image-bg-wrap.wobd-image-4 .wobd-image-ribbon, .wobd-image-bg-wrap.wobd-image-5 .wobd-image-ribbon, .wobd-image-bg-wrap.wobd-image-6 .wobd-image-ribbon, .wobd-image-bg-wrap.wobd-image-7 .wobd-image-ribbon, .wobd-image-bg-wrap.wobd-image-8 .wobd-image-ribbon, .wobd-image-bg-wrap.wobd-image-9 .wobd-image-ribbon, .wobd-image-bg-wrap.wobd-image-10 .wobd-image-ribbon, .wobd-image-bg-wrap.wobd-image-11 .wobd-image-ribbon, .wobd-image-bg-wrap.wobd-image-12 .wobd-image-ribbon, .wobd-image-bg-wrap.wobd-image-21 .wobd-image-ribbon, .wobd-image-bg-wrap.wobd-image-23 .wobd-image-ribbon, .wobd-image-bg-wrap.wobd-image-24 .wobd-image-ribbon, .wobd-image-bg-wrap.wobd-image-25 .wobd-image-ribbon, .wobd-image-bg-wrap.wobd-image-26 .wobd-image-ribbon, .wobd-image-bg-wrap.wobd-image-28 .wobd-image-ribbon, .wobd-image-bg-wrap.wobd-image-29 .wobd-image-ribbon
        {
            width: <?php echo $image_size; ?>px;
            height: <?php echo $image_size; ?>px;
        }

        .wobd-image-bg-wrap.wobd-image-1 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-2 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-3 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-4 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-5 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-6 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-7 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-8 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-9 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-10 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-11 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-12 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-21 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-22 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-23 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-24 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-25 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-26 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-27 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-28 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-29 .wobd-inner-text-container, .wobd-image-bg-wrap.wobd-image-31 .wobd-inner-text-container
        {
            width: <?php echo $image_size; ?>px;
            height: <?php echo $image_size; ?>px;
            line-height:<?php echo $image_size; ?>px;
        }
    </style>
    <?php
}
